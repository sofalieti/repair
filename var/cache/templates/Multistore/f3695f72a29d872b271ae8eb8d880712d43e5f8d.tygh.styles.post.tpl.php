<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:11:28
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/PopupAndSideOut/hooks/index/styles.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1995650700687df6301c18a6-65943286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3695f72a29d872b271ae8eb8d880712d43e5f8d' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/PopupAndSideOut/hooks/index/styles.post.tpl',
      1 => 1752993057,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1995650700687df6301c18a6-65943286',
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
  'unifunc' => 'content_687df6301c4840_95993011',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df6301c4840_95993011')) {function content_687df6301c4840_95993011($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?>
<style type="text/css">
.terms-and-conditions{
	font-size: 12px;
	padding: 10px;
	border: 1px solid #7b7d5c;
	margin-bottom: 10px;
	background: #f2f6ad;
}
.c-empty .terms-and-conditions{
	margin-bottom: 0;
	background: none;
	border: none;
}
.c-empty.c-white .terms-and-conditions{
	color: #FFF;
}
.terms-and-conditions a{
	font-size: 12px;
	color: inherit;
	text-decoration: underline;
	font-family: inherit;
}
.c-mw362 .terms-and-conditions{
	max-width: 362px;
}
.terms-and-conditions-bottom{
	padding: 5px;
    position: fixed;
    bottom: 0;
    background: #FFF;
    z-index: 99;
    font-size: 12px;
    left: 0;
    width: 60%;
	color: #000;
	border: 1px solid #CCC;
	border-left: none;
	border-bottom: none;
	padding-right: 30px;
}
.terms-and-conditions-bottom a{
	font-size: inherit;
	color: inherit;
	text-decoration: underline;
	font-family: inherit;
}
.terms-and-conditions-bottom i{
	position: absolute;
    right: 5px;
    top: 5px;
    font-size: 15px;
    color: #666;
    cursor: pointer;
}
#module_slideout .ty-form-builder
{
width:100%;
}

#module_slideout {

  position: fixed;

  top: 40px;

  left: 0;

  -webkit-transition-duration: 0.3s;

  -moz-transition-duration: 0.3s;

  -o-transition-duration: 0.3s;

  transition-duration: 0.3s;

}

#module_slideout_inner {

border:3px solid #fdb811;
border-left:0px;
  position: fixed;
   width:250px;
   padding:10px;
  background-color:#fff;
  top: 40px;

  left: -273px;

  -webkit-transition-duration: 0.3s;

  -moz-transition-duration: 0.3s;

  -o-transition-duration: 0.3s;

  transition-duration: 0.3s;

}

#module_slideout:hover {

  left: 273px;

}

#module_slideout:hover #module_slideout_inner {

  left: 0;

}


</style>  



<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/PopupAndSideOut/hooks/index/styles.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/PopupAndSideOut/hooks/index/styles.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?>
<style type="text/css">
.terms-and-conditions{
	font-size: 12px;
	padding: 10px;
	border: 1px solid #7b7d5c;
	margin-bottom: 10px;
	background: #f2f6ad;
}
.c-empty .terms-and-conditions{
	margin-bottom: 0;
	background: none;
	border: none;
}
.c-empty.c-white .terms-and-conditions{
	color: #FFF;
}
.terms-and-conditions a{
	font-size: 12px;
	color: inherit;
	text-decoration: underline;
	font-family: inherit;
}
.c-mw362 .terms-and-conditions{
	max-width: 362px;
}
.terms-and-conditions-bottom{
	padding: 5px;
    position: fixed;
    bottom: 0;
    background: #FFF;
    z-index: 99;
    font-size: 12px;
    left: 0;
    width: 60%;
	color: #000;
	border: 1px solid #CCC;
	border-left: none;
	border-bottom: none;
	padding-right: 30px;
}
.terms-and-conditions-bottom a{
	font-size: inherit;
	color: inherit;
	text-decoration: underline;
	font-family: inherit;
}
.terms-and-conditions-bottom i{
	position: absolute;
    right: 5px;
    top: 5px;
    font-size: 15px;
    color: #666;
    cursor: pointer;
}
#module_slideout .ty-form-builder
{
width:100%;
}

#module_slideout {

  position: fixed;

  top: 40px;

  left: 0;

  -webkit-transition-duration: 0.3s;

  -moz-transition-duration: 0.3s;

  -o-transition-duration: 0.3s;

  transition-duration: 0.3s;

}

#module_slideout_inner {

border:3px solid #fdb811;
border-left:0px;
  position: fixed;
   width:250px;
   padding:10px;
  background-color:#fff;
  top: 40px;

  left: -273px;

  -webkit-transition-duration: 0.3s;

  -moz-transition-duration: 0.3s;

  -o-transition-duration: 0.3s;

  transition-duration: 0.3s;

}

#module_slideout:hover {

  left: 273px;

}

#module_slideout:hover #module_slideout_inner {

  left: 0;

}


</style>  



<?php }?><?php }} ?>
