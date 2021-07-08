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

use PrestaShop\Module\Ps_metrics\Adapter\LinkAdapter;
use PrestaShop\Module\Ps_metrics\Api\AnalyticsApi;
use PrestaShop\Module\Ps_metrics\Helper\ModuleHelper;
use PrestaShop\Module\Ps_metrics\Helper\ToolsHelper;
use PrestaShop\Module\Ps_metrics\Module\DashboardModules;
use PrestaShop\Module\Ps_metrics\Repository\ConfigurationRepository;
use PrestaShop\PsAccountsInstaller\Installer\Facade\PsAccounts;

class AdminOauthCallbackController extends ModuleAdminController
{
    /**
     * @var Ps_metrics
     */
    public $module;

    /**
     * @var PsAccounts
     */
    private $psAccountsFacade;

    /**
     * Load JsonHelper to avoid jsonEncode issues on AjaxDie
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->psAccountsFacade = $this->module->getService('ps_accounts.facade');
    }

    /**
     * Main method
     *
     * @return void
     */
    public function display()
    {
        /** @var ToolsHelper $toolsHelper */
        $toolsHelper = $this->module->getService('ps_metrics.helper.tools');

        /** @var ConfigurationRepository $configurationRepository */
        $configurationRepository = $this->module->getService('ps_metrics.repository.configuration');

        /** @var LinkAdapter $linkAdapter */
        $linkAdapter = $this->module->getService('ps_metrics.adapter.link');

        if ('PS' === $toolsHelper->getValue('from')) {
            $this->redirectToGoogleAuthentication();
        }

        $configurationRepository->saveActionGoogleLinked(true);

        if (false === $this->isGoogleAuthenticationDone()) {
            $configurationRepository->saveActionGoogleLinked(false);
        }

        /** @var DashboardModules $dashboardModule */
        $dashboardModule = $this->module->getService('ps_metrics.module.dashboard.modules');
        $dashboardModule->disableModules();

        $toolsHelper->redirectAdmin(
            $linkAdapter->getAdminLink(
                $this->module->metricsSettingsController,
                true,
                [],
                [
                    'google_message_error' => $toolsHelper->getValue('message'),
                    'countProperty' => $toolsHelper->getValue('count'),
                ]
            )
        );
    }

    /**
     * Connexion to Google OAuth by redirecting to psessentials service
     *
     * @return void
     */
    private function redirectToGoogleAuthentication()
    {
        /** @var AnalyticsApi $apiAnalytics */
        $apiAnalytics = $this->module->getService('ps_metrics.api.analytics');

        /** @var LinkAdapter $linkAdapter */
        $linkAdapter = $this->module->getService('ps_metrics.adapter.link');

        /** @var ToolsHelper $toolsHelper */
        $toolsHelper = $this->module->getService('ps_metrics.helper.tools');

        $psAccountsService = $this->psAccountsFacade->getPsAccountsService();

        $serviceResult = $apiAnalytics->generateAuthUrl([
            'state' => $this->getGoogleApiState(
                $linkAdapter->getAdminLink($this->module->oauthAdminController),
                $psAccountsService->getShopUuidV4()
            ),
        ]);

        if (empty($serviceResult)) {
            $toolsHelper->redirectAdmin(
                $linkAdapter->getAdminLink(
                    $this->module->metricsSettingsController,
                    true,
                    [],
                    [
                        'google_message_error' => $toolsHelper->getValue('message'),
                        'countProperty' => $toolsHelper->getValue('count'),
                    ]
                )
            );
        }

        $toolsHelper->redirect($serviceResult['authorizeUrl']);
    }

    /**
     * The service psessentials returns a param "status=ok" when the connection is done and valid
     *
     * @return bool
     */
    private function isGoogleAuthenticationDone()
    {
        /** @var ToolsHelper $toolsHelper */
        $toolsHelper = $this->module->getService('ps_metrics.helper.tools');

        if ('ok' === $toolsHelper->getValue('status')) {
            return true;
        }

        return false;
    }

    /**
     * Google State is a base64 json encoded
     *
     * @param string $shopRedirectUri
     * @param string|false $shopId
     *
     * @return string
     */
    private function getGoogleApiState($shopRedirectUri, $shopId)
    {
        // the use of base64_encode is necessary for the api
        return base64_encode(
            '{"redirectUri":"' . $shopRedirectUri . '","shopId":"' . $shopId . '"}'
        );
    }

    /**
     * Get the module enabled status
     *
     * @return string|false
     */
    private function getModuleListState()
    {
        $moduleListState = [];

        /** @var ModuleHelper $moduleHelper */
        $moduleHelper = $this->module->getService('ps_metrics.helper.module');

        foreach ($this->module->moduleSubstitution as $moduleName) {
            $isModuleEnabled = $moduleHelper->isEnabled($moduleName);
            $moduleListState[$moduleName] = $isModuleEnabled;
        }

        return json_encode($moduleListState);
    }

    /**
     * Disable dashboard module list moduleSubstitution when the Google Account is linked
     *
     * @return void
     */
    private function disableDashboardModuleList()
    {
        /** @var ModuleHelper $moduleHelper */
        $moduleHelper = $this->module->getService('ps_metrics.helper.module');

        foreach ($this->module->moduleSubstitution as $moduleName) {
            $module = $moduleHelper->getInstanceByName($moduleName);
            // $module returns false if module doesn't exist
            if (false !== $module) {
                $module->disable();
            }
        }
    }
}
