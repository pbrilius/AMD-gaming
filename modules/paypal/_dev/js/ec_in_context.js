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

// init in-context
$(document).ready( () => {
  window.paypalCheckoutReady = () => paypal.checkout.setup(merchant_id, {environment: environment});
  enableConfirmationButton();
});

window.ECInContext = () => {
    // Init Express checkout method
    paypal.checkout.closeFlow();
    paypal.checkout.initXO();
    $.support.cors = true;
    $.ajax({
        url: url_token,
        type: 'GET',
        success: (json) => {
            enableConfirmationButton();
            if (json.success) {
                var url = paypal.checkout.urlPrefix +json.token + "&useraction=commit";
                paypal.checkout.startFlow(url);
            } else {
                paypal.checkout.closeFlow();
                window.location.replace(json.redirect_link);
            }
        },
        error: function (responseData, textStatus, errorThrown) {
            alert(`Error in ajax post ${responseData.statusText}`);
            paypal.checkout.closeFlow();
        }
    });
}

// Remove disable attribute from confirmation button if checkbox is checked
const enableConfirmationButton = () => {
  if ($('#conditions-to-approve').find('input[type="checkbox"]').is(':checked')) {
    $('#payment-confirmation').find('button[type="submit"]').attr('disabled', false);
  }
}
