<?php
use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if($mode == 'index'){
	$seo = fn_my_changes_get_seo_by_type('home_page');
	if($seo){
		Tygh::$app['view']->assign('page_title', $seo['title']);
		Tygh::$app['view']->assign('meta_description', $seo['description']);
		Tygh::$app['view']->assign('meta_keywords', $seo['keywords']);
	}
}