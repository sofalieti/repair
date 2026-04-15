<div class="MyWhiteLayer">
    <div class="registrbox">
        <div class="registr2  icon1"><br>
            <span class="DownText"><b>Product code:</b> {$product.product_code}</span><br>


            {if !empty($product.upc)}
                <span class="DownText"><b>Upc:</b> {$product.upc}</span>

            {/if}
        </div>	

        <div class="registr2  icon2">
            {assign var=geo_product_text value=$product.shipping_price|fn_geo_product_text}
            {if $geo_product_text ne false}
                <br>
                {$geo_product_text nofilter}

            {/if}

        </div>	
        {assign var="module_js" value="PDF/PDF_`$product.product_id`.pdf"}
        {if file_exists($module_js) }
            <a class="cm-dialog-opener cm-dialog-auto-size"  data-ca-view-id="download_ss" data-ca-target-id="download_ss" href="{"products.download_ss?product_id=`$product.product_id`"|fn_url}" data-ca-dialog-title="Download SPEC SHEET" rel="nofollow">
                <div class="registr2  icon3">    			
                    <br><span class="UpText">Download SPEC SHEET</span>
                    <br><span class="DownText">Click here</P></span>
                </div>	
            </a>
        {/if}





        <a class="cm-dialog-opener cm-dialog-auto-size"  data-ca-view-id="customize_this_sauna" data-ca-target-id="customize_this_sauna" href="{"products.customize_this_sauna?product_id=`$product.product_id`&product=`$product.product`"|fn_url}" data-ca-dialog-title="Customize This Sauna" rel="nofollow">

            <div class="registr2  icon4">
                <br><span class="UpText">Customize This Sauna</span>
                <br><span class="DownText">Click here</P></span>
            </div>	</a>


    </div>

    {if $smarty.capture.$price|trim}
        <div class="knop">
            <div class="ty-product-block__price-actual">
                {$smarty.capture.$price nofilter}
            </div> </div>
        {/if}		



</div>



