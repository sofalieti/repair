<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if($mode == 'generate'){// php admin.php --dispatch=custom_sitemap.generate
	//Main menu
	$params = array(
		'section' => 'A',
		'get_params' => true,
		'icon_name' => '',
		'multi_level' => true,
		'use_localization' => true,
		'status' => 'A',
		'generate_levels' => true,
		'request' => array(
			'menu_id' => 5,
		),
		'host' => 'test.com'
	);

	$menu_items = @fn_top_menu_form(fn_get_static_data($params));
	$menu_items = fn_get_links_from_menu($menu_items);
	array_walk_recursive($menu_items, function ($item, $key) use (&$result) {
		$result[] = $item;    
	});
	$menu_items = array_unique($result);
	
	//Products
	
	$product_items = array();
	
	$params = array(
		'cid' => array(3, 378),
		'status' => 'A'
	);
	list($products, $search) = fn_get_products($params);
	fn_gather_additional_products_data($products, array('get_icon' => true, 'get_detailed' => true, 'get_additional' => true, 'get_options' => false, 'get_discounts' => false, 'get_features' => false));
	foreach($products as $product){
		$link = parse_url(fn_url('products.view?product_id='.$product['product_id'], 'C'), PHP_URL_PATH);
		$product_items []= '/outdoor'.$link;
		
		if(fn_is_indoor_product($product)){
			$product_items []= '/indoor'.$link;
		}
	}
	
	//reviews
	$page_items = array();
	
	$reviews = db_get_array("SELECT page_id FROM ?:pages WHERE parent_id = ?i AND status = ?s AND page_type = ?s", 114, 'A', 'B');
	
	foreach($reviews as $page){
		$link = parse_url(fn_url('pages.view?page_id='.$page['page_id'], 'C'), PHP_URL_PATH);
		$page_items []= $link;
	}
	
	
	$items = array_merge($menu_items, $product_items, $page_items);
	

	$dir = $_SERVER['DOCUMENT_ROOT'];
	foreach(fn_domains_get_all() as $domain){
		$xml = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		foreach($items as $link){
			$xml .= fn_sitemap_xml_item($link, $domain['name']);
		}
		$xml .= "</urlset>";
		$filename = 'sitemap_'.str_replace('.', '_', $domain['name']).'.xml';
		file_put_contents($dir.'/'.$filename, $xml);
		
		echo "\nGenerate $filename<br/>\n";
	}
	
	exit;
}


function fn_get_links_from_menu($menu_items){
	$links = array();
	foreach($menu_items as $menu){
		if($menu['href'] != "#"){
			$link = $menu['href'];
			if(preg_match('/pages\.view/i', $link)){
				$link = parse_url(fn_url($link, 'C'), PHP_URL_PATH);
			}
			$links []= $link;
		}
		if(isset($menu['subitems']) && count($menu['subitems'])){
			$links []= fn_get_links_from_menu($menu['subitems']);
		}
	}
	return $links;
}

function fn_sitemap_xml_item($link, $domain){
	return "<url>
        <loc>https://{$domain}{$link}</loc>
        <priority>0.5</priority>
    </url>";
}

function fn_is_indoor_product($product){
	if(isset($product['main_pair']) && $product['main_pair']['detailed']['alt'] == 'indoor'){
		return true;
	}
	if(isset($product['image_pairs'])){
		foreach($product['image_pairs'] as $image){
			if($image['detailed']['alt'] == 'indoor'){
				return true;
			}
		}
	}
	return false;
}

?>