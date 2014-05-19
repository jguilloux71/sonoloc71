<?php /* Smarty version Smarty-3.1.14, created on 2014-05-19 11:28:46
         compiled from "/home/zido/git/sonoloc71/store/admin/themes/default/template/helpers/list/list_action_transferstock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12419209995379eaee91c592-51422740%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f14ba338cf2193884b22f180c86152f541f4c7a5' => 
    array (
      0 => '/home/zido/git/sonoloc71/store/admin/themes/default/template/helpers/list/list_action_transferstock.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12419209995379eaee91c592-51422740',
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
  'unifunc' => 'content_5379eaee9226f9_81371165',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379eaee9226f9_81371165')) {function content_5379eaee9226f9_81371165($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/transfer_stock.png" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a>
<?php }} ?>