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

use PaypalAddons\classes\AbstractMethodPaypal;
use Symfony\Component\VarDumper\VarDumper;

/**
 * Prepare EC payment
 */
class PaypalEcInitModuleFrontController extends PaypalAbstarctModuleFrontController
{
    /* @var $method AbstractMethodPaypal*/
    protected $method;

    public function init()
    {
        parent::init();
        $this->values['getToken'] = Tools::getvalue('getToken');
        $this->values['credit_card'] = Tools::getvalue('credit_card');
        $this->values['short_cut'] = 0;
        $this->setMethod(AbstractMethodPaypal::load('EC'));
    }
    /**
     * @see FrontController::postProcess()
     */
    public function postProcess()
    {
        try {
            $this->method->setParameters($this->values);
            $url = $this->method->init()->getApproveLink();

            if ($this->values['getToken']) {
                $this->jsonValues = array('success' => true, 'token' => $this->method->getPaymentId());
            } else {
                //$this->redirectUrl = $url.'&useraction=commit';
                $this->redirectUrl = $url;
            }
        } catch (PayPal\Exception\PPConnectionException $e) {
            $this->_errors['error_msg'] = $this->module->l('Error connecting to ', pathinfo(__FILE__)['filename']) . $e->getUrl();
        } catch (PayPal\Exception\PPMissingCredentialException $e) {
            $this->_errors['error_msg'] = $e->errorMessage();
        } catch (PayPal\Exception\PPConfigurationException $e) {
            $this->_errors['error_msg'] = $this->module->l('Invalid configuration. Please check your configuration file', pathinfo(__FILE__)['filename']);
        } catch (PaypalAddons\classes\PaypalException $e) {
            $this->_errors['error_code'] = $e->getCode();
            $this->_errors['error_msg'] = $e->getMessage();
            $this->_errors['msg_long'] = $e->getMessageLong();
        } catch (Exception $e) {
            $this->_errors['error_code'] = $e->getCode();
            $this->_errors['error_msg'] = $e->getMessage();
        }

        if (!empty($this->_errors)) {
            if ($this->values['getToken']) {
                $this->jsonValues = array('success' => false, 'redirect_link' => Context::getContext()->link->getModuleLink($this->name, 'error', $this->_errors));
            } else {
                $this->redirectUrl = Context::getContext()->link->getModuleLink($this->name, 'error', $this->_errors);
            }
        }
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }
}
