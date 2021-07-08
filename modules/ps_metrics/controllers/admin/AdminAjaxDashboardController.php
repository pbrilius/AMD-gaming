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

use PrestaShop\Module\Ps_metrics\Data\TipsCardsData;
use PrestaShop\Module\Ps_metrics\Helper\JsonHelper;
use PrestaShop\Module\Ps_metrics\Helper\ToolsHelper;
use PrestaShop\Module\Ps_metrics\Kpi\ConversionKpi;
use PrestaShop\Module\Ps_metrics\Kpi\KpiManager;
use PrestaShop\Module\Ps_metrics\Kpi\KpiStrategyInterface;
use PrestaShop\Module\Ps_metrics\Kpi\OrdersKpi;
use PrestaShop\Module\Ps_metrics\Kpi\RevenuesKpi;
use PrestaShop\Module\Ps_metrics\Kpi\TotalKpi;
use PrestaShop\Module\Ps_metrics\Kpi\VisitsKpi;
use PrestaShop\Module\Ps_metrics\Module\DashboardModules;
use PrestaShop\Module\Ps_metrics\Validation\RetrieveData;

class AdminAjaxDashboardController extends ModuleAdminController
{
    const DEFAULT_DATA_TYPE = '';
    const DEFAULT_DATE_RANGE = '{startDate: "", endDate: ""}';
    const DEFAULT_GRANULARITY = 'days';

    /**
     * @var Ps_metrics
     */
    public $module;

    /**
     * Load JsonHelper to avoid jsonEncode issues on AjaxDie
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * ajaxProcessGetExistingGoogleTags
     *
     * @return void
     */
    public function ajaxProcessRetrieveData()
    {
        /** @var ToolsHelper $toolsHelper */
        $toolsHelper = $this->module->getService('ps_metrics.helper.tools');

        /** @var JsonHelper $jsonHelper */
        $jsonHelper = $this->module->getService('ps_metrics.helper.json');

        /** @var KpiManager $kpiManager */
        $kpiManager = $this->module->getService('ps_metrics.kpi.manager');

        $dataType = $toolsHelper->getValue('type', self::DEFAULT_DATA_TYPE);
        $kpi = $toolsHelper->getValue('type', self::DEFAULT_DATA_TYPE);
        $dateRange = $jsonHelper->jsonDecode(
            $toolsHelper->getValue('dateRange', self::DEFAULT_DATE_RANGE)
        );
        $granularity = $toolsHelper->getValue('granularity', self::DEFAULT_GRANULARITY);

        $this->verifyRetrievedData($dataType, $dateRange, $granularity);

        $kpiManager->setKpi($this->dictionaryKpi($kpi));
        $kpiManager->getConfiguration()->setDateRange($dateRange);
        $kpiManager->getConfiguration()->setGranularity($granularity);
        $data = $kpiManager->present();

        $this->ajaxDie($jsonHelper->jsonEncode($data));
    }

    /**
     * Instantiate the correct KPI
     *
     * @param string $kpi
     *
     * @return KpiStrategyInterface
     */
    private function dictionaryKpi($kpi)
    {
        $dictionary = [
            'total' => function () {
                /** @var TotalKpi $totalKpi */
                $totalKpi = $this->module->getService('ps_metrics.kpi.total');

                return $totalKpi;
            },
            'revenues' => function () {
                /** @var RevenuesKpi $revenuesKpi */
                $revenuesKpi = $this->module->getService('ps_metrics.kpi.revenues');

                return $revenuesKpi;
            },
            'orders' => function () {
                /** @var OrdersKpi $ordersKpi */
                $ordersKpi = $this->module->getService('ps_metrics.kpi.orders');

                return $ordersKpi;
            },
            'visits' => function () {
                /** @var VisitsKpi $visitsKpi */
                $visitsKpi = $this->module->getService('ps_metrics.kpi.visits');

                return $visitsKpi;
            },
            'conversion' => function () {
                /** @var ConversionKpi $conversionKpi */
                $conversionKpi = $this->module->getService('ps_metrics.kpi.conversion');

                return $conversionKpi;
            },
        ];

        return call_user_func($dictionary[$kpi]);
    }

    /**
     * ajaxProcessRetrieveTipsCards
     *
     * @return void
     */
    public function ajaxProcessRetrieveTipsCards()
    {
        /** @var JsonHelper $jsonHelper */
        $jsonHelper = $this->module->getService('ps_metrics.helper.json');

        /** @var TipsCardsData $tipsCardsData */
        $tipsCardsData = $this->module->getService('ps_metrics.data.tipscards');
        $this->ajaxDie($jsonHelper->jsonEncode([
            'tipsCards' => $tipsCardsData->getAll(),
        ]));
    }

    /**
     * Toggle dashboard modules
     *
     * @return void
     */
    public function ajaxProcessToggleDashboardModules()
    {
        /** @var DashboardModules $dashboardModule */
        $dashboardModule = $this->module->getService('ps_metrics.module.dashboard.modules');

        if ($dashboardModule->modulesIsEnabled()) {
            $dashboardModule->disableModules();
        } else {
            $dashboardModule->enableModules();
        }

        /** @var JsonHelper $jsonHelper */
        $jsonHelper = $this->module->getService('ps_metrics.helper.json');

        $this->ajaxDie($jsonHelper->jsonEncode([
            'success' => true,
        ]));
    }

    /**
     * Use AjaxDie if there's an error on ajaxProcessRetrieveData
     *
     * @param string $dataType
     * @param array $dateRange
     * @param string $granularity
     *
     * @return void
     */
    private function verifyRetrievedData($dataType, array $dateRange, $granularity)
    {
        /** @var RetrieveData $serviceRetrieveData */
        $serviceRetrieveData = $this->module->getService('ps_metrics.validation.retrievedata');

        /** @var JsonHelper $jsonHelper */
        $jsonHelper = $this->module->getService('ps_metrics.helper.json');

        $dataTypeError = $serviceRetrieveData->dataType($dataType);
        $dateRangeError = $serviceRetrieveData->dateRange($dateRange);
        $granularityError = $serviceRetrieveData->granularity($granularity);

        if (false === $dataTypeError || false === $dateRangeError || false === $granularityError) {
            $this->ajaxDie($jsonHelper->jsonEncode([
                'dataTypeError' => $dataTypeError,
                'dateRangeError' => $dateRangeError,
                'granularityError' => $granularityError,
            ]));
        }
    }
}
