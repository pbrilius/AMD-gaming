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

namespace PrestaShop\Module\Ps_metrics\Module;

use Hook;
use Language;
use PrestaShop\Module\Ps_metrics\Repository\ConfigurationRepository;
use PrestaShop\Module\Ps_metrics\Repository\HookModuleRepository;
use Ps_metrics;
use Tab;

class Install
{
    /**
     * @var Ps_metrics
     */
    private $module;

    /**
     * @var ConfigurationRepository
     */
    private $configurationRepository;

    /**
     * @var HookModuleRepository
     */
    private $hookModuleRepository;

    /**
     * @var string
     */
    private $psVersion;

    /**
     * Install constructor.
     *
     * @param Ps_metrics $module
     * @param ConfigurationRepository $configurationRepository
     * @param HookModuleRepository $hookModuleRepository
     *
     * @return void
     */
    public function __construct(Ps_metrics $module, ConfigurationRepository $configurationRepository, HookModuleRepository $hookModuleRepository)
    {
        $this->module = $module;
        $this->configurationRepository = $configurationRepository;
        $this->hookModuleRepository = $hookModuleRepository;
        $this->psVersion = _PS_VERSION_;
    }

    /**
     * updateModuleHookPosition
     *
     * @param string $hookName
     * @param int $position
     *
     * @return bool
     */
    public function updateModuleHookPosition($hookName, $position)
    {
        $hookId = Hook::getIdByName($hookName);

        if (false == $hookId) {
            return false;
        }

        return $this->hookModuleRepository->setModuleHookPosition($hookId, $this->module->id, $position);
    }

    /**
     * setConfigurationValues
     *
     * @return bool
     */
    public function setConfigurationValues()
    {
        return $this->configurationRepository->saveActionGoogleLinked(false) &&
            $this->configurationRepository->saveGoogleTagLinked(false) &&
            $this->configurationRepository->saveDashboardModulesToToggle();
    }

    /**
     * This method is often use to create an ajax controller
     *
     * @return bool
     *
     * @todo Change Language by context lang ?
     */
    public function installTabs()
    {
        $installTabCompleted = true;

        foreach ($this->module->controllers as $controllerName) {
            if (Tab::getIdFromClassName($controllerName)) {
                continue;
            }

            $tab = new Tab();
            if (
                $controllerName === $this->module->legacyStatsController &&
                version_compare($this->psVersion, '1.7.0.0', '>')
            ) {
                $legacyStatsTab = new Tab(Tab::getIdFromClassName('AdminStats'));
                $tab->name = $legacyStatsTab->name;
            } else {
                $tab->name = array_fill_keys(
                    Language::getIDs(false),
                    $this->module->displayName
                );
            }

            if (
                $controllerName === $this->module->metricsStatsController ||
                ($controllerName === $this->module->legacyStatsController &&
                    version_compare($this->psVersion, '1.7.0.0', '>'))
            ) {
                $tab->id_parent = Tab::getIdFromClassName('AdminStats');
            } else {
                $tab->id_parent = $this->getTabParentIdByController($controllerName);
            }

            $tab->class_name = $controllerName;
            $tab->active = true;
            $tab->module = $this->module->name;

            $installTabCompleted = $installTabCompleted && $tab->add();
        }

        return $installTabCompleted;
    }

    /**
     * Get the correct id parent tab depending on the controller
     *
     * @param string $controllerName
     * @param int $categoryId
     *
     * @return int
     */
    private function getTabParentIdByController($controllerName, $categoryId = -1)
    {
        switch ($controllerName) {
            case 'AdminMetricsStats':
                return $categoryId;
            default:
                return -1;
        }
    }
}
