<?php
define('AREA', 'C');
//define('NO_SESSION', true);
//define('DEVELOPMENT', true);
//ini_set('display_errors', 'on');
//error_reporting(E_ALL);
require dirname(__FILE__) . '/../../../init.php';

$form_id = isset($argv[2]) ? $argv[2] : 0;

echo "Start\n";

function test(){
	echo 1213;
	
}

if($form_id > 0){
	echo "Finded form {$form_id}\n";
}else{
	echo "Form not found\n";
	echo test();
	fn_crm_infusionsoft_send($form_id);
}
echo "End\n";

function fn_crm_infusionsoft_send($form_data_id){
	echo "eadawd";
	$form = db_get_row('SELECT * FROM ?:form_data WHERE id = ?i', $form_data_id);
	print_r($form);
	
	exit;
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
		}		
	}
	
}
function fn_crm_infusionsoft_send_curl($params, $url){
	print_r($params);
	exit;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	$response = json_decode(curl_exec($ch), true);
	$info = curl_getinfo($ch);
}
