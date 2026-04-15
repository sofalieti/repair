<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:11:28
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/my_changes/hooks/index/meta.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2090504318687df630173c43-75346703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1830f97b6dd52f02d59bad9f305bc0164579c342' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/my_changes/hooks/index/meta.post.tpl',
      1 => 1752993052,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '2090504318687df630173c43-75346703',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'og_image' => 0,
    'og_image_t' => 0,
    'is_size' => 0,
    'og_image_alt' => 0,
    'meta_description' => 0,
    'location_data' => 0,
    'og_url' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df6301818c5_08895138',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df6301818c5_08895138')) {function content_687df6301818c5_08895138($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><meta property="og:title" content="<?php echo trim(preg_replace('!\s+!u', ' ',Smarty::$_smarty_vars['capture']['page_title']));?>
" />
<meta property="og:type" content="website" />

<?php $_smarty_tpl->tpl_vars['og_image_t'] = new Smarty_variable("https://enlightensauna.com/images/companies/1/features/EnlightenSaunasLogo.jpg", null, 0);?>
<?php $_smarty_tpl->tpl_vars['is_size'] = new Smarty_variable(false, null, 0);?>

<?php if (isset($_smarty_tpl->tpl_vars['og_image']->value)) {?>
<?php $_smarty_tpl->tpl_vars['og_image_t'] = new Smarty_variable($_smarty_tpl->tpl_vars['og_image']->value, null, 0);?>
<?php $_smarty_tpl->tpl_vars['is_size'] = new Smarty_variable(true, null, 0);?>
<?php }?>
<meta property="og:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['og_image_t']->value, ENT_QUOTES, 'UTF-8');?>
" />

<?php if ($_smarty_tpl->tpl_vars['is_size']->value) {?>
<meta property="og:image:width" content="200" />
<meta property="og:image:height" content="200" />
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['og_image_alt']->value)) {?>
	<?php if (!empty($_smarty_tpl->tpl_vars['og_image_alt']->value)) {?>
		<meta property="og:image:alt" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['og_image_alt']->value, ENT_QUOTES, 'UTF-8');?>
" />
	<?php }?>
<?php } else { ?>
<meta property="og:image:alt" content="Enlighten outdoor infrared sauna" />
<?php }?>

<meta property="og:description" content="<?php echo htmlspecialchars((($tmp = @html_entity_decode($_smarty_tpl->tpl_vars['meta_description']->value,@constant('ENT_COMPAT'),"UTF-8"))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['location_data']->value['meta_description'] : $tmp), ENT_QUOTES, 'UTF-8');?>
">

<?php $_smarty_tpl->tpl_vars['og_url'] = new Smarty_variable("https://".((string)$_SERVER['HTTP_HOST']).((string)$_SERVER['REQUEST_URI']), null, 0);?>

<meta property="og:url" content="<?php echo htmlspecialchars(strtok($_smarty_tpl->tpl_vars['og_url']->value,"?"), ENT_QUOTES, 'UTF-8');?>
" /><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/my_changes/hooks/index/meta.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/my_changes/hooks/index/meta.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><meta property="og:title" content="<?php echo trim(preg_replace('!\s+!u', ' ',Smarty::$_smarty_vars['capture']['page_title']));?>
" />
<meta property="og:type" content="website" />

<?php $_smarty_tpl->tpl_vars['og_image_t'] = new Smarty_variable("https://enlightensauna.com/images/companies/1/features/EnlightenSaunasLogo.jpg", null, 0);?>
<?php $_smarty_tpl->tpl_vars['is_size'] = new Smarty_variable(false, null, 0);?>

<?php if (isset($_smarty_tpl->tpl_vars['og_image']->value)) {?>
<?php $_smarty_tpl->tpl_vars['og_image_t'] = new Smarty_variable($_smarty_tpl->tpl_vars['og_image']->value, null, 0);?>
<?php $_smarty_tpl->tpl_vars['is_size'] = new Smarty_variable(true, null, 0);?>
<?php }?>
<meta property="og:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['og_image_t']->value, ENT_QUOTES, 'UTF-8');?>
" />

<?php if ($_smarty_tpl->tpl_vars['is_size']->value) {?>
<meta property="og:image:width" content="200" />
<meta property="og:image:height" content="200" />
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['og_image_alt']->value)) {?>
	<?php if (!empty($_smarty_tpl->tpl_vars['og_image_alt']->value)) {?>
		<meta property="og:image:alt" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['og_image_alt']->value, ENT_QUOTES, 'UTF-8');?>
" />
	<?php }?>
<?php } else { ?>
<meta property="og:image:alt" content="Enlighten outdoor infrared sauna" />
<?php }?>

<meta property="og:description" content="<?php echo htmlspecialchars((($tmp = @html_entity_decode($_smarty_tpl->tpl_vars['meta_description']->value,@constant('ENT_COMPAT'),"UTF-8"))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['location_data']->value['meta_description'] : $tmp), ENT_QUOTES, 'UTF-8');?>
">

<?php $_smarty_tpl->tpl_vars['og_url'] = new Smarty_variable("https://".((string)$_SERVER['HTTP_HOST']).((string)$_SERVER['REQUEST_URI']), null, 0);?>

<meta property="og:url" content="<?php echo htmlspecialchars(strtok($_smarty_tpl->tpl_vars['og_url']->value,"?"), ENT_QUOTES, 'UTF-8');?>
" /><?php }?><?php }} ?>
