<?php	 		 		 	 	 	 		 	

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }


function fn_referers_before_dispatch($controller, $mode, $action, $dispatch_extra, $area){
	if($area == 'C'){
		$referer_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : false;
		$server_url = $_SERVER['HTTP_HOST'];
		//echo $server_url;
		if($referer_url != false){
			$referer_url_domain = parse_url($referer_url);
			$referer_url_domain = $referer_url_domain['host'];
			if($referer_url_domain != $server_url){
				$ip = $_SERVER['REMOTE_ADDR'];
				$referer_id = db_get_field('SELECT referer_id FROM ?:referers WHERE ip = ?s', $ip);
				if($referer_id){
					$_SESSION['referer'] = array(
						'referer_id' => $referer_id,
						'referer_url' => $referer_url,
						'server_url' => fn_referers_get_full_url(),
						'time' => time(),
					);
					db_query("INSERT INTO ?:referer_sessions ?e", $_SESSION['referer']);
				}else{
					db_query('INSERT INTO ?:referers SET ip = ?s, referer_url = ?s, server_url = ?s, time = ?i',
						$ip, $referer_url, fn_referers_get_full_url(), time());
				}
			}
		}
		
		//Referals
		$url = $_SERVER['REQUEST_URI'];
		if(preg_match('/\/pricelist\.html/i', $url)){
			$send_to_zoho = false;
			$referer_url = $_SERVER['HTTP_REFERER'];
			$ip = $_SERVER['REMOTE_ADDR'];
			$pricelist_referer = db_get_row('SELECT * FROM ?:pricelist_referers WHERE ip = ?s', $ip);
			if(!$pricelist_referer){
				db_query('INSERT INTO ?:pricelist_referers SET url = ?s, referer_url = ?s, ip = ?s, time = ?i', $url, $referer_url, $ip, time());
				$send_to_zoho = preg_match('/\?inf_contact_key=/i', $url);
			}elseif(!preg_match('/\?inf_contact_key=/i', $pricelist_referer['url']) && preg_match('/\?inf_contact_key=/i', $url)){
				db_query('UPDATE ?:pricelist_referers SET url = ?s, referer_url = ?s, time = ?i WHERE ip = ?s', $url, $referer_url, time(), $ip);
				$send_to_zoho = true;
			}
			
			if($send_to_zoho){
				$contact = fn_save_forms_find_by_ip($ip);
				if($contact != false){
					$request_url = 'https://support.infraredsaunaparts.com/support/WebToCase';
					$zoho_data = array(
						'Description' => '',
						'Subject' => 'Price List Visit From Infusion',
						'Site' => 'enlightensauna.com',
						'xnQsjsdp' => 'zk8hI9vIUANthYo*kRl79w$$',
						'xmIwtLD' => '-pUXjU4*qUKUoJGCHzjBfHHp987L9qYB',
						'actionType' => 'Q2FzZXM=',
						'returnURL' => 'https://enlightensauna.com/'
					);			
					$zoho_data['First Name'] = '';
					$zoho_data['Contact Name'] = $contact['name'];
					$zoho_data['Email'] = $contact['email'];
					$zoho_data['Phone'] = $contact['phone'];
					
					if (!fn_zoho_payload_has_stopwords($zoho_data)) {
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
					}
				}
			}
		}
	}
}

function fn_referers_get_full_url(){
	return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

function fn_get_last_referer(){
	$ip = $_SERVER['REMOTE_ADDR'];
	$referer = db_get_row('SELECT * FROM ?:referers WHERE ip = ?s', $ip);
	$data = array();
	if(count($referer)){
		$data = array(
			'Referal_1st_visit' => $referer['referer_url'],
			'Referal Last Visit' => isset($_SESSION['referer']) ? $_SESSION['referer']['referer_url'] : '',
			'Referal Land Page' => $referer['server_url']
		);
	}
	return $data;
}

/*function fn_get_last_referal(){
	$ip = $_SERVER['REMOTE_ADDR'];
	$user_id = db_get_field('SELECT user_id FROM ?:referrals WHERE ip = ?s ORDER BY referral_id DESC', $ip);
	if($user_id){
		$referral_owner = db_get_row('SELECT * FROM ?:users WHERE user_id = ?i', $user_id);
		if($referral_owner){
			return array(
				'Referal Information' => "{$referral_owner['firstname']} {$referral_owner['lastname']} (E-mail: {$referral_owner['email']}, Phone: {$referral_owner['phone']})",
				'ReferalUserId' => "user{$referral_owner['user_id']}"
			);
		}
	}
	return array();
}*/

?>
