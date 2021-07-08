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

<form id="module_form" class="defaultForm form-horizontal" action="{$currentIndex|escape:'htmlall':'UTF-8'}" method="post" enctype="multipart/form-data">
<div class="panel">
	<div class="form-group border-none">
		<div class="col-lg-2 logo-wrapper">
			<img src="{$thisPath|escape:'htmlall':'UTF-8'}views/img/{$payments.0.type|escape:'htmlall':'UTF-8'}.jpg" alt="{$payments.0.type|escape:'htmlall':'UTF-8'}" class="payment-config-logo">
		</div>
		<label class="payment-label col-lg-3">
			{$payments.0.title|escape:'htmlall':'UTF-8'}
		</label>
		<div class="col-lg-3">
			<div class="col-lg-4 control-label switch-label">{$label.active|escape:'htmlall':'UTF-8'}</div>
			<div class="col-lg-6 switch prestashop-switch fixed-width-lg">
				<input type="radio" name="SKRILL_{$payments.0.brand|escape:'htmlall':'UTF-8'}_ACTIVE" id="SKRILL_{$payments.0.brand|escape:'htmlall':'UTF-8'}_ACTIVE_on" value="1"  {if ($payments.0.active == 1)}checked="checked"{/if}">
				<label for="SKRILL_{$payments.0.brand|escape:'htmlall':'UTF-8'}_ACTIVE_on">{$button.yes|escape:'htmlall':'UTF-8'}</label>
				<input type="radio" name="SKRILL_{$payments.0.brand|escape:'htmlall':'UTF-8'}_ACTIVE" id="SKRILL_{$payments.0.brand|escape:'htmlall':'UTF-8'}_ACTIVE_off" value="0" {if empty($payments.0.active)}checked="checked"{/if}>
				<label for="SKRILL_{$payments.0.brand|escape:'htmlall':'UTF-8'}_ACTIVE_off">{$button.no|escape:'htmlall':'UTF-8'}</label>
				<a class="slide-button btn"></a>
			</div>
		</div>
		<div class="col-lg-4">
			<label class="general-tooltip">
				{$payments.0.tooltips|escape:'htmlall':'UTF-8'}
			</label>
		</div>
		<div style="clear: both"></div>
	</div>
	<div style="clear: both"></div>
</div>
<div class="panel">
		{foreach from=$payments key=sort item=payment}
			{if ($sort != 0)}
			<div class="form-group">
				{if $payment.type == 'adb'}
					<div class="col-lg-2 logo-wrapper">
						<img src="{$thisPath|escape:'htmlall':'UTF-8'}views/img/adb_.jpg" alt="{$payment.type|escape:'htmlall':'UTF-8'}" class="payment-config-logo">
					</div>
				{else}
					<div class="col-lg-2 logo-wrapper">
						<img src="{$thisPath|escape:'htmlall':'UTF-8'}views/img/{$payment.type|escape:'htmlall':'UTF-8'}.jpg" alt="{$payment.type|escape:'htmlall':'UTF-8'}" class="payment-config-logo">
					</div>
				{/if}
				<label class="payment-label col-lg-3">
					{$payment.title|escape:'htmlall':'UTF-8'}
					{if !empty($payment.tooltips)}
						<img src="{$thisPath|escape:'htmlall':'UTF-8'}views/img/questionmark.jpg" alt="{$payment.type|escape:'htmlall':'UTF-8'}" data-toggle="tooltip" title="{$payment.tooltips|escape:'htmlall':'UTF-8'}" class="payment-config-tooltip skrill-{$payment.type|escape:'htmlall':'UTF-8'}-tooltip">
					{/if}
				</label>
				<div class="col-lg-3">
					<div class="col-lg-4 control-label switch-label">{$label.active|escape:'htmlall':'UTF-8'}</div>
					<div class="col-lg-6 switch prestashop-switch fixed-width-lg">
						<input type="radio" name="SKRILL_{$payment.brand|escape:'htmlall':'UTF-8'}_ACTIVE" id="SKRILL_{$payment.brand|escape:'htmlall':'UTF-8'}_ACTIVE_on" value="1" {if ($payment.active == 1)}checked="checked"{/if}>
						<label for="SKRILL_{$payment.brand|escape:'htmlall':'UTF-8'}_ACTIVE_on">{$button.yes|escape:'htmlall':'UTF-8'}</label>
						<input type="radio" name="SKRILL_{$payment.brand|escape:'htmlall':'UTF-8'}_ACTIVE" id="SKRILL_{$payment.brand|escape:'htmlall':'UTF-8'}_ACTIVE_off" value="0" {if empty($payment.active)}checked="checked"{/if}>
						<label for="SKRILL_{$payment.brand|escape:'htmlall':'UTF-8'}_ACTIVE_off">{$button.no|escape:'htmlall':'UTF-8'}</label>
						<a class="slide-button btn"></a>
					</div>
				</div>
				{if $payment.brand == 'ACC'}
				<div class="col-lg-3">
					<div class="col-lg-4 control-label switch-label">{$label.mode|escape:'htmlall':'UTF-8'}</div>
					<div class="col-lg-6 switch prestashop-switch fixed-width-lg">
						<input type="radio" name="SKRILL_{$payment.brand|escape:'htmlall':'UTF-8'}_MODE" id="SKRILL_{$payment.brand|escape:'htmlall':'UTF-8'}_MODE_on" value="1" {if ($payment.mode == 1)}checked="checked"{/if}>
						<label for="SKRILL_{$payment.brand|escape:'htmlall':'UTF-8'}_MODE_on">{$button.yes|escape:'htmlall':'UTF-8'}</label>
						<input type="radio" name="SKRILL_{$payment.brand|escape:'htmlall':'UTF-8'}_MODE" id="SKRILL_{$payment.brand|escape:'htmlall':'UTF-8'}_MODE_off" value="0" {if empty($payment.mode)}checked="checked"{/if}>
						<label for="SKRILL_{$payment.brand|escape:'htmlall':'UTF-8'}_MODE_off">{$button.no|escape:'htmlall':'UTF-8'}</label>
						<a class="slide-button btn"></a>
					</div>
				</div>
				{/if}
				<div style="clear: both"></div>
				{if !empty($payment.banks)}
					<div class="col-lg-12 well skrill-{$payment.type|escape:'htmlall':'UTF-8'}-logos" style="display: none;">
						<div class="col-lg-1"></div>
						<div class="col-lg-2">
							<ul>
							{foreach from=$payment.banks key=i item=bank}
								<li>
									{$bank|escape:'htmlall':'UTF-8'}
								</li>
							{/foreach}
							</ul>
						</div>
					</div>
				{/if}
			</div>
			<div style="clear: both"></div>
			{/if}
		{/foreach}

	<div class="panel-footer">
		<button type="submit" value="1" name="btnSubmitPaymentConfig" class="btn btn-default pull-right">
			<i class="process-icon-save"></i> {$button.save|escape:'htmlall':'UTF-8'}
		</button>
	</div>

</div>
</form>
