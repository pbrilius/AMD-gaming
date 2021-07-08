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

namespace PrestaShop\Module\Ps_metrics\Presenter\Store;

use PrestaShop\Module\Ps_metrics\Context\PrestaShopContext;
use PrestaShop\Module\Ps_metrics\Presenter\PresenterInterface;
use PrestaShop\Module\Ps_metrics\Presenter\Store\Context\ContextPresenter;
use PrestaShop\Module\Ps_metrics\Presenter\Store\Dashboard\DashboardPresenter;
use PrestaShop\Module\Ps_metrics\Presenter\Store\Settings\SettingsPresenter;
use Ps_metrics;

/**
 * Present the store to the vuejs app (vuex)
 */
class StorePresenter implements PresenterInterface
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
     * @var array
     */
    private $store;

    /**
     * @var string
     */
    private $responseApiMessage;

    /**
     * @var int
     */
    private $countProperty;

    /**
     * @var ContextPresenter
     */
    private $contextPresenter;

    /**
     * @var DashboardPresenter
     */
    private $dashboardPresenter;

    /**
     * @var SettingsPresenter
     */
    private $settingsPresenter;

    /**
     * @var bool
     */
    private $fullscreen;

    /**
     * StorePresenter constructor.
     *
     * @param Ps_metrics $module
     * @param PrestaShopContext $context
     * @param ContextPresenter $contextPresenter
     * @param DashboardPresenter $dashboardPresenter
     * @param SettingsPresenter $settingsPresenter
     *
     * @return void
     */
    public function __construct(
        Ps_metrics $module,
        PrestaShopContext $context,
        ContextPresenter $contextPresenter,
        DashboardPresenter $dashboardPresenter,
        SettingsPresenter $settingsPresenter
    ) {
        $this->module = $module;
        $this->context = $context;
        $this->contextPresenter = $contextPresenter;
        $this->dashboardPresenter = $dashboardPresenter;
        $this->settingsPresenter = $settingsPresenter;
    }

    /**
     * Set properties of presenter
     *
     * @param array|null $store
     * @param string $responseApiMessage
     * @param int $countProperty
     *
     * @return void
     */
    public function setProperties($store = null, $responseApiMessage, $countProperty)
    {
        // Allow to set a custom store for tests purpose
        if (null !== $store) {
            $this->store = $store;
        }

        $this->responseApiMessage = $responseApiMessage;
        $this->countProperty = $countProperty;

        $this->settingsPresenter->setSettings($responseApiMessage, $countProperty);
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
        $this->dashboardPresenter->setFullScreen($fullscreen);
    }

    /**
     * Build the store required by vuex
     *
     * @return array
     */
    public function present()
    {
        if (null !== $this->store) {
            return $this->store;
        }

        $contextPresenter = $this->contextPresenter->present();

        // Load a presenter depending on the application to load (dashboard | settings)
        if ('dashboard' === $contextPresenter['context']['app'] || 'metrics' === $contextPresenter['context']['app']) {
            $this->store = array_merge(
                $contextPresenter,
                $this->dashboardPresenter->present()
            );
        } else {
            $this->store = array_merge(
                $contextPresenter,
                $this->settingsPresenter->present()
            );
        }

        return $this->store;
    }
}
