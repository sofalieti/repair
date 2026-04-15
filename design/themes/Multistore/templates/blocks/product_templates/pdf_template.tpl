{script src="js/tygh/exceptions.js"}
<div class="container">
    <div class="main-product-section">
        <div class="row align-items-end product-title-block">
            <div class="col-lg-10">
                {if $smarty.session.sauna_type == "indoor"}
                <h1  class="product-title"  >
                    <span>Enlighten</span>
                    {$product.product|replace:"Peak":"Indoor"|replace:"SIERRA":"GOLDEN"|replace:"RUSTIC":"VITALITY" nofilter} Full Spectrum Sauna
                </h1>
                {else}
                <h1  class="product-title">
                    <span>Enlighten</span>
                    {$product.product nofilter} Full Spectrum Infrared Sauna
                </h1>
                {/if}
            </div>
            <div class="col-lg-6 text-left text-lg-right mt-5 mt-lg-0">
                {include file="blocks/static_templates/product_switch_sauna_type.tpl" product=$product}
            </div>
        </div>
        
        {hook name="products:view_main_info"}
        {if $product}
            {assign var="obj_id" value=$product.product_id}
            {include file="common/product_data.tpl" product=$product but_role="big" but_text=__("add_to_cart")}
            {assign var="form_open" value="form_open_`$obj_id`"}
            {$smarty.capture.$form_open nofilter}
            <div class="row">
                <div class="col-md-5">
                    {hook name="products:image_wrap"}
                    <div class="ty-product-block__img cm-reload-{$product.product_id} text-center text-md-left" id="product_images_{$product.product_id}_update">
                        {assign var="discount_label" value="discount_label_`$obj_prefix``$obj_id`"}
                        {$smarty.capture.$discount_label nofilter}
                        {include file="views/products/components/product_images.tpl" product=$product show_detailed_link="Y" image_width=$settings.Thumbnails.product_details_thumbnail_width image_height=$settings.Thumbnails.product_details_thumbnail_height}
                    </div>
                    {/hook}
                </div>
                <div class="col-md-11 mt-md-0 mt-3">
                    <div class="product-tabs">
                        <ul class="nav nav-tabs nav-fill" id="productsTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="description-tab" data-toggle="tab" data-target="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="size-weight-tab" data-toggle="tab" data-target="#size-weight" role="tab" aria-controls="size-weight" aria-selected="false">Sizes/Weight</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="features-tab" data-toggle="tab" data-target="#features" role="tab" aria-controls="features" aria-selected="false">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="power-tab" data-toggle="tab" data-target="#power" role="tab" aria-controls="power" aria-selected="false">Power</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="productsTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">


                                {$product.full_description nofilter}
                                <br><br>
                                <div class="row additional-features">    
                                    <div class="col-16 col-lg-8">
                                        <ul >
                                            <li>Double shingled roof</li>
                                            <li>Insulation</li>
                                            <li>Real Western Canadian Red cedar wood outside and inside</li>
                                            <li>Very responsive full spectrum heaters</li>
                                        </ul>

                                    </div><div class="col-16 col-lg-8 mt-5 mt-lg-0">
                                        <div class="row" >
                                            <div class="col-2 "><div class="row"><img src="/images/low-emf.jpg"></div></div><div class="col-14"><div class="row">Low Emf</div></div>
                                            <div class="col-2 "><div class="row"><img src="/images/eco.jpg"></div></div><div class="col-14"> <div class="row">Eco-Certified</div></div>
                                            <div class="col-2 "><div class="row"><img src="/images/non-toxic.jpg"></div></div><div class="col-14"> <div class="row">Non-Toxic</div></div>
                                            <div class="col-2 "><div class="row"><img src="/images/audio.jpg"></div></div><div class="col-14"><div class="row">Bluetooth player with speakers FM/USB/AUX/MP3</div></div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane fade" id="size-weight" role="tabpanel" aria-labelledby="size-weight-tab">
                                {include file="views/products/components/product_sizes_weight.tpl" product_features=$product.product_features details_page=true}
                            </div>
                            <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
                                {include file="views/products/components/product_features_tab.tpl" product_features=$product.product_features details_page=true}
                            </div>
                            <div class="tab-pane fade" id="power" role="tabpanel" aria-labelledby="power-tab">
                                {include file="views/products/components/product_features_power.tpl" product_features=$product.product_features details_page=true}
                            </div>
                        </div>
                    </div>
                    <div class="buttons-and-actions-block">
                        <div class="row align-items-center justify-content-end">
                            <div class="col-16 text-center text-md-left col-md-auto">
                                <div class="action">
                                    {__("discount_price_text")|replace:":discount":"$`$product.discounts.A`"}	
                                </div>	
                            </div>
                            <div class="col-auto">
                                <a class="cm-dialog-opener cm-dialog-auto-size btn btn-primary request-price-btn" data-ca-view-id="contact_us_for_a_price_{$product.product_id}" data-ca-target-id="contact_us_for_a_price_{$product.product_id}" href="{"products.contact_us_for_a_price&product_id=`$product.product_id`&product=`$product.product`"|fn_url}" data-ca-dialog-title="Contact us for a price" rel="nofollow">
                                    Request Price
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {assign var="form_close" value="form_close_`$obj_id`"}
            {$smarty.capture.$form_close nofilter}
        {/if}
        {/hook}
    </div>
