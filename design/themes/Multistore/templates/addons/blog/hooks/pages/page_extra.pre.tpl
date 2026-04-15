{if $page.page_type == $smarty.const.PAGE_TYPE_BLOG}
<div class="reviews-page">
{if $subpages}
    {if $subpages|@count eq 1}{*Для категорий отзывов*}
    {capture name="mainbox_title"}{/capture}
    <div class="container">
        <div class="ty-blog blog-list">
            {include file="common/pagination.tpl"}
            {foreach from=$subpages item="subpage"}		
                <h1 class="default-main-title text-center mt-5">{$subpage.page}</h1>
                <div class="row justify-content-center">
                    {assign var=childs value=$subpage.page_id|fn_get_child_pages}
                    {foreach from=$childs item=child}
                    <div class="col-md-3">
                        <div class="item text-center">
                            {if $child.main_pair}
                            <a href="{"pages.view?page_id=`$child.page_id`"|fn_url}">
                                {include file="common/image.tpl" image_width="300" obj_id=$child.page_id images=$child.main_pair}
                            </a>
                            {/if}
                            <a href="{"pages.view?page_id=`$child.page_id`"|fn_url}">
                                <h3 class="review-title">{$child.page}</h3>
                            </a>
                        </div>
                    </div>
                    {/foreach}
                </div>
            {/foreach}
            {include file="common/pagination.tpl"}
        </div>
    </div>
    {else}{*Для отзывов*}
    <div class="reviews-list reviews-grid">
        <div class="container">
            <div class="row">
                {foreach from=$subpages item="subpage"}
                <div class="col-lg-8">
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-7 col-md-5 col-sm-6 col-7">
                                <div class="image">
                                    <img data-zoom-image="{$subpage.main_pair.detailed.image_path}" src="{$subpage.main_pair.detailed.image_path}"/>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-11 col-sm-10 col-9">
                                <div class="info">
                                    <h4>{$subpage.page}</h4>
                                    <div class="description">{$subpage.description|strip_tags}</div>
                                    <a class="btn btn-primary" href="{"products.view?product_id=`$subpage.blog_product_id`"|fn_url}">View Product</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {/foreach}
            </div>
        </div>
    </div>
    {/if}
{/if}
</div>
{literal}
<script src='/js/lib/elevatezoom-master/jquery.elevatezoom.js'></script>
<script type="text/javascript">
$(document).ready(function(){
    if($('body').width() > 768){
        if($('img[data-zoom-image]').length) $('img[data-zoom-image]').elevateZoom({zoomWindowHeight: 300, zoomWindowWidth:300});
    }
});
</script>
{/literal}
{/if}