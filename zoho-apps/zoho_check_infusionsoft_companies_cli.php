<?php	
if(isset($argv[1])){
	$path = str_replace('/zoho-apps', '', getenv('PWD'));
	
	$php_value = phpversion();
	if (version_compare($php_value, '5.3.0') == -1) {
		echo 'Currently installed PHP version (' . $php_value . ') is not supported. Minimal required PHP version is  5.3.0.';
		die();
	}

	define('AREA', 'A');
	define('ACCOUNT_TYPE', 'admin');

	try {
		require($path.'/init.php');
		@include $path.'/app/addons/my_changes/zoho-config.php';
		require_once $path.'/infusionsoft-apps/vendor/autoload.php';
		
		$config = array(
			'clientId'     => 'ep5ybywxzk5ybexw2h4psdjf',
			'clientSecret' => 'Ay3ecZAmR9',
			'redirectUri'  => 'https://outdoorinfraredsauna.com/infusionsoft-apps/',
		);
		$infusionsoft = new \Infusionsoft\Infusionsoft($config);
		$token_data = file_get_contents($path.'/infusionsoft-apps/token_data');
		if(!empty($token_data)){
			$token_data = unserialize($token_data);
			$infusionsoft->setToken($token_data);
			if($infusionsoft->isTokenExpired()) {
				$infusionsoft->refreshAccessToken();
				file_put_contents($path.'/infusionsoft-apps/token_data', serialize($infusionsoft->getToken()));
			}
			
			$period = $argv[1];
			$time_start = time()-60*60*24;
			$time_end = time();
			
			if($period == '2day'){
				$time_start = time()-60*60*24*2;
			}elseif($period == 'week'){
				$time_start = time()-60*60*24*7;
			}elseif($period == 'month'){
				$time_start = time()-60*60*24*30;
			}
			
			$start_time_iso = date('Y-m-d\TH:i:s.000\Z', $time_start);
			$end_time_iso = date('Y-m-d\TH:i:s.000\Z', $time_end);
			
			l("Zoho find contacts from $start_time_iso to $end_time_iso");
			
			zoho_get_orders(1, $zoho_auth, "$start_time_iso,$end_time_iso", $infusionsoft);
			
			l('End');
			
		}else{
			l("Token infusionsoft error, https://outdoorinfraredsauna.com/infusionsoft-apps/");
		}
		
	} catch (Tygh\Exceptions\AException $e) {
		$e->output();
	}
	
	
	
}else{
	l('Period not found');
}

function l($text){
	echo $text."\n";
}

function zoho_get_orders($page, $zoho_auth, $createdTimeRange, $infusionsoft){
	$limit = 99;
	$data = array(
		'limit' => $limit,
		'from' => ($page*$limit-$limit),
		"createdTimeRange" => $createdTimeRange,
		'departmentId' => '57616000005680059'
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
			echo "Count tickets: {$response['count']}\n";
			
			$j = 1;
			foreach($response['data'] as $k => $t){
				$j++;
				l(($j+($page*$limit-$limit))." {$t['ticketNumber']} {$t['createdTime']} {$t['contact']['lastName']} {$t['contact']['phone']} {$t['email']} {$t['subject']}");
				$contacts = $infusionsoft->contacts('xml')->findByEmail($t['email'], ['Id','Email','FirstName']);
				if(count($contacts)){
					l('Contacts finded');
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
					if(isset($response2['errorCode'])){
						l($response2['errorCode']);
					}else{
						l("Zoho Ticket #{$t['id']} updated");
					}
				}else{
					l('Contact not found');
				}
			}					
			
			if($response['count'] > $data['limit']){
				zoho_get_orders($page+1, $zoho_auth, $createdTimeRange, $infusionsoft);
			}
		}else{
			l("Error -300\n");
			exit;
		}
	}else{
		if($response_info['http_code'] == 204){
			l("Tickets not found\n");
			exit;
		}else{
			l(print_r($response, true));
			l("Error #{$response_info['http_code']}\n");
			exit;
		}
	}
}

?>