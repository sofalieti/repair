
<td  class="NoneMobile">
<table class="Feature_tabletos">
{foreach from=$product_features item="feature"}
	{if $feature.feature_id == 30}
		{foreach from=$feature.subfeatures item=subfeature}			
		<tr><td><strong>{$subfeature.description}</strong></td><td>: {$subfeature.value}</td></tr>	
		{/foreach}		
	{/if}
{/foreach}
</table>
</td>
<td  class="NoneMobile">
<table class="Feature_tabletos">
{foreach from=$product_features item="feature"}
	{if $feature.feature_id == 41}
		{foreach from=$feature.subfeatures item=subfeature}			
		<tr><td><strong>{$subfeature.description}</strong></td><td>: {$subfeature.value}</td></tr>	
		{/foreach}		
	{/if}
{/foreach}
</table>
</td>
<td  class="NoneMobile">
<table class="Feature_tabletos">
{foreach from=$product_features item="feature"}
	{if $feature.feature_id == 45}
		{foreach from=$feature.subfeatures item=subfeature}			
		<tr><td><strong>{$subfeature.description}</strong></td><td>: {$subfeature.value}</td></tr>
		{/foreach}		
	{/if}
{/foreach}
</table>
</td>
<td  class="NoneMobile">
<table class="Feature_tabletos">
{foreach from=$product_features item="feature"}
	{if $feature.feature_id == 50}
		{foreach from=$feature.subfeatures item=subfeature}			
		<tr><td><strong>{$subfeature.description}</strong></td><td>: {$subfeature.value}</td></tr>	
		{/foreach}		
	{/if}
{/foreach}
</table>
</td>

