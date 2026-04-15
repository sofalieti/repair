<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 18:19:31
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/categories/get_a_garanteed_solution.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1851497234687e5a838a16c0-88026932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70ca77d43405cb8a79624181c54b519ffa0e25e0' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/categories/get_a_garanteed_solution.tpl',
      1 => 1752993028,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1851497234687e5a838a16c0-88026932',
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
  'unifunc' => 'content_687e5a838d26d7_36106556',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687e5a838d26d7_36106556')) {function content_687e5a838d26d7_36106556($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div class="get-a-garanteed-solution-form">         
    <form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="get-a-garanteed-solution-form">
        <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($_GET['category_id'], ENT_QUOTES, 'UTF-8');?>
"/>
        <input type="hidden" name="brand_id" value="<?php echo htmlspecialchars($_GET['b_id'], ENT_QUOTES, 'UTF-8');?>
"/>
        <input type="hidden" name="timezone"  value="" id="gs_timezone" />

        <div class="form-group">
            <label class="cm-required cm-name hidden" for="gs_name">Name</label>
            <input type="text" name="name" id="gs_name" value="" placeholder="Name" class="form-control"/>
        </div>

        <div class="form-group">
            <label class="cm-required cm-email hidden" for="gs_email">E-mail</label>
            <input type="text" name="email" id="gs_email" value="" placeholder="E-mail" class="form-control"/>
        </div>

        <div class="form-group">
            <label class="cm-required hidden" for="gs_phone">Phone</label>
            <input type="text" name="phone" id="gs_phone" value="" placeholder="Phone" class="form-control"/>
        </div>	
        <div class="form-elements-group ty-form-builder__buttons buttons-container text-right">
            <div class="row">
                <div class="col-md-10">
                    <?php echo $_smarty_tpl->getSubTemplate ("common/image_verification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('option'=>"get-a-garanteed-solution-form"), 0);?>

                </div>
                <div class="col-md-6">
                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_meta'=>"btn-primary",'but_role'=>"submit",'but_text'=>'Send','but_name'=>"dispatch[brands.get_a_garanteed_solution]"), 0);?>

                </div>
            </div>
        </div>
    </form>      
</div>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            $('form[name=get-a-garanteed-solution-form]').on('submit', function (event) {
                setTimeout(function(){
                    var reCaptchaID = GetReCaptchaID("gcaptchaget-a-garanteed-solution-form");
                    grecaptcha.reset(reCaptchaID);
                }, 200);                
            });
            var split = new Date().toString().split(" ");
            var timeZoneFormatted = split[split.length - 2];
            $("#gs_timezone").val(timeZoneFormatted);
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
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/categories/get_a_garanteed_solution.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/categories/get_a_garanteed_solution.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><div class="get-a-garanteed-solution-form">         
    <form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="get-a-garanteed-solution-form">
        <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($_GET['category_id'], ENT_QUOTES, 'UTF-8');?>
"/>
        <input type="hidden" name="brand_id" value="<?php echo htmlspecialchars($_GET['b_id'], ENT_QUOTES, 'UTF-8');?>
"/>
        <input type="hidden" name="timezone"  value="" id="gs_timezone" />

        <div class="form-group">
            <label class="cm-required cm-name hidden" for="gs_name">Name</label>
            <input type="text" name="name" id="gs_name" value="" placeholder="Name" class="form-control"/>
        </div>

        <div class="form-group">
            <label class="cm-required cm-email hidden" for="gs_email">E-mail</label>
            <input type="text" name="email" id="gs_email" value="" placeholder="E-mail" class="form-control"/>
        </div>

        <div class="form-group">
            <label class="cm-required hidden" for="gs_phone">Phone</label>
            <input type="text" name="phone" id="gs_phone" value="" placeholder="Phone" class="form-control"/>
        </div>	
        <div class="form-elements-group ty-form-builder__buttons buttons-container text-right">
            <div class="row">
                <div class="col-md-10">
                    <?php echo $_smarty_tpl->getSubTemplate ("common/image_verification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('option'=>"get-a-garanteed-solution-form"), 0);?>

                </div>
                <div class="col-md-6">
                    <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_meta'=>"btn-primary",'but_role'=>"submit",'but_text'=>'Send','but_name'=>"dispatch[brands.get_a_garanteed_solution]"), 0);?>

                </div>
            </div>
        </div>
    </form>      
</div>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            $('form[name=get-a-garanteed-solution-form]').on('submit', function (event) {
                setTimeout(function(){
                    var reCaptchaID = GetReCaptchaID("gcaptchaget-a-garanteed-solution-form");
                    grecaptcha.reset(reCaptchaID);
                }, 200);                
            });
            var split = new Date().toString().split(" ");
            var timeZoneFormatted = split[split.length - 2];
            $("#gs_timezone").val(timeZoneFormatted);
        });
    <?php echo '</script'; ?>
>
	
<?php }?><?php }} ?>
