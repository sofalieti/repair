<?php
use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if($mode == 'get_orders'){
	include getenv('PWD').'/app/addons/my_changes/zoho-config.php';
	#include $_SERVER['DOCUMENT_ROOT'].'/app/addons/my_changes/zoho-config.php';
	$page = !isset($_GET['page']) ? 1 : $_GET['page'];
	echo "\n\nStart\n";
	zoho_get_orders($page, $zoho_auth);
	exit;	
}elseif($mode == 'search_text_in_comments'){
	include getenv('PWD').'/app/addons/my_changes/zoho-config.php';
	zoho_get_all_outdoor_orders(1, $zoho_auth);
	exit;
}elseif($mode == 'merge_orders'){
	include getenv('PWD').'/app/addons/my_changes/zoho-config.php';
	zoho_merge_orders(1, $zoho_auth);
	exit;
}elseif($mode == 'zoho_contacts_delete_infusionsoft_contacts'){
	//php admin.php --dispatch=zoho.zoho_contacts_delete_infusionsoft_contacts
	include getenv('PWD').'/app/addons/my_changes/zoho-config.php';
	zoho_contacts_delete_infusionsoft_contacts(1, $zoho_auth);
	//zoho_contacts_update_infusionsoft_item(1, $zoho_auth);
	exit;
}elseif($mode == 'zoho_check_infusionsoft_companies' && isset($_GET['period'])){	
	//php /var/www/www-root/data/www/enlightensauna.com/zoho-apps/zoho_check_infusionsoft_companies_cli.php 2day >> /var/www/www-root/data/www/enlightensauna.com/var/cron_zoho_check_infusionsoft_companies.txt
	file_put_contents($_SERVER['DOCUMENT_ROOT'].'/var/zoho_check_infusionsoft_companies.txt', date('d.m.Y H:i')."\nCheck for the {$_GET['period']}\n\n");
	
	$path = $_SERVER['DOCUMENT_ROOT'];
	exec("php {$path}/zoho-apps/zoho_check_infusionsoft_companies_cli.php {$_GET['period']} >> {$path}/var/zoho_check_infusionsoft_companies.txt  2>&1 &");

	//exit;
	header('Location: /var/zoho_check_infusionsoft_companies.txt');
	exit;
}elseif($mode == 'send_pricelist_referers'){	
	//php /var/www/www-root/data/www/enlightensauna.com/admin.php --dispatch=zoho.send_pricelist_referers
	$referals = db_get_array('SELECT * FROM ?:pricelist_referers WHERE time > ?i ORDER BY time ASC', time()-60*60*24);
	$data = array();
	$msg = 'Price List Contacts<br/>';
	foreach($referals as $referal){
		$contact = fn_save_forms_find_by_ip($referal['ip']);
		if($contact != false){
			$contact['link_time'] = date('d.m.Y H:i', $referal['time']);
			$contact['is_infusionsoft'] = preg_match('/\?inf_contact_key=/i', $referal['url']);

			$data []= $contact;			
			$msg .= "Name - {$contact['name']}, E-mail - {$contact['email']}, Phone - {$contact['phone']} ({$contact['link_time']}".($contact['is_infusionsoft'] ? ", Infusionsoft" : '').")<br/>";
		}
	}
	if(count($data)){
		$request_url = 'https://support.infraredsaunaparts.com/support/WebToCase';
		$zoho_data = array(
			'Description' => $msg,
			'Subject' => 'Price List Contacts',
			'Site' => 'enlightensauna.com',
			'xnQsjsdp' => 'zk8hI9vIUANthYo*kRl79w$$',
			'xmIwtLD' => '-pUXjU4*qUKUoJGCHzjBfHHp987L9qYB',
			'actionType' => 'Q2FzZXM=',
			'returnURL' => 'https://enlightensauna.com/'
		);			
		$zoho_data['First Name'] = '';
		$zoho_data['Contact Name'] = 'blank';
		$zoho_data['Email'] = 'blank@mail.com';
		$zoho_data['Phone'] = '';
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 	
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($zoho_data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
		curl_setopt($ch, CURLOPT_URL, $request_url);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		$response_info = curl_getinfo($ch);
		curl_close($ch);
		db_query('DELETE FROM ?:pricelist_referers');
	}
	die('End');
}

function zoho_contacts_update_infusionsoft_item($page, $zoho_auth){
	$limit = 99;
	$data = array(
		'limit' => $limit,
		'from' => ($page*$limit-$limit),
		'departmentId' => '57616000005680059',
		'customField1' => 'InfusionSoft%3Atrue',
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
				echo ($j++)." {$t['ticketNumber']} {$t['createdTime']} {$t['contact']['lastName']} {$t['contact']['phone']} {$t['email']} {$t['subject']}\n";
				$data2 = array(
					'customFields' => array(
						'InfusionSoft' => 'false'
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
					die($response2['errorCode']."\n");
				}else{
					echo "Ticket #{$t['id']} updated\n";
				}
				
			}					
			
			if($response['count'] > $data['limit']){
				zoho_contacts_update_infusionsoft_item($page+1, $zoho_auth);
			}
		}else{
			die("Error -300\n");
		}
	}else{
		if($response_info['http_code'] == 204){
			die("Tickets not found\n");
		}else{
			die("Error #{$response_info['http_code']}\n");
		}
	}
}

