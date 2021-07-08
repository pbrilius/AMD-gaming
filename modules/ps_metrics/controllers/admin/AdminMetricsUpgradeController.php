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
use PrestaShop\PrestaShop\Core\Addon\Module\ModuleManagerBuilder;

class AdminMetricsUpgradeController extends ModuleAdminController
{
    /**
     * @var Ps_metrics
     */
    public $module;

    /**
     * @var LinkAdapter
     */
    public $linkAdapter;

    /**
     * @return void
     *
     * @throws Exception
     */
    public function init()
    {
        /* @var LinkAdapter $linkAdapter */
        $this->linkAdapter = $this->module->getService('ps_metrics.adapter.link');
        parent::init();

        $upgraded = ((true === (bool) version_compare(_PS_VERSION_, '1.7', '>='))) ? $this->upgrade17() : $this->upgrade16();

        $url = $this->linkAdapter->getAdminLink($this->module->metricsStatsController);
        if ($upgraded) {
            $url .= '&upgraded=1';
        }
        Tools::redirect($url);
    }

    /**
     * @return bool
     *
     * @throws Exception
     */
    private function upgrade17()
    {
        if (true === \Module::needUpgrade($this->module)) {
            /** @var ModuleManagerBuilder $moduleManagerBuilder */
            $moduleManagerBuilder = ModuleManagerBuilder::getInstance();
            $moduleManager = $moduleManagerBuilder->build();

            return $moduleManager->upgrade($this->module->name);
        }

        return true;
    }

    /**
     * @return bool
     */
    private function upgrade16()
    {
        file_put_contents(_PS_MODULE_DIR_ . 'ps_metrics.zip', \Tools::addonsRequest('module', ['id_module' => $this->module->idPsMetrics]));
        \Tools::ZipExtract(_PS_MODULE_DIR_ . 'ps_metrics.zip', _PS_MODULE_DIR_);
        if (\Module::initUpgradeModule($this->module)) {
            $upgraded = $this->module->runUpgradeModule();

            return !empty($upgraded['success']);
        }

        return false;
    }
}
