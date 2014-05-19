<?php /* Smarty version Smarty-3.1.14, created on 2014-05-19 11:28:47
         compiled from "/home/zido/git/sonoloc71/store/admin/themes/default/template/controllers/products/textarea_lang.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4237349295379eaef7ebc91-56909315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3974ee5520bbec9d016958e054871bcfc9ed4e81' => 
    array (
      0 => '/home/zido/git/sonoloc71/store/admin/themes/default/template/controllers/products/textarea_lang.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4237349295379eaef7ebc91-56909315',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'languages' => 0,
    'language' => 0,
    'input_name' => 0,
    'input_value' => 0,
    'max' => 0,
    'hint' => 0,
    'iso_tiny_mce' => 0,
    'ad' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5379eaef81ad67_78595284',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379eaef81ad67_78595284')) {function content_5379eaef81ad67_78595284($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/zido/git/sonoloc71/store/tools/smarty/plugins/modifier.replace.php';
?>

<div class="translatable">
<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
<div class="lang_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" style="<?php if (!$_smarty_tpl->tpl_vars['language']->value['is_default']){?>display:none;<?php }?>float: left;">
	<textarea cols="100" rows="10" id="<?php echo $_smarty_tpl->tpl_vars['input_name']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" 
		name="<?php echo $_smarty_tpl->tpl_vars['input_name']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" 
		class="autoload_rte" ><?php if (isset($_smarty_tpl->tpl_vars['input_value']->value[$_smarty_tpl->tpl_vars['language']->value['id_lang']])){?><?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_htmlentitiesUTF8($_smarty_tpl->tpl_vars['input_value']->value[$_smarty_tpl->tpl_vars['language']->value['id_lang']]),'\r\n',''),'\&quot;','&quot;');?>
<?php }?></textarea>
	<span class="counter" max="<?php if (isset($_smarty_tpl->tpl_vars['max']->value)){?><?php echo $_smarty_tpl->tpl_vars['max']->value;?>
<?php }else{ ?>none<?php }?>"></span>
	<span class="hint"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['hint']->value)===null||$tmp==='' ? '' : $tmp);?>
<span class="hint-pointer">&nbsp;</span></span>
</div>
<?php } ?>
</div>
<script type="text/javascript">
	var iso = '<?php echo $_smarty_tpl->tpl_vars['iso_tiny_mce']->value;?>
';
	var pathCSS = '<?php echo @constant('_THEME_CSS_DIR_');?>
';
	var ad = '<?php echo $_smarty_tpl->tpl_vars['ad']->value;?>
';
</script>
<?php }} ?>