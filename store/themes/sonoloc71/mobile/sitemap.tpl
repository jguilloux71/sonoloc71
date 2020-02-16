{*
* 2007-2011 PrestaShop
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
*  @copyright  2007-2011 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<!-- Removed by JGU
<div id="hook_mobile_top_site_map">
{hook h="displayMobileTopSiteMap"}
</div>
-->

<!-- Add by JGU -->
<ul data-role="listview" data-inset="true">
	<li><a href="{$link->getPageLink('contact', true)|escape:'html'}" title="{l s='Contact'}">{l s='Contact'}</a></li>
</ul>
<!-- /Add by JGU -->

<hr/>
{if isset($categoriesTree.children)}
	<h2>{l s='Categories'}</h2>

	<!-- Add by JGU -->
	<div id="search_block_top">
		<form method="get" action="{$link->getPageLink('search', true)|escape:'html'}" id="searchbox">
			<input type="hidden" name="controller" value="search" />
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			<input class="search_query" type="search" id="search_query_top" name="search_query" placeholder="{l s='Search' mod='blocksearch'}" value="{$search_query|escape:'html':'UTF-8'|stripslashes}" />
		</form>
	</div>
	<!-- /Add by JGU -->

	<ul data-role="listview" data-inset="true">
		{foreach $categoriesTree.children as $child}
			{include file="./category-tree-branch.tpl" node=$child last='true'}
		{/foreach}
	</ul>
{/if}

<!-- Add by JGU -->
<hr/>
<h2>Menu principal</h2>
<ul data-role="listview" data-inset="true" id="category">
	<!-- Qui sommes nous -->
	<li><a href="{$link->getCMSLink('4')|escape:'html'}" data-ajax="false">{Tools::getCMSTitle('4', $cookie->id_lang)}</a></li>
	<!-- Tarifs prestations -->
	<li><a href="{$link->getCMSLink('10')|escape:'html'}" data-ajax="false">{Tools::getCMSTitle('10', $cookie->id_lang)}</a></li>
	<!-- Livraison et retours -->
	<li><a href="{$link->getCMSLink('1')|escape:'html'}" data-ajax="false">{Tools::getCMSTitle('1', $cookie->id_lang)}</a></li>
	<!-- Coordonnées / Horaries -->
	<li><a href="{$link->getPageLink('stores')|escape:'html'}">{l s='Our stores'}</a></li>
	<!-- Nos partenaires -->
	<li><a href="{$link->getCMSLink('9')|escape:'html'}" data-ajax="false">{Tools::getCMSTitle('9', $cookie->id_lang)}</a></li>
</ul>
<!-- /Add by JGU -->
