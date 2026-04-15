<?php
use Tygh\Storage;
use Tygh\Tools\SecurityHelper;
use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

function fn_domains_update($data, $domain_id, $lang_code = DESCR_SL){    
    if (!empty($domain_id)) {
        db_query("UPDATE ?:domains SET ?u WHERE domain_id = ?i", $data, $domain_id);
    }else{
        $domain_id = db_query("REPLACE INTO ?:domains ?e", $data);
    }
    return $domain_id;
}

function fn_domains_get_blocks_pre(&$fields, &$grids_ids, &$dynamic_object, &$join, &$condition, &$lang_code){
	if(AREA == 'C'){
		$condition .= " AND (?:bm_blocks_descriptions.domain = '' OR ?:bm_blocks_descriptions.domain = '{$_SERVER['HTTP_HOST']}' ) ";
	}
}

function fn_domains_before_dispatch($controller, $mode, $action, $dispatch_extra, $area){
    if(AREA == 'C'){
		$_SESSION['domain_langs'] = db_get_row('SELECT * FROM ?:domains WHERE name = ?s', $_SERVER['HTTP_HOST']);
	}
}
function fn_domains_get_all(){
	return db_get_array('SELECT * FROM ?:domains ORDER BY name ASC');
}