<?php /* Smarty version Smarty-3.1.21, created on 2025-07-24 09:19:04
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/products/contact_us_for_a_price.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15463769946881d058014950-31285374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff4117c40b1162169b19a58942e75571ebf73979' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/products/contact_us_for_a_price.tpl',
      1 => 1752993018,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '15463769946881d058014950-31285374',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'config' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_6881d058046bb0_45639230',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6881d058046bb0_45639230')) {function content_6881d058046bb0_45639230($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div class="contact_us_for_a_price">         
    <form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post">
        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['current_url'], ENT_QUOTES, 'UTF-8');?>
" />   

        <input type="hidden" name="contact_us_for_a_price[product_id]" value="<?php echo htmlspecialchars($_GET['product_id'], ENT_QUOTES, 'UTF-8');?>
" />   
        <input type="hidden" name="contact_us_for_a_price[product]" value="<?php echo htmlspecialchars($_GET['product'], ENT_QUOTES, 'UTF-8');?>
" />      

        <div class="form-group">
            <label class="cm-required cm-name hidden" for="contact_us_for_a_price_name">Name</label>
            <input type="text" name="contact_us_for_a_price[name]" id="contact_us_for_a_price_name" value="" placeholder="Name" class="form-control"  />
        </div>

        <div class="form-group">
            <label class="cm-required cm-email hidden" for="contact_us_for_a_price_email">E-mail</label>
            <input type="text" name="contact_us_for_a_price[email]" id="contact_us_for_a_price_email" value="" placeholder="E-mail" class="form-control"  />
        </div>

        <div class="form-group">
            <label class="cm-required hidden" for="contact_us_for_a_price_phone">Phone</label>
            <input type="text" name="contact_us_for_a_price[phone]" id="contact_us_for_a_price_phone" value="" placeholder="Phone" class="form-control"  />
        </div>	

        <div class="form-group">
            <label class="cm-required hidden" for="contact_us_for_a_price_price_type">Price-Type</label>
            <select name="contact_us_for_a_price[price_type]" id="contact_us_for_a_price_price_type" class="form-control">
                <option value="For use in USA">For use in USA</option>
                <option value="For use in Canada">For use in Canada</option>
                <option value="For International use">For International use</option>
            </select>
        </div>
        
        

        

        <input type="hidden" name="contact_us_for_a_price[options]"  value="<?php echo htmlspecialchars((($tmp = @$_GET['options'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8');?>
" />
        <input type="hidden" name="contact_us_for_a_price[timezone]"  value="" id="contact_us_for_a_price_timezone" />
        
        <div class="form-group text-right">
            <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_meta'=>"btn-primary",'but_role'=>"submit",'but_text'=>'Send','but_name'=>"dispatch[products.contact_us_for_a_price]"), 0);?>

        </div>
    </form>      
</div>

<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
	var split = new Date().toString().split(" ");
	var timeZoneFormatted = split[split.length - 2];
	$("#contact_us_for_a_price_timezone").val(timeZoneFormatted);
});
<?php echo '</script'; ?>
>
	
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/products/contact_us_for_a_price.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/products/contact_us_for_a_price.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><div class="contact_us_for_a_price">         
    <form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post">
        <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['current_url'], ENT_QUOTES, 'UTF-8');?>
" />   

        <input type="hidden" name="contact_us_for_a_price[product_id]" value="<?php echo htmlspecialchars($_GET['product_id'], ENT_QUOTES, 'UTF-8');?>
" />   
        <input type="hidden" name="contact_us_for_a_price[product]" value="<?php echo htmlspecialchars($_GET['product'], ENT_QUOTES, 'UTF-8');?>
" />      

        <div class="form-group">
            <label class="cm-required cm-name hidden" for="contact_us_for_a_price_name">Name</label>
            <input type="text" name="contact_us_for_a_price[name]" id="contact_us_for_a_price_name" value="" placeholder="Name" class="form-control"  />
        </div>

        <div class="form-group">
            <label class="cm-required cm-email hidden" for="contact_us_for_a_price_email">E-mail</label>
            <input type="text" name="contact_us_for_a_price[email]" id="contact_us_for_a_price_email" value="" placeholder="E-mail" class="form-control"  />
        </div>

        <div class="form-group">
            <label class="cm-required hidden" for="contact_us_for_a_price_phone">Phone</label>
            <input type="text" name="contact_us_for_a_price[phone]" id="contact_us_for_a_price_phone" value="" placeholder="Phone" class="form-control"  />
        </div>	

        <div class="form-group">
            <label class="cm-required hidden" for="contact_us_for_a_price_price_type">Price-Type</label>
            <select name="contact_us_for_a_price[price_type]" id="contact_us_for_a_price_price_type" class="form-control">
                <option value="For use in USA">For use in USA</option>
                <option value="For use in Canada">For use in Canada</option>
                <option value="For International use">For International use</option>
            </select>
        </div>
        
        

        

        <input type="hidden" name="contact_us_for_a_price[options]"  value="<?php echo htmlspecialchars((($tmp = @$_GET['options'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8');?>
" />
        <input type="hidden" name="contact_us_for_a_price[timezone]"  value="" id="contact_us_for_a_price_timezone" />
        
        <div class="form-group text-right">
            <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_meta'=>"btn-primary",'but_role'=>"submit",'but_text'=>'Send','but_name'=>"dispatch[products.contact_us_for_a_price]"), 0);?>

        </div>
    </form>      
</div>

<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
	var split = new Date().toString().split(" ");
	var timeZoneFormatted = split[split.length - 2];
	$("#contact_us_for_a_price_timezone").val(timeZoneFormatted);
});
<?php echo '</script'; ?>
>
	
<?php }?><?php }} ?>
