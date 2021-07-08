<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

namespace PrestaShop\Module\Ps_metrics\Context;

use ContextCore as Context;

/**
 * Class PrestaShopContext used to get information from PrestaShop Context
 */
class PrestaShopContext
{
    /**
     * @var Context
     */
    private $context;

    /**
     * PrestaShopContext constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->context = Context::getContext();
    }

    /**
     * Get the isoCode from the context language, if null, send 'en' as default value
     *
     * @return string
     */
    public function getLanguageIsoCode()
    {
        return $this->context->language !== null ? $this->context->language->iso_code : 'en';
    }

    /**
     * Get current language
     *
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->context->language;
    }

    /**
     * Get current language code
     *
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->context->language !== null ? $this->context->language->language_code : 'en';
    }

    /**
     * Get currency code
     *
     * @return string
     */
    public function getCurrencyIsoCode()
    {
        return $this->context->currency !== null ? $this->context->currency->iso_code : 'EUR';
    }

    /**
     * Get current locale
     *
     * @return string
     *
     * @todo implement currentLocale for version > 1.7.3.X
     */
    public function getCurrentLocale()
    {
        return $this->getLanguageIsoCode();
        //return $this->context->currentLocale !== null ? $this->context->currentLocale : 'en';
    }

    /**
     * Get controller name
     *
     * @return string
     */
    public function getControllerName()
    {
        /** @var \AdminControllerCore $adminController */
        $adminController = $this->context->controller;

        return (!empty($adminController->controller_name)) ? $adminController->controller_name : '';
    }

    /**
     * Get context link
     *
     * @return \Link
     */
    public function getLink()
    {
        return $this->context->link;
    }

    /**
     * Get shop id
     *
     * @return mixed
     */
    public function getShopId()
    {
        return (int) $this->context->shop->id;
    }

    /**
     * Get shop domain
     *
     * @return mixed
     */
    public function getShopDomain()
    {
        return $this->context->shop->domain;
    }

    /**
     * @return int
     */
    public function getEmployeeIdLang()
    {
        return (int) $this->context->employee->id_lang;
    }
}
