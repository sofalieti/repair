<div class="mobile-banner"  style="background-image: url(/images/custom_settings/banner_image_2.jpg)">
    <div class="container">
        <div class="banner-title">
            LABOR DAY SALE
            <div class="banner-subtitle">New Upgraded 2019 Outdoor Models. Built for Nature and You.</div>
        </div>
        <div class="banner-description">
            Save <span>$400-$700</span> on all Saunas!
        </div>
        <div class="banner-action-date">
            valid from <span class="BannerValidDate">{"date_start"|get_custom_setting nofilter}</span>
            {if empty(get_custom_setting('date_extended'))}
            thru <span class="BannerValidDate">{"date_end"|get_custom_setting nofilter}</span>
            {else}
            thru <s style="font-size: 13px;">{"date_end"|get_custom_setting nofilter}</s>
            <span class="BannerValidDate">{"date_extended"|get_custom_setting nofilter}</span>
            {/if}
        </div>
    </div>
</div>