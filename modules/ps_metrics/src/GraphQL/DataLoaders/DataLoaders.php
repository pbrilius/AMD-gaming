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

use Overblog\DataLoader\DataLoader;
use Overblog\PromiseAdapter\Adapter\WebonyxGraphQLSyncPromiseAdapter;
use PrestaShop\Module\Ps_metrics\Cache\DataCache;
use PrestaShop\Module\Ps_metrics\Helper\JsonHelper;

class DataLoaders
{
    /**
     * @var DataCache
     */
    private $dataCache;

    /**
     * @var JsonHelper
     */
    private $jsonHelper;

    public function __construct(DataCache $dataCache, JsonHelper $jsonHelper)
    {
        $this->dataCache = $dataCache;
        $this->jsonHelper = $jsonHelper;
    }

    /**
     * @param WebonyxGraphQLSyncPromiseAdapter $promiseAdapter
     *
     * @return DataLoader[]
     */
    public function build($promiseAdapter)
    {
        /** @var \Ps_metrics $module */
        $module = \Module::getInstanceByName('ps_metrics');

        return [
            'sessions' => new DataLoader(function ($args) use ($promiseAdapter, $module) {
                $cache_name = $this->getCacheName('sessions', $args);
                $output = $this->dataCache->get($cache_name);
                if (!$output) {
                    /** @var SessionsDataLoaders $dataLoaders */
                    $dataLoaders = $module->getService('ps_metrics.graphql.dataloaders.sessions');
                    $output = $dataLoaders->get($args);
                    $this->dataCache->set($output, $cache_name);
                }

                return $promiseAdapter->createAll([$output]);
            }, $promiseAdapter),
            'uniqueUsers' => new DataLoader(function ($args) use ($promiseAdapter, $module) {
                $cache_name = $this->getCacheName('uniqueUsers', $args);
                $output = $this->dataCache->get($cache_name);
                if (!$output) {
                    /** @var AvgSessionsDataLoaders $dataLoaders */
                    $dataLoaders = $module->getService('ps_metrics.graphql.dataloaders.uniqueusers');
                    $output = $dataLoaders->get($args);
                    $this->dataCache->set($output, $cache_name);
                }

                return $promiseAdapter->createAll([$output]);
            }, $promiseAdapter),
            'avgSessions' => new DataLoader(function ($args) use ($promiseAdapter, $module) {
                $cache_name = $this->getCacheName('avgSessions', $args);
                $output = $this->dataCache->get($cache_name);
                if (!$output) {
                    /** @var AvgSessionsDataLoaders $dataLoaders */
                    $dataLoaders = $module->getService('ps_metrics.graphql.dataloaders.avgsessions');
                    $output = $dataLoaders->get($args);
                    $this->dataCache->set($output, $cache_name);
                }

                return $promiseAdapter->createAll([$output]);
            }, $promiseAdapter),
            'bounceRate' => new DataLoader(function ($args) use ($promiseAdapter, $module) {
                $cache_name = $this->getCacheName('bounceRate', $args);
                $output = $this->dataCache->get($cache_name);
                if (!$output) {
                    /** @var BounceRateDataLoaders $dataLoaders */
                    $dataLoaders = $module->getService('ps_metrics.graphql.dataloaders.bouncerate');
                    $output = $dataLoaders->get($args);
                    $this->dataCache->set($output, $cache_name);
                }

                return $promiseAdapter->createAll([$output]);
            }, $promiseAdapter),
            'sessionsGroupByDate' => new DataLoader(function ($args) use ($promiseAdapter, $module) {
                $cache_name = $this->getCacheName('sessionsGroupByDate', $args);
                $output = $this->dataCache->get($cache_name);
                if (!$output) {
                    if (!empty($args[0]) && !empty($args[0]['Granularity']) && $args[0]['Granularity'] === 'hour') {
                        /** @var SessionsGroupByDateDataLoaders $dataLoaders */
                        $dataLoaders = $module->getService('ps_metrics.graphql.dataloaders.sessionsgroupbyhour');
                    } else {
                        /** @var SessionsGroupByDateDataLoaders $dataLoaders */
                        $dataLoaders = $module->getService('ps_metrics.graphql.dataloaders.sessionsgroupbydate');
                    }
                    $output = $dataLoaders->get($args);
                    $this->dataCache->set($output, $cache_name);
                }

                return $promiseAdapter->createAll([$output]);
            }, $promiseAdapter),
            'revenueGross' => new DataLoader(function ($args) use ($promiseAdapter, $module) {
                $cache_name = $this->getCacheName('revenueGross', $args);
                $output = $this->dataCache->get($cache_name);
                if (!$output) {
                    /** @var RevenueGrossDataLoaders $dataLoaders */
                    $dataLoaders = $module->getService('ps_metrics.graphql.dataloaders.revenuegross');
                    $output = $dataLoaders->get($args);
                    $this->dataCache->set($output, $cache_name);
                }

                return $promiseAdapter->createAll([$output]);
            }, $promiseAdapter),

            'revenueGrossGroupByDate' => new DataLoader(function ($args) use ($promiseAdapter, $module) {
                $cache_name = $this->getCacheName('revenueGrossGroupByDate', $args);
                $output = $this->dataCache->get($cache_name);
                if (!$output) {
                    /** @var RevenueGrossGroupByDateDataLoaders $dataLoaders */
                    $dataLoaders = $module->getService('ps_metrics.graphql.dataloaders.revenuegrossgroupbydate');
                    $output = $dataLoaders->get($args);
                    $this->dataCache->set($output, $cache_name);
                }

                return $promiseAdapter->createAll([$output]);
            }, $promiseAdapter),
            'orderSum' => new DataLoader(function ($args) use ($promiseAdapter, $module) {
                $cache_name = $this->getCacheName('orderSum', $args);
                $output = $this->dataCache->get($cache_name);
                if (!$output) {
                    /** @var OrderSumDataLoaders $dataLoaders */
                    $dataLoaders = $module->getService('ps_metrics.graphql.dataloaders.ordersum');
                    $output = $dataLoaders->get($args);
                    $this->dataCache->set($output, $cache_name);
                }

                return $promiseAdapter->createAll([$output]);
            }, $promiseAdapter),
            'orderAverage' => new DataLoader(function ($args) use ($promiseAdapter, $module) {
                $cache_name = $this->getCacheName('orderAverage', $args);
                $output = $this->dataCache->get($cache_name);
                if (!$output) {
                    /** @var OrderAverageDataLoaders $dataLoaders */
                    $dataLoaders = $module->getService('ps_metrics.graphql.dataloaders.orderaverage');
                    $output = $dataLoaders->get($args);
                    $this->dataCache->set($output, $cache_name);
                }

                return $promiseAdapter->createAll([$output]);
            }, $promiseAdapter),
            'cartAbandonedAverage' => new DataLoader(function ($args) use ($promiseAdapter, $module) {
                $cache_name = $this->getCacheName('cartAbandonedAverage', $args);
                $output = $this->dataCache->get($cache_name);
                if (!$output) {
                    /** @var CartAbandonedAverageDataLoaders $dataLoaders */
                    $dataLoaders = $module->getService('ps_metrics.graphql.dataloaders.cartabandonedaverage');
                    $output = $dataLoaders->get($args);
                    $this->dataCache->set($output, $cache_name);
                }

                return $promiseAdapter->createAll([$output]);
            }, $promiseAdapter),
            'conversionRate' => new DataLoader(function ($args) use ($promiseAdapter, $module) {
                $cache_name = $this->getCacheName('conversionRate', $args);
                $output = $this->dataCache->get($cache_name);
                if (!$output) {
                    /** @var ConversionRateDataLoaders $dataLoaders */
                    $dataLoaders = $module->getService('ps_metrics.graphql.dataloaders.conversionrate');
                    $output = $dataLoaders->get($args);
                    $this->dataCache->set($output, $cache_name);
                }

                return $promiseAdapter->createAll([$output]);
            }, $promiseAdapter),
            'setProductTourFreeDone' => new DataLoader(function ($args) use ($promiseAdapter, $module) {
                /** @var SetProductTourFreeDoneDataLoaders $dataLoaders */
                $dataLoaders = $module->getService('ps_metrics.graphql.dataloaders.setProductTourFreeDone');
                $output = $dataLoaders->get($args);

                return $promiseAdapter->createAll([$output]);
            }, $promiseAdapter),
            'setProductTourAdvancedDone' => new DataLoader(function ($args) use ($promiseAdapter, $module) {
                /** @var SetProductTourAdvancedDoneDataLoaders $dataLoaders */
                $dataLoaders = $module->getService('ps_metrics.graphql.dataloaders.setProductTourAdvancedDone');
                $output = $dataLoaders->get($args);

                return $promiseAdapter->createAll([$output]);
            }, $promiseAdapter),
        ];
    }

    /**
     * @param string $type
     * @param array $args
     *
     * @return string
     */
    private function getCacheName($type, $args)
    {
        return $type . '_' . date('Ymd_') . md5($this->jsonHelper->jsonEncode($args));
    }
}
