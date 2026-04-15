<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
fn_trusted_vars('geo_state');

function fn_my_changes_before_dispatch($controller, $mode, $action, $dispatch_extra, $area) {
    if ($area == 'C') {

        //Geo ip
        include_once($_SERVER['DOCUMENT_ROOT'] . "/app/lib/other/geo/src/geoipcity.inc");
        include_once($_SERVER['DOCUMENT_ROOT'] . "/app/lib/other/geo/src/geoipregionvars.php");
        if (!isset($_SESSION['geo_data'])) {
            $gi = geoip_open($_SERVER['DOCUMENT_ROOT'] . "/app/lib/other/geo/src/GeoLiteCity.dat", GEOIP_STANDARD);
            $record = GeoIP_record_by_addr($gi, $_SERVER['REMOTE_ADDR']);
            //$record = GeoIP_record_by_addr($gi, '142.31.216.0');

            if (isset($record->country_code) &&
                    isset($record->region) &&
                    isset($GEOIP_REGION_NAME[$record->country_code]) &&
                    isset($GEOIP_REGION_NAME[$record->country_code][$record->region]) &&
                    ($record->country_code == 'US' || $record->country_code == 'CA')) {

                $data = (array) $record;
                $data['region_name'] = $GEOIP_REGION_NAME[$record->country_code][$record->region];
                $data['banner_text'] = 'California';
                if ($data['country_code'] == 'US' && $data['region_name'] != 'California') {
                    $data['banner_text'] .= ', ' . $data['region_name'];
                }
                $_SESSION['geo_data'] = $data;
                $_SESSION['geo_data_current_state_code'] = $data['region'];
            } else {
                $_SESSION['geo_data'] = fn_get_default_state();
            }


            //Redirect
            $domain = db_get_row('SELECT * FROM ?:domains WHERE name = ?s', $_SERVER['HTTP_HOST']);

            if (count($domain)) {
                if ($domain['country_code'] != $_SESSION['geo_data']['country_code']) {
                    //if(isset($_GET['lala'])){
                    $new_domain = db_get_row('SELECT * FROM ?:domains WHERE country_code = ?s', $_SESSION['geo_data']['country_code']);
                    if (count($new_domain)) {
                        $location = str_replace($domain['name'], $new_domain['name'], fn_get_full_url());
                        header('Location: ' . $location);
                        exit;
                    }
                    //}
                }
            }



            geoip_close($gi);
        }

        //Save links
        if (preg_match('/\/pricelist\.html\?ref=[a-z0-1\-_]*/i', $_SERVER['REQUEST_URI'])) {
            db_query('INSERT INTO ?:open_links SET ip = ?s, link = ?s, time = ?i', $_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI'], time());
        }
    }
}

function fn_get_geo_data() {
    if (isset($_SESSION['geo_data'])) {

        return $_SESSION['geo_data'];
    }
    return false;
}

function fn_geo_country_and_state() {
    $geo_data = fn_get_geo_data();
    if ($geo_data != false) {
        $geo_data['country_name'] = str_replace("United States", "USA", $geo_data['country_name']);
        return "{$geo_data['country_name']}, {$geo_data['region_name']}";
    }
    return '';
}

function fn_get_default_state() {
    if ($_SERVER['HTTP_HOST'] == 'enlightensauna.ca') {
        return array(
            'country_code' => 'CA',
            'country_code3' => 'CAN',
            'country_name' => 'Canada',
            'region' => 'ON',
            'city' => '',
            'postal_code' => '',
            'latitude' => '',
            'longitude' => '',
            'area_code' => '',
            'dma_code' => '',
            'metro_code' => '',
            'continent_code' => '',
            'region_name' => 'Ontario',
            'banner_text' => 'Ontario'
        );
    }
    return array(
        'country_code' => 'US',
        'country_code3' => 'USA',
        'country_name' => 'United States',
        'region' => 'CA',
        'city' => '',
        'postal_code' => '',
        'latitude' => '',
        'longitude' => '',
        'area_code' => '',
        'dma_code' => '',
        'metro_code' => '',
        'continent_code' => '',
        'region_name' => 'California',
        'banner_text' => 'California'
    );
}

function fn_get_geo_states($code) {
    include($_SERVER['DOCUMENT_ROOT'] . "/app/lib/other/geo/src/geoipregionvars.php");
    $data = array(
        'US' => $GEOIP_REGION_NAME['US'],
        'CA' => $GEOIP_REGION_NAME['CA']
    );
    return $data[$code];
}

function fn_get_geo_url($state) {
    $data = $_GET;
    $data['geo_state'] = $state;
    return strtok($_SERVER['REQUEST_URI'], '?') . '?' . http_build_query($data);
}

function fn_geo_shipping_price_for_ca($product_shipping_price, $p25 = false) {
    if ($p25) {
        return $product_shipping_price * 2 * 0.75 + (int) (isset($_SESSION['domain_langs']['shipping_price_modificator']) ? $_SESSION['domain_langs']['shipping_price_modificator'] : 0);
    } else {
        return $product_shipping_price * 2 + (int) (isset($_SESSION['domain_langs']['shipping_price_modificator']) ? $_SESSION['domain_langs']['shipping_price_modificator'] : 0);
    }
}

function fn_geo_shipping_price($product_shipping_price) {
    /* $state_prices = array(
      'AZ' => 50,
      'CA' => 'free',
      'AA' => 10,
      'AE' => -30,
      'AK' => 'contact_for_price',
      'AL' => 50,
      'AP' => 40,
      'AR' => 0,
      'AS' => 10,
      'CO' => 20,
      'CT' => -40,
      'DC' => -10,
      'DE' => -40,
      'FL' => 25,
      'FM' => 5,
      'GA' => 5,
      'GU' => 5,
      'HI' => 'contact_for_price',
      'IA' => 20,
      'ID' => 10,
      'IL' => 10,
      'IN' => 15,
      'KS' => 10,
      'KY' => 10,
      'LA' => 30,
      'MA' => 50,
      'MD' => 0,
      'ME' => 0,
      'MH' => 20,
      'MI' => -10,
      'MN' => -30,
      'MO' => 10,
      'MP' => 40,
      'MS' => 10,
      'MT' => 10,
      'NC' => 45,
      'ND' => 0,
      'NE' => 0,
      'NH' => 10,
      'NJ' => 20,
      'NM' => 40,
      'NV' => 30,
      'NY' => 20,
      'OH' => 10,
      'OK' => -30,
      'OR' => -10,
      'PA' => -10,
      'PW' => -20,
      'RI' => -50,
      'SC' => -100,
      'SD' => -40,
      'TN' => -20,
      'TX' => -30,
      'UT' => -50,
      'VA' => -20,
      'VI' => 10,
      'VT' => 20,
      'WA' => 30,
      'WI' => 30,
      'WV' => 40,
      'WY' => 50
      ); */
    $state_prices = array(
        'AZ' => 'free',
        'CA' => 'free',
        'AA' => 'free',
        'AE' => 'free',
        'AK' => 'contact_for_price',
        'AL' => 'free',
        'AP' => 'free',
        'AR' => 'free',
        'AS' => 'free',
        'CO' => 'free',
        'CT' => 'free',
        'DC' => 'free',
        'DE' => 'free',
        'FL' => 'free',
        'FM' => 'free',
        'GA' => 'free',
        'GU' => 'free',
        'HI' => 'contact_for_price',
        'IA' => 'free',
        'ID' => 'free',
        'IL' => 'free',
        'IN' => 'free',
        'KS' => 'free',
        'KY' => 'free',
        'LA' => 'free',
        'MA' => 'free',
        'MD' => 'free',
        'ME' => 'free',
        'MH' => 'free',
        'MI' => 'free',
        'MN' => 'free',
        'MO' => 'free',
        'MP' => 'free',
        'MS' => 'free',
        'MT' => 'free',
        'NC' => 'free',
        'ND' => 'free',
        'NE' => 'free',
        'NH' => 'free',
        'NJ' => 'free',
        'NM' => 'free',
        'NV' => 'free',
        'NY' => 'free',
        'OH' => 'free',
        'OK' => 'free',
        'OR' => 'free',
        'PA' => 'free',
        'PW' => 'free',
        'RI' => 'free',
        'SC' => 'free',
        'SD' => 'free',
        'TN' => 'free',
        'TX' => 'free',
        'UT' => 'free',
        'VA' => 'free',
        'VI' => 'free',
        'VT' => 'free',
        'WA' => 'free',
        'WI' => 'free',
        'WV' => 'free',
        'WY' => 'free'
    );
    if (isset($_SESSION['geo_data'])) {
        if (isset($state_prices[$_SESSION['geo_data']['region']])) {
            if ($state_prices[$_SESSION['geo_data']['region']] === 'free')
                return 'free';
            elseif ($state_prices[$_SESSION['geo_data']['region']] === 'contact_for_price')
                return 'contact_for_price';
            else
                return $product_shipping_price + $state_prices[$_SESSION['geo_data']['region']] + (int) (isset($_SESSION['domain_langs']['shipping_price_modificator']) ? $_SESSION['domain_langs']['shipping_price_modificator'] : 0);
        }
    }
    return false;
}

function fn_geo_product_text($shipping_price) {
    $geo_data = fn_get_geo_data();
    if ($geo_data != false && $shipping_price > 0) {
        $geo_data['country_name'] = str_replace("United States", "USA", $geo_data['country_name']);
        if ($shipping_price > 0 && fn_geo_shipping_price($shipping_price) != false) {
            if (fn_geo_shipping_price($shipping_price) == 'free') {
                return "<span class=\"UpText\">Shipping Price For<br></span><span class=\"DownText\"> {$geo_data['country_name']}, {$geo_data['region_name']}: <strong>Free</strong></span>";
            } elseif (fn_geo_shipping_price($shipping_price) == 'contact_for_price') {
                return "<span class=\"UpText\">Shipping Price For<br></span><span class=\"DownText\"> {$geo_data['country_name']}, {$geo_data['region_name']}: <strong>Contact For Price</strong></span>";
            } elseif (isset($_SESSION['geo_data_current_state_code']) && $_SESSION['geo_data_current_state_code'] == $geo_data['region']) {
                return "<span class=\"UpText\">Shipping Price For<br></span><span class=\"DownText\"> {$geo_data['country_name']}, {$geo_data['region_name']}: <strong>Free</strong></span>";
            } else {
                return "<span class=\"UpText\">Shipping Price For<br></span><span class=\"DownText\"> {$geo_data['country_name']}, {$geo_data['region_name']}: <strong>$" . ceil(fn_geo_shipping_price($shipping_price)) . "</strong></span>";
            }
        } elseif ($shipping_price > 0 && $geo_data['country_code'] == 'CA') {
            //if(isset($_SESSION['geo_data_current_state_code']) && $_SESSION['geo_data_current_state_code'] == $geo_data['region']){
            return "<span class=\"UpText\">Shipping Price For<br></span><span class=\"DownText\"> {$geo_data['country_name']}, {$geo_data['region_name']}: <strike>$" . ceil(fn_geo_shipping_price_for_ca($shipping_price)) . "</strike> <strong>$" . ceil(fn_geo_shipping_price_for_ca($shipping_price, true)) . "</strong></span>";
            //}else{
            //return "<span class=\"UpText\">Shipping Price For<br></span><span class=\"DownText\"> {$geo_data['country_name']}, {$geo_data['region_name']}: <strong>$".ceil(fn_geo_shipping_price_for_ca($shipping_price))."</strong></span>";
            //}
        }
    }
    return false;
}

function fn_geo_zoho_pretext($shipping_price) {
    $geo_data = fn_get_geo_data();
    if ($geo_data != false) {
        $geo_data['country_name'] = str_replace("United States", "USA", $geo_data['country_name']);

        $msg = "";
        if (isset($_SESSION['geo_data_current_state_code'])) {
            $msg .= "Auto - ";
            if (isset(fn_get_geo_states('US')[$_SESSION['geo_data_current_state_code']])) {
                $msg .= "USA, " . fn_get_geo_states('US')[$_SESSION['geo_data_current_state_code']];
            } elseif (isset(fn_get_geo_states('CA')[$_SESSION['geo_data_current_state_code']])) {
                $msg .= "Canada, " . fn_get_geo_states('CA')[$_SESSION['geo_data_current_state_code']];
            }
            $msg .= "<br/>";
        }
        $msg .= "Current - {$geo_data['country_name']}, {$geo_data['region_name']}<br/>";
        $msg .= fn_geo_product_text($shipping_price);
        $msg .= "<br/>Ionizer price - " . ($_SESSION['sauna_type'] == 'outdoor' ? @$_SESSION['domain_langs']['ionizer_price'] : @$_SESSION['domain_langs']['indoor_ionizer_price']) . ", Chromotherapy price - " . ($_SESSION['sauna_type'] == 'outdoor' ? @$_SESSION['domain_langs']['chromotherapy_price'] : @$_SESSION['domain_langs']['indoor_chromotherapy_price']);
        return $msg;
    }
    return false;
}

function fn_geo_get_shipping_price($shipping_price) {
    $geo_data = fn_get_geo_data();
    if ($geo_data != false && $shipping_price > 0) {
        if ($shipping_price > 0 && fn_geo_shipping_price($shipping_price) != false) {
            if (fn_geo_shipping_price($shipping_price) == 'free') {
                return "Free";
            } elseif (fn_geo_shipping_price($shipping_price) == 'contact_for_price') {
                return "Contact For Price";
            } elseif (isset($_SESSION['geo_data_current_state_code']) && $_SESSION['geo_data_current_state_code'] == $geo_data['region']) {
                return "Free";
            } else {
                return "$" . ceil(fn_geo_shipping_price($shipping_price));
            }
        } elseif ($shipping_price > 0 && $geo_data['country_code'] == 'CA') {
            if (isset($_SESSION['geo_data_current_state_code']) && $_SESSION['geo_data_current_state_code'] == $geo_data['region']) {
                return "$" . ceil(fn_geo_shipping_price_for_ca($shipping_price));
            } else {
                return "$" . ceil(fn_geo_shipping_price_for_ca($shipping_price));
            }
        }
    }
    return '';
}

function fn_geo_is_free_shipping_price() {
    $geo_data = fn_get_geo_data();
    if ($geo_data != false) {
        if (fn_geo_shipping_price(100) == 'free') {
            return true;
        } elseif (isset($_SESSION['geo_data_current_state_code']) && $_SESSION['geo_data_current_state_code'] == $geo_data['region']) {
            return true;
        }
    }

    return false;
}

function fn_my_changes_send_form($page_data, $form_values, $result, $from, $sender, $attachments, $is_html) {
    if ($page_data['page_id'] == 99) {
        $name = trim($form_values[333] . " " . $form_values[357]);
        $email = trim($form_values[334]);
        $phone = trim($form_values[335]);
        $whb = @db_get_field('SELECT description FROM ?:form_descriptions WHERE object_id = ?i', $form_values[429]);
        if (!empty($name) && !empty($email) && !empty($phone) && !empty($whb) && fn_crm_infusionsoft_api_get_tag_ids($whb) != false) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/infusionsoft-apps/vendor/autoload.php';
            $config = array(
                'clientId' => 'ep5ybywxzk5ybexw2h4psdjf',
                'clientSecret' => 'Ay3ecZAmR9',
                'redirectUri' => 'https://outdoorinfraredsauna.com/infusionsoft-apps/',
            );
            $infusionsoft = new \Infusionsoft\Infusionsoft($config);
            $token_data = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/infusionsoft-apps/token_data');
            if (!empty($token_data)) {
                $token_data = unserialize($token_data);
                $infusionsoft->setToken($token_data);
                if ($infusionsoft->isTokenExpired()) {
                    $infusionsoft->refreshAccessToken();
                    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/infusionsoft-apps/token_data', serialize($infusionsoft->getToken()));
                }

                $contact_id = $infusionsoft->contacts('xml')->add(array(
                    'FirstName' => $name,
                    'Email' => $email,
                    'Phone1' => $phone
                ));

                $goal = $infusionsoft->funnels()->achieveGoal('fm445', 'cscartimport', $contact_id);
                if (isset($goal[0]) && $goal[0]['success'] == 1) {
                    $tag = $infusionsoft->contacts('xml')->addToGroup($contact_id, fn_crm_infusionsoft_api_get_tag_ids($whb));
                    //echo "Success ".$data_values['email']."\n";
                } else {
                    //echo "Goal infusionsoft error ".print_r($goal, true)."\n";
                }
            } else {
                //echo "Token infusionsoft error, https://outdoorinfraredsauna.com/infusionsoft-apps/";
            }
        }
    }
}

