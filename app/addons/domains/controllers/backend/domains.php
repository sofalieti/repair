<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    fn_trusted_vars('domain_data');
    $suffix = '';

    //
    // Add/edit banners
    //
    if ($mode == 'update') {
        $domain_id = fn_domains_update($_REQUEST['domain_data'], $_REQUEST['domain_id'], DESCR_SL);

        $suffix = ".update?domain_id=$domain_id";
    }

    if ($mode == 'delete') {
        if (!empty($_REQUEST['domain_id'])) {
            db_query('DELETE FROM ?:domains WHERE domain_id = ?i', $_REQUEST['domain_id']);
        }

        $suffix = '.manage';
    }

    return array(CONTROLLER_STATUS_OK, 'domains' . $suffix);
}

if ($mode == 'manage') {
    $domains = db_get_array('SELECT * FROM ?:domains ORDER BY domain_id DESC');
    Tygh::$app['view']->assign('domains', $domains);
}elseif ($mode == 'add') {
    
}elseif ($mode == 'update') {
    $domain = db_get_row('SELECT * FROM ?:domains WHERE domain_id = ?i', $_REQUEST['domain_id']);

    if (empty($domain)) {
        return array(CONTROLLER_STATUS_NO_PAGE);
    }

    Tygh::$app['view']->assign('domain', $domain);
}elseif ($mode == 'delete') {
	if (!empty($_REQUEST['domain_id'])) {
		$domain = db_get_row('SELECT * FROM ?:domains WHERE domain_id = ?i', $_REQUEST['domain_id']);
		if($domain){
			db_query('DELETE FROM ?:domains WHERE domain_id = ?i', $_REQUEST['domain_id']);
			db_query('UPDATE ?:bm_blocks_descriptions SET domain = ?s WHERE domain = ?s', '', $domain['name']);
		}
	}

	$suffix = '.manage';
	return array(CONTROLLER_STATUS_OK, 'domains' . $suffix);
}
