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
	
	if($mode == 'copy_page' && isset($_REQUEST['page_id']) && isset($_REQUEST['external_page_id'])){
		if(db_get_row('SELECT * FROM ?:pages WHERE page_id = ?i', $_REQUEST['external_page_id'])){
			
			//Update page
			//file_put_contents($_SERVER['DOCUMENT_ROOT'].'/test.txt', print_r($_POST, true));
			//print_r($_POST);
			//exit;
			$data = array(
				'page' => $_POST['page'],
				'description' => fn_find_and_download_images($_POST['description']),
				'short_description' => fn_find_and_download_images($_POST['short_description']),
				'meta_keywords' => $_POST['meta_keywords'],
				'meta_description' => $_POST['meta_description'],
				'page_title' => $_POST['page_title'],
				'status' => $_POST['status'],
				'position' => $_POST['position'],
				'use_avail_period' => $_POST['use_avail_period'],
				'avail_from_timestamp' => $_POST['avail_from_timestamp'],
				'avail_till_timestamp' => $_POST['avail_till_timestamp'],
				'blog_preview_text' => $_POST['blog_preview_text'],
				'blog_product_id' => $_POST['blog_product_id'],
				'blog_product_text' => $_POST['blog_product_text'],
				'show_child_pages' => $_POST['show_child_pages'],
				'show_on_main_page' => $_POST['show_on_main_page'],
				'form' => $_POST['form'],
			);
			
			//Upload icon
			if(isset($_POST['main_image_url'])){
				$_REQUEST['fake'] = 1;
				$_REQUEST['selected_section'] = 'images';
				$_REQUEST['page_id'] = $_REQUEST['page_id'];
				$_REQUEST['page_data'] = array();
				$_REQUEST['result_ids'] = '';

				$_REQUEST['page_image_main_image_data'][0] = array(
					'pair_id' => '',
					'type' => 'M',
					'object_id' => 0,
					'image_alt' => '',
					'detailed_alt' => ''
				);
				$_REQUEST['file_page_image_main_image_icon'][0] = 'page_image_main';
				$_REQUEST['type_page_image_main_image_icon'][0] = 'local';
				$_REQUEST['file_page_image_main_image_detailed'][0] = $_POST['main_image_url'];
				$_REQUEST['type_page_image_main_image_detailed'][0] = 'url';
			}
			
			fn_update_page($data, $_REQUEST['external_page_id']);
			$external_page_id = $_REQUEST['external_page_id'];
			$lang = 'en';
			
			$data['form']['elements_data'] = $data['form']['elements'];
			unset($data['form']['elements']);
			foreach($data['form']['elements_data'] as $key => $element){
				unset($data['form']['elements_data'][$key]['element_id']);
				if(isset($element['variants'])){
					foreach($element['variants'] as $key2 => $variant){
						unset($data['form']['elements_data'][$key]['variants'][$key2]['element_id']);
					}
				}
			}
			
			
			fn_form_builder_update_page_post($data, $external_page_id, $lang);
			die('Saved');
		}else{
			die('Page no found');
		}
		
		
		exit;
		
		die('END');
	}
	
    return;
}

function fn_find_and_download_images($text){
	preg_match_all('/<img.*?src\s*=\s*("|\')(.*?)("|\')/ius', $text, $result);
	if(isset($result[2])){
		foreach($result[2] as $src){
			$src = trim($src);
			if(!empty($src)){
				$path = pathinfo($src);
				if(!preg_match('/https*:\/\//', $path['dirname'])){
					$path['dirname'] = 'https://dev.enlightensauna.com'.$path['dirname'];
				}
				$full_path = $path['dirname']."/".$path['basename'];
				$ext = stristr($path['extension'],'?',true);
				$filename = '/images/copied_images/'.$path['filename'].rand(1,1000).'.'.$ext;
				file_put_contents($_SERVER['DOCUMENT_ROOT'].$filename, file_get_contents($full_path));
				$text = str_replace($src, $filename, $text);
			}
		}
	}
	return $text;
}

//
// View page details
//
if ($mode == 'view') {

    $_REQUEST['page_id'] = empty($_REQUEST['page_id']) ? 0 : $_REQUEST['page_id'];
    $preview = fn_is_preview_action($auth, $_REQUEST);
    $page = fn_get_page_data($_REQUEST['page_id'], CART_LANGUAGE, $preview);

    if (empty($page) || ($page['status'] == 'D' && !$preview)) {
        return array(CONTROLLER_STATUS_NO_PAGE);
    }

    if (!empty($page['meta_description']) || !empty($page['meta_keywords'])) {
        Tygh::$app['view']->assign('meta_description', $page['meta_description']);
        Tygh::$app['view']->assign('meta_keywords', $page['meta_keywords']);
    }

    // If page title for this page is exist than assign it to template
    if (!empty($page['page_title'])) {
        Tygh::$app['view']->assign('page_title', $page['page_title']);
    }

    $parent_ids = explode('/', $page['id_path']);
    foreach ($parent_ids as $p_id) {
        $_page = fn_get_page_data($p_id);
        fn_add_breadcrumb($_page['page'], ($p_id == $page['page_id']) ? '' : ($_page['page_type'] == PAGE_TYPE_LINK && !empty($_page['link']) ? $_page['link'] : "pages.view?page_id=$p_id"));
    }
	if(count($page['main_pair']) && @$page['main_pair']['detailed']['image_path'] != ''){
		$og_image = $page['main_pair']['detailed']['image_path'];
		$og_image = preg_replace('/\?.*/', '', $og_image);
		$og_image_alt = $page['main_pair']['detailed']['alt'];
		Tygh::$app['view']->assign('og_image', $og_image);
		Tygh::$app['view']->assign('og_image_alt', $og_image_alt);
	}

    Tygh::$app['view']->assign('page', $page);
}
