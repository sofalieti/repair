<?php
define('AREA', 'C');
require('../../init.php');
include 'zoho-config.php';

$zoho_auth = db_get_row('SELECT * FROM ?:zoho_authentications WHERE type = ?s', 'referrals');

$data = array(
	'limit' => 99,
	'customField1' => 'Referal%20Information%3Atest22',
	//'from' => 0,
	
);

$ch = curl_init('https://desk.zoho.com/api/v1/tickets/search?'.urldecode(http_build_query($data)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'orgId: 34517044',
	'Authorization: Zoho-oauthtoken  '.$zoho_auth['access_token'],
	"contentType: application/json; charset=utf-8",
));
//curl_setopt($ch, CURLOPT_POST, TRUE);
$response= json_decode(curl_exec($ch), true);
$info= curl_getinfo($ch);

echo '<pre>';
print_r($info);
print_r($response);

exit;
$data = array(
	'sortBy' => '-recentThread',
	'from' => 0,
	'limit' => 99
);

$ch = curl_init('https://desk.zoho.com/api/v1/tickets?include=contacts,products&'.urldecode(http_build_query($data)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'orgId: 34517044',
	'Authorization: Zoho-oauthtoken  '.$zoho_auth['access_token'],
	"contentType: application/json; charset=utf-8",
));
//curl_setopt($ch, CURLOPT_POST, TRUE);
$response= json_decode(curl_exec($ch), true);
$info= curl_getinfo($ch);

echo '<pre>';
print_r($info);
print_r($response);