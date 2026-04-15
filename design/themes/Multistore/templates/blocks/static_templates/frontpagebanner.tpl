{** block-description:banner **}
<div id="banner_slider_promo" class="banners owl-carousel">
    {capture name="banner1"}
        <div class="ty-banner__image-item">
            <div class="PromoBanner">
                <div class="ty-wysiwyg-content">
                    <div class="container-fluid display-inline secondbanner">


                        <div class="BannerTitle">The Only True <span class="not-title">Outdoor Infrared Saunas</span>

                            <div class="not-title-bot">made by the Only Outdoor Infrared Sauna company in existence<br>2-in-1: Fully convertible into an INDOOR sauna</div>
                            <div class="links-block"><a href="/allmodels.html">All Models</a> <a href="/diy-kits.html">Custom Sauna</a></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    {/capture}
    {capture name="banner2"}
        {if "banner_is_text"|get_custom_setting eq 'Y'}
            {assign var=geo_data value=""|fn_get_geo_data}
            <div class="ty-banner__image-item">
                <div class="NewStyle">
                    <div class="PromoBanner" style="background: url({"banner_image_2"|get_custom_setting nofilter});">
                        <div class="container-fluid  inlinedisplay firstbanner">
                            <div class="banner-text-layer">
                                <span class="banner-layer-title">{"banner_text_1"|get_custom_setting nofilter}</span><br><br>
                                <span class="banner-layer-discount">{"banner_mobile_text_1"|get_custom_setting nofilter}</span><br><br>
                                <span class="BLDiscount">
									{if $geo_data != false}
										{if $geo_data.country_code == 'US'}
										{if $geo_data.region != 'AK' && $geo_data.region != 'HI'}
										<br> FREE GROUND SHIPPING TO 
                                        <span>
                                            {if $geo_data == false}
                                                California
                                            {else}
                                                {$geo_data['region_name']}
                                            {/if}
                                        </span>
										{/if}
										{elseif $geo_data.country_code == 'CA'}
										<br>Shipping: 25% OFF FOR 
                                        <span>
                                            {if $geo_data == false}
                                                Ontario
                                            {else}
                                                {$geo_data['region_name']}
                                            {/if}
                                        </span>
										{/if}
									{else}
									{/if}
                                    {*if ""|fn_geo_is_free_shipping_price}

                                        <br> FREE GROUND SHIPPING TO 
                                        <span>
                                            {if $geo_data == false}
                                                California
                                            {else}
                                                {$geo_data['region_name']}
                                            {/if}
                                        </span>
                                    {else}
                                        <br>25% OFF FOR 
                                        <span>
                                            {if $geo_data == false}
                                                California
                                            {else}
                                                {$geo_data['region_name']}
                                            {/if}
                                        </span>
                                    {/if*}

                                </span>
                                <span class="BLDiscount">
                                    <br>
                                  <b>{if $smarty.session.sauna_type == 'outdoor'}{$smarty.session.domain_langs.ionizer_price}{else}{$smarty.session.domain_langs.indoor_ionizer_price}{/if} Ionizer</b> (reg.$149)<br>
                    <b>{if $smarty.session.sauna_type == 'outdoor'}{$smarty.session.domain_langs.chromotherapy_price}{else}{$smarty.session.domain_langs.indoor_chromotherapy_price}{/if} Chromolights</b> ($reg.399 value)</span>
                
                
                    <br>

                <span class="banner-layer-valid">
					valid from <span class="BannerValidDate">{"date_start"|get_custom_setting nofilter}</span>
					{if empty(get_custom_setting('date_extended'))}
					thru <span class="BannerValidDate">{"date_end"|get_custom_setting nofilter}</span>
					{else}
					thru <s style="font-size: 13px;">{"date_end"|get_custom_setting nofilter}</s>
					<span class="BannerValidDate">{"date_extended"|get_custom_setting nofilter}</span>
					{/if}
				</span>
				<span class='banner-shipping-text-mini'>
				{__('alaska_hawaii_shipping_text')}
				</span>



            </div>

            {*
            <div class="main-banner-title">
            {"banner_text_1"|get_custom_setting nofilter}
            </div>
            <div class="BannerLogoLayer">
            <div class="BL1"><img src="{"banner_image_1"|get_custom_setting nofilter}"/></div>
            <div class="BL2">
            {"banner_text_2"|get_custom_setting nofilter}

            </div>
            </div>
            <div >
            {"banner_mobile_text_1"|get_custom_setting nofilter}
            </div>

            <div class="BannerDiscountLayer">
            <div class="MobileBannerLayer">



            <div class="BLDiscount NoOutdoor"><span>$650</span> off REBATE ON ALL 2-PERSON SAUNAS</div>
            {assign var=pr1 value=59|fn_get_promotion_data}
            <div class="BLDiscount"><span>${$pr1['bonuses'][1]['discount_value']}</span> off REBATE ON ALL 2-PERSON SAUNAS</div>
            {assign var=pr2 value=60|fn_get_promotion_data}
            <div class="BLDiscount"><span>${$pr2['bonuses'][1]['discount_value']}</span> off REBATE ON ALL 3-PERSON SAUNAS</div>

            {assign var=pr3 value=61|fn_get_promotion_data}
            <div class="BLDiscount"><span>${$pr3['bonuses'][1]['discount_value']}</span> off REBATE ON ALL 4-PERSON SAUNAS</div>

            {assign var=pr4c value=62|fn_get_promotion_data}
            <div class="BLDiscount"><span>${$pr4c['bonuses'][1]['discount_value']}</span> off REBATE ON ALL 4-PERSON CORNER SAUNAS</div>

            {assign var=pr4 value=63|fn_get_promotion_data}
            <div class="BLDiscount"><span>${$pr4['bonuses'][1]['discount_value']}</span> off REBATE ON ALL 5-PERSON SAUNAS</div>

            <div class="ShippingLayer">
            {if ""|fn_geo_is_free_shipping_price}
            <img src="/images/Fr1.png" style="float:left;"> <br>FREE GROUND SHIPPING TO<br>
            <span>
            {if $geo_data == false} 
            California
            {else}
            {$geo_data['region_name']}
            {/if}
            </span>
            {else}
            <img src="/images/Fr1.png" style="float:left;"> <br>25% OFF FOR<br>
            <span>
            {if $geo_data == false} 
            California
            {else}
            {$geo_data['region_name']}
            {/if}
            </span>
            {/if}
            </div>
            <div class="ShippingLayer"><img src="/images/Fr2.png" style="float:left;"> <br>
            {if $smarty.session.sauna_type == 'outdoor'}{$smarty.session.domain_langs.ionizer_price}{else}{$smarty.session.domain_langs.indoor_ionizer_price}{/if} Ionizer ($149 value)<br> 
            {if $smarty.session.sauna_type == 'outdoor'}{$smarty.session.domain_langs.chromotherapy_price}{else}{$smarty.session.domain_langs.indoor_chromotherapy_price}{/if} Chromolights ($399 value)</div>
            </div>

            </div>
            *}
        </div>

    </div>
</div>
</div>

{else}
    <div class="ty-banner__image-item"><img src="{'banner_image_2'|get_custom_setting nofilter}"/></div>
    {/if}
{/capture}
{if isset($smarty.get.banners_reverse)}
    {$smarty.capture.banner2 nofilter}
    {$smarty.capture.banner1 nofilter}
{else}
    {$smarty.capture.banner1 nofilter}
    {$smarty.capture.banner2 nofilter}
{/if}
</div>

<script type="text/javascript">
    (function (_, $) {
        $.ceEvent('on', 'ce.commoninit', function (context) {
            var slider = context.find('#banner_slider_promo');
            if (slider.length) {
                slider.owlCarousel({
                    items: 1,
                    singleItem: true,
                    slideSpeed: 400,
                    autoPlay: true,
                    stopOnHover: true,
                    pagination: false,
                    navigation: true,
                    navigationText: ['<img src="/design/themes/Multistore/media/images/left.png">', '<img src="/design/themes/Multistore/media/images/right.png">']
                });
            }
        });
    }(Tygh, Tygh.$));
</script>