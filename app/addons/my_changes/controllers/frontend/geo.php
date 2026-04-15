<?php
use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if($mode == 'change_state' && isset($_POST['geo_state'])){
	include($_SERVER['DOCUMENT_ROOT']."/app/lib/other/geo/src/geoipregionvars.php");
	$back_url = $_SERVER['HTTP_REFERER'];
	if(isset($GEOIP_REGION_NAME['US'][$_POST['geo_state']])){
		$data = fn_get_default_state();
		$data['region'] = $_POST['geo_state'];
		$data['region_name'] = $GEOIP_REGION_NAME['US'][$_POST['geo_state']];
		if($data['country_code'] == 'US' && $data['region_name'] != 'California'){
			$data['banner_text'] .= ', '.$data['region_name'];
		}
		$_SESSION['geo_data'] = $data;
		//$back_url = str_replace('.ca', '.com', $back_url);
	}elseif(isset($GEOIP_REGION_NAME['CA'][$_POST['geo_state']])){
		$data = fn_get_default_state();
		$data['region'] = $_POST['geo_state'];
		$data['region_name'] = $GEOIP_REGION_NAME['CA'][$_POST['geo_state']];
		$data['country_code'] = 'CA';
		$data['country_code3'] = 'CAN';
		$data['country_name'] = 'Canada';
		$data['banner_text'] = 'Canada, '.$data['region_name'];
		$_SESSION['geo_data'] = $data;
		//$back_url = str_replace('.com', '.ca', $back_url);
	}else{
		$_SESSION['geo_data'] = fn_get_default_state();
	}
	header('Location: ' . $back_url);
	exit;
}