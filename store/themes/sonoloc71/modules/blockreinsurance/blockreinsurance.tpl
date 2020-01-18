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
{if $infos|@count > 0}
<!-- MODULE Block reinsurance -->
<div id="reinsurance_block" class="clearfix">
	<ul class="width{$nbblocks}">	
		{foreach from=$infos item=info}
			<li>
                {if $info.text=='Livraison gratuite'}
                    <a href="{$link->getCMSLink(1, $cms_category->link_rewrite)}">
                {/if}
                        <img src="{$link->getMediaLink("`$module_dir`img/`$info.file_name|escape:'htmlall':'UTF-8'`")}" alt="{$info.text|escape:html:'UTF-8'}" title="{$info.text|escape:html:'UTF-8'}" />
                {if $info.text=='Livraison gratuite'}
                </a>
                    <a href="{$link->getCMSLink(1, $cms_category->link_rewrite)}">
                {/if}
                        <span>{$info.text|escape:html:'UTF-8'}</span>
                {if $info.text=='Livraison gratuite'}
                    </a>
                {/if}
            </li>
		{/foreach}
	</ul>
</div>
<!-- /MODULE Block reinsurance -->
{/if}
