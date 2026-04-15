<style type="text/css">
.ty-product-feature__label, .ty-product-feature__value{
	width: 46%;
	float: left;
	margin: 0 2%;
	font-size: 14px;
        font-family:Open Sans;
}
.ty-product-feature-group{
	overflow: hidden;
}
.ty-product-feature-group .ty-product-feature{
	float: left;
    width: 100%;
    padding: 3px;
}

.ty-product-feature-group .ty-product-feature{
	background: #f9f9f9;
}

.ty-product-feature-group .ty-product-feature:nth-child(odd){

	background: #ffffff;
}



.f-group{
	border: 1px solid #f5f5f5;
}
.f-group h2{
	margin-left: 10px;
}
</style>
<div style="width: 66%; float: left;" class="f-list">
	<div class="span10" >
		<div class="span8 Features0001 f-group" style="width: 47%; margin: 1%; float: left;">
			{foreach from=$product_features item="feature"}
				{if $feature.feature_type == "ProductFeatures::GROUP"|enum && $feature.subfeatures}
					{if $feature.feature_id==45 }
						<div class="ty-product-feature-group span16 ">		
							{*include file="common/subheader.tpl" title=$feature.description tooltip=$feature.full_description text=$feature.description*}
							<font face="Open Sans"><h2 style="text-transform:uppercase; font-size:14px;font-weight:normal;">{$feature.description}</h2></font>
							{include file="products/product_features.tpl" product_features=$feature.subfeatures}		
						</div>
					{/if}
				{/if}
			{/foreach}
		</div>
		<div class="span8 Features0001 f-group" style="width: 47%; margin: 1%; float: left;">
				{include file="products/product_features4.tpl" product_features=$product.product_features details_page=true}	
				{foreach from=$product_features item="feature"}
					{if $feature.feature_type == "ProductFeatures::GROUP"|enum && $feature.subfeatures}
						{if $feature.feature_id==50 }
							<div class="ty-product-feature-group span16 ">
						
								{*include file="common/subheader.tpl" title=$feature.description tooltip=$feature.full_description text=$feature.description*}
								<font face="Open Sans"><h2 style="text-transform:uppercase; font-size:14px; font-weight:normal;">{$feature.description}</h2></font>
								{include file="products/product_features.tpl" product_features=$feature.subfeatures}
						
							</div>
						{/if}
					{/if}
				{/foreach}
		</div>
		<div class="span16 Features0001 f-group" style="width: 97%; margin: 1%; float: left;">
			{foreach from=$product_features item="feature"}
				{if $feature.feature_type == "ProductFeatures::GROUP"|enum && $feature.subfeatures}
					{if $feature.feature_id==55 }
						<div class="ty-product-feature-group span16 ">		
							{*include file="common/subheader.tpl" title=$feature.description tooltip=$feature.full_description text=$feature.description*}
							<font face="Open Sans"><h2  style="text-transform:uppercase; font-size:14px;font-weight:normal;">{$feature.description}</h2></font>
							{include file="products/product_features.tpl" product_features=$feature.subfeatures}		
						</div>
					{/if}
				{/if}
			{/foreach}
		</div>
	</div>
</div>
<div class="span6 Features0001"  style="width: 33%; float: left;">
	{foreach from=$product_features item="feature"}
		{if $feature.feature_type == "ProductFeatures::GROUP"|enum && $feature.subfeatures}
			{if $feature.feature_id==121 }
			<div class="ty-product-feature-group span14  f-group"  style="width: 98%; margin: 1%; float: left;">		
				{*include file="common/subheader.tpl" title=$feature.description tooltip=$feature.full_description text=$feature.description*}
			<font face="Open Sans">	<h2  style="text-transform:uppercase; font-size:14px;font-weight:normal;">{$feature.description}</h2></font>
				{include file="products/product_features.tpl" product_features=$feature.subfeatures}		
			</div>
			{/if}
			{if $feature.feature_id==30 }
			{assign var=replace_height value=false}
			{if $sauna_type == 'indoor'}
			{assign var=replace_height value='76"'}
			{/if}
			<div class="ty-product-feature-group span8  f-group"  style="width: 47%; margin: 1%; float: left;">
				{*include file="common/subheader.tpl" title=$feature.description tooltip=$feature.full_description text=$feature.description*}
			<font face="Open Sans">	<h2  style="text-transform:uppercase; font-size:14px;font-weight:normal;">{$feature.description}</h2></font>
				{include file="products/product_features.tpl" product_features=$feature.subfeatures replace_height=$replace_height}		
			</div>
			{/if}
			{if $feature.feature_id==41 }
			{assign var=replace_height value=false}
			{if $sauna_type == 'indoor'}
			{assign var=replace_height value='72"'}
			{/if}
			<div class="ty-product-feature-group span7  f-group"  style="width: 47%; margin: 1%; float: left;">	
						
				{*include file="common/subheader.tpl" title=$feature.description tooltip=$feature.full_description text=$feature.description*}
			<font face="Open Sans">	<h2  style="text-transform:uppercase; font-size:14px;font-weight:normal;">{$feature.description}</h2></font>
				{include file="products/product_features.tpl" product_features=$feature.subfeatures replace_height=$replace_height}
		
			</div>
			{/if}		
		{/if}
	{/foreach}
</div>
