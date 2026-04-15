<?php	 		 		 	 	 	 		 	

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }


function fn_zoho_referrals_before_dispatch($controller, $mode, $action, $dispatch_extra, $area){
	if($area == 'C' && isset($_GET['referral']) && preg_match('/^rl[0-9]{1,10}$/', $_GET['referral'])){
		$code = $_GET['referral'];
		$code = (int)str_replace('rl', '', $code);
		$user_id = db_get_field('SELECT user_id FROM ?:users WHERE user_id = ?i', $code);
		if($user_id){
			$ip = $_SERVER['REMOTE_ADDR'];
			$referral_id = db_get_field('SELECT referral_id FROM ?:zoho_referrals WHERE user_id = ?i AND ip = ?s', $user_id, $ip);
			if(!$referral_id){
				db_query('INSERT INTO ?:zoho_referrals SET user_id = ?i, ip = ?s', $user_id, $ip);
			}
		}
	}
}

function fn_get_last_referal(){
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
}

?>
