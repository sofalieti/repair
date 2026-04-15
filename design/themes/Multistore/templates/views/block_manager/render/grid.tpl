{if $layout_data.layout_width != "fixed"}
    {if $parent_grid.width > 0}
        {$fluid_width = fn_get_grid_fluid_width($layout_data.width, $parent_grid.width, $grid.width)}
    {else}
        {$fluid_width = $grid.width}
    {/if}
{/if}



{if $grid.status == "A" && $content}
        {$width = $fluid_width|default:$grid.width}
        <div class="{if $width == 16}{$grid.user_class}{else}col-lg-{$width}{if $grid.offset} offset{$grid.offset}{/if} {$grid.user_class}{/if}" >
                {$content nofilter}
        </div>
{/if}