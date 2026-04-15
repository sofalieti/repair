<?php	 		 		 	 	 	 		 	

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

function fn_form_as_block_send_form($page_data, $form_values, $result, $from, $sender, $attachments, $is_html){
	if(isset($_REQUEST['fb_ajax']) && $_REQUEST['fb_ajax'] == 1){
		$text = trim(strip_tags($page_data['form']['general']['L']));
		if(empty($text)) $text = 'Congratulations! Thank you for your interest one of our sales representatives will contact you shortly..';
		fn_set_notification('N', __('notice'), $text);
	}
}

?>
