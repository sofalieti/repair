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
use Tygh\Mailer;
use Tygh\BlockManager\Block;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

$_REQUEST['promotion_id'] = empty($_REQUEST['promotion_id']) ? 0 : $_REQUEST['promotion_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    fn_trusted_vars('promotion_data', 'promotions', 'promotion_bonus');
    $suffix = '';

    //
    // Update promotion
    //
    if ($mode == 'update') {
        if (fn_allowed_for('ULTIMATE') && Registry::get('runtime.company_id')) {
            if (!empty($_REQUEST['promotion_id']) && !fn_check_company_id('promotions', 'promotion_id', $_REQUEST['promotion_id'])) {
                fn_company_access_denied_notification();

                return array(CONTROLLER_STATUS_OK, 'promotions.update?promotion_id=' . $_REQUEST['promotion_id']);
            }
            if (!empty($_REQUEST['promotion_id'])) {
                unset($_REQUEST['promotion_data']['company_id']);
            }
        }

        $promotion_id = fn_update_promotion($_REQUEST['promotion_data'], $_REQUEST['promotion_id'], DESCR_SL);

        $suffix = ".update?promotion_id=$promotion_id";
    }

    //
    // Delete selected promotions
    //
    if ($mode == 'm_delete') {

        if (!empty($_REQUEST['promotion_ids'])) {
            fn_delete_promotions($_REQUEST['promotion_ids']);
        }

        $suffix = ".manage";
    }

    if($mode == 'update_user_bonus' && isset($_REQUEST['promotion_bonus'])){
		$promotion = db_get_row('SELECT * FROM ?:promotions WHERE user_id = ?i',$_REQUEST['promotion_bonus']['user_id']);
		if($promotion){
			$promotion_id = $promotion['promotion_id'];
			$bonuses = unserialize($promotion['bonuses']);
			foreach($bonuses as $key => $bonuse){
				if($bonuse['bonus'] == 'order_discount' && $bonuse['discount_bonus'] == 'by_percentage'){
					$bonuses[$key]['discount_value'] = $_REQUEST['promotion_bonus']['bonus'];
				}
			}
			$bonuses = serialize($bonuses);
			$from_date = 0;
			$to_date = 0;
			if($_REQUEST['promotion_bonus']['days'] != 0){
				$from_date = strtotime('today');
				$to_date = $from_date + $_REQUEST['promotion_bonus']['days']*24*60*60;				
			}
			db_query('UPDATE ?:promotions SET bonuses = ?s, from_date = ?i, to_date = ?i WHERE promotion_id = ?i',$bonuses,$from_date,$to_date,$promotion_id);
			$user_name = db_get_field('SELECT name FROM ?:promotion_users WHERE id = ?i',$_REQUEST['promotion_bonus']['user_id']);
			db_query('UPDATE ?:promotion_descriptions SET name = ?s WHERE promotion_id = ?i',"$user_name - {$_REQUEST['promotion_bonus']['bonus']}%",$promotion_id);
		}else{
			die('Promotion not found');
		}
		return array(CONTROLLER_STATUS_OK, "promotions.users");
	}

	return array(CONTROLLER_STATUS_OK, "promotions$suffix");

    return array(CONTROLLER_STATUS_OK, "promotions$suffix");
}

// ----------------------------- GET routines -------------------------------------------------

