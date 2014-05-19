<?php /* Smarty version Smarty-3.1.14, created on 2014-05-19 11:28:49
         compiled from "/home/zido/git/sonoloc71/store/admin/themes/default/template/controllers/slip/_print_pdf_icon.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4088779195379eaf1850db7-16112309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b924af5daf232844b25b6b3a11382d0fa0bfa846' => 
    array (
      0 => '/home/zido/git/sonoloc71/store/admin/themes/default/template/controllers/slip/_print_pdf_icon.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4088779195379eaf1850db7-16112309',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'order_slip' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5379eaf185b982_63863048',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379eaf185b982_63863048')) {function content_5379eaf185b982_63863048($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/zido/git/sonoloc71/store/tools/smarty/plugins/modifier.escape.php';
?>


<span style="width:20px; margin-right:5px;">
<a target="_blank" href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'), 'htmlall', 'UTF-8');?>
&submitAction=generateOrderSlipPDF&id_order_slip=<?php echo $_smarty_tpl->tpl_vars['order_slip']->value->id;?>
"><img src="../img/admin/tab-invoice.gif" alt="order_slip" /></a>
</span>
<?php }} ?>