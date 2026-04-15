<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:11:28
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/blocks/static_templates/banner_with_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:454076665687df63068c6b7-45373197%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d314d8945ec5205605dd6cf2d9d5d1d3107dd7d' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/blocks/static_templates/banner_with_form.tpl',
      1 => 1752993037,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '454076665687df63068c6b7-45373197',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df63068ff94_34367252',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df63068ff94_34367252')) {function content_687df63068ff94_34367252($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div class="row">
    <div class="col-md-11">
        <?php echo $_smarty_tpl->getSubTemplate ("addons/form_as_block/form_block.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('page_id'=>229), 0);?>

    </div> 
</div><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="blocks/static_templates/banner_with_form.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/static_templates/banner_with_form.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><div class="row">
    <div class="col-md-11">
        <?php echo $_smarty_tpl->getSubTemplate ("addons/form_as_block/form_block.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('page_id'=>229), 0);?>

    </div> 
</div><?php }?><?php }} ?>
