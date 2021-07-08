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

namespace PrestaShop\Module\Ps_metrics\Repository;

use PrestaShop\Module\Ps_metrics\Context\PrestaShopContext;
use PrestaShop\Module\Ps_metrics\Helper\DbHelper;
use PrestaShop\Module\Ps_metrics\Helper\ShopHelper;
use Shop;

class OrdersRepository
{
    /**
     * @var string
     */
    private $startDate;

    /**
     * @var string
     */
    private $endDate;

    /**
     * @var int
     */
    private $granularity;

    /**
     * @var DbHelper
     */
    private $dbHelper;

    /**
     * @var ShopHelper
     */
    private $shopHelper;

    /**
     * @var PrestaShopContext
     */
    private $prestaShopContext;

    /**
     * __construct
     *
     * @param DbHelper $dbHelper
     * @param ShopHelper $shopHelper
     * @param PrestaShopContext $prestaShopContext
     */
    public function __construct(DbHelper $dbHelper, ShopHelper $shopHelper, PrestaShopContext $prestaShopContext)
    {
        $this->dbHelper = $dbHelper;
        $this->shopHelper = $shopHelper;
        $this->prestaShopContext = $prestaShopContext;
    }

    /**
     * @param string $startDate
     * @param string $endDate
     * @param int $granularity
     *
     * @return void
     */
    public function setFilters($startDate, $endDate, $granularity)
    {
        $this->startDate = $startDate . ' 00:00:00';
        $this->endDate = $endDate . ' 23:59:59';
        $this->granularity = $granularity;
    }

    /**
     * findAllRevenuesByDateAndGranularity
     *
     * @return array
     */
    public function findAllRevenuesByDateAndGranularity()
    {
        return $this->dbHelper->executeS(
            'SELECT
                o.id_customer,
                LEFT(o.date_add, ' . $this->granularity . ') as date,
                SUM(o.total_paid_tax_incl / o.conversion_rate) as revenues,
                SUM(oslip.total_products_tax_incl / oslip.conversion_rate) as refund
            FROM ' . _DB_PREFIX_ . 'orders o
            INNER JOIN ' . _DB_PREFIX_ . 'order_state os ON (o.current_state = os.id_order_state)
            LEFT JOIN ' . _DB_PREFIX_ . 'order_slip oslip ON (o.id_order = oslip.id_order)
            WHERE
                o.date_add BETWEEN "' . pSQL($this->startDate) . '" AND "' . pSQL($this->endDate) . '"
                AND os.logable = 1
                ' . $this->shopHelper->addSqlRestriction(false, 'o') . '
            GROUP BY date'
        );
    }

    /**
     * findAllRevenuesByDateAndGranularityTaxExcluded
     *
     * @return array
     */
    public function findAllRevenuesByDateAndGranularityTaxExcluded()
    {
        return $this->dbHelper->executeS(
            'SELECT
                o.id_customer,
                LEFT(o.date_add, ' . $this->granularity . ') as date,
                SUM(o.total_paid_tax_excl / o.conversion_rate) as revenues,
                SUM(o.total_shipping_tax_excl / o.conversion_rate) as shipping,
                SUM((o.total_paid_tax_incl + o.total_shipping_tax_incl - o.total_paid_tax_excl - o.total_shipping_tax_excl) / o.conversion_rate) as tax,
                SUM(oslip.total_products_tax_incl / oslip.conversion_rate) as refund
            FROM ' . _DB_PREFIX_ . 'orders o
            INNER JOIN ' . _DB_PREFIX_ . 'order_state os ON (o.current_state = os.id_order_state)
            LEFT JOIN ' . _DB_PREFIX_ . 'order_slip oslip ON (o.id_order = oslip.id_order)
            WHERE
                o.date_add BETWEEN "' . pSQL($this->startDate) . '" AND "' . pSQL($this->endDate) . '"
                AND os.logable = 1
                ' . Shop::addSqlRestriction(false, 'o') . '
            GROUP BY date'
        );
    }

