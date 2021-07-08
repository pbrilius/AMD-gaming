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

use PrestaShop\Module\Ps_metrics\Adapter\LinkAdapter;
use PrestaShop\Module\Ps_metrics\Helper\ModuleHelper;
use PrestaShop\Module\Ps_metrics\Helper\ToolsHelper;

class GAInstaller
{
    /**
     * @var string
     */
    private $moduleName = 'ps_googleanalytics';

    /**
     * @var LinkAdapter
     */
    private $linkAdapter;

    /**
     * @var ModuleHelper
     */
    private $moduleHelper;

    /**
     * @var ToolsHelper
     */
    private $toolsHelper;

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * GAInstaller constructor.
     *
     * @param LinkAdapter $linkAdapter
     * @param ModuleHelper $moduleHelper
     * @param ToolsHelper $toolsHelper
     *
     * @return void
     */
    public function __construct(LinkAdapter $linkAdapter, ModuleHelper $moduleHelper, ToolsHelper $toolsHelper)
    {
        $this->linkAdapter = $linkAdapter;
        $this->moduleHelper = $moduleHelper;
        $this->toolsHelper = $toolsHelper;
    }

    /**
     * Return shop is on 1.7
     *
     * @return bool
     */
    private function isShop173()
    {
        return version_compare(_PS_VERSION_, '1.7.3.0', '>=');
    }

    /**
     * Check if google analytics module is installed or not
     *
     * @return bool
     */
    public function isInstalled()
    {
        return $this->moduleHelper->isInstalled($this->moduleName);
    }

    /**
     * Check if google analytics module is enabled or not
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->moduleHelper->isEnabled($this->moduleName);
    }

    /**
     * returns the installation link of the ps_googleanalytics module if it is not installed. If installed, returns an empty string
     *
     * @return string
     */
    public function getInstallLink()
    {
        if (true === $this->moduleHelper->isInstalled($this->moduleName)) {
            return '';
        }

        if ($this->isShop173()) {
            $router = $this->get('router');

            return substr($this->toolsHelper->getShopDomainSsl(true) . __PS_BASE_URI__, 0, -1) . $router->generate('admin_module_manage_action', [
                    'action' => 'install',
                    'module_name' => $this->moduleName,
                ]);
        }

        return $this->linkAdapter->getAdminLink('AdminModules', true, [], [
            'module_name' => $this->moduleName,
            'install' => $this->moduleName,
        ]);
    }

    /**
     * Override of native function to always retrieve Symfony container instead of legacy admin container on legacy context.
     *
     * @param string $serviceName
     *
     * @return mixed
     */
    private function get($serviceName)
    {
        if (null === $this->container) {
            $this->container = \PrestaShop\PrestaShop\Adapter\SymfonyContainer::getInstance();
        }

        return $this->container->get($serviceName);
    }

    /**
     * returns the enable link of the ps_googleanalytics module if it is not enabled. If enabled, returns an empty string
     *
     * @return string
     */
    public function getEnableLink()
    {
        if (true === $this->moduleHelper->isEnabled($this->moduleName)) {
            return '';
        }

        if ($this->isShop173()) {
            $router = $this->get('router');

            return substr($this->toolsHelper->getShopDomainSsl(true) . __PS_BASE_URI__, 0, -1) . $router->generate('admin_module_manage_action', [
                    'action' => 'enable',
                    'module_name' => $this->moduleName,
                ]);
        }

        return $this->linkAdapter->getAdminLink('AdminModules', true, [], [
            'module_name' => $this->moduleName,
            'enable' => '1',
        ]);
    }

    /**
     * returns the configuration link of the ps_googleanalytics module if it is not configured. If configured, returns an empty string
     *
     * @return string
     */
    public function getConfigLink()
    {
        return $this->linkAdapter->getAdminLink('AdminModules', true, [], [
            'configure' => $this->moduleName,
        ]);
    }
}
