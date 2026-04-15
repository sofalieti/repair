<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:28:35
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/categories/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:275899945687dfa33d7fb64-50097624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b48bad1271983c4c218f0b9149d7c93408b32cf0' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/categories/view.tpl',
      1 => 1752993028,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '275899945687dfa33d7fb64-50097624',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'categories' => 0,
    'c' => 0,
    'subcategories' => 0,
    'brand' => 0,
    'category_data' => 0,
    'sc' => 0,
    'block' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687dfa33dc33d6_17489419',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687dfa33dc33d6_17489419')) {function content_687dfa33dc33d6_17489419($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/block.hook.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
$_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"categories:view")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"categories:view"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<nav class="categories-menu navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> Categories
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars['subcategories'] = new Smarty_variable(fn_get_subcategories($_smarty_tpl->tpl_vars['c']->value['category_id']), null, 0);?>
                <li class="nav-item <?php if (count($_smarty_tpl->tpl_vars['subcategories']->value)) {?>dropdown<?php }?>">

                    <a href="<?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_smarty_tpl->tpl_vars['c']->value['category_id'])."&brand_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
" class="nav-link <?php if ($_smarty_tpl->tpl_vars['c']->value['category_id']==$_smarty_tpl->tpl_vars['category_data']->value['category_id']) {?>active<?php }?> <?php if (count($_smarty_tpl->tpl_vars['subcategories']->value)) {?>dropdown-toggle<?php }?>" <?php if (count($_smarty_tpl->tpl_vars['subcategories']->value)) {?>id="dropdown_category_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value['category_id'], ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value['category'], ENT_QUOTES, 'UTF-8');?>
</a>

                    <?php if (count($_smarty_tpl->tpl_vars['subcategories']->value)) {?>
                        <div class="dropdown-menu" aria-labelledby="dropdown_category_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value['category_id'], ENT_QUOTES, 'UTF-8');?>
">
                            <?php  $_smarty_tpl->tpl_vars['sc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sc']->key => $_smarty_tpl->tpl_vars['sc']->value) {
$_smarty_tpl->tpl_vars['sc']->_loop = true;
?>
                                <a class="dropdown-item" href="<?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_smarty_tpl->tpl_vars['sc']->value['category_id'])."&brand_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sc']->value['category'], ENT_QUOTES, 'UTF-8');?>
</a>
                            <?php } ?>
                        </div>    
                    <?php }?>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<div id="category_products_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
" class="category-detail-page text-center text-md-left">
    <h1 class="default-main-title text-left"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category_data']->value['category'], ENT_QUOTES, 'UTF-8');?>
</h1>
    <div class="row align-items-center">
        <div class="col-md-4">
            <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('show_detailed_link'=>false,'images'=>$_smarty_tpl->tpl_vars['category_data']->value['main_pair'],'no_ids'=>true,'image_width'=>400), 0);?>

        </div>
        <div class="col-md-12">

            <div class="product-tabs">
                <ul class="nav nav-tabs nav-fill" id="productsTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="description-tab" data-toggle="tab" data-target="#description" role="tab" aria-controls="description" aria-selected="true">Work process</a>
                    </li>                 
                    <li class="nav-item">
                        <a class="nav-link" id="features-tab" data-toggle="tab" data-target="#features" role="tab" aria-controls="features" aria-selected="false">Description</a>
                    </li>                
                </ul>
                <div class="tab-content" id="productsTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">

                        <div class="description">
                            <b>Is there an issue with the <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category_data']->value['category'], ENT_QUOTES, 'UTF-8');?>
?</b><br>
                            Please provide us with full information about the issue you’re experiencing. The more information you provide, the quicker we can get to fixing the problem.
                            <br><br>
                            <ul><li>
                                    1. There is a problem with your sauna</li><li>
                                    2. Take pictures, describe the problem</li><li>
                                    3. Label the cables</li><li>
                                    4. Write a check for $95 non-refundable diagnostic fee</li><li>
                                    5. Pack the broken parts and ship them to us</li><li>
                                    6. We diagnose the problem</li><li>
                                    7. We offer a solution </li></ul>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">

                        <div class="description"><?php echo $_smarty_tpl->tpl_vars['category_data']->value['description'];?>
</div>
                    </div>

                </div>
            </div>


            <div class="buttons">
                <a data-ca-view-id="online_consult" data-ca-target-id="online_consult" data-ca-dialog-title="Consult" class="btn btn-primary cm-dialog-opener cm-dialog-auto-size mb-2 mb-md-0" href="<?php echo htmlspecialchars(fn_url("categories.consult?category_id=".((string)$_smarty_tpl->tpl_vars['category_data']->value['category_id'])."&b_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
"><i class="far fa-envelope"></i> Consult</a>
                <a data-ca-view-id="get-a-garanteed-solution-form" data-ca-target-id="get-a-garanteed-solution-form" data-ca-dialog-title="Get a garanteed solution for $95 only" class="btn btn-secondary cm-dialog-opener cm-dialog-auto-size mb-2 mb-md-0" href="<?php echo htmlspecialchars(fn_url("categories.get_a_garanteed_solution?category_id=".((string)$_smarty_tpl->tpl_vars['category_data']->value['category_id'])."&b_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
