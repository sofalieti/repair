{if $product}
    {assign var="obj_id" value=$product.product_id}
    {include file="common/product_data.tpl" product=$product but_role="big" but_text=__("add_to_cart")}
    <div class="container main-product-section">
        <h1 class="product-title" {live_edit name="product:product:{$product.product_id}"}>{$product.product nofilter}  - For Infrared Sauna</h1>
        <div class="row">
            <div class="col-md-5 text-center text-md-left">
                {include file="common/image.tpl"
                    show_detailed_link=false
                    images=$product.main_pair
                    no_ids=true
                    image_width=250
                }
            </div>
            <div class="col-md-11">
                <div class="ty-product-block__description">{$product.full_description nofilter}</div>
                <a class="cm-dialog-opener cm-dialog-auto-size btn btn-primary request-price-btn" data-ca-view-id="contact_us_for_a_price_{$product.product_id}" data-ca-target-id="contact_us_for_a_price_{$product.product_id}" href="{"products.contact_us_for_a_price&product_id=`$product.product_id`&product=`$product.product`"|fn_url}" data-ca-dialog-title="Adapters - Sauna Repair Request" rel="nofollow">
                    Adapters - Sauna Repair Request
                </a>
            </div>
        </div>
    </div>
    <div class="section-grey pb-5 pt-5 product-feedback-forms">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 mb-3 mb-md-0">
                    <div class="item default-shadow-2">
                        <img src="/images/ic1.png"/>
                        <a class="cm-dialog-opener cm-dialog-auto-size" data-ca-view-id="form_1" data-ca-target-id="form_1" href="{"products.product_feedback&product_id=`$product.product_id`&form_name=REPAIR QUOTE"|fn_url}" data-ca-dialog-title="REPAIR QUOTE" rel="nofollow">REPAIR QUOTE</a><br>
                        <div class="preview">Some interesting text here, will be writed later</div>
                    </div>
                </div>
                <div class="col-md-5 mb-3 mb-md-0">
                    <div class="item default-shadow-2">
                        <img src="/images/icon2.png"/>
                        <a class="cm-dialog-opener cm-dialog-auto-size" data-ca-view-id="form_2" data-ca-target-id="form_2" href="{"products.product_feedback&product_id=`$product.product_id`&form_name=REPLACEMENT QUOTE"|fn_url}" data-ca-dialog-title="REPLACEMENT QUOTE" rel="nofollow">REPLACEMENT QUOTE</a><br>
                        <div class="preview">Some interesting text here, will be writed later</div>
                    </div>
                </div>
                <div class="col-md-5 mb-3 mb-md-0">
                    <div class="item default-shadow-2">
                        <img src="/images/icon3.png"/>
                        <a class="cm-dialog-opener cm-dialog-auto-size" data-ca-view-id="form_3" data-ca-target-id="form_3" href="{"products.product_feedback&product_id=`$product.product_id`&form_name=FREE CONSULT"|fn_url}" data-ca-dialog-title="FREE CONSULT" rel="nofollow">FREE CONSULT</a><br>
                        <div class="preview">Some interesting text here, will be writed later</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}
{capture name="mainbox_title"}{assign var="details_page" value=true}{/capture}
