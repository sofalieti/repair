{assign var=products value=$items}
{if $products}
    <div class="row">
    {foreach from=$products item=product key=key name="products"}
        <div class="col-lg-2dot4 col-md-4 col-sm-8 text-center item-col">
            <div class="item default-shadow-2">
                <span>{$product.product}</span><br/>
                {if $product.main_pair && $product.main_pair.detailed}
                    {include file="common/image.tpl"
                                show_detailed_link=false
                                images=$product.main_pair
                                no_ids=true
                                image_width=200
                    }
                {else}
                    <img src="/images/ComingSoon.jpg">
                {/if}
            </div>
        </div>
    {/foreach}
    </div>
{/if}

{capture name="mainbox_title"}{$title}{/capture}
