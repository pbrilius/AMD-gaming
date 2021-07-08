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

namespace PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders;

class ProductTopSellerDataLoaders extends DataLoadersFactory
{
    /**
     * @param array $args
     *
     * @return array
     */
    public function get($args)
    {
        $current = $this->getDatas($args[0]['InputData']['TimeDimension']['dateRange'], $args[0]['Limit']);
        $previous = 0;
        if (true === $args[0]['InputData']['compareMode']) {
            $previous = $this->getDatas($this->switchDateRange($args[0]['InputData']['TimeDimension']['dateRange']));
        }

        return [
            'currentPeriod' => $current,
            'previousPeriod' => $previous,
        ];
    }

    /**
     * @param array $dateRange
     * @param int $limit
     *
     * @return array
     */
    public function getDatas($dateRange, $limit = 10)
    {
        $rows = $this->dbHelper->executeS('SELECT od.product_id as productId, SUM(od.product_quantity) as quantity
            , SUM(od.total_price_tax_incl) as amount FROM ps_order_detail od
            INNER JOIN ' . _DB_PREFIX_ . 'orders o ON (od.id_order = o.id_order)
            WHERE o.date_add BETWEEN "' . $dateRange['startDate'] . '" AND "' . $dateRange['endDate'] . '"
            GROUP BY od.product_id
            ORDER BY quantity DESC
            LIMIT ' . $limit);

        $products = [];
        if (!empty($rows)) {
            foreach ($rows as $key => $row) {
                $product = [
                    'id' => $row['productId'],
                    'name' => \Product::getProductName($row['productId']),
                    'quantity' => $row['quantity'],
                    'amount' => $row['amount'],
                ];
                array_push($products, $product);
            }
        }

        return $products;
    }
}
