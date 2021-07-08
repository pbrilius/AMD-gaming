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

use PrestaShop\Module\Ps_metrics\Data\TipsCardsData;

class TipsCardsDataLoaders extends DataLoadersFactory
{
    /**
     * @param array $args
     *
     * @return array|false|string
     */
    public function get($args)
    {
        /** @var \Ps_metrics $module */
        $module = \Module::getInstanceByName('ps_metrics');

        /** @var TipsCardsData $tipsCardsData */
        $tipsCardsData = $module->getService('ps_metrics.data.tipscards');

        // TODO Later : $args[0]['Label'] to specify label
        return $tipsCardsData->getAll();
    }
}
