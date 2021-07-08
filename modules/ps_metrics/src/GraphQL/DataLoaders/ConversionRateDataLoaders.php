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

use PrestaShop\Module\Ps_metrics\Kpi\VisitsKpi;

class ConversionRateDataLoaders extends DataLoadersFactory
{
    /**
     * @param array $args
     *
     * @return array
     */
    public function get($args)
    {
        /** @var \Ps_metrics $module */
        $module = \Module::getInstanceByName('ps_metrics');

        /** @var VisitsKpi $visitsKpi */
        $visitsKpi = $module->getService('ps_metrics.kpi.visits');

        $current = $this->getDatas($visitsKpi, $args[0]['InputData']['TimeDimension']['dateRange']);
        $previous = 0;
        if (true === $args[0]['InputData']['compareMode']) {
            $previous = $this->getDatas($visitsKpi, $this->switchDateRange($args[0]['InputData']['TimeDimension']['dateRange']));
        }

        return [
            'currentValue' => $current,
            'previousValue' => $previous,
        ];
    }

    /**
     * @param VisitsKpi $visitsKpi
     * @param array $dateRange
     *
     * @return int|float
     */
    private function getDatas($visitsKpi, $dateRange)
    {
        $row = $this->dbHelper->getRow(
            'SELECT
                COUNT(o.id_order) as nborders
            FROM ' . _DB_PREFIX_ . 'orders o
            INNER JOIN ' . _DB_PREFIX_ . 'order_state os ON (o.current_state = os.id_order_state)
            WHERE o.date_add BETWEEN "' . pSQL($dateRange['startDate']) . '" AND "' . pSQL($dateRange['endDate']) . '"
                AND os.logable = 1
                ' . $this->shopHelper->addSqlRestriction(false, 'o')
        );

        $visitsKpi->getConfiguration()->setDateRange($dateRange);
        $visitsData = $visitsKpi->getTotal();

        $conversion = 0;
        if (!empty($visitsData['total']) && !empty($visitsData['total']['session'])) {
            $conversion = $this->numberHelper->division($row['nborders'], $visitsData['total']['session']);
        }

        return $conversion * 100;
    }
}
