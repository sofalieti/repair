<?php
use Tygh\Registry;
ini_set("display_errors",1);
error_reporting(E_ALL);
if (!defined('BOOTSTRAP')) { die('Access denied'); }


if($mode == 'jivosite_data_from_zoho' && isset($_GET['name']) && isset($_GET['email']) && isset($_GET['phone'])){
	$history = db_get_field('SELECT jivosite_zoho_to_infusion_id FROM ?:jivosite_zoho_to_infusions WHERE phone = ?s',
		$_GET['phone']);
		
	$find_in_forms = db_get_field('SELECT ?:form_data.id FROM ?:form_data JOIN ?:form_data_values ON(?:form_data.id = ?:form_data_values.form_data_id) 
		WHERE ?:form_data_values.field_name = ?s AND ?:form_data_values.field_value = ?s AND ?:form_data.page_name = ?s',
		"Phone", $_GET['phone'], "Contact us for price");
	
	if(!$history && !$find_in_forms){
		$params = array(
			'cid' => array(3, 378)
		);
		list($products, $search) = fn_get_products($params);
		Tygh::$app['view']->assign('products', $products);
	}else{
		die('Already Sent');
	}
}elseif($mode == 'jivosite_data_from_zoho_save' && $_SERVER['REQUEST_METHOD'] == 'POST'){
	require_once $_SERVER['DOCUMENT_ROOT'].'/infusionsoft-apps/vendor/autoload.php';
	$config = array(
		'clientId'     => 'ep5ybywxzk5ybexw2h4psdjf',
		'clientSecret' => 'Ay3ecZAmR9',
		'redirectUri'  => 'https://outdoorinfraredsauna.com/infusionsoft-apps/',
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
		
		$contact_id = $infusionsoft->contacts('xml')->add(array(
			'FirstName' => $_POST['contact_us_for_a_price']['name'], 
			'Email' => $_POST['contact_us_for_a_price']['email'], 
			'Phone1' => $_POST['contact_us_for_a_price']['phone']
		));	 
		
		$infusionsoft->emails('xml')->optIn($_POST['contact_us_for_a_price']['email'], 'This is lead from our website (http://outdoorinfraredsauna.com)');
		
		//Product data
		$product_id = $_POST['contact_us_for_a_price']['product_id'];
		if($product_id){
			$user_data = array();
			$product = fn_get_product_data($product_id, $_SESSION['auth']);
			fn_promotion_apply('catalog', $product, $_SESSION['auth']);
			$product_promotion = current($product['promotions']);
			
			$user_data['_Promotion'] = __('infusionsoft_promotion_name');
			$user_data['_PromotionSaunaName'] = $product['product'];
			$user_data['_PromotionSaunaLastPrice'] = '$'.round($product['list_price']);
			
			if(isset($product_promotion['bonuses']) && @$product_promotion['bonuses'][0]['discount_bonus'] == 'by_fixed'){
				$user_data['_PromotionSaunaPrice'] = '$'.round($product['list_price']-$product_promotion['bonuses'][0]['discount_value']);
				$user_data['_PromotionSaunaDiscount'] = '$'.round($product_promotion['bonuses'][0]['discount_value']);
			}
			
			$infusionsoft->contacts('xml')->update($contact_id, $user_data);
		}
		
		$goal = $infusionsoft->funnels()->achieveGoal('fm445', 'form'.$product['product_code'], $contact_id);
		if(isset($goal[0]) && $goal[0]['success'] == 1){
			$tag = $infusionsoft->contacts('xml')->addToGroup($contact_id, fn_crm_infusionsoft_api_get_tag_ids($_POST['contact_us_for_a_price']['WHB']));
			$tag2 = $infusionsoft->contacts('xml')->addToGroup($contact_id, 145);
			db_query('INSERT INTO ?:jivosite_zoho_to_infusions SET name = ?s, phone = ?s, email = ?s',
				$_POST['contact_us_for_a_price']['name'], $_POST['contact_us_for_a_price']['phone'], $_POST['contact_us_for_a_price']['email']);
			die("Sent");
		}else{
			die("Goal infusionsoft error");
		}
		
		
	}else{
		die("Token infusionsoft error, https://outdoorinfraredsauna.com/infusionsoft-apps/");
	}
}elseif($mode == 'delete_contact_from_zoho' && (isset($_GET['email']) && trim($_GET['email']) != '') && isset($_GET['zcfvehfq1']) &&
		 (isset($_GET['name']) && trim($_GET['name']) != '') && isset($_GET['phone'])){
			 
	header("Location: /index.php?dispatch=infusionsoft.get_contact&secret123=&email={$_GET['email']}");
	exit;
	require_once $_SERVER['DOCUMENT_ROOT'].'/infusionsoft-apps/vendor/autoload.php';
	$config = array(
		'clientId'     => 'ep5ybywxzk5ybexw2h4psdjf',
		'clientSecret' => 'Ay3ecZAmR9',
		'redirectUri'  => 'https://outdoorinfraredsauna.com/infusionsoft-apps/',
	);
	$infusionsoft = new \Infusionsoft\Infusionsoft($config);
	$infusionsoft->setDebug(true);
	$infusionsoft->getLogs();
	$token_data = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/infusionsoft-apps/token_data');
	if(!empty($token_data)){
		$token_data = unserialize($token_data);
		$infusionsoft->setToken($token_data);
		if($infusionsoft->isTokenExpired()) {
			$infusionsoft->refreshAccessToken();
			file_put_contents($_SERVER['DOCUMENT_ROOT'].'/infusionsoft-apps/token_data', serialize($infusionsoft->getToken()));
		}		
		
		
		$contacts = $infusionsoft->contacts('xml')->findByEmail(trim($_GET['email']), ['Id','Email','FirstName']);
		$dublicate_ids = [];
		$main_id = 0;
		foreach($contacts as $key => $contact){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://api.infusionsoft.com/crm/rest/v1/contacts/{$contact['Id']}?access_token={$token_data->accessToken}");
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
			$result = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);
		}
		$contact_id = $infusionsoft->contacts('xml')->add(array(
			'FirstName' => trim($_GET['name']), 
			'Email' => trim($_GET['email']), 
			'Phone1' => trim($_GET['phone'])
		));	 
		$infusionsoft->contacts('xml')->addToGroup($contact_id, 182);
		die("Email Compaign Stoped {$_GET['email']} #{$contact_id}");
	}else{
		die("Token infusionsoft error, https://outdoorinfraredsauna.com/infusionsoft-apps/");
	}
	exit;
}elseif($mode == 'get_contact'){
	if(!isset($_GET['secret123'])){
		die('Error');
	}
	if(isset($_GET['email'])){
		Tygh::$app['view']->assign('email', $_GET['email']);
		require_once $_SERVER['DOCUMENT_ROOT'].'/infusionsoft-apps/vendor/autoload.php';
		$config = array(
			'clientId'     => 'ep5ybywxzk5ybexw2h4psdjf',
			'clientSecret' => 'Ay3ecZAmR9',
			'redirectUri'  => 'https://outdoorinfraredsauna.com/infusionsoft-apps/',
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
			
			
			/*$contact = $infusionsoft->contacts('xml')->findByEmail($_GET['email'], array(
				'Phone1',
				'FirstName',
				'LastName',
				'Id'
			));*/
			$contacts_data = file_get_contents('https://api.infusionsoft.com/crm/rest/v1/contacts?order=email&email='.$_GET['email'].'&order_direction=ascending&offset=0&limit=1000&access_token='.$infusionsoft->getToken()->accessToken);
			$contacts_data = json_decode($contacts_data, true);
			
			$user_data = array();
			foreach($contacts_data['contacts'] as $c){
				$tags = $contacts_data = file_get_contents('https://api.infusionsoft.com/crm/rest/v1/contacts/'.$c['id'].'/tags?access_token='.$infusionsoft->getToken()->accessToken);
				$c['tags'] = json_decode($tags, true);
				$user_data []= $c;
			}
			Tygh::$app['view']->assign('user_data', $user_data);	

			if(count($user_data)){
				@include $_SERVER['DOCUMENT_ROOT'].'/app/addons/my_changes/zoho-config.php';
				$data = array(
					'limit' => 50,
					'from' => 0,
					'email' => $_GET['email']
				);
				$ch = curl_init('https://desk.zoho.com/api/v1/tickets/search?'.urldecode(http_build_query($data)));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'orgId: 34517044',
					'Authorization: Zoho-oauthtoken  '.$zoho_auth['access_token'],
					"contentType: application/json; charset=utf-8",
				));
				$response = json_decode(curl_exec($ch), true);
				$response_info = curl_getinfo($ch);
				if($response_info['http_code'] == 200){
					if(isset($response['data']) && is_array($response['data'])){
						foreach($response['data'] as $k => $t){
							$data2 = array(
								'customFields' => array(
									'InfusionSoft' => 'true'
								)
							);
							$ch = curl_init("https://desk.zoho.com/api/v1/tickets/{$t['id']}");
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
								'orgId: 34517044',
								'Authorization: Zoho-oauthtoken  '.$zoho_auth['access_token'],
								"contentType: application/json; charset=utf-8",
							));
							curl_setopt($ch, CURLOPT_POST, 1);
							curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data2));
							$response2 = json_decode(curl_exec($ch), true);
							$response_info2 = curl_getinfo($ch);
						}
					}
				}
			}
			
		}else{
			die("Token infusionsoft error, https://outdoorinfraredsauna.com/infusionsoft-apps/");
		}
	}
}elseif($mode == 'delete_contact' && isset($_REQUEST['secret123']) && isset($_REQUEST['email'])){
	
	if(isset($_REQUEST['id'])){
		$ids = is_array($_REQUEST['id']) ? $_REQUEST['id']: array($_REQUEST['id']);
		if(count($ids)){
			require_once $_SERVER['DOCUMENT_ROOT'].'/infusionsoft-apps/vendor/autoload.php';
			$config = array(
				'clientId'     => 'ep5ybywxzk5ybexw2h4psdjf',
				'clientSecret' => 'Ay3ecZAmR9',
				'redirectUri'  => 'https://outdoorinfraredsauna.com/infusionsoft-apps/',
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
				foreach($ids as $id){
					$infusionsoft->data('xml')->delete('Contact', $id);
				}
				fn_set_notification('N', __('notice'), 'Deleted');
				return array(CONTROLLER_STATUS_REDIRECT, "/index.php?dispatch=infusionsoft.get_contact&secret123=&email=".$_REQUEST['email']);
						
				
			}else{
				die("Token infusionsoft error, https://outdoorinfraredsauna.com/infusionsoft-apps/");
			}
		}else{
			fn_set_notification('E', __('notice'), 'Please, select users');
			return array(CONTROLLER_STATUS_REDIRECT, "/index.php?dispatch=infusionsoft.get_contact&secret123=&email=".$_REQUEST['email']);
		}
	}else{
		fn_set_notification('E', __('notice'), 'Please, select users');
		return array(CONTROLLER_STATUS_REDIRECT, "/index.php?dispatch=infusionsoft.get_contact&secret123=&email=".$_REQUEST['email']);
	}
}