<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:58:40
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/brands/views/brands/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1518526680687e01409df6f7-07750312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe1498b33df09d2ec92b4c2508e5f0d00eb7d348' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/brands/views/brands/list.tpl',
      1 => 1752993085,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1518526680687e01409df6f7-07750312',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'ABC' => 0,
    'letter' => 0,
    'current_letters' => 0,
    'active_letter' => 0,
    'brands' => 0,
    'brand' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687e0140a18cd7_37635193',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687e0140a18cd7_37635193')) {function content_687e0140a18cd7_37635193($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div class="brand-list-page">
    <div class='brands-abc'>
        <?php  $_smarty_tpl->tpl_vars['letter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['letter']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ABC']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['letter']->key => $_smarty_tpl->tpl_vars['letter']->value) {
$_smarty_tpl->tpl_vars['letter']->_loop = true;
?>
        <?php if (in_array($_smarty_tpl->tpl_vars['letter']->value,$_smarty_tpl->tpl_vars['current_letters']->value)) {?>
        <a class='btn btn-primary <?php if ($_smarty_tpl->tpl_vars['active_letter']->value==$_smarty_tpl->tpl_vars['letter']->value) {?>active<?php }?>' href='<?php echo htmlspecialchars(strtok($_SERVER['REQUEST_URI'],"?"), ENT_QUOTES, 'UTF-8');?>
?letter=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['letter']->value, ENT_QUOTES, 'UTF-8');?>
'><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['letter']->value, ENT_QUOTES, 'UTF-8');?>
</a>
        <?php }?>
        <?php } ?>
    </div>
    <div class="row">
        <?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
        <div class="col-md-4 col-sm-33p col-8 text-center brand-item">
            <a href="<?php echo htmlspecialchars(fn_url("brands.view?brand_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
">
                <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('show_detailed_link'=>false,'images'=>$_smarty_tpl->tpl_vars['brand']->value['main_pair'],'no_ids'=>true,'image_width'=>100,'image_height'=>80), 0);?>
<br/>
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>

            </a>
        </div>
        <?php } ?>
    </div>
</div>

<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start(); ?>Brands<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/brands/views/brands/list.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/brands/views/brands/list.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><div class="brand-list-page">
    <div class='brands-abc'>
        <?php  $_smarty_tpl->tpl_vars['letter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['letter']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ABC']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['letter']->key => $_smarty_tpl->tpl_vars['letter']->value) {
$_smarty_tpl->tpl_vars['letter']->_loop = true;
?>
        <?php if (in_array($_smarty_tpl->tpl_vars['letter']->value,$_smarty_tpl->tpl_vars['current_letters']->value)) {?>
        <a class='btn btn-primary <?php if ($_smarty_tpl->tpl_vars['active_letter']->value==$_smarty_tpl->tpl_vars['letter']->value) {?>active<?php }?>' href='<?php echo htmlspecialchars(strtok($_SERVER['REQUEST_URI'],"?"), ENT_QUOTES, 'UTF-8');?>
?letter=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['letter']->value, ENT_QUOTES, 'UTF-8');?>
'><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['letter']->value, ENT_QUOTES, 'UTF-8');?>
</a>
        <?php }?>
        <?php } ?>
    </div>
    <div class="row">
        <?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
        <div class="col-md-4 col-sm-33p col-8 text-center brand-item">
            <a href="<?php echo htmlspecialchars(fn_url("brands.view?brand_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
">
                <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('show_detailed_link'=>false,'images'=>$_smarty_tpl->tpl_vars['brand']->value['main_pair'],'no_ids'=>true,'image_width'=>100,'image_height'=>80), 0);?>
<br/>
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>

            </a>
        </div>
        <?php } ?>
    </div>
</div>

<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start(); ?>Brands<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
}?><?php }} ?>
