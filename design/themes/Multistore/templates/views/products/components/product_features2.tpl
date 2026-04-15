<div class="row">
{foreach from=$product_features item="feature"}
    {if ($feature.feature_id != 127) && ($feature.feature_id != 128)}
        {if $feature.parent_id != 110 }
            {if $feature.value == "Y"}
                {if $feature.feature_type != "ProductFeatures::GROUP"|enum}
                    <div class="col-8 col-md-4 col-xl-2 item-block">
                        <div class="item">
                            <img class="img-fluid" src="/images/smallfeatures/featureimagecontent_{$feature.feature_id}_notes.png"/><br/>
                            <div class="name">{$feature.description nofilter}</div>
                        </div>
                    </div>
                {/if}
            {/if}
	{/if}
    {/if}
{/foreach}
</div>

