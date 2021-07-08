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

class SkrillPaymentStatusModuleFrontController extends ModuleFrontController
{
    /**
     * Process status_url from gateway
     * @return void
     */
    public function postProcess()
    {
        $status = Tools::getValue('status');
        if ($status) {
            $cartId = Tools::getValue('cart_id');
            $orderId = Order::getOrderByCartId($cartId);
            Context::getContext()->cart = new Cart((int)$cartId);

            PrestaShopLogger::addLog('Skrill - use status_url', 1, null, 'Cart', $cartId, true);
            PrestaShopLogger::addLog('Skrill - get payment response from status_url', 1, null, 'Cart', $cartId, true);
            $paymentResponse = $this->getPaymentResponse();
            $messageLog = 'Skrill - payment response from status_url : ' . print_r($paymentResponse, true);
            PrestaShopLogger::addLog($messageLog, 1, null, 'Cart', $cartId, true);

            $orderId = Order::getOrderByCartId($cartId);

            $isTransactionLogValid = $this->isTransactionLogValid($paymentResponse['transaction_id']);
            $order = $this->module->getOrderByTransactionId($paymentResponse['transaction_id']);
            if (!$isTransactionLogValid) {
                $cart = $this->context->cart;

                $orderTotal = $paymentResponse['amount'];
                $transactionLog = $this->setTransactionLog($orderTotal, $paymentResponse);
                
                $generatedAntiFraudHash = $this->module->generateAntiFraudHash(
                    $cartId,
                    Tools::getValue('payment_method'),
                    $cart->date_add
                );
                $isFraud = $this->module->isFraud($generatedAntiFraudHash, Tools::getValue('payment_key'));

                $additionalInformation =
                    $this->getAdditionalInformation(
                        $paymentResponse,
                        $isFraud
                    );
     
                PrestaShopLogger::addLog(
                    'Skrill - save transaction log from status URL',
                    1,
                    null,
                    'Cart',
                    $cartId,
                    true
                );
                $this->saveTransactionLog($transactionLog, 0, $additionalInformation);

                if ($orderId) {
                    $order = $this->module->getOrderByTransactionId($paymentResponse['transaction_id']);

                    $messageLog = 'Skrill - use status_url on existed order';
                    PrestaShopLogger::addLog($messageLog, 1, null, 'Order', $orderId, true);

                    if ($order['order_status'] == $this->module->pendingStatus) {
                        $messageLog = 'Skrill - use status_url on pending status';
                        PrestaShopLogger::addLog($messageLog, 1, null, 'Order', $orderId, true);

                        $this->updateTransactionLog($paymentResponse, $order['id_order']);
                        $this->module->updatePaymentStatus($order['id_order'], $paymentResponse['status']);
                    }
                    die('ok');
                }
                $this->validatePayment($cartId, $paymentResponse);
            }
        } else {
            $messageLog = 'Skrill - no payment response from gateway';
            PrestaShopLogger::addLog($messageLog, 3, null, 'Cart', 0, true);
            die('no response from gateway.');
        }
        die('end');
    }

    /**
     * validate payment response from gateway
     * @param  string $cartId
     * @param  array $paymentResponse
     * @param  string $status
     * @return void
     */
    public function validatePayment($cartId, $paymentResponse, $status = '')
    {
        Context::getContext()->cart = new Cart((int)$cartId);
        $cart = $this->context->cart;
        Context::getContext()->currency = new Currency((int)$cart->id_currency);
        $customer = new Customer($cart->id_customer);

        $messageLog =
            'Skrill - Module Status : '. $this->module->active .
            ', Customer Id : '. $cart->id_customer .
            ', Delivery Address : '. $cart->id_address_delivery .
            ', Invoice Address : '. $cart->id_address_invoice;
        PrestaShopLogger::addLog($messageLog, 1, null, 'Cart', $cart->id, true);
        if ($cart->id_customer == 0 || $cart->id_address_delivery == 0
            || $cart->id_address_invoice == 0 || !$this->module->active
            || !Validate::isLoadedObject($customer)) {
            PrestaShopLogger::addLog('Skrill - customer datas are not valid', 3, null, 'Cart', $cart->id, true);
            die('Erreur etc.');
        }

        $this->processSuccessPayment($customer, $paymentResponse, $status);
    }

