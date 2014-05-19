<?php /* Smarty version Smarty-3.1.14, created on 2014-05-19 11:28:53
         compiled from "/home/zido/git/sonoloc71/store/themes/default/mobile/page-title.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19280371325379eaf580bbe5-99648761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83d817619fe53c212c0d476bf531bef091f0468b' => 
    array (
      0 => '/home/zido/git/sonoloc71/store/themes/default/mobile/page-title.tpl',
      1 => 1390208062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19280371325379eaf580bbe5-99648761',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_title' => 0,
    'meta_title' => 0,
    'shop_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5379eaf5824184_18074938',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379eaf5824184_18074938')) {function content_5379eaf5824184_18074938($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/zido/git/sonoloc71/store/tools/smarty/plugins/modifier.escape.php';
?><?php if (!isset($_smarty_tpl->tpl_vars['page_title']->value)&&isset($_smarty_tpl->tpl_vars['meta_title']->value)&&$_smarty_tpl->tpl_vars['meta_title']->value!=$_smarty_tpl->tpl_vars['shop_name']->value){?>
	<?php $_smarty_tpl->tpl_vars['page_title'] = new Smarty_variable(smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8'), null, 0);?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['page_title']->value)){?>
	<div data-role="header" class="clearfix navbartop" data-position="inline">
		<h1><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</h1>
	</div><!-- /navbartop -->
<?php }?><?php }} ?>