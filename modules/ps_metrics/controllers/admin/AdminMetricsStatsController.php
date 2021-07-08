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

use PrestaShop\Module\Ps_metrics\Helper\ToolsHelper;
use PrestaShop\PsAccountsInstaller\Installer\Exception\InstallerException;

class AdminMetricsStatsController extends ModuleAdminController
{
    /**
     * @var Ps_metrics
     */
    public $module;

    /**
     * AdminMetricsStatsController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->lite_display = true;
    }

    /**
     * @throws Exception
     *
     * @return void
     */
    public function init()
    {
        parent::init();

        $accountsService = null;
        try {
            /** @var PrestaShop\PsAccountsInstaller\Installer\Facade\PsAccounts $accounts */
            $accounts = $this->module->getService('ps_accounts.facade');
            $accountsService = $accounts->getPsAccountsService();
        } catch (InstallerException $e) {
            $this->redirectToSettings();
        }
        if (
            empty($accountsService->getEmail()) &&
            empty($accountsService->getOrRefreshToken())
        ) {
            $this->redirectToSettings();
        }
    }

    /**
     * Initialize the content by adding Boostrap and loading the TPL
     *
     * @return void
     */
    public function initContent()
    {
        parent::initContent();

        /** @var ToolsHelper $toolsHelper */
        $toolsHelper = $this->module->getService('ps_metrics.helper.tools');

        /** @var \Ps_metrics $module */
        $module = $this->module;
        $fullscreen = false;

        if ('true' === $toolsHelper->getValue('fullscreen')) {
            $this->content_only = true;
            $this->display_header = false;
            $this->display_footer = '';
            $fullscreen = true;
        }
        $this->loadMetricsAssets($fullscreen);
        $this->setTemplate($module->template_dir . 'metricsStats.tpl');
    }

    /**
     * @return void
     */
    private function redirectToSettings()
    {
        /** @var PrestaShop\Module\Ps_metrics\Adapter\LinkAdapter $link */
        $link = $this->module->getService('ps_metrics.adapter.link');

        \Tools::redirectAdmin($link->getAdminLink($this->module->metricsSettingsController));
    }

    /**
     * Load VueJs Metrics App and set JS variable for Vuex
     *
     * @param bool $fullscreen
     *
     * @return void
     */
    private function loadMetricsAssets($fullscreen = false)
    {
        $this->context->smarty->assign('pathMetricsApp', $this->module->getPathUri() . 'views/js/app-metrics.' . $this->module->version . '.js');
        $this->context->smarty->assign('pathVendorMetrics', $this->module->getPathUri() . 'views/js/chunk-vendor-metrics.' . $this->module->version . '.js');
        $this->context->smarty->assign('pathMetricsAssets', $this->module->getPathUri() . 'views/css/style-metrics.' . $this->module->version . '.css');
        $this->context->smarty->assign('fullscreen', ($fullscreen) ? 'fullscreen' : '');

        /** @var PrestaShop\Module\Ps_metrics\Presenter\Store\StorePresenter $storePresenter */
        $storePresenter = $this->module->getService('ps_metrics.presenter.store.store');
        $storePresenter->setFullScreen($fullscreen);

        Media::addJsDef([
            'storePsMetrics' => $storePresenter->present(),
        ]);
    }
}
