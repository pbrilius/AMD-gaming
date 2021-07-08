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

use Country;
use Configuration;

class ConfigurationMap
{
    const ENABLE_INSTALLMENT = 'PAYPAL_ENABLE_INSTALLMENT';

    const ADVANCED_OPTIONS_INSTALLMENT = 'PAYPAL_ADVANCED_OPTIONS_INSTALLMENT';

    const PRODUCT_PAGE = 'PAYPAL_INSTALLMENT_PRODUCT_PAGE';

    const HOME_PAGE = 'PAYPAL_INSTALLMENT_HOME_PAGE';

    const CART_PAGE = 'PAYPAL_INSTALLMENT_CART_PAGE';

    const CHECKOUT_PAGE = 'PAYPAL_INSTALLMENT_CHECKOUT_PAGE';

    const CATEGORY_PAGE = 'PAYPAL_INSTALLMENT_CATEGORY_PAGE';

    const COLOR = 'PAYPAL_INSTALLMENT_COLOR';

    const COLOR_BLUE = 'blue';

    const COLOR_GRAY = 'gray';

    const COLOR_BLACK = 'black';

    const COLOR_WHITE = 'white';

    const COLOR_MONOCHROME = 'monochrome';

    const COLOR_GRAYSCALE = 'grayscale';

    const PAGE_TYPE_PRODUCT = 'product-details';

    const PAGE_TYPE_CART = 'cart';

    const PAGE_TYPE_CHECKOUT = 'checkout';

    public static function getColorGradient($color)
    {
        $gradientMap = [
            self::COLOR_BLUE => '#023188',
            self::COLOR_BLACK => '#000000',
            self::COLOR_WHITE => '#ffffff',
            self::COLOR_MONOCHROME => '#ffffff',
            self::COLOR_GRAYSCALE => '#ffffff',
            self::COLOR_GRAY => '#ebecee'
        ];
        $isoCountryDefault = strtolower(Country::getIsoById(Configuration::get('PS_COUNTRY_DEFAULT')));

        if ($isoCountryDefault === 'de') {
            $gradientMap[self::COLOR_BLACK] = '#2c2e2f';
        }

        return isset($gradientMap[$color]) ? $gradientMap[$color] : $gradientMap[self::COLOR_BLUE];
    }

    /**
     * @return array
     */
    public static function getAllowedCountries()
    {
        return ['fr', 'de', 'gb', 'us'];
    }

    public static function getLanguageCurrencyMap()
    {
        return [
            ['fr' => 'eur'],
            ['de' => 'eur'],
            ['gb' => 'gbp'],
            ['en' => 'gbp'],
            ['gb' => 'usd'],
            ['en' => 'usd']
        ];
    }

    public static function getPageConfMap()
    {
        return [
            'OrderController' => self::CHECKOUT_PAGE,
            'CartController' => self::CART_PAGE,
            'ProductController' => self::PRODUCT_PAGE,
            'IndexController' => self::HOME_PAGE,
            'CategoryController' => self::CATEGORY_PAGE
        ];
    }
}

