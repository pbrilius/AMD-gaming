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

namespace PrestaShop\Module\Ps_metrics\Cache;

use PrestaShop\Module\Ps_metrics\Environment\CacheEnv;
use PrestaShop\Module\Ps_metrics\Helper\JsonHelper;
use PrestaShop\Module\Ps_metrics\Helper\LoggerHelper;

class DataCache
{
    const CACHE_TIME = 3600;

    /**
     * @var JsonHelper
     */
    private $jsonHelper;

    /**
     * @var array|string
     */
    private $param;

    /**
     * @var DirectoryCache
     */
    private $directoryCache;

    /**
     * @var CacheEnv
     */
    private $cacheEnv;

    /**
     * @var LoggerHelper
     */
    private $loggerHelper;

    /**
     * __construct
     *
     * @param DirectoryCache $directoryCache
     * @param CacheEnv $cacheEnv
     * @param JsonHelper $jsonHelper
     * @param LoggerHelper $loggerHelper
     */
    public function __construct(
        DirectoryCache $directoryCache,
        CacheEnv $cacheEnv,
        JsonHelper $jsonHelper,
        LoggerHelper $loggerHelper
    ) {
        $this->jsonHelper = $jsonHelper;
        $this->directoryCache = $directoryCache;
        $this->cacheEnv = $cacheEnv;
        $this->loggerHelper = $loggerHelper;
    }

    /**
     * Get cache if exists
     *
     * @param array|string $param
     *
     * @return mixed
     */
    public function get($param)
    {
        // If cache disabled, return false directly
        if (false === $this->cacheEnv->getCacheEnv()) {
            return false;
        }

        if (false === $this->directoryCache->isReadable()) {
            $this->loggerHelper->addLog('[PS_METRICS] Cache folder is not readable', 3);

            return false;
        }

        $this->setParam($param);
        $cacheFileName = $this->directoryCache->getPath() . $this->getCacheFileName();

        if ($this->cacheExists($cacheFileName)) {
            return $this->jsonHelper->jsonDecode(
                file_get_contents($cacheFileName),
                true
            );
        }

        return false;
    }

    /**
     * Set cache
     *
     * @param mixed $data
     * @param string $cacheName
     *
     * @return mixed
     */
    public function set($data, $cacheName = null)
    {
        // If cache disabled, return $data directly
        if (false === $this->cacheEnv->getCacheEnv()) {
            return $data;
        }

        if (false === $this->directoryCache->isWritable()) {
            $this->loggerHelper->addLog('[PS_METRICS] Cache folder is not writable', 3);

            return $data;
        }

        if (null === $cacheName) {
            $this->setParam($data);
        } else {
            $this->setParam($cacheName);
        }

        $cacheFileName = $this->directoryCache->getPath() . $this->getCacheFileName();
        $jsonData = $this->jsonHelper->jsonEncode($data);

        if (false === @file_put_contents($cacheFileName, $jsonData)) {
            $this->loggerHelper->addLog('[PS_METRICS] Unable to create data cache', 3);
        }

        return $data;
    }

    /**
     * Cache File name
     *
     * @return string
     */
    private function getCacheFileName()
    {
        return md5($this->getParam()) . '.ps_metrics.cache';
    }

    /**
     * Check if cache exist and if last time modified < 1hour
     *
     * @param string $cacheFile
     *
     * @return bool
     */
    private function cacheExists($cacheFile)
    {
        if (!file_exists($cacheFile)) {
            return false;
        }

        if (filemtime($cacheFile) < (time() - self::CACHE_TIME)) {
            return false;
        }

        return true;
    }

    /**
     * setParam
     *
     * @param array|string $param
     *
     * @return void
     */
    private function setParam($param)
    {
        $this->param = $param;
    }

    /**
     * Return a string by transforming param to json if is array
     *
     * @return string
     */
    private function getParam()
    {
        if (is_array($this->param)) {
            return $this->jsonHelper->jsonEncode($this->param);
        }

        return $this->param;
    }

    /**
     * Delete all metrics cache
     *
     * @return bool
     */
    public function deleteAllCache()
    {
        if (false === $this->directoryCache->isWritable()) {
            $this->loggerHelper->addLog('[PS_METRICS] Not able to delete the cache. Cache folder is not writable', 3);

            return false;
        }

        $files = glob($this->directoryCache->getPath() . '*.ps_metrics.cache');

        foreach ($files as $file) {
            if (file_exists($file)) {
                unlink($file);
            }
        }

        return true;
    }
}
