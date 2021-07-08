<?php
/**
* 2015 Skrill
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
*  @author    Skrill <contact@skrill.com>
*  @copyright 2015 Skrill
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of Skrill
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_2_0_11()
{
    Configuration::updateValue('SKRILL_ADB_ACTIVE', '1');
    Configuration::updateValue('SKRILL_ADB_MODE', '1');
    Configuration::updateValue('SKRILL_AOB_ACTIVE', '1');
    Configuration::updateValue('SKRILL_AOB_MODE', '1');
    Configuration::updateValue('SKRILL_ACI_ACTIVE', '1');
    Configuration::updateValue('SKRILL_ACI_MODE', '1');
    Configuration::updateValue('SKRILL_AUP_ACTIVE', '1');
    Configuration::updateValue('SKRILL_AUP_MODE', '1');

    return true;
}
