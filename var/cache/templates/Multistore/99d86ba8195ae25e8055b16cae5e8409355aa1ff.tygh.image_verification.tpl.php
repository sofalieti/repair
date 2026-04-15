<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:11:28
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/parts_recaptcha/overrides/common/image_verification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:368507764687df6305b8920-93837796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99d86ba8195ae25e8055b16cae5e8409355aa1ff' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/parts_recaptcha/overrides/common/image_verification.tpl',
      1 => 1752993086,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '368507764687df6305b8920-93837796',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'option' => 0,
    'page' => 0,
    'captcha_id' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df6305be1e9_46410199',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df6305be1e9_46410199')) {function content_687df6305be1e9_46410199($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
$_smarty_tpl->tpl_vars['captcha_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['option']->value, null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['option']->value=='form_builder') {?>
    <?php $_smarty_tpl->tpl_vars['captcha_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['page']->value['page_id'], null, 0);?>
<?php }?>
<div id="gcaptcha<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['captcha_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="g-recaptcha"></div><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/parts_recaptcha/overrides/common/image_verification.tpl" id="<?php echo smarty_function_set_id(array('name'=>"/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/parts_recaptcha/overrides/common/image_verification.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
$_smarty_tpl->tpl_vars['captcha_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['option']->value, null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['option']->value=='form_builder') {?>
    <?php $_smarty_tpl->tpl_vars['captcha_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['page']->value['page_id'], null, 0);?>
<?php }?>
<div id="gcaptcha<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['captcha_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="g-recaptcha"></div><?php }?><?php }} ?>
