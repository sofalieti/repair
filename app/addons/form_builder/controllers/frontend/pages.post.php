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

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($mode == 'send_form') {

        $suffix = '';
        
        /*$privatekey = "6LcnCLoUAAAAACiF380EU-wukRYTyscZ7z-OfHXQ";
        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = @$_POST["g-recaptcha-response"];
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$privatekey."&response=".$captcha."&remoteip=".$ip);	
        $responseKeys = json_decode($response, true);
        if(json_encode($responseKeys['success']) !== 'true'){
            fn_set_notification('E', __('error'), 'Error');
            return array(CONTROLLER_STATUS_REDIRECT, 'pages.view?page_id=' . $_REQUEST['page_id']);
        }*/
        
        if (fn_image_verification('form_builder', $_REQUEST) == false) {
            fn_save_post_data('form_values');

            return array(CONTROLLER_STATUS_REDIRECT, 'pages.view?page_id=' . $_REQUEST['page_id']);
        }

        if (fn_send_form($_REQUEST['page_id'], empty($_REQUEST['form_values']) ? array() : $_REQUEST['form_values'])) {
            $suffix = '&sent=Y';
        }
		
		$redirect_url = db_get_field('SELECT value FROM ?:form_options WHERE page_id = ?i AND element_type = ?s', $_REQUEST['page_id'], 'R');
		
		if($redirect_url){
			return array(CONTROLLER_STATUS_OK, $redirect_url);
		}

        return array(CONTROLLER_STATUS_OK, 'pages.view?page_id=' . $_REQUEST['page_id'] . $suffix);
    }

    return;
}

if ($mode == 'view' && !empty($_REQUEST['page_id'])) {

    if (!defined('AJAX_REQUEST')) {
        $page_is_https = db_get_field(
            "SELECT value FROM ?:form_options WHERE element_type = ?s AND page_id = ?i",
            FORM_IS_SECURE, $_REQUEST['page_id']
        );
        // if form is secure, redirect to https connection
        if (!defined('HTTPS') && $page_is_https == 'Y') {
            return array(
                CONTROLLER_STATUS_REDIRECT,
                Registry::get('config.https_location') . '/' . Registry::get('config.current_url')
            );

        } elseif (defined('HTTPS') && Registry::get('settings.Security.keep_https') != 'Y' && $page_is_https != 'Y' && Registry::get('settings.Security.secure_storefront') != 'full') {
            return array(
                CONTROLLER_STATUS_REDIRECT,
                Registry::get('config.http_location') . '/' . Registry::get('config.current_url')
            );
        }
    }

    $restored_form_values = fn_restore_post_data('form_values');
    if (!empty($restored_form_values)) {
        Tygh::$app['view']->assign('form_values', $restored_form_values);
    }

} elseif ($mode == 'sent' && !empty($_REQUEST['page_id'])) {
    $page = fn_get_page_data($_REQUEST['page_id'], CART_LANGUAGE);
    Tygh::$app['view']->assign('page', $page);
}
