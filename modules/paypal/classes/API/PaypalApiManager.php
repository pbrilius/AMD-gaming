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

namespace PaypalAddons\classes\API;

use PaypalAddons\classes\AbstractMethodPaypal;
use PaypalAddons\classes\API\Request\PaypalAccessTokenRequest;
use PaypalAddons\classes\API\Request\PaypalAuthorizationVoidRequest;
use PaypalAddons\classes\API\Request\PaypalCaptureAuthorizeRequest;
use PaypalAddons\classes\API\Request\PaypalOrderCaptureRequest;
use PaypalAddons\classes\API\Request\PaypalOrderCreateRequest;
use PaypalAddons\classes\API\Request\PaypalOrderAuthorizeRequest;
use PaypalAddons\classes\API\Request\PaypalOrderGetRequest;
use PaypalAddons\classes\API\Request\PaypalOrderPartialRefundRequest;
use PaypalAddons\classes\API\Request\PaypalOrderPatchRequest;
use PaypalAddons\classes\API\Request\PaypalOrderRefundRequest;

class PaypalApiManager implements PaypalApiManagerInterface
{
    /** @var AbstractMethodPaypal*/
    protected $method;

    /** @var PaypalClient*/
    protected $client;

    public function __construct(AbstractMethodPaypal $method)
    {
        $this->method = $method;
        $this->client = PaypalClient::get($method);
    }

    public function getAccessTokenRequest()
    {
        return new PaypalAccessTokenRequest($this->client, $this->method);
    }

    public function getOrderRequest()
    {
        return new PaypalOrderCreateRequest($this->client, $this->method);
    }

    public function getOrderCaptureRequest($idPayment)
    {
        return new PaypalOrderCaptureRequest($this->client, $this->method, $idPayment);
    }

    public function getOrderAuthorizeRequest($idPayment)
    {
        return new PaypalOrderAuthorizeRequest($this->client, $this->method, $idPayment);
    }

    public function getOrderRefundRequest(\PaypalOrder $paypalOrder)
    {
        return new PaypalOrderRefundRequest($this->client, $this->method, $paypalOrder);
    }

    public function getOrderPartialRefundRequest(\PaypalOrder $paypalOrder, $amount)
    {
        return new PaypalOrderPartialRefundRequest($this->client, $this->method, $paypalOrder, $amount);
    }

    public function getAuthorizationVoidRequest(\PaypalOrder $orderPayPal)
    {
        return new PaypalAuthorizationVoidRequest($this->client, $this->method, $orderPayPal);
    }

    public function getCaptureAuthorizeRequest(\PaypalOrder $paypalOrder)
    {
        return new PaypalCaptureAuthorizeRequest($this->client, $this->method, $paypalOrder);
    }

    public function getOrderGetRequest($idPayment)
    {
        return new PaypalOrderGetRequest($this->client, $this->method, $idPayment);
    }

    public function getOrderPatchRequest($idPayment)
    {
        return new PaypalOrderPatchRequest($this->client, $this->method, $idPayment);
    }
}
