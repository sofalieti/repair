<div class="GreyBg100 paddfoic">
    <div class="registrbox">
        <div class="registr2  icon5"><br><br>
            <span class="UpText "><b>{if $smarty.session.sauna_type == 'outdoor'}{$smarty.session.domain_langs.ionizer_price}{else}{$smarty.session.domain_langs.indoor_ionizer_price}{/if}</b> IONIZER<br></span>
            <span class="DownText zac">($149 VALUE)</span>
        </div>	
        <div class="registr2  icon6">
            <br><br>
            <span class="UpText"><b>{if $smarty.session.sauna_type == 'outdoor'}{$smarty.session.domain_langs.chromotherapy_price}{else}{$smarty.session.domain_langs.indoor_chromotherapy_price}{/if}</b> CHROMOTHERAPY<br></span>
            <span class="DownText zac">($399 VALUE)</span>
        </div>	
        {assign var="module_js" value="PDF/PDF_`$product.product_id`.pdf"}
        {if file_exists($module_js)}
            <div class="registr2  icon7">  <br>  			
                <br><span class="UpText">NEAR/MID/FAR</span>
                <br><span class="DownText">INFRARED WAVES</span>
            </div>
        {/if}
        <a class="cm-dialog-opener cm-dialog-auto-size"  data-ca-view-id="customize_this_sauna" data-ca-target-id="customize_this_sauna" href="{"products.customize_this_sauna?product_id=`$product.product_id`&product=`$product.product`"|fn_url}" data-ca-dialog-title="Customize This Sauna" rel="nofollow">				
            <div class="registr2  icon8"><br>
                {__("discount_price_text")|replace:":discount":"$`$product.discounts.A`"}	
            </div>	
        </a>
    </div>

    {if $smarty.capture.$price|trim}
        <div class="knop">
            <div class="ty-product-block__price-actual">
                {$smarty.capture.$price nofilter}
            </div> 
        </div>
    {/if}
</div>