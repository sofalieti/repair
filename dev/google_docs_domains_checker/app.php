<?php
if(!isset($argv[1])) die('error');
$sheetId = $argv[1];
$path = getenv('PWD');
require __DIR__ . '/vendor/autoload.php';
include_once "simple_html_dom.php";

if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
}
/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Sheets API PHP Quickstart');
    $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = 'token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}

function logs($text){
	echo $text."\n";
}




// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Sheets($client);

// Prints the names and majors of students in a sample spreadsheet:

$spreadsheetId = '106y_stwURO7K5jME-ORimv8-zmJ0XsEqKSwhRc9LQKM';

logs('Open doc');
$data = $service->spreadsheets->get($spreadsheetId);

foreach($data['sheets'] as $sheet){	
	$sheetProperties = $sheet->getProperties();
	if($sheetProperties->sheetId == $sheetId || $sheetId == 'all'){	
		logs('Open sheet '.$sheetProperties->title);
		//$sheetProperties->gridProperties->rowCount
		$range = "{$sheetProperties->title}!A1:A{$sheetProperties->gridProperties->rowCount}";
		foreach($service->spreadsheets_values->get($spreadsheetId, $range) as $key => $row_obj){
			if(isset($row_obj[0]) && trim($row_obj[0]) != ''){
				$line = $key + 1;
				logs("Check domain {$row_obj[0]} A{$line}");
				$title_insert = false;
				$description_insert = false;
				$http_codes = array();
				$domains = array();
				
				
				//Красим ячейки в белый
				logs("Clear background row");
				$g_data = array(
						'repeatCell' => array(
						"range" => array(
							"sheetId"          => $sheetProperties->sheetId,
							"startRowIndex"    => ($line-1),
							"endRowIndex"      => $line,
							"startColumnIndex" => 0,
							"endColumnIndex"   => 7
						),
						"cell"  => array(
							"userEnteredFormat" => array(
								"backgroundColor" => array(
									"green" => 255/255,
									"red"   => 255/255,
									"blue" => 255/255,
									"alpha" => 1.0
								),
							)
						),			 
						"fields" => "UserEnteredFormat(backgroundColor)"
					)
				);
				$requests = array(
					new Google_Service_Sheets_Request(
						$g_data
					)
				);
	 
				$batchUpdateRequest = new Google_Service_Sheets_BatchUpdateSpreadsheetRequest(array(
					'requests' => $requests
				));
				$service->spreadsheets->batchUpdate( $spreadsheetId, $batchUpdateRequest );
				sleep(5);
				
				//Очищаем текст в ячейках
				logs("Clear text row");
				$values = [
					['','','','','','','']
				];
				$body = new Google_Service_Sheets_ValueRange( [ 'values' => $values ] );
				$options = array( 'valueInputOption' => 'RAW' );					 
				$service->spreadsheets_values->update( $spreadsheetId, "{$sheetProperties->title}!B{$line}", $body, $options );
				sleep(5);
				
				foreach(pre_domain() as $p){//Цикл для www и разных протоколов
					$check = check($p['pre'].$row_obj[0]);
					
					//Вставляем title
					if($check['title'] && !$title_insert && ($check['http_code'] == 200 || $check['http_code'] == 302)){
						$values = [
							[$check['title']]
						];
						$body = new Google_Service_Sheets_ValueRange( [ 'values' => $values ] );
						$options = array( 'valueInputOption' => 'RAW' );					 
						$service->spreadsheets_values->update( $spreadsheetId, "{$sheetProperties->title}!F{$line}", $body, $options );
						$title_insert = true;
						sleep(5);
						if(preg_match('/\s{1,}contact\s{1,}/i', $check['title'])){
							//Красим ячейки для title если там есть слово contact
							$g_data = array(
									'repeatCell' => array(
									"range" => array(
										"sheetId"          => $sheetProperties->sheetId,
										"startRowIndex"    => ($line-1),
										"endRowIndex"      => $line,
										"startColumnIndex" => 5,
										"endColumnIndex"   => 6
									),
									"cell"  => array(
										"userEnteredFormat" => array(
											"backgroundColor" => array(
												"green" => 0/255,
												"red"   => 255/255,
												"blue" => 0/255,
												"alpha" => 1.0
											),
										)
									),			 
									"fields" => "UserEnteredFormat(backgroundColor)"
								)
							);
							$requests = array(
								new Google_Service_Sheets_Request(
									$g_data
								)
							);
				 
							$batchUpdateRequest = new Google_Service_Sheets_BatchUpdateSpreadsheetRequest(array(
								'requests' => $requests
							));
							$service->spreadsheets->batchUpdate( $spreadsheetId, $batchUpdateRequest );
							sleep(5);
						}
					}
					
					if($check['description'] != false && !$description_insert){
						if(strlen($check['description']) < 50){
							$values = [
								["Short description ".strlen($check['description']).' symbols']
							];
							$body = new Google_Service_Sheets_ValueRange( [ 'values' => $values ] );
							$options = array( 'valueInputOption' => 'RAW' );					 
							$service->spreadsheets_values->update( $spreadsheetId, "{$sheetProperties->title}!H{$line}", $body, $options );
							$title_insert = true;
							sleep(5);
						}
						$description_insert = true;
					}
					
					//Фиксируем ответ http_code
					$http_codes []= $check['http_code'] == 301 || $check['http_code'] == 302 ? "{$check['http_code']} -> {$check['redirect_url']}" : $check['http_code'];
					
					//Записываем домены
					$domains []= $check['http_code'] == 301 || $check['http_code'] == 302 ? $check['redirect_url'] : $check['url'];
					
					//Красим ячейки для ответов
					$g_data = array(
							'repeatCell' => array(
							"range" => array(
								"sheetId"          => $sheetProperties->sheetId,
								"startRowIndex"    => ($line-1),
								"endRowIndex"      => $line,
								"startColumnIndex" => $p['startColumnIndex'],
								"endColumnIndex"   => $p['endColumnIndex']
							),
							"cell"  => array(
								"userEnteredFormat" => array(
									"backgroundColor" => bg_color($check)
								)
							),			 
							"fields" => "UserEnteredFormat(backgroundColor)"
						)
					);
					$requests = array(
						new Google_Service_Sheets_Request(
							$g_data
						)
					);
		 
					$batchUpdateRequest = new Google_Service_Sheets_BatchUpdateSpreadsheetRequest(array(
						'requests' => $requests
					));
					$service->spreadsheets->batchUpdate( $spreadsheetId, $batchUpdateRequest );
					sleep(5);
				}
				
				//Записываем http code
				$values = [
					$http_codes
				];
				$body = new Google_Service_Sheets_ValueRange( [ 'values' => $values ] );
				$options = array( 'valueInputOption' => 'RAW' );					 
				$service->spreadsheets_values->update( $spreadsheetId, "{$sheetProperties->title}!B{$line}", $body, $options );
				$title_insert = true;
				sleep(5);
				
				//Проверяю, если домен который отличается от основного
				if(has_other_domain($row_obj[0], $domains)){
					$values = [
						[$row_obj[0]]
					];
					$body = new Google_Service_Sheets_ValueRange( [ 'values' => $values ] );
					$options = array( 'valueInputOption' => 'RAW' );					 
					$service->spreadsheets_values->update( $spreadsheetId, "{$sheetProperties->title}!G{$line}", $body, $options );
					$title_insert = true;
					sleep(5);
				}
			}
		}
	}
	
}
@unlink("{$path}/pid{$sheetId}");