</div>
<div class="product-section grey1 mt-5">
    <div class="container">
        <h2 class="header">Hot Summer Sale</h2>
        <div class="content product-sale-icons">
            {include file="views/products/components/sale_icons.tpl"}
        </div>
    </div>
</div>
{if $product.image_feature_pairs|@count}
    <div class="product-section">
        <div class="container">
            <h2 class="header">Outdoor Infrared Sauna features photos for Sierra - 2 Peak</h2>
            <div class="content gallery-m50">
                <div class="owl-carousel-c-images owl-carousel ty-scroller-list">
                    {foreach from=$product.image_feature_pairs item="image_pair"}
                        <div class="ty-scroller-list__item">
                            {include file="common/image.tpl" 
					show_detailed_link=true
					images=$image_pair
					no_ids=true
					image_id="sauna_feature_images"
					image_width=400
                            }            
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
{/if}
{if $product.image_instruction_pairs|@count}
    <div class="product-section grey1">
        <div class="container">
            <h2 class="header">Assembly Photos</h2>
            <div class="content gallery-m50">
                <div class="owl-carousel-c-images owl-carouse2-c-images owl-carousel ty-scroller-list">
                    {foreach from=$product.image_instruction_pairs item="image_pair"}
                        <div class="ty-scroller-list__item">
                            {include file="common/image.tpl" 
					show_detailed_link=true
					images=$image_pair
					no_ids=true
					image_id="sauna_feature_images"
					image_width=400
                            }            
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
{/if}
{if $product.image_instruction_pairs|@count || $product.image_feature_pairs|@count}
    {include file="common/scroller_custom_init2.tpl"}
{/if}
<div class="product-section grey2">
    <div class="container">
        <h2 class="header">Heaters</h2>
        <div class="content text-center">
            <img src="/images/scatches/id_heater/{$product.product_code}_heater.png" class="img-fluid"/>
        </div>
    </div>
</div>
<div class="product-section grey1">
    <div class="container">
        <h2 class="header">Sauna Demension Scheme</h2>
        <div class="content text-center">
            {if $smarty.session.sauna_type_image == 'outdoor'}
                <img src="/images/scatches/id_front/{$product.product_code}_front.png" class="img-fluid"/>
            {else}
                <img src="/images/scatches/id_front/indoor_{$product.product_code}_front.png" class="img-fluid"/>
            {/if}
        </div>
    </div>
</div>
        
<div class="product-section grey2 standard-features-block">
    <div class="container">
        <h2 class="header">Standard Features</h2>
        <div class="content text-center">
            {include file="views/products/components/product_features2.tpl" product_features=$product.product_features details_page=true}
        </div>
    </div>
</div>
