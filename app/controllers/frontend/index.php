<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

if (!defined('BOOTSTRAP')) { die('Access denied'); }

//
// Forbid posts to index script
//
if(isset($_GET['referral']) && preg_match('/^rl[0-9]{1,10}$/', $_GET['referral'])){
	$code = $_GET['referral'];
	$code = str_replace('rl', '', $code);
	$user_id = db_get_field('SELECT user_id FROM ?:users WHERE user_id = ?i', $code);
	if($user_id){
		$ip = $_SERVER['REMOTE_ADDR'];
		$referral_id = db_get_field('SELECT referral_id FROM ?:referrals WHERE user_id = ?i AND ip = ?s', $user_id, $ip);
		if(!$referral_id){
			db_query('INSERT INTO ?:referrals SET user_id = ?i, ip = ?s', $user_id, $ip);
		}
	}
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    return array(CONTROLLER_STATUS_NO_PAGE);
}
