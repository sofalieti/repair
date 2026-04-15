<?php
use Tygh\Registry;

if($mode == 'send_to_zoho_first_msg' && isset($_POST['chat_id'])){
    $request_url = 'https://support.infraredsaunaparts.com/support/WebToCase';
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
    $zoho_data = array(
            'Description' => "Chat id <a href='https://app.jivosite.com/chat/my/{$_POST['chat_id']}'>#{$_POST['chat_id']}</a>",
            'Subject' => "New chat {$_SERVER['HTTP_HOST']} #{$_POST['chat_id']}",
            'Site' => $_SERVER['HTTP_HOST'],
            'xnQsjsdp' => 'zk8hI9vIUANthYo*kRl79w$$',
            'xmIwtLD' => '-pUXjU4*qUKUoJGCHzjBfHHp987L9qYB',
            'actionType' => 'Q2FzZXM=',
            'returnURL' => $protocol.$_SERVER['HTTP_HOST']
    );			
    $zoho_data['First Name'] = '';
    $zoho_data['Contact Name'] = 'blank';
    $zoho_data['Email'] = 'blank@mail.com';
    $zoho_data['Phone'] = '-';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 	
    $request_parameters = $zoho_data;
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request_parameters));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($ch, CURLOPT_URL, $request_url);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    $response_info = curl_getinfo($ch);
    curl_close($ch);
    die('Created');
}
if($mode == 'send_to_zoho_contacts' && isset($_POST['chat_id'])){
    $request_url = 'https://support.infraredsaunaparts.com/support/WebToCase';
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
    $zoho_data = array(
            'Description' => "Chat id <a href='https://app.jivosite.com/chat/my/{$_POST['chat_id']}'>#{$_POST['chat_id']}</a>".fn_jivosite_get_product_list($_POST['client_name'], $_POST['email'], $_POST['phone']),
            'Subject' => "Update chat contacts {$_SERVER['HTTP_HOST']} #{$_POST['chat_id']}",
            'Site' => $_SERVER['HTTP_HOST'],
            'xnQsjsdp' => 'zk8hI9vIUANthYo*kRl79w$$',
            'xmIwtLD' => '-pUXjU4*qUKUoJGCHzjBfHHp987L9qYB',
            'actionType' => 'Q2FzZXM=',
            'returnURL' => $protocol.$_SERVER['HTTP_HOST']
    );			
    $zoho_data['First Name'] = '';
    $zoho_data['Contact Name'] = $_POST['client_name'];
    $zoho_data['Email'] = $_POST['email'];
    $zoho_data['Phone'] = $_POST['phone'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 	
    $request_parameters = $zoho_data;
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request_parameters));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($ch, CURLOPT_URL, $request_url);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    $response_info = curl_getinfo($ch);
    curl_close($ch);
    die('Created');
}
if($mode == 'send_to_zoho_events'){
    $content = file_get_contents('php://input');
    if(!empty($content)){
        $content = json_decode($content, true);
        //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/jivosite.log', print_r($content['event_name'], true), FILE_APPEND);
        if(isset($content['event_name'])){
            if($content['event_name'] == 'offline_message'){
                $request_url = 'https://support.infraredsaunaparts.com/support/WebToCase';
                $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
                $zoho_data = array(
                        'Description' => $content['message'].fn_jivosite_get_product_list($content['visitor']['name'], $content['visitor']['email'], $content['visitor']['phone']),
                        'Subject' => "Chat offline message {$_SERVER['HTTP_HOST']}",
                        'Site' => $_SERVER['HTTP_HOST'],
                        'xnQsjsdp' => 'zk8hI9vIUANthYo*kRl79w$$',
                        'xmIwtLD' => '-pUXjU4*qUKUoJGCHzjBfHHp987L9qYB',
                        'actionType' => 'Q2FzZXM=',
                        'returnURL' => $protocol.$_SERVER['HTTP_HOST']
                );			
                $zoho_data['First Name'] = '';
                $zoho_data['Contact Name'] = @$content['visitor']['name'];
                $zoho_data['Email'] = @$content['visitor']['email'];
                $zoho_data['Phone'] = @$content['visitor']['phone'];

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 	
                $request_parameters = $zoho_data;
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request_parameters));
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                curl_setopt($ch, CURLOPT_URL, $request_url);
                curl_setopt($ch, CURLOPT_HEADER, TRUE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                $response_info = curl_getinfo($ch);
                curl_close($ch);
                die('Created');
            }
        }
    }
}

function fn_jivosite_get_product_list($name, $email, $phone){
	$text = "------------------<br/>";
	$text .= "<a target='_blank' href='https://outdoorinfraredsauna.com/index.php?dispatch=infusionsoft.jivosite_data_from_zoho&name={$name}&email={$email}&phone={$phone}'>Send to infusionsoft</a><br/>";
	return $text;
}