// promotion data
if ($mode == 'update') {

    Registry::set('navigation.tabs', array (
        'details' => array (
            'title' => __('general'),
            'href' => "promotions.update?promotion_id=$_REQUEST[promotion_id]&selected_section=details",
            'js' => true
        ),
        'conditions' => array (
            'title' => __('conditions'),
            'href' => "promotions.update?promotion_id=$_REQUEST[promotion_id]&selected_section=conditions",
            'js' => true
        ),
        'bonuses' => array (
            'title' => __('bonuses'),
            'href' => "promotions.update?promotion_id=$_REQUEST[promotion_id]&selected_section=bonuses",
            'js' => true
        ),
    ));

    $promotion_data = fn_get_promotion_data($_REQUEST['promotion_id']);

    if (empty($promotion_data)) {
        return array(CONTROLLER_STATUS_NO_PAGE);
    }

    Registry::get('view')->assign('promotion_data', $promotion_data);

    Registry::get('view')->assign('zone', $promotion_data['zone']);
    Registry::get('view')->assign('schema', fn_promotion_get_schema());

    if (fn_allowed_for('ULTIMATE') && !Registry::get('runtime.company_id')) {
        Registry::get('view')->assign('picker_selected_companies', fn_ult_get_controller_shared_companies($_REQUEST['promotion_id']));
    }

// Add promotion
} elseif ($mode == 'add') {

    $zone = !empty($_REQUEST['zone']) ? $_REQUEST['zone'] : 'catalog';

    if (fn_allowed_for('ULTIMATE:FREE') && $zone == 'cart') {
        return array(CONTROLLER_STATUS_NO_PAGE);
    }

    Registry::set('navigation.tabs', array (
        'details' => array (
            'title' => __('general'),
            'href' => "promotions.add?selected_section=details",
            'js' => true
        ),
        'conditions' => array (
            'title' => __('conditions'),
            'href' => "promotions.add?selected_section=conditions",
            'js' => true
        ),
        'bonuses' => array (
            'title' => __('bonuses'),
            'href' => "promotions.add?selected_section=bonuses",
            'js' => true
        ),
    ));

    Registry::get('view')->assign('zone', $zone);
    Registry::get('view')->assign('schema', fn_promotion_get_schema());

} elseif ($mode == 'dynamic') {
    Registry::get('view')->assign('schema', fn_promotion_get_schema());
    Registry::get('view')->assign('prefix', $_REQUEST['prefix']);
    Registry::get('view')->assign('elm_id', $_REQUEST['elm_id']);

    if (!empty($_REQUEST['zone'])) {
        Registry::get('view')->assign('zone', $_REQUEST['zone']);
    }

    if (!empty($_REQUEST['condition'])) {
        Registry::get('view')->assign('condition_data', array('condition' => $_REQUEST['condition']));

    } elseif (!empty($_REQUEST['bonus'])) {
        Registry::get('view')->assign('bonus_data', array('bonus' => $_REQUEST['bonus']));
    }

    if (fn_allowed_for('ULTIMATE') && !Registry::get('runtime.company_id')) {
        Registry::get('view')->assign('picker_selected_companies', fn_ult_get_controller_shared_companies($_REQUEST['promotion_id'], 'promotions', 'update'));
    }

// promotions list
} elseif ($mode == 'manage') {

    list($promotions, $search) = fn_get_promotions($_REQUEST, Registry::get('settings.Appearance.admin_elements_per_page'), DESCR_SL);

    Registry::get('view')->assign('search', $search);
    Registry::get('view')->assign('promotions', $promotions);

// Delete selected promotions
} elseif ($mode == 'delete') {

    if (!empty($_REQUEST['promotion_id'])) {
        fn_delete_promotions($_REQUEST['promotion_id']);
    }

    return array(CONTROLLER_STATUS_REDIRECT, "promotions.manage");
}elseif($mode == 'users'){
	//list($users, $search) = fn_get_promotions($_REQUEST, Registry::get('settings.Appearance.admin_elements_per_page'), DESCR_SL);
	$_REQUEST = array (
		'total_items' => db_get_field("SELECT COUNT(*) FROM ?:promotion_users"),
		'page' => isset($_REQUEST['page']) ? $_REQUEST['page'] : 1,
		'items_per_page' => Registry::get('settings.Appearance.admin_elements_per_page')
	    );
	$limit = db_paginate($_REQUEST['page'], $_REQUEST['items_per_page'], $_REQUEST['total_items']);

	$users_info = db_get_array('SELECT * FROM ?:promotion_users ORDER BY created_at DESC '.$limit);
	foreach($users_info as $key => $user){
			$percent = db_get_row("SELECT bonuses, conditions, status,to_date,from_date FROM ?:promotions WHERE user_id = '".$users_info[$key]['id']."'");
			if($percent)
			{
				$users_info[$key]['status'] = $percent['status'];
				$bonuses = unserialize($percent['bonuses']);
				foreach ($bonuses as $k=>$user_bonuse)
				{
					$users_info[$key]['percent'] = $user_bonuse['discount_value'];		
				} 
				$coupons = unserialize($percent['conditions']);	
				foreach ($coupons['conditions'] as $k2=>$user_condition)
				{	
					$users_info[$key]['user_coupon'] = $user_condition['value'];
				}
				$users_info[$key]['to_date'] = $percent['to_date'];
				$users_info[$key]['from_date'] = $percent['from_date'];
			}
	}
	Registry::get('view')->assign('users_info', $users_info);
	Registry::get('view')->assign('search', $_REQUEST);
}elseif($mode == 'user_delete'){
	if(!empty($_REQUEST['user_id'])){
		db_query("DELETE FROM ?:promotion_users WHERE id='".$_REQUEST['user_id']."'");
	}

	fn_set_notification('W', fn_get_lang_var('User is deleted'), $msg);
	return array(CONTROLLER_STATUS_REDIRECT, "promotions.users");
}elseif($mode == 'user_discount'){
	
	if(!empty($_REQUEST['user_id']) && !empty($_REQUEST['discount'])){
	// check for coupon user
		$user = db_get_row("SELECT user_id FROM ?:promotions WHERE user_id = '".$_REQUEST['user_id']."'");
		
		if(!$user)
		{			
			$coupon_code = rand(100000, 900000);
			$conditions_hash = 'coupon_code='.$coupon_code;
			$condition = array('set' => 'all', 'set_value' => 1, 'conditions' => array('1'=>array('operator' => 'eq', 'condition' => 'coupon_code', 'value' => $coupon_code)));
			$condition_user = serialize($condition);
			
			$user_name = db_get_row("SELECT name, email FROM ?:promotion_users WHERE id = ?i",$_REQUEST['user_id']);
		
			$msg = "Hello {$user_name['name']},<br/><br/>

Thank you for taking the time to request a coupon from OutdoorInfraredSaunas.
Enter the coupon code '$coupon_code' during your checkout. A {$_REQUEST['discount']}% off rebate will be
applied to your total checkout price (excluding shipping/handling). Please
let us know if you have any further questions about your infrared sauna or
our parts selection by replying to this email. We will be happy to help with
any questions you may have along with leaving you as a satisfied infrared
sauna owner.<br/><br/>

Sincerely,<br>
OutdoorInfraredSaunas Staff<br>
855-551-GURU(4878)";
		
			$discount = array('1'=>array('bonus' => 'order_discount', 'discount_bonus' => 'by_percentage', 'discount_value' => $_REQUEST['discount']));
			$discount_user = serialize($discount);
			$id = db_query("INSERT INTO ?:promotions (conditions, bonuses, conditions_hash, user_id) VALUES ('".$condition_user."', '".$discount_user."', '".$conditions_hash."', '".$_REQUEST['user_id']."')");
			db_query("UPDATE ?:promotions SET zone='cart' WHERE user_id = '".$_REQUEST['user_id']."'");
			
			$name = $user_name['name']." - ".$_REQUEST['discount']."%";
		
			foreach(db_get_fields('SELECT country_code FROM ?:languages WHERE status = ?s', 'A') as $lang_code){
				db_query("INSERT INTO ?:promotion_descriptions (promotion_id, name, lang_code) VALUES (?i,?s,?s)",$id,$name,$lang_code);
			}			

			Mailer::sendMail(array(
				'to' => $user_name['email'],
				'from' => 'company_orders_department',
				'body' => $msg,
				'subj' => 'Your coupon code',
				'data' => array('result' => 'Your coupon code')
			));
			fn_set_notification('N', fn_get_lang_var('Bonus is created'), $msg);
			return array(CONTROLLER_STATUS_REDIRECT, "promotions.users");
		}
		else{
			fn_set_notification('E', fn_get_lang_var('Error, user exist'), $msg);
			return array(CONTROLLER_STATUS_REDIRECT, "promotions.users");
		}
	}
	
}elseif($mode == "resend_bonus" && isset($_REQUEST['user_id'])){
	$promotion = db_get_row('SELECT * FROM ?:promotions WHERE user_id = ?i',$_REQUEST['user_id']);
	if($promotion){
		$conditions = unserialize($promotion['conditions']);
		$code = '';
		foreach ($conditions['conditions'] as $condition)
		{	
			$code = $condition['value'];
		}
		$bonuses = unserialize($promotion['bonuses']);
		$percent = '';
		foreach ($bonuses as $k=>$user_bonuse)
		{
			$percent = $user_bonuse['discount_value'];		
		} 
		$user = db_get_row("SELECT name, email FROM ?:promotion_users WHERE id = ?i",$_REQUEST['user_id']);
		if(!empty($percent) && !empty($code)){

			$msg = "Hello {$user['name']},<br/><br/>

Thank you for taking the time to request a coupon from InfraredSaunaGuru.
Enter the coupon code '$code' during your checkout. A {$percent}% off rebate will be
applied to your total checkout price (excluding shipping/handling). Please
let us know if you have any further questions about your infrared sauna or
our parts selection by replying to this email. We will be happy to help with
any questions you may have along with leaving you as a satisfied infrared
sauna owner.<br/><br/>

Sincerely,<br>
InfraredSaunaGuru Staff<br>
855-551-GURU(4878)";

			
			Mailer::sendMail(array(
				'to' => $user['email'],
				'from' => 'company_orders_department',
				'body' => $msg,
				'subj' => 'Your coupon code',
				'data' => array('result' => 'Your coupon code')
			));
			fn_set_notification('N', fn_get_lang_var('Bonus is updates'), $msg);			
		}else{
			fn_set_notification('E', fn_get_lang_var('error'), 'Percent or code empty');
		}
	}else{
		fn_set_notification('E', fn_get_lang_var('error'), 'Promotion not found');
	}
	return array(CONTROLLER_STATUS_REDIRECT, "promotions.users");

}elseif($mode = 'get_indoor_promotions'){
	
	//Block
	$block = file_get_contents('https://indoorinfraredsauna.com/index.php?dispatch=promotions.load_main_banner_data&secret12314');
	$block = json_decode($block, true);
	if(count($block)){
		$block_content_data = serialize($block['content']);
		db_query('UPDATE ?:bm_blocks_content SET content = ?s WHERE block_id = ?i', $block_content_data, 350);
		fn_set_notification('N', "Banner data saved");
	}
	
	//Promotions
	$promotions = file_get_contents('https://indoorinfraredsauna.com/index.php?dispatch=promotions.load_promotions_list&secret12314');
	$promotions = json_decode($promotions, true);
	
	$msg = '';
	$i = 0;
	foreach($promotions as $p){
		if($p['status'] == 'A'){
			$promotion_id = db_get_field('SELECT ?:promotion_descriptions.promotion_id FROM ?:promotion_descriptions 
			LEFT JOIN ?:promotions ON ?:promotions.promotion_id = ?:promotion_descriptions.promotion_id
			WHERE ?:promotion_descriptions.name = ?s AND ?:promotions.status = ?s', $p['name'], 'A');
			if($promotion_id){
				$msg .= "#{$promotion_id} {$p['name']} updated, ";
				db_query('UPDATE ?:promotions SET bonuses = ?s WHERE promotion_id = ?i', $p['bonuses'], $promotion_id);
				$i++;
			}
		}
	}
	fn_log_event('requests', 'http', array(
		'url' => fn_url('promotions.get_indoor_promotions'),
		'data' => '',
		'response' => "Updated $i items. ".$msg,
	));
	fn_set_notification('N', "Updated $i items.", "<a href='".fn_url('logs.manage')."'>Logs</a>");
	return array(CONTROLLER_STATUS_REDIRECT, "promotions.manage");
}

function fn_update_promotion($data, $promotion_id, $lang_code = DESCR_SL)
{
    if (!empty($data['conditions']['conditions'])) {
        $data['conditions_hash'] = fn_promotion_serialize($data['conditions']['conditions']);
        $data['users_conditions_hash'] = fn_promotion_serialize_users_conditions($data['conditions']['conditions']);
    } else {
        $data['conditions_hash'] = $data['users_conditions_hash'] = '';
    }

    $data['conditions'] = empty($data['conditions']) ? array() : $data['conditions'];
    $data['bonuses'] = empty($data['bonuses']) ? array() : $data['bonuses'];

    fn_promotions_check_group_conditions($data['conditions']);

    if ($data['bonuses']) {
        foreach ($data['bonuses'] as $k => $v) {
            if (empty($v['bonus'])) {
                unset($data['bonuses'][$k]);
            }
        }
    }

    $data['conditions'] = serialize($data['conditions']);
    $data['bonuses'] = serialize($data['bonuses']);

    $from_date = $data['from_date'];
    $to_date = $data['to_date'];

    $data['from_date'] = !empty($from_date) ? fn_parse_date($from_date) : 0;
    $data['to_date'] = !empty($to_date) ? fn_parse_date($to_date, true) : 0;

    if (!empty($data['to_date']) && $data['to_date'] < $data['from_date']) { // protection from incorrect date range (special for isergi :))
        $data['from_date'] = fn_parse_date($to_date);
        $data['to_date'] = fn_parse_date($from_date, true);
    }

    if (!empty($promotion_id)) {
        db_query("UPDATE ?:promotions SET ?u WHERE promotion_id = ?i", $data, $promotion_id);
        db_query('UPDATE ?:promotion_descriptions SET ?u WHERE promotion_id = ?i AND lang_code = ?s', $data, $promotion_id, $lang_code);
    } else {
        $promotion_id = $data['promotion_id'] = db_query("REPLACE INTO ?:promotions ?e", $data);

        foreach (fn_get_translation_languages() as $data['lang_code'] => $_v) {
            db_query("REPLACE INTO ?:promotion_descriptions ?e", $data);
        }
    }

    return $promotion_id;
}

function fn_promotions_check_group_conditions(&$conditions, $parents = array())
{
    static $schema = array();

    if (empty($schema)) {
        $schema = fn_promotion_get_schema();
    }

    if (!empty($conditions['set'])) {
        if (!empty($conditions['conditions'])) {
            $parents[] = array(
                'set_value' => $conditions['set_value'],
                'set' => $conditions['set']
            );

            fn_promotions_check_group_conditions($conditions['conditions'], $parents);
        }
    } else {
        foreach ($conditions as $k => $c) {
            if (!empty($c['conditions'])) {
                fn_promotions_check_group_conditions($conditions[$k]['conditions'], fn_array_merge($parents, array('set_value' => $c['set_value'], 'set' => $c['set']), false));

                if (!$c['conditions']) {
                    unset($c['conditions']);
                }
            } elseif (empty($c['condition']) || !isset($c['value'])) {
                unset($conditions[$k]);
            } elseif (!empty($schema['conditions'][$c['condition']]['applicability']['group'])) {
                foreach ($parents as $_c) {
                    if ($_c['set_value'] != $schema['conditions'][$c['condition']]['applicability']['group']['set_value']) {

                        fn_set_notification('W', __('warning'), __('warning_promotions_incorrect_condition', array(
                            '[condition]' => __('promotion_cond_' . $c['condition']),
                            '[set_value]' => __($schema['conditions'][$c['condition']]['applicability']['group']['set_value'] == true ? 'true': 'false')
                        )));
                        unset($conditions[$k]);
                    }
                }
            }
        }
    }
}
