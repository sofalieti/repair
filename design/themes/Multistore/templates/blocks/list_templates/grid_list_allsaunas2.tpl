<div class="product-list row">
{foreach from=$products item=product}
    {assign var="obj_id" value=$product.product_id}
    {assign var="obj_id_prefix" value="`$obj_prefix``$product.product_id`"}
    {include file="common/product_data.tpl" product=$product}
    <div class="col-16 col-md-8 col-lg-{$columns}">
        <div class="item category-{$product.main_category}-grid-list-item ty-quick-view-button__wrapper">
            {assign var="form_open" value="form_open_`$obj_id`"}
            {$smarty.capture.$form_open nofilter}
            {hook name="products:product_multicolumns_list"}
            <div class="ty-grid-list__item-name">
                <a href="{"products.view?product_id=`$product.product_id`"|fn_url}">
                    <b>Enlighten</b><br>
                    {if $sauna_type == "indoor"}
                    {$product.product|replace:"Peak":"Indoor" nofilter}<br>
                    {else}
                    {$product.product nofilter}<br>
                    {/if}
                    <span>Full Spectrum Infrared Sauna</span>        
                </a>
            </div>    
            <div class="ty-grid-list__image">
                {if $product.main_pair|@count}
                {include file="common/image.tpl" obj_id=$obj_id_prefix images=$product.main_pair object_type="product" show_thumbnail="Y" image_width=190 image_height=$settings.Thumbnails.product_lists_thumbnail_height  data_zoom_image=$product.main_pair.detailed.image_path}
                {else}
                {assign var=o_pair value=$product.image_pairs|current}
                {include file="common/image.tpl" obj_id=$obj_id_prefix images=$product.image_pairs|current object_type="product" show_thumbnail="Y" image_width=190 image_height=$settings.Thumbnails.product_lists_thumbnail_height  data_zoom_image=$o_pair.detailed.image_path}
                {/if}
            </div>	
            <div class="grid_price">
                {assign var="old_price" value="old_price_`$obj_id`"}
                {assign var="msrp" value="msrp_`$obj_id`"}
                {assign var="discount_label" value="discount_label_`$obj_id`"}
                {assign var="price"  value="price_allsaunas_`$obj_id`"}
                {assign var="old_price" value="old_price_`$obj_id`"}
                {assign var="list_price" value="list_price_`$obj_id`"}
                {assign var="clean_price" value="clean_price_`$obj_id`"}
                {assign var="list_discount" value="list_discount_`$obj_id`"}						
				
                <a href="{"products.view?product_id=`$product.product_id`"|fn_url}" class="click-for-detail">Click For Details</a>
                {assign var=product_id value=$product.product_id}
                {if $sauna_type == 'indoor'}
                    {assign var=first_price value="SELECT indoor_price FROM ?:products WHERE product_id = `$product_id`"|db_get_field}
                {else}
                    {assign var=first_price value="SELECT price FROM ?:product_prices WHERE product_id = `$product_id`"|db_get_field}
                {/if}

                <div class="row mb-3">
                    <div class="col-7 col-lg-16 col-xl-7 pricelist-price-block">
                        {if fn_discount_category_enable($product.main_category, $sauna_type) || $product.show_discount}
                        <span style="">MSRP: <del><b>${$first_price|string_format:"%.0f"}</b></del></span><br/>						
                        {assign var="delta" value=500}
                        <span style="">Rebate: <b>${{$product.discounts.A}}</b></span><br>
                        <span style="">Price: <b>${$first_price-$product.discounts.A} </b></span><br/>
                        {else}
                        <span style="">Price: <b>${$first_price|string_format:"%.0f"}</b></span><br/>
                        {/if}
                        {if $product.price ne $product.WebPrice}
                            <span style="">Web Price: <del><b>${$product.WebPrice}</b></del></span>
                        {/if}	
                    </div>
                    <div class="col-9 col-lg-16 col-xl-9 text-right text-lg-center text-xl-right pricelist-f-block mt-0 mt-lg-3 mt-xl-0">
                        With<br/>
                        <b>Enlighten Sauna</b><br/>
                        No Interest Financing 
                    </div>
                </div>
                <a class="btn btn-primary btn-block cm-dialog-opener cm-dialog-auto-size" data-ca-view-id="financing_{$product.product_id}" data-ca-target-id="financing_{$product.product_id}" href="{"products.financing?product_id=`$product.product_id`&product=$product.product"|fn_url}" data-ca-dialog-title="Financing" rel="nofollow">
                    Financing
                </a>
            </div>
            {/hook}
            {assign var="form_close" value="form_close_`$obj_id`"}
            {$smarty.capture.$form_close nofilter}
        </div>
    </div>
{/foreach}
</div>
{capture name="mainbox_title"}{$title}{/capture}

{literal}
<script src='/js/lib/elevatezoom-master/jquery.elevatezoom.js'></script>
<script type="text/javascript">
$(document).ready(function(){
    $('img[data-zoom-image]').elevateZoom({zoomWindowHeight: 300, zoomWindowWidth:300});
})
</script>
{/literal}