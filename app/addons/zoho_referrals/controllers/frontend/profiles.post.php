<?php
use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }


if($mode == 'referral') {	
	if (empty($auth['user_id'])) {
        return array(CONTROLLER_STATUS_REDIRECT, "auth.login_form?return_url=".urlencode(Registry::get('config.current_url')));
    }
	fn_add_breadcrumb('Referral');	
}

?>