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

class SkrillRefundStatusModuleFrontController extends ModuleFrontController
{
    public function postProcess()
    {
        $status = Tools::getValue('status');
        if ($status) {
            $cartId = Tools::getValue('cart_id');
            PrestaShopLogger::addLog('Skrill - use refund_status_url', 1, null, 'Cart', $cartId, true);
            $this->validateRefund();
        }
        die('ok');
    }

    protected function validateRefund()
    {
        $transactionId = Tools::getValue('transactionId');
        $order = $this->module->getOrderByTransactionId($transactionId);

        $sql = "SELECT * FROM skrill_order_ref WHERE id_order ='".(int)$order['id_order']."'";
        $row = Db::getInstance()->getRow($sql);
        $refund_response = array();

        $messageLog = 'Skrill - get response from refund_status_url';
        PrestaShopLogger::addLog($messageLog, 1, null, 'Order', $order['id_order'], true);
        $response = $this->getResponse();
        $messageLog = 'Skrill - response from refund_status_url : ' . json_encode($response);
        PrestaShopLogger::addLog($messageLog, 1, null, 'Order', $order['id_order'], true);

        if (!is_null($row['refund_response'])) {
            $refund_response = unserialize($row['refund_response']);
            (float)$refund_response['refunded_amount'] += (float)$response['mb_amount'];
        } else {
            $refund_response['refunded_amount'] = (float)$response['mb_amount'];
        }

        $messageLog = 'Skrill - refunded amount : ' . json_encode($refund_response['refunded_amount']);
        PrestaShopLogger::addLog($messageLog, 1, null, 'Order', $order['id_order'], true);

        if (($order && ($order['order_status'] == $this->module->refundPendingStatus))
            || (Skrill::setNumberFormat($refund_response['refunded_amount']) == $row['amount'])
        ) {
            $serializedResponse = serialize($response);
            $refundStatus = $this->getRefundStatus($response['status']);
            $this->updateResponse($transactionId, $refundStatus, $serializedResponse, $order['id_order']);
            $messageLog = 'Skrill - refund_status_url has been successfully updated';
            PrestaShopLogger::addLog($messageLog, 1, null, 'Order', $order['id_order'], true);
        } else {
            $response['refunded_amount'] = Skrill::setNumberFormat($refund_response['refunded_amount']);
            $serializedResponse = serialize($response);
            $this->updateResponse($transactionId, $refundStatus, $serializedResponse, $order['id_order']);
        }
    }

    protected function getResponse()
    {
        $response = array();
        foreach ($_REQUEST as $parameter => $value) {
            $parameter = Tools::strtolower($parameter);
            $response[$parameter] = $value;
        }

        return $response;
    }

    protected function updateResponse($transactionId, $refundStatus, $serializedResponse, $orderId)
    {
        $sql = "UPDATE skrill_order_ref SET
            order_status = '".pSQL($refundStatus)."',
            refund_response = '".pSQL($serializedResponse)."'
            where transaction_id = '".pSQL($transactionId)."'";

        $messageLog = 'Skrill - update response from refund_status_url : ' . $sql;
        PrestaShopLogger::addLog($messageLog, 1, null, 'Order', $orderId, true);

        if (!Db::getInstance()->execute($sql)) {
            $messageLog = 'Skrill - failed when updating response from refund_status_url';
            PrestaShopLogger::addLog($messageLog, 3, null, 'Order', $orderId, true);
            die('Erreur etc.');
        }
        $messageLog = 'Skrill - refund_status_url response succefully updated';
        PrestaShopLogger::addLog($messageLog, 1, null, 'Order', $orderId, true);
    }

    protected function getRefundStatus($status)
    {
        switch ($status) {
            case $this->module->pendingStatus:
                return $this->module->refundPendingStatus;
            case $this->module->processedStatus:
                return $this->module->refundedStatus;
            default:
                return $this->module->refundFailedStatus;
        }
    }
}
