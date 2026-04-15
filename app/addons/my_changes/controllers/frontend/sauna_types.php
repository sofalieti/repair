<?php
use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if($mode == 'switch' && isset($_GET['sauna_type']) && ($_GET['sauna_type'] == 'indoor' || $_GET['sauna_type'] == 'outdoor')){
	$back_url = $_SERVER['HTTP_REFERER']."#".$_GET['anchor'];
	$back_url = str_replace("/{$_SESSION['sauna_type']}/", "/{$_GET['sauna_type']}/", $back_url);
	//$_SESSION['sauna_type'] = $_GET['sauna_type'];
	$_SESSION['sauna_type'] = 'outdoor';
	header("Location: $back_url");
	exit;
}