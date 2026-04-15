<div class="AfterText">
    				<div class="">
			

<div class="bot2">
<div class="registrbox">
    	<div class="registr2  icon1"><br>
<p><strong>Product Code:</strong>
{$product.product_code}</P>

	</div>	

<div class="registr2  icon2">
 {assign var=geo_product_text value=$product.shipping_price|fn_geo_product_text}
    {if $geo_product_text ne false}

			{$geo_product_text nofilter}

	{/if}

	</div>	
{assign var="module_js" value="PDF/PDF_`$product.product_id`.pdf"}
{if file_exists($module_js) }
<a href="/PDF/PDF_{$product.product_id}.pdf" >
<div class="registr2  icon3">
				
					<br><strong>Download SPEC SHEET</strong>
				
	</div>	</a>
{/if}





					<a class="cm-dialog-opener cm-dialog-auto-size"  data-ca-view-id="customize_this_sauna" data-ca-target-id="customize_this_sauna" href="{"products.customize_this_sauna?product_id=`$product.product_id`&product=`$product.product`"|fn_url}" data-ca-dialog-title="Customize This Sauna" rel="nofollow">
	 <div class="registr2 icon4">			
<br><strong>Customize This Sauna</strong>


	</div>	</a>

</div></div>	




     {if $smarty.capture.$price|trim}
<div class="bot3">
<div class="knop">
                        <div class="ty-product-block__price-actual">
    				{$smarty.capture.$price nofilter}
                        </div> </div></div>
                    {/if}	



 

		
		
		
	            </div>
			</div>
			<br><br>