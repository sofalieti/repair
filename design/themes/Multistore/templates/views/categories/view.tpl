{hook name="categories:view"}
<nav class="categories-menu navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> Categories
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
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
<div id="category_products_{$block.block_id}" class="category-detail-page text-center text-md-left">
    <h1 class="default-main-title text-left">{$category_data.category}</h1>
    <div class="row align-items-center">
        <div class="col-md-4">
            {include file="common/image.tpl"
                show_detailed_link=false
                images=$category_data.main_pair
                no_ids=true
                image_width=400
            }
        </div>
        <div class="col-md-12">

            <div class="product-tabs">
                <ul class="nav nav-tabs nav-fill" id="productsTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="description-tab" data-toggle="tab" data-target="#description" role="tab" aria-controls="description" aria-selected="true">Work process</a>
                    </li>                 
                    <li class="nav-item">
                        <a class="nav-link" id="features-tab" data-toggle="tab" data-target="#features" role="tab" aria-controls="features" aria-selected="false">Description</a>
                    </li>                
                </ul>
                <div class="tab-content" id="productsTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">

                        <div class="description">
                            <b>Is there an issue with the {$category_data.category}?</b><br>
                            Please provide us with full information about the issue you’re experiencing. The more information you provide, the quicker we can get to fixing the problem.
                            <br><br>
                            <ul><li>
                                    1. There is a problem with your sauna</li><li>
                                    2. Take pictures, describe the problem</li><li>
                                    3. Label the cables</li><li>
                                    4. Write a check for $95 non-refundable diagnostic fee</li><li>
                                    5. Pack the broken parts and ship them to us</li><li>
                                    6. We diagnose the problem</li><li>
                                    7. We offer a solution </li></ul>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">

                        <div class="description">{$category_data.description nofilter}</div>
                    </div>

                </div>
            </div>


            <div class="buttons">
                <a data-ca-view-id="online_consult" data-ca-target-id="online_consult" data-ca-dialog-title="Consult" class="btn btn-primary cm-dialog-opener cm-dialog-auto-size mb-2 mb-md-0" href="{"categories.consult?category_id=`$category_data.category_id`&b_id=`$brand.brand_id`"|fn_url}"><i class="far fa-envelope"></i> Consult</a>
                <a data-ca-view-id="get-a-garanteed-solution-form" data-ca-target-id="get-a-garanteed-solution-form" data-ca-dialog-title="Get a garanteed solution for $95 only" class="btn btn-secondary cm-dialog-opener cm-dialog-auto-size mb-2 mb-md-0" href="{"categories.get_a_garanteed_solution?category_id=`$category_data.category_id`&b_id=`$brand.brand_id`"|fn_url}">Get a garanteed solution for $95 only</a>
            </div>
        </div>
    </div>
</div>

{/hook}
