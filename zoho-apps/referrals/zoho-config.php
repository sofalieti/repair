<?php
session_start();
$client_id = '1000.IUVWUV9HQNE565546F63O09OI56VB3';
$client_secret = 'e11fc68b1e33ae3ff588de16f05a33fa90ee3adf67';
$redirect_uri = 'https://outdoorinfraredsauna.com/zoho-apps/referrals/zoho-app.php';
$refresh_token = $oauth_data_json -> OAUTH_REFRESH_TOKEN;
$oauth_scope = 'Desk.tickets.READ,Desk.search.READ';

$zoho_auth = db_get_row('SELECT * FROM ?:zoho_authentications WHERE type = ?s', 'referrals');

//unset($_SESSION['zoho_output']);exit;
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_REQUEST['accounts-server']) && $_REQUEST['accounts-server']=='https://accounts.zoho.com' && !count($zoho_auth)){
	$auth_query_params=array(
		'client_id' => $client_id,
		'client_secret' => $client_secret,
		'redirect_uri' => $redirect_uri,
		'scope' => $oauth_scope,
		'grant_type' => 'authorization_code',
		'code' => $_REQUEST['code']
	);

	$auth_url="https://accounts.zoho.com/oauth/v2/token?".urldecode(http_build_query($auth_query_params));
	$ch = curl_init($auth_url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
	curl_setopt($ch,CURLOPT_POST,TRUE);
	$auth_response= json_decode(curl_exec($ch), true);
	$info= curl_getinfo($ch);
	if($info['http_code']==200){
		$data = array();
		$data['created_at'] = time() + 3600 - 10;
		$data['type'] = 'referrals';
		$data['access_token'] = $auth_response['access_token'];
		$data['refresh_token'] = $auth_response['refresh_token'];
		db_query('INSERT INTO ?:zoho_authentications ?e', $data);		
	}
	else{
		echo " Error while getting OAuth Token ::::: ";print_r($auth_response);
	}        
}elseif(count($zoho_auth)){
	if(time() > $zoho_auth['created_at']){
		$auth_query_params=array(
			'client_id' => $client_id,
			'client_secret' => $client_secret,
			'redirect_uri' => $redirect_uri,
			'scope' => $oauth_scope,
			'grant_type' => 'refresh_token',
			'refresh_token' => $zoho_auth['refresh_token']
		);
		$auth_url="https://accounts.zoho.com/oauth/v2/token?".urldecode(http_build_query($auth_query_params));
		$ch = curl_init($auth_url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($ch,CURLOPT_POST,TRUE);
		$auth_response= json_decode(curl_exec($ch), true);
		$info= curl_getinfo($ch);
		if($info['http_code']==200){
			db_query('UPDATE ?:zoho_authentications SET created_at = ?i, access_token = ?s WHERE type = ?s', 
				(time()+3600-10), $auth_response['access_token'], 'referrals');	
		}
		else{
			echo " Error while getting OAuth Token ::::: ";print_r($auth_response);
		}    
	}
}else{
	//Первичная авторизация
	header("location:https://accounts.zoho.com/oauth/v2/auth?response_type=code&client_id=$client_id&scope=".strtolower($oauth_scope)."&access_type=offline&redirect_uri=$redirect_uri");
}
?>