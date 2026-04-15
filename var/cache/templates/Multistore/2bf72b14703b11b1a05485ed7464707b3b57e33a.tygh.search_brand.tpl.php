<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:11:28
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/blocks/static_templates/search_brand.tpl" */ ?>
<?php /*%%SmartyHeaderCode:610917547687df630449c95-64422756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bf72b14703b11b1a05485ed7464707b3b57e33a' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/blocks/static_templates/search_brand.tpl',
      1 => 1752993036,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '610917547687df630449c95-64422756',
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
  'unifunc' => 'content_687df63044e6b2_41667414',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df63044e6b2_41667414')) {function content_687df63044e6b2_41667414($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><form class="search-brand-form">
    <div class="input-group">
        <input name="q" type="text" class="form-control search-brand-field" placeholder="SEARCH BY BRAND" value="">
        <div class="input-group-prepend">
            <button type="submit" class="btn btn-light search-brand-button"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>
<div class="quick-search-brand">
    <ul>
        <li class="active">A-E</li>
        <li>F-K</li>
        <li>L-Q</li>
        <li>R-W</li>
        <li>X-Z</li>
    </ul>
    <div class="list" id="simplebar">
        <?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = fn_brands_by_lettes('A-E'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['url'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
        <?php } ?>
    </div>
</div><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="blocks/static_templates/search_brand.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/static_templates/search_brand.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><form class="search-brand-form">
    <div class="input-group">
        <input name="q" type="text" class="form-control search-brand-field" placeholder="SEARCH BY BRAND" value="">
        <div class="input-group-prepend">
            <button type="submit" class="btn btn-light search-brand-button"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>
<div class="quick-search-brand">
    <ul>
        <li class="active">A-E</li>
        <li>F-K</li>
        <li>L-Q</li>
        <li>R-W</li>
        <li>X-Z</li>
    </ul>
    <div class="list" id="simplebar">
        <?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = fn_brands_by_lettes('A-E'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['url'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
        <?php } ?>
    </div>
</div><?php }?><?php }} ?>
