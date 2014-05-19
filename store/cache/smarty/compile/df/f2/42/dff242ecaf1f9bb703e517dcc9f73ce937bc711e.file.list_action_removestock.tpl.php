<?php /* Smarty version Smarty-3.1.14, created on 2014-05-19 11:28:19
         compiled from "/home/zido/git/sonoloc71/prestashop/admin/themes/default/template/helpers/list/list_action_removestock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14427232995379ead395baf7-08776942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dff242ecaf1f9bb703e517dcc9f73ce937bc711e' => 
    array (
      0 => '/home/zido/git/sonoloc71/prestashop/admin/themes/default/template/helpers/list/list_action_removestock.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14427232995379ead395baf7-08776942',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5379ead3962e09_18857846',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379ead3962e09_18857846')) {function content_5379ead3962e09_18857846($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/remove_stock.png" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a>
<?php }} ?>