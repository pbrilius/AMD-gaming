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

use PrestaShop\Module\Ps_metrics\Api\AnalyticsApi;
use PrestaShop\Module\Ps_metrics\Cache\DataCache;
use PrestaShop\Module\Ps_metrics\Context\PrestaShopContext;
use PrestaShop\Module\Ps_metrics\Helper\JsonHelper;
use PrestaShop\Module\Ps_metrics\Helper\ToolsHelper;
use PrestaShop\Module\Ps_metrics\Module\DashboardModules;
use PrestaShop\Module\Ps_metrics\Module\Uninstall;
use PrestaShop\Module\Ps_metrics\Provider\AnalyticsAccountsListProvider;
use PrestaShop\Module\Ps_metrics\Provider\GoogleTagProvider;
use PrestaShop\Module\Ps_metrics\Provider\ShopsProvider;
use PrestaShop\Module\Ps_metrics\Repository\ConfigurationRepository;
use PrestaShop\Module\Ps_metrics\Validation\SelectAccountAnalytics;

class AdminAjaxSettingsController extends ModuleAdminController
{
    /**
     * @var Ps_metrics
     */
    public $module;

    /**
     * Load JsonHelper to avoid jsonEncode issues on AjaxDie
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get all existing Google Tags in Front End shop and retrieve them
     *
     * @return void
     */
    public function ajaxProcessGetExistingGoogleTags()
    {
        /** @var ConfigurationRepository $configurationRepository */
        $configurationRepository = $this->module->getService('ps_metrics.repository.configuration');

        /** @var ShopsProvider $shopsProvider */
        $shopsProvider = $this->module->getService('ps_metrics.provider.shops');

        /** @var PrestaShopContext $prestashopContext */
        $prestashopContext = $this->module->getService('ps_metrics.context.prestashop');

        /** @var JsonHelper $jsonHelper */
        $jsonHelper = $this->module->getService('ps_metrics.helper.json');

        /** @var GoogleTagProvider $googleTagProvider */
        $googleTagProvider = $this->module->getService('ps_metrics.provider.googletag');

        // If google Tag is already set as linked, we avoid to retrieve the Google Tag
        // Only the PSL will tell us if we should retrieve TAGS again
        if (true === $configurationRepository->getGoogleTagLinkedValue()) {
            $this->ajaxDie('true');
        }

        $currentShop = $shopsProvider->getShopUrl($prestashopContext->getShopId());
        $googleTagProvider->setBaseUrl($currentShop['url']);

        $this->ajaxDie($jsonHelper->jsonEncode([
            'analytics' => $googleTagProvider->findGoogleTagsAnalytics(),
            'manager' => $googleTagProvider->findGoogleTagsManager(),
        ]));
    }

    /**
     * Select a Google Account for psessentials
     * Need webPropertyId and viewId. Returns 201 if done
     *
     * @return void
     */
    public function ajaxProcessSelectAccountAnalytics()
    {
        /** @var JsonHelper $jsonHelper */
        $jsonHelper = $this->module->getService('ps_metrics.helper.json');

        /** @var ToolsHelper $toolsHelper */
        $toolsHelper = $this->module->getService('ps_metrics.helper.tools');

        /** @var AnalyticsApi $apiAnalytics */
        $apiAnalytics = $this->module->getService('ps_metrics.api.analytics');

        /** @var SelectAccountAnalytics $serviceProcessSelectAccountAnalytics */
        $serviceProcessSelectAccountAnalytics = $this->module->getService('ps_metrics.validation.processselectaccountanalytics');

        $this->deleteExistingCache();
        $validateData = $serviceProcessSelectAccountAnalytics->validate([
            'webPropertyId' => $toolsHelper->getValue('webPropertyId'),
            'viewId' => $toolsHelper->getValue('viewId'),
        ]);

        if (false === $validateData) {
            $this->ajaxDie($jsonHelper->jsonEncode([
                'success' => false,
            ]));
        }
        $serviceResult = $apiAnalytics->setAccountSelection([
            'webPropertyId' => $toolsHelper->getValue('webPropertyId'),
            'viewId' => $toolsHelper->getValue('viewId'),
        ]);

        if (false === $serviceResult) {
            $this->ajaxDie($jsonHelper->jsonEncode([
                'success' => false,
                'googleAccount' => [],
            ]));
        }

        $this->ajaxDie($jsonHelper->jsonEncode([
            'success' => true,
            'googleAccount' => [
                'webPropertyId' => $toolsHelper->getValue('webPropertyId'),
                'view_id' => $toolsHelper->getValue('viewId'),
                'username' => $toolsHelper->getValue('username'),
                'webPropertyName' => $toolsHelper->getValue('webPropertyName'),
            ],
        ]));
    }

