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

use PrestaShop\Module\Ps_metrics\Context\PrestaShopContext;
use PrestaShop\Module\Ps_metrics\Helper\ApiHelper;
use PrestaShop\Module\Ps_metrics\Helper\DbHelper;
use PrestaShop\Module\Ps_metrics\Helper\JsonHelper;
use PrestaShop\Module\Ps_metrics\Helper\NumberHelper;
use PrestaShop\Module\Ps_metrics\Helper\ShopHelper;

class DataLoadersFactory
{
    /**
     * @var ShopHelper
     */
    protected $shopHelper;

    /**
     * @var DbHelper
     */
    protected $dbHelper;

    /**
     * @var NumberHelper
     */
    protected $numberHelper;

    /**
     * @var PrestaShopContext
     */
    protected $prestaShopContext;

    /**
     * @var JsonHelper
     */
    protected $jsonHelper;

    /**
     * @var ApiHelper
     */
    protected $apiHelper;

    /**
     * DataLoadersFactory constructor.
     *
     * @return void
     */
    public function __construct()
    {
        /** @var \Ps_metrics $module */
        $module = \Module::getInstanceByName('ps_metrics');

        /** @var DbHelper $dbHelper */
        $dbHelper = $module->getService('ps_metrics.helper.db');
        $this->dbHelper = $dbHelper;

        /** @var ShopHelper $shopHelper */
        $shopHelper = $module->getService('ps_metrics.helper.shop');
        $this->shopHelper = $shopHelper;

        /** @var NumberHelper $numberHelper */
        $numberHelper = $module->getService('ps_metrics.helper.number');
        $this->numberHelper = $numberHelper;

        /** @var PrestaShopContext $prestaShopContext */
        $prestaShopContext = $module->getService('ps_metrics.context.prestashop');
        $this->prestaShopContext = $prestaShopContext;

        /** @var ApiHelper $apiHelper */
        $apiHelper = $module->getService('ps_metrics.helper.api');
        $this->apiHelper = $apiHelper;

        /** @var JsonHelper $jsonHelper */
        $jsonHelper = $module->getService('ps_metrics.helper.json');
        $this->jsonHelper = $jsonHelper;
    }

    /**
     * @param array $dateRange
     *
     * @return array
     */
    protected function switchDateRange($dateRange)
    {
        return $this->apiHelper->getLastedPeriodRange($dateRange);
    }

    /**
     * merge data ordered by period to one array with twos datas
     *
     * @param string $key
     * @param array $current
     * @param array $previous
     *
     * @return array
     */
    protected function mergeDatasByKey($key, $current, $previous)
    {
        $output = [];
        //build all categories list
        foreach ($current as $category) {
            $output[$category[$key]] = [
                $key => $category[$key],
                'currentValue' => $category['currentValue'],
                'previousValue' => 0,
            ];
        }

        foreach ($previous as $category) {
            if (!array_key_exists($category[$key], $output)) {
                $output[$category[$key]] = [
                    $key => $category[$key],
                    'currentValue' => 0,
                    'previousValue' => $category['currentValue'],
                ];
            } else {
                $output[$category[$key]]['previousValue'] = $category['currentValue'];
            }
        }

        return array_values($output);
    }
}
