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

namespace PaypalAddons\classes\Form\Controller\AdminPayPalInstallment;


use PaypalAddons\classes\Form\FormInterface;
use \Module;
use \Configuration;
use PaypalAddons\classes\InstallmentBanner\Banner;
use \Tools;
use \Context;
use Country;
use PaypalAddons\classes\Form\Field\Select;
use PaypalAddons\classes\Form\Field\SelectOption;
use PaypalAddons\classes\InstallmentBanner\ConfigurationMap;

class FormInstallment implements FormInterface
{
    /** @var \Paypal*/
    protected $module;

    protected $className;

    public function __construct()
    {
        $this->module = Module::getInstanceByName('paypal');

        $reflection = new \ReflectionClass($this);
        $this->className = $reflection->getShortName();
    }

    /**
     * @return array
     */
    public function getFields()
    {
        $isoCountryDefault = strtolower(Country::getIsoById(Configuration::get('PS_COUNTRY_DEFAULT')));
        $fields = array(
            'legend' => array(
                'title' => $this->module->l('Settings', $this->className),
                'icon' => 'icon-cogs',
            ),
            'input' => array(
                array(
                    'type' => 'html',
                    'html_content' => $this->getDisclaimerHtml(),
                    'name' => '',
                    'col' => 12,
                    'label' => '',
                ),
                array(
                    'type' => 'switch',
                    'label' => $isoCountryDefault == 'gb' ? $this->module->l('Enable the display of 3x banners', $this->className) : $this->module->l('Enable the display of 4x banners', $this->className),
                    'name' => ConfigurationMap::ENABLE_INSTALLMENT,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => ConfigurationMap::ENABLE_INSTALLMENT . '_on',
                            'value' => 1,
                            'label' => $this->module->l('Enabled', $this->className),
                        ),
                        array(
                            'id' => ConfigurationMap::ENABLE_INSTALLMENT . '_off',
                            'value' => 0,
                            'label' => $this->module->l('Disabled', $this->className),
                        )
                    ),
                ),
                array(
                    'type' => 'html',
                    'html_content' => $this->getHtmlBlockPageDisplayingSetting(),
                    'name' => '',
                    'label' => '',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->module->l('Advanced options', $this->className),
                    'name' => ConfigurationMap::ADVANCED_OPTIONS_INSTALLMENT,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => ConfigurationMap::ADVANCED_OPTIONS_INSTALLMENT . '_on',
                            'value' => 1,
                            'label' => $this->module->l('Enabled', $this->className),
                        ),
                        array(
                            'id' => ConfigurationMap::ADVANCED_OPTIONS_INSTALLMENT . '_off',
                            'value' => 0,
                            'label' => $this->module->l('Disabled', $this->className),
                        )
                    ),
                ),
                array(
                    'type' => 'html',
                    'label' => $this->module->l('Widget code', $this->className),
                    'hint' => $this->module->l('By default, PayPal 4x banner is displayed on your web site via PrestaShop native hook. If you choose to use widgets, you will be able to copy widget code and insert it wherever you want in the web site template.', $this->className),
                    'name' => '',
                    'html_content' => $this->getWidgetField()
                ),
                array(
                    'type' => 'html',
                    'html_content' => $this->getBannerStyleSection(),
                    'name' => '',
                    'label' => $this->module->l('Home page and category page styles', $this->className),
                )
            ),
            'submit' => array(
                'title' => $this->module->l('Save', $this->className),
                'class' => 'btn btn-default pull-right button',
                'name' => 'installmentForm'
            ),
            'id_form' => 'pp_config_installment'
        );

        return $fields;
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return [
            ConfigurationMap::ENABLE_INSTALLMENT => (int)Configuration::get(ConfigurationMap::ENABLE_INSTALLMENT),
            ConfigurationMap::ADVANCED_OPTIONS_INSTALLMENT => (int)Configuration::get(ConfigurationMap::ADVANCED_OPTIONS_INSTALLMENT)
        ];
    }

    /**
     * @return bool
     */
    public function save()
    {
        $return = true;

        if (Tools::isSubmit('installmentForm') === false) {
            return $return;
        }

        $return &= Configuration::updateValue(ConfigurationMap::ENABLE_INSTALLMENT, (int)Tools::getValue(ConfigurationMap::ENABLE_INSTALLMENT));
        $return &= Configuration::updateValue(ConfigurationMap::ADVANCED_OPTIONS_INSTALLMENT, (int)Tools::getValue(ConfigurationMap::ADVANCED_OPTIONS_INSTALLMENT));
        $return &= Configuration::updateValue(ConfigurationMap::PRODUCT_PAGE, (int)Tools::getValue(ConfigurationMap::PRODUCT_PAGE));
        $return &= Configuration::updateValue(ConfigurationMap::CART_PAGE, (int)Tools::getValue(ConfigurationMap::CART_PAGE));
        $return &= Configuration::updateValue(ConfigurationMap::CHECKOUT_PAGE, Tools::getValue(ConfigurationMap::CHECKOUT_PAGE));
        $return &= Configuration::updateValue(ConfigurationMap::HOME_PAGE, (int)Tools::getValue(ConfigurationMap::HOME_PAGE));
        $return &= Configuration::updateValue(ConfigurationMap::CATEGORY_PAGE, (int)Tools::getValue(ConfigurationMap::CATEGORY_PAGE));
        $return &= Configuration::updateValue(ConfigurationMap::COLOR, Tools::getValue(ConfigurationMap::COLOR));

        return $return;
    }

    /**
     * @return string
     */
    protected function getHtmlBlockPageDisplayingSetting()
    {
        Context::getContext()->smarty->assign([
            ConfigurationMap::PRODUCT_PAGE => Configuration::get(ConfigurationMap::PRODUCT_PAGE),
            ConfigurationMap::HOME_PAGE => Configuration::get(ConfigurationMap::HOME_PAGE),
            ConfigurationMap::CATEGORY_PAGE => Configuration::get(ConfigurationMap::CATEGORY_PAGE),
            ConfigurationMap::CART_PAGE => Configuration::get(ConfigurationMap::CART_PAGE),
            ConfigurationMap::CHECKOUT_PAGE => Configuration::get(ConfigurationMap::CHECKOUT_PAGE)
        ]);

        return Context::getContext()->smarty->fetch(_PS_MODULE_DIR_ . $this->module->name . '/views/templates/admin/_partials/paypalBanner/installmentPageDisplayingSetting.tpl');
    }

    /**
     * @return string
     */
    protected function getWidgetField()
    {
        return Context::getContext()->smarty
            ->assign('widgetCode', '{widget name=\'paypal\' action=\'banner4x\'}')
            ->assign('confName', 'installmentWidgetCode')
            ->fetch(_PS_MODULE_DIR_ . $this->module->name . '/views/templates/admin/_partials/form/fields/widgetCode.tpl');
    }

    protected function getBannerStyleSection()
    {
        $isoCountryDefault = strtolower(Country::getIsoById(Configuration::get('PS_COUNTRY_DEFAULT')));
        $colorOptions = [
            new SelectOption(ConfigurationMap::COLOR_GRAY, $this->module->l('gray', $this->className)),
            new SelectOption(ConfigurationMap::COLOR_BLUE, $this->module->l('blue', $this->className)),
            new SelectOption(ConfigurationMap::COLOR_BLACK, $this->module->l('black', $this->className)),
            new SelectOption(ConfigurationMap::COLOR_WHITE, $this->module->l('white', $this->className))
        ];

        if ($isoCountryDefault !== 'de') {
            $colorOptions[] = new SelectOption(ConfigurationMap::COLOR_MONOCHROME, $this->module->l('monochrome', $this->className));
            $colorOptions[] = new SelectOption(ConfigurationMap::COLOR_GRAYSCALE, $this->module->l('grayscale', $this->className));
        }

        $colorSelect = new Select(
            ConfigurationMap::COLOR,
            $colorOptions,
            null,
            Configuration::get(ConfigurationMap::COLOR, null, null, null, ConfigurationMap::COLOR_GRAY)
        );

        return Context::getContext()->smarty
            ->assign('colorSelect', $colorSelect)
            ->fetch(_PS_MODULE_DIR_ . $this->module->name . '/views/templates/admin/_partials/paypalBanner/bannerStyleSection.tpl');
    }

    protected function getDisclaimerHtml()
    {
        $isoCountryDefault = Country::getIsoById(Configuration::get('PS_COUNTRY_DEFAULT'));
        return Context::getContext()->smarty
            ->assign('isoCountryDefault', strtolower($isoCountryDefault))
            ->fetch(_PS_MODULE_DIR_ . $this->module->name . '/views/templates/admin/_partials/paypalBanner/installmentDisclaimer.tpl');
    }
}
