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

use PrestaShop\Module\Ps_metrics\Repository\ConfigurationRepository;
use PrestaShop\Module\Ps_metrics\Tracker\Segment;

class DashboardModules
{
    /**
     * @var \Ps_metrics
     */
    private $module;

    /**
     * @var ConfigurationRepository
     */
    private $configurationRepository;

    /**
     * @var array
     */
    private $moduleList = [
        'dashactivity',
        'dashtrends',
        'dashgoals',
        'dashproducts',
    ];

    /**
     * DashboardModules constructor.
     *
     * @param \Ps_metrics $module
     * @param ConfigurationRepository $configurationRepository
     */
    public function __construct(
        \Ps_metrics $module,
        ConfigurationRepository $configurationRepository
    ) {
        $this->module = $module;
        $this->configurationRepository = $configurationRepository;
    }

    /**
     * Enable back dashboard modules
     *
     * @return array|bool return the list of module that has been enabled or true if there no module to enable back
     */
    public function enableModules()
    {
        // retrieve module list to enable
        $moduleListToEnable = $this->configurationRepository->getDashboardModulesToToggle();

        // if the module list is empty, do nothing
        if (empty($moduleListToEnable)) {
            return true;
        }

        foreach ($moduleListToEnable as $moduleName) {
            $module = \Module::getInstanceByName($moduleName);
            if (false !== $module) {
                $module->enable();
            }
        }

        // now that modules has been enabled back again, reset the list from database
        $this->configurationRepository->saveDashboardModulesToToggle();

        /** @var Segment $segment */
        $segment = $this->module->getService('ps_metrics.tracker.segment');
        $segment->setMessage('[MTR] Enable Overview Modules');
        $segment->track();

        return $moduleListToEnable;
    }

    /**
     * Disable dashboard modules
     *
     * @return array return the list of module that has been disabled
     */
    public function disableModules()
    {
        // get module to disable
        $modulesToDisable = $this->getModuleToToggle();
        $disabledModuleList = [];

        foreach ($modulesToDisable as $moduleName => $isEnabled) {
            // only disable modules that is currently enable
            if ($isEnabled) {
                $module = \Module::getInstanceByName($moduleName);
                if (false !== $module) {
                    $module->disable();
                    array_push($disabledModuleList, $moduleName);
                }
            }
        }

        // save to database the list of module that has been disable by metrics in order to be able
        // to turn it on if needed
        $this->configurationRepository->saveDashboardModulesToToggle($disabledModuleList);

        /** @var Segment $segment */
        $segment = $this->module->getService('ps_metrics.tracker.segment');
        $segment->setMessage('[MTR] Disable Overview Modules');
        $segment->track();

        return $disabledModuleList;
    }

    /**
     * Get the current state of dashboard modules
     * We presuming that modules is enabled if the disabled module list in database is empty
     *
     * @return bool
     */
    public function modulesIsEnabled()
    {
        return empty($this->configurationRepository->getDashboardModulesToToggle());
    }

    /**
     * Create a list of module from the default list in order to know which modules is
     * currently enabled or disabled on the shop
     *
     * @return array
     */
    private function getModuleToToggle()
    {
        $modules = [];

        foreach ($this->moduleList as $moduleName) {
            $isModuleEnabled = \Module::isEnabled($moduleName);
            $modules[$moduleName] = $isModuleEnabled;
        }

        return $modules;
    }
}