    /**
     * process if payment is success
     * @param  Object $customer
     * @param  array $paymentResponse
     * @param  string $status
     * @return void
     */
    protected function processSuccessPayment($customer, $paymentResponse, $status)
    {
        $cart = $this->context->cart;
        $cartId = $cart->id;
        $currency = $this->context->currency;

        if ($paymentResponse['status'] == $this->module->processedStatus
            || $paymentResponse['status'] == $this->module->pendingStatus
        ) {
            $generatedMd5Sig = $this->module->generateMd5sig($paymentResponse);
            $isPaymentSignatureEqualsGeneratedSignature =
                $this->module->isPaymentSignatureEqualsGeneratedSignature(
                    $paymentResponse['md5sig'],
                    $generatedMd5Sig
                );

            $generatedAntiFraudHash =
                $this->module->generateAntiFraudHash($cartId, Tools::getValue('payment_method'), $cart->date_add);
            $isFraud = $this->module->isFraud($generatedAntiFraudHash, Tools::getValue('payment_key'));

            if (!$isPaymentSignatureEqualsGeneratedSignature) {
                $paymentResponse['status'] = $this->module->invalidCredentialStatus;
                $messageLog = 'Skrill - invalid credential detected';
                PrestaShopLogger::addLog($messageLog, 1, null, 'Cart', $cartId, true);
            } elseif ($isFraud) {
                $paymentResponse['status'] = $this->module->fraudStatus;
                $messageLog = 'Skrill - fraud detected';
                PrestaShopLogger::addLog($messageLog, 1, null, 'Cart', $cartId, true);
            }
        } else {
            $errorMessage = 'SKRILL_ERROR_99_GENERAL';
            if ($paymentResponse['status'] == $this->module->failedStatus
                && isset($paymentResponse['failed_reason_code'])) {
                $errorMessage = SkrillPaymentCore::getSkrillErrorMapping($paymentResponse['failed_reason_code']);
            }

            $messageLog = 'Skrill - order has not been successfully created : '. $errorMessage;
            PrestaShopLogger::addLog($messageLog, 3, null, 'Cart', $cartId, true);
            die('payment failed');
        }

        $orderTotal = $paymentResponse['amount'];
        $transactionLog = $this->setTransactionLog($orderTotal, $paymentResponse);
        PrestaShopLogger::addLog('Skrill - get payment status', 1, null, 'Cart', $cartId, true);

        if (!empty($status)) {
            $paymentResponse['status'] = $status;
        }

        $paymentStatus = $this->getPaymentStatus($paymentResponse);
        PrestaShopLogger::addLog('Skrill - payment status : '. $paymentStatus, 1, null, 'Cart', $cartId, true);

        $this->module->validateOrder(
            $cartId,
            $paymentStatus,
            $transactionLog['amount'],
            $transactionLog['payment_name'],
            null,
            array(),
            $currency->id,
            false,
            $customer->secure_key
        );

        $orderId = $this->module->currentOrder;
        $this->context->cookie->skrill_paymentName = $transactionLog['payment_name'];

        $serializedResponse = serialize($paymentResponse);
        $this->updateTransactionLog(
            $paymentResponse['transaction_id'],
            $paymentResponse,
            $serializedResponse,
            $orderId
        );

        $messageLog = 'Skrill - order ('. $orderId .') has been successfully created';
        PrestaShopLogger::addLog($messageLog, 1, null, 'Cart', $cartId, true);
    }

