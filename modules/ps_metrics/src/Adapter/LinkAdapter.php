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

namespace PrestaShop\Module\Ps_metrics\Adapter;

use Link;
use PrestaShop\Module\Ps_metrics\Context\PrestaShopContext;
use PrestaShop\Module\Ps_metrics\Helper\ToolsHelper;
use Ps_metrics;

class LinkAdapter
{
    /**
     * @var Link
     */
    private $link;

    /**
     * @var Ps_metrics
     */
    private $module;

    /**
     * @var ToolsHelper
     */
    private $toolsHelper;

    /**
     * __construct
     *
     * @param Ps_metrics $module
     * @param PrestaShopContext $prestashopContext
     * @param ToolsHelper $toolsHelper
     *
     * @return void
     */
    public function __construct(Ps_metrics $module, PrestaShopContext $prestashopContext, ToolsHelper $toolsHelper)
    {
        $this->link = $prestashopContext->getLink();
        $this->module = $module;
        $this->toolsHelper = $toolsHelper;
    }

    /**
     * Adapter for getAdminLink from prestashop link class
     *
     * @param string $controller controller name
     * @param bool $withToken include or not the token in the url
     * @param array $sfRouteParams
     * @param array $params
     *
     * @return string
     */
    public function getAdminLink($controller, $withToken = true, $sfRouteParams = [], $params = [])
    {
        if ($this->module->psVersionIs17) {
            return $this->link->getAdminLink($controller, $withToken, $sfRouteParams, $params);
        }

        $paramsAsString = '';
        foreach ($params as $key => $value) {
            $paramsAsString .= "&$key=$value";
        }

        return $this->toolsHelper->getShopDomainSsl(true) . __PS_BASE_URI__ . basename(_PS_ADMIN_DIR_) . '/' . $this->link->getAdminLink($controller, $withToken) . $paramsAsString;
    }
}
