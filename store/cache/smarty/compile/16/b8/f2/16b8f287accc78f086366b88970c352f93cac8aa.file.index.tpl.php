<?php /* Smarty version Smarty-3.1.14, created on 2014-05-19 11:28:52
         compiled from "/home/zido/git/sonoloc71/store/themes/default/mobile/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17721293005379eaf4b8fa14-33178132%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16b8f287accc78f086366b88970c352f93cac8aa' => 
    array (
      0 => '/home/zido/git/sonoloc71/store/themes/default/mobile/index.tpl',
      1 => 1390208062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17721293005379eaf4b8fa14-33178132',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5379eaf4b955a7_01846767',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379eaf4b955a7_01846767')) {function content_5379eaf4b955a7_01846767($_smarty_tpl) {?>
	<div data-role="content" id="content">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"DisplayMobileIndex"),$_smarty_tpl);?>

		<?php echo $_smarty_tpl->getSubTemplate ('./sitemap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div><!-- /content -->
<?php }} ?>