<div class="brand-list-page">
    <div class='brands-abc'>
        {foreach from=$ABC item=letter}
        {if in_array($letter, $current_letters)}
        <a class='btn btn-primary {if $active_letter == $letter}active{/if}' href='{$smarty.server.REQUEST_URI|strtok:"?"}?letter={$letter}'>{$letter}</a>
        {/if}
        {/foreach}
    </div>
    <div class="row">
        {foreach from=$brands item=brand}
        <div class="col-md-4 col-sm-33p col-8 text-center brand-item">
            <a href="{"brands.view?brand_id=`$brand.brand_id`"|fn_url}">
                {include file="common/image.tpl"
                        show_detailed_link=false
                        images=$brand.main_pair
                        no_ids=true
                        image_width=100
                        image_height=80
                }<br/>
                {$brand.name}
            </a>
        </div>
        {/foreach}
    </div>
</div>

{capture name="mainbox_title"}Brands{/capture}