<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

if ($mode == 'view') {
    $product_id = empty($_REQUEST['product_id']) ? 0 : $_REQUEST['product_id'];
    $product = fn_get_product_data($product_id, $auth, CART_LANGUAGE);
    $category = fn_get_category_data(@$product['main_category']);
    $seo = fn_my_changes_get_seo($category, $product);
    if ($seo) {
        Tygh::$app['view']->assign('page_title', $seo['title']);
        Tygh::$app['view']->assign('meta_description', $seo['description']);
        Tygh::$app['view']->assign('meta_keywords', $seo['keywords']);
    }
}

