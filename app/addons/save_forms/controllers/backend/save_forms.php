<?php	 		 		 	 	 	 		 	
use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if($mode == "manage"){
    $data = array();
    $where = "";
    $page_id = 'all';
    if(isset($_GET['page_id'])){
        $where = " WHERE page_id = ".(int)$_GET['page_id'];
        $page_id = $_GET['page_id'];
    }
	
	if(!isset($_REQUEST['page'])) $_REQUEST['page'] = 1;
	if(!isset($_REQUEST['items_per_page'])) $_REQUEST['items_per_page'] = 100;
	
	$count = db_get_field("SELECT COUNT(*) FROM ?:form_data $where");
	
	
	$search = array(
		'page' => $_REQUEST['page'],
		'items_per_page' => $_REQUEST['items_per_page'],
		'total_items' => $count
	);
	
	
	
	$limit = db_paginate($_REQUEST['page'], $search['items_per_page'], $search['total_items']);

    $form_data = db_get_array("SELECT * FROM ?:form_data $where ORDER BY created_at DESC $limit");
    foreach($form_data as $key => $obj){
        $data[$key]['page_name'] = $obj['page_name'];
        $data[$key]['id'] = $obj['id'];
        $data[$key]['created_at'] = $obj['created_at'];
        $data[$key]['page_id'] = $obj['page_id'];
        $form_values = db_get_array("SELECT field_name,field_value FROM ?:form_data_values WHERE form_data_id = {$obj['id']} ORDER BY id DESC");
        foreach ($form_values as $value){
            $data[$key]['data'][] = $value;
        }
        $form_images = db_get_array("SELECT * FROM ?:form_data_images WHERE form_data_id = {$obj['id']}");
        foreach($form_images as $image){
            $data[$key]['images'][] = array(
                'path' => $image['path'],
                'thumb_path' => $image['thumb_path'],
                'name' => $image['name']
            );
        }
    }



    Registry::get('view')->assign("data",$data);
	Registry::get('view')->assign("search",$search);

    $pages = db_get_array("SELECT * FROM ?:form_data GROUP BY page_id");
    Registry::get('view')->assign("pages",$pages);
    Registry::get('view')->assign("page_id",$page_id);

}
elseif($mode == "delete"){
    if(isset($_GET['id'])){
        db_query("DELETE FROM ?:form_data WHERE id = {$_GET['id']}");
        db_query("DELETE FROM ?:form_data_values WHERE form_data_id = {$_GET['id']}");
        fn_set_notification('N', "Notice","Deleted");
    }
    return array(CONTROLLER_STATUS_REDIRECT, "save_forms.manage");
}
