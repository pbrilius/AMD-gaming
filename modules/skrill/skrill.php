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

if (!class_exists('SkrillCustomMailAlert')) {
    require_once(dirname(__FILE__).'/SkrillCustomMailAlert.php');
}
require_once(dirname(__FILE__).'/core/core.php');

use PrestaShop\PrestaShop\Core\Payment\PaymentOption;

if (!defined('_PS_VERSION_')) {
    exit;
}

class Skrill extends PaymentModule
{
    protected $html = '';
    public $processedStatus = '2';
    public $pendingStatus = '0';
    public $failedStatus = '-2';
    public $refundedStatus = '-4';
    public $refundFailedStatus = '-5';
    public $refundPendingStatus = '-6';
    public $invalidCredentialStatus = '-7';
    public $fraudStatus = '-8';
    protected $selectedTab = false;
    protected $skrillSignUpUrl = 'https://www.skrill.com/en/business/ecommerce-promotion/?utm_source=prestashop'
    .'&utm_medium=banner&utm_campaign=ecomprom&utm_content=product-page&rid=21445510';
    protected $skrillGuideUrl = 'https://www.skrill.com/fileadmin/content/pdf/Skrill_Prestashop_Module_Guide.pdf';
    protected $supportedLanguages = array('en', 'de', 'it', 'es', 'fr', 'pl');
    protected $paymentMethodShowTitleLogo = array();

    public function __construct()
    {
        $this->name = 'skrill';
        $this->tab = 'payments_gateways';
        $this->version = '2.0.44';
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->author = 'Skrill';
        $this->module_key = '6f71ca0e0e3465122dfdfeb5d3a43a19';
        $this->paymentMethodShowTitleLogo = array( 'ADB', 'AOB', 'ACI' );

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = 'Skrill';
        $this->description = 'Accepts payments by Skrill';
        if ($this->l('BACKEND_TT_DELETE_DETAILS') == "BACKEND_TT_DELETE_DETAILS") {
            $this->confirmUninstall =  "Are you sure you want to delete your details ?";
        } else {
            $this->confirmUninstall = $this->l('BACKEND_TT_DELETE_DETAILS');
        }
    }

    public function install()
    {
        $this->warning = null;
        if (is_null($this->warning) && !function_exists('curl_init')) {
            if ($this->l('ERROR_MESSAGE_CURL_REQUIRED') == "ERROR_MESSAGE_CURL_REQUIRED") {
                $this->warning = "cURL is required to use this module. Please install the php extention cURL.";
            } else {
                $this->warning = $this->l('ERROR_MESSAGE_CURL_REQUIRED');
            }
        }
        if (is_null($this->warning)
            && !(parent::install()
            && $this->registerHook('paymentReturn')
            && $this->registerHook('updateOrderStatus')
            && $this->registerHook('displayInvoice')
            && $this->registerHook('displayAdminOrder')
            && $this->registerHook('header')
            && $this->registerHook('actionOrderSlipAdd')
            && $this->registerHook('paymentOptions'))) {
            if ($this->l('ERROR_MESSAGE_INSTALL_MODULE') == "ERROR_MESSAGE_INSTALL_MODULE") {
                $this->warning = "There was an Error installing the module.";
            } else {
                $this->warning = $this->l('ERROR_MESSAGE_INSTALL_MODULE');
            }
        }
        if (is_null($this->warning) && !$this->createOrderRefTables()) {
            if ($this->l('ERROR_MESSAGE_CREATE_TABLE') == "ERROR_MESSAGE_CREATE_TABLE") {
                $this->warning = "There was an Error creating a custom table.";
            } else {
                $this->warning = $this->l('ERROR_MESSAGE_CREATE_TABLE');
            }
        }
        if (is_null($this->warning) && !$this->addSkrillOrderStatus()) {
            if ($this->l('ERROR_MESSAGE_CREATE_ORDER_STATUS') == "ERROR_MESSAGE_CREATE_ORDER_STATUS") {
                $this->warning = "There was an Error creating a custom order status.";
            } else {
                $this->warning = $this->l('ERROR_MESSAGE_CREATE_ORDER_STATUS');
            }
        }
        //default configuration for skrill at first install

        // default skrill setting.
        Configuration::updateValue('SKRILL_GENERAL_MERCHANTID', '');
        Configuration::updateValue('SKRILL_GENERAL_MERCHANTACCOUNT', '');
        Configuration::updateValue('SKRILL_GENERAL_RECIPENT', '');
        Configuration::updateValue('SKRILL_GENERAL_LOGOURL', '');
        Configuration::updateValue('SKRILL_GENERAL_SHOPURL', '');
        Configuration::updateValue('SKRILL_GENERAL_APIPASS', '');
        Configuration::updateValue('SKRILL_GENERAL_SECRETWORD', '');
        Configuration::updateValue('SKRILL_GENERAL_DISPLAY', '');
        Configuration::updateValue('SKRILL_GENERAL_MERCHANTEMAIL', '');

        // default skrill flexible
        Configuration::updateValue('SKRILL_FLEXIBLE_ACTIVE', '0');

        $defaultSort = 1;
        foreach (array_keys(SkrillPaymentCore::getPaymentMethods()) as $paymentType) {
            //default enable payment grop
            Configuration::updateValue('SKRILL_'.$paymentType.'_ACTIVE', '1');
            
            //default payment mode
            if ($paymentType == 'ACC') {
                Configuration::updateValue('SKRILL_'.$paymentType.'_MODE', '1');
            }
            $defaultSort++;
        }

        return is_null($this->warning);
    }

    public function uninstall()
    {
        if (!Configuration::deleteByName('SKRILL_GENERAL_MERCHANTID')
            || !Configuration::deleteByName('SKRILL_GENERAL_MERCHANTACCOUNT')
            || !Configuration::deleteByName('SKRILL_GENERAL_RECIPENT')
            || !Configuration::deleteByName('SKRILL_GENERAL_LOGOURL')
            || !Configuration::deleteByName('SKRILL_GENERAL_SHOPURL')
            || !Configuration::deleteByName('SKRILL_GENERAL_APIPASS')
            || !Configuration::deleteByName('SKRILL_GENERAL_SECRETWORD')
            || !Configuration::deleteByName('SKRILL_GENERAL_DISPLAY')
            || !Configuration::deleteByName('SKRILL_GENERAL_MERCHANTEMAIL')

            || !Configuration::deleteByName('SKRILL_FLEXIBLE_ACTIVE')
            || !Configuration::deleteByName('SKRILL_WLT_ACTIVE')
            || !Configuration::deleteByName('SKRILL_PSC_ACTIVE')
            || !Configuration::deleteByName('SKRILL_PCH_ACTIVE')
            || !Configuration::deleteByName('SKRILL_ACC_ACTIVE')
            || !Configuration::deleteByName('SKRILL_VSA_ACTIVE')
            || !Configuration::deleteByName('SKRILL_MSC_ACTIVE')
            || !Configuration::deleteByName('SKRILL_MAE_ACTIVE')
            || !Configuration::deleteByName('SKRILL_GCB_ACTIVE')
            || !Configuration::deleteByName('SKRILL_DNK_ACTIVE')
            || !Configuration::deleteByName('SKRILL_PSP_ACTIVE')
            || !Configuration::deleteByName('SKRILL_CSI_ACTIVE')
            || !Configuration::deleteByName('SKRILL_OBT_ACTIVE')
            || !Configuration::deleteByName('SKRILL_GIR_ACTIVE')
            || !Configuration::deleteByName('SKRILL_SFT_ACTIVE')
            || !Configuration::deleteByName('SKRILL_EBT_ACTIVE')
            || !Configuration::deleteByName('SKRILL_IDL_ACTIVE')
            || !Configuration::deleteByName('SKRILL_NPY_ACTIVE')
            || !Configuration::deleteByName('SKRILL_PLI_ACTIVE')
            || !Configuration::deleteByName('SKRILL_PWY_ACTIVE')
            || !Configuration::deleteByName('SKRILL_EPY_ACTIVE')
            || !Configuration::deleteByName('SKRILL_GLU_ACTIVE')
            || !Configuration::deleteByName('SKRILL_ALI_ACTIVE')
            || !Configuration::deleteByName('SKRILL_NTL_ACTIVE')
            || !Configuration::deleteByName('SKRILL_ADB_ACTIVE')
            || !Configuration::deleteByName('SKRILL_AOB_ACTIVE')
            || !Configuration::deleteByName('SKRILL_ACI_ACTIVE')
            || !Configuration::deleteByName('SKRILL_AUP_ACTIVE')

            || !Configuration::deleteByName('SKRILL_ACC_MODE')

            || !$this->unregisterHook('paymentReturn')
            || !$this->unregisterHook('updateOrderStatus')
            || !$this->unregisterHook('displayInvoice')
            || !$this->unregisterHook('displayAdminOrder')
            || !$this->unregisterHook('actionOrderSlipAdd')
            || !$this->unregisterHook('header')
            || !$this->unregisterHook('paymentOptions')
            || !parent::uninstall()) {
                return false;
        }
        return true;
    }

    public function createOrderRefTables()
    {
        $sql= "CREATE TABLE IF NOT EXISTS `skrill_order_ref`(
            `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `id_order` INT(10) NOT NULL,
            `transaction_id` VARCHAR(32) NOT NULL,
            `payment_method` VARCHAR(50) NOT NULL,
            `order_status` VARCHAR(2) NOT NULL,
            `ref_id` VARCHAR(32) NOT NULL,
            `payment_code` VARCHAR(8) NOT NULL,
            `currency` VARCHAR(3) NOT NULL,
            `amount` decimal(17,2) NOT NULL,
            `add_information` LONGTEXT NULL,
            `payment_response` LONGTEXT NULL,
            `refund_response` LONGTEXT NULL)";

        if (!Db::getInstance()->Execute($sql)) {
            return false;
        }
        return true;
    }

    public function addOrderStatus($configKey, $statusName, $stateConfig)
    {
        if (!Configuration::get($configKey)) {
            $orderState = new OrderState();
            $orderState->name = array();
            $orderState->module_name = $this->name;
            $orderState->send_email = true;
            $orderState->color = $stateConfig['color'];
            $orderState->hidden = false;
            $orderState->delivery = false;
            $orderState->logable = true;
            $orderState->invoice = false;
            $orderState->paid = false;
            foreach (Language::getLanguages() as $language) {
                $orderState->template[$language['id_lang']] = 'payment';
                $orderState->name[$language['id_lang']] = $statusName;
            }

            if ($orderState->add()) {
                $skrillIcon = dirname(__FILE__).'/logo.gif';
                $newStateIcon = dirname(__FILE__).'/../../img/os/'.(int)$orderState->id.'.gif';
                copy($skrillIcon, $newStateIcon);
            }

            Configuration::updateValue($configKey, (int)$orderState->id);
        }
    }

    public function addSkrillOrderStatus()
    {
        $stateConfig = array();
        try {
            $stateConfig['color'] = 'blue';
            $this->addOrderStatus(
                'SKRILL_PAYMENT_STATUS_PENDING',
                'Pending',
                $stateConfig
            );
            $stateConfig['color'] = 'red';
            $this->addOrderStatus(
                'SKRILL_PAYMENT_STATUS_FAILED',
                'Failed',
                $stateConfig
            );
            $stateConfig['color'] = 'red';
            $this->addOrderStatus(
                'SKRILL_PAYMENT_STATUS_INVALID',
                'Invalid credential',
                $stateConfig
            );
            $stateConfig['color'] = 'red';
            $this->addOrderStatus(
                'SKRILL_PAYMENT_STATUS_FRAUD',
                'Suspected Fraud',
                $stateConfig
            );
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    public function getSkrillCredentials()
    {
        $credentials = array();
        $credentials['email'] = Configuration::get('SKRILL_GENERAL_MERCHANTACCOUNT');
        $credentials['password'] = Configuration::get('SKRILL_GENERAL_APIPASS');

        return $credentials;
    }

    /**
    * Hook action order slip add
    * @param $params array
    * @return void
    */
    public function hookactionOrderSlipAdd($params)
    {
        if (Tools::isSubmit('partialRefundProduct')
            && ($refunds = Tools::getValue('partialRefundProduct'))
            && is_array($refunds)
        ) {
            $amount = 0;
            foreach ($params['productList'] as $product) {
                $amount += $product['amount'];
            }
            if (Tools::getValue('partialRefundShippingCost')) {
                $amount += Tools::getValue('partialRefundShippingCost');
            }

            $refId = '';
            $refundParams = array(
                        'id_order' => $params['order']->id,
                        'amount' => $amount
                    );
            $refundStatus = $this->refundOrder(
                $refundParams,
                $refId,
                false,
                true
            );

            $messageLog = 'Skrill - productList' . json_encode($params['productList']);
            PrestaShopLogger::addLog($messageLog, 3, null, 'Order', $params['id_order'], true);
            
            if ($refundStatus->status == 'error' || isset($refundStatus->error)) {
                foreach ($params['productList'] as $orderDetailLists) {
                    $productQtyRefunded = 0;

                    $idOrderDetail = $orderDetailLists['id_order_detail'];

                    $countOfOrderSlipDetail = Db::getInstance()->getRow('SELECT COUNT(id_order_slip) as '
                        . 'count_of_order_slip_detail from `'
                        . _DB_PREFIX_ . 'order_slip_detail` where id_order_detail = '
                        . (int) $idOrderDetail);

                    if ((int) $countOfOrderSlipDetail['count_of_order_slip_detail'] !== 1) {
                        $idOrderSlipDetail = Db::getInstance()->getRow('SELECT max(id_order_slip) as '
                        . ' id_order_slip from `'
                        . _DB_PREFIX_ . 'order_slip_detail` where id_order_detail = '
                        . (int) $idOrderDetail);
                    } else {
                        $idOrderSlipDetail['id_order_slip'] = 0;
                    }

                    Db::getInstance()->execute('DELETE from `'
                        . _DB_PREFIX_ . 'order_slip_detail` where id_order_slip = '
                        . (int) $idOrderSlipDetail['id_order_slip']);
                    Db::getInstance()->execute('DELETE from `' . _DB_PREFIX_ . 'order_slip` where id_order_slip = '
                        . (int) $idOrderSlipDetail['id_order_slip']);

                    $orderDetail = Db::getInstance()->getRow('SELECT * from `'
                        . _DB_PREFIX_ . 'order_detail` where id_order_detail = '
                        . (int) $idOrderDetail);
                    
                    $productQtyRefunded = (int) $orderDetail['product_quantity_refunded'] -
                    (int) $orderDetailLists['quantity'];
                    
                    $messageLog = 'Skrill - product qty refunded (' . $idOrderDetail .  ') : ' . $productQtyRefunded;
                    PrestaShopLogger::addLog($messageLog, 3, null, 'Order', $params['id_order'], true);
                    
