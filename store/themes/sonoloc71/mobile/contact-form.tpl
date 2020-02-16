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

{capture assign='page_title'}{l s='Contact'}{/capture}
{include file='./page-title.tpl'}

{if isset($confirmation)}
	<p>{l s='Your message has been successfully sent to our team.'}</p>
	<ul class="footer_links">
		<li><a href="{$base_dir}"><img class="icon" alt="" src="{$img_dir}icon/home.gif"/></a><a href="{$base_dir}">{l s='Home'}</a></li>
	</ul>
{elseif isset($alreadySent)}
	<p>{l s='Your message has already been sent.'}</p>
	<ul class="footer_links">
		<li><a href="{$base_dir}"><img class="icon" alt="" src="{$img_dir}icon/home.gif"/></a><a href="{$base_dir}">{l s='Home'}</a></li>
	</ul>
{else}
	<div data-role="content" id="content">
		<p class="bold">{l s='For questions about an order or for more information about our products'}.</p>
		{include file="./errors.tpl"}
		<form action="{$request_uri|escape:'htmlall':'UTF-8'}" method="post" class="std" enctype="multipart/form-data">
			<fieldset>
				<h3>{l s='send a message'}</h3>
				<p class="select">
					<label for="id_contact">{l s='Subject Heading'}</label>
					{if isset($customerThread.id_contact)}
						{foreach from=$contacts item=contact}
							{if $contact.id_contact == $customerThread.id_contact}
								<input type="text" id="contact_name" name="contact_name" value="{$contact.name|escape:'htmlall':'UTF-8'}" readonly="readonly" />
								<input type="hidden" name="id_contact" value="{$contact.id_contact}" />
							{/if}
						{/foreach}
						</p>
					{else}
						<select id="id_contact" name="id_contact" onchange="showElemFromSelect('id_contact', 'desc_contact')">
							<option value="0">{l s='-- Choose --'}</option>
							{foreach from=$contacts item=contact}
								<option value="{$contact.id_contact|intval}" {if isset($smarty.request.id_contact) && $smarty.request.id_contact == $contact.id_contact}selected="selected"{/if}>{$contact.name|escape:'htmlall':'UTF-8'}</option>
							{/foreach}
						</select>
						</p>
						<p id="desc_contact0" class="desc_contact">&nbsp;</p>
						{foreach from=$contacts item=contact}
							<p id="desc_contact{$contact.id_contact|intval}" class="desc_contact" style="display:none;">
								{$contact.description|escape:'htmlall':'UTF-8'}
							</p>
						{/foreach}
					{/if}
				<p class="text">
					<label for="email">{l s='Email address'}</label>
					{if isset($customerThread.email)}
						<input type="text" id="email" name="from" value="{$customerThread.email|escape:'htmlall':'UTF-8'}" readonly="readonly" />
					{else}
						<input type="text" id="email" name="from" value="{$email|escape:'htmlall':'UTF-8'}" />
					{/if}
				</p>
				<p class="textarea" style="margin-left:3px">
					<label for="message">{l s='Message'}</label>
					 <textarea id="message" name="message" rows="30" cols="20">{if isset($message)}{$message|escape:'htmlall':'UTF-8'|stripslashes}{/if}</textarea>
				</p>
				<p class="submit">
					<input type="submit" name="submitMessage" id="submitMessage" value="{l s='Send'}" class="button_large" />
				</p>
			</fieldset>
		</form>
	</div> <!-- div content -->
{/if}
