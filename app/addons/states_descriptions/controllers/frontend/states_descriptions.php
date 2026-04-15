<?php
/***************************************************************************
*                                                                          *
*   (c) 2017 Max Onishchuk                                                 *
*                                                                          *
****************************************************************************/

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if($mode == 'view' && isset($_REQUEST['u'])){
	$categories = array();
	foreach(array(5,14,13,11,3,6,7,8,15,9,378) as $category_id){
		$params = $_REQUEST;
		$params['cid'] = $category_id;
		$params['extend'] = array('categories', 'description');
		$params['subcats'] = 'Y';
		$params['pagination'] = true;

		list($products, $search) = fn_get_products($params, Registry::get('settings.Appearance.products_per_page'));
		foreach($products as $key => $product){
			$products[$key]['list_price'] = 0;
			$products[$key]['price'] = 0;
		}

		fn_gather_additional_products_data($products, array('get_icon' => true, 'get_detailed' => true, 'get_options' => true, 'get_discounts' => true, 'get_features' => false));

		#$view->assign('products', $products);
		#$view->assign('search', $search);
		$categories []= array(
			'category' => fn_get_category_data($category_id),
			'products' => $products
		);
	}
	
	$state = fn_get_state_by_url($_REQUEST['u']);
	
	Tygh::$app['view']->assign('state', $state);
	
	Tygh::$app['view']->assign('categories', $categories);
	Tygh::$app['view']->assign('show_qty', true);
	$selected_layout = fn_get_products_layout($_REQUEST);
	Tygh::$app['view']->assign('selected_layout', $selected_layout);
	Tygh::$app['view']->assign('page_title', @$state['state'].' Outdoor Infrared Saunas');
}

