<?php


class Tools extends ToolsCore {
	
	public static function getCMSTitle($id_cms, $id_lang) {
    		$cms = new CMS($id_cms, $id_lang);
    		return $cms->meta_title;
	}

}

?>
