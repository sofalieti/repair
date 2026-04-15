<div class="brand-detail-page">
    <nav class="categories-menu navbar navbar-expand-md">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i> Categories
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-fill w-100">
                {foreach from=$categories item=c}
                    {assign var=subcategories value=fn_get_subcategories($c.category_id)}
                    <li class="nav-item {if $subcategories|@count}dropdown{/if}">

                        <a href="{"categories.view?category_id=`$c.category_id`&brand_id=`$brand.brand_id`"|fn_url}" class="nav-link {if $c.category_id == $category_data.category_id}active{/if} {if $subcategories|@count}dropdown-toggle{/if}" {if $subcategories|@count}id="dropdown_category_{$c.category_id}"{/if}>{$c.category}</a>

                        {if $subcategories|@count}
                            <div class="dropdown-menu" aria-labelledby="dropdown_category_{$c.category_id}">
                                {foreach from=$subcategories item=sc}
                                    <a class="dropdown-item" href="{"categories.view?category_id=`$sc.category_id`&brand_id=`$brand.brand_id`"|fn_url}">{$sc.category}</a>
                                {/foreach}
                            </div>    
                        {/if}
                    </li>
                {/foreach}
            </ul>
        </div>
    </nav>
    <div class="brand-info">
        <h1 class="default-main-title">{$brand.name}</h1>
        <div class="row align-items-center">
            {if $brand.main_pair}
                <div class="col-md-3">
                    {include file="common/image.tpl"
                        show_detailed_link=false
                        images=$brand.main_pair
                        no_ids=true
                        image_width=200
                    }
                </div>
            {/if}
            <div class="col-md-{if $brand.main_pair}13{else}16{/if}">
                <div class="description">
                    The make and model of a sauna will have a significant impact on what parts are best to use for major and minor fixes.<br><br>
                    {$brand.name} is a known manufacturer of infrared saunas and infrared sauna parts. <br>
                    Whatever the problem your sauna is we can fix it.<br>
                    If you don’t know what make and model you’ve got, please submit images so that we can deduct it for you. <br><br>
Some parts that need repair are generic, whilst other ones are brand-specific, in any case we will be happy to assist you.

                </div>
            </div>
        </div>
    </div>
    <div class="brand-categories">
        <div class="row">
            {foreach from=$categories item=category}
                {assign var=subcategories value=fn_get_subcategories($category.category_id)}
                
                {if $subcategories|@count}
                {foreach from=$subcategories item=sc}
                <div class="col-md-20p col-sm-4 col-8 text-center item-block">
                    <a href="{"categories.view?category_id=`$sc.category_id`&brand_id=`$brand.brand_id`"|fn_url}">
                        {include file="common/image.tpl"
                            show_detailed_link=false
                            images=$sc.main_pair
                            no_ids=true
                            image_width=100
                            image_height=100
                        }<br/>
                        {$sc.category}
                    </a>
                </div>
                {/foreach}
                {else}
                <div class="col-md-20p col-sm-4 col-8 text-center item-block">
                    <a href="{"categories.view?category_id=`$category.category_id`&brand_id=`$brand.brand_id`"|fn_url}">
                        {include file="common/image.tpl"
                            show_detailed_link=false
                            images=$category.main_pair
                            no_ids=true
                            image_width=100
                            image_height=100
                        }<br/>
                        {$category.category}
                    </a>
                </div>    
                {/if}
            {/foreach}
        </div>
    </div>
</div>