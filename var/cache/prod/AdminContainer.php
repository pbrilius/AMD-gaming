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
class AdminContainer extends \PrestaShop\PrestaShop\Adapter\Container\LegacyContainer
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
            'prestashop\\module\\pseventbus\\api\\eventbusproxyclient' => 'PrestaShop\\Module\\PsEventbus\\Api\\EventBusProxyClient',
            'prestashop\\module\\pseventbus\\api\\eventbussyncclient' => 'PrestaShop\\Module\\PsEventbus\\Api\\EventBusSyncClient',
            'prestashop\\module\\pseventbus\\builder\\carrierbuilder' => 'PrestaShop\\Module\\PsEventbus\\Builder\\CarrierBuilder',
            'prestashop\\module\\pseventbus\\decorator\\categorydecorator' => 'PrestaShop\\Module\\PsEventbus\\Decorator\\CategoryDecorator',
            'prestashop\\module\\pseventbus\\decorator\\payloaddecorator' => 'PrestaShop\\Module\\PsEventbus\\Decorator\\PayloadDecorator',
            'prestashop\\module\\pseventbus\\decorator\\productdecorator' => 'PrestaShop\\Module\\PsEventbus\\Decorator\\ProductDecorator',
            'prestashop\\module\\pseventbus\\formatter\\arrayformatter' => 'PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter',
            'prestashop\\module\\pseventbus\\formatter\\dateformatter' => 'PrestaShop\\Module\\PsEventbus\\Formatter\\DateFormatter',
            'prestashop\\module\\pseventbus\\formatter\\jsonformatter' => 'PrestaShop\\Module\\PsEventbus\\Formatter\\JsonFormatter',
            'prestashop\\module\\pseventbus\\provider\\carrierdataprovider' => 'PrestaShop\\Module\\PsEventbus\\Provider\\CarrierDataProvider',
            'prestashop\\module\\pseventbus\\provider\\cartdataprovider' => 'PrestaShop\\Module\\PsEventbus\\Provider\\CartDataProvider',
            'prestashop\\module\\pseventbus\\provider\\categorydataprovider' => 'PrestaShop\\Module\\PsEventbus\\Provider\\CategoryDataProvider',
            'prestashop\\module\\pseventbus\\provider\\googletaxonomydataprovider' => 'PrestaShop\\Module\\PsEventbus\\Provider\\GoogleTaxonomyDataProvider',
            'prestashop\\module\\pseventbus\\provider\\moduledataprovider' => 'PrestaShop\\Module\\PsEventbus\\Provider\\ModuleDataProvider',
            'prestashop\\module\\pseventbus\\provider\\orderdataprovider' => 'PrestaShop\\Module\\PsEventbus\\Provider\\OrderDataProvider',
            'prestashop\\module\\pseventbus\\provider\\productdataprovider' => 'PrestaShop\\Module\\PsEventbus\\Provider\\ProductDataProvider',
            'prestashop\\module\\pseventbus\\repository\\carrierrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\CarrierRepository',
            'prestashop\\module\\pseventbus\\repository\\cartproductrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\CartProductRepository',
            'prestashop\\module\\pseventbus\\repository\\cartrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\CartRepository',
            'prestashop\\module\\pseventbus\\repository\\categoryrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\CategoryRepository',
            'prestashop\\module\\pseventbus\\repository\\configurationrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\ConfigurationRepository',
            'prestashop\\module\\pseventbus\\repository\\countryrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\CountryRepository',
            'prestashop\\module\\pseventbus\\repository\\currencyrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\CurrencyRepository',
            'prestashop\\module\\pseventbus\\repository\\deletedobjectsrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\DeletedObjectsRepository',
            'prestashop\\module\\pseventbus\\repository\\eventbussyncrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\EventbusSyncRepository',
            'prestashop\\module\\pseventbus\\repository\\googletaxonomyrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\GoogleTaxonomyRepository',
            'prestashop\\module\\pseventbus\\repository\\imagerepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\ImageRepository',
            'prestashop\\module\\pseventbus\\repository\\incrementalsyncrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\IncrementalSyncRepository',
            'prestashop\\module\\pseventbus\\repository\\languagerepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\LanguageRepository',
            'prestashop\\module\\pseventbus\\repository\\modulerepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\ModuleRepository',
            'prestashop\\module\\pseventbus\\repository\\orderdetailsrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\OrderDetailsRepository',
            'prestashop\\module\\pseventbus\\repository\\orderrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\OrderRepository',
            'prestashop\\module\\pseventbus\\repository\\productrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\ProductRepository',
            'prestashop\\module\\pseventbus\\repository\\serverinformationrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\ServerInformationRepository',
            'prestashop\\module\\pseventbus\\repository\\shoprepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\ShopRepository',
            'prestashop\\module\\pseventbus\\repository\\staterepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\StateRepository',
            'prestashop\\module\\pseventbus\\repository\\taxrepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\TaxRepository',
            'prestashop\\module\\pseventbus\\repository\\themerepository' => 'PrestaShop\\Module\\PsEventbus\\Repository\\ThemeRepository',
            'prestashop\\module\\pseventbus\\service\\apiauthorizationservice' => 'PrestaShop\\Module\\PsEventbus\\Service\\ApiAuthorizationService',
            'prestashop\\module\\pseventbus\\service\\compressionservice' => 'PrestaShop\\Module\\PsEventbus\\Service\\CompressionService',
            'prestashop\\module\\pseventbus\\service\\deletedobjectsservice' => 'PrestaShop\\Module\\PsEventbus\\Service\\DeletedObjectsService',
            'prestashop\\module\\pseventbus\\service\\proxyservice' => 'PrestaShop\\Module\\PsEventbus\\Service\\ProxyService',
            'prestashop\\module\\pseventbus\\service\\synchronizationservice' => 'PrestaShop\\Module\\PsEventbus\\Service\\SynchronizationService',
            'prestashop\\psaccountsinstaller\\installer\\facade\\psaccounts' => 'PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts',
            'prestashop\\psaccountsinstaller\\installer\\installer' => 'PrestaShop\\PsAccountsInstaller\\Installer\\Installer',
            'ps_metrics.graphql.dataloaders.setproducttouradvanceddone' => 'ps_metrics.graphql.dataloaders.setProductTourAdvancedDone',
            'ps_metrics.graphql.dataloaders.setproducttourfreedone' => 'ps_metrics.graphql.dataloaders.setProductTourFreeDone',
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
            'PrestaShop\\Module\\PsEventbus\\Api\\EventBusProxyClient' => 'getEventBusProxyClientService',
            'PrestaShop\\Module\\PsEventbus\\Api\\EventBusSyncClient' => 'getEventBusSyncClientService',
            'PrestaShop\\Module\\PsEventbus\\Builder\\CarrierBuilder' => 'getCarrierBuilderService',
            'PrestaShop\\Module\\PsEventbus\\Decorator\\CategoryDecorator' => 'getCategoryDecoratorService',
            'PrestaShop\\Module\\PsEventbus\\Decorator\\PayloadDecorator' => 'getPayloadDecoratorService',
            'PrestaShop\\Module\\PsEventbus\\Decorator\\ProductDecorator' => 'getProductDecoratorService',
            'PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter' => 'getArrayFormatterService',
            'PrestaShop\\Module\\PsEventbus\\Formatter\\DateFormatter' => 'getDateFormatterService',
            'PrestaShop\\Module\\PsEventbus\\Formatter\\JsonFormatter' => 'getJsonFormatterService',
            'PrestaShop\\Module\\PsEventbus\\Provider\\CarrierDataProvider' => 'getCarrierDataProviderService',
            'PrestaShop\\Module\\PsEventbus\\Provider\\CartDataProvider' => 'getCartDataProviderService',
            'PrestaShop\\Module\\PsEventbus\\Provider\\CategoryDataProvider' => 'getCategoryDataProviderService',
            'PrestaShop\\Module\\PsEventbus\\Provider\\GoogleTaxonomyDataProvider' => 'getGoogleTaxonomyDataProviderService',
            'PrestaShop\\Module\\PsEventbus\\Provider\\ModuleDataProvider' => 'getModuleDataProviderService',
            'PrestaShop\\Module\\PsEventbus\\Provider\\OrderDataProvider' => 'getOrderDataProviderService',
            'PrestaShop\\Module\\PsEventbus\\Provider\\ProductDataProvider' => 'getProductDataProviderService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\CarrierRepository' => 'getCarrierRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\CartProductRepository' => 'getCartProductRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\CartRepository' => 'getCartRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\CategoryRepository' => 'getCategoryRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\ConfigurationRepository' => 'getConfigurationRepository2Service',
            'PrestaShop\\Module\\PsEventbus\\Repository\\CountryRepository' => 'getCountryRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\CurrencyRepository' => 'getCurrencyRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\DeletedObjectsRepository' => 'getDeletedObjectsRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\EventbusSyncRepository' => 'getEventbusSyncRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\GoogleTaxonomyRepository' => 'getGoogleTaxonomyRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\ImageRepository' => 'getImageRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\IncrementalSyncRepository' => 'getIncrementalSyncRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\LanguageRepository' => 'getLanguageRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\ModuleRepository' => 'getModuleRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\OrderDetailsRepository' => 'getOrderDetailsRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\OrderRepository' => 'getOrderRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\ProductRepository' => 'getProductRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\ServerInformationRepository' => 'getServerInformationRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\ShopRepository' => 'getShopRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\StateRepository' => 'getStateRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\TaxRepository' => 'getTaxRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Repository\\ThemeRepository' => 'getThemeRepositoryService',
            'PrestaShop\\Module\\PsEventbus\\Service\\ApiAuthorizationService' => 'getApiAuthorizationServiceService',
            'PrestaShop\\Module\\PsEventbus\\Service\\CompressionService' => 'getCompressionServiceService',
            'PrestaShop\\Module\\PsEventbus\\Service\\DeletedObjectsService' => 'getDeletedObjectsServiceService',
            'PrestaShop\\Module\\PsEventbus\\Service\\ProxyService' => 'getProxyServiceService',
            'PrestaShop\\Module\\PsEventbus\\Service\\SynchronizationService' => 'getSynchronizationServiceService',
            'PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts' => 'getPsAccountsService',
            'PrestaShop\\PsAccountsInstaller\\Installer\\Installer' => 'getInstaller2Service',
            'annotation_reader' => 'getAnnotationReaderService',
            'cache.doctrine.orm.default.result' => 'getCache_Doctrine_Orm_Default_ResultService',
            'context.static' => 'getContext_StaticService',
            'doctrine' => 'getDoctrineService',
            'doctrine.cache_clear_metadata_command' => 'getDoctrine_CacheClearMetadataCommandService',
            'doctrine.cache_clear_query_cache_command' => 'getDoctrine_CacheClearQueryCacheCommandService',
            'doctrine.cache_clear_result_command' => 'getDoctrine_CacheClearResultCommandService',
            'doctrine.cache_collection_region_command' => 'getDoctrine_CacheCollectionRegionCommandService',
            'doctrine.clear_entity_region_command' => 'getDoctrine_ClearEntityRegionCommandService',
            'doctrine.clear_query_region_command' => 'getDoctrine_ClearQueryRegionCommandService',
            'doctrine.database_create_command' => 'getDoctrine_DatabaseCreateCommandService',
            'doctrine.database_drop_command' => 'getDoctrine_DatabaseDropCommandService',
            'doctrine.database_import_command' => 'getDoctrine_DatabaseImportCommandService',
            'doctrine.dbal.connection_factory' => 'getDoctrine_Dbal_ConnectionFactoryService',
            'doctrine.dbal.default_connection' => 'getDoctrine_Dbal_DefaultConnectionService',
            'doctrine.ensure_production_settings_command' => 'getDoctrine_EnsureProductionSettingsCommandService',
            'doctrine.generate_entities_command' => 'getDoctrine_GenerateEntitiesCommandService',
            'doctrine.mapping_convert_command' => 'getDoctrine_MappingConvertCommandService',
            'doctrine.mapping_import_command' => 'getDoctrine_MappingImportCommandService',
            'doctrine.mapping_info_command' => 'getDoctrine_MappingInfoCommandService',
            'doctrine.orm.cache.provider.cache.doctrine.orm.default.result' => 'getDoctrine_Orm_Cache_Provider_Cache_Doctrine_Orm_Default_ResultService',
            'doctrine.orm.default_entity_listener_resolver' => 'getDoctrine_Orm_DefaultEntityListenerResolverService',
            'doctrine.orm.default_entity_manager' => 'getDoctrine_Orm_DefaultEntityManagerService',
            'doctrine.orm.default_entity_manager.property_info_extractor' => 'getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService',
            'doctrine.orm.default_listeners.attach_entity_listeners' => 'getDoctrine_Orm_DefaultListeners_AttachEntityListenersService',
            'doctrine.orm.default_manager_configurator' => 'getDoctrine_Orm_DefaultManagerConfiguratorService',
            'doctrine.orm.validator.unique' => 'getDoctrine_Orm_Validator_UniqueService',
            'doctrine.orm.validator_initializer' => 'getDoctrine_Orm_ValidatorInitializerService',
            'doctrine.query_dql_command' => 'getDoctrine_QueryDqlCommandService',
            'doctrine.query_sql_command' => 'getDoctrine_QuerySqlCommandService',
            'doctrine.schema_create_command' => 'getDoctrine_SchemaCreateCommandService',
            'doctrine.schema_drop_command' => 'getDoctrine_SchemaDropCommandService',
            'doctrine.schema_update_command' => 'getDoctrine_SchemaUpdateCommandService',
            'doctrine.schema_validate_command' => 'getDoctrine_SchemaValidateCommandService',
            'doctrine_cache.contains_command' => 'getDoctrineCache_ContainsCommandService',
            'doctrine_cache.delete_command' => 'getDoctrineCache_DeleteCommandService',
            'doctrine_cache.flush_command' => 'getDoctrineCache_FlushCommandService',
            'doctrine_cache.providers.doctrine.orm.default_metadata_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService',
            'doctrine_cache.providers.doctrine.orm.default_query_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService',
            'doctrine_cache.stats_command' => 'getDoctrineCache_StatsCommandService',
            'filesystem' => 'getFilesystemService',
            'finder' => 'getFinderService',
            'form.type.entity' => 'getForm_Type_EntityService',
            'form.type_guesser.doctrine' => 'getForm_TypeGuesser_DoctrineService',
            'hashing' => 'getHashingService',
            'hook_configurator' => 'getHookConfiguratorService',
            'hook_provider' => 'getHookProviderService',
            'hook_repository' => 'getHookRepositoryService',
            'prestashop.adapter.context_state_manager' => 'getPrestashop_Adapter_ContextStateManagerService',
            'prestashop.adapter.data_provider.country' => 'getPrestashop_Adapter_DataProvider_CountryService',
            'prestashop.adapter.data_provider.currency' => 'getPrestashop_Adapter_DataProvider_CurrencyService',
            'prestashop.adapter.environment' => 'getPrestashop_Adapter_EnvironmentService',
            'prestashop.adapter.legacy.configuration' => 'getPrestashop_Adapter_Legacy_ConfigurationService',
            'prestashop.adapter.legacy.context' => 'getPrestashop_Adapter_Legacy_ContextService',
            'prestashop.adapter.news.circuit_breaker' => 'getPrestashop_Adapter_News_CircuitBreakerService',
            'prestashop.adapter.news.circuit_breaker.settings' => 'getPrestashop_Adapter_News_CircuitBreaker_SettingsService',
            'prestashop.adapter.news.provider' => 'getPrestashop_Adapter_News_ProviderService',
            'prestashop.adapter.tools' => 'getPrestashop_Adapter_ToolsService',
            'prestashop.adapter.validate' => 'getPrestashop_Adapter_ValidateService',
            'prestashop.core.circuit_breaker.advanced_factory' => 'getPrestashop_Core_CircuitBreaker_AdvancedFactoryService',
            'prestashop.core.circuit_breaker.doctrine_cache' => 'getPrestashop_Core_CircuitBreaker_DoctrineCacheService',
            'prestashop.core.circuit_breaker.guzzle.cache_storage' => 'getPrestashop_Core_CircuitBreaker_Guzzle_CacheStorageService',
            'prestashop.core.circuit_breaker.guzzle.cache_subscriber' => 'getPrestashop_Core_CircuitBreaker_Guzzle_CacheSubscriberService',
            'prestashop.core.circuit_breaker.guzzle.cache_subscriber_factory' => 'getPrestashop_Core_CircuitBreaker_Guzzle_CacheSubscriberFactoryService',
            'prestashop.core.circuit_breaker.storage' => 'getPrestashop_Core_CircuitBreaker_StorageService',
            'prestashop.core.localization.cache.adapter' => 'getPrestashop_Core_Localization_Cache_AdapterService',
            'prestashop.core.localization.cldr.cache.adapter' => 'getPrestashop_Core_Localization_Cldr_Cache_AdapterService',
            'prestashop.core.localization.cldr.datalayer.locale_cache' => 'getPrestashop_Core_Localization_Cldr_Datalayer_LocaleCacheService',
            'prestashop.core.localization.cldr.datalayer.locale_reference' => 'getPrestashop_Core_Localization_Cldr_Datalayer_LocaleReferenceService',
            'prestashop.core.localization.cldr.locale_data_source' => 'getPrestashop_Core_Localization_Cldr_LocaleDataSourceService',
            'prestashop.core.localization.cldr.locale_repository' => 'getPrestashop_Core_Localization_Cldr_LocaleRepositoryService',
            'prestashop.core.localization.cldr.reader' => 'getPrestashop_Core_Localization_Cldr_ReaderService',
            'prestashop.core.localization.currency.datasource' => 'getPrestashop_Core_Localization_Currency_DatasourceService',
            'prestashop.core.localization.currency.middleware.cache' => 'getPrestashop_Core_Localization_Currency_Middleware_CacheService',
            'prestashop.core.localization.currency.middleware.database' => 'getPrestashop_Core_Localization_Currency_Middleware_DatabaseService',
            'prestashop.core.localization.currency.middleware.installed' => 'getPrestashop_Core_Localization_Currency_Middleware_InstalledService',
            'prestashop.core.localization.currency.middleware.reference' => 'getPrestashop_Core_Localization_Currency_Middleware_ReferenceService',
            'prestashop.core.localization.currency.repository' => 'getPrestashop_Core_Localization_Currency_RepositoryService',
            'prestashop.core.localization.locale.context_locale' => 'getPrestashop_Core_Localization_Locale_ContextLocaleService',
            'prestashop.core.localization.locale.repository' => 'getPrestashop_Core_Localization_Locale_RepositoryService',
            'prestashop.core.string.character_cleaner' => 'getPrestashop_Core_String_CharacterCleanerService',
            'prestashop.database.naming_strategy' => 'getPrestashop_Database_NamingStrategyService',
            'product_comment_criterion_repository' => 'getProductCommentCriterionRepositoryService',
            'product_comment_repository' => 'getProductCommentRepositoryService',
            'ps_accounts.context' => 'getPsAccounts_ContextService',
            'ps_accounts.facade' => 'getPsAccounts_FacadeService',
            'ps_accounts.installer' => 'getPsAccounts_InstallerService',
            'ps_accounts.module' => 'getPsAccounts_ModuleService',
            'ps_eventbus' => 'getPsEventbusService',
            'ps_eventbus.context' => 'getPsEventbus_ContextService',
            'ps_eventbus.controller' => 'getPsEventbus_ControllerService',
            'ps_eventbus.cookie' => 'getPsEventbus_CookieService',
            'ps_eventbus.currency' => 'getPsEventbus_CurrencyService',
            'ps_eventbus.db' => 'getPsEventbus_DbService',
            'ps_eventbus.language' => 'getPsEventbus_LanguageService',
            'ps_eventbus.link' => 'getPsEventbus_LinkService',
            'ps_eventbus.shop' => 'getPsEventbus_ShopService',
            'ps_eventbus.smarty' => 'getPsEventbus_SmartyService',
            'ps_metrics.adapter.link' => 'getPsMetrics_Adapter_LinkService',
            'ps_metrics.api.analytics' => 'getPsMetrics_Api_AnalyticsService',
            'ps_metrics.api.client.analytics' => 'getPsMetrics_Api_Client_AnalyticsService',
            'ps_metrics.api.client.factory' => 'getPsMetrics_Api_Client_FactoryService',
            'ps_metrics.api.client.http' => 'getPsMetrics_Api_Client_HttpService',
            'ps_metrics.api.http' => 'getPsMetrics_Api_HttpService',
            'ps_metrics.api.manager' => 'getPsMetrics_Api_ManagerService',
            'ps_metrics.cache.data' => 'getPsMetrics_Cache_DataService',
            'ps_metrics.cache.specificdirectory' => 'getPsMetrics_Cache_SpecificdirectoryService',
            'ps_metrics.context.prestashop' => 'getPsMetrics_Context_PrestashopService',
            'ps_metrics.data.tipscards' => 'getPsMetrics_Data_TipscardsService',
            'ps_metrics.env.analytics' => 'getPsMetrics_Env_AnalyticsService',
            'ps_metrics.env.cache' => 'getPsMetrics_Env_CacheService',
            'ps_metrics.env.segment' => 'getPsMetrics_Env_SegmentService',
            'ps_metrics.graphql.dataloaders' => 'getPsMetrics_Graphql_DataloadersService',
            'ps_metrics.graphql.dataloaders.avgsessions' => 'getPsMetrics_Graphql_Dataloaders_AvgsessionsService',
            'ps_metrics.graphql.dataloaders.bouncerate' => 'getPsMetrics_Graphql_Dataloaders_BouncerateService',
            'ps_metrics.graphql.dataloaders.cartabandonedaverage' => 'getPsMetrics_Graphql_Dataloaders_CartabandonedaverageService',
            'ps_metrics.graphql.dataloaders.conversionrate' => 'getPsMetrics_Graphql_Dataloaders_ConversionrateService',
            'ps_metrics.graphql.dataloaders.factory' => 'getPsMetrics_Graphql_Dataloaders_FactoryService',
            'ps_metrics.graphql.dataloaders.orderaverage' => 'getPsMetrics_Graphql_Dataloaders_OrderaverageService',
            'ps_metrics.graphql.dataloaders.orderaveragegroupbydate' => 'getPsMetrics_Graphql_Dataloaders_OrderaveragegroupbydateService',
            'ps_metrics.graphql.dataloaders.ordergroupbycustomer' => 'getPsMetrics_Graphql_Dataloaders_OrdergroupbycustomerService',
            'ps_metrics.graphql.dataloaders.ordersum' => 'getPsMetrics_Graphql_Dataloaders_OrdersumService',
            'ps_metrics.graphql.dataloaders.ordersumgroupbydate' => 'getPsMetrics_Graphql_Dataloaders_OrdersumgroupbydateService',
            'ps_metrics.graphql.dataloaders.ordersumgroupbysource' => 'getPsMetrics_Graphql_Dataloaders_OrdersumgroupbysourceService',
            'ps_metrics.graphql.dataloaders.producttopseller' => 'getPsMetrics_Graphql_Dataloaders_ProducttopsellerService',
            'ps_metrics.graphql.dataloaders.revenuegross' => 'getPsMetrics_Graphql_Dataloaders_RevenuegrossService',
            'ps_metrics.graphql.dataloaders.revenuegrossgroupbycategories' => 'getPsMetrics_Graphql_Dataloaders_RevenuegrossgroupbycategoriesService',
            'ps_metrics.graphql.dataloaders.revenuegrossgroupbydate' => 'getPsMetrics_Graphql_Dataloaders_RevenuegrossgroupbydateService',
            'ps_metrics.graphql.dataloaders.revenuegrossgroupbydistribution' => 'getPsMetrics_Graphql_Dataloaders_RevenuegrossgroupbydistributionService',
            'ps_metrics.graphql.dataloaders.sessions' => 'getPsMetrics_Graphql_Dataloaders_SessionsService',
            'ps_metrics.graphql.dataloaders.sessionsgroupbycategory' => 'getPsMetrics_Graphql_Dataloaders_SessionsgroupbycategoryService',
            'ps_metrics.graphql.dataloaders.sessionsgroupbydate' => 'getPsMetrics_Graphql_Dataloaders_SessionsgroupbydateService',
            'ps_metrics.graphql.dataloaders.sessionsgroupbyhour' => 'getPsMetrics_Graphql_Dataloaders_SessionsgroupbyhourService',
            'ps_metrics.graphql.dataloaders.setProductTourAdvancedDone' => 'getPsMetrics_Graphql_Dataloaders_SetProductTourAdvancedDoneService',
            'ps_metrics.graphql.dataloaders.setProductTourFreeDone' => 'getPsMetrics_Graphql_Dataloaders_SetProductTourFreeDoneService',
            'ps_metrics.graphql.dataloaders.tipscards' => 'getPsMetrics_Graphql_Dataloaders_TipscardsService',
            'ps_metrics.graphql.dataloaders.uniqueusers' => 'getPsMetrics_Graphql_Dataloaders_UniqueusersService',
            'ps_metrics.handler.guzzleapi' => 'getPsMetrics_Handler_GuzzleapiService',
            'ps_metrics.helper.api' => 'getPsMetrics_Helper_ApiService',
            'ps_metrics.helper.data' => 'getPsMetrics_Helper_DataService',
            'ps_metrics.helper.db' => 'getPsMetrics_Helper_DbService',
            'ps_metrics.helper.json' => 'getPsMetrics_Helper_JsonService',
            'ps_metrics.helper.logger' => 'getPsMetrics_Helper_LoggerService',
            'ps_metrics.helper.module' => 'getPsMetrics_Helper_ModuleService',
            'ps_metrics.helper.number' => 'getPsMetrics_Helper_NumberService',
            'ps_metrics.helper.segment' => 'getPsMetrics_Helper_SegmentService',
            'ps_metrics.helper.shop' => 'getPsMetrics_Helper_ShopService',
            'ps_metrics.helper.tools' => 'getPsMetrics_Helper_ToolsService',
            'ps_metrics.kpi.configuration' => 'getPsMetrics_Kpi_ConfigurationService',
            'ps_metrics.kpi.conversion' => 'getPsMetrics_Kpi_ConversionService',
            'ps_metrics.kpi.kpi' => 'getPsMetrics_Kpi_KpiService',
            'ps_metrics.kpi.manager' => 'getPsMetrics_Kpi_ManagerService',
            'ps_metrics.kpi.orders' => 'getPsMetrics_Kpi_OrdersService',
            'ps_metrics.kpi.revenues' => 'getPsMetrics_Kpi_RevenuesService',
            'ps_metrics.kpi.strategyinterface' => 'getPsMetrics_Kpi_StrategyinterfaceService',
            'ps_metrics.kpi.total' => 'getPsMetrics_Kpi_TotalService',
            'ps_metrics.kpi.visits' => 'getPsMetrics_Kpi_VisitsService',
            'ps_metrics.middleware' => 'getPsMetrics_MiddlewareService',
            'ps_metrics.middleware.log' => 'getPsMetrics_Middleware_LogService',
            'ps_metrics.middleware.response' => 'getPsMetrics_Middleware_ResponseService',
            'ps_metrics.middleware.response.default' => 'getPsMetrics_Middleware_Response_DefaultService',
            'ps_metrics.middleware.sentry' => 'getPsMetrics_Middleware_SentryService',
            'ps_metrics.module' => 'getPsMetrics_ModuleService',
            'ps_metrics.module.dashboard.modules' => 'getPsMetrics_Module_Dashboard_ModulesService',
            'ps_metrics.module.gainstaller' => 'getPsMetrics_Module_GainstallerService',
            'ps_metrics.module.install' => 'getPsMetrics_Module_InstallService',
            'ps_metrics.module.uninstall' => 'getPsMetrics_Module_UninstallService',
            'ps_metrics.presenter.store.context' => 'getPsMetrics_Presenter_Store_ContextService',
            'ps_metrics.presenter.store.dashboard' => 'getPsMetrics_Presenter_Store_DashboardService',
            'ps_metrics.presenter.store.settings' => 'getPsMetrics_Presenter_Store_SettingsService',
            'ps_metrics.presenter.store.store' => 'getPsMetrics_Presenter_Store_StoreService',
            'ps_metrics.provider.analyticsaccountslist' => 'getPsMetrics_Provider_AnalyticsaccountslistService',
            'ps_metrics.provider.googletag' => 'getPsMetrics_Provider_GoogletagService',
            'ps_metrics.provider.shops' => 'getPsMetrics_Provider_ShopsService',
            'ps_metrics.repository.configuration' => 'getPsMetrics_Repository_ConfigurationService',
            'ps_metrics.repository.hookmodule' => 'getPsMetrics_Repository_HookmoduleService',
            'ps_metrics.repository.orders' => 'getPsMetrics_Repository_OrdersService',
            'ps_metrics.repository.payment' => 'getPsMetrics_Repository_PaymentService',
            'ps_metrics.tracker.segment' => 'getPsMetrics_Tracker_SegmentService',
            'ps_metrics.translation.dashboard' => 'getPsMetrics_Translation_DashboardService',
            'ps_metrics.translation.settings' => 'getPsMetrics_Translation_SettingsService',
            'ps_metrics.validation.processselectaccountanalytics' => 'getPsMetrics_Validation_ProcessselectaccountanalyticsService',
            'ps_metrics.validation.retrievedata' => 'getPsMetrics_Validation_RetrievedataService',
            'theme_manager' => 'getThemeManagerService',
            'theme_validator' => 'getThemeValidatorService',
        ];
        $this->privates = [
            'PrestaShop\\Module\\PsEventbus\\Api\\EventBusProxyClient' => true,
            'PrestaShop\\Module\\PsEventbus\\Api\\EventBusSyncClient' => true,
            'PrestaShop\\Module\\PsEventbus\\Builder\\CarrierBuilder' => true,
            'PrestaShop\\Module\\PsEventbus\\Decorator\\CategoryDecorator' => true,
            'PrestaShop\\Module\\PsEventbus\\Decorator\\PayloadDecorator' => true,
            'PrestaShop\\Module\\PsEventbus\\Decorator\\ProductDecorator' => true,
            'PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter' => true,
            'PrestaShop\\Module\\PsEventbus\\Formatter\\DateFormatter' => true,
            'PrestaShop\\Module\\PsEventbus\\Formatter\\JsonFormatter' => true,
            'PrestaShop\\Module\\PsEventbus\\Provider\\CarrierDataProvider' => true,
            'PrestaShop\\Module\\PsEventbus\\Provider\\CartDataProvider' => true,
            'PrestaShop\\Module\\PsEventbus\\Provider\\CategoryDataProvider' => true,
            'PrestaShop\\Module\\PsEventbus\\Provider\\GoogleTaxonomyDataProvider' => true,
            'PrestaShop\\Module\\PsEventbus\\Provider\\ModuleDataProvider' => true,
            'PrestaShop\\Module\\PsEventbus\\Provider\\OrderDataProvider' => true,
            'PrestaShop\\Module\\PsEventbus\\Provider\\ProductDataProvider' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\CarrierRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\CartProductRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\CartRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\CategoryRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\ConfigurationRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\CountryRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\CurrencyRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\DeletedObjectsRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\EventbusSyncRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\GoogleTaxonomyRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\ImageRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\IncrementalSyncRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\LanguageRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\ModuleRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\OrderDetailsRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\OrderRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\ProductRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\ServerInformationRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\ShopRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\StateRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\TaxRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\ThemeRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Service\\ApiAuthorizationService' => true,
            'PrestaShop\\Module\\PsEventbus\\Service\\CompressionService' => true,
            'PrestaShop\\Module\\PsEventbus\\Service\\DeletedObjectsService' => true,
            'PrestaShop\\Module\\PsEventbus\\Service\\ProxyService' => true,
            'PrestaShop\\Module\\PsEventbus\\Service\\SynchronizationService' => true,
            'PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts' => true,
            'PrestaShop\\PsAccountsInstaller\\Installer\\Installer' => true,
            'annotation_reader' => true,
            'cache.doctrine.orm.default.result' => true,
            'context.static' => true,
            'doctrine.cache_clear_metadata_command' => true,
            'doctrine.cache_clear_query_cache_command' => true,
            'doctrine.cache_clear_result_command' => true,
            'doctrine.cache_collection_region_command' => true,
            'doctrine.clear_entity_region_command' => true,
            'doctrine.clear_query_region_command' => true,
            'doctrine.database_create_command' => true,
            'doctrine.database_drop_command' => true,
            'doctrine.database_import_command' => true,
            'doctrine.dbal.connection_factory' => true,
            'doctrine.ensure_production_settings_command' => true,
            'doctrine.generate_entities_command' => true,
            'doctrine.mapping_convert_command' => true,
            'doctrine.mapping_import_command' => true,
            'doctrine.mapping_info_command' => true,
            'doctrine.orm.cache.provider.cache.doctrine.orm.default.result' => true,
            'doctrine.orm.default_entity_listener_resolver' => true,
            'doctrine.orm.default_entity_manager.property_info_extractor' => true,
            'doctrine.orm.default_listeners.attach_entity_listeners' => true,
            'doctrine.orm.default_manager_configurator' => true,
            'doctrine.orm.validator.unique' => true,
            'doctrine.orm.validator_initializer' => true,
            'doctrine.query_dql_command' => true,
            'doctrine.query_sql_command' => true,
            'doctrine.schema_create_command' => true,
            'doctrine.schema_drop_command' => true,
            'doctrine.schema_update_command' => true,
            'doctrine.schema_validate_command' => true,
            'doctrine_cache.contains_command' => true,
            'doctrine_cache.delete_command' => true,
            'doctrine_cache.flush_command' => true,
            'doctrine_cache.stats_command' => true,
            'filesystem' => true,
            'finder' => true,
            'form.type.entity' => true,
            'form.type_guesser.doctrine' => true,
            'hashing' => true,
            'hook_configurator' => true,
            'hook_provider' => true,
            'hook_repository' => true,
            'prestashop.database.naming_strategy' => true,
            'ps_eventbus' => true,
            'ps_eventbus.context' => true,
            'ps_eventbus.controller' => true,
            'ps_eventbus.cookie' => true,
            'ps_eventbus.currency' => true,
            'ps_eventbus.db' => true,
            'ps_eventbus.language' => true,
            'ps_eventbus.link' => true,
            'ps_eventbus.shop' => true,
            'ps_eventbus.smarty' => true,
            'ps_metrics.module' => true,
            'theme_manager' => true,
            'theme_validator' => true,
        ];
        $this->aliases = [
            'database_connection' => 'doctrine.dbal.default_connection',
            'doctrine.orm.default_metadata_cache' => 'doctrine_cache.providers.doctrine.orm.default_metadata_cache',
            'doctrine.orm.default_query_cache' => 'doctrine_cache.providers.doctrine.orm.default_query_cache',
            'doctrine.orm.entity_manager' => 'doctrine.orm.default_entity_manager',
            'prestashop.core.localization.cldr.datalayer.top_layer' => 'prestashop.core.localization.cldr.datalayer.locale_cache',
            'prestashop.core.localization.currency.middleware.top_layer' => 'prestashop.core.localization.currency.middleware.cache',
        ];
    }

    public function getRemovedIds()
    {
        return [
            'Doctrine\\Bundle\\DoctrineBundle\\Registry' => true,
            'Doctrine\\Common\\Persistence\\ManagerRegistry' => true,
            'Doctrine\\Common\\Persistence\\ObjectManager' => true,
            'Doctrine\\DBAL\\Connection' => true,
            'Doctrine\\DBAL\\Driver\\Connection' => true,
            'Doctrine\\ORM\\EntityManagerInterface' => true,
            'Doctrine\\Persistence\\ManagerRegistry' => true,
            'PrestaShop\\Module\\PsEventbus\\Api\\EventBusProxyClient' => true,
            'PrestaShop\\Module\\PsEventbus\\Api\\EventBusSyncClient' => true,
            'PrestaShop\\Module\\PsEventbus\\Builder\\CarrierBuilder' => true,
            'PrestaShop\\Module\\PsEventbus\\Decorator\\CategoryDecorator' => true,
            'PrestaShop\\Module\\PsEventbus\\Decorator\\PayloadDecorator' => true,
            'PrestaShop\\Module\\PsEventbus\\Decorator\\ProductDecorator' => true,
            'PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter' => true,
            'PrestaShop\\Module\\PsEventbus\\Formatter\\DateFormatter' => true,
            'PrestaShop\\Module\\PsEventbus\\Formatter\\JsonFormatter' => true,
            'PrestaShop\\Module\\PsEventbus\\Provider\\CarrierDataProvider' => true,
            'PrestaShop\\Module\\PsEventbus\\Provider\\CartDataProvider' => true,
            'PrestaShop\\Module\\PsEventbus\\Provider\\CategoryDataProvider' => true,
            'PrestaShop\\Module\\PsEventbus\\Provider\\GoogleTaxonomyDataProvider' => true,
            'PrestaShop\\Module\\PsEventbus\\Provider\\ModuleDataProvider' => true,
            'PrestaShop\\Module\\PsEventbus\\Provider\\OrderDataProvider' => true,
            'PrestaShop\\Module\\PsEventbus\\Provider\\ProductDataProvider' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\CarrierRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\CartProductRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\CartRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\CategoryRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\ConfigurationRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\CountryRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\CurrencyRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\DeletedObjectsRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\EventbusSyncRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\GoogleTaxonomyRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\ImageRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\IncrementalSyncRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\LanguageRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\ModuleRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\OrderDetailsRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\OrderRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\ProductRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\ServerInformationRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\ShopRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\StateRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\TaxRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Repository\\ThemeRepository' => true,
            'PrestaShop\\Module\\PsEventbus\\Service\\ApiAuthorizationService' => true,
            'PrestaShop\\Module\\PsEventbus\\Service\\CompressionService' => true,
            'PrestaShop\\Module\\PsEventbus\\Service\\DeletedObjectsService' => true,
            'PrestaShop\\Module\\PsEventbus\\Service\\ProxyService' => true,
            'PrestaShop\\Module\\PsEventbus\\Service\\SynchronizationService' => true,
            'PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts' => true,
            'PrestaShop\\PsAccountsInstaller\\Installer\\Installer' => true,
            'Psr\\Container\\ContainerInterface' => true,
            'Symfony\\Bridge\\Doctrine\\RegistryInterface' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
            'annotation_reader' => true,
            'cache.doctrine.orm.default.result' => true,
            'context.static' => true,
            'data_collector.doctrine' => true,
            'doctrine.cache_clear_metadata_command' => true,
            'doctrine.cache_clear_query_cache_command' => true,
            'doctrine.cache_clear_result_command' => true,
            'doctrine.cache_collection_region_command' => true,
            'doctrine.clear_entity_region_command' => true,
            'doctrine.clear_query_region_command' => true,
            'doctrine.database_create_command' => true,
            'doctrine.database_drop_command' => true,
            'doctrine.database_import_command' => true,
            'doctrine.dbal.connection' => true,
            'doctrine.dbal.connection.configuration' => true,
            'doctrine.dbal.connection.event_manager' => true,
            'doctrine.dbal.connection_factory' => true,
            'doctrine.dbal.default_connection.configuration' => true,
            'doctrine.dbal.default_connection.event_manager' => true,
            'doctrine.dbal.event_manager' => true,
            'doctrine.dbal.logger' => true,
            'doctrine.dbal.logger.backtrace' => true,
            'doctrine.dbal.logger.chain' => true,
            'doctrine.dbal.logger.profiling' => true,
            'doctrine.dbal.schema_asset_filter_manager' => true,
            'doctrine.dbal.well_known_schema_asset_filter' => true,
            'doctrine.ensure_production_settings_command' => true,
            'doctrine.generate_entities_command' => true,
            'doctrine.mapping_convert_command' => true,
            'doctrine.mapping_import_command' => true,
            'doctrine.mapping_info_command' => true,
            'doctrine.orm.cache.provider.cache.doctrine.orm.default.result' => true,
            'doctrine.orm.configuration' => true,
            'doctrine.orm.container_repository_factory' => true,
            'doctrine.orm.default_annotation_metadata_driver' => true,
            'doctrine.orm.default_configuration' => true,
            'doctrine.orm.default_entity_listener_resolver' => true,
            'doctrine.orm.default_entity_manager.event_manager' => true,
            'doctrine.orm.default_entity_manager.metadata_factory' => true,
            'doctrine.orm.default_entity_manager.property_info_extractor' => true,
            'doctrine.orm.default_listeners.attach_entity_listeners' => true,
            'doctrine.orm.default_manager_configurator' => true,
            'doctrine.orm.default_metadata_driver' => true,
            'doctrine.orm.default_result_cache' => true,
            'doctrine.orm.entity_manager.abstract' => true,
            'doctrine.orm.listeners.resolve_target_entity' => true,
            'doctrine.orm.manager_configurator.abstract' => true,
            'doctrine.orm.metadata.annotation_reader' => true,
            'doctrine.orm.naming_strategy.default' => true,
            'doctrine.orm.naming_strategy.underscore' => true,
            'doctrine.orm.naming_strategy.underscore_number_aware' => true,
            'doctrine.orm.proxy_cache_warmer' => true,
            'doctrine.orm.quote_strategy.ansi' => true,
            'doctrine.orm.quote_strategy.default' => true,
            'doctrine.orm.security.user.provider' => true,
            'doctrine.orm.validator.unique' => true,
            'doctrine.orm.validator_initializer' => true,
            'doctrine.query_dql_command' => true,
            'doctrine.query_sql_command' => true,
            'doctrine.schema_create_command' => true,
            'doctrine.schema_drop_command' => true,
            'doctrine.schema_update_command' => true,
            'doctrine.schema_validate_command' => true,
            'doctrine.twig.doctrine_extension' => true,
            'doctrine_cache.abstract.apc' => true,
            'doctrine_cache.abstract.apcu' => true,
            'doctrine_cache.abstract.array' => true,
            'doctrine_cache.abstract.chain' => true,
            'doctrine_cache.abstract.couchbase' => true,
            'doctrine_cache.abstract.file_system' => true,
            'doctrine_cache.abstract.memcache' => true,
            'doctrine_cache.abstract.memcached' => true,
            'doctrine_cache.abstract.mongodb' => true,
            'doctrine_cache.abstract.php_file' => true,
            'doctrine_cache.abstract.predis' => true,
            'doctrine_cache.abstract.redis' => true,
            'doctrine_cache.abstract.riak' => true,
            'doctrine_cache.abstract.sqlite3' => true,
            'doctrine_cache.abstract.void' => true,
            'doctrine_cache.abstract.wincache' => true,
            'doctrine_cache.abstract.xcache' => true,
            'doctrine_cache.abstract.zenddata' => true,
            'doctrine_cache.contains_command' => true,
            'doctrine_cache.delete_command' => true,
            'doctrine_cache.flush_command' => true,
            'doctrine_cache.stats_command' => true,
            'filesystem' => true,
            'finder' => true,
            'form.type.entity' => true,
            'form.type_guesser.doctrine' => true,
            'hashing' => true,
            'hook_configurator' => true,
            'hook_provider' => true,
            'hook_repository' => true,
            'prestashop.database.naming_strategy' => true,
            'ps_eventbus' => true,
            'ps_eventbus.context' => true,
            'ps_eventbus.controller' => true,
            'ps_eventbus.cookie' => true,
            'ps_eventbus.currency' => true,
            'ps_eventbus.db' => true,
            'ps_eventbus.language' => true,
            'ps_eventbus.link' => true,
            'ps_eventbus.shop' => true,
            'ps_eventbus.smarty' => true,
            'ps_metrics.module' => true,
            'theme_manager' => true,
            'theme_validator' => true,
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
     * Gets the public 'doctrine' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected function getDoctrineService()
    {
        return $this->services['doctrine'] = new \Doctrine\Bundle\DoctrineBundle\Registry($this, $this->parameters['doctrine.connections'], $this->parameters['doctrine.entity_managers'], 'default', 'default');
    }

    /**
     * Gets the public 'doctrine.dbal.default_connection' shared service.
     *
     * @return \Doctrine\DBAL\Connection
     */
    protected function getDoctrine_Dbal_DefaultConnectionService()
    {
        return $this->services['doctrine.dbal.default_connection'] = ${($_ = isset($this->services['doctrine.dbal.connection_factory']) ? $this->services['doctrine.dbal.connection_factory'] : ($this->services['doctrine.dbal.connection_factory'] = new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory([]))) && false ?: '_'}->createConnection(['driver' => 'pdo_mysql', 'host' => '127.0.0.1', 'port' => '', 'dbname' => 'prestashop_AMD_gaming', 'user' => 'amd_gaming', 'password' => 'OG qJT"qu', 'charset' => 'utf8mb4', 'driverOptions' => [1002 => 'SET sql_mode=(SELECT REPLACE(@@sql_mode,\'ONLY_FULL_GROUP_BY\',\'\'))'], 'defaultTableOptions' => []], new \Doctrine\DBAL\Configuration(), new \Symfony\Bridge\Doctrine\ContainerAwareEventManager($this), ['enum' => 'string']);
    }

    /**
     * Gets the public 'doctrine.orm.default_entity_manager' shared service.
     *
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getDoctrine_Orm_DefaultEntityManagerService($lazyLoad = true)
    {
        $a = new \Doctrine\ORM\Configuration();

        $b = new \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain();

        $c = ${($_ = isset($this->services['annotation_reader']) ? $this->services['annotation_reader'] : ($this->services['annotation_reader'] = new \Doctrine\Common\Annotations\AnnotationReader())) && false ?: '_'};
        $d = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($c, [0 => '/home/povilasbrilius/.atom-projects/prestashop-gaming/modules/productcomments/src/Entity']);
        $d->addExcludePaths([0 => '/home/povilasbrilius/.atom-projects/prestashop-gaming/modules/productcomments/src/Entity/index.php']);

        $b->addDriver(new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($c, [0 => '/home/povilasbrilius/.atom-projects/prestashop-gaming/src/PrestaShopBundle/Entity']), 'PrestaShop');
        $b->addDriver($d, 'PrestaShop\\Module\\ProductComment\\Entity');

        $a->setEntityNamespaces(['PrestaShopBundle\\Entity' => 'PrestaShop']);
        $a->setMetadataCacheImpl(${($_ = isset($this->services['doctrine_cache.providers.doctrine.orm.default_metadata_cache']) ? $this->services['doctrine_cache.providers.doctrine.orm.default_metadata_cache'] : $this->getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService()) && false ?: '_'});
        $a->setQueryCacheImpl(${($_ = isset($this->services['doctrine_cache.providers.doctrine.orm.default_query_cache']) ? $this->services['doctrine_cache.providers.doctrine.orm.default_query_cache'] : $this->getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService()) && false ?: '_'});
        $a->setResultCacheImpl(${($_ = isset($this->services['doctrine.orm.cache.provider.cache.doctrine.orm.default.result']) ? $this->services['doctrine.orm.cache.provider.cache.doctrine.orm.default.result'] : $this->getDoctrine_Orm_Cache_Provider_Cache_Doctrine_Orm_Default_ResultService()) && false ?: '_'});
        $a->setMetadataDriverImpl($b);
        $a->setProxyDir('/home/povilasbrilius/.atom-projects/prestashop-gaming/var/cache/prod//doctrine/orm/Proxies');
        $a->setProxyNamespace('Proxies');
        $a->setAutoGenerateProxyClasses(false);
        $a->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
        $a->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $a->setNamingStrategy(${($_ = isset($this->services['prestashop.database.naming_strategy']) ? $this->services['prestashop.database.naming_strategy'] : ($this->services['prestashop.database.naming_strategy'] = new \PrestaShopBundle\Service\Database\DoctrineNamingStrategy('ps_'))) && false ?: '_'});
        $a->setQuoteStrategy(new \Doctrine\ORM\Mapping\DefaultQuoteStrategy());
        $a->setEntityListenerResolver(${($_ = isset($this->services['doctrine.orm.default_entity_listener_resolver']) ? $this->services['doctrine.orm.default_entity_listener_resolver'] : ($this->services['doctrine.orm.default_entity_listener_resolver'] = new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver($this))) && false ?: '_'});
        $a->setRepositoryFactory(new \Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory(new \Symfony\Component\DependencyInjection\ServiceLocator([])));
        $a->addCustomStringFunction('regexp', 'DoctrineExtensions\\Query\\Mysql\\Regexp');
        $a->addEntityNamespace('Moduleproductcomments', 'PrestaShop\\Module\\ProductComment\\Entity');

        $this->services['doctrine.orm.default_entity_manager'] = $instance = \Doctrine\ORM\EntityManager::create(${($_ = isset($this->services['doctrine.dbal.default_connection']) ? $this->services['doctrine.dbal.default_connection'] : $this->getDoctrine_Dbal_DefaultConnectionService()) && false ?: '_'}, $a);

        ${($_ = isset($this->services['doctrine.orm.default_manager_configurator']) ? $this->services['doctrine.orm.default_manager_configurator'] : ($this->services['doctrine.orm.default_manager_configurator'] = new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator([], []))) && false ?: '_'}->configure($instance);

        return $instance;
    }

    /**
     * Gets the public 'doctrine_cache.providers.doctrine.orm.default_metadata_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.default_metadata_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf_orm_default_e116ea03dce2d2ab65df8b65169319386742b66c34764ebf4527b4e60d05f0e4');

        return $instance;
    }

    /**
     * Gets the public 'doctrine_cache.providers.doctrine.orm.default_query_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.default_query_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf_orm_default_e116ea03dce2d2ab65df8b65169319386742b66c34764ebf4527b4e60d05f0e4');

        return $instance;
    }

    /**
     * Gets the public 'prestashop.adapter.context_state_manager' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\ContextStateManager
     */
    protected function getPrestashop_Adapter_ContextStateManagerService()
    {
        return $this->services['prestashop.adapter.context_state_manager'] = new \PrestaShop\PrestaShop\Adapter\ContextStateManager(${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.adapter.data_provider.country' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Country\CountryDataProvider
     */
    protected function getPrestashop_Adapter_DataProvider_CountryService()
    {
        return $this->services['prestashop.adapter.data_provider.country'] = new \PrestaShop\PrestaShop\Adapter\Country\CountryDataProvider();
    }

    /**
     * Gets the public 'prestashop.adapter.data_provider.currency' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Currency\CurrencyDataProvider
     */
    protected function getPrestashop_Adapter_DataProvider_CurrencyService()
    {
        return $this->services['prestashop.adapter.data_provider.currency'] = new \PrestaShop\PrestaShop\Adapter\Currency\CurrencyDataProvider(${($_ = isset($this->services['prestashop.adapter.legacy.configuration']) ? $this->services['prestashop.adapter.legacy.configuration'] : ($this->services['prestashop.adapter.legacy.configuration'] = new \PrestaShop\PrestaShop\Adapter\Configuration())) && false ?: '_'}, ((${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->shop) ? (${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->shop->id) : (null)));
    }

    /**
     * Gets the public 'prestashop.adapter.environment' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Environment
     */
    protected function getPrestashop_Adapter_EnvironmentService()
    {
        return $this->services['prestashop.adapter.environment'] = new \PrestaShop\PrestaShop\Adapter\Environment(false);
    }

    /**
     * Gets the public 'prestashop.adapter.legacy.configuration' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Configuration
     */
    protected function getPrestashop_Adapter_Legacy_ConfigurationService()
    {
        return $this->services['prestashop.adapter.legacy.configuration'] = new \PrestaShop\PrestaShop\Adapter\Configuration();
    }

    /**
     * Gets the public 'prestashop.adapter.legacy.context' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\LegacyContext
     */
    protected function getPrestashop_Adapter_Legacy_ContextService()
    {
        return $this->services['prestashop.adapter.legacy.context'] = new \PrestaShop\PrestaShop\Adapter\LegacyContext('/mails/themes', ${($_ = isset($this->services['prestashop.adapter.tools']) ? $this->services['prestashop.adapter.tools'] : ($this->services['prestashop.adapter.tools'] = new \PrestaShop\PrestaShop\Adapter\Tools())) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.adapter.news.circuit_breaker' shared service.
     *
     * @return \PrestaShop\CircuitBreaker\Contract\CircuitBreakerInterface
     */
    protected function getPrestashop_Adapter_News_CircuitBreakerService()
    {
        return $this->services['prestashop.adapter.news.circuit_breaker'] = ${($_ = isset($this->services['prestashop.core.circuit_breaker.advanced_factory']) ? $this->services['prestashop.core.circuit_breaker.advanced_factory'] : ($this->services['prestashop.core.circuit_breaker.advanced_factory'] = new \PrestaShop\CircuitBreaker\AdvancedCircuitBreakerFactory())) && false ?: '_'}->create(${($_ = isset($this->services['prestashop.adapter.news.circuit_breaker.settings']) ? $this->services['prestashop.adapter.news.circuit_breaker.settings'] : $this->getPrestashop_Adapter_News_CircuitBreaker_SettingsService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.adapter.news.circuit_breaker.settings' shared service.
     *
     * @return \PrestaShop\CircuitBreaker\FactorySettings
     */
    protected function getPrestashop_Adapter_News_CircuitBreaker_SettingsService()
    {
        $this->services['prestashop.adapter.news.circuit_breaker.settings'] = $instance = new \PrestaShop\CircuitBreaker\FactorySettings(3, 3, 86400);

        $instance->setStrippedFailures(3);
        $instance->setStrippedTimeout(3);
        $instance->setStorage(${($_ = isset($this->services['prestashop.core.circuit_breaker.storage']) ? $this->services['prestashop.core.circuit_breaker.storage'] : $this->getPrestashop_Core_CircuitBreaker_StorageService()) && false ?: '_'});
        $instance->setClientOptions(['method' => 'GET', 'subscribers' => [0 => ${($_ = isset($this->services['prestashop.core.circuit_breaker.guzzle.cache_subscriber']) ? $this->services['prestashop.core.circuit_breaker.guzzle.cache_subscriber'] : $this->getPrestashop_Core_CircuitBreaker_Guzzle_CacheSubscriberService()) && false ?: '_'}]]);

        return $instance;
    }

    /**
     * Gets the public 'prestashop.adapter.news.provider' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\News\NewsDataProvider
     */
    protected function getPrestashop_Adapter_News_ProviderService()
    {
        return $this->services['prestashop.adapter.news.provider'] = new \PrestaShop\PrestaShop\Adapter\News\NewsDataProvider(${($_ = isset($this->services['prestashop.adapter.news.circuit_breaker']) ? $this->services['prestashop.adapter.news.circuit_breaker'] : $this->getPrestashop_Adapter_News_CircuitBreakerService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.data_provider.country']) ? $this->services['prestashop.adapter.data_provider.country'] : ($this->services['prestashop.adapter.data_provider.country'] = new \PrestaShop\PrestaShop\Adapter\Country\CountryDataProvider())) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.tools']) ? $this->services['prestashop.adapter.tools'] : ($this->services['prestashop.adapter.tools'] = new \PrestaShop\PrestaShop\Adapter\Tools())) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.legacy.configuration']) ? $this->services['prestashop.adapter.legacy.configuration'] : ($this->services['prestashop.adapter.legacy.configuration'] = new \PrestaShop\PrestaShop\Adapter\Configuration())) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.validate']) ? $this->services['prestashop.adapter.validate'] : ($this->services['prestashop.adapter.validate'] = new \PrestaShop\PrestaShop\Adapter\Validate())) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->mode);
    }

    /**
     * Gets the public 'prestashop.adapter.tools' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Tools
     */
    protected function getPrestashop_Adapter_ToolsService()
    {
        return $this->services['prestashop.adapter.tools'] = new \PrestaShop\PrestaShop\Adapter\Tools();
    }

    /**
     * Gets the public 'prestashop.adapter.validate' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Validate
     */
    protected function getPrestashop_Adapter_ValidateService()
    {
        return $this->services['prestashop.adapter.validate'] = new \PrestaShop\PrestaShop\Adapter\Validate();
    }

    /**
     * Gets the public 'prestashop.core.circuit_breaker.advanced_factory' shared service.
     *
     * @return \PrestaShop\CircuitBreaker\AdvancedCircuitBreakerFactory
     */
    protected function getPrestashop_Core_CircuitBreaker_AdvancedFactoryService()
    {
        return $this->services['prestashop.core.circuit_breaker.advanced_factory'] = new \PrestaShop\CircuitBreaker\AdvancedCircuitBreakerFactory();
    }

    /**
     * Gets the public 'prestashop.core.circuit_breaker.doctrine_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\FilesystemCache
     */
    protected function getPrestashop_Core_CircuitBreaker_DoctrineCacheService()
    {
        return $this->services['prestashop.core.circuit_breaker.doctrine_cache'] = new \Doctrine\Common\Cache\FilesystemCache((${($_ = isset($this->services['prestashop.adapter.environment']) ? $this->services['prestashop.adapter.environment'] : ($this->services['prestashop.adapter.environment'] = new \PrestaShop\PrestaShop\Adapter\Environment(false))) && false ?: '_'}->getCacheDir() . "/circuit_breaker"));
    }

    /**
     * Gets the public 'prestashop.core.circuit_breaker.guzzle.cache_storage' shared service.
     *
     * @return \GuzzleHttp\Subscriber\Cache\CacheStorage
     */
    protected function getPrestashop_Core_CircuitBreaker_Guzzle_CacheStorageService()
    {
        return $this->services['prestashop.core.circuit_breaker.guzzle.cache_storage'] = new \GuzzleHttp\Subscriber\Cache\CacheStorage(${($_ = isset($this->services['prestashop.core.circuit_breaker.doctrine_cache']) ? $this->services['prestashop.core.circuit_breaker.doctrine_cache'] : $this->getPrestashop_Core_CircuitBreaker_DoctrineCacheService()) && false ?: '_'}, 'circuit_breaker_', 86400);
    }

    /**
     * Gets the public 'prestashop.core.circuit_breaker.guzzle.cache_subscriber' shared service.
     *
     * @return \GuzzleHttp\Subscriber\Cache\CacheSubscriber
     */
    protected function getPrestashop_Core_CircuitBreaker_Guzzle_CacheSubscriberService()
    {
        return $this->services['prestashop.core.circuit_breaker.guzzle.cache_subscriber'] = ${($_ = isset($this->services['prestashop.core.circuit_breaker.guzzle.cache_subscriber_factory']) ? $this->services['prestashop.core.circuit_breaker.guzzle.cache_subscriber_factory'] : ($this->services['prestashop.core.circuit_breaker.guzzle.cache_subscriber_factory'] = new \PrestaShopBundle\Cache\Factory\CacheSubscriberFactory())) && false ?: '_'}->create(${($_ = isset($this->services['prestashop.core.circuit_breaker.guzzle.cache_storage']) ? $this->services['prestashop.core.circuit_breaker.guzzle.cache_storage'] : $this->getPrestashop_Core_CircuitBreaker_Guzzle_CacheStorageService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.core.circuit_breaker.guzzle.cache_subscriber_factory' shared service.
     *
     * @return \PrestaShopBundle\Cache\Factory\CacheSubscriberFactory
     */
    protected function getPrestashop_Core_CircuitBreaker_Guzzle_CacheSubscriberFactoryService()
    {
        return $this->services['prestashop.core.circuit_breaker.guzzle.cache_subscriber_factory'] = new \PrestaShopBundle\Cache\Factory\CacheSubscriberFactory();
    }

    /**
     * Gets the public 'prestashop.core.circuit_breaker.storage' shared service.
     *
     * @return \PrestaShop\CircuitBreaker\Storage\DoctrineCache
     */
    protected function getPrestashop_Core_CircuitBreaker_StorageService()
    {
        return $this->services['prestashop.core.circuit_breaker.storage'] = new \PrestaShop\CircuitBreaker\Storage\DoctrineCache(${($_ = isset($this->services['prestashop.core.circuit_breaker.doctrine_cache']) ? $this->services['prestashop.core.circuit_breaker.doctrine_cache'] : $this->getPrestashop_Core_CircuitBreaker_DoctrineCacheService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.core.localization.cache.adapter' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\ArrayAdapter
     */
    protected function getPrestashop_Core_Localization_Cache_AdapterService()
    {
        return $this->services['prestashop.core.localization.cache.adapter'] = new \Symfony\Component\Cache\Adapter\ArrayAdapter();
    }

    /**
     * Gets the public 'prestashop.core.localization.cldr.cache.adapter' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\FilesystemAdapter
     */
    protected function getPrestashop_Core_Localization_Cldr_Cache_AdapterService()
    {
        return $this->services['prestashop.core.localization.cldr.cache.adapter'] = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('CLDR', 0, '/home/povilasbrilius/.atom-projects/prestashop-gaming/var/cache/prod//localization');
    }

    /**
     * Gets the public 'prestashop.core.localization.cldr.datalayer.locale_cache' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\CLDR\DataLayer\LocaleCache
     */
    protected function getPrestashop_Core_Localization_Cldr_Datalayer_LocaleCacheService()
    {
        $this->services['prestashop.core.localization.cldr.datalayer.locale_cache'] = $instance = new \PrestaShop\PrestaShop\Core\Localization\CLDR\DataLayer\LocaleCache(${($_ = isset($this->services['prestashop.core.localization.cldr.cache.adapter']) ? $this->services['prestashop.core.localization.cldr.cache.adapter'] : ($this->services['prestashop.core.localization.cldr.cache.adapter'] = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('CLDR', 0, '/home/povilasbrilius/.atom-projects/prestashop-gaming/var/cache/prod//localization'))) && false ?: '_'});

        $instance->setLowerLayer(${($_ = isset($this->services['prestashop.core.localization.cldr.datalayer.locale_reference']) ? $this->services['prestashop.core.localization.cldr.datalayer.locale_reference'] : $this->getPrestashop_Core_Localization_Cldr_Datalayer_LocaleReferenceService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the public 'prestashop.core.localization.cldr.datalayer.locale_reference' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\CLDR\DataLayer\LocaleReference
     */
    protected function getPrestashop_Core_Localization_Cldr_Datalayer_LocaleReferenceService()
    {
        return $this->services['prestashop.core.localization.cldr.datalayer.locale_reference'] = new \PrestaShop\PrestaShop\Core\Localization\CLDR\DataLayer\LocaleReference(${($_ = isset($this->services['prestashop.core.localization.cldr.reader']) ? $this->services['prestashop.core.localization.cldr.reader'] : ($this->services['prestashop.core.localization.cldr.reader'] = new \PrestaShop\PrestaShop\Core\Localization\CLDR\Reader())) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.core.localization.cldr.locale_data_source' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\CLDR\LocaleDataSource
     */
    protected function getPrestashop_Core_Localization_Cldr_LocaleDataSourceService()
    {
        return $this->services['prestashop.core.localization.cldr.locale_data_source'] = new \PrestaShop\PrestaShop\Core\Localization\CLDR\LocaleDataSource(${($_ = isset($this->services['prestashop.core.localization.cldr.datalayer.locale_cache']) ? $this->services['prestashop.core.localization.cldr.datalayer.locale_cache'] : $this->getPrestashop_Core_Localization_Cldr_Datalayer_LocaleCacheService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.core.localization.cldr.locale_repository' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\CLDR\LocaleRepository
     */
    protected function getPrestashop_Core_Localization_Cldr_LocaleRepositoryService()
    {
        return $this->services['prestashop.core.localization.cldr.locale_repository'] = new \PrestaShop\PrestaShop\Core\Localization\CLDR\LocaleRepository(${($_ = isset($this->services['prestashop.core.localization.cldr.locale_data_source']) ? $this->services['prestashop.core.localization.cldr.locale_data_source'] : $this->getPrestashop_Core_Localization_Cldr_LocaleDataSourceService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.core.localization.cldr.reader' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\CLDR\Reader
     */
    protected function getPrestashop_Core_Localization_Cldr_ReaderService()
    {
        return $this->services['prestashop.core.localization.cldr.reader'] = new \PrestaShop\PrestaShop\Core\Localization\CLDR\Reader();
    }

    /**
     * Gets the public 'prestashop.core.localization.currency.datasource' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Currency\CurrencyDataSource
     */
    protected function getPrestashop_Core_Localization_Currency_DatasourceService()
    {
        return $this->services['prestashop.core.localization.currency.datasource'] = new \PrestaShop\PrestaShop\Core\Localization\Currency\CurrencyDataSource(${($_ = isset($this->services['prestashop.core.localization.currency.middleware.cache']) ? $this->services['prestashop.core.localization.currency.middleware.cache'] : $this->getPrestashop_Core_Localization_Currency_Middleware_CacheService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.core.localization.currency.middleware.installed']) ? $this->services['prestashop.core.localization.currency.middleware.installed'] : $this->getPrestashop_Core_Localization_Currency_Middleware_InstalledService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.core.localization.currency.middleware.cache' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyCache
     */
    protected function getPrestashop_Core_Localization_Currency_Middleware_CacheService()
    {
        $this->services['prestashop.core.localization.currency.middleware.cache'] = $instance = new \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyCache(${($_ = isset($this->services['prestashop.core.localization.cache.adapter']) ? $this->services['prestashop.core.localization.cache.adapter'] : ($this->services['prestashop.core.localization.cache.adapter'] = new \Symfony\Component\Cache\Adapter\ArrayAdapter())) && false ?: '_'});

        $instance->setLowerLayer(${($_ = isset($this->services['prestashop.core.localization.currency.middleware.database']) ? $this->services['prestashop.core.localization.currency.middleware.database'] : $this->getPrestashop_Core_Localization_Currency_Middleware_DatabaseService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the public 'prestashop.core.localization.currency.middleware.database' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyDatabase
     */
    protected function getPrestashop_Core_Localization_Currency_Middleware_DatabaseService()
    {
        $this->services['prestashop.core.localization.currency.middleware.database'] = $instance = new \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyDatabase(${($_ = isset($this->services['prestashop.adapter.data_provider.currency']) ? $this->services['prestashop.adapter.data_provider.currency'] : $this->getPrestashop_Adapter_DataProvider_CurrencyService()) && false ?: '_'});

        $instance->setLowerLayer(${($_ = isset($this->services['prestashop.core.localization.currency.middleware.reference']) ? $this->services['prestashop.core.localization.currency.middleware.reference'] : $this->getPrestashop_Core_Localization_Currency_Middleware_ReferenceService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the public 'prestashop.core.localization.currency.middleware.installed' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyInstalled
     */
    protected function getPrestashop_Core_Localization_Currency_Middleware_InstalledService()
    {
        return $this->services['prestashop.core.localization.currency.middleware.installed'] = new \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyInstalled(${($_ = isset($this->services['prestashop.adapter.data_provider.currency']) ? $this->services['prestashop.adapter.data_provider.currency'] : $this->getPrestashop_Adapter_DataProvider_CurrencyService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.core.localization.currency.middleware.reference' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyReference
     */
    protected function getPrestashop_Core_Localization_Currency_Middleware_ReferenceService()
    {
        return $this->services['prestashop.core.localization.currency.middleware.reference'] = new \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyReference(${($_ = isset($this->services['prestashop.core.localization.cldr.locale_repository']) ? $this->services['prestashop.core.localization.cldr.locale_repository'] : $this->getPrestashop_Core_Localization_Cldr_LocaleRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.core.localization.currency.repository' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Currency\Repository
     */
    protected function getPrestashop_Core_Localization_Currency_RepositoryService()
    {
        return $this->services['prestashop.core.localization.currency.repository'] = new \PrestaShop\PrestaShop\Core\Localization\Currency\Repository(${($_ = isset($this->services['prestashop.core.localization.currency.datasource']) ? $this->services['prestashop.core.localization.currency.datasource'] : $this->getPrestashop_Core_Localization_Currency_DatasourceService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.core.localization.locale.context_locale' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Locale
     */
    protected function getPrestashop_Core_Localization_Locale_ContextLocaleService()
    {
        return $this->services['prestashop.core.localization.locale.context_locale'] = ${($_ = isset($this->services['prestashop.core.localization.locale.repository']) ? $this->services['prestashop.core.localization.locale.repository'] : $this->getPrestashop_Core_Localization_Locale_RepositoryService()) && false ?: '_'}->getLocale(${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->language->getLocale());
    }

    /**
     * Gets the public 'prestashop.core.localization.locale.repository' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Locale\Repository
     */
    protected function getPrestashop_Core_Localization_Locale_RepositoryService()
    {
        return $this->services['prestashop.core.localization.locale.repository'] = new \PrestaShop\PrestaShop\Core\Localization\Locale\Repository(${($_ = isset($this->services['prestashop.core.localization.cldr.locale_repository']) ? $this->services['prestashop.core.localization.cldr.locale_repository'] : $this->getPrestashop_Core_Localization_Cldr_LocaleRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.core.localization.currency.repository']) ? $this->services['prestashop.core.localization.currency.repository'] : $this->getPrestashop_Core_Localization_Currency_RepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.core.string.character_cleaner' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\String\CharacterCleaner
     */
    protected function getPrestashop_Core_String_CharacterCleanerService()
    {
        return $this->services['prestashop.core.string.character_cleaner'] = new \PrestaShop\PrestaShop\Core\String\CharacterCleaner();
    }

    /**
     * Gets the public 'product_comment_criterion_repository' shared service.
     *
     * @return \PrestaShop\Module\ProductComment\Repository\ProductCommentCriterionRepository
     */
    protected function getProductCommentCriterionRepositoryService()
    {
        return $this->services['product_comment_criterion_repository'] = new \PrestaShop\Module\ProductComment\Repository\ProductCommentCriterionRepository(${($_ = isset($this->services['doctrine.dbal.default_connection']) ? $this->services['doctrine.dbal.default_connection'] : $this->getDoctrine_Dbal_DefaultConnectionService()) && false ?: '_'}, 'ps_');
    }

    /**
     * Gets the public 'product_comment_repository' shared service.
     *
     * @return \PrestaShop\Module\ProductComment\Repository\ProductCommentRepository
     */
    protected function getProductCommentRepositoryService()
    {
        return $this->services['product_comment_repository'] = new \PrestaShop\Module\ProductComment\Repository\ProductCommentRepository(${($_ = isset($this->services['doctrine.dbal.default_connection']) ? $this->services['doctrine.dbal.default_connection'] : $this->getDoctrine_Dbal_DefaultConnectionService()) && false ?: '_'}, 'ps_', ${($_ = isset($this->services['prestashop.adapter.legacy.configuration']) ? $this->services['prestashop.adapter.legacy.configuration'] : ($this->services['prestashop.adapter.legacy.configuration'] = new \PrestaShop\PrestaShop\Adapter\Configuration())) && false ?: '_'}->get("PRODUCT_COMMENTS_ALLOW_GUESTS"), ${($_ = isset($this->services['prestashop.adapter.legacy.configuration']) ? $this->services['prestashop.adapter.legacy.configuration'] : ($this->services['prestashop.adapter.legacy.configuration'] = new \PrestaShop\PrestaShop\Adapter\Configuration())) && false ?: '_'}->get("PRODUCT_COMMENTS_MINIMAL_TIME"));
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
     * Gets the public 'ps_accounts.facade' shared service.
     *
     * @return \PrestaShop\PsAccountsInstaller\Installer\Facade\PsAccounts
     */
    protected function getPsAccounts_FacadeService()
    {
        return $this->services['ps_accounts.facade'] = new \PrestaShop\PsAccountsInstaller\Installer\Facade\PsAccounts(${($_ = isset($this->services['ps_accounts.installer']) ? $this->services['ps_accounts.installer'] : ($this->services['ps_accounts.installer'] = new \PrestaShop\PsAccountsInstaller\Installer\Installer('4.0'))) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_accounts.installer' shared service.
     *
     * @return \PrestaShop\PsAccountsInstaller\Installer\Installer
     */
    protected function getPsAccounts_InstallerService()
    {
        return $this->services['ps_accounts.installer'] = new \PrestaShop\PsAccountsInstaller\Installer\Installer('4.0');
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

    /**
     * Gets the public 'ps_metrics.adapter.link' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Adapter\LinkAdapter
     */
    protected function getPsMetrics_Adapter_LinkService()
    {
        return $this->services['ps_metrics.adapter.link'] = new \PrestaShop\Module\Ps_metrics\Adapter\LinkAdapter(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.tools']) ? $this->services['ps_metrics.helper.tools'] : ($this->services['ps_metrics.helper.tools'] = new \PrestaShop\Module\Ps_metrics\Helper\ToolsHelper())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.api.analytics' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Api\AnalyticsApi
     */
    protected function getPsMetrics_Api_AnalyticsService()
    {
        return $this->services['ps_metrics.api.analytics'] = new \PrestaShop\Module\Ps_metrics\Api\AnalyticsApi(${($_ = isset($this->services['ps_metrics.api.client.analytics']) ? $this->services['ps_metrics.api.client.analytics'] : $this->getPsMetrics_Api_Client_AnalyticsService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.env.analytics']) ? $this->services['ps_metrics.env.analytics'] : ($this->services['ps_metrics.env.analytics'] = new \PrestaShop\Module\Ps_metrics\Environment\AnalyticsEnv())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.json']) ? $this->services['ps_metrics.helper.json'] : $this->getPsMetrics_Helper_JsonService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.api.client.analytics' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Api\Client\AnalyticsClient
     */
    protected function getPsMetrics_Api_Client_AnalyticsService()
    {
        return $this->services['ps_metrics.api.client.analytics'] = new \PrestaShop\Module\Ps_metrics\Api\Client\AnalyticsClient(${($_ = isset($this->services['ps_accounts.facade']) ? $this->services['ps_accounts.facade'] : $this->getPsAccounts_FacadeService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.response.default']) ? $this->services['ps_metrics.middleware.response.default'] : $this->getPsMetrics_Middleware_Response_DefaultService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.log']) ? $this->services['ps_metrics.middleware.log'] : $this->getPsMetrics_Middleware_LogService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.sentry']) ? $this->services['ps_metrics.middleware.sentry'] : ($this->services['ps_metrics.middleware.sentry'] = new \PrestaShop\Module\Ps_metrics\Middleware\SentryMiddleware())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.response']) ? $this->services['ps_metrics.middleware.response'] : ($this->services['ps_metrics.middleware.response'] = new \PrestaShop\Module\Ps_metrics\Middleware\ResponseMiddleware())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.handler.guzzleapi']) ? $this->services['ps_metrics.handler.guzzleapi'] : ($this->services['ps_metrics.handler.guzzleapi'] = new \PrestaShop\Module\Ps_metrics\Handler\GuzzleApiResponseExceptionHandler())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.api.client.factory' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Api\Client\ClientManager
     */
    protected function getPsMetrics_Api_Client_FactoryService()
    {
        return $this->services['ps_metrics.api.client.factory'] = new \PrestaShop\Module\Ps_metrics\Api\Client\ClientManager(${($_ = isset($this->services['ps_metrics.middleware.response.default']) ? $this->services['ps_metrics.middleware.response.default'] : $this->getPsMetrics_Middleware_Response_DefaultService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.log']) ? $this->services['ps_metrics.middleware.log'] : $this->getPsMetrics_Middleware_LogService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.sentry']) ? $this->services['ps_metrics.middleware.sentry'] : ($this->services['ps_metrics.middleware.sentry'] = new \PrestaShop\Module\Ps_metrics\Middleware\SentryMiddleware())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.response']) ? $this->services['ps_metrics.middleware.response'] : ($this->services['ps_metrics.middleware.response'] = new \PrestaShop\Module\Ps_metrics\Middleware\ResponseMiddleware())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.handler.guzzleapi']) ? $this->services['ps_metrics.handler.guzzleapi'] : ($this->services['ps_metrics.handler.guzzleapi'] = new \PrestaShop\Module\Ps_metrics\Handler\GuzzleApiResponseExceptionHandler())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.api.client.http' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Api\Client\HttpClient
     */
    protected function getPsMetrics_Api_Client_HttpService()
    {
        return $this->services['ps_metrics.api.client.http'] = new \PrestaShop\Module\Ps_metrics\Api\Client\HttpClient(${($_ = isset($this->services['ps_metrics.middleware.response.default']) ? $this->services['ps_metrics.middleware.response.default'] : $this->getPsMetrics_Middleware_Response_DefaultService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.log']) ? $this->services['ps_metrics.middleware.log'] : $this->getPsMetrics_Middleware_LogService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.sentry']) ? $this->services['ps_metrics.middleware.sentry'] : ($this->services['ps_metrics.middleware.sentry'] = new \PrestaShop\Module\Ps_metrics\Middleware\SentryMiddleware())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.response']) ? $this->services['ps_metrics.middleware.response'] : ($this->services['ps_metrics.middleware.response'] = new \PrestaShop\Module\Ps_metrics\Middleware\ResponseMiddleware())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.handler.guzzleapi']) ? $this->services['ps_metrics.handler.guzzleapi'] : ($this->services['ps_metrics.handler.guzzleapi'] = new \PrestaShop\Module\Ps_metrics\Handler\GuzzleApiResponseExceptionHandler())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.api.http' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Api\HttpApi
     */
    protected function getPsMetrics_Api_HttpService()
    {
        return $this->services['ps_metrics.api.http'] = new \PrestaShop\Module\Ps_metrics\Api\HttpApi(${($_ = isset($this->services['ps_metrics.api.client.http']) ? $this->services['ps_metrics.api.client.http'] : $this->getPsMetrics_Api_Client_HttpService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.api.manager' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Api\ApiManager
     */
    protected function getPsMetrics_Api_ManagerService()
    {
        return $this->services['ps_metrics.api.manager'] = new \PrestaShop\Module\Ps_metrics\Api\ApiManager();
    }

    /**
     * Gets the public 'ps_metrics.cache.data' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Cache\DataCache
     */
    protected function getPsMetrics_Cache_DataService()
    {
        return $this->services['ps_metrics.cache.data'] = new \PrestaShop\Module\Ps_metrics\Cache\DataCache(${($_ = isset($this->services['ps_metrics.cache.specificdirectory']) ? $this->services['ps_metrics.cache.specificdirectory'] : ($this->services['ps_metrics.cache.specificdirectory'] = new \PrestaShop\Module\Ps_metrics\Cache\DirectoryCache())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.env.cache']) ? $this->services['ps_metrics.env.cache'] : ($this->services['ps_metrics.env.cache'] = new \PrestaShop\Module\Ps_metrics\Environment\CacheEnv())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.json']) ? $this->services['ps_metrics.helper.json'] : $this->getPsMetrics_Helper_JsonService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.logger']) ? $this->services['ps_metrics.helper.logger'] : ($this->services['ps_metrics.helper.logger'] = new \PrestaShop\Module\Ps_metrics\Helper\LoggerHelper())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.cache.specificdirectory' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Cache\DirectoryCache
     */
    protected function getPsMetrics_Cache_SpecificdirectoryService()
    {
        return $this->services['ps_metrics.cache.specificdirectory'] = new \PrestaShop\Module\Ps_metrics\Cache\DirectoryCache();
    }

    /**
     * Gets the public 'ps_metrics.context.prestashop' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext
     */
    protected function getPsMetrics_Context_PrestashopService()
    {
        return $this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext();
    }

    /**
     * Gets the public 'ps_metrics.data.tipscards' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Data\TipsCardsData
     */
    protected function getPsMetrics_Data_TipscardsService()
    {
        return $this->services['ps_metrics.data.tipscards'] = new \PrestaShop\Module\Ps_metrics\Data\TipsCardsData(${($_ = isset($this->services['ps_metrics.api.analytics']) ? $this->services['ps_metrics.api.analytics'] : $this->getPsMetrics_Api_AnalyticsService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.env.analytics' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Environment\AnalyticsEnv
     */
    protected function getPsMetrics_Env_AnalyticsService()
    {
        return $this->services['ps_metrics.env.analytics'] = new \PrestaShop\Module\Ps_metrics\Environment\AnalyticsEnv();
    }

    /**
     * Gets the public 'ps_metrics.env.cache' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Environment\CacheEnv
     */
    protected function getPsMetrics_Env_CacheService()
    {
        return $this->services['ps_metrics.env.cache'] = new \PrestaShop\Module\Ps_metrics\Environment\CacheEnv();
    }

    /**
     * Gets the public 'ps_metrics.env.segment' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Environment\SegmentEnv
     */
    protected function getPsMetrics_Env_SegmentService()
    {
        return $this->services['ps_metrics.env.segment'] = new \PrestaShop\Module\Ps_metrics\Environment\SegmentEnv();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\DataLoaders
     */
    protected function getPsMetrics_Graphql_DataloadersService()
    {
        return $this->services['ps_metrics.graphql.dataloaders'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\DataLoaders(${($_ = isset($this->services['ps_metrics.cache.data']) ? $this->services['ps_metrics.cache.data'] : $this->getPsMetrics_Cache_DataService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.json']) ? $this->services['ps_metrics.helper.json'] : $this->getPsMetrics_Helper_JsonService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.avgsessions' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\AvgSessionsDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_AvgsessionsService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.avgsessions'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\AvgSessionsDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.bouncerate' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\BounceRateDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_BouncerateService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.bouncerate'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\BounceRateDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.cartabandonedaverage' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\CartAbandonedAverageDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_CartabandonedaverageService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.cartabandonedaverage'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\CartAbandonedAverageDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.conversionrate' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\ConversionRateDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_ConversionrateService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.conversionrate'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\ConversionRateDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.factory' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\DataLoaderFactory
     */
    protected function getPsMetrics_Graphql_Dataloaders_FactoryService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.factory'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\DataLoaderFactory();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.orderaverage' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\OrderAverageDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_OrderaverageService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.orderaverage'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\OrderAverageDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.orderaveragegroupbydate' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\OrderAverageGroupByDateDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_OrderaveragegroupbydateService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.orderaveragegroupbydate'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\OrderAverageGroupByDateDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.ordergroupbycustomer' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\OrderGroupByCustomerDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_OrdergroupbycustomerService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.ordergroupbycustomer'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\OrderGroupByCustomerDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.ordersum' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\OrderSumDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_OrdersumService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.ordersum'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\OrderSumDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.ordersumgroupbydate' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\OrderSumGroupByDateDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_OrdersumgroupbydateService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.ordersumgroupbydate'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\OrderSumGroupByDateDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.ordersumgroupbysource' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\OrderSumGroupBySourceDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_OrdersumgroupbysourceService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.ordersumgroupbysource'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\OrderSumGroupBySourceDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.producttopseller' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\ProductTopSellerDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_ProducttopsellerService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.producttopseller'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\ProductTopSellerDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.revenuegross' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\RevenueGrossDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_RevenuegrossService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.revenuegross'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\RevenueGrossDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.revenuegrossgroupbycategories' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\RevenueGrossGroupByCategoriesDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_RevenuegrossgroupbycategoriesService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.revenuegrossgroupbycategories'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\RevenueGrossGroupByCategoriesDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.revenuegrossgroupbydate' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\RevenueGrossGroupByDateDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_RevenuegrossgroupbydateService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.revenuegrossgroupbydate'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\RevenueGrossGroupByDateDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.revenuegrossgroupbydistribution' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\revenueGrossGroupByDistributionDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_RevenuegrossgroupbydistributionService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.revenuegrossgroupbydistribution'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\revenueGrossGroupByDistributionDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.sessions' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\SessionsDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_SessionsService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.sessions'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\SessionsDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.sessionsgroupbycategory' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\SessionsGroupByCategoryDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_SessionsgroupbycategoryService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.sessionsgroupbycategory'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\SessionsGroupByCategoryDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.sessionsgroupbydate' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\SessionsGroupByDateDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_SessionsgroupbydateService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.sessionsgroupbydate'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\SessionsGroupByDateDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.sessionsgroupbyhour' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\SessionsGroupByHourDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_SessionsgroupbyhourService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.sessionsgroupbyhour'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\SessionsGroupByHourDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.setProductTourAdvancedDone' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\SetProductTourAdvancedDoneDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_SetProductTourAdvancedDoneService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.setProductTourAdvancedDone'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\SetProductTourAdvancedDoneDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.setProductTourFreeDone' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\SetProductTourFreeDoneDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_SetProductTourFreeDoneService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.setProductTourFreeDone'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\SetProductTourFreeDoneDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.tipscards' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\TipsCardsDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_TipscardsService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.tipscards'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\TipsCardsDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.graphql.dataloaders.uniqueusers' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\UniqueUsersDataLoaders
     */
    protected function getPsMetrics_Graphql_Dataloaders_UniqueusersService()
    {
        return $this->services['ps_metrics.graphql.dataloaders.uniqueusers'] = new \PrestaShop\Module\Ps_metrics\GraphQL\DataLoaders\UniqueUsersDataLoaders();
    }

    /**
     * Gets the public 'ps_metrics.handler.guzzleapi' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Handler\GuzzleApiResponseExceptionHandler
     */
    protected function getPsMetrics_Handler_GuzzleapiService()
    {
        return $this->services['ps_metrics.handler.guzzleapi'] = new \PrestaShop\Module\Ps_metrics\Handler\GuzzleApiResponseExceptionHandler();
    }

    /**
     * Gets the public 'ps_metrics.helper.api' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\ApiHelper
     */
    protected function getPsMetrics_Helper_ApiService()
    {
        return $this->services['ps_metrics.helper.api'] = new \PrestaShop\Module\Ps_metrics\Helper\ApiHelper();
    }

    /**
     * Gets the public 'ps_metrics.helper.data' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\DataHelper
     */
    protected function getPsMetrics_Helper_DataService()
    {
        return $this->services['ps_metrics.helper.data'] = new \PrestaShop\Module\Ps_metrics\Helper\DataHelper();
    }

    /**
     * Gets the public 'ps_metrics.helper.db' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\DbHelper
     */
    protected function getPsMetrics_Helper_DbService()
    {
        return $this->services['ps_metrics.helper.db'] = new \PrestaShop\Module\Ps_metrics\Helper\DbHelper(${($_ = isset($this->services['ps_metrics.cache.data']) ? $this->services['ps_metrics.cache.data'] : $this->getPsMetrics_Cache_DataService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.helper.json' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\JsonHelper
     */
    protected function getPsMetrics_Helper_JsonService()
    {
        return $this->services['ps_metrics.helper.json'] = new \PrestaShop\Module\Ps_metrics\Helper\JsonHelper(${($_ = isset($this->services['ps_metrics.helper.logger']) ? $this->services['ps_metrics.helper.logger'] : ($this->services['ps_metrics.helper.logger'] = new \PrestaShop\Module\Ps_metrics\Helper\LoggerHelper())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.helper.logger' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\LoggerHelper
     */
    protected function getPsMetrics_Helper_LoggerService()
    {
        return $this->services['ps_metrics.helper.logger'] = new \PrestaShop\Module\Ps_metrics\Helper\LoggerHelper();
    }

    /**
     * Gets the public 'ps_metrics.helper.module' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\ModuleHelper
     */
    protected function getPsMetrics_Helper_ModuleService()
    {
        return $this->services['ps_metrics.helper.module'] = new \PrestaShop\Module\Ps_metrics\Helper\ModuleHelper();
    }

    /**
     * Gets the public 'ps_metrics.helper.number' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\NumberHelper
     */
    protected function getPsMetrics_Helper_NumberService()
    {
        return $this->services['ps_metrics.helper.number'] = new \PrestaShop\Module\Ps_metrics\Helper\NumberHelper();
    }

    /**
     * Gets the public 'ps_metrics.helper.segment' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\SegmentHelper
     */
    protected function getPsMetrics_Helper_SegmentService()
    {
        return $this->services['ps_metrics.helper.segment'] = new \PrestaShop\Module\Ps_metrics\Helper\SegmentHelper(${($_ = isset($this->services['ps_metrics.env.segment']) ? $this->services['ps_metrics.env.segment'] : ($this->services['ps_metrics.env.segment'] = new \PrestaShop\Module\Ps_metrics\Environment\SegmentEnv())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.helper.shop' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\ShopHelper
     */
    protected function getPsMetrics_Helper_ShopService()
    {
        return $this->services['ps_metrics.helper.shop'] = new \PrestaShop\Module\Ps_metrics\Helper\ShopHelper();
    }

    /**
     * Gets the public 'ps_metrics.helper.tools' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\ToolsHelper
     */
    protected function getPsMetrics_Helper_ToolsService()
    {
        return $this->services['ps_metrics.helper.tools'] = new \PrestaShop\Module\Ps_metrics\Helper\ToolsHelper();
    }

    /**
     * Gets the public 'ps_metrics.kpi.configuration' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration
     */
    protected function getPsMetrics_Kpi_ConfigurationService()
    {
        return $this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration();
    }

    /**
     * Gets the public 'ps_metrics.kpi.conversion' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\ConversionKpi
     */
    protected function getPsMetrics_Kpi_ConversionService()
    {
        return $this->services['ps_metrics.kpi.conversion'] = new \PrestaShop\Module\Ps_metrics\Kpi\ConversionKpi(${($_ = isset($this->services['ps_metrics.kpi.configuration']) ? $this->services['ps_metrics.kpi.configuration'] : ($this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.number']) ? $this->services['ps_metrics.helper.number'] : ($this->services['ps_metrics.helper.number'] = new \PrestaShop\Module\Ps_metrics\Helper\NumberHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.kpi.visits']) ? $this->services['ps_metrics.kpi.visits'] : $this->getPsMetrics_Kpi_VisitsService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.kpi.orders']) ? $this->services['ps_metrics.kpi.orders'] : $this->getPsMetrics_Kpi_OrdersService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.kpi.revenues']) ? $this->services['ps_metrics.kpi.revenues'] : $this->getPsMetrics_Kpi_RevenuesService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.kpi.kpi' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\Kpi
     */
    protected function getPsMetrics_Kpi_KpiService()
    {
        return $this->services['ps_metrics.kpi.kpi'] = new \PrestaShop\Module\Ps_metrics\Kpi\Kpi(${($_ = isset($this->services['ps_metrics.kpi.configuration']) ? $this->services['ps_metrics.kpi.configuration'] : ($this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.kpi.manager' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\KpiManager
     */
    protected function getPsMetrics_Kpi_ManagerService()
    {
        return $this->services['ps_metrics.kpi.manager'] = new \PrestaShop\Module\Ps_metrics\Kpi\KpiManager(${($_ = isset($this->services['ps_metrics.kpi.configuration']) ? $this->services['ps_metrics.kpi.configuration'] : ($this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.kpi.orders' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\OrdersKpi
     */
    protected function getPsMetrics_Kpi_OrdersService()
    {
        return $this->services['ps_metrics.kpi.orders'] = new \PrestaShop\Module\Ps_metrics\Kpi\OrdersKpi(${($_ = isset($this->services['ps_metrics.kpi.configuration']) ? $this->services['ps_metrics.kpi.configuration'] : ($this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.data']) ? $this->services['ps_metrics.helper.data'] : ($this->services['ps_metrics.helper.data'] = new \PrestaShop\Module\Ps_metrics\Helper\DataHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.orders']) ? $this->services['ps_metrics.repository.orders'] : $this->getPsMetrics_Repository_OrdersService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.number']) ? $this->services['ps_metrics.helper.number'] : ($this->services['ps_metrics.helper.number'] = new \PrestaShop\Module\Ps_metrics\Helper\NumberHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.kpi.revenues']) ? $this->services['ps_metrics.kpi.revenues'] : $this->getPsMetrics_Kpi_RevenuesService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.payment']) ? $this->services['ps_metrics.repository.payment'] : ($this->services['ps_metrics.repository.payment'] = new \PrestaShop\Module\Ps_metrics\Repository\PaymentRepository())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.kpi.revenues' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\RevenuesKpi
     */
    protected function getPsMetrics_Kpi_RevenuesService()
    {
        return $this->services['ps_metrics.kpi.revenues'] = new \PrestaShop\Module\Ps_metrics\Kpi\RevenuesKpi(${($_ = isset($this->services['ps_metrics.kpi.configuration']) ? $this->services['ps_metrics.kpi.configuration'] : ($this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.data']) ? $this->services['ps_metrics.helper.data'] : ($this->services['ps_metrics.helper.data'] = new \PrestaShop\Module\Ps_metrics\Helper\DataHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.orders']) ? $this->services['ps_metrics.repository.orders'] : $this->getPsMetrics_Repository_OrdersService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.kpi.strategyinterface' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\KpiStrategyInterface
     */
    protected function getPsMetrics_Kpi_StrategyinterfaceService()
    {
        return $this->services['ps_metrics.kpi.strategyinterface'] = new \PrestaShop\Module\Ps_metrics\Kpi\KpiStrategyInterface();
    }

    /**
     * Gets the public 'ps_metrics.kpi.total' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\TotalKpi
     */
    protected function getPsMetrics_Kpi_TotalService()
    {
        return $this->services['ps_metrics.kpi.total'] = new \PrestaShop\Module\Ps_metrics\Kpi\TotalKpi(${($_ = isset($this->services['ps_metrics.kpi.configuration']) ? $this->services['ps_metrics.kpi.configuration'] : ($this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.kpi.visits']) ? $this->services['ps_metrics.kpi.visits'] : $this->getPsMetrics_Kpi_VisitsService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.kpi.orders']) ? $this->services['ps_metrics.kpi.orders'] : $this->getPsMetrics_Kpi_OrdersService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.kpi.revenues']) ? $this->services['ps_metrics.kpi.revenues'] : $this->getPsMetrics_Kpi_RevenuesService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.kpi.visits' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\VisitsKpi
     */
    protected function getPsMetrics_Kpi_VisitsService()
    {
        return $this->services['ps_metrics.kpi.visits'] = new \PrestaShop\Module\Ps_metrics\Kpi\VisitsKpi(${($_ = isset($this->services['ps_metrics.kpi.configuration']) ? $this->services['ps_metrics.kpi.configuration'] : ($this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.data']) ? $this->services['ps_metrics.helper.data'] : ($this->services['ps_metrics.helper.data'] = new \PrestaShop\Module\Ps_metrics\Helper\DataHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.cache.data']) ? $this->services['ps_metrics.cache.data'] : $this->getPsMetrics_Cache_DataService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.api.analytics']) ? $this->services['ps_metrics.api.analytics'] : $this->getPsMetrics_Api_AnalyticsService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.middleware' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Middleware\Middleware
     */
    protected function getPsMetrics_MiddlewareService()
    {
        return $this->services['ps_metrics.middleware'] = new \PrestaShop\Module\Ps_metrics\Middleware\Middleware();
    }

    /**
     * Gets the public 'ps_metrics.middleware.log' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Middleware\LogMiddleware
     */
    protected function getPsMetrics_Middleware_LogService()
    {
        return $this->services['ps_metrics.middleware.log'] = new \PrestaShop\Module\Ps_metrics\Middleware\LogMiddleware(${($_ = isset($this->services['ps_metrics.helper.logger']) ? $this->services['ps_metrics.helper.logger'] : ($this->services['ps_metrics.helper.logger'] = new \PrestaShop\Module\Ps_metrics\Helper\LoggerHelper())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.middleware.response' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Middleware\ResponseMiddleware
     */
    protected function getPsMetrics_Middleware_ResponseService()
    {
        return $this->services['ps_metrics.middleware.response'] = new \PrestaShop\Module\Ps_metrics\Middleware\ResponseMiddleware();
    }

    /**
     * Gets the public 'ps_metrics.middleware.response.default' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Middleware\CheckResponseMiddleware
     */
    protected function getPsMetrics_Middleware_Response_DefaultService()
    {
        return $this->services['ps_metrics.middleware.response.default'] = new \PrestaShop\Module\Ps_metrics\Middleware\CheckResponseMiddleware(${($_ = isset($this->services['ps_metrics.helper.json']) ? $this->services['ps_metrics.helper.json'] : $this->getPsMetrics_Helper_JsonService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.middleware.sentry' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Middleware\SentryMiddleware
     */
    protected function getPsMetrics_Middleware_SentryService()
    {
        return $this->services['ps_metrics.middleware.sentry'] = new \PrestaShop\Module\Ps_metrics\Middleware\SentryMiddleware();
    }

    /**
     * Gets the public 'ps_metrics.module.dashboard.modules' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Module\DashboardModules
     */
    protected function getPsMetrics_Module_Dashboard_ModulesService()
    {
        return $this->services['ps_metrics.module.dashboard.modules'] = new \PrestaShop\Module\Ps_metrics\Module\DashboardModules(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.module.gainstaller' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Module\GAInstaller
     */
    protected function getPsMetrics_Module_GainstallerService()
    {
        return $this->services['ps_metrics.module.gainstaller'] = new \PrestaShop\Module\Ps_metrics\Module\GAInstaller(${($_ = isset($this->services['ps_metrics.adapter.link']) ? $this->services['ps_metrics.adapter.link'] : $this->getPsMetrics_Adapter_LinkService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.module']) ? $this->services['ps_metrics.helper.module'] : ($this->services['ps_metrics.helper.module'] = new \PrestaShop\Module\Ps_metrics\Helper\ModuleHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.tools']) ? $this->services['ps_metrics.helper.tools'] : ($this->services['ps_metrics.helper.tools'] = new \PrestaShop\Module\Ps_metrics\Helper\ToolsHelper())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.module.install' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Module\Install
     */
    protected function getPsMetrics_Module_InstallService()
    {
        return $this->services['ps_metrics.module.install'] = new \PrestaShop\Module\Ps_metrics\Module\Install(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.hookmodule']) ? $this->services['ps_metrics.repository.hookmodule'] : ($this->services['ps_metrics.repository.hookmodule'] = new \PrestaShop\Module\Ps_metrics\Repository\HookModuleRepository())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.module.uninstall' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Module\Uninstall
     */
    protected function getPsMetrics_Module_UninstallService()
    {
        return $this->services['ps_metrics.module.uninstall'] = new \PrestaShop\Module\Ps_metrics\Module\Uninstall(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_accounts.facade']) ? $this->services['ps_accounts.facade'] : $this->getPsAccounts_FacadeService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.api.analytics']) ? $this->services['ps_metrics.api.analytics'] : $this->getPsMetrics_Api_AnalyticsService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.presenter.store.context' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Presenter\Store\Context\ContextPresenter
     */
    protected function getPsMetrics_Presenter_Store_ContextService()
    {
        return $this->services['ps_metrics.presenter.store.context'] = new \PrestaShop\Module\Ps_metrics\Presenter\Store\Context\ContextPresenter(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_accounts.facade']) ? $this->services['ps_accounts.facade'] : $this->getPsAccounts_FacadeService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.adapter.link']) ? $this->services['ps_metrics.adapter.link'] : $this->getPsMetrics_Adapter_LinkService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.provider.shops']) ? $this->services['ps_metrics.provider.shops'] : $this->getPsMetrics_Provider_ShopsService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.module.dashboard.modules']) ? $this->services['ps_metrics.module.dashboard.modules'] : $this->getPsMetrics_Module_Dashboard_ModulesService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.provider.analyticsaccountslist']) ? $this->services['ps_metrics.provider.analyticsaccountslist'] : $this->getPsMetrics_Provider_AnalyticsaccountslistService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.api.http']) ? $this->services['ps_metrics.api.http'] : $this->getPsMetrics_Api_HttpService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.tools']) ? $this->services['ps_metrics.helper.tools'] : ($this->services['ps_metrics.helper.tools'] = new \PrestaShop\Module\Ps_metrics\Helper\ToolsHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.db']) ? $this->services['ps_metrics.helper.db'] : $this->getPsMetrics_Helper_DbService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.presenter.store.dashboard' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Presenter\Store\Dashboard\DashboardPresenter
     */
    protected function getPsMetrics_Presenter_Store_DashboardService()
    {
        return $this->services['ps_metrics.presenter.store.dashboard'] = new \PrestaShop\Module\Ps_metrics\Presenter\Store\Dashboard\DashboardPresenter(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.translation.dashboard']) ? $this->services['ps_metrics.translation.dashboard'] : $this->getPsMetrics_Translation_DashboardService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.adapter.link']) ? $this->services['ps_metrics.adapter.link'] : $this->getPsMetrics_Adapter_LinkService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.presenter.store.settings' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Presenter\Store\Settings\SettingsPresenter
     */
    protected function getPsMetrics_Presenter_Store_SettingsService()
    {
        return $this->services['ps_metrics.presenter.store.settings'] = new \PrestaShop\Module\Ps_metrics\Presenter\Store\Settings\SettingsPresenter(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.translation.settings']) ? $this->services['ps_metrics.translation.settings'] : $this->getPsMetrics_Translation_SettingsService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.adapter.link']) ? $this->services['ps_metrics.adapter.link'] : $this->getPsMetrics_Adapter_LinkService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.provider.shops']) ? $this->services['ps_metrics.provider.shops'] : $this->getPsMetrics_Provider_ShopsService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.provider.analyticsaccountslist']) ? $this->services['ps_metrics.provider.analyticsaccountslist'] : $this->getPsMetrics_Provider_AnalyticsaccountslistService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.provider.googletag']) ? $this->services['ps_metrics.provider.googletag'] : $this->getPsMetrics_Provider_GoogletagService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.module.gainstaller']) ? $this->services['ps_metrics.module.gainstaller'] : $this->getPsMetrics_Module_GainstallerService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.api.http']) ? $this->services['ps_metrics.api.http'] : $this->getPsMetrics_Api_HttpService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.presenter.store.store' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Presenter\Store\StorePresenter
     */
    protected function getPsMetrics_Presenter_Store_StoreService()
    {
        return $this->services['ps_metrics.presenter.store.store'] = new \PrestaShop\Module\Ps_metrics\Presenter\Store\StorePresenter(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.presenter.store.context']) ? $this->services['ps_metrics.presenter.store.context'] : $this->getPsMetrics_Presenter_Store_ContextService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.presenter.store.dashboard']) ? $this->services['ps_metrics.presenter.store.dashboard'] : $this->getPsMetrics_Presenter_Store_DashboardService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.presenter.store.settings']) ? $this->services['ps_metrics.presenter.store.settings'] : $this->getPsMetrics_Presenter_Store_SettingsService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.provider.analyticsaccountslist' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Provider\AnalyticsAccountsListProvider
     */
    protected function getPsMetrics_Provider_AnalyticsaccountslistService()
    {
        return $this->services['ps_metrics.provider.analyticsaccountslist'] = new \PrestaShop\Module\Ps_metrics\Provider\AnalyticsAccountsListProvider(${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.json']) ? $this->services['ps_metrics.helper.json'] : $this->getPsMetrics_Helper_JsonService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.api.analytics']) ? $this->services['ps_metrics.api.analytics'] : $this->getPsMetrics_Api_AnalyticsService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.provider.googletag' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Provider\GoogleTagProvider
     */
    protected function getPsMetrics_Provider_GoogletagService()
    {
        return $this->services['ps_metrics.provider.googletag'] = new \PrestaShop\Module\Ps_metrics\Provider\GoogleTagProvider(${($_ = isset($this->services['ps_metrics.api.http']) ? $this->services['ps_metrics.api.http'] : $this->getPsMetrics_Api_HttpService()) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.provider.shops' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Provider\ShopsProvider
     */
    protected function getPsMetrics_Provider_ShopsService()
    {
        return $this->services['ps_metrics.provider.shops'] = new \PrestaShop\Module\Ps_metrics\Provider\ShopsProvider(${($_ = isset($this->services['ps_metrics.helper.tools']) ? $this->services['ps_metrics.helper.tools'] : ($this->services['ps_metrics.helper.tools'] = new \PrestaShop\Module\Ps_metrics\Helper\ToolsHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.shop']) ? $this->services['ps_metrics.helper.shop'] : ($this->services['ps_metrics.helper.shop'] = new \PrestaShop\Module\Ps_metrics\Helper\ShopHelper())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.repository.configuration' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Repository\ConfigurationRepository
     */
    protected function getPsMetrics_Repository_ConfigurationService()
    {
        return $this->services['ps_metrics.repository.configuration'] = new \PrestaShop\Module\Ps_metrics\Repository\ConfigurationRepository(${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.repository.hookmodule' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Repository\HookModuleRepository
     */
    protected function getPsMetrics_Repository_HookmoduleService()
    {
        return $this->services['ps_metrics.repository.hookmodule'] = new \PrestaShop\Module\Ps_metrics\Repository\HookModuleRepository();
    }

    /**
     * Gets the public 'ps_metrics.repository.orders' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Repository\OrdersRepository
     */
    protected function getPsMetrics_Repository_OrdersService()
    {
        return $this->services['ps_metrics.repository.orders'] = new \PrestaShop\Module\Ps_metrics\Repository\OrdersRepository(${($_ = isset($this->services['ps_metrics.helper.db']) ? $this->services['ps_metrics.helper.db'] : $this->getPsMetrics_Helper_DbService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.shop']) ? $this->services['ps_metrics.helper.shop'] : ($this->services['ps_metrics.helper.shop'] = new \PrestaShop\Module\Ps_metrics\Helper\ShopHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, NULL);
    }

    /**
     * Gets the public 'ps_metrics.repository.payment' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Repository\PaymentRepository
     */
    protected function getPsMetrics_Repository_PaymentService()
    {
        return $this->services['ps_metrics.repository.payment'] = new \PrestaShop\Module\Ps_metrics\Repository\PaymentRepository();
    }

    /**
     * Gets the public 'ps_metrics.tracker.segment' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Tracker\Segment
     */
    protected function getPsMetrics_Tracker_SegmentService()
    {
        return $this->services['ps_metrics.tracker.segment'] = new \PrestaShop\Module\Ps_metrics\Tracker\Segment(${($_ = isset($this->services['ps_metrics.env.segment']) ? $this->services['ps_metrics.env.segment'] : ($this->services['ps_metrics.env.segment'] = new \PrestaShop\Module\Ps_metrics\Environment\SegmentEnv())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.segment']) ? $this->services['ps_metrics.helper.segment'] : $this->getPsMetrics_Helper_SegmentService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.shop']) ? $this->services['ps_metrics.helper.shop'] : ($this->services['ps_metrics.helper.shop'] = new \PrestaShop\Module\Ps_metrics\Helper\ShopHelper())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.translation.dashboard' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Translation\DashboardTranslation
     */
    protected function getPsMetrics_Translation_DashboardService()
    {
        return $this->services['ps_metrics.translation.dashboard'] = new \PrestaShop\Module\Ps_metrics\Translation\DashboardTranslation(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.translation.settings' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Translation\SettingsTranslation
     */
    protected function getPsMetrics_Translation_SettingsService()
    {
        return $this->services['ps_metrics.translation.settings'] = new \PrestaShop\Module\Ps_metrics\Translation\SettingsTranslation(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'});
    }

    /**
     * Gets the public 'ps_metrics.validation.processselectaccountanalytics' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Validation\SelectAccountAnalytics
     */
    protected function getPsMetrics_Validation_ProcessselectaccountanalyticsService()
    {
        return $this->services['ps_metrics.validation.processselectaccountanalytics'] = new \PrestaShop\Module\Ps_metrics\Validation\SelectAccountAnalytics();
    }

    /**
     * Gets the public 'ps_metrics.validation.retrievedata' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Validation\RetrieveData
     */
    protected function getPsMetrics_Validation_RetrievedataService()
    {
        return $this->services['ps_metrics.validation.retrievedata'] = new \PrestaShop\Module\Ps_metrics\Validation\RetrieveData();
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Api\EventBusProxyClient' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Api\EventBusProxyClient
     */
    protected function getEventBusProxyClientService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Api\\EventBusProxyClient'] = new \PrestaShop\Module\PsEventbus\Api\EventBusProxyClient(${($_ = isset($this->services['ps_eventbus.link']) ? $this->services['ps_eventbus.link'] : $this->getPsEventbus_LinkService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts']) ? $this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts'] : $this->getPsAccountsService()) && false ?: '_'}, 'https://eventbus-proxy.psessentials.net');
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Api\EventBusSyncClient' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Api\EventBusSyncClient
     */
    protected function getEventBusSyncClientService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Api\\EventBusSyncClient'] = new \PrestaShop\Module\PsEventbus\Api\EventBusSyncClient(${($_ = isset($this->services['ps_eventbus.link']) ? $this->services['ps_eventbus.link'] : $this->getPsEventbus_LinkService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts']) ? $this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts'] : $this->getPsAccountsService()) && false ?: '_'}, 'https://eventbus-sync.psessentials.net');
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Builder\CarrierBuilder' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Builder\CarrierBuilder
     */
    protected function getCarrierBuilderService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Builder\\CarrierBuilder'] = new \PrestaShop\Module\PsEventbus\Builder\CarrierBuilder(${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CarrierRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CarrierRepository'] : $this->getCarrierRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CountryRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CountryRepository'] : $this->getCountryRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\StateRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\StateRepository'] : $this->getStateRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\TaxRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\TaxRepository'] : $this->getTaxRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ConfigurationRepository'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ConfigurationRepository'] = new \PrestaShop\Module\PsEventbus\Repository\ConfigurationRepository())) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Decorator\CategoryDecorator' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Decorator\CategoryDecorator
     */
    protected function getCategoryDecoratorService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Decorator\\CategoryDecorator'] = new \PrestaShop\Module\PsEventbus\Decorator\CategoryDecorator();
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Decorator\PayloadDecorator' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Decorator\PayloadDecorator
     */
    protected function getPayloadDecoratorService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Decorator\\PayloadDecorator'] = new \PrestaShop\Module\PsEventbus\Decorator\PayloadDecorator(${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\DateFormatter']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\DateFormatter'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\DateFormatter'] = new \PrestaShop\Module\PsEventbus\Formatter\DateFormatter())) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Decorator\ProductDecorator' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Decorator\ProductDecorator
     */
    protected function getProductDecoratorService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Decorator\\ProductDecorator'] = new \PrestaShop\Module\PsEventbus\Decorator\ProductDecorator(${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\LanguageRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\LanguageRepository'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\LanguageRepository'] = new \PrestaShop\Module\PsEventbus\Repository\LanguageRepository())) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ProductRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ProductRepository'] : $this->getProductRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CategoryRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CategoryRepository'] : $this->getCategoryRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] = new \PrestaShop\Module\PsEventbus\Formatter\ArrayFormatter())) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Formatter\ArrayFormatter' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Formatter\ArrayFormatter
     */
    protected function getArrayFormatterService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] = new \PrestaShop\Module\PsEventbus\Formatter\ArrayFormatter();
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Formatter\DateFormatter' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Formatter\DateFormatter
     */
    protected function getDateFormatterService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\DateFormatter'] = new \PrestaShop\Module\PsEventbus\Formatter\DateFormatter();
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Formatter\JsonFormatter' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Formatter\JsonFormatter
     */
    protected function getJsonFormatterService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\JsonFormatter'] = new \PrestaShop\Module\PsEventbus\Formatter\JsonFormatter();
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Provider\CarrierDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Provider\CarrierDataProvider
     */
    protected function getCarrierDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Provider\\CarrierDataProvider'] = new \PrestaShop\Module\PsEventbus\Provider\CarrierDataProvider(${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ConfigurationRepository'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ConfigurationRepository'] = new \PrestaShop\Module\PsEventbus\Repository\ConfigurationRepository())) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Builder\\CarrierBuilder']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Builder\\CarrierBuilder'] : $this->getCarrierBuilderService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CarrierRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CarrierRepository'] : $this->getCarrierRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Provider\CartDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Provider\CartDataProvider
     */
    protected function getCartDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Provider\\CartDataProvider'] = new \PrestaShop\Module\PsEventbus\Provider\CartDataProvider(${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CartRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CartRepository'] : $this->getCartRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CartProductRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CartProductRepository'] : $this->getCartProductRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] = new \PrestaShop\Module\PsEventbus\Formatter\ArrayFormatter())) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Provider\CategoryDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Provider\CategoryDataProvider
     */
    protected function getCategoryDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Provider\\CategoryDataProvider'] = new \PrestaShop\Module\PsEventbus\Provider\CategoryDataProvider(${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CategoryRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CategoryRepository'] : $this->getCategoryRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Decorator\\CategoryDecorator']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Decorator\\CategoryDecorator'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Decorator\\CategoryDecorator'] = new \PrestaShop\Module\PsEventbus\Decorator\CategoryDecorator())) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] = new \PrestaShop\Module\PsEventbus\Formatter\ArrayFormatter())) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Provider\GoogleTaxonomyDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Provider\GoogleTaxonomyDataProvider
     */
    protected function getGoogleTaxonomyDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Provider\\GoogleTaxonomyDataProvider'] = new \PrestaShop\Module\PsEventbus\Provider\GoogleTaxonomyDataProvider(${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\GoogleTaxonomyRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\GoogleTaxonomyRepository'] : $this->getGoogleTaxonomyRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Provider\ModuleDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Provider\ModuleDataProvider
     */
    protected function getModuleDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Provider\\ModuleDataProvider'] = new \PrestaShop\Module\PsEventbus\Provider\ModuleDataProvider(${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ModuleRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ModuleRepository'] : $this->getModuleRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Provider\OrderDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Provider\OrderDataProvider
     */
    protected function getOrderDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Provider\\OrderDataProvider'] = new \PrestaShop\Module\PsEventbus\Provider\OrderDataProvider(${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\OrderRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\OrderRepository'] : $this->getOrderRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\OrderDetailsRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\OrderDetailsRepository'] : $this->getOrderDetailsRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] = new \PrestaShop\Module\PsEventbus\Formatter\ArrayFormatter())) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Provider\ProductDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Provider\ProductDataProvider
     */
    protected function getProductDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Provider\\ProductDataProvider'] = new \PrestaShop\Module\PsEventbus\Provider\ProductDataProvider(${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ProductRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ProductRepository'] : $this->getProductRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Decorator\\ProductDecorator']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Decorator\\ProductDecorator'] : $this->getProductDecoratorService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\LanguageRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\LanguageRepository'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\LanguageRepository'] = new \PrestaShop\Module\PsEventbus\Repository\LanguageRepository())) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] = new \PrestaShop\Module\PsEventbus\Formatter\ArrayFormatter())) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\CarrierRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\CarrierRepository
     */
    protected function getCarrierRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CarrierRepository'] = new \PrestaShop\Module\PsEventbus\Repository\CarrierRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\CartProductRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\CartProductRepository
     */
    protected function getCartProductRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CartProductRepository'] = new \PrestaShop\Module\PsEventbus\Repository\CartProductRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\CartRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\CartRepository
     */
    protected function getCartRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CartRepository'] = new \PrestaShop\Module\PsEventbus\Repository\CartRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\CategoryRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\CategoryRepository
     */
    protected function getCategoryRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CategoryRepository'] = new \PrestaShop\Module\PsEventbus\Repository\CategoryRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\ConfigurationRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\ConfigurationRepository
     */
    protected function getConfigurationRepository2Service()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ConfigurationRepository'] = new \PrestaShop\Module\PsEventbus\Repository\ConfigurationRepository();
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\CountryRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\CountryRepository
     */
    protected function getCountryRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CountryRepository'] = new \PrestaShop\Module\PsEventbus\Repository\CountryRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\CurrencyRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\CurrencyRepository
     */
    protected function getCurrencyRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CurrencyRepository'] = new \PrestaShop\Module\PsEventbus\Repository\CurrencyRepository();
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\DeletedObjectsRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\DeletedObjectsRepository
     */
    protected function getDeletedObjectsRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\DeletedObjectsRepository'] = new \PrestaShop\Module\PsEventbus\Repository\DeletedObjectsRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\EventbusSyncRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\EventbusSyncRepository
     */
    protected function getEventbusSyncRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\EventbusSyncRepository'] = new \PrestaShop\Module\PsEventbus\Repository\EventbusSyncRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\GoogleTaxonomyRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\GoogleTaxonomyRepository
     */
    protected function getGoogleTaxonomyRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\GoogleTaxonomyRepository'] = new \PrestaShop\Module\PsEventbus\Repository\GoogleTaxonomyRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\ImageRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\ImageRepository
     */
    protected function getImageRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ImageRepository'] = new \PrestaShop\Module\PsEventbus\Repository\ImageRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\IncrementalSyncRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\IncrementalSyncRepository
     */
    protected function getIncrementalSyncRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\IncrementalSyncRepository'] = new \PrestaShop\Module\PsEventbus\Repository\IncrementalSyncRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\LanguageRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\LanguageRepository
     */
    protected function getLanguageRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\LanguageRepository'] = new \PrestaShop\Module\PsEventbus\Repository\LanguageRepository();
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\ModuleRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\ModuleRepository
     */
    protected function getModuleRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ModuleRepository'] = new \PrestaShop\Module\PsEventbus\Repository\ModuleRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\OrderDetailsRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\OrderDetailsRepository
     */
    protected function getOrderDetailsRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\OrderDetailsRepository'] = new \PrestaShop\Module\PsEventbus\Repository\OrderDetailsRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\OrderRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\OrderRepository
     */
    protected function getOrderRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\OrderRepository'] = new \PrestaShop\Module\PsEventbus\Repository\OrderRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\ProductRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\ProductRepository
     */
    protected function getProductRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ProductRepository'] = new \PrestaShop\Module\PsEventbus\Repository\ProductRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] = new \PrestaShop\Module\PsEventbus\Formatter\ArrayFormatter())) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\ServerInformationRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\ServerInformationRepository
     */
    protected function getServerInformationRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ServerInformationRepository'] = new \PrestaShop\Module\PsEventbus\Repository\ServerInformationRepository(${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CurrencyRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CurrencyRepository'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\CurrencyRepository'] = new \PrestaShop\Module\PsEventbus\Repository\CurrencyRepository())) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\LanguageRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\LanguageRepository'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\LanguageRepository'] = new \PrestaShop\Module\PsEventbus\Repository\LanguageRepository())) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ConfigurationRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ConfigurationRepository'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ConfigurationRepository'] = new \PrestaShop\Module\PsEventbus\Repository\ConfigurationRepository())) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ShopRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ShopRepository'] : $this->getShopRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\ArrayFormatter'] = new \PrestaShop\Module\PsEventbus\Formatter\ArrayFormatter())) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts']) ? $this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts'] : $this->getPsAccountsService()) && false ?: '_'}, ['EVENT_BUS_SYNC_API_URL' => 'https://eventbus-sync.psessentials.net', 'EVENT_BUS_PROXY_API_URL' => 'https://eventbus-proxy.psessentials.net']);
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\ShopRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\ShopRepository
     */
    protected function getShopRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ShopRepository'] = new \PrestaShop\Module\PsEventbus\Repository\ShopRepository(${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\StateRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\StateRepository
     */
    protected function getStateRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\StateRepository'] = new \PrestaShop\Module\PsEventbus\Repository\StateRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\TaxRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\TaxRepository
     */
    protected function getTaxRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\TaxRepository'] = new \PrestaShop\Module\PsEventbus\Repository\TaxRepository(${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Repository\ThemeRepository' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Repository\ThemeRepository
     */
    protected function getThemeRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\ThemeRepository'] = new \PrestaShop\Module\PsEventbus\Repository\ThemeRepository(${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'}, ${($_ = isset($this->services['ps_eventbus.db']) ? $this->services['ps_eventbus.db'] : $this->getPsEventbus_DbService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Service\ApiAuthorizationService' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Service\ApiAuthorizationService
     */
    protected function getApiAuthorizationServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Service\\ApiAuthorizationService'] = new \PrestaShop\Module\PsEventbus\Service\ApiAuthorizationService(${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\EventbusSyncRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\EventbusSyncRepository'] : $this->getEventbusSyncRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Api\\EventBusSyncClient']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Api\\EventBusSyncClient'] : $this->getEventBusSyncClientService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Service\CompressionService' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Service\CompressionService
     */
    protected function getCompressionServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Service\\CompressionService'] = new \PrestaShop\Module\PsEventbus\Service\CompressionService(${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\JsonFormatter']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\JsonFormatter'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\JsonFormatter'] = new \PrestaShop\Module\PsEventbus\Formatter\JsonFormatter())) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Service\DeletedObjectsService' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Service\DeletedObjectsService
     */
    protected function getDeletedObjectsServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Service\\DeletedObjectsService'] = new \PrestaShop\Module\PsEventbus\Service\DeletedObjectsService(${($_ = isset($this->services['ps_eventbus.context']) ? $this->services['ps_eventbus.context'] : $this->getPsEventbus_ContextService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\DeletedObjectsRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\DeletedObjectsRepository'] : $this->getDeletedObjectsRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Service\\ProxyService']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Service\\ProxyService'] : $this->getProxyServiceService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Service\ProxyService' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Service\ProxyService
     */
    protected function getProxyServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Service\\ProxyService'] = new \PrestaShop\Module\PsEventbus\Service\ProxyService(${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Api\\EventBusProxyClient']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Api\\EventBusProxyClient'] : $this->getEventBusProxyClientService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\JsonFormatter']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\JsonFormatter'] : ($this->services['PrestaShop\\Module\\PsEventbus\\Formatter\\JsonFormatter'] = new \PrestaShop\Module\PsEventbus\Formatter\JsonFormatter())) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\Module\PsEventbus\Service\SynchronizationService' shared service.
     *
     * @return \PrestaShop\Module\PsEventbus\Service\SynchronizationService
     */
    protected function getSynchronizationServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsEventbus\\Service\\SynchronizationService'] = new \PrestaShop\Module\PsEventbus\Service\SynchronizationService(${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\EventbusSyncRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\EventbusSyncRepository'] : $this->getEventbusSyncRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Repository\\IncrementalSyncRepository']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Repository\\IncrementalSyncRepository'] : $this->getIncrementalSyncRepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Service\\ProxyService']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Service\\ProxyService'] : $this->getProxyServiceService()) && false ?: '_'}, ${($_ = isset($this->services['PrestaShop\\Module\\PsEventbus\\Decorator\\PayloadDecorator']) ? $this->services['PrestaShop\\Module\\PsEventbus\\Decorator\\PayloadDecorator'] : $this->getPayloadDecoratorService()) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\PsAccountsInstaller\Installer\Facade\PsAccounts' shared service.
     *
     * @return \PrestaShop\PsAccountsInstaller\Installer\Facade\PsAccounts
     */
    protected function getPsAccountsService()
    {
        return $this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts'] = new \PrestaShop\PsAccountsInstaller\Installer\Facade\PsAccounts(${($_ = isset($this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Installer']) ? $this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Installer'] : ($this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Installer'] = new \PrestaShop\PsAccountsInstaller\Installer\Installer('4.0.0'))) && false ?: '_'});
    }

    /**
     * Gets the private 'PrestaShop\PsAccountsInstaller\Installer\Installer' shared service.
     *
     * @return \PrestaShop\PsAccountsInstaller\Installer\Installer
     */
    protected function getInstaller2Service()
    {
        return $this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Installer'] = new \PrestaShop\PsAccountsInstaller\Installer\Installer('4.0.0');
    }

    /**
     * Gets the private 'annotation_reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\AnnotationReader
     */
    protected function getAnnotationReaderService()
    {
        return $this->services['annotation_reader'] = new \Doctrine\Common\Annotations\AnnotationReader();
    }

    /**
     * Gets the private 'cache.doctrine.orm.default.result' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\ArrayAdapter
     */
    protected function getCache_Doctrine_Orm_Default_ResultService()
    {
        return $this->services['cache.doctrine.orm.default.result'] = new \Symfony\Component\Cache\Adapter\ArrayAdapter();
    }

    /**
     * Gets the private 'context.static' shared service.
     *
     * @return \Context
     */
    protected function getContext_StaticService()
    {
        return $this->services['context.static'] = new \Context();
    }

    /**
     * Gets the private 'doctrine.cache_clear_metadata_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ClearMetadataCacheDoctrineCommand
     */
    protected function getDoctrine_CacheClearMetadataCommandService()
    {
        return $this->services['doctrine.cache_clear_metadata_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ClearMetadataCacheDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.cache_clear_query_cache_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ClearQueryCacheDoctrineCommand
     */
    protected function getDoctrine_CacheClearQueryCacheCommandService()
    {
        return $this->services['doctrine.cache_clear_query_cache_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ClearQueryCacheDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.cache_clear_result_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ClearResultCacheDoctrineCommand
     */
    protected function getDoctrine_CacheClearResultCommandService()
    {
        return $this->services['doctrine.cache_clear_result_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ClearResultCacheDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.cache_collection_region_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\CollectionRegionDoctrineCommand
     */
    protected function getDoctrine_CacheCollectionRegionCommandService()
    {
        return $this->services['doctrine.cache_collection_region_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\CollectionRegionDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.clear_entity_region_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\EntityRegionCacheDoctrineCommand
     */
    protected function getDoctrine_ClearEntityRegionCommandService()
    {
        return $this->services['doctrine.clear_entity_region_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\EntityRegionCacheDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.clear_query_region_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\QueryRegionCacheDoctrineCommand
     */
    protected function getDoctrine_ClearQueryRegionCommandService()
    {
        return $this->services['doctrine.clear_query_region_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\QueryRegionCacheDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.database_create_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\CreateDatabaseDoctrineCommand
     */
    protected function getDoctrine_DatabaseCreateCommandService()
    {
        return $this->services['doctrine.database_create_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\CreateDatabaseDoctrineCommand(${($_ = isset($this->services['doctrine']) ? $this->services['doctrine'] : $this->getDoctrineService()) && false ?: '_'});
    }

    /**
     * Gets the private 'doctrine.database_drop_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\DropDatabaseDoctrineCommand
     */
    protected function getDoctrine_DatabaseDropCommandService()
    {
        return $this->services['doctrine.database_drop_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\DropDatabaseDoctrineCommand(${($_ = isset($this->services['doctrine']) ? $this->services['doctrine'] : $this->getDoctrineService()) && false ?: '_'});
    }

    /**
     * Gets the private 'doctrine.database_import_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ImportDoctrineCommand
     */
    protected function getDoctrine_DatabaseImportCommandService()
    {
        return $this->services['doctrine.database_import_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ImportDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.dbal.connection_factory' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\ConnectionFactory
     */
    protected function getDoctrine_Dbal_ConnectionFactoryService()
    {
        return $this->services['doctrine.dbal.connection_factory'] = new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory([]);
    }

    /**
     * Gets the private 'doctrine.ensure_production_settings_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\EnsureProductionSettingsDoctrineCommand
     */
    protected function getDoctrine_EnsureProductionSettingsCommandService()
    {
        return $this->services['doctrine.ensure_production_settings_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\EnsureProductionSettingsDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.generate_entities_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\GenerateEntitiesDoctrineCommand
     */
    protected function getDoctrine_GenerateEntitiesCommandService()
    {
        return $this->services['doctrine.generate_entities_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\GenerateEntitiesDoctrineCommand(${($_ = isset($this->services['doctrine']) ? $this->services['doctrine'] : $this->getDoctrineService()) && false ?: '_'});
    }

    /**
     * Gets the private 'doctrine.mapping_convert_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ConvertMappingDoctrineCommand
     */
    protected function getDoctrine_MappingConvertCommandService()
    {
        return $this->services['doctrine.mapping_convert_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ConvertMappingDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.mapping_import_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\ImportMappingDoctrineCommand
     */
    protected function getDoctrine_MappingImportCommandService()
    {
        return $this->services['doctrine.mapping_import_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\ImportMappingDoctrineCommand(${($_ = isset($this->services['doctrine']) ? $this->services['doctrine'] : $this->getDoctrineService()) && false ?: '_'}, []);
    }

    /**
     * Gets the private 'doctrine.mapping_info_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\InfoDoctrineCommand
     */
    protected function getDoctrine_MappingInfoCommandService()
    {
        return $this->services['doctrine.mapping_info_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\InfoDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.orm.cache.provider.cache.doctrine.orm.default.result' shared service.
     *
     * @return \Symfony\Component\Cache\DoctrineProvider
     */
    protected function getDoctrine_Orm_Cache_Provider_Cache_Doctrine_Orm_Default_ResultService()
    {
        return $this->services['doctrine.orm.cache.provider.cache.doctrine.orm.default.result'] = new \Symfony\Component\Cache\DoctrineProvider(${($_ = isset($this->services['cache.doctrine.orm.default.result']) ? $this->services['cache.doctrine.orm.default.result'] : ($this->services['cache.doctrine.orm.default.result'] = new \Symfony\Component\Cache\Adapter\ArrayAdapter())) && false ?: '_'});
    }

    /**
     * Gets the private 'doctrine.orm.default_entity_listener_resolver' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver
     */
    protected function getDoctrine_Orm_DefaultEntityListenerResolverService()
    {
        return $this->services['doctrine.orm.default_entity_listener_resolver'] = new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver($this);
    }

    /**
     * Gets the private 'doctrine.orm.default_entity_manager.property_info_extractor' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\PropertyInfo\DoctrineExtractor
     */
    protected function getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService()
    {
        return $this->services['doctrine.orm.default_entity_manager.property_info_extractor'] = new \Symfony\Bridge\Doctrine\PropertyInfo\DoctrineExtractor(${($_ = isset($this->services['doctrine.orm.default_entity_manager']) ? $this->services['doctrine.orm.default_entity_manager'] : $this->getDoctrine_Orm_DefaultEntityManagerService()) && false ?: '_'}->getMetadataFactory());
    }

    /**
     * Gets the private 'doctrine.orm.default_listeners.attach_entity_listeners' shared service.
     *
     * @return \Doctrine\ORM\Tools\AttachEntityListenersListener
     */
    protected function getDoctrine_Orm_DefaultListeners_AttachEntityListenersService()
    {
        return $this->services['doctrine.orm.default_listeners.attach_entity_listeners'] = new \Doctrine\ORM\Tools\AttachEntityListenersListener();
    }

    /**
     * Gets the private 'doctrine.orm.default_manager_configurator' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator
     */
    protected function getDoctrine_Orm_DefaultManagerConfiguratorService()
    {
        return $this->services['doctrine.orm.default_manager_configurator'] = new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator([], []);
    }

    /**
     * Gets the private 'doctrine.orm.validator.unique' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator
     */
    protected function getDoctrine_Orm_Validator_UniqueService()
    {
        return $this->services['doctrine.orm.validator.unique'] = new \Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator(${($_ = isset($this->services['doctrine']) ? $this->services['doctrine'] : $this->getDoctrineService()) && false ?: '_'});
    }

    /**
     * Gets the private 'doctrine.orm.validator_initializer' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer
     */
    protected function getDoctrine_Orm_ValidatorInitializerService()
    {
        return $this->services['doctrine.orm.validator_initializer'] = new \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer(${($_ = isset($this->services['doctrine']) ? $this->services['doctrine'] : $this->getDoctrineService()) && false ?: '_'});
    }

    /**
     * Gets the private 'doctrine.query_dql_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\RunDqlDoctrineCommand
     */
    protected function getDoctrine_QueryDqlCommandService()
    {
        return $this->services['doctrine.query_dql_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\RunDqlDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.query_sql_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\RunSqlDoctrineCommand
     */
    protected function getDoctrine_QuerySqlCommandService()
    {
        return $this->services['doctrine.query_sql_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\RunSqlDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.schema_create_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\CreateSchemaDoctrineCommand
     */
    protected function getDoctrine_SchemaCreateCommandService()
    {
        return $this->services['doctrine.schema_create_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\CreateSchemaDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.schema_drop_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\DropSchemaDoctrineCommand
     */
    protected function getDoctrine_SchemaDropCommandService()
    {
        return $this->services['doctrine.schema_drop_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\DropSchemaDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.schema_update_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\UpdateSchemaDoctrineCommand
     */
    protected function getDoctrine_SchemaUpdateCommandService()
    {
        return $this->services['doctrine.schema_update_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\UpdateSchemaDoctrineCommand();
    }

    /**
     * Gets the private 'doctrine.schema_validate_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ValidateSchemaCommand
     */
    protected function getDoctrine_SchemaValidateCommandService()
    {
        return $this->services['doctrine.schema_validate_command'] = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ValidateSchemaCommand();
    }

    /**
     * Gets the private 'doctrine_cache.contains_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineCacheBundle\Command\ContainsCommand
     */
    protected function getDoctrineCache_ContainsCommandService()
    {
        return $this->services['doctrine_cache.contains_command'] = new \Doctrine\Bundle\DoctrineCacheBundle\Command\ContainsCommand();
    }

    /**
     * Gets the private 'doctrine_cache.delete_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineCacheBundle\Command\DeleteCommand
     */
    protected function getDoctrineCache_DeleteCommandService()
    {
        return $this->services['doctrine_cache.delete_command'] = new \Doctrine\Bundle\DoctrineCacheBundle\Command\DeleteCommand();
    }

    /**
     * Gets the private 'doctrine_cache.flush_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineCacheBundle\Command\FlushCommand
     */
    protected function getDoctrineCache_FlushCommandService()
    {
        return $this->services['doctrine_cache.flush_command'] = new \Doctrine\Bundle\DoctrineCacheBundle\Command\FlushCommand();
    }

    /**
     * Gets the private 'doctrine_cache.stats_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineCacheBundle\Command\StatsCommand
     */
    protected function getDoctrineCache_StatsCommandService()
    {
        return $this->services['doctrine_cache.stats_command'] = new \Doctrine\Bundle\DoctrineCacheBundle\Command\StatsCommand();
    }

    /**
     * Gets the private 'filesystem' shared service.
     *
     * @return \Symfony\Component\Filesystem\Filesystem
     */
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem();
    }

    /**
     * Gets the private 'finder' shared service.
     *
     * @return \Symfony\Component\Finder\Finder
     */
    protected function getFinderService()
    {
        return $this->services['finder'] = new \Symfony\Component\Finder\Finder();
    }

    /**
     * Gets the private 'form.type.entity' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\Form\Type\EntityType
     */
    protected function getForm_Type_EntityService()
    {
        return $this->services['form.type.entity'] = new \Symfony\Bridge\Doctrine\Form\Type\EntityType(${($_ = isset($this->services['doctrine']) ? $this->services['doctrine'] : $this->getDoctrineService()) && false ?: '_'});
    }

    /**
     * Gets the private 'form.type_guesser.doctrine' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser
     */
    protected function getForm_TypeGuesser_DoctrineService()
    {
        return $this->services['form.type_guesser.doctrine'] = new \Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser(${($_ = isset($this->services['doctrine']) ? $this->services['doctrine'] : $this->getDoctrineService()) && false ?: '_'});
    }

    /**
     * Gets the private 'hashing' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Crypto\Hashing
     */
    protected function getHashingService()
    {
        return $this->services['hashing'] = new \PrestaShop\PrestaShop\Core\Crypto\Hashing();
    }

    /**
     * Gets the private 'hook_configurator' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Module\HookConfigurator
     */
    protected function getHookConfiguratorService()
    {
        return $this->services['hook_configurator'] = new \PrestaShop\PrestaShop\Core\Module\HookConfigurator(${($_ = isset($this->services['hook_repository']) ? $this->services['hook_repository'] : $this->getHookRepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the private 'hook_provider' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Hook\HookInformationProvider
     */
    protected function getHookProviderService()
    {
        return $this->services['hook_provider'] = new \PrestaShop\PrestaShop\Adapter\Hook\HookInformationProvider();
    }

    /**
     * Gets the private 'hook_repository' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Module\HookRepository
     */
    protected function getHookRepositoryService()
    {
        return $this->services['hook_repository'] = new \PrestaShop\PrestaShop\Core\Module\HookRepository(${($_ = isset($this->services['hook_provider']) ? $this->services['hook_provider'] : ($this->services['hook_provider'] = new \PrestaShop\PrestaShop\Adapter\Hook\HookInformationProvider())) && false ?: '_'}, ${($_ = isset($this->services['shop']) ? $this->services['shop'] : $this->get('shop')) && false ?: '_'}, ${($_ = isset($this->services['db']) ? $this->services['db'] : $this->get('db')) && false ?: '_'});
    }

    /**
     * Gets the private 'prestashop.database.naming_strategy' shared service.
     *
     * @return \PrestaShopBundle\Service\Database\DoctrineNamingStrategy
     */
    protected function getPrestashop_Database_NamingStrategyService()
    {
        return $this->services['prestashop.database.naming_strategy'] = new \PrestaShopBundle\Service\Database\DoctrineNamingStrategy('ps_');
    }

    /**
     * Gets the private 'ps_eventbus' shared service.
     *
     * @return \Ps_eventbus
     */
    protected function getPsEventbusService()
    {
        return $this->services['ps_eventbus'] = \Module::getInstanceByName('ps_eventbus');
    }

    /**
     * Gets the private 'ps_eventbus.context' shared service.
     *
     * @return \Context
     */
    protected function getPsEventbus_ContextService()
    {
        return $this->services['ps_eventbus.context'] = \PrestaShop\Module\PsEventbus\Factory\ContextFactory::getContext();
    }

    /**
     * Gets the private 'ps_eventbus.controller' shared service.
     *
     * @return \Controller
     */
    protected function getPsEventbus_ControllerService()
    {
        return $this->services['ps_eventbus.controller'] = \PrestaShop\Module\PsEventbus\Factory\ContextFactory::getController();
    }

    /**
     * Gets the private 'ps_eventbus.cookie' shared service.
     *
     * @return \Cookie
     */
    protected function getPsEventbus_CookieService()
    {
        return $this->services['ps_eventbus.cookie'] = \PrestaShop\Module\PsEventbus\Factory\ContextFactory::getCookie();
    }

    /**
     * Gets the private 'ps_eventbus.currency' shared service.
     *
     * @return \Currency
     */
    protected function getPsEventbus_CurrencyService()
    {
        return $this->services['ps_eventbus.currency'] = \PrestaShop\Module\PsEventbus\Factory\ContextFactory::getCurrency();
    }

    /**
     * Gets the private 'ps_eventbus.db' shared service.
     *
     * @return \Db
     */
    protected function getPsEventbus_DbService()
    {
        return $this->services['ps_eventbus.db'] = \Db::getInstance();
    }

    /**
     * Gets the private 'ps_eventbus.language' shared service.
     *
     * @return \Language
     */
    protected function getPsEventbus_LanguageService()
    {
        return $this->services['ps_eventbus.language'] = \PrestaShop\Module\PsEventbus\Factory\ContextFactory::getLanguage();
    }

    /**
     * Gets the private 'ps_eventbus.link' shared service.
     *
     * @return \Shop
     */
    protected function getPsEventbus_LinkService()
    {
        return $this->services['ps_eventbus.link'] = \PrestaShop\Module\PsEventbus\Factory\ContextFactory::getLink();
    }

    /**
     * Gets the private 'ps_eventbus.shop' shared service.
     *
     * @return \Shop
     */
    protected function getPsEventbus_ShopService()
    {
        return $this->services['ps_eventbus.shop'] = \PrestaShop\Module\PsEventbus\Factory\ContextFactory::getShop();
    }

    /**
     * Gets the private 'ps_eventbus.smarty' shared service.
     *
     * @return \Smarty
     */
    protected function getPsEventbus_SmartyService()
    {
        return $this->services['ps_eventbus.smarty'] = \PrestaShop\Module\PsEventbus\Factory\ContextFactory::getSmarty();
    }

    /**
     * Gets the private 'ps_metrics.module' shared service.
     *
     * @return \Ps_metrics
     */
    protected function getPsMetrics_ModuleService()
    {
        return $this->services['ps_metrics.module'] = \Module::getInstanceByName('ps_metrics');
    }

    /**
     * Gets the private 'theme_manager' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Addon\Theme\ThemeManager
     */
    protected function getThemeManagerService()
    {
        return $this->services['theme_manager'] = new \PrestaShop\PrestaShop\Core\Addon\Theme\ThemeManager(${($_ = isset($this->services['shop']) ? $this->services['shop'] : $this->get('shop')) && false ?: '_'}, ${($_ = isset($this->services['configuration']) ? $this->services['configuration'] : $this->get('configuration')) && false ?: '_'}, ${($_ = isset($this->services['theme_validator']) ? $this->services['theme_validator'] : ($this->services['theme_validator'] = new \PrestaShop\PrestaShop\Core\Addon\Theme\ThemeValidator())) && false ?: '_'}, ${($_ = isset($this->services['employee']) ? $this->services['employee'] : $this->get('employee')) && false ?: '_'}, ${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem())) && false ?: '_'}, ${($_ = isset($this->services['finder']) ? $this->services['finder'] : ($this->services['finder'] = new \Symfony\Component\Finder\Finder())) && false ?: '_'}, ${($_ = isset($this->services['hook_configurator']) ? $this->services['hook_configurator'] : $this->getHookConfiguratorService()) && false ?: '_'});
    }

    /**
     * Gets the private 'theme_validator' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Addon\Theme\ThemeValidator
     */
    protected function getThemeValidatorService()
    {
        return $this->services['theme_validator'] = new \PrestaShop\PrestaShop\Core\Addon\Theme\ThemeValidator();
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
            'database_host' => '127.0.0.1',
            'database_port' => '',
            'database_name' => 'prestashop_AMD_gaming',
            'database_user' => 'amd_gaming',
            'database_password' => 'OG qJT"qu',
            'database_prefix' => 'ps_',
            'database_engine' => 'InnoDB',
            'mailer_transport' => 'smtp',
            'mailer_host' => '127.0.0.1',
            'mailer_user' => NULL,
            'mailer_password' => NULL,
            'secret' => 'F1Nh86mPE7KMDeknpHeUFGciuH8KJMm9Gn3Astz3LGntYqXocAeZuONEUkQgizrY',
            'ps_caching' => 'CacheMemcache',
            'ps_cache_enable' => false,
            'ps_creation_date' => '2021-07-08',
            'locale' => 'lt-LT',
            'use_debug_toolbar' => true,
            'cookie_key' => 'tEmkvAJ9G9B4u4vOgXnZe8PHKaqz26TVPIH0kpsEvMLuWi9rLVjKF9yGoCaO7wd6',
            'cookie_iv' => 'Gra1wsDJbgjptq9rZNpDvt4qAFvh7AgK',
            'new_cookie_key' => 'def00000ff15a77c5603d9772939b2c99a32cda95f3d2ede0e531193d596ced0b745b1456fc470a7071ad4610db61e0c512e170a7ae307907d5770d4f1e46b103baeda21',
            'cache.driver' => 'array',
            'kernel.bundles' => [

            ],
            'kernel.root_dir' => '/home/povilasbrilius/.atom-projects/prestashop-gaming/app',
            'kernel.project_dir' => '/home/povilasbrilius/.atom-projects/prestashop-gaming',
            'kernel.name' => 'app',
            'kernel.debug' => false,
            'kernel.environment' => 'prod',
            'kernel.cache_dir' => '/home/povilasbrilius/.atom-projects/prestashop-gaming/var/cache/prod/',
            'kernel.active_modules' => [
                0 => 'contactform',
                1 => 'dashactivity',
                2 => 'dashgoals',
                3 => 'dashproducts',
                4 => 'dashtrends',
                5 => 'graphnvd3',
                6 => 'gridhtml',
                7 => 'gsitemap',
                8 => 'pagesnotfound',
                9 => 'productcomments',
                10 => 'ps_banner',
                11 => 'ps_categorytree',
                12 => 'ps_checkpayment',
                13 => 'ps_contactinfo',
                14 => 'ps_crossselling',
                15 => 'ps_currencyselector',
                16 => 'ps_customeraccountlinks',
                17 => 'ps_customersignin',
                18 => 'ps_customtext',
                19 => 'ps_dataprivacy',
                20 => 'ps_emailsubscription',
                21 => 'ps_faviconnotificationbo',
                22 => 'ps_featuredproducts',
                23 => 'ps_imageslider',
                24 => 'ps_languageselector',
                25 => 'ps_linklist',
                26 => 'ps_mainmenu',
                27 => 'ps_searchbar',
                28 => 'ps_sharebuttons',
                29 => 'ps_shoppingcart',
                30 => 'ps_socialfollow',
                31 => 'ps_themecusto',
                32 => 'ps_wirepayment',
                33 => 'sekeywords',
                34 => 'statsbestcategories',
                35 => 'statsbestcustomers',
                36 => 'statsbestproducts',
                37 => 'statsbestsuppliers',
                38 => 'statsbestvouchers',
                39 => 'statscarrier',
                40 => 'statscatalog',
                41 => 'statscheckup',
                42 => 'statsdata',
                43 => 'statsequipment',
                44 => 'statsforecast',
                45 => 'statslive',
                46 => 'statsnewsletter',
                47 => 'statsorigin',
                48 => 'statspersonalinfos',
                49 => 'statsproduct',
                50 => 'statsregistrations',
                51 => 'statssales',
                52 => 'statssearch',
                53 => 'statsstock',
                54 => 'statsvisits',
                55 => 'welcome',
                56 => 'gamification',
                57 => 'psaddonsconnect',
                58 => 'psgdpr',
                59 => 'ps_mbo',
                60 => 'ps_buybuttonlite',
                61 => 'ps_metrics',
                62 => 'ps_accounts',
                63 => 'ps_eventbus',
                64 => 'blockreassurance',
                65 => 'ps_facetedsearch',
                66 => 'paypal',
                67 => 'skrill',
                68 => 'ps_cashondelivery',
            ],
            'ps_cache_dir' => '/home/povilasbrilius/.atom-projects/prestashop-gaming/var/cache/prod/',
            'mail_themes_uri' => '/mails/themes',
            'doctrine_cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine_cache.apcu.class' => 'Doctrine\\Common\\Cache\\ApcuCache',
            'doctrine_cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine_cache.chain.class' => 'Doctrine\\Common\\Cache\\ChainCache',
            'doctrine_cache.couchbase.class' => 'Doctrine\\Common\\Cache\\CouchbaseCache',
            'doctrine_cache.couchbase.connection.class' => 'Couchbase',
            'doctrine_cache.couchbase.hostnames' => 'localhost:8091',
            'doctrine_cache.file_system.class' => 'Doctrine\\Common\\Cache\\FilesystemCache',
            'doctrine_cache.php_file.class' => 'Doctrine\\Common\\Cache\\PhpFileCache',
            'doctrine_cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine_cache.memcache.connection.class' => 'Memcache',
            'doctrine_cache.memcache.host' => 'localhost',
            'doctrine_cache.memcache.port' => 11211,
            'doctrine_cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine_cache.memcached.connection.class' => 'Memcached',
            'doctrine_cache.memcached.host' => 'localhost',
            'doctrine_cache.memcached.port' => 11211,
            'doctrine_cache.mongodb.class' => 'Doctrine\\Common\\Cache\\MongoDBCache',
            'doctrine_cache.mongodb.collection.class' => 'MongoCollection',
            'doctrine_cache.mongodb.connection.class' => 'MongoClient',
            'doctrine_cache.mongodb.server' => 'localhost:27017',
            'doctrine_cache.predis.client.class' => 'Predis\\Client',
            'doctrine_cache.predis.scheme' => 'tcp',
            'doctrine_cache.predis.host' => 'localhost',
            'doctrine_cache.predis.port' => 6379,
            'doctrine_cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine_cache.redis.connection.class' => 'Redis',
            'doctrine_cache.redis.host' => 'localhost',
            'doctrine_cache.redis.port' => 6379,
            'doctrine_cache.riak.class' => 'Doctrine\\Common\\Cache\\RiakCache',
            'doctrine_cache.riak.bucket.class' => 'Riak\\Bucket',
            'doctrine_cache.riak.connection.class' => 'Riak\\Connection',
            'doctrine_cache.riak.bucket_property_list.class' => 'Riak\\BucketPropertyList',
            'doctrine_cache.riak.host' => 'localhost',
            'doctrine_cache.riak.port' => 8087,
            'doctrine_cache.sqlite3.class' => 'Doctrine\\Common\\Cache\\SQLite3Cache',
            'doctrine_cache.sqlite3.connection.class' => 'SQLite3',
            'doctrine_cache.void.class' => 'Doctrine\\Common\\Cache\\VoidCache',
            'doctrine_cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine_cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine_cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine_cache.security.acl.cache.class' => 'Doctrine\\Bundle\\DoctrineCacheBundle\\Acl\\Model\\AclCache',
            'doctrine.dbal.logger.chain.class' => 'Doctrine\\DBAL\\Logging\\LoggerChain',
            'doctrine.dbal.logger.profiling.class' => 'Doctrine\\DBAL\\Logging\\DebugStack',
            'doctrine.dbal.logger.class' => 'Symfony\\Bridge\\Doctrine\\Logger\\DbalLogger',
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Doctrine\\Bundle\\DoctrineBundle\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Symfony\\Bridge\\Doctrine\\ContainerAwareEventManager',
            'doctrine.dbal.connection_factory.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Registry',
            'doctrine.entity_managers' => [
                'default' => 'doctrine.orm.default_entity_manager',
            ],
            'doctrine.default_entity_manager' => 'default',
            'doctrine.dbal.connection_factory.types' => [

            ],
            'doctrine.connections' => [
                'default' => 'doctrine.dbal.default_connection',
            ],
            'doctrine.default_connection' => 'default',
            'doctrine.orm.configuration.class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager.class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.manager_configurator.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ManagerConfigurator',
            'doctrine.orm.cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance.class' => 'Memcache',
            'doctrine.orm.cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine.orm.cache.memcached_host' => 'localhost',
            'doctrine.orm.cache.memcached_port' => 11211,
            'doctrine.orm.cache.memcached_instance.class' => 'Memcached',
            'doctrine.orm.cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine.orm.cache.redis_host' => 'localhost',
            'doctrine.orm.cache.redis_port' => 6379,
            'doctrine.orm.cache.redis_instance.class' => 'Redis',
            'doctrine.orm.cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine.orm.cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine.orm.metadata.driver_chain.class' => 'Doctrine\\Common\\Persistence\\Mapping\\Driver\\MappingDriverChain',
            'doctrine.orm.metadata.annotation.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.xml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedXmlDriver',
            'doctrine.orm.metadata.yml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedYamlDriver',
            'doctrine.orm.metadata.php.class' => 'Doctrine\\ORM\\Mapping\\Driver\\PHPDriver',
            'doctrine.orm.metadata.staticphp.class' => 'Doctrine\\ORM\\Mapping\\Driver\\StaticPHPDriver',
            'doctrine.orm.proxy_cache_warmer.class' => 'Symfony\\Bridge\\Doctrine\\CacheWarmer\\ProxyCacheWarmer',
            'form.type_guesser.doctrine.class' => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser',
            'doctrine.orm.validator.unique.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator',
            'doctrine.orm.validator_initializer.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\DoctrineInitializer',
            'doctrine.orm.security.user.provider.class' => 'Symfony\\Bridge\\Doctrine\\Security\\User\\EntityUserProvider',
            'doctrine.orm.listeners.resolve_target_entity.class' => 'Doctrine\\ORM\\Tools\\ResolveTargetEntityListener',
            'doctrine.orm.listeners.attach_entity_listeners.class' => 'Doctrine\\ORM\\Tools\\AttachEntityListenersListener',
            'doctrine.orm.naming_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultNamingStrategy',
            'doctrine.orm.naming_strategy.underscore.class' => 'Doctrine\\ORM\\Mapping\\UnderscoreNamingStrategy',
            'doctrine.orm.quote_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultQuoteStrategy',
            'doctrine.orm.quote_strategy.ansi.class' => 'Doctrine\\ORM\\Mapping\\AnsiQuoteStrategy',
            'doctrine.orm.entity_listener_resolver.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Mapping\\ContainerEntityListenerResolver',
            'doctrine.orm.second_level_cache.default_cache_factory.class' => 'Doctrine\\ORM\\Cache\\DefaultCacheFactory',
            'doctrine.orm.second_level_cache.default_region.class' => 'Doctrine\\ORM\\Cache\\Region\\DefaultRegion',
            'doctrine.orm.second_level_cache.filelock_region.class' => 'Doctrine\\ORM\\Cache\\Region\\FileLockRegion',
            'doctrine.orm.second_level_cache.logger_chain.class' => 'Doctrine\\ORM\\Cache\\Logging\\CacheLoggerChain',
            'doctrine.orm.second_level_cache.logger_statistics.class' => 'Doctrine\\ORM\\Cache\\Logging\\StatisticsCacheLogger',
            'doctrine.orm.second_level_cache.cache_configuration.class' => 'Doctrine\\ORM\\Cache\\CacheConfiguration',
            'doctrine.orm.second_level_cache.regions_configuration.class' => 'Doctrine\\ORM\\Cache\\RegionsConfiguration',
            'doctrine.orm.auto_generate_proxy_classes' => false,
            'doctrine.orm.proxy_dir' => '/home/povilasbrilius/.atom-projects/prestashop-gaming/var/cache/prod//doctrine/orm/Proxies',
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'ps_eventbus.proxy_api_url' => 'https://eventbus-proxy.psessentials.net',
            'ps_eventbus.sync_api_url' => 'https://eventbus-sync.psessentials.net',
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