    /**
     * get payment response from $_REQUEST
     * @return array
     */
    protected function getPaymentResponse()
    {
        $paymentResponse = array();
        foreach ($_REQUEST as $parameter => $value) {
            $parameter = Tools::strtolower($parameter);
            $paymentResponse[$parameter] = $value;
        }

        return $paymentResponse;
    }

    /**
     * get payment statys by payment response
     * @param  array $paymentResponse
     * @return string
     */
    public function getPaymentStatus($paymentResponse)
    {
        switch ($paymentResponse['status']) {
            case $this->module->pendingStatus:
                return Configuration::get('SKRILL_PAYMENT_STATUS_PENDING');
            case $this->module->failedStatus:
                return Configuration::get('SKRILL_PAYMENT_STATUS_FAILED');
            case $this->module->invalidCredentialStatus:
                return Configuration::get('SKRILL_PAYMENT_STATUS_INVALID');
            case $this->module->fraudStatus:
                return Configuration::get('SKRILL_PAYMENT_STATUS_FRAUD');
            case $this->module->refundedStatus:
                return Configuration::get('PS_OS_REFUND');
            default:
                return Configuration::get('PS_OS_PAYMENT');
        }
    }

    /**
     * set Transaction Log from payment response
     * @param string $orderTotal
     * @param array $paymentResponse
     * @return array
     */
    public function setTransactionLog($orderTotal, $paymentResponse)
    {
        $transactionLog = array();
        $transactionLog['transaction_id'] = $paymentResponse['transaction_id'];
        $transactionLog['mb_transaction_id'] = $paymentResponse['mb_transaction_id'];
        $transactionLog['payment_type'] = $this->getPaymentType($paymentResponse);
        $transactionLog['payment_method'] = 'SKRILL_FRONTEND_PM_'.Tools::getValue('payment_method');
        $transactionLog['payment_name'] = $this->getPaymentName($transactionLog['payment_type']);
        $transactionLog['status'] = $paymentResponse['status'];
        $transactionLog['currency'] = $paymentResponse['currency'];
        $transactionLog['amount'] = $this->getPaymentAmount($orderTotal, $paymentResponse);
        $transactionLog['payment_response'] = serialize($paymentResponse);

        return $transactionLog;
    }

    /**
     * get payment type by payment response
     * @param  array $paymentResponse
     * @return string
     */
    protected function getPaymentType($paymentResponse)
    {
        if (!empty($paymentResponse['payment_type'])) {
            if ($paymentResponse['payment_type'] == 'NGP') {
                return 'OBT';
            } else {
                return $paymentResponse['payment_type'];
            }
        }
        return Tools::getValue('payment_method');
    }

    /**
     * get payment name by payment type
     * @param  string $paymentType
     * @return string
     */
    protected function getPaymentName($paymentType)
    {
        $paymentMethod = SkrillPaymentCore::getPaymentMethodByPaymentType($paymentType);
        if ($this->module->l('SKRILL_FRONTEND_PM_'.$paymentType) == 'SKRILL_FRONTEND_PM_'.$paymentType) {
            $paymentName = $paymentMethod['name'];
        } else {
            $paymentName = $this->module->l('SKRILL_FRONTEND_PM_'.$paymentType);
        }

        $isSkrill = strpos($paymentName, 'Skrill');
        if ($isSkrill === false) {
            $paymentName = 'Skrill '.$paymentName;
        }

        return $paymentName;
    }

    /**
     * get payment amount
     * @param  string $orderTotal
     * @param  array $paymentResponse
     * @return string
     */
    protected function getPaymentAmount($orderTotal, $paymentResponse)
    {
        if (!empty($paymentResponse['amount'])) {
            return $paymentResponse['amount'];
        }
        return $orderTotal;
    }

