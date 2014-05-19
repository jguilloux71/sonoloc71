<?php /*%%SmartyHeaderCode:6152117795379ec90abe650-84546265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8583fb52568d1d282638109f50581d4a70f858f' => 
    array (
      0 => '/home/zido/git/sonoloc71/store/themes/default/modules/blockmanufacturer/blockmanufacturer.tpl',
      1 => 1390208062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6152117795379ec90abe650-84546265',
  'variables' => 
  array (
    'display_link_manufacturer' => 0,
    'link' => 0,
    'manufacturers' => 0,
    'text_list' => 0,
    'text_list_nb' => 0,
    'manufacturer' => 0,
    'form_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5379ec90b26268_07172836',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379ec90b26268_07172836')) {function content_5379ec90b26268_07172836($_smarty_tpl) {?>
<!-- Block manufacturers module -->
<div id="manufacturers_block_left" class="block blockmanufacturer">
	<p class="title_block"><a href="http://www.sonoloc71.fr/store/index.php?controller=manufacturer" title="Fabricants">Fabricants</a></p>
	<div class="block_content">
		<ul class="bullet">
					<li class="first_item"><a href="http://www.sonoloc71.fr/store/index.php?id_manufacturer=1&amp;controller=manufacturer" title="En savoir plus sur Apple Computer, Inc">Apple Computer, Inc</a></li>
							<li class="last_item"><a href="http://www.sonoloc71.fr/store/index.php?id_manufacturer=2&amp;controller=manufacturer" title="En savoir plus sur Shure Incorporated">Shure Incorporated</a></li>
				</ul>
				<form action="/store/index.php" method="get">
			<p>
				<select id="manufacturer_list" onchange="autoUrl('manufacturer_list', '');">
					<option value="0">Tous les fabricants</option>
									<option value="http://www.sonoloc71.fr/store/index.php?id_manufacturer=1&amp;controller=manufacturer">Apple Computer, Inc</option>
									<option value="http://www.sonoloc71.fr/store/index.php?id_manufacturer=2&amp;controller=manufacturer">Shure Incorporated</option>
								</select>
			</p>
		</form>
		</div>
</div>
<!-- /Block manufacturers module -->
<?php }} ?>