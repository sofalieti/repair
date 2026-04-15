<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:17:04
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/blocks/static_templates/banner_with_brands.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1634809562687df78033b2e1-69316728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bfc8a7d804fa0e17bebd0f13d2d479385ad9026e' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/blocks/static_templates/banner_with_brands.tpl',
      1 => 1752993038,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1634809562687df78033b2e1-69316728',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'brand' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df78036ffb1_50823885',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df78036ffb1_50823885')) {function content_687df78036ffb1_50823885($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div class="row align-items-center text-center text-md-left">
    <div class="col-md-5 offset-md-1">
        <img src="/design/themes/Multistore/media/images/banner_with_brands_image.png" class="w-100 image"/>
    </div>
    <div class="col-md-9">
        <h1 class="title">REPAIR MY INFRARED SAUNA</h1>
        
        <ul class="pointed"><li>We have been providing sauna repair service across the country for over three years.</li><li>
We have helped fix a massive range of sauna models from existing and defunct brands.</li><li>
Our main goal is to make the sauna repair process easy, convenient and affordable, in addition to being quick. </li><li>
                Besides identifying and solving your sauna problems we also want you to continue enjoying the sauna long after we conclude the repair, so check out our <a href="/warranty.html">warranty page.</a><br> </li></ul>
<br>
<b>Please select the brand of sauna that needs repair.</b><br>

        




 



        <form id="main-brands-form">
            <div class="input-group">
                <select class="selectpicker">
                    <option value="">---</option>
                    <?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = fn_brands_get_all(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
                    <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['brand_id'], ENT_QUOTES, 'UTF-8');?>
" data-url="<?php echo htmlspecialchars(fn_url("brands.view?brand_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
</option>
                    <?php } ?>
                </select>
                <div class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">NEXT</button>
                </div>
            </div>
        </form>
        <p><a  href="#">Cannot find your sauna brand?</a></p>
    </div>
</div><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="blocks/static_templates/banner_with_brands.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/static_templates/banner_with_brands.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><div class="row align-items-center text-center text-md-left">
    <div class="col-md-5 offset-md-1">
        <img src="/design/themes/Multistore/media/images/banner_with_brands_image.png" class="w-100 image"/>
    </div>
    <div class="col-md-9">
        <h1 class="title">REPAIR MY INFRARED SAUNA</h1>
        
        <ul class="pointed"><li>We have been providing sauna repair service across the country for over three years.</li><li>
We have helped fix a massive range of sauna models from existing and defunct brands.</li><li>
Our main goal is to make the sauna repair process easy, convenient and affordable, in addition to being quick. </li><li>
                Besides identifying and solving your sauna problems we also want you to continue enjoying the sauna long after we conclude the repair, so check out our <a href="/warranty.html">warranty page.</a><br> </li></ul>
<br>
<b>Please select the brand of sauna that needs repair.</b><br>

        




 



        <form id="main-brands-form">
            <div class="input-group">
                <select class="selectpicker">
                    <option value="">---</option>
                    <?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = fn_brands_get_all(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
                    <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['brand_id'], ENT_QUOTES, 'UTF-8');?>
" data-url="<?php echo htmlspecialchars(fn_url("brands.view?brand_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
</option>
                    <?php } ?>
                </select>
                <div class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">NEXT</button>
                </div>
            </div>
        </form>
        <p><a  href="#">Cannot find your sauna brand?</a></p>
    </div>
</div><?php }?><?php }} ?>
