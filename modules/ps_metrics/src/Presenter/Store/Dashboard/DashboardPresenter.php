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

namespace PrestaShop\Module\Ps_metrics\Presenter\Store\Dashboard;

use PrestaShop\Module\Ps_metrics\Adapter\LinkAdapter;
use PrestaShop\Module\Ps_metrics\Context\PrestaShopContext;
use PrestaShop\Module\Ps_metrics\Presenter\PresenterInterface;
use PrestaShop\Module\Ps_metrics\Translation\DashboardTranslation;
use Ps_metrics;

class DashboardPresenter implements PresenterInterface
{
    /**
     * @var Ps_metrics
     */
    private $module;

    /**
     * @var PrestaShopContext
     */
    private $context;

    /**
     * @var DashboardTranslation
     */
    private $translations;

    /**
     * @var LinkAdapter
     */
    private $linkAdapter;

    /**
     * @var bool
     */
    private $fullscreen = false;

    /**
     * DashboardPresenter constructor.
     *
     * @param Ps_metrics $module
     * @param PrestaShopContext $context
     * @param DashboardTranslation $dashboardTranslation
     * @param LinkAdapter $linkAdapter
     */
    public function __construct(
        Ps_metrics $module,
        PrestaShopContext $context,
        DashboardTranslation $dashboardTranslation,
        LinkAdapter $linkAdapter
    ) {
        $this->module = $module;
        $this->context = $context;
        $this->translations = $dashboardTranslation;
        $this->linkAdapter = $linkAdapter;
    }

    /**
     * Present the Dashboard App Vuex
     *
     * @return array
     */
    public function present()
    {
        return [
            'dashboard' => [
                'translations' => $this->translations->getTranslations(),
                'linkMetrics' => $this->linkAdapter->getAdminLink('AdminMetricsStats', true, [], []),
                'linkSettings' => $this->linkAdapter->getAdminLink('AdminMetricsSettings', true, [], []),
                'linkAdminCarts' => $this->linkAdapter->getAdminLink('AdminCarts', true, [], []),
                'fullscreen' => $this->fullscreen,
            ],
        ];
    }

    /**
     * Toggle Fullscreen
     *
     * @param bool $fullscreen
     *
     * @return void
     */
    public function setFullScreen($fullscreen)
    {
        $this->fullscreen = $fullscreen;
    }
}
