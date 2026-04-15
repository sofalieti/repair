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

if (!defined('BOOTSTRAP')) { die('Access denied'); }

use Tygh\Session;
use Tygh\Registry;

$secret = Registry::get('addons.google_recaptcha.secretkey');

if (!empty($secret)) {
    $reCaptcha = new ReCaptcha($secret);
    if (!empty($_REQUEST['g-recaptcha-response'])) {
        $resp = $reCaptcha->verifyResponse(
            $_SERVER['REMOTE_ADDR'],
            $_REQUEST['g-recaptcha-response']
        );
        if ($resp != null && $resp->success) {
            $_SESSION['image_verification_ok'] = true;
        }
    }    
}
