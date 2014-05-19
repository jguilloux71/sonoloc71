<?php /* Smarty version Smarty-3.1.14, created on 2014-05-19 11:28:22
         compiled from "/home/zido/git/sonoloc71/prestashop/admin/themes/default/template/controllers/cart_rules/informations.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13977201645379ead6ea7f08-48688630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13127d80463ac10c1bedaf8fe09909f5e12e8f07' => 
    array (
      0 => '/home/zido/git/sonoloc71/prestashop/admin/themes/default/template/controllers/cart_rules/informations.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13977201645379ead6ea7f08-48688630',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'languages' => 0,
    'language' => 0,
    'id_lang_default' => 0,
    'currentObject' => 0,
    'currentTab' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5379ead6f40884_20763836',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379ead6f40884_20763836')) {function content_5379ead6f40884_20763836($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/zido/git/sonoloc71/prestashop/tools/smarty/plugins/modifier.escape.php';
?><table cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<label><?php echo smartyTranslate(array('s'=>'Name'),$_smarty_tpl);?>
</label>
			<div class="margin-form">
				<div class="translatable">
				<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
					<div class="lang_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" style="display:<?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']==$_smarty_tpl->tpl_vars['id_lang_default']->value){?>block<?php }else{ ?>none<?php }?>;float:left">
						<input type="text" id="name_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" name="name_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'name',intval($_smarty_tpl->tpl_vars['language']->value['id_lang'])), 'html', 'UTF-8');?>
" style="width:400px" />
						<sup>*</sup>
					</div>
				<?php } ?>
				</div>
				<p class="preference_description"><?php echo smartyTranslate(array('s'=>'This will be displayed in the cart summary, as well as on the invoice.'),$_smarty_tpl);?>
</p>
			</div>
			<label><?php echo smartyTranslate(array('s'=>'Description'),$_smarty_tpl);?>
</label>
			<div class="margin-form">
				<textarea name="description" style="width:80%;height:100px"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'description'), ENT_QUOTES, 'UTF-8', true);?>
</textarea>
				<p class="preference_description"><?php echo smartyTranslate(array('s'=>'For your eyes only. This will never be displayed to the customer.'),$_smarty_tpl);?>
</p>
			</div>
			<label><?php echo smartyTranslate(array('s'=>'Code'),$_smarty_tpl);?>
</label>
			<div class="margin-form">
				<input type="text" id="code" name="code" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'code'), ENT_QUOTES, 'UTF-8', true);?>
" />
				<a href="javascript:gencode(8);" class="button"><?php echo smartyTranslate(array('s'=>'(Click to generate random code)'),$_smarty_tpl);?>
</a>
				<p class="preference_description"><?php echo smartyTranslate(array('s'=>'Caution! The rule will automatically be applied if you leave this field blank.'),$_smarty_tpl);?>
</p>
			</div>
			<label><?php echo smartyTranslate(array('s'=>'Highlight'),$_smarty_tpl);?>
</label>
			<div class="margin-form">
				&nbsp;&nbsp;
				<input type="radio" name="highlight" id="highlight_on" value="1" <?php if (intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'highlight'))){?>checked="checked"<?php }?> />
				<label class="t" for="highlight_on"> <img src="../img/admin/enabled.gif" alt="<?php echo smartyTranslate(array('s'=>'Yes'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Yes'),$_smarty_tpl);?>
" style="cursor:pointer" /></label>
				&nbsp;&nbsp;
				<input type="radio" name="highlight" id="highlight_off" value="0"  <?php if (!intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'highlight'))){?>checked="checked"<?php }?> />
				<label class="t" for="highlight_off"> <img src="../img/admin/disabled.gif" alt="<?php echo smartyTranslate(array('s'=>'No'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'No'),$_smarty_tpl);?>
" style="cursor:pointer" /></label>
				<p class="preference_description">
					<?php echo smartyTranslate(array('s'=>'If the voucher is not yet in the cart, it will be displayed in the cart summary.'),$_smarty_tpl);?>

				</p>
			</div>
			<label><?php echo smartyTranslate(array('s'=>'Partial use'),$_smarty_tpl);?>
</label>
			<div class="margin-form">
				&nbsp;&nbsp;
				<input type="radio" name="partial_use" id="partial_use_on" value="1" <?php if (intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'partial_use'))){?>checked="checked"<?php }?> />
				<label class="t" for="partial_use_on"> <img src="../img/admin/enabled.gif" alt="<?php echo smartyTranslate(array('s'=>'Allowed'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Allowed'),$_smarty_tpl);?>
" style="cursor:pointer" /></label>
				&nbsp;&nbsp;
				<input type="radio" name="partial_use" id="partial_use_off" value="0"  <?php if (!intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'partial_use'))){?>checked="checked"<?php }?> />
				<label class="t" for="partial_use_off"> <img src="../img/admin/disabled.gif" alt="<?php echo smartyTranslate(array('s'=>'Not allowed'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Not allowed'),$_smarty_tpl);?>
" style="cursor:pointer" /></label>
				<p class="preference_description">
					<?php echo smartyTranslate(array('s'=>'Only applicable if the voucher value is greater than the cart total.'),$_smarty_tpl);?>
<br />
					<?php echo smartyTranslate(array('s'=>'If you do not allow partial use, the voucher value will be lowered to the total order amount. If you allow partial use, however, a new voucher will be created with the remainder.'),$_smarty_tpl);?>

				</p>
			</div>
			<label><?php echo smartyTranslate(array('s'=>'Priority'),$_smarty_tpl);?>
</label>
			<div class="margin-form">
				<input type="text" name="priority" value="<?php echo intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'priority'));?>
" />
				<p class="preference_description"><?php echo smartyTranslate(array('s'=>'Cart rules are applied by priority. A cart rule with a priority of "1" will be processed before a cart rule with a priority of "2".'),$_smarty_tpl);?>
</p>
			</div>
			<label><?php echo smartyTranslate(array('s'=>'Status'),$_smarty_tpl);?>
</label>
			<div class="margin-form">
				&nbsp;&nbsp;
				<input type="radio" name="active" id="active_on" value="1" <?php if (intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'active'))){?>checked="checked"<?php }?> />
				<label class="t" for="active_on"> <img src="../img/admin/enabled.gif" alt="<?php echo smartyTranslate(array('s'=>'Enabled'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Enabled'),$_smarty_tpl);?>
" style="cursor:pointer" /></label>
				&nbsp;&nbsp;
				<input type="radio" name="active" id="active_off" value="0"  <?php if (!intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'active'))){?>checked="checked"<?php }?> />
				<label class="t" for="active_off"> <img src="../img/admin/disabled.gif" alt="<?php echo smartyTranslate(array('s'=>'Disabled'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Disabled'),$_smarty_tpl);?>
" style="cursor:pointer" /></label>
			</div>
		</td>
	</tr>
</table><?php }} ?>