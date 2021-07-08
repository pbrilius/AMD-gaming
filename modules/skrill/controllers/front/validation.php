<?php
/**
* 2015 Skrill
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
*  @author    Skrill <contact@skrill.com>
*  @copyright 2015 Skrill
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of Skrill
*/

require_once(dirname(__FILE__).'/../../core/core.php');
require_once(dirname(__FILE__).'/paymentStatus.php');

class SkrillValidationModuleFrontController extends ModuleFrontController
{
    protected $orderConfirmationUrl = 'index.php?controller=order-confirmation';

    /**
     * this function run when we access the controller.
     */
    public function postProcess()
    {
        $cartId = (int)Tools::getValue('cart_id');
        $transactionId = Tools::getValue('transaction_id');
        PrestaShopLogger::addLog('Skrill - process return url', 1, null, 'Cart', $cartId, true);

        PrestaShopLogger::addLog('validate order', 1, null, 'Cart', $cartId, true);
        $this->validateOrder($cartId, $transactionId);
    }

    /**
     * to validate order status and redirect to success or failed page.
     *
     * @param int $cartId
     * @param string $transactionId
     * @return void
     */
    protected function validateOrder($cartId, $transactionId)
    {
        for ($i=1; $i<= 10; $i++) {
            PrestaShopLogger::addLog('get transaction log data: '.$i, 1, null, 'Cart', $cartId, true);
            $order = $this->module->getOrderByTransactionId($transactionId);
            if (!empty($order)) {
                break;
            }
            sleep(1);
        }

        PrestaShopLogger::addLog('transaction log order : '.print_r($order, true), 1, null, 'Cart', $cartId, true);
        
        if (empty($order) || empty($order['order_status'])) {
            PrestaShopLogger::addLog('Skrill - status url late', 1, null, 'Cart', $cartId, true);
            $this->checkPaymentStatus($cartId, $transactionId);
        } elseif ($order['order_status'] == $this->module->failedStatus) {
            $paymentResponse = unserialize($order['payment_response']);
            $errorStatus = SkrillPaymentCore::getSkrillErrorMapping($paymentResponse['failed_reason_code']);
            $this->redirectError($errorStatus);
        } else {
            if ($this->context->cart->OrderExists() == false) {
                PrestaShopLogger::addLog('Skrill - check order from return url', 1, null, 'Cart', $cartId, true);
                $this->checkPaymentStatus($cartId, $transactionId);
            } else {
                PrestaShopLogger::addLog(
                    'Skrill - redirect success validate return url',
                    1,
                    null,
                    'Cart',
                    $cartId,
                    true
                );
                $this->redirectSuccess($cartId);
            }
        }
    }

    /**
     * check payment status for current transaction
     * @param  string $cartId
     * @param  string $transactionId
     * @return void
     */
    protected function checkPaymentStatus($cartId, $transactionId)
    {
        $cart = $this->context->cart;
        $fieldParams = array();
        PrestaShopLogger::addLog('Skrill - check Payment Status', 1, null, 'Cart', $cartId, true);
        $fieldParams['email'] = Configuration::get('SKRILL_GENERAL_MERCHANTACCOUNT');
        $fieldParams['password'] = Configuration::get('SKRILL_GENERAL_APIPASS');
        $fieldParams['type'] = 'trn_id';
        $fieldParams['id'] = $transactionId;

        $responseStatus = SkrillPaymentCore::isPaymentAccepted($fieldParams);
        PrestaShopLogger::addLog(
            'Skrill - check payment status:'. print_r($responseStatus, true),
            1,
            null,
            'Cart',
            $cartId,
            true
        );

        if (isset($responseStatus) && $responseStatus['status'] == '2') {
            $PaymentStatus = new SkrillPaymentStatusModuleFrontController();
            
            $isTransactionLogValid = $PaymentStatus->isTransactionLogValid($responseStatus['transaction_id']);

            if (!$isTransactionLogValid) {
                $orderTotal = $responseStatus['amount'];
                $transactionLog = $PaymentStatus->setTransactionLog($orderTotal, $responseStatus);
                $generatedMd5Sig = $this->module->generateMd5sig($responseStatus);
                $isPaymentSignatureEqualsGeneratedSignature =
                    $this->module->isPaymentSignatureEqualsGeneratedSignature(
                        $responseStatus['md5sig'],
                        $generatedMd5Sig
                    );
                $generatedAntiFraudHash = $this->module->generateAntiFraudHash(
                    $cartId,
                    Tools::getValue('payment_method'),
                    $cart->date_add
                );
                $isFraud = $this->module->isFraud($generatedAntiFraudHash, Tools::getValue('secure_key'));
                
                $additionalInformation =
                    $PaymentStatus->getAdditionalInformation(
                        $responseStatus,
                        $isPaymentSignatureEqualsGeneratedSignature,
                        $isFraud
                    );
                PrestaShopLogger::addLog(
                    'Skrill - save transaction log from return URL',
                    1,
                    null,
                    'Cart',
                    $cartId,
                    true
                );
                $PaymentStatus->saveTransactionLog($transactionLog, 0, $additionalInformation);

                $PaymentStatus->validatePayment($cartId, $responseStatus, $responseStatus['status']);
            }
            $this->redirectSuccess($cartId);
        } else {
            $this->redirectPaymentReturn();
        }
    }

    protected function redirectError($returnMessage)
    {
        $this->errors[] = $this->module->getLocaleErrorMapping($returnMessage);
        $this->redirectWithNotifications($this->context->link->getPageLink('order', true, null, array(
            'step' => '3')));
    }

    protected function redirectPaymentReturn()
    {
        $url = $this->context->link->getModuleLink('skrill', 'paymentReturn', array(
            'secure_key' => $this->context->customer->secure_key), true);
        PrestaShopLogger::addLog('rediret to payment return : '.$url, 1, null, 'Cart', $this->context->cart->id, true);
        Tools::redirect($url);
        exit;
    }

    protected function redirectSuccess($cartId)
    {
        Tools::redirect(
            $this->orderConfirmationUrl.
            '&id_cart='.$cartId.
            '&id_module='.(int)$this->module->id.
            '&key='.$this->context->customer->secure_key
        );
    }
}
