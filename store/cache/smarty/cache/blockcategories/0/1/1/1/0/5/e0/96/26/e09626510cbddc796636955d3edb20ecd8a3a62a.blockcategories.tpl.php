<?php /*%%SmartyHeaderCode:2374816415379ec909cbcd7-53834642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e09626510cbddc796636955d3edb20ecd8a3a62a' => 
    array (
      0 => '/home/zido/git/sonoloc71/store/themes/default/modules/blockcategories/blockcategories.tpl',
      1 => 1390208062,
      2 => 'file',
    ),
    'e7ded50996a173b0737ce687996adf7e7cf6486c' => 
    array (
      0 => '/home/zido/git/sonoloc71/store/themes/default/modules/blockcategories/category-tree-branch.tpl',
      1 => 1390208062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2374816415379ec909cbcd7-53834642',
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5379ec990975b0_35584973',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379ec990975b0_35584973')) {function content_5379ec990975b0_35584973($_smarty_tpl) {?>
<!-- Block categories module -->
<div id="categories_block_left" class="block">
	<p class="title_block">Catégories</p>
	<div class="block_content">
		<ul class="tree dhtml">
									
<li >
	<a href="http://www.sonoloc71.fr/store/index.php?id_category=3&amp;controller=category" 		title="Il est temps, pour le meilleur lecteur de musique, de remonter sur sc&egrave;ne pour un rappel. Avec le nouvel iPod, le monde est votre sc&egrave;ne.">iPods</a>
	</li>

												
<li >
	<a href="http://www.sonoloc71.fr/store/index.php?id_category=4&amp;controller=category" 		title="Tous les accessoires &agrave; la mode pour votre iPod">Accessoires</a>
	</li>

												
<li class="last">
	<a href="http://www.sonoloc71.fr/store/index.php?id_category=5&amp;controller=category" class="selected"		title="Le tout dernier processeur Intel, un disque dur plus spacieux, de la m&eacute;moire &agrave; profusion et d&#039;autres nouveaut&eacute;s. Le tout, dans &agrave; peine 2,59 cm qui vous lib&egrave;rent de toute entrave. Les nouveaux portables Mac r&eacute;unissent les performances, la puissance et la connectivit&eacute; d&#039;un ordinateur de bureau. Sans la partie bureau.">Portables</a>
	</li>

							</ul>
		
		<script type="text/javascript">
		// <![CDATA[
			// we hide the tree only if JavaScript is activated
			$('div#categories_block_left ul.dhtml').hide();
		// ]]>
		</script>
	</div>
</div>
<!-- /Block categories module -->
<?php }} ?>