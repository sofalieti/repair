<div class="">
	<div class="feature-specification-block-1">
		{foreach from=$product_features item="feature"}
			{if $feature.feature_type == "ProductFeatures::GROUP"|enum && $feature.subfeatures}
				{if $feature.feature_id==121 }
				<div class="ty-product-feature-group ty-column3 label-big-width">
					<div class="item">
						<img src="/images/ex3.png"/>
						<div class="info">
							{include file="common/subheader.tpl" title=$feature.description tooltip=$feature.full_description text=$feature.description}
							{include file="views/products/components/product_features.tpl" product_features=$feature.subfeatures}
						</div>
					</div>
				</div>
				{/if}
						
				{if $feature.feature_id==30 }
				<div class="ty-product-feature-group ty-column3">	 			
					<div class="item">
						<img src="/images/ex1.png"/>
						<div class="info">
							{assign var=replace_height value=false}
							{if $smarty.session.sauna_type_image == 'indoor'}
							{assign var=replace_height value='76"'}
							{/if}
							{include file="common/subheader.tpl" title=$feature.description tooltip=$feature.full_description text=$feature.description}
							{include file="views/products/components/product_features.tpl" product_features=$feature.subfeatures replace_height=$replace_height}
						</div>
					</div>
				</div>
				{/if}
				
				{if $feature.feature_id==41 }
				<div class="ty-product-feature-group ty-column3">	 			
					<div class="item">
					<img src="/images/ex2.png"/>
						<div class="info">
							{assign var=replace_height value=false}
							{if $smarty.session.sauna_type_image == 'indoor'}
							{assign var=replace_height value='72"'}
							{/if}
							{include file="common/subheader.tpl" title=$feature.description tooltip=$feature.full_description text=$feature.description}
							{include file="views/products/components/product_features.tpl" product_features=$feature.subfeatures replace_height=$replace_height}
						</div>
					</div>	
				</div>
				{/if}
				
			{/if}
		{/foreach}
	</div>
	<div class="feature-specification-block-1">
		{foreach from=$product_features item="feature"}
			{if $feature.feature_type == "ProductFeatures::GROUP"|enum && $feature.subfeatures}
				{if $feature.feature_id==45 }
				<div class="ty-product-feature-group ty-column3 f-inline">	 			
					<div class="item">
						<img src="/design/themes/Multistore/media/images/sp2.png"/>
						<div class="info">
							{include file="common/subheader.tpl" title=$feature.description tooltip=$feature.full_description text=$feature.description}
							{include file="views/products/components/product_features.tpl" product_features=$feature.subfeatures}
						</div>
					</div>	
				</div>
				{/if}
			{/if}
		{/foreach}
		
		{foreach from=$product_features item="feature"}
			{if $feature.feature_type == "ProductFeatures::GROUP"|enum && $feature.subfeatures}
				{if $feature.feature_id==50 }
				<div class="ty-product-feature-group ty-column3 f-inline">	
         
					<div class="item">
						{include file="views/products/components/product_features4.tpl" product_features=$product.product_features details_page=true}	
						<div class="info">
							{include file="common/subheader.tpl" title=$feature.description tooltip=$feature.full_description text=$feature.description}
							{include file="views/products/components/product_features.tpl" product_features=$feature.subfeatures}
						</div>
					</div>	
				</div>
				{/if}
			{/if}
		{/foreach}
		{foreach from=$product_features item="feature"}
			{if $feature.feature_type == "ProductFeatures::GROUP"|enum && $feature.subfeatures}		
				{if $feature.feature_id==55 }
				<div class="ty-product-feature-group ty-column3 f-inline">	 			
					<div class="item">
						<img src="/design/themes/Multistore/media/images/sp3.png"/>
						<div class="info">
							{include file="common/subheader.tpl" title=$feature.description tooltip=$feature.full_description text=$feature.description}
							{include file="views/products/components/product_features.tpl" product_features=$feature.subfeatures}
						</div>
					</div>	
				</div>
				{/if}
			{/if}
		{/foreach}
	</div>
</div>