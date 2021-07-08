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

use PrestaShop\Module\Ps_metrics\Helper\ShopHelper;
use PrestaShop\Module\Ps_metrics\Helper\ToolsHelper;
use Shop;

class ShopsProvider
{
    /**
     * @var ToolsHelper
     */
    private $toolsHelper;

    /**
     * @var ShopHelper
     */
    private $shopHelper;

    /**
     * ShopsProvider constructor.
     *
     * @param ToolsHelper $toolsHelper
     * @param ShopHelper $shopHelper
     *
     * @return void
     */
    public function __construct(ToolsHelper $toolsHelper, ShopHelper $shopHelper)
    {
        $this->toolsHelper = $toolsHelper;
        $this->shopHelper = $shopHelper;
    }

    /**
     * Get one Shop Url
     *
     * @param int $shopId
     *
     * @return array
     */
    public function getShopUrl($shopId)
    {
        $shop = $this->shopHelper->getShop($shopId);
        $protocol = $this->getShopsProtocolInformations();

        return [
            'id_shop' => $shop['id_shop'],
            'domain' => $shop[$protocol['domain_type']],
            'url' => $protocol['protocol'] . $shop[$protocol['domain_type']] . $shop['uri'],
        ];
    }

    /**
     * Get all shops Urls
     *
     * @return array
     */
    public function getShopsUrl()
    {
        $shopList = $this->shopHelper->getShops();
        $protocol = $this->getShopsProtocolInformations();
        $urlList = [];

        foreach ($shopList as $shop) {
            $urlList[] = [
                'id_shop' => $shop['id_shop'],
                'url' => $protocol['protocol'] . $shop[$protocol['domain_type']] . $shop['uri'],
            ];
        }

        return $urlList;
    }

    /**
     * getShopsProtocol
     *
     * @return array
     */
    protected function getShopsProtocolInformations()
    {
        if (true === $this->toolsHelper->usingSecureMode()) {
            return [
                'domain_type' => 'domain_ssl',
                'protocol' => 'https://',
            ];
        }

        return [
            'domain_type' => 'domain',
            'protocol' => 'http://',
        ];
    }
}
