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

use PrestaShop\Module\Ps_metrics\Api\AnalyticsApi;
use PrestaShop\Module\Ps_metrics\Cache\DataCache;
use PrestaShop\Module\Ps_metrics\Helper\DataHelper;
use PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration;
use PrestaShop\Module\Ps_metrics\Repository\ConfigurationRepository;

class VisitsKpi extends Kpi implements KpiStrategyInterface
{
    /**
     * @var DataHelper
     */
    private $dataHelper;

    /**
     * @var DataCache
     */
    private $dataCache;

    /**
     * @var ConfigurationRepository
     */
    private $configurationRepository;

    /**
     * @var AnalyticsApi
     */
    private $analyticsApi;

    /**
     * Visits kpi constructor.
     *
     * @param KpiConfiguration|null $configuration
     * @param DataHelper $dataHelper
     * @param DataCache $dataCache
     * @param ConfigurationRepository $configurationRepository
     * @param AnalyticsApi $analyticsApi
     */
    public function __construct(
        KpiConfiguration $configuration = null,
        DataHelper $dataHelper,
        DataCache $dataCache,
        ConfigurationRepository $configurationRepository,
        AnalyticsApi $analyticsApi
    ) {
        $this->dataHelper = $dataHelper;
        $this->dataCache = $dataCache;
        $this->configurationRepository = $configurationRepository;
        $this->analyticsApi = $analyticsApi;

        if ($configuration !== null) {
            $this->setConfiguration($configuration);
        }
    }

    /**
     * Return all visits data
     *
     * @return array
     */
    public function present()
    {
        return $this->getData();
    }

    /**
     * Return all visits data
     *
     * @return array
     */
    public function getTotal()
    {
        $total = $this->getData();

        return $total['visits'];
    }

    /**
     * Return all visits data
     *
     * @return array
     *
     * @todo Better way to user granularity['type'] for request
     */
    private function getData()
    {
        $gaIsOnboarded = (bool) $this->configurationRepository->getGoogleLinkedValue();

        if (!$gaIsOnboarded) {
            return [
                'visits' => $this->setEmptyVisitsData(),
            ];
        }

        $dataCacheName = 'visits' . implode($this->getConfiguration()->dateRange) . $this->getConfiguration()->granularity['type'];
        $visitsCache = $this->dataCache->get($dataCacheName);

        if (false !== $visitsCache) {
            return [
                'visits' => $visitsCache,
            ];
        }

        $reportings = $this->analyticsApi->getReportingByDate([
            'dateRange' => $this->getConfiguration()->dateRange,
            'granularity' => $this->getConfiguration()->granularity['type'],
        ]);

        if (false == $reportings) {
            return [
                'visits' => $this->setEmptyVisitsData(),
            ];
        }

        return [
            'visits' => $this->dataCache->set(
                $this->getReworkedGoogleVisitsArray($reportings),
                $dataCacheName
            ),
        ];
    }

    /**
     * Rework $googleVisits array to get 'byDate' with date key
     *
     * @param array $googleVisits
     *
     * @return array
     */
    private function getReworkedGoogleVisitsArray(array $googleVisits)
    {
        if (empty($googleVisits['body'])) {
            return $this->setEmptyVisitsData();
        }

        if ($this->getConfiguration()->granularity['type'] == 'hours') {
            $googleVisits['body']['byDate'] = $this->ConvertHoursFormat($googleVisits['body']['byDate']);
        }

        $googleVisits['body']['byDate'] = $this->dataHelper->modifyArrayMainKeys($googleVisits['body']['byDate'], 'date_analytics');

        return $googleVisits['body'];
    }

    /**
     * Convert hours returned by google to date : 01 -> YYYY-MM-DD HH:II:SS
     *
     * @param array $googleVisits
     *
     * @return array
     */
    private function ConvertHoursFormat(array $googleVisits)
    {
        $visits_ = [];
        foreach ($googleVisits as $visit) {
            $visit_ = $visit;
            $visit_['date_analytics'] = $visit['start_date'] . ' ' . (int) $visit['date_analytics'] . ':00:00';
            array_push($visits_, $visit_);
        }

        return $visits_;
    }

    /**
     * setEmptyVisitsData
     *
     * @return array
     */
    private function setEmptyVisitsData()
    {
        return [
            'byCategory' => [],
            'byDate' => [],
            'bySource' => [],
            'total' => [
                'session' => 0,
                'uniqueUser' => 0,
            ],
        ];
    }
}
