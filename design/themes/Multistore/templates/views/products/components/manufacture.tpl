

{foreach from=$product_features item="feature"}
{if ($feature.feature_id == 127) || ($feature.feature_id == 128)}

{if $feature.parent_id != 110 }
{if $feature.value == "Y"}
    {if $feature.feature_type != "ProductFeatures::GROUP"|enum}
        <div style="float:left; width:100%; text-align:center">
		
		<center><img class="Round_feature2" src="/images/smallfeatures/featureimagecontent_{$feature.feature_id}_notes.png"> </center>
		

     
   
        </div>
    {/if}
	{/if}
	{/if}
	{/if}
{/foreach}
