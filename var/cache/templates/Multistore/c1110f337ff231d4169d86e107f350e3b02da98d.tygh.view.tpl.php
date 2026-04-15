<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:19:03
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/pages/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1701974209687df7f7f049b8-41415039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1110f337ff231d4169d86e107f350e3b02da98d' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/pages/view.tpl',
      1 => 1752993021,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1701974209687df7f7f049b8-41415039',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'page' => 0,
    'l1_pages' => 0,
    'l1_page' => 0,
    'l2_pages' => 0,
    'l2_page' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df7f80207b5_91113428',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df7f80207b5_91113428')) {function content_687df7f80207b5_91113428($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_live_edit')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.live_edit.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
if ($_smarty_tpl->tpl_vars['page']->value['show_child_pages']=="N") {?>
<div class="ty-wysiwyg-content <?php if ($_smarty_tpl->tpl_vars['page']->value['is_container']) {?>container<?php }?>">
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"pages:page_content")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"pages:page_content"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <div <?php echo smarty_function_live_edit(array('name'=>"page:description:".((string)$_smarty_tpl->tpl_vars['page']->value['page_id'])),$_smarty_tpl);?>
><?php echo $_smarty_tpl->tpl_vars['page']->value['description'];?>
</div>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"pages:page_content"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div>
<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start(); ?><span <?php echo smarty_function_live_edit(array('name'=>"page:page:".((string)$_smarty_tpl->tpl_vars['page']->value['page_id'])),$_smarty_tpl);?>
><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</span><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"pages:page_extra")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"pages:page_extra"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"pages:page_extra"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php } else { ?>
<div class="container page-card-list">
	<?php $_smarty_tpl->tpl_vars['l1_pages'] = new Smarty_variable(current(fn_get_pages(array('parent_id'=>$_smarty_tpl->tpl_vars['page']->value['page_id'],'subpages'=>'N','status'=>'A'))), null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['l1_page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l1_page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['l1_pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l1_page']->key => $_smarty_tpl->tpl_vars['l1_page']->value) {
$_smarty_tpl->tpl_vars['l1_page']->_loop = true;
?>
	<?php $_smarty_tpl->tpl_vars['l2_pages'] = new Smarty_variable(current(fn_get_pages(array('parent_id'=>$_smarty_tpl->tpl_vars['l1_page']->value['page_id'],'subpages'=>'N','status'=>'A'))), null, 0);?>
	<?php if (count($_smarty_tpl->tpl_vars['l2_pages']->value)) {?>
	<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l1_page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h2>
	<?php  $_smarty_tpl->tpl_vars['l2_page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l2_page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['l2_pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l2_page']->key => $_smarty_tpl->tpl_vars['l2_page']->value) {
$_smarty_tpl->tpl_vars['l2_page']->_loop = true;
?>
	<a href="<?php echo htmlspecialchars(fn_url("pages.view?page_id=".((string)$_smarty_tpl->tpl_vars['l2_page']->value['page_id'])), ENT_QUOTES, 'UTF-8');?>
" class="card">
		<div class="row align-items-center">
			<div class="col-16 col-md-2 d-none d-md-block"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('image_width'=>"120",'obj_id'=>$_smarty_tpl->tpl_vars['l2_page']->value['page_id'],'images'=>$_smarty_tpl->tpl_vars['l2_page']->value['main_pair'],'class'=>"mx-auto d-block small-img"), 0);?>
</div>
			<div class="col-16 col-md-14 px-3">
				<div class="card-block px-3">
					<h4 class="card-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l2_page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h4>
					<div class="card-text "><?php echo $_smarty_tpl->tpl_vars['l2_page']->value['short_description'];?>
</div>
                                        <div class="card-text d-block d-md-none"><b>Read more...</b></div>
				</div>
			</div>
		</div>
	</a>
	<?php } ?>
	<?php } else { ?>
	<a href="<?php echo htmlspecialchars(fn_url("pages.view?page_id=".((string)$_smarty_tpl->tpl_vars['l1_page']->value['page_id'])), ENT_QUOTES, 'UTF-8');?>
" class="card">
		<div class="row align-items-center">
			<div class="col-md-2 col-sm-4 col-4"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('image_width'=>"120",'obj_id'=>$_smarty_tpl->tpl_vars['l1_page']->value['page_id'],'images'=>$_smarty_tpl->tpl_vars['l1_page']->value['main_pair'],'class'=>"small-img"), 0);?>
</div>
			<div class="col-md-14 col-sm-12 col-12 px-3">
				<div class="card-block px-3">
					<h4 class="card-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l1_page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h4>
					<div class="card-text"><?php echo $_smarty_tpl->tpl_vars['l1_page']->value['short_description'];?>
</div>
				</div>
			</div>
		</div>
	</a>
	<?php }?>
	<?php } ?>
       
	<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start(); ?><span <?php echo smarty_function_live_edit(array('name'=>"page:page:".((string)$_smarty_tpl->tpl_vars['page']->value['page_id'])),$_smarty_tpl);?>
