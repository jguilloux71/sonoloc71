<?php /* Smarty version Smarty-3.1.14, created on 2014-05-19 11:28:28
         compiled from "/home/zido/git/sonoloc71/prestashop/themes/default/mobile/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9547286115379eadc516be0-31289492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f7e0d399bc399d79521d53ed257dc722e073afa' => 
    array (
      0 => '/home/zido/git/sonoloc71/prestashop/themes/default/mobile/footer.tpl',
      1 => 1390208062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9547286115379eadc516be0-31289492',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'PS_SHOP_NAME' => 0,
    'conditions' => 0,
    'id_cgv' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5379eadc5354c8_01440625',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379eadc5354c8_01440625')) {function content_5379eadc5354c8_01440625($_smarty_tpl) {?>

			<div id="footer">
				<div class="ui-grid-a">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayMobileFooterChoice"),$_smarty_tpl);?>

				</div><!-- /grid-a -->

				<div id="full-site-section" class="center">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true);?>
?no_mobile_theme" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Browse the full site'),$_smarty_tpl);?>
</a>
				</div>

				<div data-role="footer" data-theme="a" id="bar_footer">
					<div id="link_bar_footer" class="ui-grid-a">
						<div class="ui-block-a">
							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true), ENT_QUOTES, 'UTF-8', true);?>
" data-ajax="false"><?php echo $_smarty_tpl->tpl_vars['PS_SHOP_NAME']->value;?>
</a>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['conditions']->value){?>
						<div class="ui-block-b">
							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCMSLink($_smarty_tpl->tpl_vars['id_cgv']->value), ENT_QUOTES, 'UTF-8', true);?>
" data-ajax="false"><?php echo smartyTranslate(array('s'=>'Terms of service'),$_smarty_tpl);?>
</a>
						</div>
						<?php }?>
					</div>
				</div>
			</div><!-- /footer -->
		</div><!-- /page -->
	</body>
</html>
<?php }} ?>