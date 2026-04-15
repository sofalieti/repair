<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:11:28
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/blog/hooks/pages/page_content.pre.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1234453583687df63060e4c2-54318001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e6aa3c89f30333affc1aee2bc4bab54db1e49a2' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/blog/hooks/pages/page_content.pre.tpl',
      1 => 1752993096,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1234453583687df63060e4c2-54318001',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'blog_product' => 0,
    'page' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df630613308_37177988',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df630613308_37177988')) {function content_687df630613308_37177988($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
if (isset($_smarty_tpl->tpl_vars['blog_product']->value)) {?>
<div class="reviews-list-title">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="default-main-title text-left pt-4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h1> 
            </div>
            <div class="col-md-8 text-right mb-md-0 mb-3">
                <a  href="/sauna-reviews.html" class="btn btn-primary">All Reviews</a> 
            </div>
        </div>
    </div>
</div>
<?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/blog/hooks/pages/page_content.pre.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/blog/hooks/pages/page_content.pre.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
if (isset($_smarty_tpl->tpl_vars['blog_product']->value)) {?>
<div class="reviews-list-title">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="default-main-title text-left pt-4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h1> 
            </div>
            <div class="col-md-8 text-right mb-md-0 mb-3">
                <a  href="/sauna-reviews.html" class="btn btn-primary">All Reviews</a> 
            </div>
        </div>
    </div>
</div>
<?php }?>
<?php }?><?php }} ?>