                    Db::getInstance()->execute('UPDATE `' . _DB_PREFIX_ . 'order_detail` '
                        . ' set product_quantity_refunded = '
                        . (int) $productQtyRefunded . ' where id_order_detail = '
                        . (int) $idOrderDetail);
                }
                $this->context->cookie->skrill_status_refund = 'failed';
                $messageLog = 'Skrill - order has not been successfully partial refunded';
                PrestaShopLogger::addLog($messageLog, 3, null, 'Order', $params['id_order'], true);
                $this->redirectOrderDetail($params['order']->id);
            }
        }
    }

    public function hookdisplayAdminOrder()
    {
        $orderId = Tools::getValue('id_order');
        $sql = "SELECT * FROM skrill_order_ref WHERE id_order ='".(int)$orderId."'";
        $row = Db::getInstance()->getRow($sql);
        if ($row) {
            $paymentInfo = array();
            $backendPaymentMethod = str_replace('FRONTEND', 'BACKEND', $row['payment_method']);
            $paymentInfo['name'] = $this->getBackendPaymentLocale($backendPaymentMethod);
            $isSkrill = strpos($paymentInfo['name'], 'Skrill');
            if ($isSkrill === false && $backendPaymentMethod != 'SKRILL_BACKEND_PM_FLEXIBLE') {
                $paymentInfo['name'] = 'Skrill '.$paymentInfo['name'];
            }
            $trnStatus = SkrillPaymentCore::getTrnStatus($row['order_status']);
            $paymentInfo['status'] = $this->getTrnStatusLocale($trnStatus);
            $paymentInfo['method'] = $this->getFrontendPaymentLocale('SKRILL_FRONTEND_PM_'.$row['payment_code']);
            $paymentInfo['currency'] = $row['currency'];

            $additionalInformation = unserialize($row['add_information']);
            $langId = Context::getContext()->language->id;
            if (isset($additionalInformation['SKRILL_BACKEND_ORDER_ORIGIN'])) {
                $orderOriginId = $this->getCountryIdByIso($additionalInformation['SKRILL_BACKEND_ORDER_ORIGIN']);
                $paymentInfo['order_origin'] = Country::getNameById($langId, $orderOriginId);
            }
            if (isset($additionalInformation['SKRILL_BACKEND_ORDER_COUNTRY'])) {
                $orderCountryId = $this->getCountryIdByIso($additionalInformation['SKRILL_BACKEND_ORDER_COUNTRY']);
                $paymentInfo['order_country'] = Country::getNameById($langId, $orderCountryId);
            }
            if (isset($additionalInformation['BACKEND_TT_FRAUD'])) {
                $paymentInfo['fraudPayment'] = true;
            }

            $paymentInfo['transaction_id'] = $row['ref_id'];
            if ($row['payment_code'] == 'WLT') {
                $paymentInfo['skrill_account'] = $additionalInformation['SKRILL_BACKEND_EMAIL_ACCOUNT'];
            }

            $buttonUpdateOrder = false;
            if ($row['order_status'] == $this->pendingStatus
                || $row['order_status'] == $this->invalidCredentialStatus
            ) {
                $buttonUpdateOrder = true;
            }

            $buttonRefundOrder = false;
            if ($row['order_status'] == $this->processedStatus
                || $row['order_status'] == $this->fraudStatus
                || $row['order_status'] == $this->refundFailedStatus
            ) {
                $buttonRefundOrder = true;
            }

            $this->context->smarty->assign(array(
                'orderId' => (int)$orderId,
                'paymentInfo' => $paymentInfo,
                'buttonUpdateOrder' => $buttonUpdateOrder,
                'buttonRefundOrder' => $buttonRefundOrder
            ));

            return $this->display(__FILE__, 'views/templates/hook/displayAdminOrder.tpl');
        }
        return '';
    }

    public function updatePaymentStatus($orderId, $orderStatus)
    {
        $orderStatusId = false;
        if ($orderStatus == $this->processedStatus) {
            $orderStatusId = Configuration::get('PS_OS_PAYMENT');
            $status = 'CONFIRMED';
            $template = 'order_confirmed';
        } elseif ($orderStatus == $this->pendingStatus) {
            $orderStatusId = Configuration::get('SKRILL_PAYMENT_STATUS_PENDING');
        } elseif ($orderStatus == $this->failedStatus) {
            $orderStatusId = Configuration::get('SKRILL_PAYMENT_STATUS_FAILED');
        } elseif ($orderStatus == $this->refundedStatus) {
            $orderStatusId = Configuration::get('PS_OS_REFUND');
            $status = 'REFUND';
            $template = 'order_refund';
        }

        $messageLog = 'Skrill - update payment status : ' . $orderStatusId;
        PrestaShopLogger::addLog($messageLog, 1, null, 'Order', $orderId, true);

        if ($orderStatusId) {
            $order = new Order($orderId);
            $history = new OrderHistory();
            $history->id_order = (int)$orderId;
            $history->id_employee = isset($this->context->employee->id) ? (int)$this->context->employee->id : 0;

            $useExistingsPayment = false;
            if (!$order->hasInvoice()) {
                $useExistingsPayment = true;
            }
            $history->changeIdOrderState((int)($orderStatusId), $order, $useExistingsPayment);
            $history->addWithemail();
            $this->mailAlert($order, $order->payment, $status, $template);

            PrestaShopLogger::addLog('Skrill - payment status succefully updates', 1, null, 'Order', $orderId, true);
        }
    }

    private function getCountryIdByIso($countryIso)
    {
        if (Tools::strlen($countryIso) == 3) {
            $countryIso = SkrillPaymentCore::getCountryIso2ByIso3($countryIso);
        }

        $sql = "SELECT `id_country` FROM `"._DB_PREFIX_."country` WHERE `iso_code` = '".pSQL($countryIso)."'";
        $result = Db::getInstance()->getRow($sql);
        return (int)$result['id_country'];
    }

    protected function getTransactionLogByOrderId($orderId)
    {
        $sql = "SELECT * FROM skrill_order_ref WHERE id_order ='".(int)$orderId."'";
        return Db::getInstance()->getRow($sql);
    }

    protected function getRefundedNotificationMessage()
    {
        $notificationMessage = array();
        if ($this->context->cookie->skrill_status_refund == 'pending') {
            $notificationMessage['warning'] = "refund";
        } elseif ($this->context->cookie->skrill_status_refund == 'success') {
            $notificationMessage['success'] = "refund";
        } else {
            $notificationMessage['error'] = "refund";
        }
        unset($this->context->cookie->skrill_status_refund);

        return $notificationMessage;
    }

    protected function getUpdatedOrderNotificationMessage()
    {
        $notificationMessage = array();
        if ($this->context->cookie->skrill_status_update) {
            $notificationMessage['success'] = "updateOrder";
        } else {
            $notificationMessage['error'] = "updateOrder";
        }
        unset($this->context->cookie->skrill_status_update);

        return $notificationMessage;
    }

    protected function processUpdatedOrder($orderId, $trasanctionLog, $redirect = true)
    {
        PrestaShopLogger::addLog('Skrill - start update order process', 1, null, 'Order', $orderId, true);

        PrestaShopLogger::addLog('Skrill - get update order parameters', 1, null, 'Order', $orderId, true);
        $fieldParams = $this->getSkrillCredentials();
        $fieldParams['type'] = 'trn_id';
        $fieldParams['id'] = $trasanctionLog['transaction_id'];
        $logsParams = $fieldParams;
        $logsParams['password'] = '******';
        $messageLog = 'Skrill - update order parameters : '. print_r($logsParams, true);
        PrestaShopLogger::addLog($messageLog, 1, null, 'Order', $orderId, true);

        PrestaShopLogger::addLog('Skrill - get updated order response', 1, null, 'Order', $orderId, true);
        $paymentResponse = SkrillPaymentCore::isPaymentAccepted($fieldParams);
        $messageLog = 'Skrill - update order response : '. print_r($paymentResponse, true);
        PrestaShopLogger::addLog($messageLog, 1, null, 'Order', $orderId, true);

        if ($paymentResponse) {
            $this->updateTransactionLogStatus($trasanctionLog['ref_id'], $paymentResponse['status'], $orderId);
            if ($trasanctionLog['order_status'] != $this->processedStatus) {
                $this->updatePaymentStatus($orderId, $paymentResponse['status']);
            }
            $trasanctionLog = $this->getTransactionLogByOrderId($orderId);

            PrestaShopLogger::addLog('Skrill - order has been successfully updated', 1, null, 'Order', $orderId, true);
            $this->context->cookie->skrill_status_update = true;
        } else {
            $messageLog = 'Skrill - order has not been successfully updated';
            PrestaShopLogger::addLog($messageLog, 3, null, 'Order', $orderId, true);
            $this->context->cookie->skrill_status_update = false;
        }

        if ($redirect) {
            $this->redirectOrderDetail($orderId);
        } else {
            return $paymentResponse;
        }
    }

    protected function processRefundOrder($order, $orderId)
    {
        $order->setCurrentState(Configuration::get('PS_OS_REFUND'));
        $order->save();
        $this->redirectOrderDetail($orderId);
    }

    protected function redirectOrderDetail($orderId)
    {
        $getAdminLink = $this->context->link->getAdminLink('AdminOrders');
        $getViewOrder = $getAdminLink.'&vieworder&id_order='.$orderId;
        Tools::redirectAdmin($getViewOrder);
    }

    public function hookdisplayInvoice()
    {
        $orderId = Tools::getValue('id_order');
        $order = new Order((int)$orderId);
        $tplVars = array();
        $tplVars['refundButton'] = '0';
        $tplVars['successMessage'] = '';
        $tplVars['errorMessage'] = '';

        if (isset($this->context->cookie->skrill_status_refund)) {
            $notificationMessage = $this->getRefundedNotificationMessage();
        } elseif (isset($this->context->cookie->skrill_status_update)) {
            $notificationMessage = $this->getUpdatedOrderNotificationMessage();
        }

        $trasanctionLog = $this->getTransactionLogByOrderId($orderId);
        if ($trasanctionLog) {
            if (Tools::isSubmit('skrillUpdateOrder')
                && $trasanctionLog['order_status'] != $this->failedStatus
                && $trasanctionLog['order_status'] != $this->refundPendingStatus
                && $trasanctionLog['order_status'] != $this->refundedStatus) {
                $notificationMessage = $this->processUpdatedOrder($orderId, $trasanctionLog);
            } elseif (Tools::isSubmit('skrillRefundOrder') && (
                $trasanctionLog['order_status'] == $this->processedStatus
                || $trasanctionLog['order_status'] == $this->refundFailedStatus)) {
                $this->processRefundOrder($order, $orderId);
            }

            if ($trasanctionLog['order_status'] == $this->processedStatus
                || $trasanctionLog['order_status'] == $this->refundFailedStatus) {
                $tplVars['refundButton'] = true;
            }
        }

        $tplVars['module'] = $order->module;

        if (isset($notificationMessage['warning'])) {
            $tplVars['warningMessage'] = $notificationMessage['warning'];
        }
        if (isset($notificationMessage['success'])) {
            $tplVars['successMessage'] = $notificationMessage['success'];
        }
        if (isset($notificationMessage['error'])) {
            $tplVars['errorMessage'] = $notificationMessage['error'];
        }

        $this->context->smarty->assign($tplVars);

        return $this->display(__FILE__, 'views/templates/hook/displayStatusOrder.tpl');
    }

    private function getEnabledPayments()
    {
        $address = new Address((int)$this->context->cart->id_address_delivery);
        $country = new Country($address->id_country);
        $countryCode = $country->iso_code;
        $countryCode3Digit = SkrillPaymentCore::getCountryIso3ByIso2($countryCode);
        $supportedPayments = SkrillPaymentCore::getSupportedPaymentsByCountryCode($countryCode);

        $paymentSort = 1000;
        $paymentsConfig = array();
        $paymentMethods = SkrillPaymentCore::getPaymentMethods();

        foreach ($supportedPayments as $paymentType) {
            $isActive = Configuration::get('SKRILL_'.$paymentType.'_ACTIVE');

            if ($paymentType == 'VSA' || $paymentType == 'MSC') {
                if (Configuration::get('SKRILL_ACC_MODE') == 1 || Configuration::get('SKRILL_ACC_ACTIVE') == 0) {
                    $isShowSeparately = 1;
                } else {
                    $isShowSeparately = 0;
                }
            } else {
                $isShowSeparately = 1;
            }
            
            if ($isActive && $isShowSeparately) {
                $paymentsConfig[$paymentSort] = array(
                   'name' => Tools::strtolower($paymentType)
                );
                
                if (isset($paymentMethods[$paymentType]['allowedCountries'][$countryCode3Digit])) {
                    $bankOfCountries = $paymentMethods[$paymentType]['allowedCountries'][$countryCode3Digit];
                    foreach ($bankOfCountries as $bankLogo) {
                        $paymentsConfig[$paymentSort]['logos'][] = $bankLogo;
                    }
                }
            }
            $paymentSort++;
        }
        ksort($paymentsConfig);

        return $paymentsConfig;
    }

    public function checkCurrency($cart)
    {
        $currencyOrder = new Currency($cart->id_currency);
        $currencyModules = $this->getCurrency($cart->id_currency);

        if (is_array($currencyModules)) {
            foreach ($currencyModules as $currencyModule) {
                if ($currencyOrder->id == $currencyModule['id_currency']) {
                    return true;
                }
            }
        }
        return false;
    }

    public function hookHeader($parameters)
    {
        $this->context->controller->addCSS(($this->_path).'views/css/payment_options.css', 'all');
    }

    public function hookPaymentOptions($parameters)
    {
        if (!$this->active) {
            return;
        }

        if (!$this->checkCurrency($parameters['cart'])) {
            return;
        }
        
        $paymentOptions = array();
        $enabledPayments = $this->getEnabledPayments();

        foreach ($enabledPayments as $value) {
            $newOption = new PaymentOption();
            $paymentController = $this->context->link->getModuleLink(
                $this->name,
                'payment'.Tools::ucfirst($value['name']),
                array(),
                true
            );
            $logo = Media::getMediaPath(_PS_MODULE_DIR_.$this->name.'/views/img/'.$value['name'].'.jpg');

            $logoHtml = '';
            $paymentName = '';

            if (in_array(Tools::strtoupper($value['name']), $this->paymentMethodShowTitleLogo)) {
                $paymentName = $this->getFrontendPaymentLocale('SKRILL_FRONTEND_PM_'.Tools::strtoupper($value['name']));
                $logo = '';
                foreach ($value['logos'] as $val) {
                    $logos = Media::getMediaPath(_PS_MODULE_DIR_ . $this->name . '/views/img/' . $val);
                    $logoHtml .= "<img src='".$logos."' height='25' style='margin: 0px 10px 20px' title='".
                        $paymentName."'/>";
                }
            }

            $newOption  ->setCallToActionText($paymentName)
                        ->setAction($paymentController)
                        ->setAdditionalInformation($logoHtml)
                        ->setLogo($logo);

            $paymentOptions[] = $newOption;
        }

        return $paymentOptions;
    }

    public function hookPaymentReturn($parameters)
    {
        if (!$this->active) {
            return;
        }

        $state = $parameters['order']->getCurrentState();
        PrestaShopLogger::addLog(
            'Skrill - State payment return: '.$state,
            1,
            null,
            'cart',
            $this->context->cart->id,
            true
        );
        $template = '';
        if ($state == Configuration::get('PS_OS_PAYMENT')
            || $state == Configuration::get('SKRILL_PAYMENT_STATUS_PENDING')
            || $state == Configuration::get('SKRILL_PAYMENT_STATUS_INVALID')
            || $state == Configuration::get('SKRILL_PAYMENT_STATUS_FRAUD')
            || $state == 0) {
            $this->smarty->assign(array(
                'shop_name' => $this->context->shop->name,
                'status' => 'ok'
            ));
            if (isset($parameters['order']->reference) && !empty($parameters['order']->reference)) {
                $this->smarty->assign('reference', $parameters['order']->reference);
            }
            $status='SUCCESFUL';
            $template='order_successful';

            $this->mailAlert($parameters['order'], $this->context->cookie->skrill_paymentName, $status, $template);
        }

        unset($this->context->cookie->skrill_paymentName);

        return $this->display(__FILE__, 'payment_return.tpl');
    }

    public function refundOrder($params, &$refId, $isFraud = false, $isPartial = false)
    {
        $fieldParams = $this->getSkrillCredentials();
        if (!$isFraud) {
            $sql = "SELECT * FROM skrill_order_ref WHERE id_order ='".(int)$params['id_order']."'";
            $row = Db::getInstance()->getRow($sql);

            $fieldParams['refund_status_url'] = $this->context->link->getModuleLink(
                'skrill',
                'refundStatus',
                array('transactionId' => $row['transaction_id']),
                true
            );
            $objectType = 'Order';
            $objectId = $params['id_order'];
             PrestaShopLogger::addLog('Skrill - start refund process', 1, null, $objectType, $objectId, true);
        } else {
            $objectType = 'Cart';
            $objectId = $this->context->cart->id;
        }

        $amount = isset($row['amount']) ? $row['amount'] : $params['amount'];
        $refId = isset($row['ref_id']) ? $row['ref_id'] : $params['mb_transaction_id'];
        if ($isPartial) {
            $amount = self::setNumberFormat($params['amount']);
            $refId = $row['ref_id'];
        }

        PrestaShopLogger::addLog('Skrill - get refund parameters', 1, null, $objectType, $objectId, true);
        $fieldParams['mb_transaction_id'] = $refId;
        $fieldParams['amount'] = $amount;
        $logsParams = $fieldParams;
        $logsParams['password'] = '******';
        $messageLog = 'Skrill - update order parameters : '. print_r($logsParams, true);
        PrestaShopLogger::addLog($messageLog, 1, null, $objectType, $objectId, true);

        PrestaShopLogger::addLog('Skrill - get refund response', 1, null, $objectType, $objectId, true);
        $refundResult = SkrillPaymentCore::doRefund('prepare', $fieldParams);
        $sid = (string) $refundResult->sid;

        $refundResult = SkrillPaymentCore::doRefund('refund', $sid);
        $messageLog = 'Skrill - refund response : '. print_r($refundResult, true);
        PrestaShopLogger::addLog($messageLog, 1, null, $objectType, $objectId, true);

        if (!$refundResult) {
            $refundResult['status'] = "error";
        }

        return $refundResult;
    }

    public function hookUpdateOrderStatus($params)
    {
        $order = new Order((int)($params['id_order']));
        $trasanctionLog = $this->getTransactionLogByOrderId($params['id_order']);

        if ($order->module == "skrill"
            && $order->current_state == Configuration::get('PS_OS_PAYMENT')
            && $params['newOrderStatus']->id == Configuration::get('PS_OS_REFUND')
        ) {
            if ($trasanctionLog['order_status'] == $this->processedStatus
                || $trasanctionLog['order_status'] == $this->refundFailedStatus
            ) {
                $refId = '';
                $refundResult = $this->refundOrder($params, $refId);
                $refundStatus = (string) $refundResult->status;

                if ($refundStatus == $this->processedStatus) {
                    $status = 'REFUND';
                    $template = 'order_refund';
                    $this->updateTransactionLogStatus($refId, $this->refundedStatus, $params['id_order']);
                    foreach ($order->getProductsDetail() as $product) {
                        StockAvailable::updateQuantity(
                            $product['product_id'],
                            $product['product_attribute_id'],
                            (int) $product['product_quantity'],
                            $order->id_shop
                        );
                    }
                    $this->mailAlert($order, $order->payment, $status, $template);
                    $this->context->cookie->skrill_status_refund = 'success';
                    $messageLog = 'Skrill - order has been successfully refunded';
                    PrestaShopLogger::addLog($messageLog, 1, null, 'Order', $params['id_order'], true);
                } elseif ($refundStatus == $this->pendingStatus) {
                    $this->updateTransactionLogStatus($refId, $this->refundPendingStatus, $params['id_order']);
                    $this->context->cookie->skrill_status_refund = 'pending';
                    $messageLog = 'Skrill - order has been successfully refunded';
                    PrestaShopLogger::addLog($messageLog, 1, null, 'Order', $params['id_order'], true);
                    $this->redirectOrderDetail($params['id_order']);
                } else {
                    $this->updateTransactionLogStatus($refId, $this->refundFailedStatus, $params['id_order']);
                    $this->context->cookie->skrill_status_refund = 'failed';
                    $messageLog = 'Skrill - order has not been successfully refunded';
                    PrestaShopLogger::addLog($messageLog, 3, null, 'Order', $params['id_order'], true);
                    $this->redirectOrderDetail($params['id_order']);
                }
            }
        } elseif ($order->module == "skrill"
            && $order->current_state == Configuration::get('SKRILL_PAYMENT_STATUS_PENDING')
            && $params['newOrderStatus']->id == Configuration::get('PS_OS_PAYMENT')
        ) {
            if (Tools::isSubmit('submitState')) {
                $redirect = false;
                $updatedOrder = $this->processUpdatedOrder($params['id_order'], $trasanctionLog, $redirect);
                if (isset($updatedOrder['status']) && $updatedOrder['status'] == $this->processedStatus) {
                    $status = 'CONFIRMED';
                    $template = 'order_confirmed';
                    $this->mailAlert($order, $order->payment, $status, $template);
                } else {
                    $this->redirectOrderDetail($params['id_order']);
                }
            }
        }
    }

    public function updateTransactionLogStatus($refId, $orderStatus, $orderId = false)
    {
        $sql = "UPDATE skrill_order_ref SET order_status = '".pSQL($orderStatus)."' where ref_id = '".pSQL($refId)."'";

        if ($orderId) {
            $objectType = 'Order';
            $objectId = $orderId;
        } else {
            $objectType = 'Cart';
            $objectId = $this->context->cart->id;
        }

        $messageLog = 'Skrill - update transaction log status : '. $sql;
        PrestaShopLogger::addLog($messageLog, 1, null, $objectType, $objectId, true);

        if (!Db::getInstance()->execute($sql)) {
            $messageLog = 'Skrill - failed when updating transaction log status';
            PrestaShopLogger::addLog($messageLog, 3, null, $objectType, $objectId, true);
            die('Erreur etc.');
        }
        $messageLog = 'Skrill - transaction log status succefully saved';
        PrestaShopLogger::addLog($messageLog, 1, null, $objectType, $objectId, true);
    }

    public function setNumberFormat($number)
    {
        $number = (float) str_replace(',', '.', $number);
        return number_format($number, 2, '.', '');
    }

    public function isPaymentSignatureEqualsGeneratedSignature($paymentSignature, $generatedSignature)
    {
        return ($paymentSignature == $generatedSignature);
    }

    public function isFraud($generatedAntiFraudHash, $antiFraudHash)
    {
        return !($generatedAntiFraudHash == $antiFraudHash);
    }

    public function generateAntiFraudHash($cartId, $paymentMethod, $cartDate)
    {
        return md5($cartId . $paymentMethod . $cartDate);
    }

    /**
    * Check that this payment option is still available in case the customer
    * changed his address just before the end of the checkout process
    * @return boolean
    */
    public function isAuthorized()
    {
        $isAuthorized = false;
        foreach (Module::getPaymentModules() as $module) {
            if ($module['name'] == 'skrill') {
                $isAuthorized = true;
                break;
            }
        }

        return $isAuthorized;
    }

    public function generateMd5sig($paymentResponse)
    {
        $merchantId = Configuration::get('SKRILL_GENERAL_MERCHANTID');
        $secretWord = Tools::strtoupper(Configuration::get('SKRILL_GENERAL_SECRETWORD'));
        $transactionId = $paymentResponse['transaction_id'];
        $mbAmount = $paymentResponse['mb_amount'];
        $mbCurrency = $paymentResponse['mb_currency'];
        $status = $paymentResponse['status'];
        $string = $merchantId.$transactionId.$secretWord.$mbAmount.$mbCurrency.$status;

        return Tools::strtoupper(md5($string));
    }

    public function processFraudPayment($paymentResponse)
    {
        $cartId = $this->context->cart->id;
        $refId = '';
        PrestaShopLogger::addLog('Skrill - process refund (fraud payment)', 3, null, 'Cart', $cartId, true);

        $refundResult = $this->refundOrder($paymentResponse, $refId);

        $refundStatus = (string) $refundResult->status;
        if ($refundStatus == $this->processedStatus) {
            PrestaShopLogger::addLog('Skrill - payment is fraud and refunded', 3, null, 'Cart', $cartId, true);
        } else {
            PrestaShopLogger::addLog('Skrill - payment is fraud but not refunded', 3, null, 'Cart', $cartId, true);
        }

        return $refundStatus;
    }

    public function getOrderByTransactionId($transactionId)
    {
        $sql = "SELECT * FROM skrill_order_ref WHERE transaction_id ='".pSQL($transactionId)."'";
        $order = Db::getInstance()->getRow($sql);

        return $order;
    }

    private function getFrontendPaymentLocale($paymentMethod)
    {
        switch ($paymentMethod) {
            case 'SKRILL_FRONTEND_PM_FLEXIBLE':
                if ($this->l('SKRILL_FRONTEND_PM_FLEXIBLE') == "SKRILL_FRONTEND_PM_FLEXIBLE") {
                    $paymentLocale = "Pay By Skrill";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_FLEXIBLE');
                }
                break;
            case 'SKRILL_FRONTEND_PM_WLT':
                if ($this->l('SKRILL_FRONTEND_PM_WLT') == "SKRILL_FRONTEND_PM_WLT") {
                    $paymentLocale = "Skrill Wallet";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_WLT');
                }
                break;
            case 'SKRILL_FRONTEND_PM_PSC':
                if ($this->l('SKRILL_FRONTEND_PM_PSC') == "SKRILL_FRONTEND_PM_PSC") {
                    $paymentLocale = "Paysafecard";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_PSC');
                }
                break;
            case 'SKRILL_FRONTEND_PM_PCH':
                if ($this->l('SKRILL_FRONTEND_PM_PCH') == "SKRILL_FRONTEND_PM_PCH") {
                    $paymentLocale = "Paysafecash";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_PCH');
                }
                break;
            case 'SKRILL_FRONTEND_PM_ACC':
                if ($this->l('SKRILL_FRONTEND_PM_ACC') == "SKRILL_FRONTEND_PM_ACC") {
                    $paymentLocale = "Credit Card / Visa, Mastercard";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_ACC');
                }
                break;
            case 'SKRILL_FRONTEND_PM_VSA':
                if ($this->l('SKRILL_FRONTEND_PM_VSA') == "SKRILL_FRONTEND_PM_VSA") {
                    $paymentLocale = "Visa";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_VSA');
                }
                break;
            case 'SKRILL_FRONTEND_PM_MSC':
                if ($this->l('SKRILL_FRONTEND_PM_MSC') == "SKRILL_FRONTEND_PM_MSC") {
                    $paymentLocale = "MasterCard";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_MSC');
                }
                break;
            case 'SKRILL_FRONTEND_PM_MAE':
                if ($this->l('SKRILL_FRONTEND_PM_MAE') == "SKRILL_FRONTEND_PM_MAE") {
                    $paymentLocale = "Maestro";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_MAE');
                }
                break;
            case 'SKRILL_FRONTEND_PM_GCB':
                if ($this->l('SKRILL_FRONTEND_PM_GCB') == "SKRILL_FRONTEND_PM_GCB") {
                    $paymentLocale = "Carte Bleue by Visa";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_GCB');
                }
                break;
            case 'SKRILL_FRONTEND_PM_DNK':
                if ($this->l('SKRILL_FRONTEND_PM_DNK') == "SKRILL_FRONTEND_PM_DNK") {
                    $paymentLocale = "Dankort by Visa";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_DNK');
                }
                break;
            case 'SKRILL_FRONTEND_PM_PSP':
                if ($this->l('SKRILL_FRONTEND_PM_PSP') == "SKRILL_FRONTEND_PM_PSP") {
                    $paymentLocale = "PostePay by Visa";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_PSP');
                }
                break;
            case 'SKRILL_FRONTEND_PM_CSI':
                if ($this->l('SKRILL_FRONTEND_PM_CSI') == "SKRILL_FRONTEND_PM_CSI") {
                    $paymentLocale = "CartaSi by Visa";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_CSI');
                }
                break;
            case 'SKRILL_FRONTEND_PM_OBT':
                if ($this->l('SKRILL_FRONTEND_PM_OBT') == "SKRILL_FRONTEND_PM_OBT") {
                    $paymentLocale = "Rapid Transfer";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_OBT');
                }
                break;
            case 'SKRILL_FRONTEND_PM_GIR':
                if ($this->l('SKRILL_FRONTEND_PM_GIR') == "SKRILL_FRONTEND_PM_GIR") {
                    $paymentLocale = "Giropay";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_GIR');
                }
                break;
            case 'SKRILL_FRONTEND_PM_SFT':
                if ($this->l('SKRILL_FRONTEND_PM_SFT') == "SKRILL_FRONTEND_PM_SFT") {
                    $paymentLocale = "Klarna";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_SFT');
                }
                break;
            case 'SKRILL_FRONTEND_PM_EBT':
                if ($this->l('SKRILL_FRONTEND_PM_EBT') == "SKRILL_FRONTEND_PM_EBT") {
                    $paymentLocale = "Nordea Solo";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_EBT');
                }
                break;
            case 'SKRILL_FRONTEND_PM_IDL':
                if ($this->l('SKRILL_FRONTEND_PM_IDL') == "SKRILL_FRONTEND_PM_IDL") {
                    $paymentLocale = "iDEAL";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_IDL');
                }
                break;
            case 'SKRILL_FRONTEND_PM_NPY':
                if ($this->l('SKRILL_FRONTEND_PM_NPY') == "SKRILL_FRONTEND_PM_NPY") {
                    $paymentLocale = "EPS (Netpay)";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_NPY');
                }
                break;
            case 'SKRILL_FRONTEND_PM_PLI':
                if ($this->l('SKRILL_FRONTEND_PM_PLI') == "SKRILL_FRONTEND_PM_PLI") {
                    $paymentLocale = "POLi";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_PLI');
                }
                break;
            case 'SKRILL_FRONTEND_PM_PWY':
                if ($this->l('SKRILL_FRONTEND_PM_PWY') == "SKRILL_FRONTEND_PM_PWY") {
                    $paymentLocale = "Przelewy24";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_PWY');
                }
                break;
            case 'SKRILL_FRONTEND_PM_EPY':
                if ($this->l('SKRILL_FRONTEND_PM_EPY') == "SKRILL_FRONTEND_PM_EPY") {
                    $paymentLocale = "ePay.bg";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_EPY');
                }
                break;
            case 'SKRILL_FRONTEND_PM_GLU':
                if ($this->l('SKRILL_FRONTEND_PM_GLU') == "SKRILL_FRONTEND_PM_GLU") {
                    $paymentLocale = "Trustly";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_GLU');
                }
                break;
            case 'SKRILL_FRONTEND_PM_ALI':
                if ($this->l('SKRILL_FRONTEND_PM_ALI') == "SKRILL_FRONTEND_PM_ALI") {
                    $paymentLocale = "Alipay";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_ALI');
                }
                break;
            case 'SKRILL_FRONTEND_PM_NTL':
                if ($this->l('SKRILL_FRONTEND_PM_NTL') == "SKRILL_FRONTEND_PM_NTL") {
                    $paymentLocale = "Neteller";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_NTL');
                }
                break;
            case 'SKRILL_FRONTEND_PM_ADB':
                if ($this->l('SKRILL_FRONTEND_PM_ADB') == "SKRILL_FRONTEND_PM_ADB") {
                    $paymentLocale = "Direct Bank Transfer";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_ADB');
                }
                break;
            case 'SKRILL_FRONTEND_PM_AOB':
                if ($this->l('SKRILL_FRONTEND_PM_AOB') == "SKRILL_FRONTEND_PM_AOB") {
                    $paymentLocale = "Manual Bank Transfer";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_AOB');
                }
                break;
            case 'SKRILL_FRONTEND_PM_ACI':
                if ($this->l('SKRILL_FRONTEND_PM_ACI') == "SKRILL_FRONTEND_PM_ACI") {
                    $paymentLocale = "Cash / Invoice";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_ACI');
                }
                break;
            case 'SKRILL_FRONTEND_PM_AUP':
                if ($this->l('SKRILL_FRONTEND_PM_AUP') == "SKRILL_FRONTEND_PM_AUP") {
                    $paymentLocale = "Unionpay";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_AUP');
                }
                break;
            default:
                if ($this->l('SKRILL_FRONTEND_PM_FLEXIBLE') == "SKRILL_FRONTEND_PM_FLEXIBLE") {
                    $paymentLocale = "All Cards and Alternative Payment Methods";
                } else {
                    $paymentLocale = $this->l('SKRILL_FRONTEND_PM_FLEXIBLE');
                }
                break;
        }

        return $paymentLocale;
    }

    private function getBackendPaymentLocale($paymentMethod)
    {
        switch ($paymentMethod) {
            case 'SKRILL_BACKEND_PM_FLEXIBLE':
                if ($this->l('SKRILL_BACKEND_PM_FLEXIBLE') == "SKRILL_BACKEND_PM_FLEXIBLE") {
                    $paymentLocale = "All Cards and Alternative Payment Methods";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_FLEXIBLE');
                }
                break;
            case 'SKRILL_BACKEND_PM_WLT':
                if ($this->l('SKRILL_BACKEND_PM_WLT') == "SKRILL_BACKEND_PM_WLT") {
                    $paymentLocale = "Skrill Wallet";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_WLT');
                }
                break;
            case 'SKRILL_BACKEND_PM_PSC':
                if ($this->l('SKRILL_BACKEND_PM_PSC') == "SKRILL_BACKEND_PM_PSC") {
                    $paymentLocale = "Paysafecard";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_PSC');
                }
                break;
            case 'SKRILL_BACKEND_PM_PCH':
                if ($this->l('SKRILL_BACKEND_PM_PCH') == "SKRILL_BACKEND_PM_PCH") {
                    $paymentLocale = "Paysafecash";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_PCH');
                }
                break;
            case 'SKRILL_BACKEND_PM_ACC':
                if ($this->l('SKRILL_BACKEND_PM_ACC') == "SKRILL_BACKEND_PM_ACC") {
                    $paymentLocale = "Credit Card / Visa, Mastercard";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_ACC');
                }
                break;
            case 'SKRILL_BACKEND_PM_VSA':
                if ($this->l('SKRILL_BACKEND_PM_VSA') == "SKRILL_BACKEND_PM_VSA") {
                    $paymentLocale = "Visa";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_VSA');
                }
                break;
            case 'SKRILL_BACKEND_PM_MSC':
                if ($this->l('SKRILL_BACKEND_PM_MSC') == "SKRILL_BACKEND_PM_MSC") {
                    $paymentLocale = "MasterCard";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_MSC');
                }
                break;
            case 'SKRILL_BACKEND_PM_AMX':
                if ($this->l('SKRILL_BACKEND_PM_AMX') == "SKRILL_BACKEND_PM_AMX") {
                    $paymentLocale = "American Express";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_AMX');
                }
                break;
            case 'SKRILL_BACKEND_PM_GCB':
                if ($this->l('SKRILL_BACKEND_PM_GCB') == "SKRILL_BACKEND_PM_GCB") {
                    $paymentLocale = "Carte Bleue by Visa";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_GCB');
                }
                break;
            case 'SKRILL_BACKEND_PM_DNK':
                if ($this->l('SKRILL_BACKEND_PM_DNK') == "SKRILL_BACKEND_PM_DNK") {
                    $paymentLocale = "Dankort by Visa";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_DNK');
                }
                break;
            case 'SKRILL_BACKEND_PM_PSP':
                if ($this->l('SKRILL_BACKEND_PM_PSP') == "SKRILL_BACKEND_PM_PSP") {
                    $paymentLocale = "PostePay by Visa";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_PSP');
                }
                break;
            case 'SKRILL_BACKEND_PM_CSI':
                if ($this->l('SKRILL_BACKEND_PM_CSI') == "SKRILL_BACKEND_PM_CSI") {
                    $paymentLocale = "CartaSi by Visa";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_CSI');
                }
                break;
            case 'SKRILL_BACKEND_PM_OBT':
                if ($this->l('SKRILL_BACKEND_PM_OBT') == "SKRILL_BACKEND_PM_OBT") {
                    $paymentLocale = "Rapid Transfer";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_OBT');
                }
                break;
            case 'SKRILL_BACKEND_PM_GIR':
                if ($this->l('SKRILL_BACKEND_PM_GIR') == "SKRILL_BACKEND_PM_GIR") {
                    $paymentLocale = "Giropay";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_GIR');
                }
                break;
            case 'SKRILL_BACKEND_PM_SFT':
                if ($this->l('SKRILL_BACKEND_PM_SFT') == "SKRILL_BACKEND_PM_SFT") {
                    $paymentLocale = "Klarna";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_SFT');
                }
                break;
            case 'SKRILL_BACKEND_PM_EBT':
                if ($this->l('SKRILL_BACKEND_PM_EBT') == "SKRILL_BACKEND_PM_EBT") {
                    $paymentLocale = "Nordea Solo";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_EBT');
                }
                break;
            case 'SKRILL_BACKEND_PM_IDL':
                if ($this->l('SKRILL_BACKEND_PM_IDL') == "SKRILL_BACKEND_PM_IDL") {
                    $paymentLocale = "iDEAL";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_IDL');
                }
                break;
            case 'SKRILL_BACKEND_PM_NPY':
                if ($this->l('SKRILL_BACKEND_PM_NPY') == "SKRILL_BACKEND_PM_NPY") {
                    $paymentLocale = "EPS (Netpay)";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_NPY');
                }
                break;
            case 'SKRILL_BACKEND_PM_PLI':
                if ($this->l('SKRILL_BACKEND_PM_PLI') == "SKRILL_BACKEND_PM_PLI") {
                    $paymentLocale = "POLi";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_PLI');
                }
                break;
            case 'SKRILL_BACKEND_PM_PWY':
                if ($this->l('SKRILL_BACKEND_PM_PWY') == "SKRILL_BACKEND_PM_PWY") {
                    $paymentLocale = "Przelewy24";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_PWY');
                }
                break;
            case 'SKRILL_BACKEND_PM_EPY':
                if ($this->l('SKRILL_BACKEND_PM_EPY') == "SKRILL_BACKEND_PM_EPY") {
                    $paymentLocale = "ePay.bg";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_EPY');
                }
                break;
            case 'SKRILL_BACKEND_PM_GLU':
                if ($this->l('SKRILL_BACKEND_PM_GLU') == "SKRILL_BACKEND_PM_GLU") {
                    $paymentLocale = "Trustly";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_GLU');
                }
                break;
            case 'SKRILL_BACKEND_PM_ALI':
                if ($this->l('SKRILL_BACKEND_PM_ALI') == "SKRILL_BACKEND_PM_ALI") {
                    $paymentLocale = "Alipay";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_ALI');
                }
                break;
            case 'SKRILL_BACKEND_PM_NTL':
                if ($this->l('SKRILL_BACKEND_PM_NTL') == "SKRILL_BACKEND_PM_NTL") {
                    $paymentLocale = "Neteller";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_NTL');
                }
                break;
            case 'SKRILL_BACKEND_PM_ADB':
                if ($this->l('SKRILL_BACKEND_PM_ADB') == "SKRILL_BACKEND_PM_ADB") {
                    $paymentLocale = "Direct Bank Transfer";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_ADB');
                }
                break;
            case 'SKRILL_BACKEND_PM_AOB':
                if ($this->l('SKRILL_BACKEND_PM_AOB') == "SKRILL_BACKEND_PM_AOB") {
                    $paymentLocale = "Manual Bank Transfer";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_AOB');
                }
                break;
            case 'SKRILL_BACKEND_PM_ACI':
                if ($this->l('SKRILL_BACKEND_PM_ACI') == "SKRILL_BACKEND_PM_ACI") {
                    $paymentLocale = "Cash / Invoice";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_ACI');
                }
                break;
            case 'SKRILL_BACKEND_PM_AUP':
                if ($this->l('SKRILL_BACKEND_PM_AUP') == "SKRILL_BACKEND_PM_AUP") {
                    $paymentLocale = "Unionpay";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_PM_AUP');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_REDLINK':
                if ($this->l('SKRILL_BACKEND_AB_ACI_REDLINK') == "SKRILL_BACKEND_AB_ACI_REDLINK") {
                    $paymentLocale = "RedLink";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_REDLINK');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_PAGOFACIL':
                if ($this->l('SKRILL_BACKEND_AB_ACI_PAGOFACIL') == "SKRILL_BACKEND_AB_ACI_PAGOFACIL") {
                    $paymentLocale = "Pago Fácil";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_PAGOFACIL');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_BOLETOBANCARIO':
                if ($this->l('SKRILL_BACKEND_AB_ACI_BOLETOBANCARIO') == "SKRILL_BACKEND_AB_ACI_BOLETOBANCARIO") {
                    $paymentLocale = "Boleto Bancário";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_BOLETOBANCARIO');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_SERVIPAG':
                if ($this->l('SKRILL_BACKEND_AB_ACI_SERVIPAG') == "SKRILL_BACKEND_AB_ACI_SERVIPAG") {
                    $paymentLocale = "Servi Pag";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_SERVIPAG');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_EFECTY':
                if ($this->l('SKRILL_BACKEND_AB_ACI_EFECTY') == "SKRILL_BACKEND_AB_ACI_EFECTY") {
                    $paymentLocale = "Efecty";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_EFECTY');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_DAVIVIENDA':
                if ($this->l('SKRILL_BACKEND_AB_ACI_DAVIVIENDA') == "SKRILL_BACKEND_AB_ACI_DAVIVIENDA") {
                    $paymentLocale = "Davivienda";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_DAVIVIENDA');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_EXITO':
                if ($this->l('SKRILL_BACKEND_AB_ACI_EXITO') == "SKRILL_BACKEND_AB_ACI_EXITO") {
                    $paymentLocale = "Éxito";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_EXITO');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_BANCODEOCCIDENTE':
                if ($this->l('SKRILL_BACKEND_AB_ACI_BANCODEOCCIDENTE') == "SKRILL_BACKEND_AB_ACI_BANCODEOCCIDENTE") {
                    $paymentLocale = "Banco de Occidente";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_BANCODEOCCIDENTE');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_CARULLA':
                if ($this->l('SKRILL_BACKEND_AB_ACI_CARULLA') == "SKRILL_BACKEND_AB_ACI_CARULLA") {
                    $paymentLocale = "Carulla";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_CARULLA');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_EDEQ':
                if ($this->l('SKRILL_BACKEND_AB_ACI_EDEQ') == "SKRILL_BACKEND_AB_ACI_EDEQ") {
                    $paymentLocale = "EDEQ";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_EDEQ');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_SURTIMAX':
                if ($this->l('SKRILL_BACKEND_AB_ACI_SURTIMAX') == "SKRILL_BACKEND_AB_ACI_SURTIMAX") {
                    $paymentLocale = "SurtiMax";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_SURTIMAX');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_BBVABANCOMER':
                if ($this->l('SKRILL_BACKEND_AB_ACI_BBVABANCOMER') == "SKRILL_BACKEND_AB_ACI_BBVABANCOMER") {
                    $paymentLocale = "BBVA Bancomer";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_BBVABANCOMER');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_OXXO':
                if ($this->l('SKRILL_BACKEND_AB_ACI_OXXO') == "SKRILL_BACKEND_AB_ACI_OXXO") {
                    $paymentLocale = "OXXO";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_OXXO');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_BANAMEX':
                if ($this->l('SKRILL_BACKEND_AB_ACI_BANAMEX') == "SKRILL_BACKEND_AB_ACI_BANAMEX") {
                    $paymentLocale = "Banamex";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_BANAMEX');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_BANCOSANTANDER':
                if ($this->l('SKRILL_BACKEND_AB_ACI_BANCOSANTANDER') == "SKRILL_BACKEND_AB_ACI_BANCOSANTANDER") {
                    $paymentLocale = "Banco Santander";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_BANCOSANTANDER');
                }
                break;
            case 'SKRILL_BACKEND_AB_ACI_REDPAGOS':
                if ($this->l('SKRILL_BACKEND_AB_ACI_REDPAGOS') == "SKRILL_BACKEND_AB_ACI_REDPAGOS") {
                    $paymentLocale = "Redpagos";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ACI_REDPAGOS');
                }
                break;
            case 'SKRILL_BACKEND_AB_ADB_BANCOSANTANDERRIO':
                if ($this->l('SKRILL_BACKEND_AB_ADB_BANCOSANTANDERRIO') =="SKRILL_BACKEND_AB_ADB_BANCOSANTANDERRIO") {
                    $paymentLocale = "Banco Santander Río";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ADB_BANCOSANTANDERRIO');
                }
                break;
            case 'SKRILL_BACKEND_AB_ADB_BANCOITAU':
                if ($this->l('SKRILL_BACKEND_AB_ADB_BANCOITAU') == "SKRILL_BACKEND_AB_ADB_BANCOITAU") {
                    $paymentLocale = "Banco Itaú";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ADB_BANCOITAU');
                }
                break;
            case 'SKRILL_BACKEND_AB_ADB_BANCODOBRASIL':
                if ($this->l('SKRILL_BACKEND_AB_ADB_BANCODOBRASIL') == "SKRILL_BACKEND_AB_ADB_BANCODOBRASIL") {
                    $paymentLocale = "Banco do Brasil";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ADB_BANCODOBRASIL');
                }
                break;
            case 'SKRILL_BACKEND_AB_ADB_BANCOBRADESCO':
                if ($this->l('SKRILL_BACKEND_AB_ADB_BANCOBRADESCO') == "SKRILL_BACKEND_AB_ADB_BANCOBRADESCO") {
                    $paymentLocale = "Banco Bradesco";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_ADB_BANCOBRADESCO');
                }
                break;
            case 'SKRILL_BACKEND_AB_AOB_HSBC':
                if ($this->l('SKRILL_BACKEND_AB_AOB_HSBC') == "SKRILL_BACKEND_AB_AOB_HSBC") {
                    $paymentLocale = "HSBC";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_AOB_HSBC');
                }
                break;
            case 'SKRILL_BACKEND_AB_AOB_CAIXA':
                if ($this->l('SKRILL_BACKEND_AB_AOB_CAIXA') == "SKRILL_BACKEND_AB_AOB_CAIXA") {
                    $paymentLocale = "Caixa";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_AOB_CAIXA');
                }
                break;
            case 'SKRILL_BACKEND_AB_AOB_SANTANDER':
                if ($this->l('SKRILL_BACKEND_AB_AOB_SANTANDER') == "SKRILL_BACKEND_AB_AOB_SANTANDER") {
                    $paymentLocale = "Santander";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_AOB_SANTANDER');
                }
                break;
            case 'SKRILL_BACKEND_AB_AOB_PSEI':
                if ($this->l('SKRILL_BACKEND_AB_AOB_PSEI') == "SKRILL_BACKEND_AB_AOB_PSEI") {
                    $paymentLocale = "PSEi";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_AOB_PSEI');
                }
                break;
            case 'SKRILL_BACKEND_AB_AOB_WEBPAY':
                if ($this->l('SKRILL_BACKEND_AB_AOB_WEBPAY') == "SKRILL_BACKEND_AB_AOB_WEBPAY") {
                    $paymentLocale = "WebPay";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_AOB_WEBPAY');
                }
                break;
            case 'SKRILL_BACKEND_AB_AOB_BANCOLOMBIA':
                if ($this->l('SKRILL_BACKEND_AB_AOB_BANCOLOMBIA') == "SKRILL_BACKEND_AB_AOB_BANCOLOMBIA") {
                    $paymentLocale = "Bancolombia";
                } else {
                    $paymentLocale = $this->l('SKRILL_BACKEND_AB_AOB_BANCOLOMBIA');
                }
                break;
            default:
                    $paymentLocale = "UNDEFINED";

                break;
        }

        return $paymentLocale;
    }

    private function getTrnStatusLocale($status)
    {
        switch ($status) {
            case 'BACKEND_TT_PROCESSED':
                if ($this->l('BACKEND_TT_PROCESSED') == "BACKEND_TT_PROCESSED") {
                    $trnStatus = "Processed";
                } else {
                    $trnStatus = $this->l('BACKEND_TT_PROCESSED');
                }
                break;
            case 'BACKEND_TT_PENDING':
                if ($this->l('BACKEND_TT_PENDING') == "BACKEND_TT_PENDING") {
                    $trnStatus = "Pending";
                } else {
                    $trnStatus = $this->l('BACKEND_TT_PENDING');
                }
                break;
            case 'BACKEND_TT_CANCELLED':
                if ($this->l('BACKEND_TT_CANCELLED') == "BACKEND_TT_CANCELLED") {
                    $trnStatus = "Cancelled";
                } else {
                    $trnStatus = $this->l('BACKEND_TT_CANCELLED');
                }
                break;
            case 'BACKEND_TT_FAILED':
                if ($this->l('BACKEND_TT_FAILED') == "BACKEND_TT_FAILED") {
                    $trnStatus = "Failed";
                } else {
                    $trnStatus = $this->l('BACKEND_TT_FAILED');
                }
                break;
            case 'BACKEND_TT_CHARGEBACK':
                if ($this->l('BACKEND_TT_CHARGEBACK') == "BACKEND_TT_CHARGEBACK") {
                    $trnStatus = "Chargeback";
                } else {
                    $trnStatus = $this->l('BACKEND_TT_CHARGEBACK');
                }
                break;
            case 'BACKEND_TT_REFUNDED':
                if ($this->l('BACKEND_TT_REFUNDED') == "BACKEND_TT_REFUNDED") {
                    $trnStatus = "Refund successfull";
                } else {
                    $trnStatus = $this->l('BACKEND_TT_REFUNDED');
                }
                break;
            case 'BACKEND_TT_REFUNDED_PENDING':
                if ($this->l('BACKEND_TT_REFUNDED_PENDING') == "BACKEND_TT_REFUNDED_PENDING") {
                    $trnStatus = "Refund pending";
                } else {
                    $trnStatus = $this->l('BACKEND_TT_REFUNDED_PENDING');
                }
                break;
            case 'BACKEND_TT_REFUNDED_FAILED':
                if ($this->l('BACKEND_TT_REFUNDED_FAILED') == "BACKEND_TT_REFUNDED_FAILED") {
                    $trnStatus = "Refund failed";
                } else {
                    $trnStatus = $this->l('BACKEND_TT_REFUNDED_FAILED');
                }
                break;
            case 'BACKEND_TT_FRAUD':
                if ($this->l('BACKEND_TT_FRAUD') == "BACKEND_TT_FRAUD") {
                    $trnStatus = "was considered fraudulent";
                } else {
                    $trnStatus = $this->l('BACKEND_TT_FRAUD');
                }
                break;
            case 'ERROR_GENERAL_ABANDONED_BYUSER':
                if ($this->l('ERROR_GENERAL_ABANDONED_BYUSER') == "ERROR_GENERAL_ABANDONED_BYUSER") {
                    $trnStatus = "Abandoned by user";
                } else {
                    $trnStatus = $this->l('ERROR_GENERAL_ABANDONED_BYUSER');
                }
                break;
            default:
                if ($this->l('ERROR_GENERAL_ABANDONED_BYUSER') == "ERROR_GENERAL_ABANDONED_BYUSER") {
                    $trnStatus = "Abandoned by user";
                } else {
                    $trnStatus = $this->l('ERROR_GENERAL_ABANDONED_BYUSER');
                }
                break;
        }

        return $trnStatus;
    }

    public function getLocaleErrorMapping($errorIdentifier)
    {
        switch ($errorIdentifier) {
            case 'ERROR_GENERAL_NORESPONSE':
                if ($this->l('ERROR_GENERAL_NORESPONSE') == "ERROR_GENERAL_NORESPONSE") {
                    $returnMessage = "Unfortunately, the confirmation of your payment failed.
                    Please contact your merchant for clarification.";
                } else {
                    $returnMessage = $this->l('ERROR_GENERAL_NORESPONSE');
                }
                break;
            case 'ERROR_GENERAL_FRAUD_DETECTION':
                if ($this->l('ERROR_GENERAL_FRAUD_DETECTION') == "ERROR_GENERAL_FRAUD_DETECTION") {
                    $returnMessage = "Unfortunately, there was an error while processing your order.
                    In case a payment has been made, it will be automatically refunded.";
                } else {
                    $returnMessage = $this->l('ERROR_GENERAL_FRAUD_DETECTION');
                }
                break;
            case 'SKRILL_ERROR_01':
                if ($this->l('SKRILL_ERROR_01') == "SKRILL_ERROR_01") {
                    $returnMessage = "Referred by card issuer";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_01');
                }
                break;
            case 'SKRILL_ERROR_02':
                if ($this->l('SKRILL_ERROR_02') == "SKRILL_ERROR_02") {
                    $returnMessage = "Invalid Merchant";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_02');
                }
                break;
            case 'SKRILL_ERROR_03':
                if ($this->l('SKRILL_ERROR_03') == "SKRILL_ERROR_03") {
                    $returnMessage = "Stolen card";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_03');
                }
                break;
            case 'SKRILL_ERROR_04':
                if ($this->l('SKRILL_ERROR_04') == "SKRILL_ERROR_04") {
                    $returnMessage = "Declined by customer's Card Issuer";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_04');
                }
                break;
            case 'SKRILL_ERROR_05':
                if ($this->l('SKRILL_ERROR_05') == "SKRILL_ERROR_05") {
                    $returnMessage = "Insufficient funds";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_05');
                }
                break;
            case 'SKRILL_ERROR_08':
                if ($this->l('SKRILL_ERROR_08') == "SKRILL_ERROR_08") {
                    $returnMessage = "PIN tries exceeded - card blocked";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_08');
                }
                break;
            case 'SKRILL_ERROR_09':
                if ($this->l('SKRILL_ERROR_09') == "SKRILL_ERROR_09") {
                    $returnMessage = "Invalid Transaction";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_09');
                }
                break;
            case 'SKRILL_ERROR_10':
                if ($this->l('SKRILL_ERROR_10') == "SKRILL_ERROR_10") {
                    $returnMessage = "Transaction frequency limit exceeded";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_10');
                }
                break;
            case 'SKRILL_ERROR_12':
                if ($this->l('SKRILL_ERROR_12') == "SKRILL_ERROR_12") {
                    $returnMessage = "Invalid credit card or bank account";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_12');
                }
                break;
            case 'SKRILL_ERROR_15':
                if ($this->l('SKRILL_ERROR_15') == "SKRILL_ERROR_15") {
                    $returnMessage = "Duplicate transaction";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_15');
                }
                break;
            case 'SKRILL_ERROR_19':
                if ($this->l('SKRILL_ERROR_19') == "SKRILL_ERROR_19") {
                    $returnMessage = "Unknown failure reason. Try again";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_19');
                }
                break;
            case 'SKRILL_ERROR_24':
                if ($this->l('SKRILL_ERROR_24') == "SKRILL_ERROR_24") {
                    $returnMessage = "Card expired";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_24');
                }
                break;
            case 'SKRILL_ERROR_28':
                if ($this->l('SKRILL_ERROR_28') == "SKRILL_ERROR_28") {
                    $returnMessage = "Lost/Stolen card";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_28');
                }
                break;
            case 'SKRILL_ERROR_32':
                if ($this->l('SKRILL_ERROR_32') == "SKRILL_ERROR_32") {
                    $returnMessage = "Card Security Code check failed";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_32');
                }
                break;
            case 'SKRILL_ERROR_37':
                if ($this->l('SKRILL_ERROR_37') == "SKRILL_ERROR_37") {
                    $returnMessage = "Card restricted by card issuer";
                } else {
                    $returnMessage = $this->l('SKRILL_ERROR_37');
                }
                break;
            case 'SKRILL_ERROR_38':
                if ($this->l('SKRILL_ERROR_38') == "SKRILL_ERROR_38") {
                    $returnMessage = "Security violation";
                } else {
                    $returnMessage =  $this->l('SKRILL_ERROR_38');
                }
                break;
            case 'SKRILL_ERROR_42':
                if ($this->l('SKRILL_ERROR_42') == "SKRILL_ERROR_42") {
                    $returnMessage = "Card blocked by card issuer";
                } else {
                    $returnMessage =  $this->l('SKRILL_ERROR_42');
                }
                break;
            case 'SKRILL_ERROR_44':
                if ($this->l('SKRILL_ERROR_44') == "SKRILL_ERROR_44") {
                    $returnMessage = "Customer's issuing bank not available";
                } else {
                    $returnMessage =  $this->l('SKRILL_ERROR_44');
                }
                break;
            case 'SKRILL_ERROR_51':
                if ($this->l('SKRILL_ERROR_51') == "SKRILL_ERROR_51") {
                    $returnMessage = "Processing system error";
                } else {
                    $returnMessage =  $this->l('SKRILL_ERROR_51');
                }
                break;
            case 'SKRILL_ERROR_63':
                if ($this->l('SKRILL_ERROR_63') == "SKRILL_ERROR_63") {
                    $returnMessage = "Transaction not permitted to cardholder ";
                } else {
                    $returnMessage =  $this->l('SKRILL_ERROR_63');
                }
                break;
            case 'SKRILL_ERROR_70':
                if ($this->l('SKRILL_ERROR_70') == "SKRILL_ERROR_70") {
                    $returnMessage = "Customer failed to complete 3DS";
                } else {
                    $returnMessage =  $this->l('SKRILL_ERROR_70');
                }
                break;
            case 'SKRILL_ERROR_71':
                if ($this->l('SKRILL_ERROR_71') == "SKRILL_ERROR_71") {
                    $returnMessage = "Customer failed SMS verification";
                } else {
                    $returnMessage =  $this->l('SKRILL_ERROR_71');
                }
                break;
            case 'SKRILL_ERROR_80':
                if ($this->l('SKRILL_ERROR_80') == "SKRILL_ERROR_80") {
                    $returnMessage = "Fraud engine declined";
                } else {
                    $returnMessage =  $this->l('SKRILL_ERROR_80');
                }
                break;
            case 'SKRILL_ERROR_98':
                if ($this->l('SKRILL_ERROR_98') == "SKRILL_ERROR_98") {
                    $returnMessage = "Error in communication with provider";
                } else {
                    $returnMessage =  $this->l('SKRILL_ERROR_98');
                }
                break;
            case 'SKRILL_ERROR_99_GENERAL':
                if ($this->l('SKRILL_ERROR_99_GENERAL') == "SKRILL_ERROR_99_GENERAL") {
                    $returnMessage = "Failure reason not specified";
                } else {
                    $returnMessage =  $this->l('SKRILL_ERROR_99_GENERAL');
                }
                break;
            default:
                if ($this->l('ERROR_GENERAL_REDIRECT') == "ERROR_GENERAL_REDIRECT") {
                    $returnMessage = "Error before redirect";
                } else {
                    $returnMessage =  $this->l('ERROR_GENERAL_REDIRECT');
                }
                break;
        }

        return $returnMessage;
    }

    protected function getPresentationLocale()
    {
        $locale = array();
        if ($this->l('SKRILL_BACKEND_PRES_HEADER') == "SKRILL_BACKEND_PRES_HEADER") {
            $locale['header'] = "With a simple, single integration, you could be processing payments in hours.";
        } else {
            $locale['header'] = $this->l('SKRILL_BACKEND_PRES_HEADER');
        }
        if ($this->l('SKRILL_BACKEND_PRES_LANGREQUIRED') == "SKRILL_BACKEND_PRES_LANGREQUIRED") {
            $locale['lang'] = "Languages required: DE, IT, ES, FR, PL.";
        } else {
            $locale['lang'] = $this->l('SKRILL_BACKEND_PRES_LANGREQUIRED');
        }
        if ($this->l('SKRILL_BACKEND_PRES_ABOUTTITLE') == "SKRILL_BACKEND_PRES_ABOUTTITLE") {
            $locale['about']['title'] = "Trusted by millions - Skrill meets the needs of more than 156,000 businesses
             worldwide providing a convenient and secure way to send and receive money in nearly 200 countries,
             18 languages and 40 currencies.";
        } else {
            $locale['about']['title'] = $this->l('SKRILL_BACKEND_PRES_ABOUTTITLE');
        }
        if ($this->l('SKRILL_BACKEND_PRES_ABOUTTEXT1') == "SKRILL_BACKEND_PRES_ABOUTTEXT1") {
            $locale['about']['text1'] = "Trusted by millions - Skrill meets the needs of more than 156,000 businesses
             worldwide providing a convenient and secure way to send and receive money in nearly 200 countries,
             18 languages and 40 currencies.";
        } else {
            $locale['about']['text1'] = $this->l('SKRILL_BACKEND_PRES_ABOUTTEXT1');
        }
        if ($this->l('SKRILL_BACKEND_PRES_ABOUTTEXT2') == "SKRILL_BACKEND_PRES_ABOUTTEXT2") {
            $locale['about']['text2'] = "Together with Prestashop, Skrill offer a fully integrated payment solution,
             which can begin accepting payments within hours. The Skrill fee structure is a competitive 1.9% + € 0.29
             per transaction. To begin accepting payments with Skrill, ";
        } else {
            $locale['about']['text2'] = $this->l('SKRILL_BACKEND_PRES_ABOUTTEXT2');
        }
        if ($this->l('SKRILL_BACKEND_PRES_ABOUTTEXT3') == "SKRILL_BACKEND_PRES_ABOUTTEXT3") {
            $locale['about']['text3'] = "*Fee applies to new merchants only. From 14th August 2017.";
        } else {
            $locale['about']['text3'] = $this->l('SKRILL_BACKEND_PRES_ABOUTTEXT3');
        }
        if ($this->l('SKRILL_BACKEND_PRES_ABOUTFEAT') == "SKRILL_BACKEND_PRES_ABOUTFEAT") {
            $locale['about']['feature'] = "Take advantage of a modern, flexible
             and optimised hosted payment solution –
             all with one contract, one integration and free set up:";
        } else {
            $locale['about']['feature'] = $this->l('SKRILL_BACKEND_PRES_ABOUTFEAT');
        }
        if ($this->l('SKRILL_BACKEND_PRES_ABOUTFEAT1') == "SKRILL_BACKEND_PRES_ABOUTFEAT1") {
            $locale['about']['feature1'] = "Card processing, 20+ local payment methods and support for over 80 banks";
        } else {
            $locale['about']['feature1'] = $this->l('SKRILL_BACKEND_PRES_ABOUTFEAT1');
        }
        if ($this->l('SKRILL_BACKEND_PRES_ABOUTFEAT2') == "SKRILL_BACKEND_PRES_ABOUTFEAT2") {
            $locale['about']['feature2'] = "Instant settlement";
        } else {
            $locale['about']['feature2'] = $this->l('SKRILL_BACKEND_PRES_ABOUTFEAT2');
        }
        if ($this->l('SKRILL_BACKEND_PRES_ABOUTFEAT3') == "SKRILL_BACKEND_PRES_ABOUTFEAT3") {
            $locale['about']['feature3'] = "Customisable gateway with embedded page and redirect functionality";
        } else {
            $locale['about']['feature3'] = $this->l('SKRILL_BACKEND_PRES_ABOUTFEAT3');
        }
        if ($this->l('SKRILL_BACKEND_PRES_ABOUTFEAT4') == "SKRILL_BACKEND_PRES_ABOUTFEAT4") {
            $locale['about']['feature4'] = "Industry recognised risk, compliance and anti-fraud features";
        } else {
            $locale['about']['feature4'] = $this->l('SKRILL_BACKEND_PRES_ABOUTFEAT4');
        }
        if ($this->l('SKRILL_BACKEND_PRES_ABOUTFEAT5') == "SKRILL_BACKEND_PRES_ABOUTFEAT5") {
            $locale['about']['feature5'] = "Enhanced reporting and transaction status overviews";
        } else {
            $locale['about']['feature5'] = $this->l('SKRILL_BACKEND_PRES_ABOUTFEAT5');
        }
        if ($this->l('SKRILL_BACKEND_PRES_SIGNUP') == "SKRILL_BACKEND_PRES_SIGNUP") {
            $locale['signup']['title'] = "sign up now";
        } else {
            $locale['signup']['title'] = $this->l('SKRILL_BACKEND_PRES_SIGNUP');
        }
        if ($this->l('SKRILL_BACKEND_PRES_SIGNUPTEXT') == "SKRILL_BACKEND_PRES_SIGNUPTEXT") {
            $locale['signup']['text'] = "Visit our Skrill page to apply for your Skrill business account.";
        } else {
            $locale['signup']['text'] = $this->l('SKRILL_BACKEND_PRES_SIGNUPTEXT');
        }
        if ($this->l('SKRILL_BACKEND_PRES_VERIFY') == "SKRILL_BACKEND_PRES_VERIFY") {
            $locale['verify']['title'] = "Verify your account";
        } else {
            $locale['verify']['title'] = $this->l('SKRILL_BACKEND_PRES_VERIFY');
        }
        if ($this->l('SKRILL_BACKEND_PRES_VERIFYTEXT') == "SKRILL_BACKEND_PRES_VERIFYTEXT") {
            $locale['verify']['text'] = "Simply provide verification documents for your business and
             sign a merchant agreement with Skrill to verify your account.";
        } else {
            $locale['verify']['text'] = $this->l('SKRILL_BACKEND_PRES_VERIFYTEXT');
        }
        if ($this->l('SKRILL_BACKEND_PRES_GUIDE') == "SKRILL_BACKEND_PRES_GUIDE") {
            $locale['guide']['title'] = "Follow the installation guide";
        } else {
            $locale['guide']['title'] = $this->l('SKRILL_BACKEND_PRES_GUIDE');
        }
        if ($this->l('SKRILL_BACKEND_PRES_GUIDETEXT') == "SKRILL_BACKEND_PRES_GUIDETEXT") {
            $locale['guide']['text'] = "Once your account is verified you will need to create a secret word
             and API password and then return to the Prestashop panel to connect.";
        } else {
            $locale['guide']['text'] = $this->l('SKRILL_BACKEND_PRES_GUIDETEXT');
        }
        if ($this->l('BACKEND_GENERAL_HELP') == "BACKEND_GENERAL_HELP") {
            $locale['help'] = "Help";
        } else {
            $locale['help'] = $this->l('BACKEND_GENERAL_HELP');
        }

        return $locale;
    }

    public function getContent()
    {
        $shopDomainSsl = Tools::getShopDomainSsl(true, true);
        $backOfficeJsUrl = $shopDomainSsl.__PS_BASE_URI__.'modules/'.$this->name.'/views/js/backoffice.js';
        $backOfficeCssUrl = $shopDomainSsl.__PS_BASE_URI__.'modules/'.$this->name.'/views/css/backoffice.css';

        $tplVars = array(
            'tabs' => $this->getConfigurationTabs(),
            'selectedTab' => $this->getSelectedTab(),
            'backOfficeJsUrl' => $backOfficeJsUrl,
            'backOfficeCssUrl' => $backOfficeCssUrl
        );

        if (isset($this->context->cookie->skrillConfigMessage)) {
            $tplVars['message']['success'] = $this->context->cookie->skrillMessageSuccess;
            $tplVars['message']['text'] = $this->context->cookie->skrillConfigMessage;
            unset($this->context->cookie->skrillConfigMessage);
        } else {
            $tplVars['message'] = false;
        }

        $this->context->smarty->assign($tplVars);

        return $this->display(__FILE__, 'views/templates/admin/tabs.tpl');
    }

    protected function getAdminModuleLink()
    {
        $adminLink = $this->context->link->getAdminLink('AdminModules', false);
        $module = '&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $adminToken = Tools::getAdminTokenLite('AdminModules');

        return $adminLink.$module.'&token='.$adminToken;
    }

    protected function getConfigurationTabs()
    {
        $tabsLocale = $this->getTabsLocale();
        $tabs = array();

        $tabs[] = array(
            'id' => 'presentation',
            'title' => $tabsLocale['presentation'],
            'content' => $this->getPresentationTemplate()
        );

        $tabs[] = array(
            'id' => 'general_setting',
            'title' => $tabsLocale['skrillSetting'],
            'content' => $this->getGeneralSettingTemplate()
        );

        $tabs[] = array(
            'id' => 'payment_configuration',
            'title' => $tabsLocale['paymentsConfig'],
            'content' => $this->getPaymentConfigurationTemplate()
        );

        return $tabs;
    }

    protected function getSelectedTab()
    {
        if ($this->selectedTab) {
            return $this->selectedTab;
        }

        if (Tools::getValue('selected_tab')) {
            return Tools::getValue('selected_tab');
        }

        return 'presentation';
    }

    /**
     * get Skrill sign up url depend on language iso code
     * @return string
     */
    protected function getSignUpUrl()
    {
        $languageIsoCode = $this->context->language->iso_code;

        if (in_array($languageIsoCode, $this->supportedLanguages)) {
            return str_replace('lang=EN', 'lang=' . Tools::strtoupper($languageIsoCode), $this->skrillSignUpUrl);
        }

        return $this->skrillSignUpUrl;
    }

    protected function getPresentationTemplate()
    {
        $tplVars = array(
            'presentation' => $this->getPresentationLocale(),
            'signUpUrl' => $this->getSignUpUrl(),
            'guideUrl' => $this->skrillGuideUrl,
            'thisPath' => $this->_path
        );
        $this->context->smarty->assign($tplVars);
        return $this->display(__FILE__, 'views/templates/admin/presentation.tpl');
    }

    protected function getGeneralSettingTemplate()
    {
        if (Tools::isSubmit('btnSubmit')) {
            $this->validateGeneralSetting();
            $this->selectedTab = 'general_setting';
        }

        $this->html .= $this->renderGeneralSettingForm();

        return $this->html;
    }

    protected function getPaymentConfigurationTemplate()
    {
        if (Tools::isSubmit('btnSubmitPaymentConfig')) {
            $this->selectedTab = 'payment_configuration';
            $this->updatePaymentConfig();
        }

        $locale = $this->getPaymentConfigurationLocale();
        $i = 0;
        $payments = array();
        $paymentMethods = SkrillPaymentCore::getPaymentMethods();
        foreach (array_keys($paymentMethods) as $paymentType) {
            $paymentTypeLowerCase = Tools::strtolower($paymentType);
            $activeConfigName = Configuration::get('SKRILL_'.$paymentType.'_ACTIVE');
            $modeConfigName = Configuration::get('SKRILL_'.$paymentType.'_MODE');

            $payments[$i]['title'] = $locale[$paymentTypeLowerCase]['title'];
            $payments[$i]['type'] = $paymentTypeLowerCase;
            $payments[$i]['active'] = Tools::getValue('SKRILL_'.$paymentType.'_ACTIVE', $activeConfigName);
            if ($paymentType == 'ACC') {
                $payments[$i]['mode'] = Tools::getValue('SKRILL_'.$paymentType.'_MODE', $modeConfigName);
            }
            $payments[$i]['brand'] = $paymentType;
            if (isset($locale[$paymentTypeLowerCase]['tooltips'])) {
                $payments[$i]['tooltips'] = $locale[$paymentTypeLowerCase]['tooltips'];
            } else {
                $payments[$i]['tooltips'] = "";
            }
            if (is_array($paymentMethods[$paymentType]['allowedCountries'])) {
                foreach ($paymentMethods[$paymentType]['allowedCountries'] as $bankOfCountries) {
                    if (is_array($bankOfCountries)) {
                        foreach (array_keys($bankOfCountries) as $bankName) {
                            $bankLocale = 'SKRILL_BACKEND_AB_'.$paymentType
                            ."_".str_replace(' ', '', Tools::strtoupper($bankName));
                            $payments[$i]['banks'][] = $this->getBackendPaymentLocale($bankLocale);
                        }
                    }
                }
            }
            $i++;
        }

        $tplVars = array(
            'panelTitle' => $locale['paymentsConfig'],
            'payments' => $payments,
            'thisPath' => Tools::getShopDomain(true, true).__PS_BASE_URI__.'modules/skrill/',
            'fieldsValue' => $this->getPaymentConfiguration(),
            'currentIndex' => $this->getAdminModuleLink(),
            'label' => $locale['label'],
            'button' => $locale['button']
        );
        $this->context->smarty->assign($tplVars);

        return $this->display(__FILE__, 'views/templates/admin/paymentConfiguration.tpl');
    }

    protected function renderGeneralSettingForm()
    {
        $locale = $this->getGeneralSettingLocale();

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        if (Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG')) {
            $helper->allow_employee_form_lang =  Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG');
        } else {
            $helper->allow_employee_form_lang =  0;
        }
        $this->fields_form = array();
        $this->fields_form = $this->getGeneralSettingForm($locale);
        $helper->id = (int)Tools::getValue('id_carrier');
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'btnSubmit';
        $helper->currentIndex = $this->getAdminModuleLink();
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getGeneralSetting(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );

        return $helper->generateForm($this->fields_form);
    }

    protected function getGeneralSettingForm($locale)
    {
        $getDisplayList = $this->getDisplayList($locale['display']);
        $generalForm = array();
        $generalForm[] = array(
            'form' => array(
                'input' => array(
                    $this->getTextForm('GENERAL_MERCHANTID', $locale['mid'], true),
                    $this->getTextForm('GENERAL_MERCHANTACCOUNT', $locale['merchant'], true),
                    $this->getTextForm('GENERAL_RECIPENT', $locale['recepient'], true),
                    $this->getTextForm('GENERAL_LOGOURL', $locale['logourl'], true),
                    $this->getTextForm('GENERAL_SHOPURL', $locale['shopurl']),
                    $this->getPasswordForm('GENERAL_APIPASS', $locale['apipass'], true),
                    $this->getPasswordForm('GENERAL_SECRETWORD', $locale['secretword'], true),
                    $this->getSelectForm('GENERAL_DISPLAY', $locale['display'], $getDisplayList),
                    $this->getTextForm('GENERAL_MERCHANTEMAIL', $locale['email']),
                ),
                'submit' => array(
                    'title' => $locale['save']
                )
            )
        );

        return $generalForm;
    }

    protected function getGeneralSetting()
    {
        $configMerchantID = Configuration::get('SKRILL_GENERAL_MERCHANTID');
        $configMerchantAccount = Configuration::get('SKRILL_GENERAL_MERCHANTACCOUNT');
        $configRecipent = Configuration::get('SKRILL_GENERAL_RECIPENT');
        $configLogourl = Configuration::get('SKRILL_GENERAL_LOGOURL');
        $configShopurl = Configuration::get('SKRILL_GENERAL_SHOPURL');
        $configApipass = Configuration::get('SKRILL_GENERAL_APIPASS');
        $configSecretWord = Configuration::get('SKRILL_GENERAL_SECRETWORD');
        $configDisplay = Configuration::get('SKRILL_GENERAL_DISPLAY');
        $configActive = Configuration::get('SKRILL_FLEXIBLE_ACTIVE');
        $configMerchantEmail = Configuration::get('SKRILL_GENERAL_MERCHANTEMAIL');

        $generalSetting = array();
        $generalSetting['SKRILL_GENERAL_MERCHANTID'] =
            Tools::getValue('SKRILL_GENERAL_MERCHANTID', $configMerchantID);
        $generalSetting['SKRILL_GENERAL_MERCHANTACCOUNT'] =
            Tools::getValue('SKRILL_GENERAL_MERCHANTACCOUNT', $configMerchantAccount);
        $generalSetting['SKRILL_GENERAL_RECIPENT'] =
            Tools::getValue('SKRILL_GENERAL_RECIPENT', $configRecipent);
        $generalSetting['SKRILL_GENERAL_LOGOURL'] =
            Tools::getValue('SKRILL_GENERAL_LOGOURL', $configLogourl);
        $generalSetting['SKRILL_GENERAL_SHOPURL'] =
            Tools::getValue('SKRILL_GENERAL_SHOPURL', $configShopurl);
        $generalSetting['SKRILL_GENERAL_APIPASS'] =
            Tools::getValue('SKRILL_GENERAL_APIPASS', $configApipass);
        $generalSetting['SKRILL_GENERAL_SECRETWORD'] =
            Tools::getValue('SKRILL_GENERAL_SECRETWORD', $configSecretWord);
        $generalSetting['SKRILL_GENERAL_DISPLAY'] =
            Tools::getValue('SKRILL_GENERAL_DISPLAY', $configDisplay);
        $generalSetting['SKRILL_FLEXIBLE_ACTIVE'] =
            Tools::getValue('SKRILL_FLEXIBLE_ACTIVE', $configActive);
        $generalSetting['SKRILL_GENERAL_MERCHANTEMAIL'] =
            Tools::getValue('SKRILL_GENERAL_MERCHANTEMAIL', $configMerchantEmail);

        return $generalSetting;
    }

    protected function validateGeneralSetting()
    {
        if (Tools::isSubmit('btnSubmit')) {
            $locale = $this->getGeneralSettingLocale();
            $isRequired = false;
            $fieldsRequired = array();

            if (trim(Tools::getValue('SKRILL_GENERAL_MERCHANTID')) == '') {
                $fieldsRequired[] = $locale['mid']['label'];
                $isRequired = true;
            }
            if (trim(Tools::getValue('SKRILL_GENERAL_MERCHANTACCOUNT')) == '') {
                $fieldsRequired[] = $locale['merchant']['label'];
                $isRequired = true;
            }
            if (trim(Tools::getValue('SKRILL_GENERAL_RECIPENT')) == '') {
                $fieldsRequired[] = $locale['recepient']['label'];
                $isRequired = true;
            }
            if (trim(Tools::getValue('SKRILL_GENERAL_LOGOURL')) == '') {
                $fieldsRequired[] = $locale['logourl']['label'];
                $isRequired = true;
            }
            if (trim(Tools::getValue('SKRILL_GENERAL_APIPASS')) == ''
            && trim(Configuration::get('SKRILL_GENERAL_APIPASS')) == '') {
                $fieldsRequired[] =  $locale['apipass']['label'];
                $isRequired = true;
            }
            if (trim(Tools::getValue('SKRILL_GENERAL_SECRETWORD')) == ''
            && trim(Configuration::get('SKRILL_GENERAL_SECRETWORD')) == '') {
                $fieldsRequired[] =  $locale['secretword']['label'];
                $isRequired = true;
            }

            if ($isRequired) {
                $warning = implode(', ', $fieldsRequired) . ' ';
                if ($this->l('ERROR_MANDATORY') == "ERROR_MANDATORY") {
                    $warning .= "is required. please fill out this field";
                } else {
                    $warning .= $this->l('ERROR_MANDATORY');
                }
                $this->context->cookie->skrillMessageSuccess = false;
                $this->context->cookie->skrillConfigMessage = $warning;
            } else {
                $this->updateGeneralSetting();
            }
        }
    }

    protected function updateGeneralSetting()
    {
        if (Tools::isSubmit('btnSubmit')) {
            $apiPass = Tools::getValue('SKRILL_GENERAL_APIPASS');
            $secretWord = Tools::getValue('SKRILL_GENERAL_SECRETWORD');
            $merchantAccount = Tools::getValue('SKRILL_GENERAL_MERCHANTACCOUNT');
            $merchantEmail = Tools::getValue('SKRILL_GENERAL_MERCHANTEMAIL');

            Configuration::updateValue('SKRILL_GENERAL_MERCHANTID', Tools::getValue('SKRILL_GENERAL_MERCHANTID'));
            Configuration::updateValue('SKRILL_GENERAL_MERCHANTACCOUNT', $merchantAccount);
            Configuration::updateValue('SKRILL_GENERAL_RECIPENT', Tools::getValue('SKRILL_GENERAL_RECIPENT'));
            Configuration::updateValue('SKRILL_GENERAL_LOGOURL', Tools::getValue('SKRILL_GENERAL_LOGOURL'));
            Configuration::updateValue('SKRILL_GENERAL_SHOPURL', Tools::getValue('SKRILL_GENERAL_SHOPURL'));

            if (trim($apiPass) != '') {
                Configuration::updateValue('SKRILL_GENERAL_APIPASS', md5($apiPass));
            }
            if (trim($secretWord) != '') {
                Configuration::updateValue('SKRILL_GENERAL_SECRETWORD', md5($secretWord));
            }

            Configuration::updateValue('SKRILL_GENERAL_DISPLAY', Tools::getValue('SKRILL_GENERAL_DISPLAY'));
            Configuration::updateValue('SKRILL_GENERAL_MERCHANTEMAIL', $merchantEmail);

            if ($this->l('SKRILL_SUCCESS_GENERAL_SETTING') == "SKRILL_SUCCESS_GENERAL_SETTING") {
                $successMessage = "Your skrill setting were successfully updated.";
            } else {
                $successMessage = $this->l('SKRILL_SUCCESS_GENERAL_SETTING');
            }

            $this->context->cookie->skrillMessageSuccess = true;
            $this->context->cookie->skrillConfigMessage = $successMessage;
        }
    }

    protected function getPaymentConfiguration()
    {
        $saveConfig = array();
        foreach (array_keys(SkrillPaymentCore::getPaymentMethods()) as $paymentType) {
            $getActive = Configuration::get('SKRILL_'.$paymentType.'_ACTIVE');
            $saveConfig['SKRILL_'.$paymentType.'_ACTIVE'] =
                Tools::getValue('SKRILL_'.$paymentType.'_ACTIVE', $getActive);
        }

        return $saveConfig;
    }

    protected function updatePaymentConfig()
    {
        if (Tools::isSubmit('btnSubmitPaymentConfig')) {
            foreach (array_keys(SkrillPaymentCore::getPaymentMethods()) as $paymentType) {
                $active = Tools::getValue('SKRILL_'.$paymentType.'_ACTIVE');
                Configuration::updateValue('SKRILL_'.$paymentType.'_ACTIVE', $active);
                if ($paymentType == 'ACC') {
                    $mode = Tools::getValue('SKRILL_'.$paymentType.'_MODE');
                    Configuration::updateValue('SKRILL_'.$paymentType.'_MODE', $mode);
                }
            }

            if ($this->l('SUCCESS_GENERAL_PAYMENTCONFIG') == "SUCCESS_GENERAL_PAYMENTCONFIG") {
                $successMessage = "Congratulations, your payments configuration were successfully updated.";
            } else {
                $successMessage = $this->l('SUCCESS_GENERAL_PAYMENTCONFIG');
            }

            $this->context->cookie->skrillMessageSuccess = true;
            $this->context->cookie->skrillConfigMessage = $successMessage;
        }
    }

    protected function getTabsLocale()
    {
        $locale = array();
        if ($this->l('BACKEND_GENERAL_PRESENTATION') == "BACKEND_GENERAL_PRESENTATION") {
            $locale['presentation'] = "Presentation";
        } else {
            $locale['presentation'] = $this->l('BACKEND_GENERAL_PRESENTATION');
        }
        if ($this->l('BACKEND_CH_GENERAL') == "BACKEND_CH_GENERAL") {
            $locale['generalSetting'] = "General Setting";
        } else {
            $locale['generalSetting'] = $this->l('BACKEND_CH_GENERAL');
        }
        if ($this->l('BACKEND_GENERAL_PAYMENT_CONFIG') == "BACKEND_GENERAL_PAYMENT_CONFIG") {
            $locale['paymentsConfig'] = "Payment Configuration";
        } else {
            $locale['paymentsConfig'] = $this->l('BACKEND_GENERAL_PAYMENT_CONFIG');
        }
        if ($this->l('SKRILL_BACKEND_PM_SETTINGS') == "SKRILL_BACKEND_PM_SETTINGS") {
            $locale['skrillSetting'] = "Skrill Settings";
        } else {
            $locale['skrillSetting'] = $this->l('SKRILL_BACKEND_PM_SETTINGS');
        }

        return $locale;
    }

    protected function getGeneralSettingLocale()
    {
        $locale = array();
        if ($this->l('SKRILL_BACKEND_PM_SETTINGS') == "SKRILL_BACKEND_PM_SETTINGS") {
            $locale['setting']['label'] = "Skrill Settings";
        } else {
            $locale['setting']['label'] = $this->l('SKRILL_BACKEND_PM_SETTINGS');
        }
        if ($this->l('SKRILL_BACKEND_MID') == "SKRILL_BACKEND_MID") {
            $locale['mid']['label'] = "Merchant ID";
        } else {
            $locale['mid']['label'] = $this->l('SKRILL_BACKEND_MID');
        }
        if ($this->l('SKRILL_BACKEND_MERCHANT') == "SKRILL_BACKEND_MERCHANT") {
            $locale['merchant']['label'] = "Merchant Account (email)";
        } else {
            $locale['merchant']['label'] = $this->l('SKRILL_BACKEND_MERCHANT');
        }
        if ($this->l('SKRILL_BACKEND_RECIPIENT') == "SKRILL_BACKEND_RECIPIENT") {
            $locale['recepient']['label'] = "Recipient";
        } else {
            $locale['recepient']['label'] = $this->l('SKRILL_BACKEND_RECIPIENT');
        }
        if ($this->l('SKRILL_BACKEND_LOGO') == "SKRILL_BACKEND_LOGO") {
            $locale['logourl']['label'] = "Logo Url";
        } else {
            $locale['logourl']['label'] = $this->l('SKRILL_BACKEND_LOGO');
        }
        if ($this->l('SKRILL_BACKEND_SHOPURL') == "SKRILL_BACKEND_SHOPURL") {
            $locale['shopurl']['label'] = "Shop Url";
        } else {
            $locale['shopurl']['label'] = $this->l('SKRILL_BACKEND_SHOPURL');
        }
        if ($this->l('SKRILL_BACKEND_SECRETWORD') == "SKRILL_BACKEND_SECRETWORD") {
            $locale['secretword']['label'] = "Secret word";
        } else {
            $locale['secretword']['label'] = $this->l('SKRILL_BACKEND_SECRETWORD');
        }
        if ($this->l('SKRILL_BACKEND_APIPASS') == "SKRILL_BACKEND_APIPASS") {
            $locale['apipass']['label'] = "API Password";
        } else {
            $locale['apipass']['label'] = $this->l('SKRILL_BACKEND_APIPASS');
        }
        if ($this->l('SKRILL_BACKEND_DISPLAY') == "SKRILL_BACKEND_DISPLAY") {
            $locale['display']['label'] = "Display";
        } else {
            $locale['display']['label'] = $this->l('SKRILL_BACKEND_DISPLAY');
        }
        if ($this->l('SKRILL_BACKEND_IFRAME') == "SKRILL_BACKEND_IFRAME") {
            $locale['display']['iframe'] = "iFrame";
        } else {
            $locale['display']['iframe'] = $this->l('SKRILL_BACKEND_IFRAME');
        }
        if ($this->l('SKRILL_BACKEND_REDIRECT') == "SKRILL_BACKEND_REDIRECT") {
            $locale['display']['redirect'] = "Redirect";
        } else {
            $locale['display']['redirect'] = $this->l('SKRILL_BACKEND_REDIRECT');
        }
        if ($this->l('SKRILL_BACKEND_MERCHANTEMAIL') == "SKRILL_BACKEND_MERCHANTEMAIL") {
            $locale['email']['label'] = "Merchant Email";
        } else {
            $locale['email']['label'] = $this->l('SKRILL_BACKEND_MERCHANTEMAIL');
        }
        if ($this->l('SKRILL_BACKEND_TT_MID') == "SKRILL_BACKEND_TT_MID") {
            $locale['mid']['desc'] = "Your Skrill customer ID.
                    It is displayed in the upper-right corner of your Skrill account.";
        } else {
            $locale['mid']['desc'] = $this->l('SKRILL_BACKEND_TT_MID');
        }
        if ($this->l('SKRILL_BACKEND_TT_MEMAIL') == "SKRILL_BACKEND_TT_MEMAIL") {
            $locale['merchant']['desc'] = "Your Skrill account email address.";
        } else {
            $locale['merchant']['desc'] = $this->l('SKRILL_BACKEND_TT_MEMAIL');
        }
        if ($this->l('SKRILL_BACKEND_TT_RECIPIENT') == "SKRILL_BACKEND_TT_RECIPIENT") {
            $locale['recepient']['desc'] = "A description to be shown on Quick Checkout.
                    This can be your company name (max 30 characters).";
        } else {
            $locale['recepient']['desc'] = $this->l('SKRILL_BACKEND_TT_RECIPIENT');
        }
        if ($this->l('SKRILL_BACKEND_TT_LOGO') == "SKRILL_BACKEND_TT_LOGO") {
            $locale['logourl']['desc'] =
                    "The URL of the logo which you would like to appear at the top right of the Skrill page.
                    The logo must be accessible via HTTPS or it will not be shown.
                    For best results use logos with dimensions up to 200px in width and 50px in height.";
        } else {
            $locale['logourl']['desc'] = $this->l('SKRILL_BACKEND_TT_LOGO');
        }
        if ($this->l('SKRILL_BACKEND_TT_APIPW') == "SKRILL_BACKEND_TT_APIPW") {
            $locale['apipass']['desc'] =
                    "When enabled, this feature allows you to issue refunds and check transaction statuses.
                    To set it up, you need to login to your Skrill account and go to Settings -> then,
                    Developer Settings.";
        } else {
            $locale['apipass']['desc'] = $this->l('SKRILL_BACKEND_TT_APIPW');
        }
        if ($this->l('SKRILL_BACKEND_TT_SECRET') == "SKRILL_BACKEND_TT_SECRET") {
            $locale['secretword']['desc'] =
                    "This feature is mandatory and ensures the integrity of the data posted back to your servers.
                    To set it up, you need to login to your Skrill account and go to Settings -> then,
                    Developer Settings.";
        } else {
            $locale['secretword']['desc'] = $this->l('SKRILL_BACKEND_TT_SECRET');
        }
        if ($this->l('SKRILL_BACKEND_TT_DISPLAY') == "SKRILL_BACKEND_TT_DISPLAY") {
            $locale['display']['desc'] =
                    "iFrame – when this option is enabled the Quick
                    Checkout payment form  is embedded on your website,
                    Redirect – when this option is enabled the customer is redirected
                    to the Quick Checkout payment form .
                    This option is recommended for payment options which redirect the user to an external website.";
        } else {
            $locale['display']['desc'] = $this->l('SKRILL_BACKEND_TT_DISPLAY');
        }
        if ($this->l('SKRILL_BACKEND_TT_MERCHANTEMAIL') == "SKRILL_BACKEND_TT_MERCHANTEMAIL") {
            $locale['email']['desc'] = "Your email address to receive payment notification.";
        } else {
            $locale['email']['desc'] = $this->l('SKRILL_BACKEND_TT_MERCHANTEMAIL');
        }
        $locale['save'] = $this->l('BACKEND_CH_SAVE') == "BACKEND_CH_SAVE" ? "Save" : $this->l('BACKEND_CH_SAVE');

        return $locale;
    }

    protected function getPaymentConfigurationLocale()
    {
        $locale = array();

        foreach (array_keys(SkrillPaymentCore::getPaymentMethods()) as $paymentType) {
            $paymentTypeLower = Tools::strtolower($paymentType);
            $locale[$paymentTypeLower]['title'] = $this->getBackendPaymentLocale('SKRILL_BACKEND_PM_'.$paymentType);
        }

        if ($this->l('BACKEND_CH_ACTIVE') == "BACKEND_CH_ACTIVE") {
            $locale['label']['active'] = "Enabled";
        } else {
            $locale['label']['active'] = $this->l('BACKEND_CH_ACTIVE');
        }
        if ($this->l('SKRILL_BACKEND_PM_MODE') == "SKRILL_BACKEND_PM_MODE") {
            $locale['label']['mode'] = "Show Separately";
        } else {
            $locale['label']['mode'] = $this->l('SKRILL_BACKEND_PM_MODE');
        }
        if ($this->l('BACKEND_GENERAL_PAYMENT_CONFIG') == "BACKEND_GENERAL_PAYMENT_CONFIG") {
            $locale['paymentsConfig'] = "Payment Configuration";
        } else {
            $locale['paymentsConfig'] = $this->l('BACKEND_GENERAL_PAYMENT_CONFIG');
        }
        
        $locale['psc']['tooltips'] = 'American Samoa, Austria, Belgium, Canada,
            Croatia, Cyprus, Czech Republic, Denmark,
            Finland, France, Germany, Guam, Hungary, Iceland,
            Ireland, Italy, Latvia, Luxembourg, Malta,
            Mexico, Moldova, Netherlands, Northern Mariana Islands,
            Norway, Paraguay, Poland, Portugal, Puerto Rico,
            Romania, Slovakia, Slovenia, Spain, Sweden,
            Switzerland, Turkey, United Kingdom, United
            States Of America and US Virgin Islands';
        $locale['pch']['tooltips'] = 'Austria, Belgium, Bulgaria, Canada, 
            Croatia, Cyprus, Czech Republic,
            Denmark, France, Greece, Hungary, Ireland, Italy, Latvia
            Lithuania, Luxembourg, Malta, Mexico, Netherlands, Poland, 
            Portugal, Romania, Slovakia, Slovenia, Spain, Sweden, Switzerland, 
            United Kingdom, United States of America';
        $locale['wlt']['tooltips'] = 'All Countries';
        $locale['acc']['tooltips'] = 'All Countries';
        $locale['vsa']['tooltips'] = 'All Countries';
        $locale['msc']['tooltips'] = 'All Countries';
        $locale['mae']['tooltips'] = 'United Kingdom, Spain, Ireland and Austria';
        $locale['gcb']['tooltips'] = 'France';
        $locale['dnk']['tooltips'] = 'Denmark';
        $locale['psp']['tooltips'] = 'Italy';
        $locale['csi']['tooltips'] = 'Italy';
        $locale['obt']['tooltips'] = 'Austria, Belgium, Bulgaria, Denmark,
            Estonia, Finland, France, Germany, Greece, Hungary, Italy, Latvia,
            Netherlands, Norway, Poland, Portugal, Spain, Sweden,
            United Kingdom, United State Of America';
        $locale['gir']['tooltips'] = 'Germany';
        $locale['sft']['tooltips'] = ' Germany, Austria, Belgium, Netherlands, Italy,
            France, Poland, Hungary, Slovakia, Czech
            Republic and United Kingdom';
        $locale['ebt']['tooltips'] = 'Sweden';
        $locale['idl']['tooltips'] = 'Netherlands';
        $locale['npy']['tooltips'] = 'Austria';
        $locale['pli']['tooltips'] = 'Australia';
        $locale['pwy']['tooltips'] = 'Poland';
        $locale['epy']['tooltips'] = 'Bulgaria';
        $locale['glu']['tooltips'] = 'Austria, Belgium, Bulgaria, Czech Republic,
            Denmark, Estonia, Finland, Germany, Hungary,
            Ireland, Latvia, Lithuania, Netherlands, Poland,
            Romania, Slovakia, Slovenia, Spain, Sweden.';

        if ($this->l('SKRILL_BACKEND_TT_ALI') == "SKRILL_BACKEND_TT_ALI") {
            $locale['ali']['tooltips'] = 'Consumer location: China only.
                Merchant location: This is available for merchants in all countries except China.';
        } else {
            $locale['ali']['tooltips'] = $this->l('SKRILL_BACKEND_TT_ALI');
        }

        $locale['ntl']['tooltips'] = "All except for
            Afghanistan, Armenia, Bhutan, Bouvet Island,
            Myanmar, China, (Keeling) Islands, Democratic
            Republic of Congo, Cook Islands, Cuba, Eritrea,
            South Georgia and the South Sandwich Islands,
            Guam, Guinea, Territory of Heard Island and
            McDonald Islands, Iran, Iraq, Cote d'Ivoire,
            Kazakhstan, North Korea, Kyrgyzstan, Liberia,
            Libya, Mongolia, Northern Mariana Islands,
            Federated States of Micronesia, Marshall
            Islands, Palau, Pakistan, East Timor, Puerto Rico,
            Sierra Leone, Somalia, Zimbabwe, Sudan, Syria,
            Tajikistan, Turkmenistan, Uganda, United
            States, US Virgin Islands, Uzbekistan, and Yemen";
        $locale['adb']['tooltips'] = "Argentina, Brazil";
        $locale['aob']['tooltips'] = "Brazil, Chile, China, Columbia";
        $locale['aci']['tooltips'] = "Argentina, Brazil, Chile, China, Columbia,
            Mexico, Peru, Uruguay";
        $locale['aup']['tooltips'] = "China";

        $locale['button']['save'] =
            $this->l('BACKEND_CH_SAVE') == "BACKEND_CH_SAVE" ? "Save" : $this->l('BACKEND_CH_SAVE');
        $locale['button']['yes'] = $this->l('BACKEND_BT_YES') == "BACKEND_BT_YES" ? "Yes" : $this->l('BACKEND_BT_YES');
        $locale['button']['no'] = $this->l('BACKEND_BT_NO') == "BACKEND_BT_NO" ? "No" : $this->l('BACKEND_BT_NO');

        return $locale;
    }

    private function getTextForm($pm, $locale, $requirement = false)
    {
        $textForm =
            array(
               'type' => 'text',
               'label' => @$locale['label'],
               'name' => 'SKRILL_'.$pm,
               'required' => $requirement,
               'desc' => @$locale['desc']
            );

        return $textForm;
    }

    private function getPasswordForm($pm, $locale, $requirement = false)
    {
        $passwordForm =
            array(
               'type' => 'password',
               'label' => $locale['label'],
               'name' => 'SKRILL_'.$pm,
               'required' => $requirement,
               'desc' => $locale['desc']
            );

        return $passwordForm;
    }

    private function getSelectForm($pm, $locale, $selectList)
    {
        $selectForm = array(
            'type'      => 'select',
            'label'     => $locale['label'],
            'name'      => 'SKRILL_'.$pm,
            'desc'      => $locale['desc'],
            'options'   => array(
               'query' => $selectList,
               'id' => 'id',
               'name'   => 'name'
            )
        );
        return $selectForm;
    }

    private function getDisplayList($display)
    {
        $displayList = array (
            array(
               'id' => 'IFRAME',
               'name'   => $display['iframe']
            ),
            array(
               'id'     => "REDIRECT",
               'name'   => $display['redirect']
            )
        );

        return $displayList;
    }

    public function mailAlert($order, $paymentBrand, $status, $template)
    {
        if (!Module::isInstalled('mailalerts')) {
            $languageId = (int)Context::getContext()->language->id;
            $customer = $this->context->customer;

            $delivery = new Address((int)$order->id_address_delivery);
            $invoice = new Address((int)$order->id_address_invoice);
            $orderDateText = Tools::displayDate($order->date_add, (int)$languageId);
            $carrier = new Carrier((int)$order->id_carrier);
            $products = $order->getProducts();
            $customizedDatas = Product::getAllCustomizedDatas((int)$this->context->cart->id);
            $currency = $this->context->currency;
            $emails = array();
            $message = $order->getFirstMessage();
            if (!$message || empty($message)) {
                if ($this->l('ERROR_GENERAL_NOMESSAGE') == "ERROR_GENERAL_NOMESSAGE") {
                    $message =  "Without Message";
                } else {
                    $message =  $this->l('ERROR_GENERAL_NOMESSAGE');
                }
            }

            $itemsTable = '';
            $sql = 'SELECT * FROM '._DB_PREFIX_.'employee where id_profile = 1 and active = 1';
            $results = Db::getInstance()->ExecuteS($sql);
            if ($results) {
                foreach ($results as $row) {
                    array_push($emails, $row['email']);
                }
            }

            foreach ($products as $key => $product) {
                $unitPrice = $product['product_price_wt'];

                $customizationText = '';
                $customizedDatas = $customizedDatas[$product['product_id']][$product['product_attribute_id']];
                if (isset($customizedDatas)) {
                    foreach ($customizedDatas as $customization) {
                        if (isset($customization['datas'][_CUSTOMIZE_TEXTFIELD_])) {
                            foreach ($customization['datas'][_CUSTOMIZE_TEXTFIELD_] as $text) {
                                $customizationText .= $text['name'].': '.$text['value'].'<br />';
                            }
                        }

                        $customizeFile = $customization['datas'][_CUSTOMIZE_FILE_];

                        if (isset($customizeFile)) {
                            if (count($customizeFile).' '.$this->l('BACKEND_TEXT_IMAGE') == "BACKEND_TEXT_IMAGE") {
                                $customizationText .= "image(s)" ;
                            } else {
                                $customizationText .=  $this->l('BACKEND_TEXT_IMAGE').'<br />';
                            }
                        }

                        $customizationText .= '---<br />';
                    }

                    $customizationText = rtrim($customizationText, '---<br />');
                }
                if (isset($product['attributes_small'])) {
                    $attributesSmall = ' '.$product['attributes_small'];
                } else {
                    $attributesSmall = '';
                }
                if (!empty($customizationText)) {
                    $custom_Text = '<br />'.$customizationText;
                } else {
                    $custom_Text = '';
                }
                $itemsTable .=
                    '<tr style="background-color:'.($key % 2 ? '#DDE2E6' : '#EBECEE').';">
                        <td style="padding:0.6em 0.4em;">
                            '.$product['product_reference'].'
                        </td>
                        <td style="padding:0.6em 0.4em;">
                            <strong>'
                                .$product['product_name'].$attributesSmall.$custom_Text.
                            '</strong>
                        </td>
                        <td style="padding:0.6em 0.4em; text-align:right;">
                            '.Tools::displayPrice($unitPrice, $currency, false).'
                        </td>
                        <td style="padding:0.6em 0.4em; text-align:center;">
                            '.(int)$product['product_quantity'].'
                        </td>
                        <td style="padding:0.6em 0.4em; text-align:right;">
                            '.Tools::displayPrice(($unitPrice * $product['product_quantity']), $currency, false).'
                        </td>
                    </tr>';
            }
            foreach ($order->getCartRules() as $discount) {
                if ($this->l('BACKEND_TEXT_VOUCHER_CODE') == "BACKEND_TEXT_VOUCHER_CODE") {
                    $voucherCode = "Voucher code :";
                } else {
                    $voucherCode = $this->l('BACKEND_TEXT_VOUCHER_CODE').' '.$discount['name'];
                }

                $itemsTable .=
                '<tr style="background-color:#EBECEE;">
                        <td colspan="4" style="padding:0.6em 0.4em; text-align:right;">
                        '.$voucherCode.'
                        </td>
                        <td style="padding:0.6em 0.4em; text-align:right;">-
                           '.Tools::displayPrice($discount['value'], $currency, false).'
                        </td>
                </tr>';
            }

            if ($delivery->id_state) {
                $deliveryState = new State((int)$delivery->id_state);
            }
            if ($invoice->id_state) {
                $invoiceState = new State((int)$invoice->id_state);
            }

            $templateVars = array(
                '{firstname}' => $customer->firstname,
                '{lastname}' => $customer->lastname,
                '{email}' => $customer->email,
                '{delivery_block_txt}' => SkrillCustomMailAlert::getFormatedAddress($delivery, "\n"),
                '{invoice_block_txt}' => SkrillCustomMailAlert::getFormatedAddress($invoice, "\n"),
                '{delivery_block_html}' => SkrillCustomMailAlert::getFormatedAddress($delivery, '<br />', array(
                'firstname' => '<span style="color:blue; font-weight:bold;">%s</span>',
                'lastname' => '<span style="color:blue; font-weight:bold;">%s</span>')),
                '{invoice_block_html}' => SkrillCustomMailAlert::getFormatedAddress($invoice, '<br />', array(
                'firstname' => '<span style="color:blue; font-weight:bold;">%s</span>',
                'lastname' => '<span style="color:blue; font-weight:bold;">%s</span>')),
                '{delivery_company}' => $delivery->company,
                '{delivery_firstname}' => $delivery->firstname,
                '{delivery_lastname}' => $delivery->lastname,
                '{delivery_address1}' => $delivery->address1,
                '{delivery_address2}' => $delivery->address2,
                '{delivery_city}' => $delivery->city,
                '{delivery_postal_code}' => $delivery->postcode,
                '{delivery_country}' => $delivery->country,
                '{delivery_state}' => $delivery->id_state ? $deliveryState->name : '',
                '{delivery_phone}' => $delivery->phone ? $delivery->phone : $delivery->phone_mobile,
                '{delivery_other}' => $delivery->other,
                '{invoice_company}' => $invoice->company,
                '{invoice_firstname}' => $invoice->firstname,
                '{invoice_lastname}' => $invoice->lastname,
                '{invoice_address2}' => $invoice->address2,
                '{invoice_address1}' => $invoice->address1,
                '{invoice_city}' => $invoice->city,
                '{invoice_postal_code}' => $invoice->postcode,
                '{invoice_country}' => $invoice->country,
                '{invoice_state}' => $invoice->id_state ? $invoiceState->name : '',
                '{invoice_phone}' => $invoice->phone ? $invoice->phone : $invoice->phone_mobile,
                '{invoice_other}' => $invoice->other,
                '{order_name}' => sprintf('%06d', $order->id),
                '{shop_name}' => Configuration::get('PS_SHOP_NAME'),
                '{date}' => $orderDateText,
                '{carrier}' => (($carrier->name == '0') ? Configuration::get('PS_SHOP_NAME') : $carrier->name),
                '{payment}' => $order->payment,
                '{items}' => $itemsTable,
                '{total_paid}' => Tools::displayPrice($order->total_paid, $currency),
                '{total_products}' => Tools::displayPrice($order->getTotalProductsWithTaxes(), $currency),
                '{total_discounts}' => Tools::displayPrice($order->total_discounts, $currency),
                '{total_shipping}' => Tools::displayPrice($order->total_shipping, $currency),
                '{total_wrapping}' => Tools::displayPrice($order->total_wrapping, $currency),
                '{currency}' => $currency->sign,
                '{message}' => $message
            );

            $mailOrder = Mail::l('Order #%06d - '.$this->displayName.' ('.$paymentBrand.' - '.$status.')', $languageId);

            Mail::Send(
                $languageId,
                $template,
                sprintf($mailOrder, $order->id),
                $templateVars,
                $emails,
                null,
                Configuration::get('PS_SHOP_EMAIL'),
                Configuration::get('PS_SHOP_NAME'),
                null,
                null,
                dirname(__FILE__).'/mails/'
            );
        }
    }
}
