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

namespace PrestaShop\Module\Ps_metrics\Translation;

use PrestaShop\Module\Ps_metrics\Context\PrestaShopContext;
use Ps_metrics;

class SettingsTranslation
{
    /**
     * @var Ps_metrics
     */
    private $module;

    /**
     * @var PrestaShopContext
     */
    private $prestashopContext;

    /**
     * __construct
     *
     * @param Ps_metrics $module
     * @param PrestaShopContext $prestashopContext
     *
     * @return void
     */
    public function __construct(Ps_metrics $module, PrestaShopContext $prestashopContext)
    {
        $this->module = $module;
        $this->prestashopContext = $prestashopContext;
    }

    /**
     * Create all translations for Settings App
     *
     * @return array translation list
     */
    public function getTranslations()
    {
        $locale = $this->prestashopContext->getLanguageIsoCode();

        $translations[$locale] = [
            'general' => [
                'settings' => $this->module->l('Settings', 'SettingsTranslation'),
                'help' => $this->module->l('Help', 'SettingsTranslation'),
            ],
            'configure' => [
                'incentivePanel' => [
                    'title' => $this->module->l('PrestaShop Metrics - A trusted place for your data', 'SettingsTranslation'),
                    'gather' => $this->module->l('Gather all your data in one place', 'SettingsTranslation'),
                    'monitor' => $this->module->l('Monitor easily your business on a daily basis', 'SettingsTranslation'),
                    'decisions' => $this->module->l('Make decisions for your business based on trusted KPIs', 'SettingsTranslation'),
                    'howTo' => $this->module->l('How to activate it? An easy 2-steps process :', 'SettingsTranslation'),
                    'connectToPs' => $this->module->l('Connect your PrestaShop account', 'SettingsTranslation'),
                    'addSources' => $this->module->l('Add data sources', 'SettingsTranslation'),
                    'congrats' => $this->module->l('Congrats ! You\'re all set !', 'SettingsTranslation'),
                ],
                'dataSources' => [
                    'title' => $this->module->l('Add data sources', 'SettingsTranslation'),
                    'subTitle' => $this->module->l('PrestaShop Metrics will use data about: sessions, unique visitors, traffic per channel', 'SettingsTranslation'),
                    'firstSourceConnected1' => $this->module->l('The data of your store is well connected, and displayed in your', 'SettingsTranslation'),
                    'firstSourceConnected2' => $this->module->l('dashboard', 'SettingsTranslation'),
                    'firstSourceConnected3' => $this->module->l('for an optimal and complete use of this module, it is recommended to connect your Google Analytics account below :', 'SettingsTranslation'),
                    'allSourcesConnected' => $this->module->l('Congrats ! All the data sources of your store are well connected and displayed in your dashboard.', 'SettingsTranslation'),
                    'syncStatus' => $this->module->l('Status of the sync:', 'SettingsTranslation'),
                    'comingSoon' => $this->module->l('Coming soon', 'SettingsTranslation'),
                    'knowMore' => $this->module->l('Know more', 'SettingsTranslation'),
                    'openmetrics' => $this->module->l('Open Metrics', 'SettingsTranslation'),
                    'scheduled' => $this->module->l('Sync scheduled', 'SettingsTranslation'),
                    'syncing' => $this->module->l('Sync in progress', 'SettingsTranslation'),
                    'done' => $this->module->l('Sync done', 'SettingsTranslation'),
                    'googleAnalytics' => [
                        'title' => $this->module->l('Google Analytics', 'SettingsTranslation'),
                        'connectGoogleAnalytics' => $this->module->l('Connect Google Analytics', 'SettingsTranslation'),
                        'useAnotherAccount' => $this->module->l('Use another account', 'SettingsTranslation'),
                        'logOut' => $this->module->l('Log out', 'SettingsTranslation'),
                        'logOutModal' => [
                            'title' => $this->module->l('Are you sure you want to Logout?', 'SettingsTranslation'),
                            'cancel' => $this->module->l('Cancel', 'SettingsTranslation'),
                            'confirm' => $this->module->l('Confirm', 'SettingsTranslation'),
                        ],
                        'changeGaProperties' => $this->module->l('Change Google Analytics property', 'SettingsTranslation'),
                        'modal' => [
                            'selectTag' => $this->module->l('Select this property', 'SettingsTranslation'),
                            'title' => $this->module->l('Select one Google Analytics property', 'SettingsTranslation'),
                            'subTitle' => $this->module->l('to get right data'),
                            'close' => $this->module->l('Close'),
                            'notFoundedTag' => $this->module->l('No tags found'),
                        ],
                    ],
                    'shop' => [
                        'description' => $this->module->l('PrestaShop Metrics will use data about: total revenue, revenue per category, orders, average order value, abandoned carts rate, new or returning customer status, etc.', 'SettingsTranslation'),
                    ],
                    'alert' => [
                        'noTagAvailable' => [
                            'message' => $this->module->l('It looks like no tag has been installed on your store yet. You can configure one easily using our free Google Analytics module.', 'SettingsTranslation'),
                            'linkInstall' => $this->module->l('Click here to install this module.', 'SettingsTranslation'),
                            'linkEnable' => $this->module->l('Click here to enable this module.', 'SettingsTranslation'),
                            'linkConfigure' => $this->module->l('Click here to configure this module.', 'SettingsTranslation'),
                        ],
                        'notLinked' => [
                            'message' => $this->module->l('A tag has been found on your store but it seems that its property is not linked to your Google Analytics account.', 'SettingsTranslation'),
                            'link' => $this->module->l('Find more information in our FAQ.', 'SettingsTranslation'),
                        ],
                        'noCorrespondingTag' => [
                            'message' => $this->module->l('The property you selected doesn\'t match with the tag configured in your shop. Select another property or configure another tag.', 'SettingsTranslation'),
                            'link' => $this->module->l('Find more information in our FAQ.', 'SettingsTranslation'),
                        ],
                        'errorGoogle' => [
                            'message' => $this->module->l('It looks like you don\'t have a google analytics account.', 'SettingsTranslation'),
                            'messageError' => $this->module->l('It seems you have a problem with your Google Analytics account.'),
                            'link' => $this->module->l('Find more information in our FAQ.', 'SettingsTranslation'),
                        ],
                        'noTag' => [
                            'message' => $this->module->l('It looks like you don\'t have a tag (UA-XXXXX-X) on your google analytics account.', 'SettingsTranslation'),
                            'link' => $this->module->l('Find more information in our FAQ.', 'SettingsTranslation'),
                        ],
                        'linked' => [
                            'message' => $this->module->l('PrestaShop Metrics is now fully configured!', 'SettingsTranslation'),
                            'link' => $this->module->l('Find all your reliable data on your dashboard.', 'SettingsTranslation'),
                        ],
                    ],
                ],
            ],
            'help' => [
                'title' => $this->module->l('Help for PrestaShop Metrics', 'SettingsTranslation'),
                'allowsYouTo' => [
                    'title' => $this->module->l('This module allows you to:', 'SettingsTranslation'),
                    'connect' => $this->module->l('Connect to your PrestaShop account and collect reliable data from your store and Google Analytics', 'SettingsTranslation'),
                    'collect' => $this->module->l('Make decisions for your business based on trusted KPIs and valuable insights.', 'SettingsTranslation'),
                    'benefit' => $this->module->l('Save time with a unique and clean dashboard', 'SettingsTranslation'),
                ],
                'help' => [
                    'needHelp' => $this->module->l('Need help? Find here the documentation of this module.', 'SettingsTranslation'),
                    'downloadPdf' => $this->module->l('Download PDF', 'SettingsTranslation'),
                    'couldntFindAnyAnswer' => $this->module->l('Couldn\'t find any answer to your question?', 'SettingsTranslation'),
                    'contactUs' => $this->module->l('Contact us', 'SettingsTranslation'),
                ],
            ],
            'faq' => [
                'title' => $this->module->l('FAQ', 'SettingsTranslation'),
                'noFaq' => $this->module->l('No FAQ available.', 'SettingsTranslation'),
            ],

            'features' => [
                'selectYourPlan' => $this->module->l('Select your plan', 'SettingsTranslation'),
                'back' => $this->module->l('Back', 'SettingsTranslation'),
            ],
        ];

        return $translations;
    }
}
