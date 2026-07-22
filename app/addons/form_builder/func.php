<?php

/* * *************************************************************************
 *                                                                          *
 *   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 *                                                                          *
 * ***************************************************************************
 * PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
 * "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
 * ************************************************************************** */

use Tygh\Mailer;
use Tygh\Tools\SecurityHelper;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

function fn_form_builder_demo_install() {
    // Get admin account information and update "Email to" field in the "Contact us" page
    $admin_email = db_get_field('SELECT email FROM ?:users WHERE user_id = ?i', 1);

    db_query('UPDATE ?:form_options SET value = ?s WHERE element_id = ?i', $admin_email, 5);
}

function fn_form_builder_delete_page(&$page_id) {
    // deleting form elements
    $element_ids = db_get_fields("SELECT element_id FROM ?:form_options WHERE page_id = ?i", $page_id);
    db_query("DELETE FROM ?:form_descriptions WHERE object_id IN (?n)", $element_ids);
    db_query("DELETE FROM ?:form_options WHERE page_id = ?i", $page_id);
}

function fn_form_builder_update_page_post(&$page_data, &$page_id, &$lang_code) {
    // page form processing
    if (!empty($page_data['form'])) {

        $elements_data = empty($page_data['form']['elements_data']) ? array() : $page_data['form']['elements_data'];
        $general_data = empty($page_data['form']['general']) ? array() : $page_data['form']['general'];

        $elm_ids = array();

        if (!empty($elements_data)) {

            // process elements
            foreach ($elements_data as $data) {

                if (empty($data['description']) && ($data['element_type'] != FORM_SEPARATOR && $data['element_type'] != FORM_OPEN_GROUP && $data['element_type'] != FORM_CLOSE_GROUP)) {
                    continue;
                }

                if (!empty($data['element_type']) && strpos(FORM_HEADER . FORM_SEPARATOR . FORM_OPEN_GROUP . FORM_CLOSE_GROUP, $data['element_type']) !== false) {
                    $data['required'] = 'N';
                }

                $data['page_id'] = $page_id;

                if (!empty($data['element_id'])) {
                    $data['object_id'] = $element_id = $data['element_id'];
                    db_query('UPDATE ?:form_options SET ?u WHERE element_id = ?i', $data, $element_id);
                    db_query('UPDATE ?:form_descriptions SET ?u WHERE object_id = ?i AND lang_code = ?s', $data, $element_id, $lang_code);
                } else {
                    $data['object_id'] = $element_id = db_query('INSERT INTO ?:form_options ?e', $data);
                    foreach (fn_get_translation_languages() as $data['lang_code'] => $_v) {
                        db_query('INSERT INTO ?:form_descriptions ?e', $data);
                    }
                }

                $elm_ids[] = $element_id;

                // process variants
                if (!empty($data['variants'])) {
                    foreach ($data['variants'] as $k => $v) {

                        if (empty($v['description'])) {
                            continue;
                        }

                        $v['parent_id'] = $element_id;
                        $v['element_type'] = FORM_VARIANT; // variant
                        $v['page_id'] = $page_id;

                        if (!empty($v['element_id'])) {
                            $v['object_id'] = $v['element_id'];
                            db_query('UPDATE ?:form_options SET ?u WHERE element_id = ?i', $v, $v['element_id']);
                            db_query('UPDATE ?:form_descriptions SET ?u WHERE object_id = ?i AND lang_code = ?s', $v, $v['element_id'], $lang_code);
                        } else {
                            $v['object_id'] = $v['element_id'] = db_query('INSERT INTO ?:form_options ?e', $v);
                            foreach (fn_get_translation_languages() as $v['lang_code'] => $_v) {
                                db_query('INSERT INTO ?:form_descriptions ?e', $v);
                            }
                        }

                        $elm_ids[] = $v['element_id'];
                    }
                }
            }
        }

        // update or insert general form data
        if (!empty($general_data)) {
            SecurityHelper::sanitizeObjectData('form_general_data', $general_data);
            //$gdata = fn_trusted_vars('general_data', true);
            foreach ($general_data as $type => $data) {

                $elm_id = db_get_field("SELECT element_id FROM ?:form_options WHERE page_id = ?i AND element_type = ?s", $page_id, $type);
                $_description = array();
                $_data = array(
                    'element_type' => $type,
                    'page_id' => $page_id,
                    'status' => 'A',
                );

                if (($type == FORM_RECIPIENT) || ($type == FORM_IS_SECURE) || ($type == FORM_REDIRECT_URL) || ($type == FORM_LABEL_AS_PLACEHOLDER)) {
                    $_data['value'] = $data;
                }

                $_description = array(
                    'description' => $data
                );
                if (empty($elm_id)) {
                    $_description['object_id'] = $elm_id = db_query('INSERT INTO ?:form_options ?e', $_data);
                    foreach (fn_get_translation_languages() as $_description['lang_code'] => $_v) {
                        db_query('INSERT INTO ?:form_descriptions ?e', $_description);
                    }
                } else {
                    db_query('UPDATE ?:form_options SET ?u WHERE element_id = ?i', $_data, $elm_id);
                    db_query('UPDATE ?:form_descriptions SET ?u WHERE object_id = ?i AND lang_code = ?s', $_description, $elm_id, $lang_code);
                }

                $elm_ids[] = $elm_id;
            }
        }

        // Delete obsolete elements
        $obsolete_ids = db_get_fields("SELECT element_id FROM ?:form_options WHERE page_id = ?i AND element_id NOT IN (?n)", $page_id, $elm_ids);

        if (!empty($obsolete_ids)) {
            db_query("DELETE FROM ?:form_options WHERE parent_id IN (?n)", $obsolete_ids);
            db_query("DELETE FROM ?:form_options WHERE element_id IN (?n)", $obsolete_ids);
            db_query("DELETE FROM ?:form_descriptions WHERE object_id IN (?n)", $obsolete_ids);
        }
    }
}

