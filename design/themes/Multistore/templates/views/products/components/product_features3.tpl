<div >
<h3 class="SpecificationTitle">Optional Upgrade</h3>
{foreach from=$product_features item="feature"}

{if $feature.parent_id == 110 }
     {if $feature.value == "Y"}

         {if $feature.feature_type != "ProductFeatures::GROUP"|enum}
        <div class="ty-product-feature span4 razdel" style="min-height:250px; float:left">

   		     <table width="100%"><tr><td width="70%">{$feature.description nofilter}</td><td>			<center><img class="Round_feature" src="/images/smallfeatures/featureimagecontent_{$feature.feature_id}_notes.png"> </center></td></tr></table>

		    <div class="FeatureDotted">.&nbsp;&nbsp;&nbsp; .&nbsp;&nbsp;&nbsp; .</div>
		    {$feature.full_description nofilter}




        </div>
        {/if}
       {/if}
	{/if}
{/foreach}

</div>