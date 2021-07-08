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

{if $status == 'ok'}
	<p>
		{if {l s='FRONTEND_MESSAGE_YOUR_ORDER' mod='skrill'} == "FRONTEND_MESSAGE_YOUR_ORDER"}Your order on{else}{l s='FRONTEND_MESSAGE_YOUR_ORDER' mod='skrill'}{/if} {$shop_name|escape:'htmlall':'UTF-8'} {if {l s='FRONTEND_MESSAGE_COMPLETE' mod='skrill'} == "FRONTEND_MESSAGE_COMPLETE"}is complete.{else}{l s='FRONTEND_MESSAGE_COMPLETE' mod='skrill'}{/if}<br/>
		{if {l s='FRONTEND_MESSAGE_THANK_YOU' mod='skrill'} == "FRONTEND_MESSAGE_THANK_YOU"}Thank you for your purchase!{else}{l s='FRONTEND_MESSAGE_THANK_YOU' mod='skrill'}{/if}
	</p>
{/if}
