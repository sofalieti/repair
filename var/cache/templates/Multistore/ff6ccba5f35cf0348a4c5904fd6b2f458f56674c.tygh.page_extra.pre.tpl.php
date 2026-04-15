<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:19:04
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/blog/hooks/pages/page_extra.pre.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1751819925687df7f803d6e5-49010897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff6ccba5f35cf0348a4c5904fd6b2f458f56674c' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/blog/hooks/pages/page_extra.pre.tpl',
      1 => 1752993096,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1751819925687df7f803d6e5-49010897',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'page' => 0,
    'subpages' => 0,
    'subpage' => 0,
    'childs' => 0,
    'child' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df7f8051352_78658840',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df7f8051352_78658840')) {function content_687df7f8051352_78658840($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
if ($_smarty_tpl->tpl_vars['page']->value['page_type']==@constant('PAGE_TYPE_BLOG')) {?>
<div class="reviews-page">
<?php if ($_smarty_tpl->tpl_vars['subpages']->value) {?>
    <?php if (count($_smarty_tpl->tpl_vars['subpages']->value)==1) {?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start();
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <div class="container">
        <div class="ty-blog blog-list">
            <?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php  $_smarty_tpl->tpl_vars["subpage"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["subpage"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subpages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["subpage"]->key => $_smarty_tpl->tpl_vars["subpage"]->value) {
$_smarty_tpl->tpl_vars["subpage"]->_loop = true;
?>		
                <h1 class="default-main-title text-center mt-5"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subpage']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h1>
                <div class="row justify-content-center">
                    <?php $_smarty_tpl->tpl_vars['childs'] = new Smarty_variable(fn_get_child_pages($_smarty_tpl->tpl_vars['subpage']->value['page_id']), null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['childs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
                    <div class="col-md-3">
                        <div class="item text-center">
                            <?php if ($_smarty_tpl->tpl_vars['child']->value['main_pair']) {?>
                            <a href="<?php echo htmlspecialchars(fn_url("pages.view?page_id=".((string)$_smarty_tpl->tpl_vars['child']->value['page_id'])), ENT_QUOTES, 'UTF-8');?>
">
                                <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('image_width'=>"300",'obj_id'=>$_smarty_tpl->tpl_vars['child']->value['page_id'],'images'=>$_smarty_tpl->tpl_vars['child']->value['main_pair']), 0);?>

                            </a>
                            <?php }?>
                            <a href="<?php echo htmlspecialchars(fn_url("pages.view?page_id=".((string)$_smarty_tpl->tpl_vars['child']->value['page_id'])), ENT_QUOTES, 'UTF-8');?>
">
                                <h3 class="review-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['child']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h3>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </div>
    <?php } else { ?>
    <div class="reviews-list reviews-grid">
        <div class="container">
            <div class="row">
                <?php  $_smarty_tpl->tpl_vars["subpage"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["subpage"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subpages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["subpage"]->key => $_smarty_tpl->tpl_vars["subpage"]->value) {
$_smarty_tpl->tpl_vars["subpage"]->_loop = true;
?>
                <div class="col-lg-8">
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-7 col-md-5 col-sm-6 col-7">
                                <div class="image">
                                    <img data-zoom-image="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subpage']->value['main_pair']['detailed']['image_path'], ENT_QUOTES, 'UTF-8');?>
" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subpage']->value['main_pair']['detailed']['image_path'], ENT_QUOTES, 'UTF-8');?>
"/>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-11 col-sm-10 col-9">
                                <div class="info">
                                    <h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subpage']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h4>
                                    <div class="description"><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['subpage']->value['description']), ENT_QUOTES, 'UTF-8');?>
</div>
                                    <a class="btn btn-primary" href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['subpage']->value['blog_product_id'])), ENT_QUOTES, 'UTF-8');?>
">View Product</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php }?>
<?php }?>
</div>

<?php echo '<script'; ?>
 src='/js/lib/elevatezoom-master/jquery.elevatezoom.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
    if($('body').width() > 768){
        if($('img[data-zoom-image]').length) $('img[data-zoom-image]').elevateZoom({zoomWindowHeight: 300, zoomWindowWidth:300});
    }
});
<?php echo '</script'; ?>
>

<?php }
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/blog/hooks/pages/page_extra.pre.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/blog/hooks/pages/page_extra.pre.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
if ($_smarty_tpl->tpl_vars['page']->value['page_type']==@constant('PAGE_TYPE_BLOG')) {?>
<div class="reviews-page">
<?php if ($_smarty_tpl->tpl_vars['subpages']->value) {?>
    <?php if (count($_smarty_tpl->tpl_vars['subpages']->value)==1) {?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("mainbox_title", null, null); ob_start();
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <div class="container">
        <div class="ty-blog blog-list">
            <?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php  $_smarty_tpl->tpl_vars["subpage"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["subpage"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subpages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["subpage"]->key => $_smarty_tpl->tpl_vars["subpage"]->value) {
$_smarty_tpl->tpl_vars["subpage"]->_loop = true;
?>		
                <h1 class="default-main-title text-center mt-5"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subpage']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h1>
                <div class="row justify-content-center">
                    <?php $_smarty_tpl->tpl_vars['childs'] = new Smarty_variable(fn_get_child_pages($_smarty_tpl->tpl_vars['subpage']->value['page_id']), null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['childs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
                    <div class="col-md-3">
                        <div class="item text-center">
                            <?php if ($_smarty_tpl->tpl_vars['child']->value['main_pair']) {?>
                            <a href="<?php echo htmlspecialchars(fn_url("pages.view?page_id=".((string)$_smarty_tpl->tpl_vars['child']->value['page_id'])), ENT_QUOTES, 'UTF-8');?>
">
                                <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('image_width'=>"300",'obj_id'=>$_smarty_tpl->tpl_vars['child']->value['page_id'],'images'=>$_smarty_tpl->tpl_vars['child']->value['main_pair']), 0);?>

                            </a>
                            <?php }?>
                            <a href="<?php echo htmlspecialchars(fn_url("pages.view?page_id=".((string)$_smarty_tpl->tpl_vars['child']->value['page_id'])), ENT_QUOTES, 'UTF-8');?>
">
                                <h3 class="review-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['child']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h3>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php echo $_smarty_tpl->getSubTemplate ("common/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </div>
    <?php } else { ?>
    <div class="reviews-list reviews-grid">
        <div class="container">
            <div class="row">
                <?php  $_smarty_tpl->tpl_vars["subpage"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["subpage"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subpages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["subpage"]->key => $_smarty_tpl->tpl_vars["subpage"]->value) {
$_smarty_tpl->tpl_vars["subpage"]->_loop = true;
?>
                <div class="col-lg-8">
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-7 col-md-5 col-sm-6 col-7">
                                <div class="image">
                                    <img data-zoom-image="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subpage']->value['main_pair']['detailed']['image_path'], ENT_QUOTES, 'UTF-8');?>
" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subpage']->value['main_pair']['detailed']['image_path'], ENT_QUOTES, 'UTF-8');?>
"/>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-11 col-sm-10 col-9">
                                <div class="info">
                                    <h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subpage']->value['page'], ENT_QUOTES, 'UTF-8');?>
</h4>
                                    <div class="description"><?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['subpage']->value['description']), ENT_QUOTES, 'UTF-8');?>
</div>
                                    <a class="btn btn-primary" href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['subpage']->value['blog_product_id'])), ENT_QUOTES, 'UTF-8');?>
">View Product</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php }?>
<?php }?>
</div>

<?php echo '<script'; ?>
 src='/js/lib/elevatezoom-master/jquery.elevatezoom.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
    if($('body').width() > 768){
        if($('img[data-zoom-image]').length) $('img[data-zoom-image]').elevateZoom({zoomWindowHeight: 300, zoomWindowWidth:300});
    }
});
<?php echo '</script'; ?>
>

<?php }
}?><?php }} ?>
