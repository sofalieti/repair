<div class="AfterText">
					<div class="">
			
 <div class="span3">    
<div class="product_code_new" >
		<div style="color:#000; padding-top:65px; text-align:center;"><span style="font-size:15px; font-weight:bold;">Product Code</span><br><span style="font-size:25px; font-weight:bold;">{$product.product_code}</span></div>
</div>







</div>
<div class="span10">
<h3 style="font-size:35px; margin-top:60px; font-weight:100; font-family:calibri; text-align:center;">{$product.product nofilter}</h3>
</div>
<div class="span3 pdf_price" >
 <span class="PriceH"></span><br>

 

                    {if $smarty.capture.$price|trim}
                        <div class="ty-product-block__price-actual">
					{$smarty.capture.$price nofilter}
                        </div>
                    {/if}		
					
					
					<div class="ty-product-block__price-actual">
		    <span class=""	>
                               
                                   
				   
                                                

                        </span>      



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
			</div>
			<br><br>