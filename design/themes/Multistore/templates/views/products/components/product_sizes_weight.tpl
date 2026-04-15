<div class="feature-specification-sizes-weight">
	<div class="row">
	{foreach from=$product_features item="feature"}		
		{if $feature.feature_type == "ProductFeatures::GROUP"|enum && $feature.subfeatures}
			{if $feature.feature_id==121 }
			<div class="col-md-8">
				<div class="item">
					<div class="info">
						{include file="common/subheader.tpl" title=$feature.description tooltip=$feature.full_description text=$feature.description}
						{include file="views/products/components/product_features.tpl" product_features=$feature.subfeatures}
					</div>
				</div>
			</div>
			{/if}					
			{if $feature.feature_id==30 }
			<div class="col-md-8">	 			
				<div class="item">
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
			<div class="col-md-8">	 			
				<div class="item">
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
			{if $feature.feature_id==55 }
			<div class="col-md-8">	 			
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