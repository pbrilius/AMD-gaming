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
class AdminMetricsSettingsController extends ModuleAdminController
{
    /**
     * @var Ps_metrics
     */
    public $module;

    /**
     * Initialize the content by adding Boostrap and loading the TPL
     *
     * @return void
     */
    public function initContent()
    {
        $this->loadSettingsAssets(\Tools::getValue('google_message_error'), \Tools::getValue('countProperty'));
        $this->loadPsAccountsAssets();

        if (false === (bool) version_compare(_PS_VERSION_, '1.7', '>=')) {
            $this->initPageHeaderToolbar();
        }

        $this->setTemplate($this->module->template_dir . 'metricsSettings.tpl');
    }

    /**
     * On prestashop 1.6 we need to init the header
     *
     * @return void
     */
    public function initPageHeaderToolbar()
    {
        parent::initPageHeaderToolbar();

        $this->context->smarty->assign([
            'show_page_header_toolbar' => $this->show_page_header_toolbar,
            'page_header_toolbar_title' => $this->page_header_toolbar_title,
            'page_header_toolbar_btn' => $this->page_header_toolbar_btn,
        ]);
    }

    /**
     * See https://github.com/PrestaShopCorp/prestashop-accounts-installer
     *
     * @return void
     */
    private function loadPsAccountsAssets()
    {
        Media::addJsDef([
            'contextPsAccounts' => $this->module->getService('ps_accounts.facade')
                ->getPsAccountsPresenter()
                ->present($this->module->name),
        ]);
    }

    /**
     * Load VueJs App Settings and set JS variable for Vuex
     *
     * @param string $responseApiMessage
     * @param int $countProperty
     *
     * @return void
     */
    private function loadSettingsAssets($responseApiMessage = 'null', $countProperty = 0)
    {
        $this->context->smarty->assign('pathSettingsVendor', $this->module->getPathUri() . 'views/js/chunk-vendors-metrics-settings.' . $this->module->version . '.js');
        $this->context->smarty->assign('pathSettingsApp', $this->module->getPathUri() . 'views/js/app-metrics-settings.' . $this->module->version . '.js');

        /** @var PrestaShop\Module\Ps_metrics\Presenter\Store\StorePresenter $storePresenter */
        $storePresenter = $this->module->getService('ps_metrics.presenter.store.store');
        $storePresenter->setProperties(null, (string) $responseApiMessage, (int) $countProperty);

        Media::addJsDef([
            'storePsMetrics' => $storePresenter->present(),
        ]);
    }
}
