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

return [
    'Query' => [
        'sessions' => function ($root, $args, $context) {
            return $context['loaders']['sessions']->load($args);
        },
        'uniqueUsers' => function ($root, $args, $context) {
            return $context['loaders']['uniqueUsers']->load($args);
        },
        'avgSessions' => function ($root, $args, $context) {
            return $context['loaders']['avgSessions']->load($args);
        },
        'bounceRate' => function ($root, $args, $context) {
            return $context['loaders']['bounceRate']->load($args);
        },
        'sessionsGroupByDate' => function ($root, $args, $context) {
            return $context['loaders']['sessionsGroupByDate']->load($args);
        },
        'revenueGross' => function ($root, $args, $context) {
            return $context['loaders']['revenueGross']->load($args);
        },
        'revenueGrossGroupByDate' => function ($root, $args, $context) {
            return $context['loaders']['revenueGrossGroupByDate']->load($args);
        },
        'orderSum' => function ($root, $args, $context) {
            return $context['loaders']['orderSum']->load($args);
        },
        'orderAverage' => function ($root, $args, $context) {
            return $context['loaders']['orderAverage']->load($args);
        },
        'cartAbandonedAverage' => function ($root, $args, $context) {
            return $context['loaders']['cartAbandonedAverage']->load($args);
        },
        'conversionRate' => function ($root, $args, $context) {
            return $context['loaders']['conversionRate']->load($args);
        },
    ],
    'Mutation' => [
        'setProductTourFreeDone' => function ($root, $args, $context) {
            return $context['loaders']['setProductTourFreeDone']->load($args);
        },
        'setProductTourAdvancedDone' => function ($root, $args, $context) {
            return $context['loaders']['setProductTourAdvancedDone']->load($args);
        },
    ],
];
