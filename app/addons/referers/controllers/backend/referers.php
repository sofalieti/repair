<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }


if ($mode == 'manage') {
	
	$zoho_auth = db_get_row('SELECT * FROM ?:zoho_authentications WHERE type = ?s', 'referrals');
	
    Tygh::$app['view']->assign('zoho_auth', $zoho_auth);
}
