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

namespace PrestaShop\Module\Ps_metrics\Provider;

use PrestaShop\Module\Ps_metrics\Api\HttpApi;

class GoogleTagProvider
{
    /**
     * @var string|null
     */
    private $shopSource;

    /**
     * @var HttpApi
     */
    private $httpApi;

    /**
     * __construct
     *
     * @param HttpApi $httpApi
     */
    public function __construct(HttpApi $httpApi)
    {
        $this->httpApi = $httpApi;
    }

    /**
     * Set base url
     *
     * @param string $baseUrl
     *
     * @return void
     */
    public function setBaseUrl($baseUrl)
    {
        $this->shopSource = $this->httpApi->getSourcePage($baseUrl);
    }

    /**
     * Find by Regex if a Google Tag Analytics (UA-XXXXXXXXX-X) exists in source aimed page
     *
     * @return array
     */
    public function findGoogleTagsAnalytics()
    {
        if (empty($this->shopSource)) {
            return [];
        }

        preg_match_all(
            '/UA-\d{6,}-\d/m',
            $this->shopSource,
            $matches
        );

        return $matches[0];
    }

    /**
     * Find by Regex if a Google Tag Manager (GTM-XXXXXXX) exists in source aimed page
     *
     * @return array
     */
    public function findGoogleTagsManager()
    {
        if (empty($this->shopSource)) {
            return [];
        }

        preg_match_all(
            '/GTM-\w{6,}/m',
            $this->shopSource,
            $matches
        );

        return $matches[0];
    }
}