function fn_form_builder_get_page_data(&$page_data) {
    if (!empty($page_data['page_type']) && $page_data['page_type'] == PAGE_TYPE_FORM) {
        list($page_data['form']['elements'], $page_data['form']['general']) = fn_get_form_elements($page_data['page_id'], true);
    }
}

//
// Get form
// @page_id - ID of page to get form for
// @return array(form elements, general form data )
function fn_get_form_elements($page_id, $avail_only = false, $lang = CART_LANGUAGE) {
    $where = ($avail_only == true) ? " AND f.status = 'A'" : '';
    $general_data = array();
    $elms = db_get_hash_array("SELECT f.*, d.description FROM ?:form_options as f LEFT JOIN ?:form_descriptions as d ON d.object_id=f.element_id AND d.lang_code = ?s WHERE f.page_id = ?i $where ORDER BY f.position", 'element_id', $lang, $page_id);

    // Build variants
    foreach ($elms as $elm_id => $data) {
        if ($data['element_type'] == FORM_VARIANT) { // this is variant
            if (!empty($elms[$data['parent_id']])) {
                $elms[$data['parent_id']]['variants'][$elm_id] = $data;
            }
            unset($elms[$elm_id]);
            continue;
        }

        // Get general form options
        if (strpos(FORM_SUBMIT, $data['element_type']) !== false) {
            $general_data[$data['element_type']] = $data['description'];
            unset($elms[$elm_id]);
            continue;
        }

        if (strpos(FORM_IS_SECURE . FORM_RECIPIENT . FORM_REDIRECT_URL . FORM_LABEL_AS_PLACEHOLDER, $data['element_type']) !== false) {
            $general_data[$data['element_type']] = $data['value'];
            unset($elms[$elm_id]);
            continue;
        }
    }

    return array($elms, $general_data);
}

