<?php
/***************************************************************************
*                                                                          *
*   (c) 2017 Max Onishchuk    *
*                                                                          *
****************************************************************************/

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

/** Body **/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	fn_trusted_vars (
        'state_data'
    );
    if ($mode == 'edit' && isset($_REQUEST['state_id'])) {
		fn_update_state($_REQUEST['state_data'], $_REQUEST['state_id'], $lang_code = DESCR_SL);
	}

    return array(CONTROLLER_STATUS_OK, 'states_descriptions.edit?state_id=' . $_REQUEST['state_id']);
}

if ($mode == 'edit' && isset($_REQUEST['state_id'])) {
	Tygh::$app['view']->assign('state', fn_get_state($_REQUEST['state_id']));
	Tygh::$app['view']->assign('countries', fn_get_simple_countries(false, DESCR_SL));
}

if ($mode == 'update_state_urls') {
	$states = db_get_array('SELECT ?:states.state_id, ?:state_descriptions.state FROM ?:states 
							JOIN ?:state_descriptions ON ?:state_descriptions.state_id = ?:states.state_id');
							
	foreach($states as $state){
		db_query('UPDATE ?:states SET url = ?s WHERE state_id = ?i', fn_format_uri($state['state']), $state['state_id']);
	}
	echo 'END';
	exit;
}

function fn_update_state($state_data, $state_id = 0, $lang_code = DESCR_SL)
{
	db_query("UPDATE ?:states SET ?u WHERE state_id = ?i", $state_data, $state_id);
	db_query("UPDATE ?:state_descriptions SET ?u WHERE state_id = ?i AND lang_code = ?s", $state_data, $state_id, $lang_code);

    return $state_id;

}
