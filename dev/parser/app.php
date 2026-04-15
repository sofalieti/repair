<?php
	
	include "simplehtmldom_1_8_1/simple_html_dom.php";
	
	/*
	$html = file_get_html('https://www.kimpex.com/en-us/our-brands?brand_grid-sort=&brand_grid-page=1&brand_grid-pageSize=500&brand_grid-group=&brand_grid-filter=');
	
	$table = $html->find('div[id=brand_grid]', 0);
	
	
	//Brands

	$tbody = $table->find('tbody', 0);
	
	$trs = $tbody->find('tr');
	
	$brands = array();
	
	foreach($trs as $tr){
		$image_obj = $tr->find('td', 0);
		$brand_obj = $tr->find('td', 1);
		
		$image_obj_link = $image_obj->find('a', 0)->href;
		$image_obj_img_link = $image_obj->find('img', 0)->src;
		
		$brand_name = $brand_obj->find('a', 0)->plaintext;
		
		$brand = array(
			'img_link' => $image_obj_img_link,
			'link' => $image_obj_link,
			'brand' => $brand_name,
			'products' => array(
				0 => array(),
				1 => array(),
			)

		);



		//Получение продуктов
		foreach(){//Цикл с продуктами


			//Получение инфы о продукте


			//Добавление в общий массив
			$brand['products'] []= array();

		}


		$brands [] = $brand;

		print_r($brands);
		exit;
	}



	foreach($brands as $brand){
     		$link = 'https://www.kimpex.com'.$brand['link'];

 }
*/

//Список продутов products_link
$link_primordial_products = 'https://www.kimpex.com/en-us/products?filter=brand:action';

$html_primordial_products = file_get_html($link_primordial_products. '&recordsperpage=96');

$products = $html_primordial_products->find('div.product');

$products_link = array();

foreach($products as $product){

	$product_link = $product->find('a', 0)->href;

	$products_link []= array(
		'link' => $product_link
	);

	echo 'https://www.kimpex.com', $product_link, '<br>';

}

//Продукт product_link
$link_primordial_product = 'https://www.kimpex.com/en-us/products/atv/hunting-fishing-outdoor/hunting-blinds/action-hunting-blind-camouflage-type-furtif-grass-ghost';

$html_primordial_product = file_get_html($link_primordial_product);

$price = $html_primordial_product->find('div.amount', 0)->plaintext;

//echo 'price - ', $price, '<br>';
	
$title = $html_primordial_product->find('h1.cart_title_not_in_content', 0)->plaintext;

//echo 'title - ', $title, '<br>';

$attribute = $html_primordial_product->find('div[id=attribute_wrapper]', 0)->plaintext;

//echo 'attribute - ', $attribute, '<br>';

$mainimg = $html_primordial_product->find('div.slider', 0);

$description = $html_primordial_product->find('div.k-content', 0)->plaintext;

//echo 'description - ',$description;

$product = array(
	'title' => $title,
	'description' => $description,
	'price' => $price,
	'images' => array()
);


foreach($mainimg->find('img') as $numberimg){
	//echo ($numberimg->attr['data-zoom']).'<br>';


   $product['images'][]= $numberimg->attr['data-zoom'];

}
//print_r($product);




//

/*array(
	0 => array(//Brand 1
		'img_link' => $image_obj_img_link,
		'link' => $image_obj_link,
		'brand' => $brand_name
		'products' => array(
			0 => array(
				'title' => $title,
				'description' => $description,
				'price' => $price,
				'images' => array()
			),
			1 => array(
				'title' => $title,
				'description' => $description,
				'price' => $price,
				'images' => array()
			)
		)
	),
	1 => array(//Brand 1
		'img_link' => $image_obj_img_link,
		'link' => $image_obj_link,
		'brand' => $brand_name
		'products' => array(
			0 => array(
				'title' => $title,
				'description' => $description,
				'price' => $price,
				'images' => array()
			),
			1 => array(
				'title' => $title,
				'description' => $description,
				'price' => $price,
				'images' => array()
			)
		)
	)
)*/




?>