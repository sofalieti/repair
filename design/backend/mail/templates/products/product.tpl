<style type="text/css" media="screen,print">
body,p,div,td {
    color: #000000;
    font: 14px;
    font-family: Open Sans;
	margin:0px;
	padding:0px;
}
</style>

{if $product}
<font face="arial">
<table width="100%"><tr>
<td width="25%"><img src="https://dev2.outdoorinfraredsauna.com/images/companies/1/features/EnlightenSaunasLogo.jpg"></td>
<td width="45%" style="background-color:#fff;"> <div style="font-weight:100; color:#555; font-size:31px; text-align:center;"><font face="Open Sans">
{if $sauna_type == "indoor"}
{$product.product|replace:"Peak":"Indoor"|replace:"SIERRA":"GOLDEN"|replace:"RUSTIC":"VITALITY"}
{else}
{$product.product}
{/if}
</font></div></td>
<td width="20%"><img src="https://dev2.outdoorinfraredsauna.com/images/companies/1/55.png"></td>
</tr>
</table>
<br>


<center><div style="border-radius:1000px; background-color:#eeeeee; height:20px; width:20px;"></div></center>
<div style="width:1000px;  ">
	{if $product.main_pair && (($sauna_type == "outdoor" && $product.main_pair.detailed.alt != 'indoor') || ($sauna_type == "indoor" && $product.main_pair.detailed.alt == 'indoor'))}
		{assign var=image value=$product.main_pair}
	{else}
		{foreach from=$product.image_pairs item=image_p}
			{if ($sauna_type == "outdoor" && $image_p.detailed.alt != 'indoor') || ($sauna_type == "indoor" && $image_p.detailed.alt == 'indoor')}
				{assign var=image value=$image_p}
				{break}
			{/if}
		{/foreach}
	{/if}
	<img style="width:300px;    display: block;
    margin: auto;" src="
{$image.detailed.image_path}"></div>
	 <br>


	
<div style="padding-top:10px; margin-top:10px; width: 100%; float: left;">

<div class="product_block" style="width: 1000px; float: left;">
      	<h3 class="SpecificationTitle" style="font-size: 31px;text-align: center; font-family:Open Sans; font-weight:normal; color:#555;"><font face="Open Sans">Specification</font></h3>
      	<center><div style="border-radius:1000px; background-color:#eeeeee; height:20px; width:20px; position:relative; top:-10px; margin-bottom:5px;"></div></center>
      	{include file="products/product_features1.tpl" product_features=$product.product_features details_page=true}
      </div>
	
{/if}


</div>
<br><br><br>
<div style="margin-top:100px; position:relative; top:50px;">


<div style="width:1000px;  ">

	<img style="width:1000px; position:relative;" src="https://outdoorinfraredsauna.com//images/scatches/id_heater/{$product.product_code}_heater.png"></div>
	</div>
	 
<br><br><br>
<div style="margin-top:300px;">
<table width="100%"><tr>
<td width="25%"><img src="https://dev2.outdoorinfraredsauna.com/images/companies/1/features/EnlightenSaunasLogo.jpg"></td>
<td width="45%" style="background-color:#fff;"> <div style="font-weight:100; color:#555; font-size:31px; text-align:center;"><font face="Open Sans">
{if $sauna_type == "indoor"}
{$product.product|replace:"Peak":"Indoor"|replace:"SIERRA":"GOLDEN"|replace:"RUSTIC":"VITALITY"}
{else}
{$product.product}
{/if}
</font></div></td>
<td width="20%"><img src="https://dev2.outdoorinfraredsauna.com/images/companies/1/55.png"></td>
</tr>
</table>
</div>

	
	{include file="products/standart_features.tpl" product_features=$product.product_features details_page=true}