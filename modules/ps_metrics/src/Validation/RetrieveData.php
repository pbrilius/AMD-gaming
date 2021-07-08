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

namespace PrestaShop\Module\Ps_metrics\Validation;

class RetrieveData
{
    /** @var string[] */
    private $validGranularities = ['hours', 'days', 'weeks', 'months'];
    /** @var string[] */
    private $validDataTypes = ['total', 'revenues', 'orders', 'visits', 'conversion'];
    /** @var int */
    private $validMonthDiff = 3;

    /**
     * Verify Data Type
     *
     * @param string $dataType
     *
     * @return bool
     */
    public function dataType($dataType)
    {
        return in_array($dataType, $this->validDataTypes);
    }

    /**
     * Verify Granularity
     *
     * @param string $granularity
     *
     * @return bool
     */
    public function granularity($granularity)
    {
        return in_array($granularity, $this->validGranularities);
    }

    /**
     * Verify Date Range. Range can be 3months max from today
     *
     * @param array $dateRange
     *
     * @return bool
     */
    public function dateRange($dateRange)
    {
        $startDate = \DateTime::createFromFormat('Y-m-d', $dateRange['startDate']);
        $endDate = \DateTime::createFromFormat('Y-m-d', $dateRange['endDate']);

        if (false === $startDate || false === $endDate) {
            return false;
        }

        $dateToday = new \DateTime('NOW');
        $dateDiff = $endDate->diff($dateToday);

        if ($this->isMoreThanThreeMonths($dateDiff)) {
            return false;
        }

        return true;
    }

    /**
     * Check if the date difference is more than 3 months or not
     *
     * @param \DateInterval $diff
     *
     * @return bool
     */
    protected function isMoreThanThreeMonths($diff)
    {
        $yearFromDiff = (int) $diff->format('%y');
        $monthFromDiff = (int) $diff->format('%m');
        $monthsDiff = $yearFromDiff * 12 + $monthFromDiff;

        if ($this->validMonthDiff < $monthsDiff) {
            return true;
        }

        return false;
    }
}
