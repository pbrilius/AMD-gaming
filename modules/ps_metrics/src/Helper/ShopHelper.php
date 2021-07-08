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

namespace PrestaShop\Module\Ps_metrics\Helper;

use Shop;

class ShopHelper
{
    /**
     * @param int $shopId
     *
     * @return array
     */
    public function getShop($shopId)
    {
        return Shop::getShop($shopId);
    }

    /**
     * @param bool $active
     * @param int|null $id_shop_group
     * @param false $get_as_list_id
     *
     * @return array
     */
    public function getShops($active = true, $id_shop_group = null, $get_as_list_id = false)
    {
        return Shop::getShops($active = true, $id_shop_group = null, $get_as_list_id = false);
    }

    /**
     * @return int|null
     */
    public function getContextShopGroupID()
    {
        return Shop::getContextShopGroupID();
    }

    /**
     * @return int
     */
    public function getContext()
    {
        return Shop::getContext();
    }

    /**
     * @param false $share
     * @param string|null $alias
     *
     * @return string
     */
    public function addSqlRestriction($share = false, $alias = null)
    {
        return Shop::addSqlRestriction($share, $alias);
    }

    /**
     * @return int
     */
    public function getShopId()
    {
        return Shop::getContextShopID();
    }
}
