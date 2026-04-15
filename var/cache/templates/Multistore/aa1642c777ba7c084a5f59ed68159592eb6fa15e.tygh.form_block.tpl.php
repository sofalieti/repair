<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:11:28
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/form_as_block/form_block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:551704224687df630510046-48049632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa1642c777ba7c084a5f59ed68159592eb6fa15e' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/form_as_block/form_block.tpl',
      1 => 1752993062,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '551704224687df630510046-48049632',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'page_id' => 0,
    'page' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df63051a655_28134933',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df63051a655_28134933')) {function content_687df63051a655_28134933($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div class="form-block form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
">
    <?php $_smarty_tpl->tpl_vars['page'] = new Smarty_variable(fn_get_page_data($_smarty_tpl->tpl_vars['page_id']->value), null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['page']->value) {?>	
        <div id="form_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <h2 class="title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h2>
            <div class="description">
                <?php echo $_smarty_tpl->tpl_vars['page']->value['short_description'];?>

            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("addons/form_builder/hooks/pages/page_content.override.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value), 0);?>
	
        </div>
        
            <?php echo '<script'; ?>
 type="text/javascript">
                (function (_, $) {
                    $('.form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
 form').addClass('cm-ajax');
                    $('.form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
 form').prepend('<input type="hidden" name="fb_ajax" value="1"/>');
                    $('.form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
 form').attr('name', 'forms_form_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
');
                })(Tygh, Tygh.$);
                $.ceEvent('on', 'ce.formajaxpost_forms_form_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
', function (data, params) {
                    var is_send = false;
                    if (data.notifications != undefined) {
                        $.each(data.notifications, function (key, obj) {
                            if (obj.type != undefined) {
                                if (obj.type == 'N') {
                                    $('.form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
 form input[type=text]').val('');
                                    $('.form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
 form input[type=email]').val('');
                                    $('.form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
 form textarea').val('');
                                    $('.form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
 form select').val('');
                                } else {

                                }
                                var reCaptchaID = GetReCaptchaID("gcaptcha" + <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
);
                                grecaptcha.reset(reCaptchaID);
                                is_send = true;
                                return false;
                            }
                        });
                    }
                    if (!is_send) {
                        alert('Form error!');
                        location.reload();
                    }
                });
            <?php echo '</script'; ?>
>
        
    <?php }?>
</div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/form_as_block/form_block.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/form_as_block/form_block.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><div class="form-block form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
">
    <?php $_smarty_tpl->tpl_vars['page'] = new Smarty_variable(fn_get_page_data($_smarty_tpl->tpl_vars['page_id']->value), null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['page']->value) {?>	
        <div id="form_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
">
            <h2 class="title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h2>
            <div class="description">
                <?php echo $_smarty_tpl->tpl_vars['page']->value['short_description'];?>

            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("addons/form_builder/hooks/pages/page_content.override.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value), 0);?>
	
        </div>
        
            <?php echo '<script'; ?>
 type="text/javascript">
                (function (_, $) {
                    $('.form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
 form').addClass('cm-ajax');
                    $('.form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
 form').prepend('<input type="hidden" name="fb_ajax" value="1"/>');
                    $('.form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
 form').attr('name', 'forms_form_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
');
                })(Tygh, Tygh.$);
                $.ceEvent('on', 'ce.formajaxpost_forms_form_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
', function (data, params) {
                    var is_send = false;
                    if (data.notifications != undefined) {
                        $.each(data.notifications, function (key, obj) {
                            if (obj.type != undefined) {
                                if (obj.type == 'N') {
                                    $('.form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
 form input[type=text]').val('');
                                    $('.form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
 form input[type=email]').val('');
                                    $('.form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
 form textarea').val('');
                                    $('.form-block-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
 form select').val('');
                                } else {

                                }
                                var reCaptchaID = GetReCaptchaID("gcaptcha" + <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_id']->value, ENT_QUOTES, 'UTF-8');?>
);
                                grecaptcha.reset(reCaptchaID);
                                is_send = true;
                                return false;
                            }
                        });
                    }
                    if (!is_send) {
                        alert('Form error!');
                        location.reload();
                    }
                });
            <?php echo '</script'; ?>
>
        
    <?php }?>
</div>
<?php }?><?php }} ?>
