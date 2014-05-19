<?php /*%%SmartyHeaderCode:18287428945379ec90a4c059-49600885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb121a6967430cef0af63ecb2d5eb439f4243f2d' => 
    array (
      0 => '/home/zido/git/sonoloc71/store/themes/default/modules/blocksupplier/blocksupplier.tpl',
      1 => 1390208062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18287428945379ec90a4c059-49600885',
  'variables' => 
  array (
    'display_link_supplier' => 0,
    'link' => 0,
    'suppliers' => 0,
    'text_list' => 0,
    'text_list_nb' => 0,
    'supplier' => 0,
    'form_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5379ec90ab5704_97248543',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379ec90ab5704_97248543')) {function content_5379ec90ab5704_97248543($_smarty_tpl) {?>
<!-- Block suppliers module -->
<div id="suppliers_block_left" class="block blocksupplier">
	<p class="title_block"><a href="http://www.sonoloc71.fr/store/index.php?controller=supplier" title="Fournisseurs">Fournisseurs</a></p>
	<div class="block_content">
		<ul class="bullet">
					<li class="first_item">
			<a href="http://www.sonoloc71.fr/store/index.php?id_supplier=1&amp;controller=supplier" title="En savoir plus sur AppleStore">AppleStore</a>
		</li>
							<li class="last_item">
			<a href="http://www.sonoloc71.fr/store/index.php?id_supplier=2&amp;controller=supplier" title="En savoir plus sur Shure Online Store">Shure Online Store</a>
		</li>
				</ul>
				<form action="/store/index.php" method="get">
			<p>
				<select id="supplier_list" onchange="autoUrl('supplier_list', '');">
					<option value="0">Tous les fournisseurs</option>
									<option value="http://www.sonoloc71.fr/store/index.php?id_supplier=1&amp;controller=supplier">AppleStore</option>
									<option value="http://www.sonoloc71.fr/store/index.php?id_supplier=2&amp;controller=supplier">Shure Online Store</option>
								</select>
			</p>
		</form>
		</div>
</div>
<!-- /Block suppliers module -->
<?php }} ?>