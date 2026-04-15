<noindex>
    <div class="product-switch-sauna-block">
        <a name="{$block.grid_id}" style="position: absolute; top: -100px;"></a>
        {if !empty($product.product_indoor_link)}
        {if $smarty.session.sauna_type_image != 'indoor'}
        <span>
            <a class="item" href="{$product.product_indoor_link}" rel="nofollow">Indoor</a>
        </span>
        {/if}
        {/if}
        {if !empty($product.product_sloope_roof_link)}
        {if $smarty.server.REQUEST_URI|strtok:"?" ne $product.product_sloope_roof_link}
        <span>
            <a class="item" href="{$product.product_sloope_roof_link}" rel="nofollow">Slope Roof</a>
        </span>
        {/if}
        {/if}
        {if !empty($product.product_peak_roof_link)}
        {if $smarty.server.REQUEST_URI|strtok:"?" ne $product.product_peak_roof_link || $smarty.session.sauna_type_image == 'indoor'}
        <span>
            <a class="item" href="{$product.product_peak_roof_link}" rel="nofollow">Peak Roof</a>
        </span>
        {/if}
        {/if}
    </div>
</noindex>