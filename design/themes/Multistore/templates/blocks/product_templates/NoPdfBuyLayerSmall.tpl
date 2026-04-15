<div class="product_block">
 <div class="span4">    
<div class="product_code_new" >
		<div style="color:#000; padding-top:65px; text-align:center;"><span style="font-size:15px; font-weight:bold;">Product Code</span><br><span style="font-size:25px; font-weight:bold;">{$product.product_code}</span></div>
</div>







</div>
<div class="span8 pdf_price" >
<br>

<div class="span9">

 
			<!--<span class="tp1">M.S.R.P:<span class="tp2">${$base_price}<br></span></span>-->
			    {if $product.price ne $base_price2}<span class="tp3">Web Price:<span class="tp4">${$base_price2}</span></span><br>{/if}
				
				

              
					
                         {$smarty.capture.$selected_options nofilter}
				
              
               

	   {if $smarty.capture.$old_price|trim || $smarty.capture.$clean_price|trim || $smarty.capture.$list_discount|trim}
                    
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
					
					
			
			<div class="ty-product-block__price-actual">					
				<span class="">  
					<a class="cm-dialog-opener cm-dialog-auto-size ty-no-price" style="background-color: #584339;" data-ca-view-id="customize_this_sauna" data-ca-target-id="customize_this_sauna" href="{"products.customize_this_sauna?product_id=`$product.product_id`&product=`$product.product`"|fn_url}" data-ca-dialog-title="Customize This Sauna" rel="nofollow">Customize This Sauna</a>
				</span>
			</div>
			
</div>
</div>
<div class="span4" style="text-align:right;">

<div style="margin-top:22px;">
{assign var=price value = "SELECT price FROM ?:product_prices WHERE product_id = `$product.product_id`"|db_get_field} 
{assign var=web_price value=$product.list_price-$price}
<center>
	<br>
	{foreach $product.discounts as $discount_price}
	{if $discount_price > 0}
	<span style="font-size:45px;">{include file="common/price.tpl" value=$discount_price} OFF</span> <br>
	{__('discount_price_text')}<br>
	
	{break}
	{/if}
	{/foreach}
</center>
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