    /**
     * findAllRevenuesByCustomerByDateAndGranularity
     *
     * @return array
     */
    public function findAllRevenuesByCustomerByDateAndGranularity()
    {
        return $this->dbHelper->executeS(
            'SELECT
                o.id_order,
                o.id_customer,
                LEFT(o.date_add, ' . $this->granularity . ') as date,
                SUM(total_paid_tax_incl / o.conversion_rate) as revenues,
                SUM(oslip.total_products_tax_incl / oslip.conversion_rate) as refund
            FROM ' . _DB_PREFIX_ . 'orders o
            INNER JOIN ' . _DB_PREFIX_ . 'order_state os ON (o.current_state = os.id_order_state)
            LEFT JOIN ' . _DB_PREFIX_ . 'order_slip oslip ON (o.id_order = oslip.id_order)
            WHERE
                o.date_add BETWEEN "' . pSQL($this->startDate) . '" AND "' . pSQL($this->endDate) . '"
                AND os.logable = 1
                ' . $this->shopHelper->addSqlRestriction(false, 'o') . '
            GROUP BY id_order'
        );
    }

    /**
     * Find all revenues grouped by payment method
     *
     * @return array
     */
    public function findAllRevenuesByPaymentMethodsByDateAndGranularity()
    {
        return $this->dbHelper->executeS(
            'SELECT
                op.payment_method,
                LEFT(o.date_add, ' . $this->granularity . ') as date,
                SUM(total_paid_tax_incl / o.conversion_rate) as revenues,
                SUM(oslip.total_products_tax_incl / oslip.conversion_rate) as refund
            FROM ' . _DB_PREFIX_ . 'orders o
            INNER JOIN ' . _DB_PREFIX_ . 'order_state os ON (o.current_state = os.id_order_state)
            LEFT JOIN ' . _DB_PREFIX_ . 'order_slip oslip ON (o.id_order = oslip.id_order)
            LEFT JOIN ' . _DB_PREFIX_ . 'order_payment op ON (o.reference = op.order_reference)
            WHERE
                o.date_add BETWEEN "' . pSQL($this->startDate) . '" AND "' . pSQL($this->endDate) . '"
                AND os.logable = 1
                ' . Shop::addSqlRestriction(false, 'o') . '
            GROUP BY op.payment_method'
        );
    }

    /**
     * findAllCategoriesByDate
     *
     * @return array
     */
    public function findAllBestCategoriesRevenuesByDate()
    {
        return $this->dbHelper->executeS(
            'SELECT
                od.id_order_detail,
                SUM((od.unit_price_tax_incl / o.conversion_rate) * od.product_quantity) as revenues,
                SUM(osd.amount_tax_incl / oslip.conversion_rate) as refund,
                o.date_add,
                cl.name
            FROM ' . _DB_PREFIX_ . 'order_detail od
            INNER JOIN ' . _DB_PREFIX_ . 'orders o ON (od.id_order = o.id_order)
            LEFT JOIN ' . _DB_PREFIX_ . 'order_slip_detail osd ON (od.id_order_detail = osd.id_order_detail)
            LEFT JOIN ' . _DB_PREFIX_ . 'order_slip oslip ON (o.id_order = oslip.id_order)
            INNER JOIN ' . _DB_PREFIX_ . 'order_state os ON (o.current_state = os.id_order_state)
            INNER JOIN ' . _DB_PREFIX_ . 'product p ON (od.product_id = p.id_product)
            INNER JOIN ' . _DB_PREFIX_ . 'category_lang cl ON (p.id_category_default = cl.id_category)
            WHERE
                o.date_add BETWEEN "' . pSQL($this->startDate) . '" AND "' . pSQL($this->endDate) . '"
                AND os.logable = 1
                AND cl.id_lang = ' . $this->prestaShopContext->getEmployeeIdLang() . '
                ' . $this->shopHelper->addSqlRestriction(false, 'o') . '
            GROUP BY cl.id_category'
        );
    }

