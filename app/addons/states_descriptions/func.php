<?php	 		 		 	 	 	 		 	
/***************************************************************************
*                                                                          *
*   (c) 2017 Max Onishchuk                                                 *
*                                                                          *
****************************************************************************/

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

function fn_get_state($state_id, $lang_code = CART_LANGUAGE)
{
    $fields = array(
        'a.state_id',
		'a.url',
        'a.country_code',
        'a.code',
        'a.status',
        'b.state',
        'c.country',
		'b.description1',
		'b.description2'
    );

    $condition = '1';

    $state = db_get_row(
        "SELECT " . implode(', ', $fields) . " FROM ?:states as a " .
        "LEFT JOIN ?:state_descriptions as b ON b.state_id = a.state_id AND b.lang_code = ?s " .
        "LEFT JOIN ?:country_descriptions as c ON c.code = a.country_code AND c.lang_code = ?s " .
        "WHERE a.state_id = ?i",
    $lang_code, $lang_code, $state_id);

    return $state;
}

function fn_get_state_by_url($url, $lang_code = CART_LANGUAGE)
{
    $fields = array(
        'a.state_id',
        'a.country_code',
        'a.code',
        'a.status',
        'b.state',
        'c.country',
		'b.description1',
		'b.description2'
    );

    $condition = '1';

    $state = db_get_row(
        "SELECT " . implode(', ', $fields) . " FROM ?:states as a " .
        "LEFT JOIN ?:state_descriptions as b ON b.state_id = a.state_id AND b.lang_code = ?s " .
        "LEFT JOIN ?:country_descriptions as c ON c.code = a.country_code AND c.lang_code = ?s " .
        "WHERE a.url = ?s",
    $lang_code, $lang_code, $url);

    return $state;
}
function fn_format_uri( $string, $separator = '-' )
{
    $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
    $special_cases = array( '&' => 'and', "'" => '');
    $string = mb_strtolower( trim( $string ), 'UTF-8' );
    $string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
    $string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
    $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
    $string = preg_replace("/[$separator]+/u", "$separator", $string);
    return $string;
}

?>
