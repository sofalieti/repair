 {script src="js/tygh/exceptions.js"}
<div class="ty-product-block ty-product-detail fullproduct">
    <div class="ty-product-block__wrapper clearfix">
	
	
	 {if !$hide_title}
                        <h1 class="ty-product-block-title" {live_edit name="product:product:{$product.product_id}"}>{$product.product nofilter}</h1>
                    {/if}
					
					
    {hook name="products:view_main_info"}
        {if $product}
		
            {assign var="obj_id" value=$product.product_id}
            {include file="common/product_data.tpl" product=$product but_role="big" but_text=__("add_to_cart")}
			{assign var="form_open" value="form_open_`$obj_id`"}
                {$smarty.capture.$form_open nofilter}
            <div class="ty-product-block__img-wrapper span4">
                {hook name="products:image_wrap"}
                    {if !$no_images}
                        <div class="ty-product-block__img cm-reload-{$product.product_id}" id="product_images_{$product.product_id}_update">

                            {assign var="discount_label" value="discount_label_`$obj_prefix``$obj_id`"}
                            {$smarty.capture.$discount_label nofilter}

                            {include file="views/products/components/product_images.tpl" product=$product show_detailed_link="Y" image_width=$settings.Thumbnails.product_details_thumbnail_width image_height=$settings.Thumbnails.product_details_thumbnail_height}
                        <!--product_images_{$product.product_id}_update--></div>
                    {/if}
                {/hook}

					{include file="views/products/components/manufacture.tpl" product_features=$product.product_features details_page=true}	
	
            </div>
			
            <div class="ty-product-block__left span6" style="display:none;">
                

            

   {assign var="selected_options" value="my_my_`$obj_id`"}
   {assign var="base_price" value=$product.MSRP}
   {assign var="base_price2" value=$product.WebPrice}

                {assign var="old_price" value="old_price_`$obj_id`"}
                {assign var="price" value="price_`$obj_id`"}
                {assign var="clean_price" value="clean_price_`$obj_id`"}
                {assign var="list_discount" value="list_discount_`$obj_id`"}
                {assign var="discount_label" value="discount_label_`$obj_id`"}
  {assign var="opcii_price" value="product_picked_options_`$obj_id`"}
                {hook name="products:promo_text"}
                {if $product.promo_text}
                <div class="ty-product-block__note">
                    {$product.promo_text nofilter}
                </div>
                {/if}
                {/hook}

				  
				
				
                <div class="{if $smarty.capture.$old_price|trim || $smarty.capture.$clean_price|trim || $smarty.capture.$list_discount|trim}prices-container {/if}price-wrap">

				
			 	
				
				
						
  <div class="ty-product-block__field-group">
                    {assign var="product_amount" value="product_amount_`$obj_id`"}
                    {$smarty.capture.$product_amount nofilter}

                    {assign var="qty" value="qty_`$obj_id`"}
                    {$smarty.capture.$qty nofilter}

                    {assign var="min_qty" value="min_qty_`$obj_id`"}
                    {$smarty.capture.$min_qty nofilter}
             </div>

		
				
				
				 {if $capture_options_vs_qty}{capture name="product_options"}{$smarty.capture.product_options nofilter}{/if}
                <div class="my_options">
				<div class="ty-product-block__option">
                    {assign var="product_options" value="product_options_`$obj_id`"}
                    {$smarty.capture.$product_options nofilter}
                </div>
				</div>
                {if $capture_options_vs_qty}{/capture}{/if}

              
				
				
	
	
	  <div class="ty-product-block__advanced-option">
                    {if $capture_options_vs_qty}{capture name="product_options"}{$smarty.capture.product_options nofilter}{/if}
                    {assign var="advanced_options" value="advanced_options_`$obj_id`"}
                    {$smarty.capture.$advanced_options nofilter}
                    {if $capture_options_vs_qty}{/capture}{/if}
                </div>

	
 
  
   
   

                </div>

               
                <div class="ty-product-block__sku">
                    {assign var="sku" value="sku_`$obj_id`"}
                    {$smarty.capture.$sku nofilter}
                </div>

                {if $capture_options_vs_qty}{capture name="product_options"}{$smarty.capture.product_options nofilter}{/if}

	                  
				
		
                </div>
                {if $capture_buttons}{/capture}{/if}

				
				
				
				<div class="span11">
    {hook name="products:main_info_title"}
                   

              
                {/hook}
				
<div class="product_block">

{if $product.full_description}
    <div {live_edit name="product:full_description:{$product.product_id}"}>{$product.full_description nofilter}</div>
{else if $product.short_description}
    <div {live_edit name="product:short_description:{$product.product_id}"}>{$product.short_description nofilter}</div>
{/if}
</div>
	
	<center>{include file="blocks/product_templates/NoPdfBuyLayerSmall.tpl"}</center>

				</div>
					
			
{**
<div class="span4" ><center>
<a href="/lower-price-garantee.html">
<img class="small-img-h" src="/images/low_price.png"></a>
</center>
</div>

<div class="span4" ><center>

<a href="/financing.html"><img class="small-img-h" src="/images/financing.png"></a>
</center>

</div>

<div class="span4" ><center>
<a class="warrantyUrl" href="http://outdoorinfraredsauna.com/warranty.html">
				<img class="small-img-h" src="http://outdoorinfraredsaunas.com/images/ManWar.jpg">			
				</a></center>
</div>


<div class="span3" ><center>
	<a class="warrantyUrl" href="http://outdoorinfraredsauna.com/90-day-risk-free-trial.html">
				<img class="small-img-h" src="http://outdoorinfraredsauna.com/images/companies/1/90-Day-Guarantee.jpeg" >		
				</a></center>
</div>
**}

        {/if}

    {/hook}
    </div>
{** block-description:description **}

<div class="GreyBg100 NoneMobile">
<center><h2>Sauna Dimensions</h2></center>

<div class="cm-tabs-content ty-tabs__content clearfix content-tabsh" id="tabs_content">
	<div id="content_tabh1" class="content-tabh1">

		<center><img src="/images/scatches/id_front/{$product.product_code}_front.png"></center>
	</div>
	
</div>

</div>
	
<div class="product_block">
<h3 class="SpecificationTitle">Specification</h3>
	
	{include file="views/products/components/product_features1.tpl" product_features=$product.product_features details_page=true}
	</div>

	<div class="GreyBg100 NoneMobile">
<center><h2>Heaters Specification</h2></center>

<div class="cm-tabs-content ty-tabs__content clearfix content-tabsh" id="tabs_content">
	<div id="content_tabh1" class="content-tabh1">
		<center><img src="/images/scatches/id_heater/{$product.product_code}_heater.png"></center>
	</div>
	
</div>

</div>	
	
	
	<div class="GreyBg100">
	{include file="views/products/components/product_features3.tpl" product_features=$product.product_features details_page=true}
</div>
	

	
	
	
	<div class="GreyBg100">
	
	
				{include file="views/products/components/product_features2.tpl" product_features=$product.product_features details_page=true}	
	
</div>
	
	{include file="blocks/product_templates/NoPdfBuyLayer.tpl"}
	

<div class="product-details">
</div>

{if isset($product_blog)}
<div class="GreyBg100">
	{$product_blog.blog_product_text nofilter}
	<a class="AllRev" href="{"pages.view?page_id=`$product_blog.page_id`"|fn_url}">All Reviews</a>
</div>
{/if}

{capture name="mainbox_title"}{assign var="details_page" value=true}{/capture}
