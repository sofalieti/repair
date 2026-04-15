<?php
use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if($mode == 'view'){
	/*$category_id = empty($_REQUEST['category_id']) ? 0 : $_REQUEST['category_id'];
	$category = fn_get_category_data($category_id);
	$seo = fn_my_changes_get_seo_by_type('categories', $category);
	if($seo){
		Tygh::$app['view']->assign('page_title', $seo['title']);
		Tygh::$app['view']->assign('meta_description', $seo['description']);
		Tygh::$app['view']->assign('meta_keywords', $seo['keywords']);
	}*/
}