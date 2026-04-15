<div class="feature-specification-features">
	<div class="row">
		{foreach from=$product_features item="feature"}
			{if $feature.feature_type == "ProductFeatures::GROUP"|enum && $feature.subfeatures}
				{if $feature.feature_id==45 }
				<div class="col-md-16">	 			
					<div class="item">
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