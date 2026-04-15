<?php
use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if($mode == 'pricelist_ref' && isset($_GET['secret12341d'])){
	$links = db_get_array('SELECT * FROM ?:open_links '.(@$_GET['link'] != '' ? 'WHERE link = "'.$_GET['link'].'"' : "").' ORDER BY time DESC');
	$urls = db_get_fields('SELECT link FROM ?:open_links GROUP BY link ORDER BY link ASC');
	echo "<form id='filter_form' method='GET' action='/index.php'>
		<input type='hidden' name='dispatch' value='links.pricelist_ref'/>
		<input type='hidden' name='secret12341d' value=''/>
		Filter <select name='link' onchange='document.getElementById(\"filter_form\").submit();'>";
	echo "<option value=''>-</option>";
	foreach($urls as $url){
		echo "<option value='{$url}' ".($url == @$_GET['link'] ? "selected" : "").">{$url}</option>";
	}
	echo "</select></form>";
	echo "<table width='100%'>";
	echo "<tr>";
	echo "<th>Time</th>";
	echo "<th>Url</th>";
	echo "<th>Name</th>";
	echo "<th>Phone</th>";
	echo "<th>E-mail</th>";
	echo "</tr>";
	
	foreach($links as $l){
		
		$form_data_id = db_get_field('SELECT id FROM ?:form_data WHERE ip = ?s ORDER BY id DESC', $l['ip']);
		
		$name = '-';
		$email = '-';
		$phone = '-';
		
		if($form_data_id){
			$name = db_get_field('SELECT field_value FROM ?:form_data_values WHERE form_data_id = ?i AND (field_name = ?s || field_name = ?s)', $form_data_id, 'Name', 'First Name');
			$email = db_get_field('SELECT field_value FROM ?:form_data_values WHERE form_data_id = ?i AND (field_name = ?s || field_name = ?s)', $form_data_id, 'Email', 'E-mail');
			$phone = db_get_field('SELECT field_value FROM ?:form_data_values WHERE form_data_id = ?i AND (field_name = ?s || field_name = ?s)', $form_data_id, 'Phone', 'Cell Phone');
		}
		
		echo "<tr>";
		echo "<td>".date('d.m.Y H:i', $l['time'])."</td>";
		echo "<td>{$l['link']}</td>";
		echo "<td>$name</td>";
		echo "<td>$phone</td>";
		echo "<td>$email</td>";
		echo "</tr>";
	}
	
	echo "</table>";
	echo "<style>table td, table th{text-align: left; padding: 5px;}table tr:nth-child(even) td{background: #efefef;}</style>";
	exit;
}elseif($mode == 'get_custom_settings' && isset($_GET['secret1213124'])){
	$data = array();
	$data['banner_bg'] = 'https://enlightensauna.com/'.get_custom_setting('banner_image_2');
	$data['promotion_name'] = get_custom_setting('banner_text_1');
	die(json_encode($data));
}