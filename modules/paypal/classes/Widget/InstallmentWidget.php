<?php
/**
 * 2007-2021 PayPal
 *
 *  NOTICE OF LICENSE
 *
 *  This source file is subject to the Academic Free License (AFL 3.0)
 *  that is bundled with this package in the file LICENSE.txt.
 *  It is also available through the world-wide-web at this URL:
 *  http://opensource.org/licenses/afl-3.0.php
 *  If you did not receive a copy of the license and are unable to
 *  obtain it through the world-wide-web, please send an email
 *  to license@prestashop.com so we can send you a copy immediately.
 *
 *  DISCLAIMER
 *
 *  Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 *  versions in the future. If you wish to customize PrestaShop for your
 *  needs please refer to http://www.prestashop.com for more information.
 *
 *  @author 2007-2020 PayPal
 *  @author 202 ecommerce <tech@202-ecommerce.com>
 *  @copyright PayPal
 *  @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace PaypalAddons\classes\Widget;

use PaypalAddons\classes\InstallmentBanner\BannerManager;
use \ProductController;
use \CartController;
use \IndexController;
use \CategoryController;
use \OrderController;

class InstallmentWidget extends AbstractWidget
{

    /**
     * @return string
     */
    function render()
    {
        $bannerMaganager = new BannerManager();

        if ($bannerMaganager->isBannerAvailable() === false) {
            return '';
        }

        if ($this->context->controller instanceof IndexController) {
            return $bannerMaganager->renderForHomePage();
        }

        if ($this->context->controller instanceof CategoryController) {
            return $bannerMaganager->renderForHomePage();
        }

        if ($this->context->controller instanceof CartController) {
            return $bannerMaganager->renderForCartPage();
        }

        if ($this->context->controller instanceof OrderController) {
            return $bannerMaganager->renderForCheckoutPage();
        }

        if ($this->context->controller instanceof ProductController) {
            return $bannerMaganager->renderForProductPage();
        }

        return '';
    }
}
