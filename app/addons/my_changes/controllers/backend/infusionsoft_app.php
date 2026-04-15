<?php
use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if($mode == 'import_orders'){
	
	$orders = db_get_array("SELECT * FROM ?:form_data WHERE created_at < '2018-05-04 00:00:00' AND infusionsoft_is_import = 0 ORDER BY id DESC");
	$i = 0;
	foreach($orders as $order){
		if($order['page_name'] == 'Contact us for price'){
			$values = db_get_array('SELECT * FROM ?:form_data_values WHERE form_data_id = ?i', $order['id']);
			$data_values = array();
			foreach($values as $obj){
				$data_values[strtolower($obj['field_name'])] = $obj['field_value'];
			}
			if(!isset($data_values['whb']) || empty($data_values['whb'])) $data_values['whb'] = 'detoxification';
			
			if(isset($data_values['whb']) && fn_crm_infusionsoft_api_get_tag_ids($data_values['whb']) != false){
				if(isset($data_values['name']) && isset($data_values['email']) && isset($data_values['product code']) && isset($data_values['phone'])){
					//if($data_values['email'] == 'sofalieti@gmail.com'){
						require_once getenv('PWD').'/infusionsoft-apps/vendor/autoload.php';
						$config = array(
							'clientId'     => 'ep5ybywxzk5ybexw2h4psdjf',
							'clientSecret' => 'Ay3ecZAmR9',
							'redirectUri'  => 'https://outdoorinfraredsauna.com/infusionsoft-apps/',
						);
						$infusionsoft = new \Infusionsoft\Infusionsoft($config);
						$token_data = file_get_contents(getenv('PWD').'/infusionsoft-apps/token_data');
						if(!empty($token_data)){
							$token_data = unserialize($token_data);
							$infusionsoft->setToken($token_data);
							if($infusionsoft->isTokenExpired()) {
								$infusionsoft->refreshAccessToken();
								file_put_contents(getenv('PWD').'/infusionsoft-apps/token_data', serialize($infusionsoft->getToken()));
							}
							
							$contact_id = $infusionsoft->contacts('xml')->add(array(
								'FirstName' => $data_values['name'], 
								'Email' => $data_values['email'], 
								'Phone1' => $data_values['phone']
							));	 
							
							//$goal = $infusionsoft->funnels()->achieveGoal('fm445', 'form'.$data_values['product code'], $contact_id);
							$goal = $infusionsoft->funnels()->achieveGoal('fm445', 'cscartimport', $contact_id);
							if(isset($goal[0]) && $goal[0]['success'] == 1){
								$tag = $infusionsoft->contacts('xml')->addToGroup($contact_id, fn_crm_infusionsoft_api_get_tag_ids($data_values['whb']));
								$product_tag_id = fn_product_code_to_tag_id($data_values['product code']);
								if($product_tag_id != false){
									$infusionsoft->contacts('xml')->addToGroup($contact_id, $product_tag_id);
								}else{
									echo "Tag #{$product_tag_id} not found for product_code #{$data_values['product code']}\n";
								}
								echo $i++." {$data_values['product code']} Success ".$data_values['email']."\n";
								db_query('UPDATE ?:form_data SET infusionsoft_is_import = 1 WHERE id = ?i', $order['id']);
							}else{
								echo "Goal infusionsoft error {$data_values['product code']}".print_r($goal, true)."\n";
							}
							
							
						}else{
							echo "Token infusionsoft error, https://outdoorinfraredsauna.com/infusionsoft-apps/";
						}
					//}
					//echo $i++."\n";
				}
			}
		}
	}
	exit;
}elseif($mode == 'update_contacts'){
	require_once getenv('PWD').'/infusionsoft-apps/vendor/autoload.php';
	$config = array(
		'clientId'     => 'ep5ybywxzk5ybexw2h4psdjf',
		'clientSecret' => 'Ay3ecZAmR9',
		'redirectUri'  => 'https://outdoorinfraredsauna.com/infusionsoft-apps/',
	);
	$infusionsoft = new \Infusionsoft\Infusionsoft($config);
	$token_data = file_get_contents(getenv('PWD').'/infusionsoft-apps/token_data');
	if(!empty($token_data)){
		$token_data = unserialize($token_data);
		$infusionsoft->setToken($token_data);
		if($infusionsoft->isTokenExpired()) {
			$infusionsoft->refreshAccessToken();
			file_put_contents(getenv('PWD').'/infusionsoft-apps/token_data', serialize($infusionsoft->getToken()));
		}
		
		$data = array();
		$data['_Promotion'] = 'test1';
		$data['_PromotionSaunaPrice'] = 'test2';
		
		$update = $infusionsoft->contacts('xml')->update(12469, $data);
		
		print_r($update);
		
		echo "End\n";		
		
	}else{
		echo "Token infusionsoft error, https://outdoorinfraredsauna.com/infusionsoft-apps/";
	}
}

function fn_product_code_to_tag_id($code){
	$data = array(
		16376 => 175,
		36376 => 175,
		16377 => 171,
		36377 => 171,
		16378 => 167,
		36378 => 167,
		16379 => 163,
		36379 => 163,
		16380 => 159,
		36380 => 159,
		17376 => 173,
		37376 => 173,
		17377 => 169,
		37377 => 169,
		17378 => 165,
		37378 => 165,
		17379 => 177,
		37379 => 177,
		19378 => 161,
		39378 => 161
	);
	if(isset($data[$code])) return $data[$code];
	return false;
}
?>