><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</span><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
</div>
<?php }
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/pages/view.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/pages/view.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
if ($_smarty_tpl->tpl_vars['page']->value['show_child_pages']=="N") {?>
<div class="ty-wysiwyg-content <?php if ($_smarty_tpl->tpl_vars['page']->value['is_container']) {?>container<?php }?>">
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"pages:page_content")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"pages:page_content"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <div <?php echo smarty_function_live_edit(array('name'=>"page:description:".((string)$_smarty_tpl->tpl_vars['page']->value['page_id'])),$_smarty_tpl);?>
><?php echo $_smarty_tpl->tpl_vars['page']->value['description'];?>
</div>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"pages:page_content"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div>
<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start(); ?><span <?php echo smarty_function_live_edit(array('name'=>"page:page:".((string)$_smarty_tpl->tpl_vars['page']->value['page_id'])),$_smarty_tpl);?>
><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</span><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"pages:page_extra")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"pages:page_extra"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"pages:page_extra"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php } else { ?>
<div class="container page-card-list">
	<?php $_smarty_tpl->tpl_vars['l1_pages'] = new Smarty_variable(current(fn_get_pages(array('parent_id'=>$_smarty_tpl->tpl_vars['page']->value['page_id'],'subpages'=>'N','status'=>'A'))), null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['l1_page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l1_page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['l1_pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l1_page']->key => $_smarty_tpl->tpl_vars['l1_page']->value) {
$_smarty_tpl->tpl_vars['l1_page']->_loop = true;
?>
	<?php $_smarty_tpl->tpl_vars['l2_pages'] = new Smarty_variable(current(fn_get_pages(array('parent_id'=>$_smarty_tpl->tpl_vars['l1_page']->value['page_id'],'subpages'=>'N','status'=>'A'))), null, 0);?>
	<?php if (count($_smarty_tpl->tpl_vars['l2_pages']->value)) {?>
	<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l1_page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h2>
	<?php  $_smarty_tpl->tpl_vars['l2_page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l2_page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['l2_pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l2_page']->key => $_smarty_tpl->tpl_vars['l2_page']->value) {
$_smarty_tpl->tpl_vars['l2_page']->_loop = true;
?>
	<a href="<?php echo htmlspecialchars(fn_url("pages.view?page_id=".((string)$_smarty_tpl->tpl_vars['l2_page']->value['page_id'])), ENT_QUOTES, 'UTF-8');?>
" class="card">
		<div class="row align-items-center">
			<div class="col-16 col-md-2 d-none d-md-block"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('image_width'=>"120",'obj_id'=>$_smarty_tpl->tpl_vars['l2_page']->value['page_id'],'images'=>$_smarty_tpl->tpl_vars['l2_page']->value['main_pair'],'class'=>"mx-auto d-block small-img"), 0);?>
</div>
			<div class="col-16 col-md-14 px-3">
				<div class="card-block px-3">
					<h4 class="card-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l2_page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h4>
					<div class="card-text "><?php echo $_smarty_tpl->tpl_vars['l2_page']->value['short_description'];?>
</div>
                                        <div class="card-text d-block d-md-none"><b>Read more...</b></div>
				</div>
			</div>
		</div>
	</a>
	<?php } ?>
	<?php } else { ?>
	<a href="<?php echo htmlspecialchars(fn_url("pages.view?page_id=".((string)$_smarty_tpl->tpl_vars['l1_page']->value['page_id'])), ENT_QUOTES, 'UTF-8');?>
" class="card">
		<div class="row align-items-center">
			<div class="col-md-2 col-sm-4 col-4"><?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('image_width'=>"120",'obj_id'=>$_smarty_tpl->tpl_vars['l1_page']->value['page_id'],'images'=>$_smarty_tpl->tpl_vars['l1_page']->value['main_pair'],'class'=>"small-img"), 0);?>
</div>
			<div class="col-md-14 col-sm-12 col-12 px-3">
				<div class="card-block px-3">
					<h4 class="card-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l1_page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h4>
					<div class="card-text"><?php echo $_smarty_tpl->tpl_vars['l1_page']->value['short_description'];?>
</div>
				</div>
			</div>
		</div>
	</a>
	<?php }?>
	<?php } ?>
       
	<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start(); ?><span <?php echo smarty_function_live_edit(array('name'=>"page:page:".((string)$_smarty_tpl->tpl_vars['page']->value['page_id'])),$_smarty_tpl);?>
><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page'], ENT_QUOTES, 'UTF-8');?>
</span><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
</div>
<?php }
}?><?php }} ?>
