
{foreach from=$product_features item="feature"}
{if $feature.feature_id == 2 || $feature.feature_id == 1 || $feature.feature_id == 3 || $feature.feature_id == 34 || $feature.feature_id == 35 }
{if $feature.value == "Y"}
    
				<img style="float:right; width:100px; height:100px;" src="/images/smallfeatures/featureimagecontent_{$feature.feature_id}_notes.png">
    
	{/if}
	{/if}
{/foreach}


