<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

use Tygh\Registry;
use Tygh\BlockManager\ProductTabs;
use Tygh\Mailer;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($mode == 'contact_us_for_a_price') {
		if (empty($_REQUEST['contact_us_for_a_price']['email']) || fn_validate_email($_REQUEST['contact_us_for_a_price']['email']) == false) {
			$msg = __('error_invalid_emails');
			$msg = str_replace('[emails]', $_REQUEST['contact_us_for_a_price']['email'], $msg);
			fn_set_notification('E', __('error'), $msg);
		}
		elseif (empty($_REQUEST['contact_us_for_a_price']['phone'])) {
			$msg = __('error_invalid_phones');
			$msg = str_replace('[phones]', $_REQUEST['contact_us_for_a_price']['phone'], $msg);
			fn_set_notification('E', __('error'), $msg);
		}
		elseif (empty($_REQUEST['contact_us_for_a_price']['name'])) {
			$msg = __('error_invalid_name');
			$msg = str_replace('[name]', $_REQUEST['contact_us_for_a_price']['name'], $msg);
			fn_set_notification('E', __('error'), $msg);
		}elseif (empty($_REQUEST['contact_us_for_a_price']['price_type'])) {
			$msg = 'Choose Price-Type';
			fn_set_notification('E', __('error'), $msg);
		}else{
			$product_code = db_get_field('SELECT product_code FROM ?:products WHERE product_id = ?i', (int)$_REQUEST['contact_us_for_a_price']['product_id']);			
			$product_name = db_get_field('SELECT product FROM ?:product_descriptions WHERE product_id = ?i', $_REQUEST['contact_us_for_a_price']['product_id']);
			
                        $msg = "Name: {$_REQUEST['contact_us_for_a_price']['name']}<br/>
				Email: {$_REQUEST['contact_us_for_a_price']['email']}<br/>
				Phone: {$_REQUEST['contact_us_for_a_price']['phone']}<br/>
				Price type: {$_REQUEST['contact_us_for_a_price']['price_type']}<br/>
				Product code: {$product_code}<br/>
				<a href='".fn_url('products.view?product_id='.$_REQUEST['contact_us_for_a_price']['product_id'])."' target='_blank'>{$_REQUEST['contact_us_for_a_price']['product']}</a>";		
			
			$form_data = array(
				'Name' => $_REQUEST['contact_us_for_a_price']['name'],
				'Email' => $_REQUEST['contact_us_for_a_price']['email'],
				'Phone' => $_REQUEST['contact_us_for_a_price']['phone'],
				'Price type' => $_REQUEST['contact_us_for_a_price']['price_type'],
				'Product code' => $product_code,
				'Product' => "<a target='_blank' href='".fn_url('products.view?product_id='.$_REQUEST['contact_us_for_a_price']['product_id'])."'>{$_REQUEST['contact_us_for_a_price']['product']}</a>"
			);
			$custom_form_id = save_custom_form('Sauna Repair Request', $form_data);

			$geo_zoho_pretext = fn_geo_zoho_pretext($product_shipping_price);
			
			$request_url = 'https://desk.zoho.com/support/WebToCase';
			$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
			$zoho_data = array(
				'Description' => "Price type: {$_REQUEST['contact_us_for_a_price']['price_type']}<br/>
                                    Product code: {$product_code}<br/>
                                    <a href='".fn_url('products.view?product_id='.$_REQUEST['contact_us_for_a_price']['product_id'])."' target='_blank'>{$product_name}</a>",
				'Subject' => 'Sauna Repair Request',
				'Site' => $_SERVER['HTTP_HOST'],
				'xnQsjsdp' => 'edbsn3bf1b15b746d374ce7e9344e1096cce2',
                                'xmIwtLD' => 'edbsn0e848f0537bc9d44c4d6ffe50e68c72eac3b561ac1bd2351db1866157ee51232',
                                'xJdfEaS' => '',
                                'actionType' => 'Q2FzZXM=',
                                'returnURL' => $protocol . $_SERVER['HTTP_HOST'],
                                'Created' => date('m/d/Y'),
                                'Createdhour' => date('h'),
                                'Createdminute' => date('i'),
                                'Createdampm' => date('A'),
			);	
			$zoho_data['First Name'] = '';
			$zoho_data['Contact Name'] = $_REQUEST['contact_us_for_a_price']['name'];
			$zoho_data['Email'] = $_REQUEST['contact_us_for_a_price']['email']; 
			$zoho_data['Phone'] = $_REQUEST['contact_us_for_a_price']['phone'];
			$zoho_data['Customer_TimeZone'] = $_REQUEST['contact_us_for_a_price']['timezone'];
			$zoho_data['Customer_State'] = fn_geo_country_and_state();
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 	
			$request_parameters = $zoho_data;
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request_parameters));
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
			curl_setopt($ch, CURLOPT_URL, $request_url);
			curl_setopt($ch, CURLOPT_HEADER, TRUE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$response = curl_exec($ch);
			$response_info = curl_getinfo($ch);
			curl_close($ch);
			fn_set_notification('N', __('congratulations'), 'Congratulations! Thank you for your interest one of our sales representatives will contact you shortly..');
		}

		header("Location: ".fn_url('products.view?product_id='.$_REQUEST['contact_us_for_a_price']['product_id']));
		exit;
	}elseif ($mode == 'product_feedback') {
		if (empty($_REQUEST['product_feedback']['email']) || fn_validate_email($_REQUEST['product_feedback']['email']) == false) {
			fn_set_notification('E', __('error'), 'The email address is invalid.');
		}elseif (empty($_REQUEST['product_feedback']['phone'])) {
			fn_set_notification('E', __('error'), 'The Phone field is mandatory.');
		}elseif (empty($_REQUEST['product_feedback']['name'])) {
			fn_set_notification('E', __('error'), 'The Name field is mandatory.');
		}elseif (fn_image_verification('form_builder', $_REQUEST) == false){
			
		}else{
			$product_name = db_get_field("SELECT product FROM ?:product_descriptions WHERE product_id = ?i", $_REQUEST['product_feedback']['product_id']);
			if($product_name){
				$_REQUEST['product_feedback']['product'] = "<a href='".fn_url("products.view?product_id={$_REQUEST['product_feedback']['product_id']}")."'>{$product_name}</a>";
				
				save_custom_form($_REQUEST['product_feedback']['form_name'], $_REQUEST['product_feedback']);
				
				$msg = "Contact name: {$_REQUEST['product_feedback']['name']}<br/>
					E-mail: {$_REQUEST['product_feedback']['email']}<br/>
					Phone: {$_REQUEST['product_feedback']['phone']}<br/>
					Question: {$_REQUEST['product_feedback']['question']}<br/>
					Product: {$_REQUEST['product_feedback']['product']}<br/>
					Form: {$_REQUEST['product_feedback']['form_name']}";
					
				/*Mailer::sendMail(array(
					'to' => 'onishukmax@gmail.com',//Registry::get('settings.Company.company_orders_department'),
					'from' => 'company_orders_department',
					'body' => $msg,
					'subj' => $_REQUEST['product_feedback']['form_name'],
					'data' => array('result' => $_REQUEST['product_feedback']['form_name'])
				));*/
				
				$request_url = 'https://support.infraredsaunaparts.com/support/WebToCase';
				$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
				$zoho_data = array(
					'Description' => "Question: {$_REQUEST['product_feedback']['question']}<br/>
						Product: {$_REQUEST['product_feedback']['product']}<br/>
						Form: {$_REQUEST['product_feedback']['form_name']}",
					'Subject' => $_REQUEST['product_feedback']['form_name'],
					'Site' => $_SERVER['HTTP_HOST'],
					'xnQsjsdp' => 'edbsn3bf1b15b746d374ce7e9344e1096cce2',
                                        'xmIwtLD' => 'edbsn0e848f0537bc9d44c4d6ffe50e68c72eac3b561ac1bd2351db1866157ee51232',
                                        'xJdfEaS' => '',
                                        'actionType' => 'Q2FzZXM=',
                                        'returnURL' => $protocol . $_SERVER['HTTP_HOST'],
                                        'Created' => date('m/d/Y'),
                                        'Createdhour' => date('h'),
                                        'Createdminute' => date('i'),
                                        'Createdampm' => date('A'),
				);			
				$zoho_data['First Name'] = '';
				$zoho_data['Contact Name'] = $_REQUEST['product_feedback']['name'];
				$zoho_data['Email'] = $_REQUEST['product_feedback']['email'];
				$zoho_data['Phone'] = $_REQUEST['product_feedback']['phone'];
				
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 	
				$request_parameters = $zoho_data;
				curl_setopt($ch, CURLOPT_POST, TRUE);
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request_parameters));
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
				curl_setopt($ch, CURLOPT_URL, $request_url);
				curl_setopt($ch, CURLOPT_HEADER, TRUE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				$response = curl_exec($ch);
				$response_info = curl_getinfo($ch);
				curl_close($ch);
				
				fn_set_notification('N', __('notice'), 'Congratulations! Thank you for your interest one of our sales representatives will contact you shortly..');
			}else{
				fn_set_notification('E', __('error'), 'Product not found.');
			}
		}
                header("Location: ".fn_url('products.view?product_id='.$_REQUEST['product_feedback']['product_id']));
		exit;
	}

	return array(CONTROLLER_STATUS_REDIRECT);
}







