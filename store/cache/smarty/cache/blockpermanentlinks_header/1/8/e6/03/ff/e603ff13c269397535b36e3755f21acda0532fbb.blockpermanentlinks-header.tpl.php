<?php /*%%SmartyHeaderCode:14209347145379ec90845005-03431749%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e603ff13c269397535b36e3755f21acda0532fbb' => 
    array (
      0 => '/home/zido/git/sonoloc71/store/modules/blockpermanentlinks/blockpermanentlinks-header.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14209347145379ec90845005-03431749',
  'variables' => 
  array (
    'link' => 0,
    'come_from' => 0,
    'meta_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5379ec908647a5_19422928',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379ec908647a5_19422928')) {function content_5379ec908647a5_19422928($_smarty_tpl) {?>
<!-- Block permanent links module HEADER -->
<ul id="header_links">
	<li id="header_link_contact"><a href="http://www.sonoloc71.fr/store/index.php?controller=contact" title="contact">contact</a></li>
	<li id="header_link_sitemap"><a href="http://www.sonoloc71.fr/store/index.php?controller=sitemap" title="plan du site">plan du site</a></li>
	<li id="header_link_bookmark">
		<script type="text/javascript">writeBookmarkLink('http://www.sonoloc71.fr/store/index.php', 'Sonoloc 71', 'favoris');</script>
	</li>
</ul>
<!-- /Block permanent links module HEADER -->
<?php }} ?>