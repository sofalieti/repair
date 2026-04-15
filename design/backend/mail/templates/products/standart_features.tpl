	
	<h3 class="SpecificationTitle" style="font-size: 31px;margin-top:50px; text-align: center; font-family:Open Sans; font-weight:normal; color:#555;"><font face="Open Sansl">Optional Features</font></h3>	
<center><div style="border-radius:1000px; background-color:#eeeeee; height:20px; width:20px;"></div></center>
			<table style="width:1000px;"><tr>
	{foreach from=$product_features item="feature"}
	
	{if $feature.feature_type == "ProductFeatures::GROUP"|enum && $feature.subfeatures}
		
		{if $feature.feature_id==110 }
		{include file="products/standart_features_in.tpl" product_features_in=$feature.subfeatures}		
		{/if}
		
		{/if}
	  
	
	{/foreach}
	
	</tr></table>
		<div style="width:100%; height:20px; float:left;"></div>
		
		
	<h3 class="SpecificationTitle" style="font-size: 31px;margin-top:0; text-align: center; font-family:Open Sans; font-weight:normal; color:#555;"><font face="Open Sans">Standard Features</font></h3>	
<center><div style="border-radius:1000px; background-color:#eeeeee; height:20px; width:20px;"></div></center>


	{foreach from=$product_features item="feature"}
	
	{if $feature.feature_type == "ProductFeatures::GROUP"|enum && $feature.subfeatures}
		
		{if $feature.feature_id==124 }
		
		{include file="products/standart_features_in.tpl" product_features_in=$feature.subfeatures}		
		{/if}
		
		{/if}
	  
	
	{/foreach}