//
// Search products
//
if ($mode == 'search') {

	if(isset($_REQUEST["q"]) && trim($_REQUEST["q"]) != '' && is_numeric($_REQUEST["q"])){
		$product_id = db_get_field('SELECT product_id FROM ?:products WHERE product_code= ?i',trim($_REQUEST["q"]));
		if($product_id){
			header("Location: ".fn_url("products.view?product_id=".$product_id));
			exit;
		}
	}
	
    $params = $_REQUEST;
    fn_add_breadcrumb(__('search_results'));

    if (!empty($params['search_performed']) || !empty($params['features_hash'])) {

        $params = $_REQUEST;
        $params['extend'] = array('description');

        list($products, $search) = fn_get_products($params, Registry::get('settings.Appearance.products_per_page'));

        fn_gather_additional_products_data($products, array(
            'get_icon' => true,
            'get_detailed' => true,
            'get_additional' => true,
            'get_options'=> true
        ));

        if (!empty($products)) {
            $_SESSION['continue_url'] = Registry::get('config.current_url');
        }

        $selected_layout = fn_get_products_layout($params);

        Tygh::$app['view']->assign('products', $products);
        Tygh::$app['view']->assign('search', $search);
        Tygh::$app['view']->assign('selected_layout', $selected_layout);
    }

//
// View product details
//
} elseif ($mode == 'view' || $mode == 'quick_view') {

    $_REQUEST['product_id'] = empty($_REQUEST['product_id']) ? 0 : $_REQUEST['product_id'];

    if (!empty($_REQUEST['product_id']) && empty($auth['user_id'])) {

        $uids = explode(',', db_get_field("SElECT usergroup_ids FROM ?:products WHERE product_id = ?i", $_REQUEST['product_id']));

        if (!in_array(USERGROUP_ALL, $uids) && !in_array(USERGROUP_GUEST, $uids)) {
            return array(CONTROLLER_STATUS_REDIRECT, 'auth.login_form?return_url=' . urlencode(Registry::get('config.current_url')));
        }
    }

    $product = fn_get_product_data(
        $_REQUEST['product_id'],
        $auth,
        CART_LANGUAGE,
        '',
        true,
        true,
        true,
        true,
        fn_is_preview_action($auth, $_REQUEST),
        true,
        false,
        true
    );
	
	//$product['price'] = 0;

    if (empty($product)) {
        return array(CONTROLLER_STATUS_NO_PAGE);
    }

    if ((empty($_SESSION['current_category_id']) || empty($product['category_ids'][$_SESSION['current_category_id']])) && !empty($product['main_category'])) {
        if (!empty($_SESSION['breadcrumb_category_id']) && in_array($_SESSION['breadcrumb_category_id'], $product['category_ids'])) {
            $_SESSION['current_category_id'] = $_SESSION['breadcrumb_category_id'];
        } else {
            $_SESSION['current_category_id'] = $product['main_category'];
        }
    }

    if (!empty($product['meta_description']) || !empty($product['meta_keywords'])) {
        Tygh::$app['view']->assign('meta_description', $product['meta_description']);
        Tygh::$app['view']->assign('meta_keywords', $product['meta_keywords']);

    } else {
        $meta_tags = db_get_row(
            "SELECT meta_description, meta_keywords"
            . " FROM ?:category_descriptions"
            . " WHERE category_id = ?i AND lang_code = ?s",
            $_SESSION['current_category_id'],
            CART_LANGUAGE
        );
        if (!empty($meta_tags)) {
            Tygh::$app['view']->assign('meta_description', $meta_tags['meta_description']);
            Tygh::$app['view']->assign('meta_keywords', $meta_tags['meta_keywords']);
        }
    }
    if (!empty($_SESSION['current_category_id'])) {
        $_SESSION['continue_url'] = "categories.view?category_id=$_SESSION[current_category_id]";

        $parent_ids = fn_explode(
            '/',
            db_get_field(
                "SELECT id_path FROM ?:categories WHERE category_id = ?i",
                $_SESSION['current_category_id']
            )
        );

        if (!empty($parent_ids)) {
            Registry::set('runtime.active_category_ids', $parent_ids);
            $cats = fn_get_category_name($parent_ids);
            foreach ($parent_ids as $c_id) {
                fn_add_breadcrumb($cats[$c_id], "categories.view?category_id=$c_id");
            }
        }
    }
    fn_add_breadcrumb($product['product']);

    if (!empty($_REQUEST['combination'])) {
        $product['combination'] = $_REQUEST['combination'];
    }

    fn_gather_additional_product_data($product, true, true);
	$product['image_instruction_pairs'] = fn_get_image_pairs($product['product_id'], 'product_instruction', 'A', true, true, DESCR_SL);
	foreach($product['image_instruction_pairs'] as $key => $image){
		if(($_SESSION['sauna_type_image'] == 'indoor' && $image['detailed']['alt'] != 'indoor') || ($_SESSION['sauna_type_image'] == 'outdoor' && $image['detailed']['alt'] == 'indoor')){
			unset($product['image_instruction_pairs'][$key]);
		}
	}
	$product['image_feature_pairs'] = fn_get_image_pairs($product['product_id'], 'product_feature', 'A', true, true, DESCR_SL); 
	foreach($product['image_feature_pairs'] as $key => $image){
		if(($_SESSION['sauna_type_image'] == 'indoor' && $image['detailed']['alt'] != 'indoor') || ($_SESSION['sauna_type_image'] == 'outdoor' && $image['detailed']['alt'] == 'indoor')){
			unset($product['image_feature_pairs'][$key]);
		}
	}
	
    Tygh::$app['view']->assign('product', $product);
	
	$product_blog = db_get_row('SELECT * FROM ?:pages WHERE blog_product_id = ?i', $product['product_id']);
	if(count($product_blog)){
		Tygh::$app['view']->assign('product_blog', $product_blog);
	}

    // If page title for this product is exist than assign it to template
	//{$product.product|replace:"Peak":"Indoor"|replace:"SIERRA":"GOLDEN"|replace:"RUSTIC":"VITALITY" nofilter}
	$product['page_title'] = $product['product']." Infrared Sauna";
	if($_SESSION['sauna_type'] == 'indoor'){
		$product['page_title'] = str_replace('Peak', 'Indoor', $product['page_title']);
		$product['page_title'] = str_replace('SIERRA', 'GOLDEN', $product['page_title']);
		$product['page_title'] = str_replace('RUSTIC', 'VITALITY', $product['page_title']);
	}
    if (!empty($product['page_title'])) {
        Tygh::$app['view']->assign('page_title', $product['page_title']);
    }

    $params = array (
        'product_id' => $_REQUEST['product_id'],
        'preview_check' => true
    );
    list($files) = fn_get_product_files($params);

    if (!empty($files)) {
        Tygh::$app['view']->assign('files', $files);
    }

    /* [Product tabs] */
    $tabs = ProductTabs::instance()->getList(
        '',
        $product['product_id'],
        DESCR_SL
    );
    foreach ($tabs as $tab_id => $tab) {
        if ($tab['status'] == 'D') {
            continue;
        }
        if (!empty($tab['template'])) {
            $tabs[$tab_id]['html_id'] = fn_basename($tab['template'], ".tpl");
        } else {
            $tabs[$tab_id]['html_id'] = 'product_tab_' . $tab_id;
        }

        if ($tab['show_in_popup'] != "Y") {
            Registry::set('navigation.tabs.' . $tabs[$tab_id]['html_id'], array (
                'title' => $tab['name'],
                'js' => true
            ));
        }
    }
    Tygh::$app['view']->assign('tabs', $tabs);
    /* [/Product tabs] */

    // Set recently viewed products history
    fn_add_product_to_recently_viewed($_REQUEST['product_id']);

    $product_notification_enabled = (isset($_SESSION['product_notifications']) ? (isset($_SESSION['product_notifications']['product_ids']) && in_array($_REQUEST['product_id'], $_SESSION['product_notifications']['product_ids']) ? 'Y' : 'N') : 'N');
    if ($product_notification_enabled) {
        if (($_SESSION['auth']['user_id'] == 0) && !empty($_SESSION['product_notifications']['email'])) {
            if (!db_get_field("SELECT subscription_id FROM ?:product_subscriptions WHERE product_id = ?i AND email = ?s", $_REQUEST['product_id'], $_SESSION['product_notifications']['email'])) {
                $product_notification_enabled = 'N';
            }
        } elseif (!db_get_field("SELECT subscription_id FROM ?:product_subscriptions WHERE product_id = ?i AND user_id = ?i", $_REQUEST['product_id'], $_SESSION['auth']['user_id'])) {
            $product_notification_enabled = 'N';
        }
    }

    Tygh::$app['view']->assign('show_qty', true);
    Tygh::$app['view']->assign('product_notification_enabled', $product_notification_enabled);
    Tygh::$app['view']->assign('product_notification_email', (isset($_SESSION['product_notifications']) ? $_SESSION['product_notifications']['email'] : ''));
	
	if(count($product['main_pair']) && @$product['main_pair']['detailed']['image_path'] != ''){
		$og_image = $product['main_pair']['detailed']['image_path'];
		$og_image_alt = $product['main_pair']['detailed']['alt'];
	}else{
		if(count($product['image_pairs'])){
			$image_pair = current($product['image_pairs']);
			
			if(count($image_pair) && @$image_pair['detailed']['image_path'] != ''){
				$og_image = $image_pair['detailed']['image_path'];
				$og_image_alt = $image_pair['detailed']['alt'];
			}
		}
	}
		
	if(isset($og_image)){
		$og_image = preg_replace('/\?.*/', '', $og_image);
		Tygh::$app['view']->assign('og_image', $og_image);
		Tygh::$app['view']->assign('og_image_alt', $og_image_alt);
	}

    if ($mode == 'quick_view') {
        if (defined('AJAX_REQUEST')) {
            fn_prepare_product_quick_view($_REQUEST);
            Registry::set('runtime.root_template', 'views/products/quick_view.tpl');
        } else {
            return array(CONTROLLER_STATUS_REDIRECT, 'products.view?product_id=' . $_REQUEST['product_id']);
        }
    }

} elseif ($mode == 'options') {

    if (!defined('AJAX_REQUEST') && !empty($_REQUEST['product_data'])) {
        list($product_id, $_data) = each($_REQUEST['product_data']);
        $product_id = isset($_data['product_id']) ? $_data['product_id'] : $product_id;

        return array(CONTROLLER_STATUS_REDIRECT, 'products.view?product_id=' . $product_id);
    }
} elseif ($mode == 'product_notifications') {
    fn_update_product_notifications(array(
        'product_id' => $_REQUEST['product_id'],
        'user_id' => $_SESSION['auth']['user_id'],
        'email' => (!empty($_SESSION['cart']['user_data']['email']) ? $_SESSION['cart']['user_data']['email'] : (!empty($_REQUEST['email']) ? $_REQUEST['email'] : '')),
        'enable' => $_REQUEST['enable']
    ));
    exit;
}elseif ($mode == 'specifactions'){
	$categories = array();
	$_products = array();
	foreach(array(380, 381, 382, 383, 384) as $category_id){
		//$params = $_REQUEST;
		$params['cid'] = $category_id;
		$params['extend'] = array('categories', 'description');
		$params['subcats'] = 'Y';
		$params['pagination'] = true;

		list($products, $search) = fn_get_products($params, Registry::get('settings.Appearance.products_per_page'));		

		fn_gather_additional_products_data($products, array('get_icon' => true, 'get_detailed' => true, 'get_options' => true, 'get_discounts' => true, 'get_features' => false, 'get_additional' => true));
		foreach($products as $key => $product_data){
			$path = !empty($product_data['main_category']) ? explode('/', db_get_field("SELECT id_path FROM ?:categories WHERE category_id = ?i", $product_data['main_category'])) : '';
			$_params = array(
				'category_ids' => $path,
				'product_id' => $product_data['product_id'],
				'product_company_id' => !empty($product_data['company_id']) ? $product_data['company_id'] : 0,
				'statuses' => 'A',
				'variants' => true,
				'plain' => false,
				'display_on' => 'product',
				'existent_only' => true,
				'variants_selected_only' => false
			);
		    	list($product_data['product_features']) = fn_get_product_features($_params);
			$products[$key]['product_features'] = $product_data['product_features'];
		}

		$_products = array_merge($_products,$products);
	}
	Tygh::$app['view']->assign('products', $_products);
	Tygh::$app['view']->assign('show_qty', true);
	Tygh::$app['view']->assign('selected_layout', 'products_multicolumns');
}
/*
if($mode == 'sss'){
	echo '<pre>';
	$pr = fn_get_promotion_data(59);
	print_r($pr['bonuses'][1]['discount_value']);
	exit;
}*/

