{*
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
*  @author 2007-2021 PayPal
*  @copyright PayPal
*  @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
*
*}

<style>
  .product-quantity {
    flex-wrap: wrap;
  }

  .product-quantity [installment-container] {
    flex-basis: 100%;
  }
</style>

<div style="padding: 5px 0">
    {include file='./banner.tpl'}
</div>

<script>
    Banner.prototype.updateAmount = function() {
        var quantity = parseFloat(document.querySelector('input[name="qty"]').value);
        var productPrice = parseFloat(document.querySelector('[itemprop="price"]').getAttribute('content'));
        this.amount = quantity * productPrice;
    };

    window.addEventListener('load', function() {
        var paypalBanner = new Banner({
            layout: layout,
            placement: placement,
            container: '[paypal-banner-message]'
        });
        paypalBanner.updateAmount();
        paypalBanner.initBanner();

        prestashop.on('updatedProduct', function() {
            paypalBanner.updateAmount();
            paypalBanner.initBanner();
        });
    });
</script>
