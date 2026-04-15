<?php /* Smarty version Smarty-3.1.21, created on 2025-07-21 11:11:28
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/brands/views/brands/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2124149096687df630627179-53990042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3c45bea5a7766627b99bc5a013bbc728c86ace8' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/addons/brands/views/brands/view.tpl',
      1 => 1752993085,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '2124149096687df630627179-53990042',
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
    'category' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_687df63063f014_06533244',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_687df63063f014_06533244')) {function content_687df63063f014_06533244($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div class="brand-detail-page">
    <nav class="categories-menu navbar navbar-expand-md">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i> Categories
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-fill w-100">
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
    <div class="brand-info">
        <h1 class="default-main-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
</h1>
        <div class="row align-items-center">
            <?php if ($_smarty_tpl->tpl_vars['brand']->value['main_pair']) {?>
                <div class="col-md-3">
                    <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('show_detailed_link'=>false,'images'=>$_smarty_tpl->tpl_vars['brand']->value['main_pair'],'no_ids'=>true,'image_width'=>200), 0);?>

                </div>
            <?php }?>
            <div class="col-md-<?php if ($_smarty_tpl->tpl_vars['brand']->value['main_pair']) {?>13<?php } else { ?>16<?php }?>">
                <div class="description">
                    The make and model of a sauna will have a significant impact on what parts are best to use for major and minor fixes.<br><br>
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
 is a known manufacturer of infrared saunas and infrared sauna parts. <br>
                    Whatever the problem your sauna is we can fix it.<br>
                    If you don’t know what make and model you’ve got, please submit images so that we can deduct it for you. <br><br>
Some parts that need repair are generic, whilst other ones are brand-specific, in any case we will be happy to assist you.

                </div>
            </div>
        </div>
    </div>
    <div class="brand-categories">
        <div class="row">
            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars['subcategories'] = new Smarty_variable(fn_get_subcategories($_smarty_tpl->tpl_vars['category']->value['category_id']), null, 0);?>
                
                <?php if (count($_smarty_tpl->tpl_vars['subcategories']->value)) {?>
                <?php  $_smarty_tpl->tpl_vars['sc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sc']->key => $_smarty_tpl->tpl_vars['sc']->value) {
$_smarty_tpl->tpl_vars['sc']->_loop = true;
?>
                <div class="col-md-20p col-sm-4 col-8 text-center item-block">
                    <a href="<?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_smarty_tpl->tpl_vars['sc']->value['category_id'])."&brand_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
">
                        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('show_detailed_link'=>false,'images'=>$_smarty_tpl->tpl_vars['sc']->value['main_pair'],'no_ids'=>true,'image_width'=>100,'image_height'=>100), 0);?>
<br/>
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sc']->value['category'], ENT_QUOTES, 'UTF-8');?>

                    </a>
                </div>
                <?php } ?>
                <?php } else { ?>
                <div class="col-md-20p col-sm-4 col-8 text-center item-block">
                    <a href="<?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_smarty_tpl->tpl_vars['category']->value['category_id'])."&brand_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
">
                        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('show_detailed_link'=>false,'images'=>$_smarty_tpl->tpl_vars['category']->value['main_pair'],'no_ids'=>true,'image_width'=>100,'image_height'=>100), 0);?>
<br/>
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['category'], ENT_QUOTES, 'UTF-8');?>

                    </a>
                </div>    
                <?php }?>
            <?php } ?>
        </div>
    </div>
</div><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/brands/views/brands/view.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/brands/views/brands/view.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><div class="brand-detail-page">
    <nav class="categories-menu navbar navbar-expand-md">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i> Categories
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-fill w-100">
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
    <div class="brand-info">
        <h1 class="default-main-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
</h1>
        <div class="row align-items-center">
            <?php if ($_smarty_tpl->tpl_vars['brand']->value['main_pair']) {?>
                <div class="col-md-3">
                    <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('show_detailed_link'=>false,'images'=>$_smarty_tpl->tpl_vars['brand']->value['main_pair'],'no_ids'=>true,'image_width'=>200), 0);?>

                </div>
            <?php }?>
            <div class="col-md-<?php if ($_smarty_tpl->tpl_vars['brand']->value['main_pair']) {?>13<?php } else { ?>16<?php }?>">
                <div class="description">
                    The make and model of a sauna will have a significant impact on what parts are best to use for major and minor fixes.<br><br>
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
 is a known manufacturer of infrared saunas and infrared sauna parts. <br>
                    Whatever the problem your sauna is we can fix it.<br>
                    If you don’t know what make and model you’ve got, please submit images so that we can deduct it for you. <br><br>
Some parts that need repair are generic, whilst other ones are brand-specific, in any case we will be happy to assist you.

                </div>
            </div>
        </div>
    </div>
    <div class="brand-categories">
        <div class="row">
            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars['subcategories'] = new Smarty_variable(fn_get_subcategories($_smarty_tpl->tpl_vars['category']->value['category_id']), null, 0);?>
                
                <?php if (count($_smarty_tpl->tpl_vars['subcategories']->value)) {?>
                <?php  $_smarty_tpl->tpl_vars['sc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sc']->key => $_smarty_tpl->tpl_vars['sc']->value) {
$_smarty_tpl->tpl_vars['sc']->_loop = true;
?>
                <div class="col-md-20p col-sm-4 col-8 text-center item-block">
                    <a href="<?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_smarty_tpl->tpl_vars['sc']->value['category_id'])."&brand_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
">
                        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('show_detailed_link'=>false,'images'=>$_smarty_tpl->tpl_vars['sc']->value['main_pair'],'no_ids'=>true,'image_width'=>100,'image_height'=>100), 0);?>
<br/>
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sc']->value['category'], ENT_QUOTES, 'UTF-8');?>

                    </a>
                </div>
                <?php } ?>
                <?php } else { ?>
                <div class="col-md-20p col-sm-4 col-8 text-center item-block">
                    <a href="<?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_smarty_tpl->tpl_vars['category']->value['category_id'])."&brand_id=".((string)$_smarty_tpl->tpl_vars['brand']->value['brand_id'])), ENT_QUOTES, 'UTF-8');?>
">
                        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('show_detailed_link'=>false,'images'=>$_smarty_tpl->tpl_vars['category']->value['main_pair'],'no_ids'=>true,'image_width'=>100,'image_height'=>100), 0);?>
<br/>
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['category'], ENT_QUOTES, 'UTF-8');?>

                    </a>
                </div>    
                <?php }?>
            <?php } ?>
        </div>
    </div>
</div><?php }?><?php }} ?>