function fn_add_product_to_recently_viewed($product_id, $max_list_size = MAX_RECENTLY_VIEWED)
{
    $added = false;

    if (!empty($_SESSION['recently_viewed_products'])) {
        $is_exist = array_search($product_id, $_SESSION['recently_viewed_products']);
        // Existing product will be moved on the top of the list
        if ($is_exist !== false) {
            // Remove the existing product to put it on the top later
            unset($_SESSION['recently_viewed_products'][$is_exist]);
            // Re-sort the array
            $_SESSION['recently_viewed_products'] = array_values($_SESSION['recently_viewed_products']);
        }

        array_unshift($_SESSION['recently_viewed_products'], $product_id);
        $added = true;
    } else {
        $_SESSION['recently_viewed_products'] = array($product_id);
    }

    if (count($_SESSION['recently_viewed_products']) > $max_list_size) {
        array_pop($_SESSION['recently_viewed_products']);
    }

    return $added;
}

function fn_set_product_popularity($product_id, $popularity_view = POPULARITY_VIEW)
{
    if (empty($_SESSION['products_popularity']['viewed'][$product_id])) {
        $_data = array (
            'product_id' => $product_id,
            'viewed' => 1,
            'total' => $popularity_view
        );

        db_query("INSERT INTO ?:product_popularity ?e ON DUPLICATE KEY UPDATE viewed = viewed + 1, total = total + ?i", $_data, $popularity_view);

        $_SESSION['products_popularity']['viewed'][$product_id] = true;

        return true;
    }

    return false;
}

