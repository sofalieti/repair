<h1 class="default-main-title">Compare saunas</h1>
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
    {assign var=main_category value=0}
    {foreach from=$products item=product}
        {if ($smarty.session.sauna_type == 'indoor' && strpos($product.product,'Slope') === false) ||  $smarty.session.sauna_type == 'outdoor'}
        {include file="common/product_data.tpl" product=$product min_qty=true show_discount_label=true show_list_discount=true }
        {assign var="obj_id" value=$product.product_id}
        {assign var="obj_id_prefix" value="`$obj_prefix``$product.product_id`"}
        {if $main_category ne $product.main_category}
        {assign var=main_category value=$product.main_category}
        {/if}
        <tr class="specifactions_item specifactions_item_{$product.main_category}" data-toggle="tooltip"  data-placement="left" title="Click to select">
                <td class="text-center">
                        <input type="checkbox" class="compare-row"/><br/>
                        {if $product.main_pair|@count}
                        {include file="common/image.tpl" obj_id=$obj_id_prefix images=$product.main_pair object_type="product" show_thumbnail="Y" image_height=120 image_width=140 data_zoom_image=$product.main_pair.detailed.image_path}
                        {else}
                        {assign var=o_pair value=$product.image_pairs|current}
                        {include file="common/image.tpl" obj_id=$obj_id_prefix images=$o_pair object_type="product" show_thumbnail="Y" image_height=120 image_width=140 data_zoom_image=$o_pair.detailed.image_path}
                        {/if}
                        <br/>
                        <div class="title">
                                {if $smarty.session.sauna_type == "indoor"}
                                {$product.product|replace:"Peak":"Indoor"|replace:"SIERRA":"GOLDEN"|replace:"RUSTIC":"VITALITY"}
                                {else}
                                {$product.product}
                                {/if}
                        </div>
                        <a href="{"products.view?product_id=`$product.product_id`"|fn_url}" class="click-for-details">Click for details</a>
                </td>
                {include file="views/products/components/specifactions_product_features.tpl" product_features=$product.product_features details_page=true}
        </tr>
        {/if}
    {/foreach}
    <tr>
        <th class="compare-td">
            <button type="button" class="btn btn-primary btn-compare-saunas">Click To Compare</button>
        </th>
        <th colspan="4"></th>
    </tr>
</table>

{literal}
<script src='/js/lib/elevatezoom-master/jquery.elevatezoom.js'></script>
<script type="text/javascript">
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
</script>
{/literal}