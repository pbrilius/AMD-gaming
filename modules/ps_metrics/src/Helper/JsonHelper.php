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

class JsonHelper
{
    /**
     * @var LoggerHelper
     */
    private $loggerHelper;

    /**
     * JsonHelper constructor.
     *
     * @param LoggerHelper $loggerHelper
     */
    public function __construct(LoggerHelper $loggerHelper)
    {
        $this->loggerHelper = $loggerHelper;
    }

    /**
     * Encode the data to json and check and force the return to empty string if false
     *
     * @param mixed $data
     *
     * @return string
     */
    public function jsonEncode($data)
    {
        $json = json_encode($data);
        if (empty($data)) {
            $json = json_encode($data, JSON_FORCE_OBJECT);
        }

        if (false !== $json) {
            return $json;
        }

        $this->loggerHelper->addLog('[PS_METRICS] Unable to encode Json', 3);

        return '';
    }

    /**
     * Check if the json is valid and returns an empty data if not
     *
     * @param mixed $json
     * @param bool $assoc
     *
     * @return array $data
     */
    public function jsonDecode($json, $assoc = true)
    {
        $data = json_decode($json, $assoc);

        if (JSON_ERROR_NONE === json_last_error()) {
            return $data;
        }

        $this->loggerHelper->addLog('[PS_METRICS] Unable to decode Json', 3);

        return [];
    }

    /**
     * Check if string is JSON
     *
     * @param string $string
     *
     * @return bool
     */
    public function isJson($string)
    {
        json_decode($string);

        return json_last_error() == JSON_ERROR_NONE;
    }
}
