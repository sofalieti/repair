<?php
define('AREA', 'C');
require('../../../init.php');
include 'zoho-config.php';

$zoho_auth = db_get_row('SELECT * FROM ?:zoho_authentications WHERE type = ?s', 'referrals');

if(isset($_GET['get_tikects']) && isset($_GET['start_page'])){
	$out = array(
		'result' => 0,
		'error' => '',
		'data' => ''
	);
	if(isset($_SESSION) && isset($_SESSION['auth']) && !empty($_SESSION['auth']['user_id'])){
		$limit = 99;
		$data = array(
			'limit' => $limit,
			'customField1' => 'ReferalUserId%3Auser'.$_SESSION['auth']['user_id'],
			'customField2' => 'Site%3Aoutdoorinfraredsauna.com',
			'from' => ((int)$_GET['start_page']*$limit-$limit),			
		);
		$ch = curl_init('https://desk.zoho.com/api/v1/tickets/search?'.urldecode(http_build_query($data)));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'orgId: 34517044',
			'Authorization: Zoho-oauthtoken  '.$zoho_auth['access_token'],
			"contentType: application/json; charset=utf-8",
		));
		$response= json_decode(curl_exec($ch), true);
		$response_info= curl_getinfo($ch);
		if($response_info['http_code'] == 200){
			if(isset($response['data']) && is_array($response['data'])){
				$html = "<div class='tickets-count'>Count tickets: {$response['count']}</div>
				<table>
					<tr>
						<th>Date</th>
						<th>Name</th>
						<th>E-mail</th>
						<th>Form</th>
					</tr>";
				
				foreach($response['data'] as $t){
					$html .= "<tr>
						<td>{$t['createdTime']}</td>
						<td>{$t['contact']['lastName']}</td>
						<td>{$t['email']}</td>
						<td>{$t['subject']}</td>
					</tr>";
				}
				
				$html .= "</table>";
				
				if($response['count'] > $data['limit']){
					$html .= "<div class='tickets-pages'>Pages: ";
					for($i = 1; $i <= ceil($response['count']/$data['limit']); $i++){
						$html .= "<a href='#' data-page='{$i}' class='".($i == (int)$_GET['start_page'] ? "active" : "")."'>{$i}</a>";
					}
					$html .= "</div>";
				}
				
				$out['result'] = 1;
				$out['data'] = $html;
				
			}else{
				$out['error'] = "Error -300";
			}
		}else{
			if($response_info['http_code'] == 204){
				$out['error'] = "Tickets not found";
			}else{
				$out['error'] = "Error #{$response_info['http_code']}";
			}
		}
		
	}else{
		$out['error'] = 'Access error';
	}
	die(json_encode($out));
}else{
	header('Location: /admin.php?dispatch=zoho_referrals.manage');
}

exit;



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