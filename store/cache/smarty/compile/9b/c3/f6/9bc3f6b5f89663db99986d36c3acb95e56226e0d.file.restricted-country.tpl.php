<?php /* Smarty version Smarty-3.1.14, created on 2014-05-19 11:28:56
         compiled from "/home/zido/git/sonoloc71/store/themes/default/restricted-country.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7821854655379eaf8272261-76584552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9bc3f6b5f89663db99986d36c3acb95e56226e0d' => 
    array (
      0 => '/home/zido/git/sonoloc71/store/themes/default/restricted-country.tpl',
      1 => 1390208062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7821854655379eaf8272261-76584552',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_iso' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'nobots' => 0,
    'favicon_url' => 0,
    'css_dir' => 0,
    'content_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5379eaf829e635_86298833',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379eaf829e635_86298833')) {function content_5379eaf829e635_86298833($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/zido/git/sonoloc71/store/tools/smarty/plugins/modifier.escape.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
">
	<head>
		<title><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8');?>
</title>	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)){?>
		<meta name="description" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_description']->value, 'htmlall', 'UTF-8');?>
" />
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['meta_keywords']->value)){?>
		<meta name="keywords" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_keywords']->value, 'htmlall', 'UTF-8');?>
" />
<?php }?>
		<meta name="robots" content="<?php if (isset($_smarty_tpl->tpl_vars['nobots']->value)){?>no<?php }?>index,follow" />
		<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
" />
		<link href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
restricted-country.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="restricted-country">
			 <p><img src="<?php echo $_smarty_tpl->tpl_vars['content_dir']->value;?>
img/logo.jpg" alt="logo" /><br /><br /></p>
			 <p id="message">
				<img src="<?php echo $_smarty_tpl->tpl_vars['content_dir']->value;?>
img/admin/tab-tools.gif" style="margin-right:10px; float:left;" alt="" /><?php echo smartyTranslate(array('s'=>'You cannot access this store from your country. We apologize for the inconvenience.'),$_smarty_tpl);?>

			 </p>
			 <span style="clear:both;">&nbsp;</span>
		</div>
	</body>
</html><?php }} ?>