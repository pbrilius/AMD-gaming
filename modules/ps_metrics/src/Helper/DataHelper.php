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

class DataHelper
{
    /**
     * Return an array with the date for array key
     * Return initial array if $value['date'] doesn't exist
     *
     * @param array $array
     * @param string $fromKey (example : 'date')
     *
     * @return array
     */
    public function modifyArrayMainKeys(array $array, $fromKey)
    {
        if (empty($array)) {
            return $array;
        }

        $newArray = [];

        foreach ($array as $key => $value) {
            if (empty($value[$fromKey])) {
                return $array;
            }

            $newArray[$value[$fromKey]] = $array[$key];
        }

        return $newArray;
    }

    /**
     * transformToGranularityWeeks
     *
     * @param array $array
     * @param array $fromKeys (example : ['revenues', 'shipping'])
     *
     * @todo : refacto this - do sum in front ?!
     *
     * @return array
     */
    public function transformToGranularityWeeks(array $array, array $fromKeys)
    {
        if (empty($array)) {
            return $array;
        }

        $allDataByWeek = [];

        /* Reorder array by weeks */
        foreach ($array as $values) {
            $weekNumber = (new \DateTime($values['date']))->format('Y-W');
            $allDataByWeek[$weekNumber][] = $values;
        }

        $finalArrayRevenueByWeek = [];

        /* Sum all data in a week */
        foreach ($allDataByWeek as $keyWeek => $weekValues) {
            $finalValue = [];
            foreach ($weekValues as $valueKey) {
                foreach ($fromKeys as $fromKey) {
                    if (!array_key_exists($fromKey, $finalValue)) {
                        $finalValue[$fromKey] = 0;
                    }
                    $finalValue[$fromKey] += $valueKey[$fromKey];
                }
            }
            $finalArrayRevenueByWeek[$keyWeek] = ['date' => $keyWeek];
            foreach ($fromKeys as $fromKey) {
                $finalArrayRevenueByWeek[$keyWeek][$fromKey] = $finalValue[$fromKey];
            }
        }

        return $finalArrayRevenueByWeek;
    }

    /**
     * transformToGranularityWeeks
     *
     * @param array $array
     * @param array $fromKeys (example : ['revenues', 'shipping'])
     *
     * @todo : refacto this
     *
     * @return array
     */
    public function transformToGranularityHours(array $array, array $fromKeys)
    {
        if (empty($array)) {
            return $array;
        }

        $allDataByHours = [];

        /* Reorder array with only key hours */
        foreach ($array as $values) {
            $hour = $values['date'] . ':00:00';
            $allDataByHours[$hour] = $values;
        }

        $finalArrayRevenueByHour = [];

        /* Sum all data in a week */
        foreach ($allDataByHours as $keyHour => $hourValues) {
            $finalArrayRevenueByHour[$keyHour] = ['date' => $keyHour];
            foreach ($fromKeys as $fromKey) {
                $finalArrayRevenueByHour[$keyHour][$fromKey] = $hourValues[$fromKey];
            }
        }

        return $finalArrayRevenueByHour;
    }

    /**
     * Subtract data recursively.
     * For example: total paid - refunds
     *
     * @param array $array
     * @param string $toKey
     * @param string $fromKey
     *
     * @return array
     */
    public function subtractDataRecursively(array $array, $toKey, $fromKey)
    {
        if (empty($array)) {
            return $array;
        }

        foreach ($array as $key => $value) {
            $array[$key][$toKey] = $value[$toKey];
            unset($array[$key][$fromKey]);
        }

        return $array;
    }

    /**
     * Sort a Multidimensional array by a specific key
     *
     * @param array $array
     * @param string $sortBy
     *
     * @return array
     */
    public function arrayMultiSort(array $array, $sortBy)
    {
        if (empty($array)) {
            return $array;
        }

        $keys = array_column($array, $sortBy);
        array_multisort($keys, SORT_DESC, $array);

        return $array;
    }

    /**
     * Build list of elements based on array key
     *
     * @param string $key
     * @param array $array
     *
     * @return array
     */
    public function BuildKeyListFromArray($key, array $array)
    {
        return array_map(function ($item) use ($key) {
            return $item[$key];
        }, $array);
    }
}
