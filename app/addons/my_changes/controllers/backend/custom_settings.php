<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	fn_trusted_vars('custom_settings');
	if($mode == 'manager'){
		if(count($_POST['custom_settings'])){
			foreach($_POST['custom_settings'] as $field => $value){
				$custom_setting_id = db_get_field('SELECT custom_setting_id FROM ?:custom_settings WHERE field = ?s AND type = ?s', $field, 'text');
				if($custom_setting_id){
					db_query('UPDATE ?:custom_settings SET value = ?s WHERE custom_setting_id = ?i', $value, $custom_setting_id);
				}else{
					db_query('INSERT INTO ?:custom_settings SET field = ?s, value = ?s, type = ?s', $field, $value, 'text');
				}
			}
		}
		if(count($_FILES) && count($_FILES['custom_settings']['name'])){
			foreach($_FILES['custom_settings']['name'] as $key => $v){
				if(!empty($v)){
					$file = array(
						'name' => $_FILES['custom_settings']['name'][$key],
						'type' => $_FILES['custom_settings']['type'][$key],
						'tmp_name' => $_FILES['custom_settings']['tmp_name'][$key],
						'error' => $_FILES['custom_settings']['error'][$key],
						'size' => $_FILES['custom_settings']['size'][$key]
					);
					$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
					if(move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/images/custom_settings/{$key}.{$ext}")){
						$value = "/images/custom_settings/{$key}.{$ext}";
						$custom_setting_id = db_get_field('SELECT custom_setting_id FROM ?:custom_settings WHERE field = ?s AND type = ?s', $key, 'image');
						if($custom_setting_id){
							db_query('UPDATE ?:custom_settings SET value = ?s WHERE custom_setting_id = ?i', $value, $custom_setting_id);
						}else{
							db_query('INSERT INTO ?:custom_settings SET field = ?s, value = ?s, type = ?s', $key, $value, 'image');
						}
					}else{
						fn_set_notification('E', __('error'), 'Image upload errors');
					}
				}
			}
		}
		if(count($_POST['promotions'])){
			foreach($_POST['promotions'] as $promotion_id => $discount){
				$bonus = db_get_field('SELECT bonuses FROM ?:promotions WHERE promotion_id = ?i', $promotion_id);
				$bonus = unserialize($bonus);
				foreach($bonus as $key => $b){
					if($b['discount_bonus'] == 'by_fixed'){
						$bonus[$key]['discount_value'] = $discount;
						break;
					}
				}
				$bonus = serialize($bonus);
				db_query('UPDATE ?:promotions SET bonuses = ?s WHERE promotion_id = ?i', $bonus, $promotion_id);
			}
		}
		if(count($_POST['langs'])){
			$langs = array();
			foreach($_POST['langs'] as $key => $value){
				$langs []= array('value' => $value, 'name' => $key);
				//db_query('UPDATE ?:language_values SET value = ?s WHERE name = ?s', $value, $key);
			}
			fn_update_lang_var($langs);
			fn_clear_cache();
		}
		if(count($_POST['product_discounts'])){
			foreach($_POST['product_discounts'] as $discount_category_setting_id => $enable){
				db_query('UPDATE ?:discount_category_settings SET enable = ?i WHERE discount_category_setting_id = ?i', $enable, $discount_category_setting_id);
			}
		}
		if(count($_POST['seo'])){
			foreach($_POST['seo'] as $setting_seo_id => $obj){
				db_query('UPDATE ?:custom_setting_seo SET title = ?s, description = ?s, keywords = ?s WHERE setting_seo_id = ?i', 
					$obj['title'], $obj['description'], $obj['keywords'], $setting_seo_id);
			}
		}
	}
	fn_set_notification('N', __('notice'), 'Saved');
	return array(CONTROLLER_STATUS_REDIRECT, 'custom_settings.manager');
}

if($mode == 'manager'){
	Registry::set('navigation.tabs', array (
        'main_banner' => array (
            'title' => 'Main banner',
            'href' => "custom_settings.manager?selected_section=main_banner",
            'js' => true
        ),
        'promotions' => array (
            'title' => 'Promotions',
            'href' => "custom_settings.manager?selected_section=promotions",
            'js' => true
        ),
        'lang_vars' => array (
            'title' => 'Lang vars',
            'href' => "custom_settings.manager?selected_section=conditions",
            'js' => true
        ),
        'links' => array (
            'title' => 'Links',
            'href' => "custom_settings.manager?selected_section=links",
            'js' => true
        ),
        'product_discounts' => array (
            'title' => 'Product discounts',
            'href' => "custom_settings.manager?selected_section=product_discounts",
            'js' => true
        ),
		'seo' => array (
            'title' => 'Seo',
            'href' => "custom_settings.manager?selected_section=seo",
            'js' => true
        ),
		'infusionsoft_zoho' => array (
            'title' => 'Zoho check infusionsoft companies',
            'href' => "custom_settings.manager?selected_section=infusionsoft_zoho",
            'js' => true
        )
    ));
	$product_discounts = db_get_array('SELECT dcs.*, cd.category FROM ?:discount_category_settings as dcs JOIN ?:category_descriptions as cd ON (cd.category_id = dcs.category_id) ORDER BY dcs.sauna_type ASC, dcs.category_id ASC');
	Tygh::$app['view']->assign('product_discounts', $product_discounts);

	list($promotions, $search) = fn_get_promotions();
	Tygh::$app['view']->assign('promotions', $promotions);
	
	$seo = db_get_array('SELECT * FROM ?:custom_setting_seo ORDER BY position ASC');
	Tygh::$app['view']->assign('seo', $seo);
}

?>