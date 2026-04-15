<?php

check('https://ACTIVEFOREVERSAUNAPARTS.NET');

function check($domain){
	$ch = curl_init($domain);
	curl_setopt($ch,  CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	$response = curl_exec($ch);
	$response_data = curl_getinfo($ch);
	curl_close($ch);
	if($response_data['http_code'] == 200){
		echo $response_data['http_code']." ".$response_data['url']."\n";
	}else{
		echo $response_data['http_code']." ".$response_data['redirect_url']."\n";
		check($response_data['redirect_url']);
	}
}
?>