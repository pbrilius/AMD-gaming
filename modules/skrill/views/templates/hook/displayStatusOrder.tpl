{**
* 2015 Skrill
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
*
*  @author Skrill <contact@skrill.com>
*  @copyright  2015 Skrill
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{if $module == "skrill"}
    <script>
        $(document).ready(function() {
            $('#desc-order-standard_refund').css("display","none");
            var refundButton = {$refundButton|escape:'htmlall':'UTF-8'};
            if (refundButton) {
                var refund = '<a id="skrillRefund" class="btn btn-default"><i class="icon-exchange"></i> Refund</a>'
                $('#desc-order-partial_refund').after(refund);
                $('#skrillRefund').click(function(event){
                    event.preventDefault();
                    $("#skrillRefundOrder").click();
                });
            }
        });
    </script>

    {if !empty($warningMessage)}
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {if $warningMessage == "refund"}
                {if {l s='SUCCESS_GENERAL_REFUND_PAYMENT_PENDING' mod='skrill'} == "SUCCESS_GENERAL_REFUND_PAYMENT_PENDING"}Your attempt to refund the payment is pending.{else}{l s='SUCCESS_GENERAL_REFUND_PAYMENT_PENDING' mod='skrill'}{/if}
            {/if}
        </div>
    {/if}
    {if !empty($successMessage)}
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {if $successMessage == "refund"}
                {if {l s='SUCCESS_GENERAL_REFUND_PAYMENT' mod='skrill'} == "SUCCESS_GENERAL_REFUND_PAYMENT"}Your attempt to refund the payment success.{else}{l s='SUCCESS_GENERAL_REFUND_PAYMENT' mod='skrill'}{/if}
            {elseif $successMessage == "updateOrder"}
                {if {l s='SUCCESS_GENERAL_UPDATE_PAYMENT' mod='skrill'} == "SUCCESS_GENERAL_UPDATE_PAYMENT"}The payment status has been successfully updated.{else}{l s='SUCCESS_GENERAL_UPDATE_PAYMENT' mod='skrill'}{/if}
            {/if}
        </div>
    {/if}
    {if !empty($errorMessage)}
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {if $errorMessage == "refund"}
                {if {l s='ERROR_GENERAL_REFUND_PAYMENT' mod='skrill'} == "ERROR_GENERAL_REFUND_PAYMENT"}Unfortunately, your attempt to refund the payment failed.{else}{l s='ERROR_GENERAL_REFUND_PAYMENT' mod='skrill'}{/if}
            {elseif $errorMessage == "updateOrder"}
                {if {l s='ERROR_UPDATE_BACKEND' mod='skrill'} == "ERROR_UPDATE_BACKEND"}Order status can not be updated. {else}{l s='ERROR_UPDATE_BACKEND' mod='skrill'}{/if}
            {/if}
        </div>
    {/if}
{/if}
