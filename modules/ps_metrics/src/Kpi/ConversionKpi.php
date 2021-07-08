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

use PrestaShop\Module\Ps_metrics\Helper\NumberHelper;
use PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration;
use PrestaShop\Module\Ps_metrics\Repository\ConfigurationRepository;

class ConversionKpi extends Kpi implements KpiStrategyInterface
{
    /**
     * @var NumberHelper
     */
    private $numberHelper;

    /**
     * @var ConfigurationRepository
     */
    private $configurationRepository;

    /**
     * @var VisitsKpi
     */
    private $visitsKpi;

    /**
     * @var OrdersKpi
     */
    private $ordersKpi;

    /**
     * @var RevenuesKpi
     */
    private $revenuesKpi;

    /**
     * ConversionKpi constructor.
     *
     * @param KpiConfiguration $kpiConfiguration
     * @param NumberHelper $numberHelper
     * @param ConfigurationRepository $configurationRepository
     * @param VisitsKpi $visitsKpi
     * @param OrdersKpi $ordersKpi
     * @param RevenuesKpi $revenuesKpi
     */
    public function __construct(
        KpiConfiguration $kpiConfiguration,
        NumberHelper $numberHelper,
        ConfigurationRepository $configurationRepository,
        VisitsKpi $visitsKpi,
        OrdersKpi $ordersKpi,
        RevenuesKpi $revenuesKpi
    ) {
        parent::__construct($kpiConfiguration);
        $this->numberHelper = $numberHelper;
        $this->configurationRepository = $configurationRepository;
        $this->visitsKpi = $visitsKpi;
        $this->ordersKpi = $ordersKpi;
        $this->revenuesKpi = $revenuesKpi;
    }

    /**
     * Return data
     *
     * @return array
     */
    public function present()
    {
        $gaIsOnboarded = (bool) $this->configurationRepository->getGoogleLinkedValue();

        if (!$gaIsOnboarded) {
            return [];
        }

        $this->visitsKpi->setConfiguration($this->getConfiguration());
        $visitsData = $this->visitsKpi->present();
        $visitsData = $visitsData['visits'];

        $this->ordersKpi->setOnlyOrderPaidOnWebsite(true);
        $this->ordersKpi->setConfiguration($this->getConfiguration());

        $ordersData = $this->ordersKpi->present();

        $this->revenuesKpi->setConfiguration($this->getConfiguration());

        if (empty($visitsData)) {
            return [
                'conversionRate' => [],
                'conversionRateTotal' => [],
                'revenuesCustomers' => $this->revenuesKpi->getTotalCustomersRevenues(),
                'revenuesPaymentMethod' => $this->revenuesKpi->getTotalPaymentMethodsRevenues(),
            ];
        }

        return [
            'conversionRate' => $this->getConversionRate($visitsData['byDate'], $ordersData['orders']),
            'conversionRateTotal' => $this->getConversionRateTotal($visitsData['total'], $ordersData['total']),
            'revenuesCustomers' => $this->revenuesKpi->getTotalCustomersRevenues(),
            'revenuesPaymentMethod' => $this->revenuesKpi->getTotalPaymentMethodsRevenues(),
        ];
    }

    /**
     * getConversionRate
     *
     * @param array $sessionsByDate
     * @param array $ordersByDate
     *
     * @return array
     */
    private function getConversionRate(array $sessionsByDate, array $ordersByDate)
    {
        $conversionList = [];

        foreach ($sessionsByDate as $session) {
            $conversion = 0;

            foreach ($ordersByDate as $order) {
                if ($session['date_analytics'] === $order['date']) {
                    $conversion += $this->numberHelper->division($order['orders'], $session['sessions_by_account']) * 100;
                } else {
                    $conversion += 0;
                }
            }

            $conversionList[$session['date_analytics']] = [
                'date' => $session['date_analytics'],
                'conversion' => $conversion,
            ];
        }

        return $conversionList;
    }

    /**
     * getConversionRateTotal
     *
     * @param array $sessionsTotal
     * @param int $ordersTotal
     *
     * @return array
     */
    private function getConversionRateTotal(array $sessionsTotal, $ordersTotal)
    {
        return [
            'sessions' => $this->numberHelper->division($ordersTotal, $sessionsTotal['session']) * 100,
            'sessionsUnique' => $this->numberHelper->division($ordersTotal, $sessionsTotal['uniqueUser']) * 100,
        ];
    }
}
