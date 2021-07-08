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

namespace PrestaShop\Module\Ps_metrics\Tracker;

use PrestaShop\Module\Ps_metrics\Context\PrestaShopContext;
use PrestaShop\Module\Ps_metrics\Environment\SegmentEnv;
use PrestaShop\Module\Ps_metrics\Helper\SegmentHelper;
use PrestaShop\Module\Ps_metrics\Helper\ShopHelper;

class Segment implements TrackerInterface
{
    /**
     * @var string
     */
    private $message = '';

    /**
     * @var array
     */
    private $options = [];

    /**
     * @var SegmentEnv
     */
    private $segmentEnv;

    /**
     * @var SegmentHelper
     */
    private $segmentHelper;

    /**
     * @var PrestaShopContext
     */
    private $prestaShopContext;

    /**
     * @var ShopHelper
     */
    private $shopHelper;

    /**
     * Segment constructor.
     *
     * @param SegmentEnv $segmentEnv
     * @param SegmentHelper $segmentHelper
     * @param PrestaShopContext $prestaShopContext
     * @param ShopHelper $shopHelper
     */
    public function __construct(
        SegmentEnv $segmentEnv,
        SegmentHelper $segmentHelper,
        PrestaShopContext $prestaShopContext,
        ShopHelper $shopHelper
    ) {
        $this->segmentEnv = $segmentEnv;
        $this->segmentHelper = $segmentHelper;
        $this->prestaShopContext = $prestaShopContext;
        $this->shopHelper = $shopHelper;
        $this->init();
    }

    /**
     * Init segment client with the api key
     *
     * @return void
     */
    private function init()
    {
        $this->segmentHelper->init();
    }

    /**
     * Track event on segment
     *
     * @return bool
     *
     * @throws \PrestaShopException
     */
    public function track()
    {
        if (empty($this->message)) {
            throw new \PrestaShopException('Message cannot be empty. Need to set it with setMessage() method.');
        }

        // Dispatch track depending on context shop
        $this->dispatchTrack();

        return true;
    }

    /**
     * Add track
     *
     * @param int $userId
     *
     * @return void
     */
    private function segmentTrack($userId)
    {
        $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $this->segmentHelper->track([
            'userId' => $userId,
            'event' => $this->message,
            'channel' => 'browser',
            'context' => [
                'ip' => $ip,
                'userAgent' => $userAgent,
                'locale' => \Context::getContext()->language->iso_code,
                'page' => [
                    'referrer' => $referer,
                    'url' => $url,
                ],
            ],
            'properties' => array_merge([
                'module' => 'ps_metrics',
            ], $this->options),
        ]);

        $this->segmentHelper->flush();
    }

    /**
     * Handle tracking differently depending on the shop context
     *
     * @return mixed
     *
     * @todo how to refacto dictionnary with helper ?
     */
    private function dispatchTrack()
    {
        $dictionary = [
            \Shop::CONTEXT_SHOP => function () {
                $this->trackShop();
            },
            \Shop::CONTEXT_GROUP => function () {
                $this->trackShopGroup();
            },
            \Shop::CONTEXT_ALL => function () {
                $this->trackAllShops();
            },
        ];

        return call_user_func($dictionary[$this->shopHelper->getContext()]);
    }

    /**
     * Send track segment only for the current shop
     *
     * @return void
     */
    private function trackShop()
    {
        $userId = $this->prestaShopContext->getShopDomain();
        $this->segmentTrack($userId);
    }

    /**
     * Send track segment for each shop in the current shop group
     *
     * @return void
     */
    private function trackShopGroup()
    {
        $shops = $this->shopHelper->getShops(true, $this->shopHelper->getContextShopGroupID());
        foreach ($shops as $shop) {
            $this->segmentTrack($shop['domain']);
        }
    }

    /**
     * Send track segment for all shops
     *
     * @return void
     */
    private function trackAllShops()
    {
        $shops = $this->shopHelper->getShops();
        foreach ($shops as $shop) {
            $this->segmentTrack($shop['domain']);
        }
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     *
     * @return void
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }
}
