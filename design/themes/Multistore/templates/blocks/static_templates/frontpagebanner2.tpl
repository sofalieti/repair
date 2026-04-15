{** block-description:banner **}
{if "banner_is_text"|get_custom_setting eq 'Y'}
{assign var=geo_data value=""|fn_get_geo_data}

<div class="PromoBanner">
<div class="container-fluid  inlinedisplay">
<div class="BannerTitle">The Only True <span>Outdoor Infrared Saunas</span></div>

<div class="BannerLogoLayer">
<div class="BL1"><img src="{"banner_image_1"|get_custom_setting nofilter}"/></div>
<div class="BL2">
{"banner_text_1"|get_custom_setting nofilter}
{"banner_text_2"|get_custom_setting nofilter}
</div></div>
<div class="m-banner-text">
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
<div class="BLDiscount"><span>${$pr3['bonuses'][1]['discount_value']}</span> off REBATE ON ALL 4-PERSON & 4-PERSON CORNER SAUNAS</div>
{assign var=pr4 value=63|fn_get_promotion_data}
<div class="BLDiscount"><span>${$pr4['bonuses'][1]['discount_value']}</span> off REBATE ON ALL 5-PERSON SAUNAS</div>

<div class="ShippingLayer"><img src="/images/Fr1.png" style="float:left;"> <br>FREE GROUND SHIPPING TO<br>
<span>
	{if $geo_data == false} 
	California
	{else}
	{$geo_data['banner_text']}
	{/if}
</span>
</div>
<div class="ShippingLayer"><img src="/images/Fr2.png" style="float:left;"> <br>Free Ionizer ($149 value)<br> Free Chromolights ($399 value)</div>
</div>
</div>


</div>
</div>
{else}
<img src="{"banner_image_2"|get_custom_setting nofilter}" style="width: 100%;"/>
{/if}