    /**
     * Google Analytics Logout must enable disabled modules, unsubscribe from PsEssentials
     * Also, it must reset configuration's values
     *
     * @return void
     */
    public function ajaxProcessLogOut()
    {
        /** @var JsonHelper $jsonHelper */
        $jsonHelper = $this->module->getService('ps_metrics.helper.json');

        $this->deleteExistingCache();

        /** @var Uninstall $uninstallGoogleAccount */
        $uninstallGoogleAccount = $this->module->getService('ps_metrics.module.uninstall');

        if (false === $uninstallGoogleAccount->unsubscribePsEssentials()) {
            $this->ajaxDie($jsonHelper->jsonEncode([
                'success' => false,
                'googleLinked' => true,
            ]));
        }

        if (false === $uninstallGoogleAccount->resetConfigurationValues()) {
            $this->ajaxDie($jsonHelper->jsonEncode([
                'success' => false,
                'googleLinked' => true,
            ]));
        }

        /** @var DashboardModules $dashboardModule */
        $dashboardModule = $this->module->getService('ps_metrics.module.dashboard.modules');
        $dashboardModule->enableModules();

        $this->ajaxDie($jsonHelper->jsonEncode([
            'success' => true,
            'googleLinked' => false,
        ]));
    }

    /**
     * Google Analytics Logout must enable disabled modules, unsubscribe from PsEssentials
     * Also, it must reset configuration's values
     *
     * @return void
     */
    public function ajaxProcessRefreshGA()
    {
        /** @var JsonHelper $jsonHelper */
        $jsonHelper = $this->module->getService('ps_metrics.helper.json');

        /** @var AnalyticsApi $apiAnalytics */
        $apiAnalytics = $this->module->getService('ps_metrics.api.analytics');

        $serviceResult = $apiAnalytics->refreshGA();

        if (!empty($serviceResult['error'])) {
            $this->ajaxDie($jsonHelper->jsonEncode([
                'success' => false,
                'message' => $serviceResult['error'],
            ]));
        }
        $this->ajaxDie($jsonHelper->jsonEncode([
            'success' => true,
        ]));
    }

    /**
     * Google Analytics Property List
     *
     * @return void
     */
    public function ajaxProcessListProperty()
    {
        /** @var JsonHelper $jsonHelper */
        $jsonHelper = $this->module->getService('ps_metrics.helper.json');

        /** @var AnalyticsAccountsListProvider $analyticsAccountListProvider */
        $analyticsAccountListProvider = $this->module->getService('ps_metrics.provider.analyticsaccountslist');

        $serviceResult = $analyticsAccountListProvider->getAccountsList();
        if (empty($serviceResult)) {
            $this->ajaxDie($jsonHelper->jsonEncode([
                'success' => false,
                'listProperty' => [],
                'error' => 'No property list on this account',
            ]));
        }

        $this->ajaxDie($jsonHelper->jsonEncode([
            'success' => true,
            'listProperty' => $serviceResult,
        ]));
    }

    /**
     * Init Billing Free
     *
     * @return void
     */
    public function ajaxProcessBillingFree()
    {
        /** @var JsonHelper $jsonHelper */
        $jsonHelper = $this->module->getService('ps_metrics.helper.json');

        /** @var PrestaShop\PsAccountsInstaller\Installer\Facade\PsAccounts $accounts */
        $accounts = $this->module->getService('ps_accounts.facade');
        $billingService = $accounts->getPsBillingService();

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { //whether ip is from proxy
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else { //whether ip is from remote address
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }

        $result = $billingService->subscribeToFreePlan($this->module->name, 'metrics-free', false, $ip_address);

        if (empty($result)) {
            $this->ajaxDie($jsonHelper->jsonEncode([
                'success' => false,
            ]));
        }

        $this->ajaxDie($jsonHelper->jsonEncode([
            'success' => true,
            'billing' => $result,
        ]));
    }

    /**
     * Delete metrics cache
     *
     * @return bool
     */
    private function deleteExistingCache()
    {
        /** @var DataCache $dataCache */
        $dataCache = $this->module->getService('ps_metrics.cache.data');

        return $dataCache->deleteAllCache();
    }
}
