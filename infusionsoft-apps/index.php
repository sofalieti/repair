<?php
session_start();

require_once 'vendor/autoload.php';
$config = array(
	'clientId'     => 'ep5ybywxzk5ybexw2h4psdjf',
	'clientSecret' => 'Ay3ecZAmR9',
	'redirectUri'  => 'https://enlightensauna.com/infusionsoft-apps/',
);

$infusionsoft = new \Infusionsoft\Infusionsoft($config);

$token_data = file_get_contents('token_data');

if(isset($_GET['code'])){//ЗАпоминаю полученый токен
	$token = serialize($infusionsoft->requestAccessToken($_GET['code']));
	file_put_contents('token_data', $token);
	header("Location: {$config['redirectUri']}");
	exit;
}elseif(empty($token_data)){//Ссылка для получение токена
	echo '<a href="' . $infusionsoft->getAuthorizationUrl() . '">Click here to authorize</a>';
}else{
	echo 'Token success';
	/*$token_data = unserialize($token_data);
	$infusionsoft->setToken($token_data);
	if($infusionsoft->isTokenExpired()) {
		$infusionsoft->refreshAccessToken();
		file_put_contents('token_data', serialize($infusionsoft->getToken()));
	}
	
	$contact_id = $infusionsoft->contacts('xml')->add(array(
		'FirstName' => 'John26', 
		'Email' => 'onishukmax@gmail.com', 
		'Phone1' => '11111111119'
	));	 
	
	$goal = $infusionsoft->funnels()->achieveGoal('fm445', 'testtest2', $contact_id);
	if(isset($goal[0]) && $goal[0]['success'] == 1){
		$tag = $infusionsoft->contacts('xml')->addToGroup($contact_id, 143);
		echo "Success";
	}else{
		//Ошибка компания не найдена или чё то ещё
		echo 'Company error';
		print_r($goal);
	}*/
}
exit;

$infusionsoft->setToken(unserialize($_SESSION['token']));
$tokentime = $infusionsoft->isTokenExpired();

if($tokentime){ 
	$infusionsoft->refreshAccessToken();
}
$_SESSION['token'] = serialize($infusionsoft->getToken());

print_r($_SESSION['token']);
exit;
// If the serialized token is available in the session storage, we tell the SDK
// to use that token for subsequent requests.
if (isset($_SESSION['token'])) {
	$infusionsoft->setToken(unserialize($_SESSION['token']));
	$contact_id = $infusionsoft->contacts('xml')->add(array('FirstName' => 'John17', 'Email' => 'gethotvocal@gmail.com', 'Phone1' => '11111111114'));
	$goal = $infusionsoft->funnels()->achieveGoal('fm445', 'testtest2', $contact_id);
	$tag = $infusionsoft->contacts('xml')->addToGroup($contact_id, 143);
	print_r($goal);
	echo "<hr/>";
	print_r($tag);
}

// If we are returning from Infusionsoft we need to exchange the code for an
// access token.
if (isset($_GET['code']) and !$infusionsoft->getToken()) {
	$_SESSION['token'] = serialize($infusionsoft->requestAccessToken($_GET['code']));
}

if ($infusionsoft->getToken()) {
	// Save the serialized token to the current session for subsequent requests
	$_SESSION['token'] = serialize($infusionsoft->getToken());

	// MAKE INFUSIONSOFT REQUEST
} else {
	echo '<a href="' . $infusionsoft->getAuthorizationUrl() . '">Click here to authorize</a>';
}

echo "<hr>";
print_r($_SESSION);