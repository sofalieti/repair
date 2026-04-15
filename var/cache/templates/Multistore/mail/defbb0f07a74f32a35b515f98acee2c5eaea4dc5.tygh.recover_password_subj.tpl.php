<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:18:55
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/mail/templates/profiles/recover_password_subj.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1479499170687df7ef3ae169-59706226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'defbb0f07a74f32a35b515f98acee2c5eaea4dc5' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/mail/templates/profiles/recover_password_subj.tpl',
      1 => 1752993155,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1479499170687df7ef3ae169-59706226',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df7ef3d2863_07819406',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df7ef3d2863_07819406')) {function content_687df7ef3d2863_07819406($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('recover_password_subj'));
?>
<?php echo $_smarty_tpl->tpl_vars['company_data']->value['company_name'];?>
: <?php echo $_smarty_tpl->__("recover_password_subj");?>
<?php }} ?>