    /**
     * get additional information
     * @param  array $paymentResponse
     * @param  booelan $isFraud
     * @return string
     */
    public function getAdditionalInformation($paymentResponse, $isFraud)
    {
        $additionalInfo = array();
        if (isset($paymentResponse['ip_country'])) {
            $additionalInfo['SKRILL_BACKEND_ORDER_ORIGIN'] = $paymentResponse['ip_country'];
        }
        if (isset($paymentResponse['payment_instrument_country'])) {
            $additionalInfo['SKRILL_BACKEND_ORDER_COUNTRY'] = $paymentResponse['payment_instrument_country'];
        }
        if (isset($paymentResponse['pay_from_email'])) {
            $additionalInfo['SKRILL_BACKEND_EMAIL_ACCOUNT'] = $paymentResponse['pay_from_email'];
        }
        if ($isFraud) {
            $additionalInfo['BACKEND_TT_FRAUD'] = $paymentResponse['status'];
        }

        return serialize($additionalInfo);
    }

    /**
     * save transaction log into database
     * @param  arrat $transactionLog
     * @param  string $orderId
     * @param  string $additionalInformation
     * @return void
     */
    public function saveTransactionLog($transactionLog, $orderId, $additionalInformation)
    {
        $sql = "INSERT INTO skrill_order_ref (
            id_order,
            transaction_id,
            payment_method,
            order_status,
            ref_id,
            payment_code,
            currency,
            amount,
            add_information,
            payment_response
        )
        VALUES "."('".
            (int)$orderId."','".
            pSQL($transactionLog['transaction_id'])."','".
            pSQL($transactionLog['payment_method'])."','".
            pSQL($transactionLog['status'])."','".
            pSQL($transactionLog['mb_transaction_id'])."','".
            pSQL($transactionLog['payment_type'])."','".
            pSQL($transactionLog['currency'])."','".
            (float)$transactionLog['amount']."','".
            pSQL($additionalInformation)."','".
            pSQL($transactionLog['payment_response']).
        "')";

        PrestaShopLogger::addLog('Skrill - save transaction log : ' . $sql, 1, null, 'Order', $orderId, true);

        if (!Db::getInstance()->execute($sql)) {
            PrestaShopLogger::addLog('Skrill - failed when saving transaction log', 3, null, 'Order', $orderId, true);
            die('Erreur etc.');
        }
        PrestaShopLogger::addLog('Skrill - transaction log succefully saved', 1, null, 'Order', $orderId, true);
    }

    /**
     * update Transaction Log
     * @param  string $transactionId
     * @param  array $paymentResponse
     * @param  string $serializedResponse
     * @param  string $orderId
     * @return void
     */
    protected function updateTransactionLog($transactionId, $paymentResponse, $serializedResponse, $orderId)
    {
        $sql = "UPDATE skrill_order_ref SET
            id_order = '".pSQL($orderId)."',
            order_status = '".pSQL($paymentResponse['status'])."',
            payment_response = '".pSQL($serializedResponse)."'
            where transaction_id = '".pSQL($transactionId)."'";

        $messageLog = 'Skrill - update payment response from status_url : ' . $sql;
        PrestaShopLogger::addLog($messageLog, 1, null, 'Order', $orderId, true);

        if (!Db::getInstance()->execute($sql)) {
            $messageLog = 'Skrill - failed when updating payment response from status_url';
            PrestaShopLogger::addLog($messageLog, 3, null, 'Order', $orderId, true);
            die('Erreur etc.');
        }
        PrestaShopLogger::addLog('Skrill - status_url response succefully updated', 1, null, 'Order', $orderId, true);
    }

    /**
     * validate if Transaction log exists on database
     * @param  string  $transactionId
     * @return boolean
     */
    public function isTransactionLogValid($transactionId)
    {
        $order = $this->module->getOrderByTransactionId($transactionId);

        $messageLog = 'Skrill - existing order : ' . print_r($order, true);
            PrestaShopLogger::addLog($messageLog, 1, null, 'Cart', $this->context->cart->id, true);

        if (!empty($order)) {
            return true;
        } else {
            return false;
        }
    }
}
