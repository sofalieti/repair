<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:18:55
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/mail/templates/common/letter_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1465168109687df7ef3ef822-47315742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84867a178820bd4d5480c1dc84daba02aa3a1347' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/mail/templates/common/letter_footer.tpl',
      1 => 1752993164,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1465168109687df7ef3ef822-47315742',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_type' => 0,
    'user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df7ef3f3d49_12622044',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df7ef3f3d49_12622044')) {function content_687df7ef3f3d49_12622044($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('affiliate_text_letter_footer','customer_text_letter_footer'));
?>
<p>
<?php if ($_smarty_tpl->tpl_vars['user_type']->value=='P'||$_smarty_tpl->tpl_vars['user_data']->value['user_type']=='P') {?>
    <?php echo $_smarty_tpl->__("affiliate_text_letter_footer");?>

<?php } else { ?>
    <?php echo $_smarty_tpl->__("customer_text_letter_footer");?>

<?php }?>
</p>
</body>
</html><?php }} ?>
