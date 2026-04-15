{foreach from=$product_features_in item="feature_in"}

		

{if $feature_in.value == Y && $feature_in.feature_id ne 127}

<div style="font-size:14px; color:#555; height:220px;  width:20%; padding:2%; display:inline-block">
<center>
<font face="Open Sans">{$feature_in.description}</font><br>
   
    <img height="130px" width="130px" src="https://outdoorinfraredsauna.com/images/smallfeatures/featureimagecontent_{$feature_in.feature_id}_notes.png">
</center>
{/if}
	
</div>

{/foreach}

