<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:18:55
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/mail/templates/profiles/recover_password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1967933887687df7ef3db862-44419451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2c0e1a040c846197069f4c97c8aeb7d27d95f4a' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/mail/templates/profiles/recover_password.tpl',
      1 => 1752993156,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1967933887687df7ef3db862-44419451',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ekey' => 0,
    'zone' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df7ef3e2515_77231592',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df7ef3e2515_77231592')) {function content_687df7ef3e2515_77231592($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('text_confirm_passwd_recovery'));
?>
<?php echo $_smarty_tpl->getSubTemplate ("common/letter_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->__("text_confirm_passwd_recovery");?>
:<br /><br />

<a href="<?php echo htmlspecialchars(fn_url("auth.recover_password?ekey=".((string)$_smarty_tpl->tpl_vars['ekey']->value),$_smarty_tpl->tpl_vars['zone']->value,'http'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(fn_url("auth.recover_password?ekey=".((string)$_smarty_tpl->tpl_vars['ekey']->value),$_smarty_tpl->tpl_vars['zone']->value,'http'), ENT_QUOTES, 'UTF-8');?>
</a>

<?php echo $_smarty_tpl->getSubTemplate ("common/letter_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
