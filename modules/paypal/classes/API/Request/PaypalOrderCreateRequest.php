<?php
/**
 * 2007-2021 PayPal
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author 2007-2021 PayPal
 * @copyright PayPal
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace PaypalAddons\classes\API\Request;

use PaypalAddons\classes\AbstractMethodPaypal;
use PaypalAddons\classes\API\Request\RequestAbstract;
use PaypalAddons\classes\API\Response\Error;
use PaypalAddons\classes\API\Response\ResponseOrderCreate;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalHttp\HttpException;
use Symfony\Component\VarDumper\VarDumper;

class PaypalOrderCreateRequest extends RequestAbstract
{
    protected $items = [];

    protected $wrappings = [];

    protected $products = [];

    public function execute()
    {
        $response = new ResponseOrderCreate();
        $order = new OrdersCreateRequest();
        $order->body = $this->buildRequestBody();
        $order->headers = array_merge($this->getHeaders(), $order->headers);

        try {
            $exec = $this->client->execute($order);

            if (in_array($exec->statusCode, [200, 201, 202])) {
                $response->setSuccess(true)
                    ->setData($exec)
                    ->setPaymentId($exec->result->id)
                    ->setStatusCode($exec->statusCode)
                    ->setApproveLink($this->getLink('approve', $exec->result->links));
            } elseif ($exec->statusCode == 204) {
                $response->setSuccess(true);
            } else {
                $error = new Error();
                $resultDecoded = json_decode($exec->message);
                $error->setMessage($resultDecoded->message);
                $response->setSuccess(false)
                    ->setError($error);
            }
        } catch (HttpException $e) {
            $error = new Error();
            $resultDecoded = json_decode($e->getMessage());
            $error->setMessage($resultDecoded->details[0]->description)->setErrorCode($e->getCode());
            $response->setSuccess(false)
                ->setError($error);
        } catch (\Exception $e) {
            $error = new Error();
            $error->setMessage($e->getMessage())
                ->setErrorCode($e->getCode());
            $response->setSuccess(false)
                ->setError($error);
        }
        return $response;
    }

    /**
     * @param $nameLink string
     * @param $links array
     * @return string
     */
    protected function getLink($nameLink, $links)
    {
        foreach ($links as $link) {
            if ($link->rel == $nameLink) {
                return $link->href;
            }
        }

        return '';
    }

    /**
     * @return array
     */
    protected function buildRequestBody()
    {
        $currency = $this->getCurrency();
        $items = $this->getItems($currency);
        $payer = $this->getPayer();
        $shippingInfo = $this->getShippingInfo();

        $body = [
            'intent' => $this->getIntent(),
            'application_context' => $this->getApplicationContext(),
            'purchase_units' => [
                [
                    'amount' => $this->getAmount($currency),
                    'items' => $items,
                    'custom_id' => $this->formatter->formatPaypalString($this->getCustomId())
                ],
            ],
        ];

        if (empty($payer) == false) {
            $body['payer'] = $payer;
        }

        if (empty($shippingInfo) == false) {
            $body['purchase_units'][0]['shipping'] = $shippingInfo;
        }

        return $body;
    }

    /**
     * @return array
     */
    protected function getPayer()
    {
        $payer = [];

        if (\Validate::isLoadedObject($this->context->customer) == false) {
            return $payer;
        }

        $payer['name'] = [
            'given_name' => $this->formatter->formatPaypalString($this->context->customer->firstname),
            'surname' => $this->formatter->formatPaypalString($this->context->customer->lastname)
        ];
        $payer['email'] = $this->context->customer->email;

        if ($this->context->cart->isVirtualCart() === false) {
            $payer['address'] = $this->getAddress();
        }

        if ($this->method instanceof \MethodMB) {
            $taxInfo = $this->method->getPayerTaxInfo();

            if (empty($taxInfo) == false) {
                $payer['tax_info'] = $taxInfo;
            }
        }

        return $payer;
    }

    /**
     * @return string
     */
    protected function getCurrency()
    {
        return $this->module->getPaymentCurrencyIso();
    }

    protected function getItems($currency, $cache = false)
    {
        if ($cache && false === empty($this->items)) {
            return $this->items;
        }

        $this->items = array_merge(
            $this->getProductItems($currency, $cache),
            $this->getWrappingItems($currency, $cache)
        );

        return $this->items;
    }

    /**
     * @param $currency string Iso code
     * @return array
     */
    protected function getProductItems($currency, $cache = false)
    {
        if ($cache && false === empty($this->products)) {
            return $this->products;
        }

        $items = [];
        $products = $this->context->cart->getProducts();

        foreach ($products as $product) {
            $item = [];
            $priceExcl = $this->method->formatPrice($product['price']);
            $priceIncl = $this->method->formatPrice($product['price_wt']);
            $productTax = $this->method->formatPrice($priceIncl - $priceExcl, null, false);

            if (isset($product['attributes']) && (empty($product['attributes']) === false)) {
                $product['name'] .= ' - '.$product['attributes'];
            }

            if (isset($product['reference']) && false === empty($product['reference'])) {
                $product['name'] .= ' Ref: ' . $product['reference'];
            }

            $item['name'] = $this->formatter->formatPaypalString($product['name']);
            $item['sku'] = $product['id_product'];
            $item['unit_amount'] = [
                'currency_code' => $currency,
                'value' => $priceExcl
            ];
            $item['tax'] = [
                'currency_code' => $currency,
                'value' => $productTax
            ];
            $item['quantity'] = $product['quantity'];

            $items[] = $item;
        }

        $this->products = $items;
        return $items;
    }

    /**
     * @param $currency string Iso code
     * @return array
     */
    protected function getAmount($currency)
    {
        $cartSummary = $this->context->cart->getSummaryDetails();
        $items = $this->getItems($currency, true);
        $subTotalExcl = 0;
        $shippingTotal = $this->method->formatPrice($this->getTotalShipping());
        $subTotalTax = 0;
        $discountTotal = $this->method->formatPrice(abs($this->getDiscount()));
        $handling = $this->getHandling($currency);

        foreach ($items as $item) {
            $subTotalExcl += (float)$item['unit_amount']['value'] * (float)$item['quantity'];
            $subTotalTax += (float)$item['tax']['value'] * (float)$item['quantity'];
        }

        $subTotalExcl = $this->method->formatPrice($subTotalExcl, null, false);
        $subTotalTax = $this->method->formatPrice($subTotalTax, null, false);
        $totalOrder = $this->method->formatPrice(
            $subTotalExcl + $subTotalTax + $shippingTotal + $handling - $discountTotal,
            null,
            false
        );

        $amount = array(
            'currency_code' => $currency,
            'value' => $totalOrder,
            'breakdown' =>
                array(
                    'item_total' => array(
                        'currency_code' => $currency,
                        'value' => $subTotalExcl,
                    ),
                    'shipping' => array(
                        'currency_code' => $currency,
                        'value' => $shippingTotal,
                    ),
                    'tax_total' => array(
                        'currency_code' => $currency,
                        'value' => $subTotalTax,
                    ),
                    'discount' => array(
                        'currency_code' => $currency,
                        'value' => $discountTotal
                    ),
                    'handling' => array(
                        'currency_code' => $currency,
                        'value' => $handling
                    )
                ),
        );

        return $amount;
    }

    protected function getWrappingItems($currency, $cache = false)
    {
        if ($cache && false === empty($this->wrappings)) {
            return $this->wrappings;
        }

        $items = [];

        if ($this->context->cart->gift && $this->context->cart->getGiftWrappingPrice()) {
            $item = [];
            $priceIncl = $this->context->cart->getGiftWrappingPrice(true);
            $priceExcl = $this->context->cart->getGiftWrappingPrice(false);
            $tax = $priceIncl - $priceExcl;

            $item['name'] = $this->module->l('Gift wrapping', get_class($this));
            $item['sku'] = $this->context->cart->id;
            $item['unit_amount'] = [
                'currency_code' => $currency,
                'value' => $this->method->formatPrice($priceExcl)
            ];
            $item['tax'] = [
                'currency_code' => $currency,
                'value' => $this->method->formatPrice($tax)
            ];
            $item['quantity'] = 1;

            $items[] = $item;
        }

        $this->wrappings = $items;
        return $items;
    }

    /**
     * @return array
     */
    protected function getApplicationContext()
    {
        $applicationContext = [
            'locale' => $this->context->language->locale,
            'landing_page' => $this->method->getLandingPage(),
            'shipping_preference' => 'SET_PROVIDED_ADDRESS',
            'return_url' => $this->method->getReturnUrl(),
            'cancel_url' => $this->method->getCancelUrl(),
            'brand_name' => $this->formatter->formatPaypalString($this->getBrandName()),
            'user_action' => 'PAY_NOW'
        ];

        if ($this->context->cart->isVirtualCart()) {
            $applicationContext['shipping_preference'] = 'NO_SHIPPING';
        }

        if ($this->isShortcut()) {
            $applicationContext['shipping_preference'] = 'GET_FROM_FILE';
        }

        return $applicationContext;
    }

    /**
     * @return array
     */
    protected function getShippingInfo()
    {
        if ($this->context->cart->id_address_delivery == false || $this->context->cart->isVirtualCart()) {
            return [];
        }
        $shippingInfo = [
            'address' => $this->getAddress()
        ];

        return $shippingInfo;
    }

    /**
     * @return array
     */
    protected function getAddress()
    {
        $address = new \Address($this->context->cart->id_address_delivery);
        $country = new \Country($address->id_country);

        $addressArray = [
            'address_line_1' => $this->formatter->formatPaypalString($address->address1),
            'address_line_2' => $this->formatter->formatPaypalString($address->address2),
            'postal_code' => $address->postcode,
            'country_code' => \Tools::strtoupper($country->iso_code),
            'admin_area_2' => $this->formatter->formatPaypalString($address->city),
        ];

        if ($address->id_state) {
            $state = new \State($address->id_state);
            $addressArray['admin_area_1'] = \Tools::strtoupper($state->iso_code);
        }

        return $addressArray;
    }

    /**
     * @return string
     */
    protected function getIntent()
    {
        return $this->method->getIntent();
    }

    protected function getCustomId()
    {
        return $this->method->getCustomFieldInformation($this->context->cart);
    }

    protected function getBrandName()
    {
        return $this->method->getBrandName();
    }

    /**
     * @return bool
     */
    protected function isShortcut()
    {
        if (is_callable([$this->method, 'getShortCut']) === false) {
            return false;
        }

        return (bool) $this->method->getShortCut();
    }

    protected function getHandling($currency)
    {
        $handling = 0;
        $discounts = $this->context->cart->getCartRules();

        if (empty($discounts)) {
            return $handling;
        }

        foreach ($discounts as $discount) {
            if ($discount['value_real'] < 0) {
                $handling += $this->method->formatPrice(abs($discount['value_real']));
            }
        }

        return $handling;
    }

    /**
     * @return float
     */
    protected function getDiscount()
    {
        $discountTotal = $this->context->cart->getOrderTotal(true, \Cart::ONLY_DISCOUNTS);

        if (version_compare(_PS_VERSION_, '1.7.6', '<')) {
            $summaryDetails = $this->context->cart->getSummaryDetails();
            $gifts = isset($summaryDetails['gift_products']) ? $summaryDetails['gift_products'] : [];

            if (is_array($gifts)) {
                foreach ($gifts as $gift) {
                    if (isset($gift['price_with_reduction'])) {
                        $discountTotal += $gift['price_with_reduction'];
                    }
                }
            }
        }

        return $discountTotal;
    }

    protected function getTotalShipping()
    {
        return $this->context->cart->getOrderTotal(true, \Cart::ONLY_SHIPPING);
    }
}
