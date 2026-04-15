{script src="js/tygh/exceptions.js"}
<div class="ty-product-block ty-product-detail fullproduct">
    <div class="ty-product-block__wrapper clearfix">
    {hook name="products:view_main_info"}
        {if $product}
		{$my_category_image = fn_get_image_pairs($product.main_category, 'category', 'M', true, true, 'en')}
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

                             <img src="{$product.main_pair.detailed.image_path}" width="280">

	<div class="rain_covers_icon" style="right:-15px; bottom:-15px;">

<img src="{$my_category_image.detailed.image_path}" style="width:150px">

</div>
                        <!--product_images_{$product.product_id}_update--></div>
                    {/if}
                {/hook}
            </div>
            <div class="ty-product-block__left span6">
                

                {hook name="products:main_info_title"}
                    {if !$hide_title}
                        <h1 class="ty-product-block-title" {live_edit name="product:product:{$product.product_id}"}>{$product.product nofilter}</h1>
                    {/if}

                    {hook name="products:brand"}
                        <div class="brand">
                            {include file="views/products/components/product_features_short_list.tpl" features=$product.header_features}
                        </div>
                    {/hook}
                {/hook}

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

		
				
			
				
				
	
	
	  <div class="ty-product-block__advanced-option">
                    {if $capture_options_vs_qty}{capture name="product_options"}{$smarty.capture.product_options nofilter}{/if}
                    {assign var="advanced_options" value="advanced_options_`$obj_id`"}
                    {$smarty.capture.$advanced_options nofilter}
                    {if $capture_options_vs_qty}{/capture}{/if}
                </div>

	
 
  
   
   

                </div>

               
              

                {if $capture_options_vs_qty}{capture name="product_options"}{$smarty.capture.product_options nofilter}{/if}

	                  
				
		
                </div>
                {if $capture_buttons}{/capture}{/if}

				
				
				
				<div class="span5">

				



 
				
				
	             {if $smarty.capture.$old_price|trim || $smarty.capture.$clean_price|trim || $smarty.capture.$list_discount|trim}
              
					
                            {if $smarty.capture.$old_price|trim}{$smarty.capture.$selected_options nofilter}&nbsp;{/if}
						
                    {/if}
				
               

	   {if $smarty.capture.$old_price|trim || $smarty.capture.$clean_price|trim || $smarty.capture.$list_discount|trim}
                        <div class="ty-product-prices">
						
                            {if $smarty.capture.$old_price|trim}{$smarty.capture.$old_price nofilter}&nbsp;{/if}
							
                    {/if}


                    {if $smarty.capture.$old_price|trim || $smarty.capture.$clean_price|trim || $smarty.capture.$list_discount|trim}
                            {$smarty.capture.$clean_price nofilter}<br>
                            {$smarty.capture.$list_discount nofilter}
                        </div>
                    {/if}

                {if $capture_options_vs_qty}{/capture}{/if}

                {assign var="product_edp" value="product_edp_`$obj_id`"}
                {$smarty.capture.$product_edp nofilter}

                {if $show_descr}
                {assign var="prod_descr" value="prod_descr_`$obj_id`"}
                    <h3 class="ty-product-block__description-title">{__("description")}</h3>
                    <div class="ty-product-block__description">{$smarty.capture.$prod_descr nofilter}</div>
                {/if}	

                    {if $smarty.capture.$price|trim}
                        <div class="ty-product-block__price-actual">
					{$smarty.capture.$price nofilter}
                        </div>
                    {/if}				

				</div>
					
			



				
				
					<div class="button_layer">
			
 <div class="span10">    
<div class="product_code_new" >
		<div style="color:#000; padding-top:65px; text-align:center;"><span style="font-size:15px; font-weight:bold;">Product Code</span><br><span style="font-size:25px; font-weight:bold;">{$product.product_id}</span></div>
</div>
 <div class="lowPrice"><a href="/lower-price-garantee.html">
<img class="small-img-h" src="/images/low_price.png"></a>
</div>
<div class="lowPrice">
<a href="/financing.html"><img class="small-img-h" src="/images/financing.png"></a>

</div>




</div>


<div class="span6" style="text-align:right;">
                 


                {if $capture_buttons}{capture name="buttons"}{/if}
                <div class="ty-product-block__button">
                    {if $show_details_button}
                        {include file="buttons/button.tpl" but_href="products.view?product_id=`$product.product_id`" but_text=__("view_details") but_role="submit"}
                    {/if}

                    {assign var="add_to_cart" value="add_to_cart_`$obj_id`"}
                    {$smarty.capture.$add_to_cart nofilter}

                    {assign var="list_buttons" value="list_buttons_`$obj_id`"}
                    {$smarty.capture.$list_buttons nofilter}
					</div>
			
		</div>		
		
		
		
		
                {assign var="form_close" value="form_close_`$obj_id`"}
                {$smarty.capture.$form_close nofilter}

                {hook name="products:product_detail_bottom"}
                {/hook}

                {if $show_product_tabs}
                {include file="views/tabs/components/product_popup_tabs.tpl"}
                {$smarty.capture.popupsbox_content nofilter}
                {/if}
            </div>
        {/if}

    {/hook}
    </div>
{** block-description:description **}
<div class="product_block">


</div>

	
	
    {if $smarty.capture.hide_form_changed == "Y"}
        {assign var="hide_form" value=$smarty.capture.orig_val_hide_form}
    {/if}


</div>

<div class="product-details">
</div>

{capture name="mainbox_title"}{assign var="details_page" value=true}{/capture}

