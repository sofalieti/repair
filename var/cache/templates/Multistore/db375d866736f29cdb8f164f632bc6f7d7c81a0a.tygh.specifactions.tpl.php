<?php /* Smarty version Smarty-3.1.21, created on 2026-03-31 12:05:44
         compiled from "/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/products/specifactions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125383680469cb8e68241442-80694979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db375d866736f29cdb8f164f632bc6f7d7c81a0a' => 
    array (
      0 => '/var/www/www-root/data/www/repairmysauna.com/design/themes/Multistore/templates/views/products/specifactions.tpl',
      1 => 1752993015,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '125383680469cb8e68241442-80694979',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'products' => 0,
    'product' => 0,
    'obj_prefix' => 0,
    'main_category' => 0,
    'obj_id_prefix' => 0,
    'o_pair' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_69cb8e6829e917_16466837',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_69cb8e6829e917_16466837')) {function content_69cb8e6829e917_16466837($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/www-root/data/www/repairmysauna.com/app/lib/vendor/smarty/smarty/libs/plugins/modifier.replace.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/www-root/data/www/repairmysauna.com/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><h1 class="default-main-title">Compare saunas</h1>
<p>We make the purchasing process of your personal sauna very easy and everything here is made for your benefit and comfort. That is why you can easily compare different sauna models on our website. Simply select the saunas you wish to compare and click the Compare button. Enjoy!</p>

<a id="compare_a"></a>
<table class="specifactions">
    <tr>
        <th class="compare-td">
            <button type="button" class="btn btn-primary btn-compare-saunas btn-block">Click To Compare</button>
        </th>
        <th class="none-mobile" style="width: 13% ">Exterior Specification</th>
        <th class="none-mobile" style="width: 15">Interior Specification</th>
        <th class="none-mobile" style="width: 37%">Features</th>
        <th class="none-mobile" style="width: 20%">Power&nbsp;Usage/AMPS</th>
    </tr>
    <?php $_smarty_tpl->tpl_vars['main_category'] = new Smarty_variable(0, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
        <?php if (($_SESSION['sauna_type']=='indoor'&&strpos($_smarty_tpl->tpl_vars['product']->value['product'],'Slope')===false)||$_SESSION['sauna_type']=='outdoor') {?>
        <?php echo $_smarty_tpl->getSubTemplate ("common/product_data.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'min_qty'=>true,'show_discount_label'=>true,'show_list_discount'=>true), 0);?>

        <?php $_smarty_tpl->tpl_vars["obj_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['product_id'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars["obj_id_prefix"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['product']->value['product_id']), null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['main_category']->value!=$_smarty_tpl->tpl_vars['product']->value['main_category']) {?>
        <?php $_smarty_tpl->tpl_vars['main_category'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['main_category'], null, 0);?>
        <?php }?>
        <tr class="specifactions_item specifactions_item_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['main_category'], ENT_QUOTES, 'UTF-8');?>
" data-toggle="tooltip"  data-placement="left" title="Click to select">
                <td class="text-center">
                        <input type="checkbox" class="compare-row"/><br/>
                        <?php if (count($_smarty_tpl->tpl_vars['product']->value['main_pair'])) {?>
                        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('obj_id'=>$_smarty_tpl->tpl_vars['obj_id_prefix']->value,'images'=>$_smarty_tpl->tpl_vars['product']->value['main_pair'],'object_type'=>"product",'show_thumbnail'=>"Y",'image_height'=>120,'image_width'=>140,'data_zoom_image'=>$_smarty_tpl->tpl_vars['product']->value['main_pair']['detailed']['image_path']), 0);?>

                        <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['o_pair'] = new Smarty_variable(current($_smarty_tpl->tpl_vars['product']->value['image_pairs']), null, 0);?>
                        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('obj_id'=>$_smarty_tpl->tpl_vars['obj_id_prefix']->value,'images'=>$_smarty_tpl->tpl_vars['o_pair']->value,'object_type'=>"product",'show_thumbnail'=>"Y",'image_height'=>120,'image_width'=>140,'data_zoom_image'=>$_smarty_tpl->tpl_vars['o_pair']->value['detailed']['image_path']), 0);?>

                        <?php }?>
                        <br/>
                        <div class="title">
                                <?php if ($_SESSION['sauna_type']=="indoor") {?>
                                <?php echo htmlspecialchars(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['product']->value['product'],"Peak","Indoor"),"SIERRA","GOLDEN"),"RUSTIC","VITALITY"), ENT_QUOTES, 'UTF-8');?>

                                <?php } else { ?>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product'], ENT_QUOTES, 'UTF-8');?>

                                <?php }?>
                        </div>
                        <a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
" class="click-for-details">Click for details</a>
                </td>
                <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/specifactions_product_features.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product_features'=>$_smarty_tpl->tpl_vars['product']->value['product_features'],'details_page'=>true), 0);?>

        </tr>
        <?php }?>
    <?php } ?>
    <tr>
        <th class="compare-td">
            <button type="button" class="btn btn-primary btn-compare-saunas">Click To Compare</button>
        </th>
        <th colspan="4"></th>
    </tr>
</table>


<?php echo '<script'; ?>
 src='/js/lib/elevatezoom-master/jquery.elevatezoom.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
    //$('[data-toggle="tooltip"]').tooltip(); 
    $('img[data-zoom-image]').elevateZoom({zoomWindowHeight: 300, zoomWindowWidth:300});
    $('.btn-compare-saunas').click(function(){
        if($(this).hasClass('clear-compare')){
            $('.specifactions tr').removeClass('hidden');
            $('.specifactions tr').removeClass('active');
            $('.specifactions tr').removeClass('selected');
            $('.btn-compare-saunas').removeClass('clear-compare');
            $('.btn-compare-saunas').text('Click To Compare');
            $(".compare-row").prop( "checked", false );
        }else{
            var checked = $(".compare-row:checked");
            if($(checked).length == 0){
                alert('Please select saunas to compare');
            }else if($(checked).length < 2){
                alert('Select atleast 2 saunas to compare');
            }else{
                $('.specifactions_item').addClass('hidden');
                $('.specifactions_category').addClass('hidden');

                $.each($(checked), function(key, obj){
                        $(obj).parent('td').parent('tr').removeClass('hidden');
                        $(obj).parent('td').parent('tr').addClass('active');
                })

                $('.btn-compare-saunas').addClass('clear-compare');
                $('.btn-compare-saunas').text('Clear');
                return false;
            }
        }
    });
    $('.specifactions_item').click(function(){
        if($(this).hasClass('selected')){
            $(this).removeClass('selected');
            $(this).find('input[type=checkbox]').prop('checked', false);
        }else{
            $(this).addClass('selected');
            $(this).find('input[type=checkbox]').prop('checked', true);
        }		
    });
})
<?php echo '</script'; ?>
>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="views/products/specifactions.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/products/specifactions.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><h1 class="default-main-title">Compare saunas</h1>
<p>We make the purchasing process of your personal sauna very easy and everything here is made for your benefit and comfort. That is why you can easily compare different sauna models on our website. Simply select the saunas you wish to compare and click the Compare button. Enjoy!</p>

<a id="compare_a"></a>
<table class="specifactions">
    <tr>
        <th class="compare-td">
            <button type="button" class="btn btn-primary btn-compare-saunas btn-block">Click To Compare</button>
        </th>
        <th class="none-mobile" style="width: 13% ">Exterior Specification</th>
        <th class="none-mobile" style="width: 15">Interior Specification</th>
        <th class="none-mobile" style="width: 37%">Features</th>
        <th class="none-mobile" style="width: 20%">Power&nbsp;Usage/AMPS</th>
    </tr>
    <?php $_smarty_tpl->tpl_vars['main_category'] = new Smarty_variable(0, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
        <?php if (($_SESSION['sauna_type']=='indoor'&&strpos($_smarty_tpl->tpl_vars['product']->value['product'],'Slope')===false)||$_SESSION['sauna_type']=='outdoor') {?>
        <?php echo $_smarty_tpl->getSubTemplate ("common/product_data.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'min_qty'=>true,'show_discount_label'=>true,'show_list_discount'=>true), 0);?>

        <?php $_smarty_tpl->tpl_vars["obj_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['product_id'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars["obj_id_prefix"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['product']->value['product_id']), null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['main_category']->value!=$_smarty_tpl->tpl_vars['product']->value['main_category']) {?>
        <?php $_smarty_tpl->tpl_vars['main_category'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['main_category'], null, 0);?>
        <?php }?>
        <tr class="specifactions_item specifactions_item_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['main_category'], ENT_QUOTES, 'UTF-8');?>
" data-toggle="tooltip"  data-placement="left" title="Click to select">
                <td class="text-center">
                        <input type="checkbox" class="compare-row"/><br/>
                        <?php if (count($_smarty_tpl->tpl_vars['product']->value['main_pair'])) {?>
                        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('obj_id'=>$_smarty_tpl->tpl_vars['obj_id_prefix']->value,'images'=>$_smarty_tpl->tpl_vars['product']->value['main_pair'],'object_type'=>"product",'show_thumbnail'=>"Y",'image_height'=>120,'image_width'=>140,'data_zoom_image'=>$_smarty_tpl->tpl_vars['product']->value['main_pair']['detailed']['image_path']), 0);?>

                        <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['o_pair'] = new Smarty_variable(current($_smarty_tpl->tpl_vars['product']->value['image_pairs']), null, 0);?>
                        <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('obj_id'=>$_smarty_tpl->tpl_vars['obj_id_prefix']->value,'images'=>$_smarty_tpl->tpl_vars['o_pair']->value,'object_type'=>"product",'show_thumbnail'=>"Y",'image_height'=>120,'image_width'=>140,'data_zoom_image'=>$_smarty_tpl->tpl_vars['o_pair']->value['detailed']['image_path']), 0);?>

                        <?php }?>
                        <br/>
                        <div class="title">
                                <?php if ($_SESSION['sauna_type']=="indoor") {?>
                                <?php echo htmlspecialchars(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['product']->value['product'],"Peak","Indoor"),"SIERRA","GOLDEN"),"RUSTIC","VITALITY"), ENT_QUOTES, 'UTF-8');?>

                                <?php } else { ?>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product'], ENT_QUOTES, 'UTF-8');?>

                                <?php }?>
                        </div>
                        <a href="<?php echo htmlspecialchars(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), ENT_QUOTES, 'UTF-8');?>
" class="click-for-details">Click for details</a>
                </td>
                <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/specifactions_product_features.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product_features'=>$_smarty_tpl->tpl_vars['product']->value['product_features'],'details_page'=>true), 0);?>

        </tr>
        <?php }?>
    <?php } ?>
    <tr>
        <th class="compare-td">
            <button type="button" class="btn btn-primary btn-compare-saunas">Click To Compare</button>
        </th>
        <th colspan="4"></th>
    </tr>
</table>


<?php echo '<script'; ?>
 src='/js/lib/elevatezoom-master/jquery.elevatezoom.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
    //$('[data-toggle="tooltip"]').tooltip(); 
    $('img[data-zoom-image]').elevateZoom({zoomWindowHeight: 300, zoomWindowWidth:300});
    $('.btn-compare-saunas').click(function(){
        if($(this).hasClass('clear-compare')){
            $('.specifactions tr').removeClass('hidden');
            $('.specifactions tr').removeClass('active');
            $('.specifactions tr').removeClass('selected');
            $('.btn-compare-saunas').removeClass('clear-compare');
            $('.btn-compare-saunas').text('Click To Compare');
            $(".compare-row").prop( "checked", false );
        }else{
            var checked = $(".compare-row:checked");
            if($(checked).length == 0){
                alert('Please select saunas to compare');
            }else if($(checked).length < 2){
                alert('Select atleast 2 saunas to compare');
            }else{
                $('.specifactions_item').addClass('hidden');
                $('.specifactions_category').addClass('hidden');

                $.each($(checked), function(key, obj){
                        $(obj).parent('td').parent('tr').removeClass('hidden');
                        $(obj).parent('td').parent('tr').addClass('active');
                })

                $('.btn-compare-saunas').addClass('clear-compare');
                $('.btn-compare-saunas').text('Clear');
                return false;
            }
        }
    });
    $('.specifactions_item').click(function(){
        if($(this).hasClass('selected')){
            $(this).removeClass('selected');
            $(this).find('input[type=checkbox]').prop('checked', false);
        }else{
            $(this).addClass('selected');
            $(this).find('input[type=checkbox]').prop('checked', true);
        }		
    });
})
<?php echo '</script'; ?>
>
<?php }?><?php }} ?>