function get_custom_setting($field) {
    $setting = db_get_row('SELECT * FROM ?:custom_settings WHERE field = ?s', $field);
    if ($setting) {
        if ($setting['type'] == 'text') {
            return $setting['value'];
        } elseif ($setting['type'] == 'image') {
            return $setting['value'];
        }
    }
    return "";
}

function fn_discount_category_enable($category_id, $sauna_type) {
    return db_get_field('SELECT enable FROM ?:discount_category_settings WHERE category_id = ?i AND sauna_type = ?s', $category_id, $sauna_type);
}

function fn_my_changes_get_seo_by_type($type, $category = false, $product = false) {
    //$_SESSION['geo_data']
    $seo = db_get_row('SELECT * FROM ?:custom_setting_seo WHERE type = ?s', $type);
    if ($seo) {
        //$seo['title'] = str_replace('!sauna_type!', ucfirst($_SESSION['sauna_type']), $seo['title']);
        //$seo['description'] = str_replace('!sauna_type!', ucfirst($_SESSION['sauna_type']), $seo['description']);
        //$seo['keywords'] = str_replace('!sauna_type!', ucfirst($_SESSION['sauna_type']), $seo['keywords']);

        $seo['title'] = str_replace('!country!', @$_SESSION['geo_data']['country_name'], $seo['title']);
        $seo['description'] = str_replace('!country!', @$_SESSION['geo_data']['country_name'], $seo['description']);
        $seo['keywords'] = str_replace('!country!', @$_SESSION['geo_data']['country_name'], $seo['keywords']);

        $seo['title'] = str_replace('!state!', @$_SESSION['geo_data']['region_name'], $seo['title']);
        $seo['description'] = str_replace('!state!', @$_SESSION['geo_data']['region_name'], $seo['description']);
        $seo['keywords'] = str_replace('!state!', @$_SESSION['geo_data']['region_name'], $seo['keywords']);

        if ($category) {
            $seo['title'] = str_replace('!category!', $category['category'], $seo['title']);
            $seo['description'] = str_replace('!category!', $category['category'], $seo['description']);
            $seo['keywords'] = str_replace('!category!', $category['category'], $seo['keywords']);
        }
        if ($product) {
            $seo['title'] = str_replace('!product!', $product['product'], $seo['title']);
            $seo['description'] = str_replace('!product!', $product['product'], $seo['description']);
            $seo['keywords'] = str_replace('!product!', $product['product'], $seo['keywords']);
        }
    }
    return $seo;
}

