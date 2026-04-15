<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 13:33:23
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/backend/mail/templates/addons/form_builder/form_subj.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2122226384687e1773f34664-37491971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f5a5a725d04093137dd1742660fd4527f8f723' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/backend/mail/templates/addons/form_builder/form_subj.tpl',
      1 => 1752993439,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '2122226384687e1773f34664-37491971',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'form_title' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687e17740586b8_03430592',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687e17740586b8_03430592')) {function content_687e17740586b8_03430592($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['form_title']->value, ENT_QUOTES, 'UTF-8');
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/form_builder/form_subj.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/form_builder/form_subj.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['form_title']->value, ENT_QUOTES, 'UTF-8');
}?><?php }} ?>