function zoho_contacts_delete_infusionsoft_contacts($page, $zoho_auth){
	$limit = 99;
	$data = array(
		'limit' => $limit,
		'from' => ($page*$limit-$limit),
		'departmentId' => '57616000005680059',
		//'customField1' => 'InfusionSoft%3Atrue',
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
				echo ($j++)." {$t['ticketNumber']} {$t['createdTime']} {$t['contact']['lastName']} {$t['contact']['phone']} {$t['email']} {$t['subject']}\n";
				
				if(db_get_row('SELECT * FROM infusionsoft_emails WHERE email = ?s', $t['email'])){
					echo "- Contact finded\n";
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
						die($response2['errorCode']."\n");
					}else{
						echo "Ticket #{$t['id']} updated\n";
					}
				}else{
					echo "- Contact not found\n";
				}
				
			}					
			
			if($response['count'] > $data['limit']){
				zoho_contacts_delete_infusionsoft_contacts($page+1, $zoho_auth);
			}
		}else{
			die("Error -300\n");
		}
	}else{
		if($response_info['http_code'] == 204){
			die("Tickets not found\n");
		}else{
			die("Error #{$response_info['http_code']}\n");
		}
	}
}
function zoho_get_orders($page, $zoho_auth){
	$limit = 99;
	$data = array(
		'limit' => $limit,
		'customField1' => 'InfusionSoft%3Afalse',
		'customField2' => 'Site%3Aoutdoorinfraredsauna.com',
		'from' => ($page*$limit-$limit),
		'status' => 'Saled'
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
				echo ($j++)." {$t['ticketNumber']} {$t['createdTime']} {$t['contact']['lastName']} {$t['contact']['phone']} {$t['email']} {$t['subject']}\n";
				if(trim(@$t['contact']['phone']) != ''){
					$create_contact = zoho_infusionsoft_contant($t['email'], $t['contact']['phone'], $t['contact']['lastName']);
					if($create_contact == true){
						zoho_update_order($t['id'], $zoho_auth);
					}
				}
			}					
			
			if($response['count'] > $data['limit']){
				zoho_get_orders($page+1, $zoho_auth);
			}
		}else{
			die("Error -300\n");
		}
	}else{
		if($response_info['http_code'] == 204){
			die("Tickets not found\n");
		}else{
			die("Error #{$response_info['http_code']}\n");
		}
	}
}

