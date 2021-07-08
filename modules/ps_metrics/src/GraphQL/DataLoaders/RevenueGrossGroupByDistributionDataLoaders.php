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

class revenueGrossGroupByDistributionDataLoaders extends DataLoadersFactory
{
    /**
     * @param array $args
     *
     * @return array
     */
    public function get($args)
    {
        $current = $this->getDatas($args[0]['InputData']['TimeDimension']['dateRange']);
//        $previous = $this->getDatas($this->switchDateRange($args[0]['InputData']['TimeDimension']['dateRange']));
        return $current;
//        return [
//            'currentPeriod' => $current,
//            'previousPeriod' => $previous,
//        ];
    }

    /**
     * @param array $dateRange
     *
     * @return array
     */
    private function getDatas($dateRange)
    {
        $row = $this->dbHelper->getRow('SELECT
                SUM(o.total_paid_tax_excl / o.conversion_rate) as revenue_ht,
                SUM(o.total_paid_tax_incl / o.conversion_rate) as revenue_ttc,
                SUM(o.total_shipping_tax_excl / o.conversion_rate) as shipping_ht,
                SUM(o.total_shipping_tax_incl / o.conversion_rate) as shipping_ttc
                FROM ' . _DB_PREFIX_ . 'orders o
                INNER JOIN ' . _DB_PREFIX_ . 'order_state os ON (o.current_state = os.id_order_state)
                WHERE
                o.date_add BETWEEN "' . pSQL($dateRange['startDate']) . '" AND "' . pSQL($dateRange['endDate']) . '"
        AND os.logable = 1
                ' . $this->shopHelper->addSqlRestriction(false, 'o'));

        $output = [];
        if (!empty($row)) {
            $revenue_HT = (empty($row['revenue_ht'])) ? 0 : $row['revenue_ht'];
            $revenue_TTC = (empty($row['revenue_ttc'])) ? 0 : $row['revenue_ttc'];
            $shipping_ttc = (empty($row['shipping_ttc'])) ? 0 : $row['shipping_ttc'];
            $total_taxes = ($revenue_TTC - $revenue_HT);

            $output = [
                [
                    'distribution' => 'shipping',
                    'currentValue' => $shipping_ttc,
                ],
                [
                    'distribution' => 'ht',
                    'currentValue' => $revenue_HT,
                ],
                [
                    'distribution' => 'ttc',
                    'currentValue' => $revenue_TTC,
                ],
                [
                    'distribution' => 'taxes',
                    'currentValue' => $total_taxes,
                ],
            ];
        }

        return $output;
    }
}
