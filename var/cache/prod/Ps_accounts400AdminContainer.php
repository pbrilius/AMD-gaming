<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class Ps_accounts400AdminContainer extends Container
{
    private $parameters = [];
    private $targetDirs = [];

    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();

        $this->services = [];
        $this->normalizedIds = [
            'prestashop\\module\\psaccounts\\adapter\\configuration' => 'PrestaShop\\Module\\PsAccounts\\Adapter\\Configuration',
            'prestashop\\module\\psaccounts\\adapter\\link' => 'PrestaShop\\Module\\PsAccounts\\Adapter\\Link',
            'prestashop\\module\\psaccounts\\api\\client\\firebaseclient' => 'PrestaShop\\Module\\PsAccounts\\Api\\Client\\FirebaseClient',
            'prestashop\\module\\psaccounts\\api\\client\\servicesaccountsclient' => 'PrestaShop\\Module\\PsAccounts\\Api\\Client\\ServicesAccountsClient',
            'prestashop\\module\\psaccounts\\api\\client\\servicesbillingclient' => 'PrestaShop\\Module\\PsAccounts\\Api\\Client\\ServicesBillingClient',
            'prestashop\\module\\psaccounts\\context\\shopcontext' => 'PrestaShop\\Module\\PsAccounts\\Context\\ShopContext',
            'prestashop\\module\\psaccounts\\handler\\error\\sentry' => 'PrestaShop\\Module\\PsAccounts\\Handler\\Error\\Sentry',
            'prestashop\\module\\psaccounts\\installer\\installer' => 'PrestaShop\\Module\\PsAccounts\\Installer\\Installer',
            'prestashop\\module\\psaccounts\\presenter\\psaccountspresenter' => 'PrestaShop\\Module\\PsAccounts\\Presenter\\PsAccountsPresenter',
            'prestashop\\module\\psaccounts\\provider\\shopprovider' => 'PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider',
            'prestashop\\module\\psaccounts\\repository\\configurationrepository' => 'PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository',
            'prestashop\\module\\psaccounts\\service\\psaccountsservice' => 'PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService',
            'prestashop\\module\\psaccounts\\service\\psbillingservice' => 'PrestaShop\\Module\\PsAccounts\\Service\\PsBillingService',
            'prestashop\\module\\psaccounts\\service\\shopkeysservice' => 'PrestaShop\\Module\\PsAccounts\\Service\\ShopKeysService',
            'prestashop\\module\\psaccounts\\service\\shoplinkaccountservice' => 'PrestaShop\\Module\\PsAccounts\\Service\\ShopLinkAccountService',
            'prestashop\\module\\psaccounts\\service\\shoptokenservice' => 'PrestaShop\\Module\\PsAccounts\\Service\\ShopTokenService',
            'prestashop\\module\\psaccounts\\service\\ssoservice' => 'PrestaShop\\Module\\PsAccounts\\Service\\SsoService',
        ];
        $this->methodMap = [
            'PrestaShop\\Module\\PsAccounts\\Adapter\\Configuration' => 'getConfigurationService',
            'PrestaShop\\Module\\PsAccounts\\Adapter\\Link' => 'getLinkService',
            'PrestaShop\\Module\\PsAccounts\\Api\\Client\\FirebaseClient' => 'getFirebaseClientService',
            'PrestaShop\\Module\\PsAccounts\\Api\\Client\\ServicesAccountsClient' => 'getServicesAccountsClientService',
            'PrestaShop\\Module\\PsAccounts\\Api\\Client\\ServicesBillingClient' => 'getServicesBillingClientService',
            'PrestaShop\\Module\\PsAccounts\\Context\\ShopContext' => 'getShopContextService',
            'PrestaShop\\Module\\PsAccounts\\Handler\\Error\\Sentry' => 'getSentryService',
            'PrestaShop\\Module\\PsAccounts\\Installer\\Installer' => 'getInstallerService',
            'PrestaShop\\Module\\PsAccounts\\Presenter\\PsAccountsPresenter' => 'getPsAccountsPresenterService',
            'PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider' => 'getShopProviderService',
            'PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository' => 'getConfigurationRepositoryService',
            'PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService' => 'getPsAccountsServiceService',
            'PrestaShop\\Module\\PsAccounts\\Service\\PsBillingService' => 'getPsBillingServiceService',
            'PrestaShop\\Module\\PsAccounts\\Service\\ShopKeysService' => 'getShopKeysServiceService',
            'PrestaShop\\Module\\PsAccounts\\Service\\ShopLinkAccountService' => 'getShopLinkAccountServiceService',
            'PrestaShop\\Module\\PsAccounts\\Service\\ShopTokenService' => 'getShopTokenServiceService',
            'PrestaShop\\Module\\PsAccounts\\Service\\SsoService' => 'getSsoServiceService',
            'ps_accounts.context' => 'getPsAccounts_ContextService',
            'ps_accounts.module' => 'getPsAccounts_ModuleService',
        ];

        $this->aliases = [];
    }

    public function getRemovedIds()
    {
        return [
            'Psr\\Container\\ContainerInterface' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
        ];
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function isFrozen()
    {
        @trigger_error(sprintf('The %s() method is deprecated since Symfony 3.3 and will be removed in 4.0. Use the isCompiled() method instead.', __METHOD__), E_USER_DEPRECATED);

        return true;
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Adapter\Configuration' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Adapter\Configuration
     */
    protected function getConfigurationService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Configuration'] = new \PrestaShop\Module\PsAccounts\Adapter\Configuration(${($_ = isset($this->services['ps_accounts.context']) ? $this->services['ps_accounts.context'] : $this->getPsAccounts_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Adapter\Link' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Adapter\Link
     */
    protected function getLinkService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link'] = new \PrestaShop\Module\PsAccounts\Adapter\Link(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext'] : $this->getShopContextService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Api\Client\FirebaseClient' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Api\Client\FirebaseClient
     */
    protected function getFirebaseClientService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\FirebaseClient'] = new \PrestaShop\Module\PsAccounts\Api\Client\FirebaseClient(['api_key' => 'AIzaSyBEm26bA2KR893rY68enLdVGpqnkoW2Juo']);
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Api\Client\ServicesAccountsClient' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Api\Client\ServicesAccountsClient
     */
    protected function getServicesAccountsClientService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\ServicesAccountsClient'] = new \PrestaShop\Module\PsAccounts\Api\Client\ServicesAccountsClient(['api_url' => 'https://accounts-api.psessentials.net'], ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider'] : $this->getShopProviderService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopTokenService']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopTokenService'] : $this->getShopTokenServiceService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link'] : $this->getLinkService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Api\Client\ServicesBillingClient' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Api\Client\ServicesBillingClient
     */
    protected function getServicesBillingClientService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\ServicesBillingClient'] = new \PrestaShop\Module\PsAccounts\Api\Client\ServicesBillingClient(['api_url' => 'https://billing-api.distribution.prestashop.net'], ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService'] : $this->getPsAccountsServiceService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider'] : $this->getShopProviderService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link'] : $this->getLinkService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Context\ShopContext' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Context\ShopContext
     */
    protected function getShopContextService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext'] = new \PrestaShop\Module\PsAccounts\Context\ShopContext(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['ps_accounts.context']) ? $this->services['ps_accounts.context'] : $this->getPsAccounts_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Handler\Error\Sentry' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Handler\Error\Sentry
     */
    protected function getSentryService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Handler\\Error\\Sentry'] = new \PrestaShop\Module\PsAccounts\Handler\Error\Sentry('https://4c7f6c8dd5aa405b8401a35f5cf26ada@o298402.ingest.sentry.io/5354585', ${($_ = isset($this->services['ps_accounts.module']) ? $this->services['ps_accounts.module'] : $this->getPsAccounts_ModuleService()) && false ?: '_'}->getModuleEnv(), ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Installer\Installer' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Installer\Installer
     */
    protected function getInstallerService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Installer\\Installer'] = new \PrestaShop\Module\PsAccounts\Installer\Installer(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext'] : $this->getShopContextService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link'] : $this->getLinkService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Presenter\PsAccountsPresenter' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Presenter\PsAccountsPresenter
     */
    protected function getPsAccountsPresenterService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Presenter\\PsAccountsPresenter'] = new \PrestaShop\Module\PsAccounts\Presenter\PsAccountsPresenter(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService'] : $this->getPsAccountsServiceService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider'] : $this->getShopProviderService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopLinkAccountService']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopLinkAccountService'] : $this->getShopLinkAccountServiceService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Service\\SsoService']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Service\\SsoService'] : ($this->services['PrestaShop\\Module\\PsAccounts\\Service\\SsoService'] = new \PrestaShop\Module\PsAccounts\Service\SsoService(['sso_resend_verification_email_url' => 'https://auth.prestashop.com/account/send-verification-email', 'sso_account_url' => 'https://auth.prestashop.com/login']))) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Installer\\Installer']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Installer\\Installer'] : $this->getInstallerService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Provider\ShopProvider' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Provider\ShopProvider
     */
    protected function getShopProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider'] = new \PrestaShop\Module\PsAccounts\Provider\ShopProvider(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Context\\ShopContext'] : $this->getShopContextService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link'] : $this->getLinkService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Repository\ConfigurationRepository' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\ConfigurationRepository
     */
    protected function getConfigurationRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] = new \PrestaShop\Module\PsAccounts\Repository\ConfigurationRepository(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Configuration']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Configuration'] : $this->getConfigurationService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Service\PsAccountsService' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\PsAccountsService
     */
    protected function getPsAccountsServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService'] = new \PrestaShop\Module\PsAccounts\Service\PsAccountsService(${($_ = isset($this->services['ps_accounts.module']) ? $this->services['ps_accounts.module'] : $this->getPsAccounts_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopTokenService']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopTokenService'] : $this->getShopTokenServiceService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link'] : $this->getLinkService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Service\PsBillingService' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\PsBillingService
     */
    protected function getPsBillingServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Service\\PsBillingService'] = new \PrestaShop\Module\PsAccounts\Service\PsBillingService(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\ServicesBillingClient']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\ServicesBillingClient'] : $this->getServicesBillingClientService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopTokenService']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopTokenService'] : $this->getShopTokenServiceService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Service\ShopKeysService' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\ShopKeysService
     */
    protected function getShopKeysServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopKeysService'] = new \PrestaShop\Module\PsAccounts\Service\ShopKeysService(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Service\ShopLinkAccountService' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\ShopLinkAccountService
     */
    protected function getShopLinkAccountServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopLinkAccountService'] = new \PrestaShop\Module\PsAccounts\Service\ShopLinkAccountService(['accounts_ui_url' => 'https://accounts.psessentials.net'], ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Provider\\ShopProvider'] : $this->getShopProviderService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopKeysService']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopKeysService'] : $this->getShopKeysServiceService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopTokenService']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopTokenService'] : $this->getShopTokenServiceService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Adapter\\Link'] : $this->getLinkService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Service\ShopTokenService' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\ShopTokenService
     */
    protected function getShopTokenServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Service\\ShopTokenService'] = new \PrestaShop\Module\PsAccounts\Service\ShopTokenService(${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\FirebaseClient']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\FirebaseClient'] : ($this->services['PrestaShop\\Module\\PsAccounts\\Api\\Client\\FirebaseClient'] = new \PrestaShop\Module\PsAccounts\Api\Client\FirebaseClient(['api_key' => 'AIzaSyBEm26bA2KR893rY68enLdVGpqnkoW2Juo']))) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\ConfigurationRepository'] : $this->getConfigurationRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Service\SsoService' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\SsoService
     */
    protected function getSsoServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Service\\SsoService'] = new \PrestaShop\Module\PsAccounts\Service\SsoService(['sso_resend_verification_email_url' => 'https://auth.prestashop.com/account/send-verification-email', 'sso_account_url' => 'https://auth.prestashop.com/login']);
    }

    /**
     * Gets the public 'ps_accounts.context' shared service.
     *
     * @return \Context
     */
    protected function getPsAccounts_ContextService()
    {
        return $this->services['ps_accounts.context'] = \Context::getContext();
    }

    /**
     * Gets the public 'ps_accounts.module' shared service.
     *
     * @return \Ps_accounts
     */
    protected function getPsAccounts_ModuleService()
    {
        return $this->services['ps_accounts.module'] = \Module::getInstanceByName('ps_accounts');
    }

    public function getParameter($name)
    {
        $name = (string) $name;
        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            $name = $this->normalizeParameterName($name);

            if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
                throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
            }
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name)
    {
        $name = (string) $name;
        $name = $this->normalizeParameterName($name);

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = [];
    private $dynamicParameters = [];

    /**
     * Computes a dynamic parameter.
     *
     * @param string $name The name of the dynamic parameter to load
     *
     * @return mixed The value of the dynamic parameter
     *
     * @throws InvalidArgumentException When the dynamic parameter does not exist
     */
    private function getDynamicParameter($name)
    {
        throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
    }

    private $normalizedParameterNames = [];

    private function normalizeParameterName($name)
    {
        if (isset($this->normalizedParameterNames[$normalizedName = strtolower($name)]) || isset($this->parameters[$normalizedName]) || array_key_exists($normalizedName, $this->parameters)) {
            $normalizedName = isset($this->normalizedParameterNames[$normalizedName]) ? $this->normalizedParameterNames[$normalizedName] : $normalizedName;
            if ((string) $name !== $normalizedName) {
                @trigger_error(sprintf('Parameter names will be made case sensitive in Symfony 4.0. Using "%s" instead of "%s" is deprecated since Symfony 3.4.', $name, $normalizedName), E_USER_DEPRECATED);
            }
        } else {
            $normalizedName = $this->normalizedParameterNames[$normalizedName] = (string) $name;
        }

        return $normalizedName;
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return [
            'ps_accounts.firebase_api_key' => 'AIzaSyBEm26bA2KR893rY68enLdVGpqnkoW2Juo',
            'ps_accounts.svc_accounts_api_url' => 'https://accounts-api.psessentials.net',
            'ps_accounts.svc_accounts_ui_url' => 'https://accounts.psessentials.net',
            'ps_accounts.svc_billing_api_url' => 'https://billing-api.distribution.prestashop.net',
            'ps_accounts.sso_account_url' => 'https://auth.prestashop.com/login',
            'ps_accounts.sso_resend_verification_email_url' => 'https://auth.prestashop.com/account/send-verification-email',
            'ps_accounts.sentry_credentials' => 'https://4c7f6c8dd5aa405b8401a35f5cf26ada@o298402.ingest.sentry.io/5354585',
        ];
    }
}
