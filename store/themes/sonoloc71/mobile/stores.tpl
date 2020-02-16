{*
* 2007-2013 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{capture assign='page_title'}{l s='Our stores'}{/capture}
{include file='./page-title.tpl'}

{if $stores|@count}
	<p><strong>Pour cause de déplacements fréquents, tout passage à notre dépôt doit se faire sur rendez-vous. En aucun cas vous ne devez vous présenter de vous-mêmes sans nous avoir contacter préalablement.
	<br/>
	<br/>
	Pour nous contacter, vous pouvez le faire par téléphone au 06 52 89 49 86 ou bien par mail via <a href="http://www.sonoloc71.fr/contact-us">notre formulaire en ligne</a>.</strong></p>
	<br/>
	<p>Voici les coordonnées de notre dépôt Sonoloc71 :</p>
	{foreach $stores as $store}
		<div class="store-small grid_2">
			{if $store.has_picture}<p><img src="{$img_store_dir}{$store.id_store}-medium_default.jpg" alt="" width="{$mediumSize.width}" height="{$mediumSize.height}" /></p>{/if}
			<p>
				<b>{$store.name|escape:'htmlall':'UTF-8'}</b><br />
				{$store.address1|escape:'htmlall':'UTF-8'}<br />
				{if $store.address2}{$store.address2|escape:'htmlall':'UTF-8'}{/if}<br />
				{$store.postcode} {$store.city|escape:'htmlall':'UTF-8'}{if $store.state}, {$store.state}{/if}<br />
				{$store.country|escape:'htmlall':'UTF-8'}<br />
				<br/>
				<strong>{if $store.phone}{l s='Phone:' js=0} {$store.phone}{/if}</strong>
			</p>
			{if isset($store.working_hours)}{$store.working_hours}{/if}
		</div>
	{/foreach}
{/if}
