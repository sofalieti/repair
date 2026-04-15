<h1 class="default-main-title text-center">{__("infusionsoft_promotion_name")} - PRICELIST</h1>
<p class="text-center">Purchase your sauna now and get {if ""|fn_geo_is_free_shipping_price}<b>FREE Shipping/Delivery</b>,{/if} <b>Chromotherapy for <b>{if $smarty.session.sauna_type == 'outdoor'}{$smarty.session.domain_langs.chromotherapy_price}{else}{$smarty.session.domain_langs.indoor_chromotherapy_price}{/if}</b> ($399 MSRP), Ionizer for <b>{if $smarty.session.sauna_type == 'outdoor'}{$smarty.session.domain_langs.ionizer_price}{else}{$smarty.session.domain_langs.indoor_ionizer_price}{/if}</b> ($199 MSRP)</b>!<br> All of our saunas include our Limited Warranty so you are covered for as long as you own your infrared sauna.</p>
<p class="text-center mb-5">{__('alaska_hawaii_shipping_text')}</p>

{foreach from=$categories item=obj}
{assign var=products value=$obj.products}
{if $products|@count > 0}    
    <h2 class="default-main-title text-center idcategory_{$obj.category.category_id}" >
        {if $smarty.session.sauna_type == "indoor"}
        {$obj.category.category|replace:"SIERRA":"GOLDEN"|replace:"RUSTIC":"VITALITY" nofilter }
        {else}
        {$obj.category.category}
        {/if}
    </h2>
    {include file="blocks/list_templates/grid_list_allsaunas2.tpl" 
        columns=4
        show_trunc_name=true 
        show_old_price=true 
        show_price=true 
        show_clean_price=true 
        show_list_discount=true 
        show_name=true 
        show_sku=true 
        show_rating=true 
        show_features=true 
        show_prod_descr=true 
        show_old_price=true 
        show_price=true 
        show_clean_price=true 
        show_list_discount=true 
        show_discount_label=true 
        show_product_amount=$show_product_amount 
        show_product_edp=true 
        show_add_to_cart=true 
        show_list_buttons=true 
        show_descr=true 
        separate_buttons=true
        show_add_to_cart=$show_add_to_cart|default:false 
        but_role="action"
    }
{/if}
{/foreach}

{literal}
<!-- Google Code for Price List Page New Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 933624243;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "S5z1CJu6vnAQs_OXvQM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/933624243/?label=S5z1CJu6vnAQs_OXvQM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

{/literal}