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

<div class="panel panel-presentation">
	<div class="pres-header-group">
		<div class="col-lg-1">&nbsp;</div>
		<div class="col-lg-3 pres-header-logo">
			<img src="{$thisPath|escape:'htmlall':'UTF-8'}views/img/skrill.jpg" alt="wlt" class="pres-logo">
		</div>
		<div class="col-lg-1">&nbsp;</div>
		<div class="col-lg-6">
			<div class="pres-header-text">{$presentation.header|escape:'htmlall':'UTF-8'}</div>
		</div>
		<div class="col-lg-1">&nbsp;</div>
		<div class="clear"></div>
	</div>
	<div class="pres-content-wrapper">
		<div class="col-lg-1">&nbsp;</div>
		<div class="col-lg-3 pres-content pres-content-img">
			<img src="{$thisPath|escape:'htmlall':'UTF-8'}views/img/skrill_widget.png" alt="transaction-flow" class="pres-about-image">
		</div>
		<div class="col-lg-1">&nbsp;</div>
		<div class="col-lg-6 pres-content pres-content-text">
			<span class="pres-title">ABOUT SKRILL</span>
			<p>{$presentation.about.text1|escape:'htmlall':'UTF-8'}</p>
			<p>{$presentation.about.text2|escape:'htmlall':'UTF-8'} <a href="{$signUpUrl|escape:'htmlall':'UTF-8'}" target="_blank" class="pres-signup">{$presentation.signup.title|escape:'htmlall':'UTF-8'}</a>.</p>
			<p>{$presentation.about.text3|escape:'htmlall':'UTF-8'}</p>
			<p>{$presentation.about.feature|escape:'htmlall':'UTF-8'}</p>
			<ul>
				<li>{$presentation.about.feature1|escape:'htmlall':'UTF-8'}</li>
				<li>{$presentation.about.feature2|escape:'htmlall':'UTF-8'}</li>
				<li>{$presentation.about.feature3|escape:'htmlall':'UTF-8'}</li>
				<li>{$presentation.about.feature4|escape:'htmlall':'UTF-8'}</li>
				<li>{$presentation.about.feature5|escape:'htmlall':'UTF-8'}</li>
			</ul>
			<br />
			<p>
				<a href="{$signUpUrl|escape:'htmlall':'UTF-8'}" target="_blank" class="pres-btn-signup">
					{$presentation.signup.title|escape:'htmlall':'UTF-8'}
				</a>
			</p>
		</div>
		<div class="col-lg-1">&nbsp;</div>
		<div class="clear"></div>
	</div>
	<div class="pres-content-wrapper pres-content-bottom">
		<div class="col-lg-4 pres-content">
			<span class="step-title pres-firt-uppercase">
				<a href="{$signUpUrl|escape:'htmlall':'UTF-8'}" target="_blank" >
					{$presentation.signup.title|escape:'htmlall':'UTF-8'}
				</a>
			</span>
			<div class="pres-circle">
				<a href="{$signUpUrl|escape:'htmlall':'UTF-8'}" target="_blank" >
					<img src="{$thisPath|escape:'htmlall':'UTF-8'}views/img/signup.jpg" alt="step-1" class="pres-step-image">
				</a>
			</div>
			<div class="clear"></div>
			<p class="step-text"><i>{$presentation.signup.text|escape:'htmlall':'UTF-8'}</i></p>
		</div>
		<div class="col-lg-4 pres-content">
			<span class="step-title pres-firt-uppercase">{$presentation.verify.title|escape:'htmlall':'UTF-8'}</span>
			<div class="pres-circle">
				<img src="{$thisPath|escape:'htmlall':'UTF-8'}views/img/verify.png" alt="step-2" class="pres-step-image">
			</div>
			<div class="clear"></div>
			<p class="step-text"><i>{$presentation.verify.text|escape:'htmlall':'UTF-8'}</i></p>
		</div>
		<div class="col-lg-4 pres-content">
			<span class="step-title pres-firt-uppercase">
				<a href="{$guideUrl|escape:'htmlall':'UTF-8'}" target="_blank" >
					{$presentation.guide.title|escape:'htmlall':'UTF-8'}
				</a>
			</span>
			<div class="pres-circle">
				<a href="{$guideUrl|escape:'htmlall':'UTF-8'}" target="_blank" >
					<img src="{$thisPath|escape:'htmlall':'UTF-8'}views/img/guide.jpg" alt="step-3" class="pres-step-image">
				</a>
			</div>
			<div class="clear"></div>
			<p class="step-text"><i>{$presentation.guide.text|escape:'htmlall':'UTF-8'}</i></p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="panel-footer pres-footer">&nbsp;</div>
</div>
<div class="clear"></div>
