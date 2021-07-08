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

namespace PaypalAddons\classes;

use PaypalAddons\classes\AbstractMethodPaypal;
use PaypalAddons\classes\API\Onboarding\PaypalGetCredentials;
use PaypalPPBTlib\Extensions\ProcessLogger\ProcessLoggerHandler;
use PrestaShop\PrestaShop\Core\Addon\Module\ModuleManagerBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\VarDumper\VarDumper;

class AdminPayPalController extends \ModuleAdminController
{
    protected $parametres = array();

    protected $method;

    protected $headerToolBar = false;

    public function __construct()
    {
        parent::__construct();
        $this->bootstrap = true;
        $countryDefault = new \Country((int)\Configuration::get('PS_COUNTRY_DEFAULT'), $this->context->language->id);

        switch ($countryDefault->iso_code) {
            case "DE":
                $this->method = "PPP";
                break;
            case "BR":
                $this->method = "MB";
                break;
            case "MX":
                $this->method = "MB";
                break;
            default:
                $this->method = "EC";
        }
    }

    public function init()
    {
        header('Cache-Control: max-age=0');
        header('Clear-Site-Data: "cache"');
        if (\Tools::getValue('action') === 'set_sandbox_mode') {
            \Configuration::updateValue('PAYPAL_SANDBOX', (int)\Tools::getValue('sandbox_mode'));
            $methodObj = AbstractMethodPaypal::load($this->method);
            $methodObj->isConfigured();
        }

        parent::init();
    }

    public function initContent()
    {
        $method = AbstractMethodPaypal::load();

        if ((int)\Configuration::get('PAYPAL_SANDBOX') == 1) {
            $message = $this->module->l('Your PayPal account is currently configured to accept payments on Sandbox.', 'AdminPayPalController');
            $message .= ' (<b>' . $this->module->l('test environment', 'AdminPayPalController') . '</b>). ';
            $message .= $this->module->l('Any transaction will be fictitious. Disable the option to accept actual payments (live environment) and log in with your PayPal credentials.', 'AdminPayPalController');
            $this->warnings[] = $message;
        }

        if ((int)\Configuration::get('PAYPAL_NEED_CHECK_CREDENTIALS')) {
            $method->checkCredentials();
            \Configuration::updateValue('PAYPAL_NEED_CHECK_CREDENTIALS', 0);
        }

        $need_rounding = false;

        if (\Configuration::get('PS_ROUND_TYPE') != \Order::ROUND_ITEM
            || \Configuration::get('PS_PRICE_ROUND_MODE') != PS_ROUND_HALF_UP
            || \Configuration::get('PS_PRICE_DISPLAY_PRECISION') != 2) {
            $need_rounding = true;
        }

        $showWarningForUserBraintree = $this->module->showWarningForUserBraintree();
        $showPsCheckoutInfo = $this->module->showPsCheckoutMessage();
        $this->context->smarty->assign([
            'showWarningForUserBraintree' => $showWarningForUserBraintree,
            'methodType' => $this->method,
            'moduleDir' => _MODULE_DIR_,
            'showPsCheckoutInfo' => $showPsCheckoutInfo,
            'headerToolBar' => $this->headerToolBar,
            'showRestApiIntegrationMessage' => $this->isShowRestApiIntegrationMessage(),
            'psVersion' => _PS_VERSION_,
            'need_rounding' => $need_rounding,
            'isModeSandbox' => $method->isSandbox()
        ]);
    }

    public function renderForm($fields_form = null)
    {
        if ($fields_form === null) {
            $fields_form = $this->fields_form;
        }
        $helper = new \HelperForm();
        $helper->token = \Tools::getAdminTokenLite($this->controller_name);
        $helper->currentIndex = \AdminController::$currentIndex;
        $helper->submit_action = $this->controller_name . '_config';
        $default_lang = (int)\Configuration::get('PS_LANG_DEFAULT');
        $helper->default_form_language = $default_lang;
        $helper->allow_employee_form_lang = $default_lang;
        $helper->tpl_vars = array(
            'fields_value' => $this->tpl_form_vars,
            'id_language' => $this->context->language->id,
        );
        return $helper->generateForm($fields_form);
    }

