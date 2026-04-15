
<div class="PageWithPrices margin-top">

{literal}
<style type="text/css">
.sort-container{
	display: none;
}
table.multicolumns-list td,.center{
	width: 20% !important
}
</style>
{/literal}
<center><h1 style="font-size:33px;">Price list - Black Friday</h1></center>
{foreach from=$categories item=obj}
{assign var=products value=$obj.products}
{if $products|@count > 0}
{** <h2 style="padding: 10px;" {if $obj.category.category_id eq 378}class="h1_m1"{/if}>{if $obj.category.category_id eq 378}And{/if} {$obj.category.category}</h2> **}
<h2 style="padding: 10px;" >{$obj.category.category}</h2>
<div>
{include file="blocks/list_templates/grid_list_allsaunas_bf.tpl" 
columns=3
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
but_role="action"}
<br><br>
{/if}

{/foreach}
</div>

</div>

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