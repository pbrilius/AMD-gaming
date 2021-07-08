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

namespace PrestaShop\Module\Ps_metrics\Kpi;

use PrestaShop\Module\Ps_metrics\Helper\DataHelper;
use PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration;
use PrestaShop\Module\Ps_metrics\Repository\OrdersRepository;

class RevenuesKpi extends Kpi implements KpiStrategyInterface
{
    /**
     * @var OrdersRepository
     */
    private $ordersRepository;

    /**
     * @var DataHelper
     */
    private $dataHelper;

    /**
     * Revenues kpi constructor.
     *
     * @param KpiConfiguration|null $configuration
     * @param DataHelper $dataHelper
     * @param OrdersRepository $ordersRepository
     */
    public function __construct(
        KpiConfiguration $configuration = null,
        DataHelper $dataHelper,
        OrdersRepository $ordersRepository
    ) {
        $this->ordersRepository = $ordersRepository;
        $this->dataHelper = $dataHelper;

        if ($configuration !== null) {
            $this->setConfiguration($configuration);
        }
    }

    /**
     * Return all revenues data
     *
     * @return array
     */
    public function present()
    {
        return [
            'revenues' => $this->dataHelper->modifyArrayMainKeys($this->getRevenues(), 'date'),
            'revenuesCategory' => $this->getRevenuesPerCategoryFinalArray(),
            'revenuesExploded' => $this->dataHelper->modifyArrayMainKeys($this->getRevenuesTaxAndShipExcluded(), 'date'),
        ];
    }

    /**
     * getTotalRevenues
     *
     * @return float
     */
    public function getTotal()
    {
        $revenues = $this->getRevenues();

        if (empty($revenues)) {
            return 0;
        }

        $total = 0;

        foreach ($revenues as $revenue) {
            $total += (float) $revenue['revenues'];
        }

        return $total;
    }

    /**
     * Complete a revenue table for customers without orders and customers with orders
     *
     * @return array
     */
    public function getTotalCustomersRevenues()
    {
        $revenues = $this->dataHelper->subtractDataRecursively(
            $this->ordersRepository->findAllRevenuesByCustomerByDateAndGranularity(),
            'revenues',
            'refund'
        );

        $totalRevenuesWithOrders = 0;
        $totalRevenuesWithoutOrders = 0;
        $totalCustomersWithOrders = 0;
        $totalCustomersWithoutOrders = 0;

        $revenuesSorted = [];
        foreach ($revenues as $revenue) {
            $date = ('weeks' === $this->getConfiguration()->granularity['type']) ?
                 (new \DateTime($revenue['date']))->format('Y-W') : $revenue['date'];

            if (!array_key_exists($date, $revenuesSorted)) {
                $revenuesSorted[$date] = [];
            }

            if (!array_key_exists($revenue['id_customer'], $revenuesSorted[$date])) {
                $totalRevenuesWithoutOrders += $revenue['revenues'];
                ++$totalCustomersWithoutOrders;
                $revenuesSorted[$date][$revenue['id_customer']] = true;
            } else {
                $totalRevenuesWithOrders += $revenue['revenues'];
                ++$totalCustomersWithOrders;
            }
        }

        return [
            'with_orders' => [
                'revenues' => $this->presentRevenue('revenues_with_orders', $totalRevenuesWithOrders, $totalRevenuesWithOrders + $totalRevenuesWithoutOrders),
                'customers' => $this->presentRevenue('customers_with_orders', $totalCustomersWithOrders, $totalCustomersWithOrders + $totalCustomersWithoutOrders),
            ],
            'without_orders' => [
                'revenues' => $this->presentRevenue('revenues_without_orders', $totalRevenuesWithoutOrders, $totalRevenuesWithOrders + $totalRevenuesWithoutOrders),
                'customers' => $this->presentRevenue('customers_without_orders', $totalCustomersWithoutOrders, $totalCustomersWithOrders + $totalCustomersWithoutOrders),
            ],
        ];
    }

    /**
     * Present datas
     *
     * @param string $label
     * @param float $value
     * @param float $total
     *
     * @return array
     */
    public function presentRevenue($label, $value, $total)
    {
        // to fix divised by 0 if no datas
        $total = (0 == $total) ? 1 : $total;

        return [
                'label' => $label,
                'value' => $value,
                'percent' => ((100 * $value) / $total),
            ];
    }