    public function clearFieldsForm()
    {
        $this->fields_form = array();
        $this->tpl_form_vars = array();
    }

    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme);
        \Media::addJsDef(array(
            'controllerUrl' => \AdminController::$currentIndex . '&token=' . \Tools::getAdminTokenLite($this->controller_name),
        ));
        $this->addCSS(_PS_MODULE_DIR_ . $this->module->name . '/views/css/paypal_bo.css');
    }

    protected function _checkRequirements()
    {
        $response = array(
            'success' => true,
            'message' => array()
        );
        $hooksUnregistered = $this->module->getHooksUnregistered();
        if (empty($hooksUnregistered) == false) {
            $response['success'] = false;
            $response['message'][] = $this->getHooksUnregisteredMessage($hooksUnregistered);
        }

        if ((int)\Configuration::get('PS_COUNTRY_DEFAULT') == false) {
            $response['success'] = false;
            $response['message'][] = $this->module->l('To activate a payment solution, please select your default country.', 'AdminPayPalController');
        }

        if ($this->module->isSslActive() == false) {
            $response['success'] = false;
            $response['message'][] = $this->module->l('SSL should be enabled on your website.', 'AdminPayPalController');
        }

        $tls_check = $this->_checkTLSVersion();
        if ($tls_check['status'] == false) {
            $response['success'] = false;
            $response['message'][] = $this->module->l('Tls verification failed.', 'AdminPayPalController').' '.$tls_check['error_message'];
        }
        if ($response['success']) {
            $response['message'][] = $this->module->l('Your shop configuration is OK. You can start configuring your PayPal module.', 'AdminPayPalController');
        }
        return $response;
    }

    /**
     * Check TLS version 1.2 compability : CURL request to server
     */
    protected function _checkTLSVersion()
    {
        $return = array(
            'status' => false,
            'error_message' => ''
        );

        if (defined('CURL_SSLVERSION_TLSv1_2') == false) {
            define('CURL_SSLVERSION_TLSv1_2', 6);
        }

        $tls_server = $this->context->link->getModuleLink($this->module->name, 'tlscurltestserver');
        $curl = curl_init($tls_server);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        $response = curl_exec($curl);
        if (trim($response) != 'ok') {
            $return['status'] = false;
            $curl_info = curl_getinfo($curl);
            if ($curl_info['http_code'] == 401) {
                $return['error_message'] = $this->module->l('401 Unauthorised. Please note that the TLS verification can\'t be done if you have htaccess password protection, debug or maintenance mode enabled on your web site.', 'AdminPayPalController');
            } else {
                $return['error_message'] = curl_error($curl);
            }
        } else {
            $return['status'] = true;
        }

        return $return;
    }

    public function postProcess()
    {
        if (\Tools::isSubmit("checkCredentials")) {
            $method = AbstractMethodPaypal::load($this->method);
            $method->checkCredentials();
            $this->errors = array_merge($this->errors, $method->errors);
        }

        if (\Tools::isSubmit($this->controller_name . '_config')) {
            if ($this->saveForm()) {
                $this->confirmations[] = $this->module->l('Successful update.', 'AdminPayPalController');
            }
        }

        if (empty($this->errors) == false) {
            $this->errors = array_unique($this->errors);
            foreach ($this->errors as $error) {
                $this->log($error);
            }
        }

        parent::postProcess();
    }

    public function saveForm()
    {
        $result = true;

        foreach (\Tools::getAllValues() as $fieldName => $fieldValue) {
            if (in_array($fieldName, $this->parametres)) {
                $result &= \Configuration::updateValue(\Tools::strtoupper($fieldName), pSQL($fieldValue));
            }
        }

        return $result;
    }

    public function log($message)
    {
        ProcessLoggerHandler::openLogger();
        ProcessLoggerHandler::logError($message, null, null, null, null, null, (int)\Configuration::get('PAYPAL_SANDBOX'));
        ProcessLoggerHandler::closeLogger();
    }

    /**
     *  @param array $hooks array of the hooks name
     *  @return string
     */
    public function getHooksUnregisteredMessage($hooks)
    {
        if (is_array($hooks) == false || empty($hooks)) {
            return '';
        }

        $this->context->smarty->assign('hooks', $hooks);
        return $this->context->smarty->fetch($this->getTemplatePath() . '_partials/messages/unregisteredHooksMessage.tpl');
    }

    public function displayAjaxHandlePsCheckoutAction()
    {
        $action = \Tools::getValue('actionHandled');
        $response = array();

        switch ($action) {
            case 'close':
                $this->module->setPsCheckoutMessageValue(true);
                break;
            case 'install':
                if (is_dir(_PS_MODULE_DIR_ . 'ps_checkout') == false) {
                    $response = array(
                        'redirect' => true,
                        'url' => 'https://addons.prestashop.com/en/payment-card-wallet/46347-prestashop-checkout-built-with-paypal.html'
                    );
                } else {
                    if ($this->installPsCheckout()) {
                        $response = array(
                            'redirect' => true,
                            'url' => $this->context->link->getAdminLink('AdminModules', true, [], ['configure' => 'ps_checkout'])
                        );
                    } else {
                        $response = array(
                            'redirect' => false,
                            'url' => 'someUrl'
                        );
                    }
                }
                break;
        }

        $jsonResponse = new JsonResponse($response);
        return $jsonResponse->send();
    }

    public function displayAjaxUpdateRoundingSettings()
    {
        \Configuration::updateValue(
            'PS_ROUND_TYPE',
            '1',
            false,
            null,
            (int) $this->context->shop->id
        );

        \Configuration::updateValue(
            'PS_PRICE_ROUND_MODE',
            '2',
            false,
            null,
            (int) $this->context->shop->id
        );

        \Configuration::updateValue(
            'PS_PRICE_DISPLAY_PRECISION',
            '2',
            false,
            null,
            (int) $this->context->shop->id
        );

        $message = $this->module->l('Settings updated. Your rounding settings are compatible with PayPal!', 'AdminPayPalController');

        $this->ajaxDie($message);
    }

    public function installPsCheckout()
    {
        $moduleManagerBuilder = ModuleManagerBuilder::getInstance();
        $moduleManager = $moduleManagerBuilder->build();

        if ($moduleManager->isInstalled('ps_checkout') == true) {
            return true;
        }

        return $moduleManager->install('ps_checkout');
    }

    protected function isShowRestApiIntegrationMessage()
    {
        $method = AbstractMethodPaypal::load();

        if (version_compare('5.2.0', \Configuration::get('PAYPAL_PREVIOUS_VERSION'), '>') && $method->isConfigured() === false) {
            return true;
        }

        return false;
    }

    public function initPageHeaderToolbar()
    {
        $query = [
            'token' => $this->token,
            'action' => 'set_sandbox_mode',
            'sandbox_mode' => \Configuration::get('PAYPAL_SANDBOX') ? 0 : 1
        ];
        $this->page_header_toolbar_btn['switch_sandbox'] = [
            'desc' => $this->l('Sandbox mode', 'AdminPayPalController'),
            'icon' => 'process-icon-toggle-' . (\Configuration::get('PAYPAL_SANDBOX') ? 'on' : 'off'),
            'help' => $this->l('Sandbox mode is the test environment where you\'ll be not able to collect any real payments.', 'AdminPayPalController'),
            'href' => self::$currentIndex . '?' . http_build_query($query)
        ];

        parent::initPageHeaderToolbar();
        $this->context->smarty->clearAssign('help_link');
    }
}
