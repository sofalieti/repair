<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:18:52
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/backend/templates/views/auth/recover_password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55554656687df7ec0941a3-06260764%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62470446585521d2c5f351e2570f9b7d16858bf4' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/backend/templates/views/auth/recover_password.tpl',
      1 => 1752993350,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '55554656687df7ec0941a3-06260764',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df7ec0bfcc8_39366896',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df7ec0bfcc8_39366896')) {function content_687df7ec0bfcc8_39366896($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/modifier.truncate.php';
?><?php
fn_preload_lang_vars(array('recover_password','text_recover_password_notice','email','reset_password'));
?>
<div class="modal signin-modal">
    <form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="recover_form" class=" cm-skip-check-items cm-check-changes">
        <div class="modal-header">
            <h4><a href="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(smarty_modifier_truncate($_smarty_tpl->tpl_vars['settings']->value['Company']['company_name'],40,'...',true), ENT_QUOTES, 'UTF-8');?>
</a></h4>
            <span><?php echo $_smarty_tpl->__("recover_password");?>
</span>
        </div>
        <div class="modal-body">
            <p><?php echo $_smarty_tpl->__("text_recover_password_notice");?>
</p>
            <label for="user_login"><?php echo $_smarty_tpl->__("email");?>
:</label>
            <input type="text" name="user_email" id="user_login" size="20" value="">
        </div>
        <div class="modal-footer">
            <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("reset_password"),'but_name'=>"dispatch[auth.recover_password]",'but_role'=>"button_main"), 0);?>

        </div>
    </form>
</div><?php }} ?>
