<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($mode == 'consult') {
        $errors = array();

        if (empty($_REQUEST['name'])) {
            $errors['name'] = 'The Name field is mandatory.';
        }
        if (empty($_REQUEST['email']) || fn_validate_email($_REQUEST['email']) == false) {
            $errors['email'] = 'The email address in the E-mail field is invalid.';
        }
        if (empty($_REQUEST['phone'])) {
            $errors['phone'] = 'The Phone field is mandatory.';
        }
        if (!isset($_REQUEST['brand_id']) && !isset($_REQUEST['category_id'])) {
            $errors['request'] = 'Request error';
        } else {
            $brand = fn_brands_get_brand_data($_REQUEST['brand_id']);
            $category = fn_get_category_data($_REQUEST['category_id']);
            if (!$brand && !$category) {
                $errors['request'] = 'Request error';
            }
        }
        
        if(!$_SESSION['image_verification_ok']){
            $errors['captcha'] = 'Incorrect or missing confirmation code.';
        }

        if (!count($errors)) {
            
            $zoho_data = array(
                'Description' => "Brand: {$brand['name']}<br/>
                    {$category['category']}: ".fn_url("categories.view?category_id={$_REQUEST['category_id']}&brand_id={$_REQUEST['brand_id']}")."<br/>",
                'Subject' => 'Consult',
                'Site' => $_SERVER['HTTP_HOST'],
                'xnQsjsdp' => 'edbsn3bf1b15b746d374ce7e9344e1096cce2',
                'xmIwtLD' => 'edbsn0e848f0537bc9d44c4d6ffe50e68c72eac3b561ac1bd2351db1866157ee51232',
                'xJdfEaS' => '',
                'actionType' => 'Q2FzZXM=',
                'returnURL' => "https://{$_SERVER['HTTP_HOST']}",
                'Created' => date('m/d/Y'),
                'Createdhour' => date('h'),
                'Createdminute' => date('i'),
                'Createdampm' => date('A')
            );
            $zoho_data['First Name'] = '';
            $zoho_data['Contact Name'] = $_REQUEST['name'];
            $zoho_data['Email'] = $_REQUEST['email'];
            $zoho_data['Phone'] = $_REQUEST['phone'];
            $zoho_data['Customer_TimeZone'] = $_REQUEST['timezone'];
            
            $breaks = array("<br />","<br>","<br/>");                  
            $zoho_data['Description'] = strip_tags(str_ireplace($breaks, "\r\n", $zoho_data['Description']));

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $zoho_data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
            curl_setopt($ch, CURLOPT_URL, 'https://desk.zoho.com/support/WebToCase');
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            $response_info = curl_getinfo($ch);
            curl_close($ch);
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                "zf_referrer_name" => "",
                "zf_redirect_url" => "",
                "zc_gad" => "",
                "SingleLine1" => "Consult {$brand['name']} repairmysauna.com",
                "Name_First" => $_REQUEST['name'],
                "Email" => $_REQUEST['email'],
                "SingleLine8" => $_REQUEST['phone'],
                "SingleLine12" => fn_url("categories.view?category_id={$_REQUEST['category_id']}&brand_id={$_REQUEST['brand_id']}"),
                "MultiLine" => $zoho_data['Description'],
                "SingleLine6" => $brand['name'],
                'SingleLine14' => 'RepairMySauna'
            ]);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type:multipart/form-data'));
            curl_setopt($ch, CURLOPT_URL, "https://forms.zohopublic.com/zohopeople267/form/InfraredSaunaPartsForm/formperma/vXecmwVeDKV9IWNPI9ZORxSzoGRe4TWgIujPS9rF42g/htmlRecords/submit");
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            $response_info = curl_getinfo($ch);
            curl_close($ch);
            
            fn_set_notification('N', __('congratulations'), 'Congratulations! Thank you for your interest one of our sales representatives will contact you shortly..');
        } else {
            fn_set_notification('E', __('error'), join('<br/>', $errors));
        }

        return array(CONTROLLER_STATUS_REDIRECT, 'categories.view?category_id=' . @$_REQUEST['category_id'] . '&brand_id=' . @$_REQUEST['brand_id']);
    }
    
    if ($mode == 'get_a_garanteed_solution') {
        $errors = array();

        if (empty($_REQUEST['name'])) {
            $errors['name'] = 'The Name field is mandatory.';
        }
        if (empty($_REQUEST['email']) || fn_validate_email($_REQUEST['email']) == false) {
            $errors['email'] = 'The email address in the E-mail field is invalid.';
        }
        if (empty($_REQUEST['phone'])) {
            $errors['name'] = 'The Phone field is mandatory.';
        }
        if (!isset($_REQUEST['brand_id']) && !isset($_REQUEST['category_id'])) {
            $errors['request'] = 'Request error';
        } else {
            $brand = fn_brands_get_brand_data($_REQUEST['brand_id']);
            $category = fn_get_category_data($_REQUEST['category_id']);
            if (!$brand && !$category) {
                $errors['request'] = 'Request error';
            }
        }
        
        if(!$_SESSION['image_verification_ok']){
            $errors['captcha'] = 'Incorrect or missing confirmation code.';
        }

        if (!count($errors)) {
            
            $zoho_data = array(
                'Description' => "Brand: {$brand['name']}<br/>
                    {$category['category']}: ".fn_url("categories.view?category_id={$_REQUEST['category_id']}&brand_id={$_REQUEST['brand_id']}")."<br/>",
                'Subject' => 'Get a garanteed solution for $95 only',
                'Site' => $_SERVER['HTTP_HOST'],
                'xnQsjsdp' => 'edbsn3bf1b15b746d374ce7e9344e1096cce2',
                'xmIwtLD' => 'edbsn0e848f0537bc9d44c4d6ffe50e68c72eac3b561ac1bd2351db1866157ee51232',
                'xJdfEaS' => '',
                'actionType' => 'Q2FzZXM=',
                'returnURL' => "https://{$_SERVER['HTTP_HOST']}",
                'Created' => date('m/d/Y'),
                'Createdhour' => date('h'),
                'Createdminute' => date('i'),
                'Createdampm' => date('A')
            );
            $zoho_data['First Name'] = '';
            $zoho_data['Contact Name'] = $_REQUEST['name'];
            $zoho_data['Email'] = $_REQUEST['email'];
            $zoho_data['Phone'] = $_REQUEST['phone'];
            $zoho_data['Customer_TimeZone'] = $_REQUEST['timezone'];
            
            $breaks = array("<br />","<br>","<br/>");                  
            $zoho_data['Description'] = strip_tags(str_ireplace($breaks, "\r\n", $zoho_data['Description']));

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($zoho_data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
            curl_setopt($ch, CURLOPT_URL, 'https://desk.zoho.com/support/WebToCase');
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            $response_info = curl_getinfo($ch);
            curl_close($ch);
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                "zf_referrer_name" => "",
                "zf_redirect_url" => "",
                "zc_gad" => "",
                "SingleLine1" => "Get a garanteed solution for $95 only repairmysauna.com",
                "Name_First" => $_REQUEST['name'],
                "Email" => $_REQUEST['email'],
                "SingleLine8" => $_REQUEST['phone'],
                "SingleLine12" => fn_url("categories.view?category_id={$_REQUEST['category_id']}&brand_id={$_REQUEST['brand_id']}"),
                "MultiLine" => $zoho_data['Description'],
                "SingleLine6" => $brand['name'],                
                'SingleLine14' => 'RepairMySauna'
            ]);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type:multipart/form-data'));
            curl_setopt($ch, CURLOPT_URL, "https://forms.zohopublic.com/zohopeople267/form/InfraredSaunaPartsForm/formperma/vXecmwVeDKV9IWNPI9ZORxSzoGRe4TWgIujPS9rF42g/htmlRecords/submit");
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            $response_info = curl_getinfo($ch);
            curl_close($ch);
            
            fn_set_notification('N', __('congratulations'), 'Congratulations! Thank you for your interest one of our sales representatives will contact you shortly..');
        } else {
            fn_set_notification('E', __('error'), join('<br/>', $errors));
        }

        return array(CONTROLLER_STATUS_REDIRECT, 'categories.view?category_id=' . @$_REQUEST['category_id'] . '&brand_id=' . @$_REQUEST['brand_id']);
    }
}

