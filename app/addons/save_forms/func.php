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


//
// $Id$
//

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

function fn_save_forms_send_form($page_data, $form_values, $result, $from, $sender, $attachments, $is_html){
    save_form($page_data['page_id'],$form_values);
}
function fn_save_forms_find_by_ip($ip = false){
	$ip = $ip ? $ip : $_SERVER['REMOTE_ADDR'];
	$form_data_id = db_get_field('SELECT id FROM ?:form_data WHERE page_name = ?s AND ip = ?s ORDER BY id DESC', 'Contact us for price', $ip);
	if($form_data_id) {
		if(!empty($form_data_id)) return array(
			'name' => db_get_field('SELECT field_value FROM ?:form_data_values WHERE form_data_id = ?i AND field_name = ?s', $form_data_id, 'Name'),
			'email' => db_get_field('SELECT field_value FROM ?:form_data_values WHERE form_data_id = ?i AND field_name = ?s', $form_data_id, 'Email'),
			'phone' => db_get_field('SELECT field_value FROM ?:form_data_values WHERE form_data_id = ?i AND field_name = ?s', $form_data_id, 'Phone'),
			'form_data_id' => $form_data_id
		);
	}
	return false;
}
function save_custom_form($subject, $data){
	$create_form_data = db_query("INSERT INTO ?:form_data (page_id, page_name, ip) VALUES (0,'{$subject}', '".$_SERVER['REMOTE_ADDR']."')");
	foreach ($data as $form_name => $value){
		$create_form_data_value = db_query('INSERT INTO ?:form_data_values (form_description_id,field_name,field_value,form_data_id)
				                    VALUES (0, "'.$form_name.'", "'.htmlspecialchars($value).'", '.$create_form_data.')');
	}
	
	//fn_crm_infusionsoft_api_send($create_form_data);
	
	return $create_form_data;
}
function save_form($page_id, $form_data){
    $page = db_get_row("SELECT page FROM ?:page_descriptions WHERE page_id = $page_id");
    $create_form_data = db_query("INSERT INTO ?:form_data (page_id,page_name,ip) VALUES ($page_id,'{$page['page']}','".$_SERVER['REMOTE_ADDR']."')");
    $form_data_id = $create_form_data;

    foreach ($form_data as $form_description_id => $value){
		if(preg_match('/^[0-9]{1,10}$/', $form_description_id)){
			$form_description = db_get_row("SELECT description FROM ?:form_descriptions WHERE object_id = $form_description_id");
			/**/
			$_form_description = str_replace("'", "\'", $form_description['description']);
			$_value = str_replace("'", "\'", $value);
			/**/
			$create_form_data_value = db_query("INSERT INTO ?:form_data_values (form_description_id,field_name,field_value,form_data_id)
												VALUES ($form_description_id, '$_form_description', '$_value', $form_data_id)
			");
		}
    }
	
	

    /*$images = save_images($_FILES);    
    #save images
	foreach($images['images'] as $image){
        $create_image = db_query("INSERT INTO ?:form_data_images (name,path,thumb_path,form_data_id)
                                    VALUES ('$image','{$images['image_path']}','{$images['image_thumb_path']}',$form_data_id)
        ");
    }*/
}
function save_images($files){
    define("FORM_IMAGE_PATH", "/images/form_data/");
    define("FROM_IMAGE_THUMB_PATH", "/images/form_data/thumb/");
    $result = array(
        "image_path" => FORM_IMAGE_PATH,
        "image_thumb_path" => FROM_IMAGE_THUMB_PATH
    );
    #prepare files
    $p_files = array();
    foreach ($files['file_fb_files']['name'] as $key => $name){
        if(!empty ($name)){
            $p_files[] = array(
                'name' => $name,
                'type' => $files['file_fb_files']['type'][$key],
                'tmp_name' => $files['file_fb_files']['tmp_name'][$key],
                'error' => $files['file_fb_files']['error'][$key],
                'size' => $files['file_fb_files']['size'][$key],
            );
        }
    }

	
    #upload files
    require_once $_SERVER['DOCUMENT_ROOT']."/app/functions/class.upload.php";
	//echo $_SERVER['DOCUMENT_ROOT'];
	//print_r($p_files);exit;

    foreach($p_files as $p_file){
        //upload medium
        $upload = new upload($p_file);
        $upload->file_new_name_body = time();
        $upload->image_resize = true;
        $upload->image_ratio = true;
        $upload->image_x = 800;
        $upload->image_y = 800;
        $upload->process($_SERVER['DOCUMENT_ROOT'].FORM_IMAGE_PATH);

        //upload thumb
        $thumb = new upload($_SERVER['DOCUMENT_ROOT'].FORM_IMAGE_PATH.$upload->file_dst_name);
        $thumb->image_resize = true;
        $thumb->image_ratio = true;
        $thumb->image_x = 100;
        $thumb->image_y = 100;
        $thumb->process($_SERVER['DOCUMENT_ROOT'].FROM_IMAGE_THUMB_PATH);

        $result['images'][] = $upload->file_dst_name;
    }
    return $result;
}

function fn_crm_infusionsoft_api_send($form_data_id){
	$form = db_get_row('SELECT * FROM ?:form_data WHERE id = ?i', $form_data_id);
	$values = db_get_array('SELECT * FROM ?:form_data_values WHERE form_data_id = ?i', $form_data_id);
	
	//print_r($values);
	//exit;
	
	if($form['page_id'] == 0 && $form['page_name'] == 'Contact us for price'){
		$data_values = array();
		foreach($values as $obj){
			$data_values[strtolower($obj['field_name'])] = $obj['field_value'];
		}
		if(isset($data_values['whb']) && fn_crm_infusionsoft_api_get_tag_ids($data_values['whb']) != false){
			if(isset($data_values['name']) && isset($data_values['email']) && isset($data_values['product code']) && isset($data_values['phone'])){
				require_once $_SERVER['DOCUMENT_ROOT'].'/infusionsoft-apps/vendor/autoload.php';
				$config = array(
					'clientId'     => 'ep5ybywxzk5ybexw2h4psdjf',
					'clientSecret' => 'Ay3ecZAmR9',
					'redirectUri'  => 'https://enlightensauna.com/infusionsoft-apps/',
				);
				$infusionsoft = new \Infusionsoft\Infusionsoft($config);
				$token_data = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/infusionsoft-apps/token_data');
				if(!empty($token_data)){
					$token_data = unserialize($token_data);
					$infusionsoft->setToken($token_data);
					if($infusionsoft->isTokenExpired()) {
						$infusionsoft->refreshAccessToken();
						file_put_contents($_SERVER['DOCUMENT_ROOT'].'/infusionsoft-apps/token_data', serialize($infusionsoft->getToken()));
					}
					
					
					$contacts = $infusionsoft->contacts('xml')->findByEmail(trim($data_values['email']), ['Id','Email','FirstName']);
					
					if($contacts){
						$contact_id = $contacts[0]['Id'];
					}else{					
						$contact_id = $infusionsoft->contacts('xml')->add(array(
							'FirstName' => $data_values['name'], 
							'Email' => $data_values['email'], 
							'Phone1' => $data_values['phone']
						));	 
					}
					
					
					
					$infusionsoft->emails('xml')->optIn($data_values['email'], 'This is lead from our website (https://enlightensauna.com)');
					
					//Product data
					$product_id = db_get_field('SELECT product_id FROM ?:products WHERE product_code = ?s', $data_values['product code']);
					if($product_id){
						$user_data = array();
						$product = fn_get_product_data($product_id, $_SESSION['auth']);
						fn_promotion_apply('catalog', $product, $_SESSION['auth']);
						$product_promotion = current($product['promotions']);
						
						$user_data['_Promotion'] = __('infusionsoft_promotion_name');
						$product_name = $product['product'];
						if($_SESSION['sauna_type'] == 'indoor'){
							$product_name = str_replace('Peak', 'Indoor', $product_name);
							$product_name = str_replace('SIERRA', 'GOLDEN', $product_name);
							$product_name = str_replace('RUSTIC', 'VITALITY', $product_name);
						}
						$user_data['_PromotionSaunaName'] = $product_name;
						
						if($_SESSION['sauna_type'] == 'indoor'){
							$product['list_price'] = $product['indoor_price'];
						}
						
						if(fn_discount_category_enable($product['main_category'], $_SESSION['sauna_type']) || $product['show_discount']){
							$user_data['_PromotionSaunaLastPrice'] = '$'.round($product['list_price']);
							
							if(isset($product_promotion['bonuses']) && @$product_promotion['bonuses'][0]['discount_bonus'] == 'by_fixed'){
								$user_data['_PromotionSaunaPrice'] = '$'.round($product['list_price']-$product_promotion['bonuses'][0]['discount_value']);
								$user_data['_PromotionSaunaDiscount'] = '$'.round($product_promotion['bonuses'][0]['discount_value']);
							}
						}else{
							$user_data['_PromotionSaunaPrice'] = '$'.round($product['list_price']);
						}
						
						$user_data['_PromotionChromotherapyPrice'] = $_SESSION['sauna_type'] == 'outdoor' ? @$_SESSION['domain_langs']['chromotherapy_price'] : @$_SESSION['domain_langs']['indoor_chromotherapy_price'];
						$user_data['_PromotionIonizerPrice'] = $_SESSION['sauna_type'] == 'outdoor' ? @$_SESSION['domain_langs']['ionizer_price'] : @$_SESSION['domain_langs']['indoor_ionizer_price'];
						
						$product_shipping_price = db_get_field('SELECT shipping_price FROM ?:products WHERE product_id = ?i', $product_id);
						$price = fn_geo_get_shipping_price($product_shipping_price);
						
						$user_data['_PromotionShippingPrice'] = $price;
						
						$infusionsoft->contacts('xml')->update($contact_id, $user_data);
					}
					
					$goal = $infusionsoft->funnels()->achieveGoal('fm445', $_SESSION['sauna_type'].'form'.$data_values['product code'], $contact_id);
					if(isset($goal[0]) && $goal[0]['success'] == 1){
						$tag = $infusionsoft->contacts('xml')->addToGroup($contact_id, fn_crm_infusionsoft_api_get_tag_ids($data_values['whb']));
						//$tag2 = $infusionsoft->contacts('xml')->addToGroup($contact_id, 145);
					}else{
						fn_log_event('requests', 'http', array(
							'url' => 'https://infusionsoft.com',
							'data' => '',
							'response' => "Goal infusionsoft error".print_r($goal, true)
						));
					}
					
					
				}else{
					//Установить токен
					fn_log_event('requests', 'http', array(
						'url' => 'https://infusionsoft.com',
						'data' => '',
						'response' => "Token infusionsoft error, https://enlightensauna.com/infusionsoft-apps/"
					));
				}
			}
		}
	}elseif($form['page_id'] == 0 && $form['page_name'] == 'Outdoor Infrared Sauna Guide Campaign'){
		$data_values = array();
		foreach($values as $obj){
			$data_values[strtolower($obj['field_name'])] = $obj['field_value'];
		}
		if(isset($data_values['whb']) && fn_crm_infusionsoft_api_get_tag_ids($data_values['whb']) != false){
			if(isset($data_values['name']) && isset($data_values['email'])){
				require_once $_SERVER['DOCUMENT_ROOT'].'/infusionsoft-apps/vendor/autoload.php';
				$config = array(
					'clientId'     => 'ep5ybywxzk5ybexw2h4psdjf',
					'clientSecret' => 'Ay3ecZAmR9',
					'redirectUri'  => 'https://enlightensauna.com/infusionsoft-apps/',
				);
				$infusionsoft = new \Infusionsoft\Infusionsoft($config);
				$token_data = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/infusionsoft-apps/token_data');
				if(!empty($token_data)){
					$token_data = unserialize($token_data);
					$infusionsoft->setToken($token_data);
					if($infusionsoft->isTokenExpired()) {
						$infusionsoft->refreshAccessToken();
						file_put_contents($_SERVER['DOCUMENT_ROOT'].'/infusionsoft-apps/token_data', serialize($infusionsoft->getToken()));
					}
					
					$contacts = $infusionsoft->contacts('xml')->findByEmail(trim($data_values['email']), ['Id','Email','FirstName']);
					
					if($contacts){
						$contact_id = $contacts[0]['Id'];
					}else{					
						$contact_id = $infusionsoft->contacts('xml')->add(array(
							'FirstName' => $data_values['name'], 
							'Email' => $data_values['email']
						));	 
					}
					
					$infusionsoft->emails('xml')->optIn($data_values['email'], 'This is lead from our website (https://enlightensauna.com)');
					
					$goal = $infusionsoft->funnels()->achieveGoal('fm445', 'buyform', $contact_id);
					
					if(isset($goal[0]) && $goal[0]['success'] == 1){
						$tag = $infusionsoft->contacts('xml')->addToGroup($contact_id, fn_crm_infusionsoft_api_get_tag_ids($data_values['whb']));
						//$tag2 = $infusionsoft->contacts('xml')->addToGroup($contact_id, 145);
					}else{
						fn_log_event('requests', 'http', array(
							'url' => 'https://infusionsoft.com',
							'data' => '',
							'response' => "Goal infusionsoft error".print_r($goal, true)
						));
					}
					
					
				}else{
					//Установить токен
					fn_log_event('requests', 'http', array(
						'url' => 'https://infusionsoft.com',
						'data' => '',
						'response' => "Token infusionsoft error, https://outdoorinfraredsauna.com/infusionsoft-apps/"
					));
				}
			}
		}
	}
}
function fn_crm_infusionsoft_api_get_tag_ids($tag){
	$data = array(
		"detoxification" => 143,
		"pain relief" => 105,
		"stress relief" => 107,
		"weight loss" => 109,
		"skin health" => 111,
		"cell health" => 113,
		"wound healing" => 115,
		"hyperthermia" => 117,
		"lowering blood pressure" => 119,
		"fibromyalgia" => 121,
		"lyme disease" => 123,
		"chronic fatigue" => 125,
		"arthritis" => 127,
		"cancer" => 129,
		"cardiovascular health" => 103
	);
	if(isset($data[$tag])) return $data[$tag];
	return false;
}

function fn_crm_infusionsoft_send($form_data_id){
	$form = db_get_row('SELECT * FROM ?:form_data WHERE id = ?i', $form_data_id);
	$values = db_get_array('SELECT * FROM ?:form_data_values WHERE form_data_id = ?i', $form_data_id);
	
	if($form['page_id'] == 0 && $form['page_name'] == 'Contact us for price'){
		
		$data_values = array();
		foreach($values as $obj){
			$data_values[strtolower($obj['field_name'])] = $obj['field_value'];
		}
		if(isset($data_values['name']) && isset($data_values['email']) && isset($data_values['product code']) && isset($data_values['phone'])){
			if($data_values['product code'] == 16376){//Seira 2		
				$params = array(
					'inf_form_xid' => '3731fe5d93ddc940719dc4fa8260d6e2',
					'inf_form_name' => "Sierra 2 Form",
					'infusionsoft_version' => '1.69.0.42978',
					'inf_field_FirstName' => $data_values['name'],
					'inf_field_Email' => $data_values['email'],
					'inf_field_Phone1' => $data_values['phone'],
					'inf_custom_WhathealthbenefitisMOSTimportanttoyou' => $data_values['whb'],
					'inf_custom_GaContent' => 'null',
					'inf_custom_GaSource' => 'null',
					'inf_custom_GaMedium' => 'null',
					'inf_custom_GaTerm' => 'null',
					'inf_custom_GaCampaign' => 'null',
					'inf_custom_GaReferurl' => 'null',
					'inf_custom_IPAddress' => 'null',
				);
				$url="https://fm445.infusionsoft.com/app/form/process/3731fe5d93ddc940719dc4fa8260d6e2";
				fn_crm_infusionsoft_send_curl($params, $url);
			}
			
			
			if($data_values['product code'] == 17376){//Rustic 2		
				$params = array(
					'inf_form_xid' => 'e13e9cd5c6f6959b2c3f13bcfb861736',
					'inf_form_name' => "Rustic 2 Form",
					'infusionsoft_version' => '1.69.0.42978',
					'inf_field_FirstName' => $data_values['name'],
					'inf_field_Email' => $data_values['email'],
					'inf_field_Phone1' => $data_values['phone'],
					'inf_custom_WhathealthbenefitisMOSTimportanttoyou' => $data_values['whb'],
					'inf_custom_GaContent' => 'null',
					'inf_custom_GaSource' => 'null',
					'inf_custom_GaMedium' => 'null',
					'inf_custom_GaTerm' => 'null',
					'inf_custom_GaCampaign' => 'null',
					'inf_custom_GaReferurl' => 'null',
					'inf_custom_IPAddress' => 'null',
				);
				$url="https://fm445.infusionsoft.com/app/form/process/e13e9cd5c6f6959b2c3f13bcfb861736";
				fn_crm_infusionsoft_send_curl($params, $url);
			}
			
			
			if($data_values['product code'] == 16377){//Sierra 3	
				$params = array(
					'inf_form_xid' => '76e384a12937163230c0ab006930bf27',
					'inf_form_name' => "Sierra 3 Form",
					'infusionsoft_version' => '1.69.0.42978',
					'inf_field_FirstName' => $data_values['name'],
					'inf_field_Email' => $data_values['email'],
					'inf_field_Phone1' => $data_values['phone'],
					'inf_custom_WhathealthbenefitisMOSTimportanttoyou' => $data_values['whb'],
					'inf_custom_GaContent' => 'null',
					'inf_custom_GaSource' => 'null',
					'inf_custom_GaMedium' => 'null',
					'inf_custom_GaTerm' => 'null',
					'inf_custom_GaCampaign' => 'null',
					'inf_custom_GaReferurl' => 'null',
					'inf_custom_IPAddress' => 'null',
				);
				$url="https://fm445.infusionsoft.com/app/form/process/76e384a12937163230c0ab006930bf27";
				fn_crm_infusionsoft_send_curl($params, $url);
			}
			
			
			if($data_values['product code'] == 17377){//Rustic 3	
				$params = array(
					'inf_form_xid' => '689f3b9a965391c1b2675e5fbbc7dae4',
					'inf_form_name' => "Rustic 3 Form",
					'infusionsoft_version' => '1.69.0.42978',
					'inf_field_FirstName' => $data_values['name'],
					'inf_field_Email' => $data_values['email'],
					'inf_field_Phone1' => $data_values['phone'],
					'inf_custom_WhathealthbenefitisMOSTimportanttoyou' => $data_values['whb'],
					'inf_custom_GaContent' => 'null',
					'inf_custom_GaSource' => 'null',
					'inf_custom_GaMedium' => 'null',
					'inf_custom_GaTerm' => 'null',
					'inf_custom_GaCampaign' => 'null',
					'inf_custom_GaReferurl' => 'null',
					'inf_custom_IPAddress' => 'null',
				);
				$url="https://fm445.infusionsoft.com/app/form/process/689f3b9a965391c1b2675e5fbbc7dae4";
				fn_crm_infusionsoft_send_curl($params, $url);
			}
			
			
				
			if($data_values['product code'] == 16378){//Sierra 4	
				$params = array(
					'inf_form_xid' => '8f5320128139a518619698c8485768ec',
					'inf_form_name' => "Sierra 4 Form",
					'infusionsoft_version' => '1.69.0.42978',
					'inf_field_FirstName' => $data_values['name'],
					'inf_field_Email' => $data_values['email'],
					'inf_field_Phone1' => $data_values['phone'],
					'inf_custom_WhathealthbenefitisMOSTimportanttoyou' => $data_values['whb'],
					'inf_custom_GaContent' => 'null',
					'inf_custom_GaSource' => 'null',
					'inf_custom_GaMedium' => 'null',
					'inf_custom_GaTerm' => 'null',
					'inf_custom_GaCampaign' => 'null',
					'inf_custom_GaReferurl' => 'null',
					'inf_custom_IPAddress' => 'null',
				);
				$url="https://fm445.infusionsoft.com/app/form/process/8f5320128139a518619698c8485768ec";
				fn_crm_infusionsoft_send_curl($params, $url);
			}
			
				
			if($data_values['product code'] == 17378){//Rustic 4	
				$params = array(
					'inf_form_xid' => '977573bca36ebd7bd8a0617e42efe7e9',
					'inf_form_name' => "Rustic 4 Form",
					'infusionsoft_version' => '1.69.0.42978',
					'inf_field_FirstName' => $data_values['name'],
					'inf_field_Email' => $data_values['email'],
					'inf_field_Phone1' => $data_values['phone'],
					'inf_custom_WhathealthbenefitisMOSTimportanttoyou' => $data_values['whb'],
					'inf_custom_GaContent' => 'null',
					'inf_custom_GaSource' => 'null',
					'inf_custom_GaMedium' => 'null',
					'inf_custom_GaTerm' => 'null',
					'inf_custom_GaCampaign' => 'null',
					'inf_custom_GaReferurl' => 'null',
					'inf_custom_IPAddress' => 'null',
				);
				$url="https://fm445.infusionsoft.com/app/form/process/977573bca36ebd7bd8a0617e42efe7e9";
				fn_crm_infusionsoft_send_curl($params, $url);
			}
			
			if($data_values['product code'] == 16379){//Sierra 4C	
				$params = array(
					'inf_form_xid' => '4e8c16a891ce6e77c09279aba851f0e0',
					'inf_form_name' => "Sierra 4C Form",
					'infusionsoft_version' => '1.69.0.42978',
					'inf_field_FirstName' => urlencode($data_values['name']),
					'inf_field_Email' => urlencode($data_values['email']),
					'inf_field_Phone1' => urlencode($data_values['phone']),
					'inf_custom_WhathealthbenefitisMOSTimportanttoyou' => urlencode($data_values['whb']),
					'inf_custom_GaContent' => 'null',
					'inf_custom_GaSource' => 'null',
					'inf_custom_GaMedium' => 'null',
					'inf_custom_GaTerm' => 'null',
					'inf_custom_GaCampaign' => 'null',
					'inf_custom_GaReferurl' => 'null',
					'inf_custom_IPAddress' => 'null',
				);
				$url="https://fm445.infusionsoft.com/app/form/process/4e8c16a891ce6e77c09279aba851f0e0";
				fn_crm_infusionsoft_send_curl($params, $url);
			}
			
				
			if($data_values['product code'] == 17379){//Rustic 4C	
				$params = array(
					'inf_form_xid' => 'ffb42fe925caa3b413deda4939f0814b',
					'inf_form_name' => "Rustic 4C Form",
					'infusionsoft_version' => '1.69.0.42978',
					'inf_field_FirstName' => $data_values['name'],
					'inf_field_Email' => $data_values['email'],
					'inf_field_Phone1' => $data_values['phone'],
					'inf_custom_WhathealthbenefitisMOSTimportanttoyou' => $data_values['whb'],
					'inf_custom_GaContent' => 'null',
					'inf_custom_GaSource' => 'null',
					'inf_custom_GaMedium' => 'null',
					'inf_custom_GaTerm' => 'null',
					'inf_custom_GaCampaign' => 'null',
					'inf_custom_GaReferurl' => 'null',
					'inf_custom_IPAddress' => 'null',
				);
				$url="https://fm445.infusionsoft.com/app/form/process/ffb42fe925caa3b413deda4939f0814b";
				fn_crm_infusionsoft_send_curl($params, $url);
			}
			
			if($data_values['product code'] == 16380){//Sierra 5	
				$params = array(
					'inf_form_xid' => 'c655b81a7003c343ef2fadda06639dd8',
					'inf_form_name' => "Sierra 5 Form",
					'infusionsoft_version' => '1.70.0.58116',
					'inf_field_FirstName' => $data_values['name'],
					'inf_field_Email' => $data_values['email'],
					'inf_field_Phone1' => $data_values['phone'],
					'inf_custom_WhathealthbenefitisMOSTimportanttoyou' => $data_values['whb'],
					'inf_custom_GaContent' => 'null',
					'inf_custom_GaSource' => 'null',
					'inf_custom_GaMedium' => 'null',
					'inf_custom_GaTerm' => 'null',
					'inf_custom_GaCampaign' => 'null',
					'inf_custom_GaReferurl' => 'null',
					'inf_custom_IPAddress' => 'null',
				);
				$url="https://fm445.infusionsoft.com/app/form/process/c655b81a7003c343ef2fadda06639dd8";
				fn_crm_infusionsoft_send_curl($params, $url);
			}
			
				
			if($data_values['product code'] == 19378){//Rustic 5	
				$params = array(
					'inf_form_xid' => '0e35fb28d8662d9d634f6ce22e0a60ba',
					'inf_form_name' => "Rustic 5 Form",
					'infusionsoft_version' => '1.69.0.42978',
					'inf_field_FirstName' => $data_values['name'],
					'inf_field_Email' => $data_values['email'],
					'inf_field_Phone1' => $data_values['phone'],
					'inf_custom_WhathealthbenefitisMOSTimportanttoyou' => $data_values['whb'],
					'inf_custom_GaContent' => 'null',
					'inf_custom_GaSource' => 'null',
					'inf_custom_GaMedium' => 'null',
					'inf_custom_GaTerm' => 'null',
					'inf_custom_GaCampaign' => 'null',
					'inf_custom_GaReferurl' => 'null',
					'inf_custom_IPAddress' => 'null',
				);
				$url="https://fm445.infusionsoft.com/app/form/process/0e35fb28d8662d9d634f6ce22e0a60ba";
				fn_crm_infusionsoft_send_curl($params, $url);
			}
			//print_r($form);
			//print_r($params);
			//exit;	
		}		
	}
	
}
function fn_crm_infusionsoft_send_curl($params, $url){
	/*$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt($ch, CURLOPT_HEADER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
	$response = json_decode(curl_exec($ch), true);
	$info = curl_getinfo($ch);*/
	//print_r($info);
	//print_r($response);
	//exit;
}



?>
