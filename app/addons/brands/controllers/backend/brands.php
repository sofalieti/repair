<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    fn_trusted_vars('brand_data');
    $suffix = '';
    if ($mode == 'update') {
        $brand_id = fn_brands_update($_REQUEST['brand_data'], $_REQUEST['brand_id'], DESCR_SL);
        $suffix = ".update?brand_id=$brand_id";
    }

    if ($mode == 'delete') {
        if (!empty($_REQUEST['brand_id'])) {
            db_query('DELETE FROM ?:brands WHERE brand_id = ?i', $_REQUEST['brand_id']);
        }

        $suffix = '.manage';
    }

    return array(CONTROLLER_STATUS_OK, 'brands' . $suffix);
}

if ($mode == 'manage') {
    $brands = db_get_array('SELECT * FROM ?:brands ORDER BY name ASC');
    Tygh::$app['view']->assign('brands', $brands);
} elseif ($mode == 'add') {
    
} elseif ($mode == 'update') {
    $brand = fn_brands_get_brand_data($_REQUEST['brand_id']);

    if (empty($brand)) {
        return array(CONTROLLER_STATUS_NO_PAGE);
    }

    Tygh::$app['view']->assign('brand', $brand);
    
} elseif ($mode == 'delete') {
    if (!empty($_REQUEST['brand_id'])) {
        db_query('DELETE FROM ?:brands WHERE brand_id = ?i', $_REQUEST['brand_id']);
    }

    $suffix = '.manage';
    return array(CONTROLLER_STATUS_OK, 'brands' . $suffix);
}elseif($mode == 'import_brands'){
    echo "Start\n\n";
    echo "Rename seo names\n";
    
    /*$seo_names = db_get_array("SELECT * FROM ?:seo_names WHERE type = ?s", "p");
    foreach($seo_names as $seo_name){
        echo $seo_name['object_id']."\n";
        db_query("UPDATE ?:seo_names SET name = ?s WHERE object_id = ?i AND type = ?s", $seo_name['name'].'-old', $seo_name['object_id'], 'p');
    }*/
    
    $params['cid'] = 388;
    list($products, $search) = fn_get_products($params);
    fn_gather_additional_products_data($products, array('get_icon' => true, 'get_detailed' => true, 'get_options' => false, 'get_discounts' => false, 'get_features' => false));
    
    foreach($products as $product){
        $_REQUEST = array();
        if(!db_get_row('SELECT * FROM ?:brands WHERE name = ?s', $product['product'])){
            $data['name'] = $product['product'];

            if(isset($product['main_pair']) && count($product['main_pair'])){
                $_REQUEST['brand_image_image_data'][] = array(
                    'pair_id' => '', 
                    'type' => 'M',
                    'object_id' => 0,
                    'image_alt' => ''
                );
                $_REQUEST['file_brand_image_image_icon'][] = 'https://repairmysauna.com/images/'.$product['main_pair']['detailed']['relative_path'];
                $_REQUEST['type_brand_image_image_icon'][] = 'url';
            }

            $brand = fn_brands_update($data, '');
            echo "CREATE ".$product['product']."\n";
        }else{
            echo "UPDATE ".$product['product']."\n";
        }
        
        
    }
    
    die("End\n");
}
