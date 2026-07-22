<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

use Tygh\Registry;
use Tygh\Mailer;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($mode == 'get_discount_coupon') {
		//print_r($_REQUEST);exit;
		if (empty($_REQUEST['promotions']['email']) || fn_validate_email($_REQUEST['promotions']['email']) == false) {
			$msg = __('error_invalid_emails');
			$msg = str_replace('[emails]', $_REQUEST['promotions']['email'], $msg);
			fn_set_notification('E', __('error'), $msg);
		}
		elseif (empty($_REQUEST['promotions']['phone'])) {
			$msg = __('error_invalid_phones');
			$msg = str_replace('[phones]', $_REQUEST['promotions']['phone'], $msg);
			fn_set_notification('E', __('error'), $msg);
		}
		elseif (empty($_REQUEST['promotions']['name'])) {
			$msg = __('error_invalid_name');
			$msg = str_replace('[name]', $_REQUEST['promotions']['name'], $msg);
			fn_set_notification('E', __('error'), $msg);
		}elseif ( isset($_REQUEST['verification_id']) && isset($_REQUEST['verification_answer']) && PhpCaptcha::Validate($_REQUEST['verification_id'], $_REQUEST['verification_answer']) == false){
			fn_set_notification('E', __('error'), "The Anti-bot validation field is mandatory.");
		}else{
			//$user_name = $_POST['subscribe_name'];		
			//$user_name = $_POST['subscribe_lastname'];		
			//$user_email = $_POST['subscribe_email'];
			//$user_phone = $_POST['subscribe_phone'];

			$msg = "First Name: {$_REQUEST['promotions']['name']}<br/>
				Last Name: {$_REQUEST['promotions']['lastname']}<br/>
				Email: {$_REQUEST['promotions']['email']}<br/>
				Phone: {$_REQUEST['promotions']['phone']}<br/>";
			
			db_query("INSERT INTO ?:promotion_users (name, email, phone) VALUES ('{$_REQUEST['promotions']['name']} {$_REQUEST['promotions']['lastname']}', '{$_REQUEST['promotions']['email']}', '{$_REQUEST['promotions']['phone']}')");			

			Mailer::sendMail(array(
				'to' => Registry::get('settings.Company.company_orders_department'),
				'from' => 'company_orders_department',
				'body' => $msg,
				'subj' => 'Get discount coupon',
				'data' => array('result' => 'Get discount coupon')
			));

			$request_url = 'https://support.infraredsaunaparts.com/support/WebToCase';
			$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
			$zoho_data = array(
				'Description' => '',
				'Subject' => 'Get Discount Coupon',
				'Site' => $_SERVER['HTTP_HOST'],
				'xnQsjsdp' => 'zk8hI9vIUANthYo*kRl79w$$',
				'xmIwtLD' => '-pUXjU4*qUKUoJGCHzjBfHHp987L9qYB',
				'actionType' => 'Q2FzZXM=',
				'returnURL' => $protocol.$_SERVER['HTTP_HOST']
			);			
			$zoho_data['First Name'] = $_REQUEST['promotions']['name'];
			$zoho_data['Contact Name'] = $_REQUEST['promotions']['lastname'];
			$zoho_data['Email'] = $_REQUEST['promotions']['email'];
			$zoho_data['Phone'] = $_REQUEST['promotions']['phone'];
		
			
		
			if (!fn_zoho_payload_has_stopwords($zoho_data)) {
				$ch = curl_init();
				//--- newly added			
					
				// curl_setopt($ch, CURLOPT_VERBOSE, 1);//standard i/o streams 			
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 			
				//---			
				
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
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
			}
            
			fn_set_notification('N', __('congratulations'), __('text_subscriber_added'));
		}
	}

	return array(CONTROLLER_STATUS_REDIRECT);
}

if ($mode == 'list') {

    fn_add_breadcrumb(__('promotions'));

    $params = array (
        'active' => true,
        /*'zone' => 'catalog',*/
        'get_hidden' => false,
    );

    list($promotions) = fn_get_promotions($params);

    Tygh::$app['view']->assign('promotions', $promotions);
}
