{*
* 2007-2016 PrestaShop
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
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<!-- block seach mobile -->
{if isset($hook_mobile)}
<div class="input_search" data-role="fieldcontain">
	<form method="get" action="{$link->getPageLink('search', true)|escape:'html'}" id="searchbox">
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query" type="search" id="search_query_top" name="search_query" placeholder="{l s='Search' mod='blocksearch'}" value="{$search_query|escape:'html':'UTF-8'|stripslashes}" />
	</form>
</div>
{else}
<!-- Block search module TOP -->
<div id="search_block_top">
	<form method="get" action="{$link->getPageLink('search', true)|escape:'html'}" id="searchbox">
		<p>
			<label for="search_query_top"><!-- image on background --></label>
			<input type="hidden" name="controller" value="search" />
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			<input class="search_query" type="text" id="search_query_top" name="search_query" value="{$search_query|escape:'html':'UTF-8'|stripslashes}" />
			<input type="submit" name="submit_search" value="{l s='Search' mod='blocksearch'}" class="button" />
		</p>
	</form>
</div>
{include file="$self/blocksearch-instantsearch.tpl"}
{/if}
<!-- /Block search module TOP -->

<!-- Facebook -->
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- End of Facebook -->

<div class="social_search">
    <div class="fb-like" data-href="https://www.facebook.com/sonoloc71" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
    <br/>
    <br/>
    <div id="twitter">
        <a href="https://twitter.com/sonoloc71" class="twitter-follow-button" data-show-count="false" data-lang="fr" data-show-screen-name="false">Suivre @sonoloc71</a>
        <script>
            (function(d, s, id) {
                var js,fjs=d.getElementsByTagName(s)[0], p=/^http:/.test(d.location)?'http':'https';
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = p+'://platform.twitter.com/widgets.js';
                    fjs.parentNode.insertBefore(js,fjs);
                }
            }(document, 'script', 'twitter-wjs'));
        </script>
        <a href="http://twitter.com/share" class="twitter-share-button"
            data-url="http://www.sonoloc71.fr"
            data-via="sonoloc71"
            data-text="Sonoloc71, Location de Sonorisation - Éclairage - Vidéo - Tous Types d’Événements"
            data-related="sonoloc71"
            data-count="horizontal"
            data-lang="fr">Tweet</a>
    </div>
</div>

