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

<!-- Header part menu -->
<head>
    {block name='head'}
        {include file='_partials/head.tpl'}
    {/block}
</head>

<body>
{hook h='displayAfterBodyOpeningTag'}
<main>
    <!-- Menu part-->
    <header id="header">
        {block name='header'}
            {include file='_partials/header.tpl'}
        {/block}
    </header>

    <!-- Header part ends -->

    <section id="wrapper">
        <div class="container">

            <section id="main">
                <section id="content" class="page-content card card-block">
                    {include file='_partials/breadcrumb.tpl'}
                    <h2>{l s='Error in Paypal' mod='paypal'}</h2>

                    <div class="table-responsive-row clearfix">
                        <p class="paypal_error_msg">
                            {if $error_msg == '' && $msg_long == ''}
                                {if $error_code}<span class="code">[{$error_code|escape:'htmlall':'UTF-8'}]</span>{/if}
                                {l s='Unexpected error occurred. Please contact shop administrator.' mod='paypal'}
                            {else}
                                {if $error_code}<span class="code">[{$error_code|escape:'htmlall':'UTF-8'}]</span>{/if}
                                {if $error_msg}<span class="short">{$error_msg|escape:'htmlall':'UTF-8'}</span>{/if}
                                <br>
                                {if $msg_long && $msg_long != $error_msg}
                                    <span class="long">{l s='Additional error message : ' mod='paypal'}{$msg_long|escape:'htmlall':'UTF-8'}</span>
                                {/if}
                            {/if}
                        </p>
                        {if $show_retry}
                            <a class="btn btn-secondary" href="{$link->getPageLink('order', true)}">{l s='Try to pay again' mod='paypal'}</a>
                        {/if}
                    </div>
                </section>
            </section>
        </div>
    </section>
    <!-- Footer starts -->

    <footer id="footer">
        {block name="footer"}
            {include file="_partials/footer.tpl"}
        {/block}
    </footer>
    <!-- Footer Ends -->
    {block name='javascript_bottom'}
        {include file="_partials/javascript.tpl" javascript=$javascript.bottom}
    {/block}
    {hook h='displayBeforeBodyClosingTag'}
</main>

</body>