//
// Send form
// @page_id - form page ID
// @elements_data - elements data
function fn_send_form($page_id, $form_values) {
    $result = false;
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
    if (!empty($form_values)) {
        $page_data = fn_get_page_data($page_id);

        if (!empty($page_data['form']['elements'])) {

            $result = true;
            
            $attachments = array();

            $fb_files = fn_filter_uploaded_data('fb_files');

            if (isset($_FILES['file_fb_images'])) {
                foreach ($_FILES['file_fb_images']['name'] as $key => $names) {
                    foreach ($names as $key2 => $name) {
                        //$file_info = mime_content_type($_FILES['file_fb_images']['tmp_name'][$key][$key2]);
                        //print_r($file_info);
                        //exit;
                        $fb_files["{$key}_{$key2}"] = array(
                            'name' => $_FILES['file_fb_images']['name'][$key][$key2],
                            'type' => $_FILES['file_fb_images']['type'][$key][$key2],
                            'path' => $_FILES['file_fb_images']['tmp_name'][$key][$key2],
                            'error' => $_FILES['file_fb_images']['error'][$key][$key2],
                            'size' => $_FILES['file_fb_images']['size'][$key][$key2]
                        );
                    }
                }
            }
            
            $f_i = 1;
            $curl_attachments = array();
            //$curl_cfp_attachments = array();
            if (!empty($fb_files)) {
                foreach ($fb_files as $k => $v) {
                    $filename = null;
                    
                    $form_values[$k] = $v['name'];
                    if (!empty($v['path'])) {
                        $attachments[$v['name']] = $v['path'];
                        $ext = substr(strrchr($v['name'], '.'), 1);
                        $filename = uniqid(rand(), true) . "." . $ext;
                        $new_path = $_SERVER['DOCUMENT_ROOT'] . '/images/form_data/' . $filename;
                        copy($v['path'], $new_path);
                        //print_r($file_info);exit;
                        usleep(100);
                        $file_output .= "<a target='_blank' href='{$protocol}{$_SERVER['HTTP_HOST']}/images/form_data/{$filename}'><img src='{$protocol}{$_SERVER['HTTP_HOST']}/images/form_data/{$filename}' width='100'/></a><br/>";

                        if ($f_i <= 5){
                            $curl_attachments["attachment_{$f_i}"] = curl_file_create($new_path, mime_content_type($new_path), $filename);
                            //$curl_cfp_attachments["FileUpload[".($f_i-1)."]"] = $curl_attachments["attachment_{$f_i}"];
                        }
                        $f_i++;
                    }
                }
            }

            $max_length = 0;

            $sender = '';

            $zoho_data = array(
                'Description' => '',
                'Subject' => $page_data['page'],
                'Site' => $_SERVER['HTTP_HOST'],
                'xnQsjsdp' => 'edbsn3bf1b15b746d374ce7e9344e1096cce2',
                'xmIwtLD' => 'edbsn0e848f0537bc9d44c4d6ffe50e68c72eac3b561ac1bd2351db1866157ee51232',
                'xJdfEaS' => '',
                'actionType' => 'Q2FzZXM=',
                'returnURL' => "https://{$_SERVER['HTTP_HOST']}",
                'Created' => date('m/d/Y'),
                'Createdhour' => date('h'),
                'Createdminute' => date('i'),
                'Createdampm' => date('A'),
            );
            foreach ($page_data['form']['elements'] as $k => $v) {
                if (($l = strlen($v['description'])) > $max_length) {
                    $max_length = $l;
                }

                // Check if sender email exists
                if ($v['element_type'] == FORM_EMAIL) {
                    $sender = $form_values[$k];
                }

                if ($v['element_type'] == FORM_DATE) {
                    $form_values[$k] = fn_parse_date($form_values[$k]);
                }

                if ($v['element_type'] == FORM_REFERER) {
                    $form_values[$k] = $_SESSION['auth']['referer'];
                }

                if ($v['element_type'] == FORM_IP_ADDRESS) {
                    $ip = fn_get_ip();
                    $form_values[$k] = $ip['host'];
                }

                if(in_array(strtolower($v['description']) ,array('your name', 'name', 'first name'))) {
                    $zoho_data['First Name'] = '';
                    $zoho_data['Contact Name'] = $form_values[$k];
                } elseif (strtolower($v['description']) == 'e-mail') {
                    $zoho_data['Email'] = $form_values[$k];
                } elseif (strtolower($v['description']) == 'phone' || strtolower($v['description']) == 'cell phone') {
                    $zoho_data['Phone'] = $form_values[$k];
                } else {
                    $val = $form_values[$k];
                    if ($v['element_type'] == 'S') {
                        $val = $v['variants'][$form_values[$k]]['description'];
                    }
                    if($v['element_type'] == FORM_DATE){
                        $val = date('m/d/Y', $form_values[$k]);
                    }
                    if(!empty($v['description'])){
                        $zoho_data['Description'] .= $v['description'] . ": " . $val . "<br/>";
                    }
                }
            }

            if (!empty($_REQUEST['fb_source_page_title'])) {
                $fb_title = trim(strip_tags($_REQUEST['fb_source_page_title']));
                if ($fb_title !== '') {
                    $zoho_data['Subject'] .= ' ' . $fb_title;
                }
            }

            if (!fn_zoho_payload_has_stopwords($zoho_data) && !fn_form_builder_is_spam($zoho_data['Description'])) {

                //$zoho_data['Description'] .= "<br/><a target='_blank' href='https://enlightensauna.com/index.php?dispatch=infusionsoft.get_contact&secret123=&email={$zoho_data['Email']}'>Stop Email Compaign</a>";

                //$zoho_data = array_merge($zoho_data, fn_get_last_referal());
                //$zoho_data = array_merge($zoho_data, fn_get_last_referer());

                $zoho_data = array_merge($curl_attachments, $zoho_data);

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $zoho_data);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type:multipart/form-data'));
                curl_setopt($ch, CURLOPT_URL, 'https://desk.zoho.com/support/WebToCase');
                curl_setopt($ch, CURLOPT_HEADER, TRUE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                $response_info = curl_getinfo($ch);
                curl_close($ch);
                
                
                $zoho_cfp_data = [
                    "zf_referrer_name" => "",
                    "zf_redirect_url" => "",
                    "zc_gad" => "",
                    'SingleLine1' => $zoho_data['Subject'],
                    'Name_First' => $zoho_data['Contact Name'],
                    'SingleLine8' => @$zoho_data['Phone'],
                    'Email' => @$zoho_data['Email'],
                    'MultiLine' => str_replace(['<br/>','<br>'], "\n", $zoho_data['Description']),
                    'SingleLine14' => 'RepairMySauna'
                ];
                
                if(count($curl_attachments)){
                    $index = 0;
                    foreach($curl_attachments as $curl_attachment){
                        $zoho_cfp_data['ImageUpload'.($index > 0 ? $index : "")] = $curl_attachment;
                        $index++;
                    }
                }
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $zoho_cfp_data);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
                curl_setopt($ch, CURLOPT_URL, "https://forms.zohopublic.com/zohopeople267/form/InfraredSaunaPartsForm/formperma/vXecmwVeDKV9IWNPI9ZORxSzoGRe4TWgIujPS9rF42g/htmlRecords/submit");
                curl_setopt($ch, CURLOPT_HEADER, false); 
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $zoho_response = curl_exec($ch); 
                curl_close($ch);
                
            }

            /* Here we get the Response Body
              $response_body = substr($response, $response_info['header_size']);
              // Response HTTP Status Code
              echo "Response HTTP Status Code : ";
              echo $response_info['http_code'];
              echo "\n";
              // Response Body
              echo "Response Body : ";
              echo $response_body; */

            $max_length += 2;

            if ($result == true) {

                $from = 'default_company_support_department';
                $is_html = true;

                fn_set_hook('send_form', $page_data, $form_values, $result, $from, $sender, $attachments, $is_html);
            }
        }
    }

    return $result;
}

