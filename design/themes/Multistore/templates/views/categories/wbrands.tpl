<div class="container mb-5">
    <div class="letters text-center mb-4">
    {foreach from=$ABC item=letter1} 
        <a href="{"categories.wbrands?letter=`$letter1`"|fn_url}" class="{if $letter eq $letter1}active{/if} {if !$letter1|in_array:$current_letters}disabled{/if}" {if !$letter1|in_array:$current_letters}onclick="return false;"{/if}>{$letter1}</a>
    {/foreach}
    </div>
    <div class="brands-list row justify-content-center">
            {foreach from=$products item=product}
            <div class="col-lg-3 col-md-4  col-sm-8 item-col">
                <div class="item text-center default-shadow-2">
                    <span>{$product.product}</span><br/>
                    {if $product.main_pair && $product.main_pair.detailed}
                            {include file="common/image.tpl"
                                    show_detailed_link=false
                                    images=$product.main_pair
                                    no_ids=true
                                    image_width=100
                                    image_height=76
                            }
                    {else}
                    <img src="/images/ComingSoon.jpg">
                    {/if}
                </div>
            </div>
            {/foreach}
    </div>
</div>
    
{capture name="mainbox_title"}Brands{/capture}
