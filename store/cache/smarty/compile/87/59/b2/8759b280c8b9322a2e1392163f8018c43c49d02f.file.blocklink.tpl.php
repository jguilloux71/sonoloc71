<?php /* Smarty version Smarty-3.1.14, created on 2014-05-19 11:28:52
         compiled from "/home/zido/git/sonoloc71/store/themes/default/modules/blocklink/blocklink.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9371039775379eaf4376368-21272869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8759b280c8b9322a2e1392163f8018c43c49d02f' => 
    array (
      0 => '/home/zido/git/sonoloc71/store/themes/default/modules/blocklink/blocklink.tpl',
      1 => 1390208062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9371039775379eaf4376368-21272869',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'title' => 0,
    'blocklink_links' => 0,
    'lang' => 0,
    'blocklink_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5379eaf4394868_16331011',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379eaf4394868_16331011')) {function content_5379eaf4394868_16331011($_smarty_tpl) {?>

<!-- Block links module -->
<div id="links_block_left" class="block">
	<p class="title_block">
	<?php if ($_smarty_tpl->tpl_vars['url']->value){?>
		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['url']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true);?>
</a>
	<?php }else{ ?>
		<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true);?>

	<?php }?>
	</p>
	<ul class="block_content bullet">
	<?php  $_smarty_tpl->tpl_vars['blocklink_link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blocklink_link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blocklink_links']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['blocklink_link']->key => $_smarty_tpl->tpl_vars['blocklink_link']->value){
$_smarty_tpl->tpl_vars['blocklink_link']->_loop = true;
?>
		<?php if (isset($_smarty_tpl->tpl_vars['blocklink_link']->value[$_smarty_tpl->tpl_vars['lang']->value])){?> 
			<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blocklink_link']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if ($_smarty_tpl->tpl_vars['blocklink_link']->value['newWindow']){?> onclick="window.open(this.href);return false;"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blocklink_link']->value[$_smarty_tpl->tpl_vars['lang']->value], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
		<?php }?>
	<?php } ?>
	</ul>
</div>
<!-- /Block links module -->
<?php }} ?>