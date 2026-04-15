<?php

use Tygh\Storage;
use Tygh\Tools\SecurityHelper;
use Tygh\Registry;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

function fn_brands_update($data, $brand_id, $lang_code = DESCR_SL) {
    if (!empty($brand_id)) {
        db_query("UPDATE ?:brands SET ?u WHERE brand_id = ?i", $data, $brand_id);
    } else {
        $brand_id = db_query("REPLACE INTO ?:brands ?e", $data);
        
    }
    
    fn_create_seo_name($brand_id, 'b', $data['name']);
    fn_attach_image_pairs('brand_image', 'brand', $brand_id, $lang_code);
    
    return $brand_id;
}

function fn_brands_get_all($params = array()) {
    $where = '';
    if(isset($params['letter'])){
        $where = db_quote('WHERE name REGEXP ?s', "^({$params['letter']}){1}");
    }
    $brands = db_get_array("SELECT * FROM ?:brands $where ORDER BY name ASC");
    
    if(isset($params['get_image'])){
        foreach($brands as $key => $brand){
            $brands[$key]['main_pair'] = fn_get_image_pairs($brand['brand_id'], 'brand', 'M', true, false);
        }
    }
    
    return $brands;
}

function fn_brands_get_brand($brand_id){
    $brand = db_get_row('SELECT * FROM ?:brands WHERE brand_id = ?i', $brand_id);
    return $brand;
}

function fn_brands_get_brand_data($brand_id){
    $brand = db_get_row('SELECT * FROM ?:brands WHERE brand_id = ?i', $brand_id);
    
    if($brand){
        $brand['seo_name'] = fn_seo_get_name('b', $brand_id);
        $brand['main_pair'] = fn_get_image_pairs($brand_id, 'brand', 'M', true, false);
    }
    return $brand;
}


function fn_brands_get_brand_data_by_slug($slug){
    $object_id = db_get_field('SELECT object_id FROM ?:seo_names WHERE name = ?s AND type = ?s', $slug, 'b');
    return fn_brands_get_brand_data($object_id);
}


function fn_brands_by_lettes($letters){
    $ABC = "1,2,3,4,5,6,7,8,9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z";
    $letters = explode("-", $letters);
    $current_letters = array();
    
    $finded = false;
    foreach(explode(",", $ABC) as $letter){
        if($letter == $letters[0]){
            $finded = true;
        }
        if($finded){
            $current_letters []= $letter;
        }
        if($letter == $letters[1]){
            break;
        }
    }
    $brands = db_get_array('SELECT * FROM ?:brands WHERE name REGEXP "^('. join("|", $current_letters).'){1}" ORDER BY name ASC');
    
    $output_brands = array();
    foreach($brands as $brand){
        $output_brands []= array(
            'name' => $brand['name'],
            'url' => fn_url('brands.view?brand_id='.$brand['brand_id'])
        );
    }
    
    return $output_brands;
}