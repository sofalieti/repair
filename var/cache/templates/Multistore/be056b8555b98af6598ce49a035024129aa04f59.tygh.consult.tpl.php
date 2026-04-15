<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 17:05:57
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/categories/consult.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1768552720687e494589e8a2-27108630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be056b8555b98af6598ce49a035024129aa04f59' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/categories/consult.tpl',
      1 => 1752993028,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1768552720687e494589e8a2-27108630',
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
  'unifunc' => 'content_687e49458ceb36_70611752',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687e49458ceb36_70611752')) {function content_687e49458ceb36_70611752($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div class="consult-form">         
    <form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" class='cm-ajax' name='form_consult'>
        <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($_GET['category_id'], ENT_QUOTES, 'UTF-8');?>
"/>
        <input type="hidden" name="brand_id" value="<?php echo htmlspecialchars($_GET['b_id'], ENT_QUOTES, 'UTF-8');?>
"/>
        <input type="hidden" name="timezone"  value="" id="consult_timezone" />
        <input type="hidden" name="result_ids" value="result" />

        <div class="form-group">
            <label class="cm-required cm-name hidden" for="consult_name">Name</label>
            <input type="text" name="name" id="consult_name" value="" placeholder="Name" class="form-control"/>
        </div>

        <div class="form-group">
            <label class="cm-required cm-email hidden" for="consult_email">E-mail</label>
            <input type="text" name="email" id="consult_email" value="" placeholder="E-mail" class="form-control"/>
        </div>

        <div class="form-group">
            <label class="cm-required hidden" for="consult_phone">Phone</label>
            <input type="text" name="phone" id="consult_phone" value="" placeholder="Phone" class="form-control"/>
        </div>	

        <div class="form-elements-group ty-form-builder__buttons buttons-container text-right">
            <div class="row">
                <div class="col-md-10">
                    <?php echo $_smarty_tpl->getSubTemplate ("common/image_verification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('option'=>"form_consult"), 0);?>

                </div>
                <div class="col-md-6">
                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_meta'=>"btn-primary",'but_role'=>"submit",'but_text'=>'Send','but_name'=>"dispatch[brands.consult]"), 0);?>

                </div>
            </div>
        </div>
    </form>      
</div>

    <?php echo '<script'; ?>
 type="text/javascript"  class="cm-ajax-force">
        $(document).ready(function () {
            $('form[name=form_consult]').on('submit', function (event) {
                setTimeout(function(){
                    var reCaptchaID = GetReCaptchaID("gcaptchaform_consult");
                    grecaptcha.reset(reCaptchaID);
                }, 200);                
            });
            var split = new Date().toString().split(" ");
            var timeZoneFormatted = split[split.length - 2];
            $("#consult_timezone").val(timeZoneFormatted);
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
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/categories/consult.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/categories/consult.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><div class="consult-form">         
    <form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" class='cm-ajax' name='form_consult'>
        <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($_GET['category_id'], ENT_QUOTES, 'UTF-8');?>
"/>
        <input type="hidden" name="brand_id" value="<?php echo htmlspecialchars($_GET['b_id'], ENT_QUOTES, 'UTF-8');?>
"/>
        <input type="hidden" name="timezone"  value="" id="consult_timezone" />
        <input type="hidden" name="result_ids" value="result" />

        <div class="form-group">
            <label class="cm-required cm-name hidden" for="consult_name">Name</label>
            <input type="text" name="name" id="consult_name" value="" placeholder="Name" class="form-control"/>
        </div>

        <div class="form-group">
            <label class="cm-required cm-email hidden" for="consult_email">E-mail</label>
            <input type="text" name="email" id="consult_email" value="" placeholder="E-mail" class="form-control"/>
        </div>

        <div class="form-group">
            <label class="cm-required hidden" for="consult_phone">Phone</label>
            <input type="text" name="phone" id="consult_phone" value="" placeholder="Phone" class="form-control"/>
        </div>	

        <div class="form-elements-group ty-form-builder__buttons buttons-container text-right">
            <div class="row">
                <div class="col-md-10">
                    <?php echo $_smarty_tpl->getSubTemplate ("common/image_verification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('option'=>"form_consult"), 0);?>

                </div>
                <div class="col-md-6">
                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_meta'=>"btn-primary",'but_role'=>"submit",'but_text'=>'Send','but_name'=>"dispatch[brands.consult]"), 0);?>

                </div>
            </div>
        </div>
    </form>      
</div>

    <?php echo '<script'; ?>
 type="text/javascript"  class="cm-ajax-force">
        $(document).ready(function () {
            $('form[name=form_consult]').on('submit', function (event) {
                setTimeout(function(){
                    var reCaptchaID = GetReCaptchaID("gcaptchaform_consult");
                    grecaptcha.reset(reCaptchaID);
                }, 200);                
            });
            var split = new Date().toString().split(" ");
            var timeZoneFormatted = split[split.length - 2];
            $("#consult_timezone").val(timeZoneFormatted);
        });
        
    <?php echo '</script'; ?>
>
	
<?php }?><?php }} ?>
