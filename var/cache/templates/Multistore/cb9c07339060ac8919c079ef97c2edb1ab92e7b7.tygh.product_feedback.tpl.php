<?php /* Smarty version Smarty-3.1.21, created on 2025-07-23 09:53:56
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/products/product_feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:722484925688087044e4d23-34301000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb9c07339060ac8919c079ef97c2edb1ab92e7b7' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/products/product_feedback.tpl',
      1 => 1752993018,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '722484925688087044e4d23-34301000',
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
  'unifunc' => 'content_68808704514438_09504008',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_68808704514438_09504008')) {function content_68808704514438_09504008($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div class="contact_us_for_a_price">
    <form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" class="product_feedback" name="product_feedback">
        <input type="hidden" name="product_feedback[product_id]" value="<?php echo htmlspecialchars($_GET['product_id'], ENT_QUOTES, 'UTF-8');?>
" />
        <input type="hidden" name="product_feedback[form_name]" value="<?php echo htmlspecialchars($_GET['form_name'], ENT_QUOTES, 'UTF-8');?>
" />
        <div class="form-group">
            <label class="cm-required cm-name hidden" for="product_feedback_name">Name</label>
            <input type="text" name="product_feedback[name]" id="product_feedback_name" value="" placeholder="Name" class="form-control"  />
        </div>
        <div class="form-group">
            <label class="cm-required cm-email hidden" for="product_feedback_email">E-mail</label>
            <input type="text" name="product_feedback[email]" id="product_feedback_email" value="" placeholder="E-mail" class="form-control"  />
        </div>
        <div class="form-group">
            <label class="cm-required hidden" for="product_feedback_phone">Phone</label>
            <input type="text" name="product_feedback[phone]" id="product_feedback_phone" value="" placeholder="Phone" class="form-control"  />
        </div>
        <div class="form-group">
            <label class="hidden" for="product_feedback_question">Your question</label>
            <textarea name="product_feedback[question]" id="product_feedback_question" class="form-control" placeholder="Your question"></textarea>
        </div>
        <div class="form-group text-right">
            	
            <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_meta'=>"btn-primary",'but_role'=>"submit",'but_text'=>'Send','but_name'=>"dispatch[products.product_feedback]"), 0);?>

        </div>
    </form>    
</div>
		
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/products/product_feedback.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/products/product_feedback.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><div class="contact_us_for_a_price">
    <form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" class="product_feedback" name="product_feedback">
        <input type="hidden" name="product_feedback[product_id]" value="<?php echo htmlspecialchars($_GET['product_id'], ENT_QUOTES, 'UTF-8');?>
" />
        <input type="hidden" name="product_feedback[form_name]" value="<?php echo htmlspecialchars($_GET['form_name'], ENT_QUOTES, 'UTF-8');?>
" />
        <div class="form-group">
            <label class="cm-required cm-name hidden" for="product_feedback_name">Name</label>
            <input type="text" name="product_feedback[name]" id="product_feedback_name" value="" placeholder="Name" class="form-control"  />
        </div>
        <div class="form-group">
            <label class="cm-required cm-email hidden" for="product_feedback_email">E-mail</label>
            <input type="text" name="product_feedback[email]" id="product_feedback_email" value="" placeholder="E-mail" class="form-control"  />
        </div>
        <div class="form-group">
            <label class="cm-required hidden" for="product_feedback_phone">Phone</label>
            <input type="text" name="product_feedback[phone]" id="product_feedback_phone" value="" placeholder="Phone" class="form-control"  />
        </div>
        <div class="form-group">
            <label class="hidden" for="product_feedback_question">Your question</label>
            <textarea name="product_feedback[question]" id="product_feedback_question" class="form-control" placeholder="Your question"></textarea>
        </div>
        <div class="form-group text-right">
            	
            <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_meta'=>"btn-primary",'but_role'=>"submit",'but_text'=>'Send','but_name'=>"dispatch[products.product_feedback]"), 0);?>

        </div>
    </form>    
</div>
		
<?php }?><?php }} ?>
