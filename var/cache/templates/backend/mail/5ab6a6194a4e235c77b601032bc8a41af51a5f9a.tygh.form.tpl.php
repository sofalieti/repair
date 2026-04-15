<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 13:33:24
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/backend/mail/templates/addons/form_builder/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:700219372687e17740603b1-76187999%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ab6a6194a4e235c77b601032bc8a41af51a5f9a' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/backend/mail/templates/addons/form_builder/form.tpl',
      1 => 1752993439,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '700219372687e17740603b1-76187999',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'elements' => 0,
    'element' => 0,
    'element_id' => 0,
    'form_values' => 0,
    'value' => 0,
    'v' => 0,
    'settings' => 0,
    'c_code' => 0,
    'state' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687e177408aea7_34724458',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687e177408aea7_34724458')) {function content_687e177408aea7_34724458($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/modifier.date_format.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('yes','no','yes','no'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
echo $_smarty_tpl->getSubTemplate ("common/letter_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<table>
<?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_smarty_tpl->tpl_vars['element_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['elements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value) {
$_smarty_tpl->tpl_vars['element']->_loop = true;
 $_smarty_tpl->tpl_vars['element_id']->value = $_smarty_tpl->tpl_vars['element']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_SEPARATOR')) {?>
<tr>
    <td colspan="2"><hr width="100%" /></td>
</tr>
<?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_HEADER')) {?>
<tr>
    <td colspan="2"><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['description'], ENT_QUOTES, 'UTF-8');?>
</b></td>
</tr>
<?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']!='F') {?>
<tr>
    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['description'], ENT_QUOTES, 'UTF-8');?>
:&nbsp;</td>
    <td>
        <?php $_smarty_tpl->tpl_vars["value"] = new Smarty_variable($_smarty_tpl->tpl_vars['form_values']->value[$_smarty_tpl->tpl_vars['element_id']->value], null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_SELECT')||$_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_RADIO')) {?>
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['variants'][$_smarty_tpl->tpl_vars['value']->value]['description'], ENT_QUOTES, 'UTF-8');?>

        <?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_CHECKBOX')) {?>
            <?php if ($_smarty_tpl->tpl_vars['value']->value=='Y') {
echo $_smarty_tpl->__("yes");
} else {
echo $_smarty_tpl->__("no");
}?>
        <?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_MULTIPLE_SB')||$_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_MULTIPLE_CB')) {?>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['value']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['v']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->iteration++;
 $_smarty_tpl->tpl_vars['v']->last = $_smarty_tpl->tpl_vars['v']->iteration === $_smarty_tpl->tpl_vars['v']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fe"]['last'] = $_smarty_tpl->tpl_vars['v']->last;
echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['variants'][$_smarty_tpl->tpl_vars['v']->value]['description'], ENT_QUOTES, 'UTF-8');
if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['fe']['last']) {?>,&nbsp;<?php }
} ?>
        <?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_TEXTAREA')) {?>
            <?php echo nl2br($_smarty_tpl->tpl_vars['value']->value);?>

        <?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_DATE')) {?>
            <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format']), ENT_QUOTES, 'UTF-8');?>

        <?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_COUNTRIES')) {?>
            <?php echo htmlspecialchars(fn_get_country_name($_smarty_tpl->tpl_vars['value']->value), ENT_QUOTES, 'UTF-8');?>

            <?php $_smarty_tpl->tpl_vars["c_code"] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value, null, 0);?>
        <?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_STATES')) {?>
            <?php $_smarty_tpl->tpl_vars["c_code"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['c_code']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['settings']->value['General']['default_country'] : $tmp), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["state"] = new Smarty_variable(fn_get_state_name($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['c_code']->value), null, 0);?>
            <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['state']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['value']->value : $tmp), ENT_QUOTES, 'UTF-8');?>

        <?php } else { ?>
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8');?>

        <?php }?>
    </td>
</tr>
<?php }?>
<?php } ?>
</table>

<?php echo $_smarty_tpl->getSubTemplate ("common/letter_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/form_builder/form.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/form_builder/form.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
echo $_smarty_tpl->getSubTemplate ("common/letter_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<table>
<?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_smarty_tpl->tpl_vars['element_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['elements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value) {
$_smarty_tpl->tpl_vars['element']->_loop = true;
 $_smarty_tpl->tpl_vars['element_id']->value = $_smarty_tpl->tpl_vars['element']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_SEPARATOR')) {?>
<tr>
    <td colspan="2"><hr width="100%" /></td>
</tr>
<?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_HEADER')) {?>
<tr>
    <td colspan="2"><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['description'], ENT_QUOTES, 'UTF-8');?>
</b></td>
</tr>
<?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']!='F') {?>
<tr>
    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['description'], ENT_QUOTES, 'UTF-8');?>
:&nbsp;</td>
    <td>
        <?php $_smarty_tpl->tpl_vars["value"] = new Smarty_variable($_smarty_tpl->tpl_vars['form_values']->value[$_smarty_tpl->tpl_vars['element_id']->value], null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_SELECT')||$_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_RADIO')) {?>
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['variants'][$_smarty_tpl->tpl_vars['value']->value]['description'], ENT_QUOTES, 'UTF-8');?>

        <?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_CHECKBOX')) {?>
            <?php if ($_smarty_tpl->tpl_vars['value']->value=='Y') {
echo $_smarty_tpl->__("yes");
} else {
echo $_smarty_tpl->__("no");
}?>
        <?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_MULTIPLE_SB')||$_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_MULTIPLE_CB')) {?>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['value']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['v']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->iteration++;
 $_smarty_tpl->tpl_vars['v']->last = $_smarty_tpl->tpl_vars['v']->iteration === $_smarty_tpl->tpl_vars['v']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fe"]['last'] = $_smarty_tpl->tpl_vars['v']->last;
echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['variants'][$_smarty_tpl->tpl_vars['v']->value]['description'], ENT_QUOTES, 'UTF-8');
if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['fe']['last']) {?>,&nbsp;<?php }
} ?>
        <?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_TEXTAREA')) {?>
            <?php echo nl2br($_smarty_tpl->tpl_vars['value']->value);?>

        <?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_DATE')) {?>
            <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format']), ENT_QUOTES, 'UTF-8');?>

        <?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_COUNTRIES')) {?>
            <?php echo htmlspecialchars(fn_get_country_name($_smarty_tpl->tpl_vars['value']->value), ENT_QUOTES, 'UTF-8');?>

            <?php $_smarty_tpl->tpl_vars["c_code"] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value, null, 0);?>
        <?php } elseif ($_smarty_tpl->tpl_vars['element']->value['element_type']==@constant('FORM_STATES')) {?>
            <?php $_smarty_tpl->tpl_vars["c_code"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['c_code']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['settings']->value['General']['default_country'] : $tmp), null, 0);?>
            <?php $_smarty_tpl->tpl_vars["state"] = new Smarty_variable(fn_get_state_name($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['c_code']->value), null, 0);?>
            <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['state']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['value']->value : $tmp), ENT_QUOTES, 'UTF-8');?>

        <?php } else { ?>
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8');?>

        <?php }?>
    </td>
</tr>
<?php }?>
<?php } ?>
</table>

<?php echo $_smarty_tpl->getSubTemplate ("common/letter_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);
}?><?php }} ?>
