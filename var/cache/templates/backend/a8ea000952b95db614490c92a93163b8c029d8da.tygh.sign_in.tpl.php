<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:11:09
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/backend/templates/buttons/sign_in.tpl" */ ?>
<?php /*%%SmartyHeaderCode:513649845687df61d879a68-88506974%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8ea000952b95db614490c92a93163b8c029d8da' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/backend/templates/buttons/sign_in.tpl',
      1 => 1752993306,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '513649845687df61d879a68-88506974',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'but_onclick' => 0,
    'but_href' => 0,
    'but_role' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df61d87aae2_08694597',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df61d87aae2_08694597')) {function content_687df61d87aae2_08694597($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('sign_in'));
?>
<?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>__("sign_in"),'but_onclick'=>$_smarty_tpl->tpl_vars['but_onclick']->value,'but_href'=>$_smarty_tpl->tpl_vars['but_href']->value,'but_arrow'=>"on",'but_role'=>$_smarty_tpl->tpl_vars['but_role']->value), 0);?>
<?php }} ?>
