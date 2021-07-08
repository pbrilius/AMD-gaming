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

require_once _PS_MODULE_DIR_ . 'paypal/vendor/autoload.php';

use PaypalAddons\classes\AbstractMethodPaypal;
use PaypalPPBTlib\Extensions\ProcessLogger\ProcessLoggerHandler;

class AdminPaypalGetCredentialsController extends ModuleAdminController
{
    public function init()
    {
        parent::init();

        // We can wait for authToken max 10 sec
        $maxDuration = 10;
        $start = time();
        $wait = true;
        $method = AbstractMethodPaypal::load();

        do {
            Configuration::clearConfigurationCacheForTesting();
            if ($method->isCredentialsSetted()) {
                $wait = false;
            }

            $duration = time() - $start;

            if ($duration > $maxDuration) {
                $wait = false;
            }
        } while ($wait);

        Tools::redirectAdmin($this->context->link->getAdminLink('AdminPayPalSetup', true, [], ['checkCredentials' => 1]));
    }
}