function check($domain){
	$data = array();
	$ch = curl_init($domain);
	curl_setopt($ch,  CURLOPT_RETURNTRANSFER, TRUE);
	//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	$response = curl_exec($ch);
	$response_data = curl_getinfo($ch);
	preg_match('/<title>(.*?)<\/title>/ius', $response, $title_obj);
	$response_data['title'] = false;
	if(isset($title_obj[1])) $response_data['title'] = $title_obj[1];
	$response_data['description'] = find_descriptions($response);
	curl_close($ch);
	if($response_data['http_code'] == 302){
		$ch2 = curl_init($response_data['redirect_url']);
		curl_setopt($ch2,  CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, 0); 
		curl_setopt($ch2, CURLOPT_TIMEOUT, 5);
		$response2 = curl_exec($ch2);
		$response_data2 = curl_getinfo($ch2);
		preg_match('/<title>(.*?)<\/title>/ius', $response2, $title_obj2);
		$response_data2['title'] = false;
		if(isset($title_obj2[1])) $response_data2['title'] = $title_obj2[1];
		curl_close($ch2);
		$response_data2['http_code'] = $response_data['http_code'];
		$response_data2['redirect_url'] = $response_data['redirect_url'];
		$response_data2['description'] = find_descriptions($response2);
		return $response_data2;
	}
	return $response_data;		
}
function bg_color($check){
	if($check['http_code'] == 200 || $check['http_code'] == 302){
		return array(
			"green" => 252/255,
			"red"   => 161/255,
			"blue" => 141/255,
			"alpha" => 1.0
		);
	}elseif($check['http_code'] == 301){
		return array(
			"green" => 255/255,
			"red"   => 243/255,
			"blue" => 119/255,
			"alpha" => 1.0
		);
	}else{
		return array(
			"green" => 133/255,
			"red"   => 252/255,
			"blue" => 133/255,
			"alpha" => 1.0
		);
	}
}
function pre_domain(){
	return array(
		array(
			'pre' => 'http://',
			'startColumnIndex' => 1,
			'endColumnIndex' => 2
		),
		array(
			'pre' => 'https://',
			'startColumnIndex' => 2,
			'endColumnIndex' => 3
		),
		array(
			'pre' => 'http://www.',
			'startColumnIndex' => 3,
			'endColumnIndex' => 4
		),
		array(
			'pre' => 'https://www.',
			'startColumnIndex' => 4,
			'endColumnIndex' => 5
		)
	);
}
function has_other_domain($main_domain, $domains){
	$main_domain = trim(strtolower($main_domain));
	foreach($domains as $domain){
		$domain = strtolower(parse_url($domain)['host']);
		$domain = str_replace('www.', '', $domain);
		if($main_domain != $domain){
			return true;
		}
	}
	return false;
}
function find_descriptions($text){
	if(trim($text) != ''){
		$html = str_get_html($text);
		if(count($html)){
			$main_content = $html->find('div[class=main-content]');
			if(count($main_content)){
				$description = $main_content[0]->find('div[class=description]');
				if(count($description)){
					return $description[0]->innertext;
				}
			}
		}
	}
	return false;
}
?>