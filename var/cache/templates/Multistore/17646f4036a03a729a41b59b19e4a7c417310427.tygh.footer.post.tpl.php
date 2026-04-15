<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:11:28
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/parts_recaptcha/hooks/index/footer.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:587706598687df6306b3d60-45010704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17646f4036a03a729a41b59b19e4a7c417310427' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/parts_recaptcha/hooks/index/footer.post.tpl',
      1 => 1752993086,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '587706598687df6306b3d60-45010704',
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
  'unifunc' => 'content_687df6306b8bb9_38979603',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df6306b8bb9_38979603')) {function content_687df6306b8bb9_38979603($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php echo '<script'; ?>
>
    var recaptcha;
    var myCallBack = function () {
        $('.g-recaptcha').each(function (i, elm) {
            recaptcha = grecaptcha.render($(elm).attr('id'), {
                'sitekey': '6LcnCLoUAAAAANhe3Btl0WAf1O8mwLf6loi0f4QE'
            });
        });
        (function (_, $) {
            $.ceEvent('on', 'ce.dialogshow', function (context) {
                setTimeout(function () {
                    context.find('.g-recaptcha').each(function () {
                        if ($.trim($(this).html()) == '') {
                            recaptcha = grecaptcha.render($(this).attr('id'), {
                                'sitekey': '6LcnCLoUAAAAANhe3Btl0WAf1O8mwLf6loi0f4QE'
                            });
                        }
                    });
                }, 0);
            });
            $.ceEvent('on', 'ce.commoninit', function (context) {
                setTimeout(function () {
                    context.find('.g-recaptcha').each(function () {
                        if ($.trim($(this).html()) == '') {
                            recaptcha = grecaptcha.render($(this).attr('id'), {
                                'sitekey': '6LcnCLoUAAAAANhe3Btl0WAf1O8mwLf6loi0f4QE'
                            });
                        }
                    });
                }, 0);
            });
            
        })(Tygh, Tygh.$);
    };
    
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="//www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit&hl=<?php echo htmlspecialchars(@constant('CART_LANGUAGE'), ENT_QUOTES, 'UTF-8');?>
" async defer><?php echo '</script'; ?>
>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/parts_recaptcha/hooks/index/footer.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/parts_recaptcha/hooks/index/footer.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><?php echo '<script'; ?>
>
    var recaptcha;
    var myCallBack = function () {
        $('.g-recaptcha').each(function (i, elm) {
            recaptcha = grecaptcha.render($(elm).attr('id'), {
                'sitekey': '6LcnCLoUAAAAANhe3Btl0WAf1O8mwLf6loi0f4QE'
            });
        });
        (function (_, $) {
            $.ceEvent('on', 'ce.dialogshow', function (context) {
                setTimeout(function () {
                    context.find('.g-recaptcha').each(function () {
                        if ($.trim($(this).html()) == '') {
                            recaptcha = grecaptcha.render($(this).attr('id'), {
                                'sitekey': '6LcnCLoUAAAAANhe3Btl0WAf1O8mwLf6loi0f4QE'
                            });
                        }
                    });
                }, 0);
            });
            $.ceEvent('on', 'ce.commoninit', function (context) {
                setTimeout(function () {
                    context.find('.g-recaptcha').each(function () {
                        if ($.trim($(this).html()) == '') {
                            recaptcha = grecaptcha.render($(this).attr('id'), {
                                'sitekey': '6LcnCLoUAAAAANhe3Btl0WAf1O8mwLf6loi0f4QE'
                            });
                        }
                    });
                }, 0);
            });
            
        })(Tygh, Tygh.$);
    };
    
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="//www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit&hl=<?php echo htmlspecialchars(@constant('CART_LANGUAGE'), ENT_QUOTES, 'UTF-8');?>
" async defer><?php echo '</script'; ?>
>
<?php }?><?php }} ?>