function zoho_update_order($id, $zoho_auth){
	$data = array(
		'customFields' => array(
			'InfusionSoft' => 'true'
		)
	);
	$ch = curl_init("https://desk.zoho.com/api/v1/tickets/{$id}");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'orgId: 34517044',
		'Authorization: Zoho-oauthtoken  '.$zoho_auth['access_token'],
		"contentType: application/json; charset=utf-8",
	));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	$response = json_decode(curl_exec($ch), true);
	$response_info = curl_getinfo($ch);
	if(isset($response['errorCode'])){
		die($response['errorCode']."\n");
	}else{
		echo "Ticket #$id updated\n";
	}
}

function zoho_infusionsoft_contant($email, $phone, $name){
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
			'FirstName' => $name, 
			'Email' => $email, 
			'Phone1' => $phone
		));	 
		
		$infusionsoft->contacts('xml')->addToGroup($contact_id, 181);

		echo "Created $contact_id\n";
		
		return true;
		
	}else{
		echo "Token infusionsoft error, https://outdoorinfraredsauna.com/infusionsoft-apps/\n";
	}
	
	return false;
}

function zoho_get_all_outdoor_orders($page, $zoho_auth){
	$limit = 99;
	$data = array(
		'limit' => $limit,
		'customField2' => 'Site%3Aoutdoorinfraredsauna.com',
		'from' => ($page*$limit-$limit)
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
	curl_close($ch);
	if($response_info['http_code'] == 200){
		if(isset($response['data']) && is_array($response['data'])){
			echo "Count tickets: {$response['count']}\n";
			$j = 1;
			foreach($response['data'] as $k => $t){
				echo ($j++)." {$t['ticketNumber']} {$t['createdTime']} {$t['contact']['lastName']} {$t['contact']['phone']} {$t['email']} {$t['subject']}\n";
				$ch = curl_init("https://desk.zoho.com/api/v1/tickets/{$t['id']}/comments");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'orgId: 34517044',
					'Authorization: Zoho-oauthtoken  '.$zoho_auth['access_token'],
					"contentType: application/json; charset=utf-8",
				));
				$comments_response = json_decode(curl_exec($ch), true);
				curl_close($ch);
				if(isset($comments_response['data']) && count($comments_response['data'])){
					foreach($comments_response['data'] as $comment){
						if(preg_match('/\s{1,10}sold\s{1,10}|\s{1,10}jk\s{1,10}|\s{1,10}sale\s{1,10}/iu', " ".$comment['content']." ")){
							echo "sale|sold|jk finded in comment\n";
							echo $t['webUrl']."\n";
							file_put_contents(getenv('PWD').'/zoho_orders.txt', $t['webUrl']."\n", FILE_APPEND);
							break;
						}
					}
				}
			}					
			
			if($response['count'] > $data['limit']){
				zoho_get_all_outdoor_orders($page+1, $zoho_auth);
			}
		}else{
			die("Error -300\n");
		}
	}else{
		if($response_info['http_code'] == 204){
			die("Tickets not found\n");
		}else{
			die("Error #{$response_info['http_code']}\n");
		}
	}
}

function zoho_merge_orders($page, $zoho_auth){
	$limit = 99;
	$data = array(
		'limit' => $limit,
		'customField2' => 'Site%3Aoutdoorinfraredsauna.com',
		'from' => ($page*$limit-$limit)
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
	curl_close($ch);
	if($response_info['http_code'] == 200){
		if(isset($response['data']) && is_array($response['data'])){
			echo "Count tickets: {$response['count']}\n";
			$j = 1;
			foreach($response['data'] as $k => $t){
				echo ($j++)." {$t['ticketNumber']} {$t['createdTime']} {$t['contact']['lastName']} {$t['contact']['phone']} {$t['email']} {$t['subject']}\n";
				//TODO
			}					
			
			if($response['count'] > $data['limit']){
				zoho_merge_orders($page+1, $zoho_auth);
			}
		}else{
			die("Error -300\n");
		}
	}else{
		if($response_info['http_code'] == 204){
			die("Tickets not found\n");
		}else{
			die("Error #{$response_info['http_code']}\n");
		}
	}
}