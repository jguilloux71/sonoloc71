<?php /* Smarty version Smarty-3.1.14, created on 2014-05-19 11:28:49
         compiled from "/home/zido/git/sonoloc71/store/admin/themes/default/template/controllers/stats/calendar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1362990385379eaf172e9c1-86124242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f85601c8996ff13be0779b3432cf37136219fb0' => 
    array (
      0 => '/home/zido/git/sonoloc71/store/admin/themes/default/template/controllers/stats/calendar.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1362990385379eaf172e9c1-86124242',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current' => 0,
    'token' => 0,
    'action' => 0,
    'table' => 0,
    'identifier' => 0,
    'id' => 0,
    'translations' => 0,
    'datepickerFrom' => 0,
    'datepickerTo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5379eaf1790e62_67990077',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379eaf1790e62_67990077')) {function content_5379eaf1790e62_67990077($_smarty_tpl) {?>

<div id="statsContainer">
	<div id="calendar">
				<form action="<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
<?php if ($_smarty_tpl->tpl_vars['action']->value&&$_smarty_tpl->tpl_vars['table']->value){?>&<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['table']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['identifier']->value&&$_smarty_tpl->tpl_vars['id']->value){?>&<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8', true);?>
=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?><?php if (isset($_GET['module'])){?>&module=<?php echo htmlspecialchars($_GET['module'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?><?php if (isset($_GET['id_product'])){?>&id_product=<?php echo htmlspecialchars($_GET['id_product'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" method="post" id="calendar_form" name="calendar_form">
					<input type="submit" name="submitDateDay" class="button submitDateDay" value="<?php echo $_smarty_tpl->tpl_vars['translations']->value['Day'];?>
">
					<input type="submit" name="submitDateMonth" class="button submitDateMonth" value="<?php echo $_smarty_tpl->tpl_vars['translations']->value['Month'];?>
">
					<input type="submit" name="submitDateYear" class="button submitDateYear" value="<?php echo $_smarty_tpl->tpl_vars['translations']->value['Year'];?>
">
					<input type="submit" name="submitDateDayPrev" class="button submitDateDayPrev" value="<?php echo $_smarty_tpl->tpl_vars['translations']->value['Day'];?>
-1">
					<input type="submit" name="submitDateMonthPrev" class="button submitDateMonthPrev" value="<?php echo $_smarty_tpl->tpl_vars['translations']->value['Month'];?>
-1">
					<input type="submit" name="submitDateYearPrev" class="button submitDateYearPrev" value="<?php echo $_smarty_tpl->tpl_vars['translations']->value['Year'];?>
-1">
					<p><span><?php if (isset($_smarty_tpl->tpl_vars['translations']->value['From'])){?><?php echo $_smarty_tpl->tpl_vars['translations']->value['From'];?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'From:'),$_smarty_tpl);?>
<?php }?></span>
						<input type="text" name="datepickerFrom" id="datepickerFrom" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['datepickerFrom']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="datepicker">
					</p>
					<p><span><?php if (isset($_smarty_tpl->tpl_vars['translations']->value['To'])){?><?php echo $_smarty_tpl->tpl_vars['translations']->value['To'];?>
<?php }else{ ?><span><?php echo smartyTranslate(array('s'=>'From:'),$_smarty_tpl);?>
</span><?php }?></span>
						<input type="text" name="datepickerTo" id="datepickerTo" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['datepickerTo']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="datepicker">
					</p>
					<input type="submit" name="submitDatePicker" id="submitDatePicker" class="button" value="<?php if (isset($_smarty_tpl->tpl_vars['translations']->value['Save'])){?><?php echo $_smarty_tpl->tpl_vars['translations']->value['Save'];?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Save'),$_smarty_tpl);?>
<?php }?>" />
				</form>

				<script type="text/javascript">
					$(document).ready(function() {
						if ($("form#calendar_form .datepicker").length > 0)
							$("form#calendar_form .datepicker").datepicker({
								prevText: '',
								nextText: '',
								dateFormat: 'yy-mm-dd'
							});
					});
				</script>
	</div>
<?php }} ?>