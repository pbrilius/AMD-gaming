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

/**
 * Validate EC payment
 */
class PaypalEcValidationModuleFrontController extends PaypalAbstarctModuleFrontController
{
    public function init()
    {
        parent::init();
        $this->values['short_cut'] = Tools::getvalue('short_cut');
        $this->values['paymentId'] = Tools::getvalue('token');
    }
    /**
     * @see FrontController::postProcess()
     */
    public function postProcess()
    {
        $method_ec = AbstractMethodPaypal::load('EC');
        $paypal = Module::getInstanceByName($this->name);

        try {
            $method_ec->setParameters($this->values);

            if ($method_ec->getShortCut()) {
                /** @var $resultPath \PaypalAddons\classes\API\Response\Response*/
                $resultPath = $method_ec->doOrderPatch();

                if ($resultPath->isSuccess() == false) {
                    throw new Exception($resultPath->getError()->getMessage());
                }
            }

            $method_ec->validation();
            $cart = Context::getContext()->cart;
            $customer = new Customer($cart->id_customer);
            $this->redirectUrl = 'index.php?controller=order-confirmation&id_cart='.$cart->id.'&id_module='.$paypal->id.'&id_order='.$paypal->currentOrder.'&key='.$customer->secure_key;
        } catch (PayPal\Exception\PPConnectionException $e) {
            $this->_errors['error_msg'] = $paypal->l('Error connecting to ', pathinfo(__FILE__)['filename']) . $e->getUrl();
        } catch (PayPal\Exception\PPMissingCredentialException $e) {
            $this->_errors['error_msg'] = $e->errorMessage();
        } catch (PayPal\Exception\PPConfigurationException $e) {
            $this->_errors['error_msg'] = $paypal->l('Invalid configuration. Please check your configuration file', pathinfo(__FILE__)['filename']);
        } catch (PaypalAddons\classes\PaypalException $e) {
            $this->_errors['error_code'] = $e->getCode();
            $this->_errors['error_msg'] = $e->getMessage();
            $this->_errors['msg_long'] = $e->getMessageLong();
        } catch (Exception $e) {
            $this->_errors['error_code'] = $e->getCode();
            $this->_errors['error_msg'] = $e->getMessage();
        } finally {
            $this->transaction_detail = $method_ec->getDetailsTransaction();
        }

        //unset cookie of payment init
        Context::getContext()->cookie->__unset('paypal_ecs');
        Context::getContext()->cookie->__unset('paypal_ecs_email');

        if (!empty($this->_errors)) {
            if ($this->_errors['error_code'] == 10486) {
                $this->redirectUrl = $method_ec->redirectToAPI('SetExpressCheckout');
            } else {
                $this->redirectUrl = Context::getContext()->link->getModuleLink($this->name, 'error', $this->_errors);
            }
        }
    }
}