if ($mode == 'list') {
    $letter = (isset($_GET['letter']) ? $_GET['letter'] : "A" );
    $ABC = "1,2,3,4,5,6,7,8,9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z";
    $current_letters = db_get_fields("SELECT DISTINCT LEFT(name,1) AS `letter` FROM ?:brands ORDER BY `letter`");

    Tygh::$app['view']->assign('brands', fn_brands_get_all(array('letter' => $letter, 'get_image' => true)));
    Tygh::$app['view']->assign('ABC', explode(',', $ABC));
    Tygh::$app['view']->assign('current_letters', $current_letters);
    Tygh::$app['view']->assign('active_letter', $letter);
}
if ($mode == 'view') {
    $brand = fn_brands_get_brand_data($_REQUEST['brand_id']);
    $categories = fn_get_subcategories(389);

    Tygh::$app['view']->assign('brand', $brand);
	Tygh::$app['view']->assign('page_title', "REPAIR {$brand['name']}");
    Tygh::$app['view']->assign('categories', $categories);
}

if ($mode == 'brands_by_letters' && isset($_REQUEST['letters'])) {
    $brands = fn_brands_by_lettes($_REQUEST['letters']);
    $html = '';
    foreach ($brands as $brand) {
        $html .= '<a href="' . $brand['url'] . '">' . $brand['name'] . '</a>';
    }
    die($html);
}

if ($mode == 'brands_by_name' && isset($_REQUEST['value'])) {
    $brands = db_get_array('SELECT * FROM ?:brands WHERE name LIKE ?s', "%" . $_REQUEST['value'] . "%");

    $html = '';
    foreach ($brands as $brand) {
        $html .= '<a href="' . fn_url("brands.view?brand_id={$brand['brand_id']}") . '">' . $brand['name'] . '</a>';
    }
    die($html);
}