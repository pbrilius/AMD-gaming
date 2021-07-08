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

namespace PrestaShop\Module\Ps_metrics\Presenter\Store\Settings;

use PrestaShop\Module\Ps_metrics\Adapter\LinkAdapter;
use PrestaShop\Module\Ps_metrics\Api\HttpApi;
use PrestaShop\Module\Ps_metrics\Context\PrestaShopContext;
use PrestaShop\Module\Ps_metrics\Module\GAInstaller;
use PrestaShop\Module\Ps_metrics\Presenter\PresenterInterface;
use PrestaShop\Module\Ps_metrics\Provider\AnalyticsAccountsListProvider;
use PrestaShop\Module\Ps_metrics\Provider\GoogleTagProvider;
use PrestaShop\Module\Ps_metrics\Provider\ShopsProvider;
use PrestaShop\Module\Ps_metrics\Repository\ConfigurationRepository;
use PrestaShop\Module\Ps_metrics\Translation\SettingsTranslation;
use Ps_metrics;

class SettingsPresenter implements PresenterInterface
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
     * @var string
     */
    private $responseApiMessage;

    /**
     * @var int
     */
    private $countProperty;

    /**
     * @var SettingsTranslation
     */
    private $translations;

    /**
     * @var LinkAdapter
     */
    private $linkAdapter;

    /**
     * @var ConfigurationRepository
     */
    private $configurationRepository;

    /**
     * @var ShopsProvider
     */
    private $shopsProvider;

    /**
     * @var AnalyticsAccountsListProvider
     */
    private $analyticsAccountsListProvider;

    /**
     * @var GoogleTagProvider
     */
    private $googleTagProvider;

    /**
     * @var GAInstaller
     */
    private $gaInstaller;

    /**
     * @var HttpApi
     */
    private $httpApi;

    /**
     * SettingsPresenter constructor.
     *
     * @param Ps_metrics $module
     * @param PrestaShopContext $context
     * @param SettingsTranslation $settingsTranslation
     * @param LinkAdapter $linkAdapter
     * @param ConfigurationRepository $configurationRepository
     * @param ShopsProvider $shopsProvider
     * @param AnalyticsAccountsListProvider $analyticsAccountsListProvider
     * @param GoogleTagProvider $googleTagProvider
     * @param GAInstaller $gaInstaller
     * @param HttpApi $httpApi
     */
    public function __construct(
        Ps_metrics $module,
        PrestaShopContext $context,
        SettingsTranslation $settingsTranslation,
        LinkAdapter $linkAdapter,
        ConfigurationRepository $configurationRepository,
        ShopsProvider $shopsProvider,
        AnalyticsAccountsListProvider $analyticsAccountsListProvider,
        GoogleTagProvider $googleTagProvider,
        GAInstaller $gaInstaller,
        HttpApi $httpApi
    ) {
        $this->module = $module;
        $this->context = $context;
        $this->translations = $settingsTranslation;
        $this->linkAdapter = $linkAdapter;
        $this->configurationRepository = $configurationRepository;
        $this->shopsProvider = $shopsProvider;
        $this->analyticsAccountsListProvider = $analyticsAccountsListProvider;
        $this->googleTagProvider = $googleTagProvider;
        $this->gaInstaller = $gaInstaller;
        $this->httpApi = $httpApi;
    }

    /**
     * @param string $responseApiMessage
     * @param int $countProperty
     *
     * @return void
     */
    public function setSettings($responseApiMessage, $countProperty = 0)
    {
        $this->responseApiMessage = $responseApiMessage;
        $this->countProperty = $countProperty;
    }

    /**
     * Present the Setting App Vuex
     *
     * @return array
     */
    public function present()
    {
        $currentShop = $this->shopsProvider->getShopUrl($this->context->getShopId());
        $this->googleTagProvider->setBaseUrl($currentShop['url']);

        return [
            'settings' => [
                'faq' => $this->httpApi->getFaq($this->module->module_key, $this->context->getLanguageIsoCode(), _PS_VERSION_),
                'plans' => $this->httpApi->getPlansDetails($this->context->getLanguageIsoCode()),
                'translations' => $this->translations->getTranslations(),
                'googleLinked' => (bool) $this->configurationRepository->getGoogleLinkedValue(),
                'countProperty' => $this->countProperty,
                'googleLinkedUrl' => $this->linkAdapter->getAdminLink($this->module->oauthAdminController, true, [], ['from' => 'PS']),
                'googleAccountsList' => $this->analyticsAccountsListProvider->getAccountsList(),
                'googleAccount' => $this->analyticsAccountsListProvider->getSelectedAccount(),
                'googleUserName' => $this->analyticsAccountsListProvider->getUserName(),
                'GTAAvailable' => $this->googleTagProvider->findGoogleTagsAnalytics(),
                'GTMAvailable' => $this->googleTagProvider->findGoogleTagsManager(),
                'gaModule' => [
                    'isInstalled' => $this->gaInstaller->isInstalled(),
                    'isEnabled' => $this->gaInstaller->isEnabled(),
                    'installLink' => $this->gaInstaller->getInstallLink(),
                    'enableLink' => $this->gaInstaller->getEnableLink(),
                    'configLink' => $this->gaInstaller->getConfigLink(),
                ],
                'oAuthGoogleErrorMessage' => $this->responseApiMessage,
                'linkDashboard' => $this->linkAdapter->getAdminLink('AdminDashboard', true, [], []),
                'linkMetrics' => $this->linkAdapter->getAdminLink('AdminMetricsStats', true, [], []),
            ],
        ];
    }
}
