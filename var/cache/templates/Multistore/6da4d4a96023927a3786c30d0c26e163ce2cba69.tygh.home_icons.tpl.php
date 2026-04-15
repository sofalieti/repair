<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:17:04
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/blocks/static_templates/home_icons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:234002798687df7803cfde9-29868226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6da4d4a96023927a3786c30d0c26e163ce2cba69' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/blocks/static_templates/home_icons.tpl',
      1 => 1752993035,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '234002798687df7803cfde9-29868226',
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
  'unifunc' => 'content_687df7803d3f43_01626268',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df7803d3f43_01626268')) {function content_687df7803d3f43_01626268($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div class="row justify-content-center text-center">
    <div class="col-md-5 mb-md-0 mb-4">
        <div class="default-shadow-2 item">

            <img src="/images/repairicon1.png" class="img-fluid"/>
            <div class="title">Repair your sauna</div>
            Simply getting it fixed by the experts may be what you need. At low cost, our repair servicemen will be able to repair your sauna quickly. To avoid delays we have a massive selection of spare parts to choose from.
          
        </div>
    </div>
    <div class="col-md-5 mb-md-0 mb-4">
        <div class="default-shadow-2 item">

            <img src="/images/repairicon2.png" class="img-fluid"/>
            <div class="title">Refurbished Items</div>
            If you know which particular item may need replacement we can provide you with refurbished items that are good to go.  ****They come certified with warranty****, they can be used safely. It’s good for the environment too.
          
        </div>
    </div>
    <div class="col-md-5 mb-md-0 mb-4">
        <div class="default-shadow-2 item">

            <img src="/images/repairicon3.png" class="img-fluid"/>
            <div class="title">Infrared Sauna Parts</div>
            We can suggest parts that you can either replace or upgrade in your sauna. Finding a spare part is easy because we can both fix broken items and provide you with new spare parts. It’s cheaper than getting a new sauna.
        
        </div>
    </div>
</div><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="blocks/static_templates/home_icons.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/static_templates/home_icons.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><div class="row justify-content-center text-center">
    <div class="col-md-5 mb-md-0 mb-4">
        <div class="default-shadow-2 item">

            <img src="/images/repairicon1.png" class="img-fluid"/>
            <div class="title">Repair your sauna</div>
            Simply getting it fixed by the experts may be what you need. At low cost, our repair servicemen will be able to repair your sauna quickly. To avoid delays we have a massive selection of spare parts to choose from.
          
        </div>
    </div>
    <div class="col-md-5 mb-md-0 mb-4">
        <div class="default-shadow-2 item">

            <img src="/images/repairicon2.png" class="img-fluid"/>
            <div class="title">Refurbished Items</div>
            If you know which particular item may need replacement we can provide you with refurbished items that are good to go.  ****They come certified with warranty****, they can be used safely. It’s good for the environment too.
          
        </div>
    </div>
    <div class="col-md-5 mb-md-0 mb-4">
        <div class="default-shadow-2 item">

            <img src="/images/repairicon3.png" class="img-fluid"/>
            <div class="title">Infrared Sauna Parts</div>
            We can suggest parts that you can either replace or upgrade in your sauna. Finding a spare part is easy because we can both fix broken items and provide you with new spare parts. It’s cheaper than getting a new sauna.
        
        </div>
    </div>
</div><?php }?><?php }} ?>
