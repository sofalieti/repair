<?php
if (!defined('BOOTSTRAP')) { die('Access denied'); }

if($mode == 'zoho_contact_delete_form_infusionsoft_by_email' && isset($_GET['secret1231dawd']) && isset($_GET['email'])){
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
		
		if($contacts){
			foreach($contacts as $contact){
				$infusionsoft->data('xml')->delete('Contact', $contact['Id']);
			}
			die('Deleted '.count($contacts).' contacts');
		}else{
			die("Contact not found");
		}
		
	}else{
		die("Token error");
	}
}elseif($mode == 'clear_name_for_this_ip' && isset($_GET['secret123']) && isset($_GET['custom_form_id'])){
	$form_result = db_get_row('SELECT * FROM ?:form_data WHERE id = ?i', $_GET['custom_form_id']);
	if($form_result){
		$ip = $form_result['ip'];
		if(!empty($ip)){
			$form_result_ids = db_get_fields('SELECT id FROM ?:form_data WHERE ip = ?s', $ip);
			//$form_result_ids = join(',', $form_result_ids);
			db_query('DELETE FROM ?:form_data WHERE id IN(?a)', $form_result_ids);
			db_query('DELETE FROM ?:form_data_values WHERE form_data_id IN(?a)', $form_result_ids);
			die('Deleted');
		}else{
			die('Error: IP address is empty');
		}
	}else{
		die('Error: Contact not found');
	}
}
?>