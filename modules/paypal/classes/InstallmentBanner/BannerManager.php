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

namespace PaypalAddons\classes\InstallmentBanner;

use \Context;
use \Configuration;
use \Country;
use Symfony\Component\VarDumper\VarDumper;
use \ProductController;
use \CartController;
use \IndexController;
use \Categorycontroller;
use \OrderController;

class BannerManager
{
    /** @var Banner*/
    protected $banner;

    /** @var Context*/
    protected $context;

    public function __construct()
    {
        $this->banner = new Banner();
        $this->context = Context::getContext();
    }

    /**
     * @return bool
     */
    public function isEligibleContext()
    {
        $isoLang = strtolower($this->context->language->iso_code);
        $isoCurrency = strtolower($this->context->currency->iso_code);

        foreach (ConfigurationMap::getLanguageCurrencyMap() as $langCurrency) {
            if (isset($langCurrency[$isoLang]) && $langCurrency[$isoLang] == $isoCurrency) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isEligiblePage()
    {
        foreach (ConfigurationMap::getPageConfMap() as $page => $conf) {
            if (is_a($this->context->controller, $page) && (int)Configuration::get($conf)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isEligibleConf()
    {
        if (false === (bool)Configuration::get(ConfigurationMap::ENABLE_INSTALLMENT)) {
            return false;
        }

        $isoCountryDefault = Country::getIsoById((int)Configuration::get(
            'PS_COUNTRY_DEFAULT',
            null,
            null,
            $this->context->shop->id));

        if (false === in_array(strtolower($isoCountryDefault), ConfigurationMap::getAllowedCountries())) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function isBannerAvailable()
    {
        if ($this->isEligibleConf() === false) {
            return false;
        }

        if ($this->isEligibleContext() === false) {
            return false;
        }

        if ($this->isEligiblePage() === false) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function renderForHomePage()
    {
        return $this->banner
            ->setPlacement('home')
            ->setLayout('flex')
            ->setTemplate(_PS_MODULE_DIR_ . 'paypal/views/templates/installmentBanner/home-banner.tpl')
            ->render();
    }

    /**
     * @return string
     */
    public function renderForCartPage()
    {
        return $this->banner
            ->setPlacement('cart')
            ->setLayout('text')
            ->setAmount($this->context->cart->getOrderTotal(true))
            ->setPageTypeAttribute(ConfigurationMap::PAGE_TYPE_CART)
            ->setTemplate(_PS_MODULE_DIR_ . 'paypal/views/templates/installmentBanner/cart-banner.tpl')
            ->render();
    }

    /**
     * @return string
     */
    public function renderForCheckoutPage()
    {
        return $this->banner
            ->setPlacement('payment')
            ->setLayout('text')
            ->setAmount($this->context->cart->getOrderTotal(true))
            ->setPageTypeAttribute(ConfigurationMap::PAGE_TYPE_CHECKOUT)
            ->addJsVar('paypalInstallmentController', $this->context->link->getModuleLink('paypal', 'installment'))
            ->setTemplate(_PS_MODULE_DIR_ . 'paypal/views/templates/installmentBanner/checkout-banner.tpl')
            ->render();
    }

    /**
     * @return string
     */
    public function renderForProductPage()
    {
        return $this->banner
            ->setPlacement('product')
            ->setLayout('text')
            ->setPageTypeAttribute(ConfigurationMap::PAGE_TYPE_PRODUCT)
            ->setTemplate(_PS_MODULE_DIR_ . 'paypal/views/templates/installmentBanner/product-banner.tpl')
            ->render();
    }
}