function fn_update_product_notifications($data)
{
    if (!empty($data['email']) && fn_validate_email($data['email'])) {
        $_SESSION['product_notifications']['email'] = $data['email'];
        if ($data['enable'] == 'Y') {
            db_query("REPLACE INTO ?:product_subscriptions ?e", $data);
            if (!isset($_SESSION['product_notifications']['product_ids']) || (is_array($_SESSION['product_notifications']['product_ids']) && !in_array($data['product_id'], $_SESSION['product_notifications']['product_ids']))) {
                $_SESSION['product_notifications']['product_ids'][] = $data['product_id'];
            }

            fn_set_notification('N', __('notice'), __('product_notification_subscribed'));
        } else {
            $deleted = db_query("DELETE FROM ?:product_subscriptions WHERE product_id = ?i AND user_id = ?i AND email = ?s", $data['product_id'], $data['user_id'], $data['email']);

            if (isset($_SESSION['product_notifications']) && isset($_SESSION['product_notifications']['product_ids']) && in_array($data['product_id'], $_SESSION['product_notifications']['product_ids'])) {
                $_SESSION['product_notifications']['product_ids'] = array_diff($_SESSION['product_notifications']['product_ids'], array($data['product_id']));
            }

            if (!empty($deleted)) {
                fn_set_notification('N', __('notice'), __('product_notification_unsubscribed'));
            }
        }
    }
}