function fn_my_changes_get_seo($category = false, $product = false) {
    $seo = array();

    if ($category && $product) {
        $seo['title'] = $product['page_title'];
        $seo['keywords'] = $product['meta_keywords'];
        $seo['description'] = $product['meta_description'];
    } elseif ($category) {
        $seo['title'] = $category['page_title'];
        $seo['keywords'] = $category['meta_keywords'];
        $seo['description'] = $category['meta_description'];
    }

    if (isset($seo['title']) && isset($seo['keywords']) && isset($seo['description'])) {
        $seo['title'] = str_replace('!sauna_type!', ucfirst($_SESSION['sauna_type_image']), $seo['title']);
        $seo['description'] = str_replace('!sauna_type!', ucfirst($_SESSION['sauna_type_image']), $seo['description']);
        $seo['keywords'] = str_replace('!sauna_type!', ucfirst($_SESSION['sauna_type_image']), $seo['keywords']);

        $seo['title'] = str_replace('!country!', @$_SESSION['geo_data']['country_name'], $seo['title']);
        $seo['description'] = str_replace('!country!', @$_SESSION['geo_data']['country_name'], $seo['description']);
        $seo['keywords'] = str_replace('!country!', @$_SESSION['geo_data']['country_name'], $seo['keywords']);

        $seo['title'] = str_replace('!state!', @$_SESSION['geo_data']['region_name'], $seo['title']);
        $seo['description'] = str_replace('!state!', @$_SESSION['geo_data']['region_name'], $seo['description']);
        $seo['keywords'] = str_replace('!state!', @$_SESSION['geo_data']['region_name'], $seo['keywords']);

        if ($category) {
            $seo['title'] = str_replace('!category!', $category['category'], $seo['title']);
            $seo['description'] = str_replace('!category!', $category['category'], $seo['description']);
            $seo['keywords'] = str_replace('!category!', $category['category'], $seo['keywords']);
        }
        if ($product) {
            $seo['title'] = str_replace('!product!', $product['product'], $seo['title']);
            $seo['title'] = str_replace('!seo_name!', $product['seo_product_name'], $seo['title']);
            $seo['description'] = str_replace('!product!', $product['product'], $seo['description']);
            $seo['keywords'] = str_replace('!product!', $product['product'], $seo['keywords']);
        }
    }
    return $seo;
}

function fn_get_full_url() {
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}