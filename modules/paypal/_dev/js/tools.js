/*
 * 2007-2021 PayPal
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
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author 2007-2021 PayPal
 * @copyright PayPal
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

export const Tools = {
  // Show error message
  getAlert(message, typeAlert) {
    const alert = document.createElement('div');
    let messageNode = document.createElement('div');
    messageNode.innerHTML = message;
    alert.className = `alert alert-${typeAlert}`;
    alert.appendChild(messageNode);
    return alert;
  },

  hideConfiguration(name) {
    let selector = `[name="${name}"]`;
    let configuration = $(selector);
    let formGroup = configuration.closest('.col-lg-9').closest('.form-group');

    formGroup.hide();
  },

  showConfiguration(name) {
    let selector = `[name="${name}"]`;
    let configuration = $(selector);
    let formGroup = configuration.closest('.col-lg-9').closest('.form-group');

    formGroup.show();
  },

  isVisible(el) {
    const style = window.getComputedStyle(el);
    return  style.width !== "0" &&
      style.height !== "0" &&
      style.opacity !== "0" &&
      style.display!=='none' &&
      style.visibility!== 'hidden';
  }
}
