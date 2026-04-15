<div id="banner_slider_promo" class="banners owl-carousel">
    {capture name="banner1"}
        <div class="ty-banner__image-item" style="background-image: url(/images/custom_settings/mainpagebannertemplate.jpg)">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-md-6">
                    
                    </div>
                    <div class="col-md-10 text-left">
                        <div class="banner-title">
                             LABOR DAY SALE
                             <div class="banner-subtitle">New Upgraded 2019 Outdoor Models. Built for Nature and You.</div>
                           
                        </div>
                        <div class="banner-description">
                            Save <span>$400-$700</span> on all Saunas!
                        </div>
                        <div class="banner-action-date">
                            <div class="row">
                                <div class="col-3">
                                    Valid from:
                                </div>
                                <div class="col-13">
                                    <span class="BannerValidDate">{"date_start"|get_custom_setting nofilter}</span>
                                </div>
                                {if empty(get_custom_setting('date_extended'))}
                                <div class="col-3">
                                    Thru:
                                </div>
                                <div class="col-13">
                                    <span class="BannerValidDate">{"date_end"|get_custom_setting nofilter}</span>
                                </div>
                                {else}
                                <div class="col-3">
                                    Thru:
                                </div>
                                <div class="col-13">
                                    <span class="BannerValidDate">{"date_extended"|get_custom_setting nofilter}</span>
                                </div>
                                <div class="col-3">
                                    Extended:
                                </div>
                                <div class="col-12">
                                    <span class="BannerValidDate"><s>{"date_end"|get_custom_setting nofilter}</s></span>
                                </div>
                                {/if}
                            </div>
                        </div>
                        <div class="banner-buttons">
                            <a class="btn" href="/outdoor/allmodels.html">All Models</a>
                            <a class="btn" href="/diy-kits.html">Custom Sauna</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {/capture}
    {capture name="banner2"}
        <div class="ty-banner__image-item" style="background-image: url({"banner_image_2"|get_custom_setting nofilter})">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-6">
                        <img src="{"banner_image_1"|get_custom_setting nofilter}" class="img-fluid left-image"/>
                    </div>
                    <div class="col-md-10 text-left">
                        <div class="banner-title">
                            <div class="banner-subtitle">THE ONLY TRUE</div>
                            OUTDOOR INFRARED SAUNA
                        </div>
                        <div class="banner-description">
                            Made by the Only Outdoor Infrared Sauna company in existence.<br/>
                            2-in-1: Fully convertible into an INDOOR sauna
                        </div>
                        <div class="banner-buttons">
                            <a class="btn" href="/outdoor/allmodels.html">All Models</a>
                            <a class="btn" href="/diy-kits.html">Custom Sauna</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {/capture}
    {capture name="banner3"}
        <div class="ty-banner__image-item" style="background-image: url({"banner_image_2"|get_custom_setting nofilter})">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-6">
                        <img src="/images/custom_settings/chromoionizer.png" class="img-fluid left-image"/>
                    </div>
                    <div class="col-md-10 text-left">
                        <div class="banner-title">
                            <div class="banner-subtitle">THE ONLY TRUE</div>
                            OUTDOOR INFRARED SAUNA
                        </div>
                        <div class="banner-description">
                            Made by the Only Outdoor Infrared Sauna company in existence.<br/>
                            2-in-1: Fully convertible into an INDOOR sauna
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {/capture}
    {capture name="banner4"}
        <div class="ty-banner__image-item" style="background-image: url({"banner_image_2"|get_custom_setting nofilter})">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-6">
                        <img src="/images/custom_settings/bannershipping.png" class="img-fluid left-image"/>
                    </div>
                    <div class="col-md-10 text-left">
                        
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
                                    
                        <div class="banner-title">
                            <div class="banner-subtitle">THE ONLY TRUE</div>
                            OUTDOOR INFRARED SAUNA
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    {/capture}
    {$smarty.capture.banner1 nofilter}
    {$smarty.capture.banner2 nofilter}
    {$smarty.capture.banner3 nofilter}
    {$smarty.capture.banner4 nofilter}
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
                    navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
                    dots: false,
                    nav: true
                });
            }
        });
    }(Tygh, Tygh.$));
</script>