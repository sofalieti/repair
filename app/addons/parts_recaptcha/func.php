<?php

use Tygh\Storage;
use Tygh\Tools\SecurityHelper;
use Tygh\Registry;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

function fn_parts_recaptcha_captcha_validate() {
    $privatekey = "6LcnCLoUAAAAACiF380EU-wukRYTyscZ7z-OfHXQ";
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = @$_POST["g-recaptcha-response"];
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$privatekey."&response=".$captcha."&remoteip=".$ip);	
    $responseKeys = json_decode($response, true);
    if(json_encode($responseKeys['success']) !== 'true'){
        return false;
    }
    return true;
}
