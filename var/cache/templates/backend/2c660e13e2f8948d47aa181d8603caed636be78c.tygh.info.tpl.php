<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:20:18
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/backend/templates/addons/call_requests/settings/info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1658928324687df842ec0839-73153872%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c660e13e2f8948d47aa181d8603caed636be78c' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/backend/templates/addons/call_requests/settings/info.tpl',
      1 => 1752993412,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1658928324687df842ec0839-73153872',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df842ef2567_00585915',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df842ef2567_00585915')) {function content_687df842ef2567_00585915($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('call_requests.phone_from_settings'));
?>
<div class="control-group setting-wide call_requests">

    <label for="addon_option_call_requests_phone" class="control-label "><?php echo $_smarty_tpl->__("call_requests.phone_from_settings");?>
:</label>

    <div class="controls">
        <p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value['Company']['company_phone'], ENT_QUOTES, 'UTF-8');?>
</p>
    </div>

</div><?php }} ?>