    /**
     * Find top 10 ordered product
     *
     * @return array
     */
    public function findTopOrderedProduct()
    {
        $query = 'SELECT od.product_id as productId, SUM(od.product_quantity) as quantity
            FROM ' . _DB_PREFIX_ . 'order_detail od
            INNER JOIN ' . _DB_PREFIX_ . 'orders o ON (od.id_order = o.id_order)
            WHERE o.date_add BETWEEN "' . pSQL($this->startDate) . '" AND "' . pSQL($this->endDate) . '"
            GROUP BY od.product_id
            ORDER BY quantity DESC
            LIMIT 10';

        $result = $this->dbHelper->executeS($query);

        if (count($result) === 0) {
            return [];
        }

        foreach ($result as $key => $product) {
            $result[$key]['productName'] = \Product::getProductName($product['productId']);
        }

        $data['data'] = array_column($result, 'quantity');
        $data['labels'] = array_column($result, 'productName');

        return $data;
    }

    /**
     * findAllOrdersByDateAndGranularity
     *
     * @return array
     */
    public function findAllOrdersByDateAndGranularity()
    {
        return $this->dbHelper->executeS(
            'SELECT
                LEFT(o.date_add, ' . $this->granularity . ') as date,
                COUNT(o.id_order) as orders,
                o.module as payment_module
            FROM ' . _DB_PREFIX_ . 'orders o
            INNER JOIN ' . _DB_PREFIX_ . 'order_state os ON (o.current_state = os.id_order_state)
            WHERE
                o.date_add BETWEEN "' . pSQL($this->startDate) . '" AND "' . pSQL($this->endDate) . '"
                AND os.logable = 1
                ' . $this->shopHelper->addSqlRestriction(false, 'o') . '
            GROUP BY date, o.module'
        );
    }

    /**
     * findCustomerInvoiceDateBySpecificDate
     *
     * @param int $customerId
     * @param string $date
     *
     * @return string|false|null
     */
    public function findCustomerInvoiceDateBySpecificDate($customerId, $date)
    {
        return $this->dbHelper->getValue(
            'SELECT COUNT(o.date_add)
            FROM ' . _DB_PREFIX_ . 'orders o
            INNER JOIN ' . _DB_PREFIX_ . 'order_state os ON (o.current_state = os.id_order_state)
            INNER JOIN ' . _DB_PREFIX_ . 'customer c ON (o.id_customer = c.id_customer)
            WHERE
                c.id_customer = ' . (int) $customerId . '
                AND o.date_add <= "' . pSQL($date) . '"
                AND os.logable = 1
                ' . $this->shopHelper->addSqlRestriction(false, 'o') . '
            ORDER BY o.date_add ASC'
        );
    }

    /**
     * Get all cart from existing in a date range AND get all abandoned carts in that range
     * Get datas without orders only
     *
     * @return array
     */
    public function findAllCartsOrderedByDate()
    {
        // In Prestashop, a cart is abandoned when the cart is not updated for, at least, 24 hours
        return $this->dbHelper->getRow(
            'SELECT COUNT(all_cart.id_cart) AS all_cart, COUNT(abandon_cart.id_cart) AS ordered
            FROM `' . _DB_PREFIX_ . 'cart` all_cart
            LEFT JOIN `' . _DB_PREFIX_ . 'orders` o ON (all_cart.id_cart = o.id_cart AND all_cart.id_shop = o.id_shop)
            LEFT JOIN `' . _DB_PREFIX_ . 'cart` abandon_cart ON (
                all_cart.id_cart = abandon_cart.id_cart
                AND abandon_cart.date_upd >= DATE_ADD("' . pSQL($this->startDate) . '", INTERVAL 1 HOUR)
                AND abandon_cart.date_upd <= DATE_ADD("' . pSQL($this->endDate) . '", INTERVAL 1 HOUR)
                AND abandon_cart.id_cart = o.id_cart
                AND abandon_cart.id_shop = ' . $this->prestaShopContext->getShopId() . '
            )
            WHERE 1
                AND all_cart.date_upd >= DATE_ADD("' . pSQL($this->startDate) . '", INTERVAL 1 HOUR)
                AND all_cart.date_upd <= DATE_ADD("' . pSQL($this->endDate) . '", INTERVAL 1 HOUR)
                AND all_cart.id_shop = ' . $this->prestaShopContext->getShopId()
        );
    }
}
