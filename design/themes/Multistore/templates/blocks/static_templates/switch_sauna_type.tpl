<noindex>
<a name="{$block.grid_id}" style="position: absolute; top: -100px;"></a>
{if $smarty.session.sauna_type == 'indoor'}
<a class="item" href="{"sauna_types.switch?sauna_type=outdoor&anchor=`$block.grid_id`"|fn_url}" rel="nofollow">Outdoor</a>
<div class="active">Indoor</div>
{else}
<div class="active">Outdoor</div>
<a class="item" href="{"sauna_types.switch?sauna_type=indoor&anchor=`$block.grid_id`"|fn_url}" rel="nofollow">Indoor</a>
{/if}
</noindex>