    /**
     * Retrieve revenues
     *
     * @return array
     */
    private function getRevenues()
    {
        $revenues = $this->dataHelper->subtractDataRecursively(
            $this->ordersRepository->findAllRevenuesByDateAndGranularity(),
            'revenues',
            'refund'
        );

        if ('weeks' === $this->getConfiguration()->granularity['type']) {
            $revenues = $this->dataHelper->transformToGranularityWeeks($revenues, ['revenues']);
        }
        if ('hours' === $this->getConfiguration()->granularity['type']) {
            $revenues = $this->dataHelper->transformToGranularityHours($revenues, ['revenues']);
        }

        return $revenues;
    }

    /**
     * Retrieve revenues, taxes and shipment in separated fields
     *
     * @return array
     */
    private function getRevenuesTaxAndShipExcluded()
    {
        $revenues = $this->ordersRepository->findAllRevenuesByDateAndGranularityTaxExcluded();

        if ('weeks' === $this->getConfiguration()->granularity['type']) {
            $revenues = $this->dataHelper->transformToGranularityWeeks($revenues, ['revenues', 'shipping', 'refund', 'tax']);
        }
        if ('hours' === $this->getConfiguration()->granularity['type']) {
            $revenues = $this->dataHelper->transformToGranularityHours($revenues, ['revenues', 'shipping', 'refund', 'tax']);
        }

        return $revenues;
    }

    /**
     * getRevenuesPerCategoryFinalArray
     *
     * @return array
     */
    private function getRevenuesPerCategoryFinalArray()
    {
        $revenuesPerCategory = $this->dataHelper->subtractDataRecursively(
            $this->ordersRepository->findAllBestCategoriesRevenuesByDate(),
            'revenues',
            'refund'
        );

        $revenuesPerCategory = $this->dataHelper->arrayMultiSort($revenuesPerCategory, 'revenues');
        $finalArray = [];
        $dateRangeStart = date('Y-m-d', strtotime($this->getConfiguration()->dateRange['startDate']));
        $dateRangeEnd = date('Y-m-d', strtotime($this->getConfiguration()->dateRange['endDate']));

        foreach ($revenuesPerCategory as $category) {
            $dateOrder = date('Y-m-d', strtotime($category['date_add']));
            if (($dateOrder >= $dateRangeStart) && ($dateOrder <= $dateRangeEnd)) {
                $finalArray[] = [
                    'name' => $category['name'],
                    'value' => ($category['revenues']),
                ];
            }
        }

        return array_splice($finalArray, 0, 10);
    }

    /**
     * @param KpiConfiguration $configuration
     */
    public function setConfiguration(KpiConfiguration $configuration)
    {
        parent::setConfiguration($configuration);

        $this->ordersRepository->setFilters(
            $this->getConfiguration()->dateRange['startDate'],
            $this->getConfiguration()->dateRange['endDate'],
            $this->getConfiguration()->granularity['forSql']
        );
    }

    /**
     * Get datas from payment methods
     *
     * @return array[]
     */
    public function getTotalPaymentMethodsRevenues()
    {
        $payments_methods = [
            'labels' => [],
            'values' => [],
            'percents' => [],
        ];

        $revenues = $this->dataHelper->subtractDataRecursively(
            $this->ordersRepository->findAllRevenuesByPaymentMethodsByDateAndGranularity(),
            'revenues',
            'refund'
        );

        if (!empty($revenues)) {
            // get total revenues
            // to fix divised by 0 if no datas
            $totalRevenues = array_sum(array_column($revenues, 'revenues'));
            $totalRevenues = (0 == $totalRevenues) ? 1 : $totalRevenues;

            //% of revenue by payment method
            foreach ($revenues as $payment_method) {
                $payments_methods['labels'][] = $payment_method['payment_method'];
                $payments_methods['values'][] = round($payment_method['revenues'], 2);
                $payments_methods['percents'][] = round(((100 * $payment_method['revenues']) / $totalRevenues), 2);
            }
        }

        return $payments_methods;
    }
}