function fn_form_builder_find_links_in_text($text) {
    return preg_match("~[a-z]+://\S+~iu", $text);
}

function fn_form_builder_is_spam($text) {
    if (function_exists('fn_zoho_text_has_stopwords') && fn_zoho_text_has_stopwords($text)) {
        return true;
    }
    if (fn_form_builder_find_links_in_text($text)) {
        $find = db_get_row("SELECT * FROM ?:form_spams WHERE ip = ?s AND type = ?s", $_SERVER['REMOTE_ADDR'], 'form_builder_body');
        if (count($find)) {
            $end_time = $find['time'] + 60 * 60 * 24;
            if (time() > $end_time) {
                db_query('UPDATE ?:form_spams SET time = ?i WHERE form_spam_id = ?i', time(), $find['form_spam_id']);
                return false;
            }
        } else {
            db_query("INSERT INTO ?:form_spams SET type = ?s, ip = ?s, time = ?i",
                    'form_builder_body', $_SERVER['REMOTE_ADDR'], time());
            return false;
        }
        return true;
    }
    return false;
}

function fn_form_builder_clone_page(&$page_id, &$clone_id) {
    $elements = db_get_array('SELECT * FROM ?:form_options WHERE page_id = ?i AND parent_id = ?i', $page_id, 0);
    foreach ($elements as $entry) {
        $entry['page_id'] = $clone_id;
        $element_id = $entry['element_id'];
        unset($entry['element_id']);

        $new_element_id = db_query('INSERT INTO ?:form_options ?e', $entry);

        $descriptions = db_get_array('SELECT * FROM ?:form_descriptions WHERE object_id = ?i', $element_id);
        foreach ($descriptions as $array) {
            $array['object_id'] = $new_element_id;

            db_query('INSERT INTO ?:form_descriptions ?e', $array);
        }

        $sub_elements = db_get_array('SELECT * FROM ?:form_options WHERE page_id = ?i AND parent_id = ?i', $page_id, $element_id);

        if (!empty($sub_elements)) {
            foreach ($sub_elements as $row) {
                $row['parent_id'] = $new_element_id;
                $row['page_id'] = $clone_id;
                $sub_element_id = $row['element_id'];
                unset($row['element_id']);

                $new_sub_element_id = db_query('INSERT INTO ?:form_options ?e', $row);

                $descriptions = db_get_array('SELECT * FROM ?:form_descriptions WHERE object_id = ?i', $sub_element_id);
                foreach ($descriptions as $array) {
                    $array['object_id'] = $new_sub_element_id;

                    db_query('INSERT INTO ?:form_descriptions ?e', $array);
                }
            }
        }
    }
}

function fn_form_builder_page_object_by_type(&$types) {
    $types[PAGE_TYPE_FORM] = array(
        'single' => 'form',
        'name' => 'forms',
        'add_name' => 'add_form',
        'edit_name' => 'editing_form',
        'new_name' => 'new_form',
    );
}

function fn_form_builder_init_secure_controllers(&$controllers) {
    $controllers['pages'] = 'passive';
}

function fn_form_builder_settings_variants_image_verification_use_for(&$objects) {
    $objects['form_builder'] = __('use_for_form_builder');
}

function fn_form_builder_selectable_elements() {
    static $elms = array(
        FORM_MULTIPLE_CB,
        FORM_MULTIPLE_SB,
        FORM_RADIO,
        FORM_SELECT,
    );

    fn_set_hook('form_selectable_elements', $elms);

    return $elms;
}

function fn_form_builder_remove_pages() {
    $pages = db_get_fields("SELECT page_id FROM ?:pages WHERE page_type = ?s ", PAGE_TYPE_FORM);

    foreach ($pages as $page_id) {
        fn_delete_page($page_id, $recurse = true);
    }
}