">Get a garanteed solution for $95 only</a>
            </div>
        </div>
    </div>
</div>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"categories:view"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/categories/view.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/categories/view.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
$_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"categories:view")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"categories:view"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<nav class="categories-menu navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> Categories
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars['subcategories'] = new Smarty_variable(fn_get_subcategories($_smarty_tpl->tpl_vars['c']->value['category_id']), null, 0);?>
                <li class="nav-item <?php if (count($_smarty_tpl->tpl_vars['subcategories']->value)) {?>dropdown<?php }?>">

                    <a href="<?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_smarty_tpl->tpl_vars['c']->value['category_id'])."&brand_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
" class="nav-link <?php if ($_smarty_tpl->tpl_vars['c']->value['category_id']==$_smarty_tpl->tpl_vars['category_data']->value['category_id']) {?>active<?php }?> <?php if (count($_smarty_tpl->tpl_vars['subcategories']->value)) {?>dropdown-toggle<?php }?>" <?php if (count($_smarty_tpl->tpl_vars['subcategories']->value)) {?>id="dropdown_category_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value['category_id'], ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value['category'], ENT_QUOTES, 'UTF-8');?>
</a>

                    <?php if (count($_smarty_tpl->tpl_vars['subcategories']->value)) {?>
                        <div class="dropdown-menu" aria-labelledby="dropdown_category_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value['category_id'], ENT_QUOTES, 'UTF-8');?>
">
                            <?php  $_smarty_tpl->tpl_vars['sc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sc']->key => $_smarty_tpl->tpl_vars['sc']->value) {
$_smarty_tpl->tpl_vars['sc']->_loop = true;
?>
                                <a class="dropdown-item" href="<?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_smarty_tpl->tpl_vars['sc']->value['category_id'])."&brand_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sc']->value['category'], ENT_QUOTES, 'UTF-8');?>
</a>
                            <?php } ?>
                        </div>    
                    <?php }?>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<div id="category_products_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
" class="category-detail-page text-center text-md-left">
    <h1 class="default-main-title text-left"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category_data']->value['category'], ENT_QUOTES, 'UTF-8');?>
</h1>
    <div class="row align-items-center">
        <div class="col-md-4">
            <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('show_detailed_link'=>false,'images'=>$_smarty_tpl->tpl_vars['category_data']->value['main_pair'],'no_ids'=>true,'image_width'=>400), 0);?>

        </div>
        <div class="col-md-12">

            <div class="product-tabs">
                <ul class="nav nav-tabs nav-fill" id="productsTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="description-tab" data-toggle="tab" data-target="#description" role="tab" aria-controls="description" aria-selected="true">Work process</a>
                    </li>                 
                    <li class="nav-item">
                        <a class="nav-link" id="features-tab" data-toggle="tab" data-target="#features" role="tab" aria-controls="features" aria-selected="false">Description</a>
                    </li>                
                </ul>
                <div class="tab-content" id="productsTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">

                        <div class="description">
                            <b>Is there an issue with the <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category_data']->value['category'], ENT_QUOTES, 'UTF-8');?>
?</b><br>
                            Please provide us with full information about the issue you’re experiencing. The more information you provide, the quicker we can get to fixing the problem.
                            <br><br>
                            <ul><li>
                                    1. There is a problem with your sauna</li><li>
                                    2. Take pictures, describe the problem</li><li>
                                    3. Label the cables</li><li>
                                    4. Write a check for $95 non-refundable diagnostic fee</li><li>
                                    5. Pack the broken parts and ship them to us</li><li>
                                    6. We diagnose the problem</li><li>
                                    7. We offer a solution </li></ul>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">

                        <div class="description"><?php echo $_smarty_tpl->tpl_vars['category_data']->value['description'];?>
</div>
                    </div>

                </div>
            </div>


            <div class="buttons">
                <a data-ca-view-id="online_consult" data-ca-target-id="online_consult" data-ca-dialog-title="Consult" class="btn btn-primary cm-dialog-opener cm-dialog-auto-size mb-2 mb-md-0" href="<?php echo htmlspecialchars(fn_url("categories.consult?category_id=".((string)$_smarty_tpl->tpl_vars['category_data']->value['category_id'])."&b_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
"><i class="far fa-envelope"></i> Consult</a>
                <a data-ca-view-id="get-a-garanteed-solution-form" data-ca-target-id="get-a-garanteed-solution-form" data-ca-dialog-title="Get a garanteed solution for $95 only" class="btn btn-secondary cm-dialog-opener cm-dialog-auto-size mb-2 mb-md-0" href="<?php echo htmlspecialchars(fn_url("categories.get_a_garanteed_solution?category_id=".((string)$_smarty_tpl->tpl_vars['category_data']->value['category_id'])."&b_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
">Get a garanteed solution for $95 only</a>
            </div>
        </div>
    </div>
</div>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"categories:view"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?><?php }} ?>
