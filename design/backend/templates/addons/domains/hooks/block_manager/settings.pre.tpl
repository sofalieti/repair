<div class="control-group">
	<label class="control-label">Domain</label>
	<div class="controls">
		<select name="block_data[description][domain]">
			<option value="">All</option>
			{foreach from=""|fn_domains_get_all item=domain}
			<option value="{$domain.name}" {if $block.domain eq $domain.name}selected{/if}>{$domain.name}</option>
			{/foreach}
		</select>
	</div>
</div>