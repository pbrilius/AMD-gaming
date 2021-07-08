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

namespace PrestaShop\Module\Ps_metrics\Kpi\Configuration;

class KpiConfiguration
{
    /**
     * @var array
     */
    public $dateRange;

    /**
     * @var array
     */
    public $granularity;

    /**
     * @var array
     */
    public $compareDateRange = null;

    /**
     * @return array
     */
    public function getDateRange()
    {
        return $this->dateRange;
    }

    /**
     * @param array $dateRange
     *
     * @return void
     */
    public function setDateRange($dateRange)
    {
        $this->dateRange = $dateRange;
    }

    /**
     * @return array
     */
    public function getGranularity()
    {
        return $this->granularity;
    }

    /**
     * @param string $granularity
     *
     * @return void
     */
    public function setGranularity($granularity)
    {
        $this->granularity = $this->getGranularityForSqlDates($granularity);
    }

    /**
     * @return array
     */
    public function getCompareDateRange()
    {
        return $this->compareDateRange;
    }

    /**
     * @param array $compareDateRange
     *
     * @return void
     */
    public function setCompareDateRange($compareDateRange)
    {
        $this->compareDateRange = $compareDateRange;
    }

    /**
     * getGranularityForSqlDates
     *
     * @param string $granularity
     *
     * @return array
     */
    private function getGranularityForSqlDates($granularity)
    {
        if ('weeks' === $granularity) {
            // for day : 0000-00-00
            return [
                'type' => 'weeks',
                'forSql' => 10,
            ];
        }

        if ('months' === $granularity) {
            // for month : 0000-00
            return [
                'type' => 'months',
                'forSql' => 7,
            ];
        }

        if ('hours' === $granularity) {
            // for hours : 0000-00-00 00
            return [
                'type' => 'hours',
                'forSql' => 13,
            ];
        }

        // for day : 0000-00-00
        return [
            'type' => 'days',
            'forSql' => 10,
        ];
    }
}
