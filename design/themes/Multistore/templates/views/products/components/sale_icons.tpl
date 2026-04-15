<div class="row">
	<div class="col-8 col-lg-4 align-self-xl-center align-lg-center align-md-left">
		<div class="item item1">
			{if $smarty.session.sauna_type == 'outdoor'}{$smarty.session.domain_langs.ionizer_price}{else}{$smarty.session.domain_langs.indoor_ionizer_price}{/if} IONIZER<br/>
			<span class="grey-text">($149 VALUE)</span>
		</div>
	</div>	
	<div class="col-8 col-lg-4 align-self-xl-center align-lg-center align-md-left">
		<div class="item item2">
			{if $smarty.session.sauna_type == 'outdoor'}{$smarty.session.domain_langs.chromotherapy_price}{else}{$smarty.session.domain_langs.indoor_chromotherapy_price}{/if} CHROMOTHERAPY<br/>
			<span class="grey-text">($399 VALUE)</span>
		</div>
	</div>
	<div class="col-8 col-lg-4 align-self-xl-center align-lg-center align-md-left">	
		<div class="item item3">
			{__("discount_price_text")|replace:":discount":"$`$product.discounts.A`"}
		</div>
	</div>		
	{assign var=geo_product_text value=$product.shipping_price|fn_geo_product_text}
	{if $geo_product_text ne false}
	<div class="col-8 col-lg-4 align-self-xl-center align-lg-center align-md-left">
		<div class="item item4">
		{$geo_product_text nofilter}
		</div>
	</div>
	{/if}		
	<div class="col-8 col-lg-4 align-self-xl-center align-lg-center align-md-left">
		<div class="item item5">
			<b>Product code:</b> {$product.product_code}<br>
			{if !empty($product.upc)}
				<b>Upc:</b> {$product.upc}
			{/if}
		</div>
	</div>	
	{assign var="module_js" value="PDF/PDF_`$product.product_id`.pdf"}
	{if file_exists($module_js)}
		<div class="col-8 col-lg-4 align-self-xl-center align-lg-center align-md-left"> 	
			<div class="item item6">
				NEAR/MID/FAR<br/>
				<span class="grey-text">INFRARED WAVES</span>
			</div>
		</div>
	{/if}
	{assign var="module_js" value="PDF/PDF_`$product.product_id`.pdf"}
	{if file_exists($module_js) }
	<div class="col-8 col-lg-4 align-self-xl-center align-lg-center align-md-left">
		<a class="item item7 cm-dialog-opener cm-dialog-auto-size"  data-ca-view-id="download_ss" data-ca-target-id="download_ss" href="{"products.download_ss?product_id=`$product.product_id`"|fn_url}" data-ca-dialog-title="Download SPEC SHEET" rel="nofollow">
			Download SPEC SHEET<br/>
			<span class="grey-text">Click here</span>
		</a>
	</div>
	{/if}
	<div class="col-8 col-lg-4 align-self-xl-center align-lg-center align-md-left">
		<a class="item item8 cm-dialog-opener cm-dialog-auto-size"  data-ca-view-id="customize_this_sauna" data-ca-target-id="customize_this_sauna" href="{"products.customize_this_sauna?product_id=`$product.product_id`&product=`$product.product`"|fn_url}" data-ca-dialog-title="Customize This Sauna" rel="nofollow">
			Customize This Sauna<br/>
			<span class="grey-text">Click here</span>
		</a>
	</div>	
</div>