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

class CartAbandonedAverageDataLoaders extends DataLoadersFactory
{
    /**
     * @param array $args
     *
     * @return array
     */
    public function get($args)
    {
        $current = $this->getDatas($args[0]['InputData']['TimeDimension']['dateRange']);
        $previous = 0;
        if (true === $args[0]['InputData']['compareMode']) {
            $previous = $this->getDatas($this->switchDateRange($args[0]['InputData']['TimeDimension']['dateRange']));
        }

        return [
            'currentValue' => $current,
            'previousValue' => $previous,
        ];
    }

    /**
     * @param array $dateRange
     *
     * @return float
     */
    private function getDatas($dateRange)
    {
        $row = $this->dbHelper->getRow(
            'SELECT COUNT(all_cart.id_cart) AS all_cart, COUNT(abandon_cart.id_cart) AS ordered
            FROM `' . _DB_PREFIX_ . 'cart` all_cart
            LEFT JOIN `' . _DB_PREFIX_ . 'orders` o ON (all_cart.id_cart = o.id_cart AND all_cart.id_shop = o.id_shop)
            LEFT JOIN `' . _DB_PREFIX_ . 'cart` abandon_cart ON (
            all_cart.id_cart = abandon_cart.id_cart
            AND abandon_cart.date_upd >= DATE_ADD("' . pSQL($dateRange['startDate']) . '", INTERVAL 1 HOUR)
                AND abandon_cart.date_upd <= DATE_ADD("' . pSQL($dateRange['endDate']) . '", INTERVAL 1 HOUR)
                AND abandon_cart.id_cart = o.id_cart
        AND abandon_cart.id_shop = ' . $this->shopHelper->getShopId() . '
            )
            WHERE all_cart.date_upd >= DATE_ADD("' . pSQL($dateRange['startDate']) . '", INTERVAL 1 HOUR)
                AND all_cart.date_upd <= DATE_ADD("' . pSQL($dateRange['endDate']) . '", INTERVAL 1 HOUR)
                AND all_cart.id_shop = ' . $this->shopHelper->getShopId());

        $value = 0;
        if (!empty($row)) {
            $value = $this->numberHelper->percent($row['all_cart'], $row['ordered']);
        }

        return $value;
    }
}
