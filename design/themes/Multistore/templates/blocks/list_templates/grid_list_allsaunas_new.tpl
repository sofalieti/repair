12345
{* $Id: grid_list_allsaunas_new.tpl 10220 2010-07-27 09:09:00Z alexions $ *}
<div class="allsaunas_class idcategory_{$obj.category.category_id}">
{if $products}
{assign var="show_add_to_cart" value="true"}
{assign var="columns" value=5}
{if !$show_empty}
{if $products|sizeof < $columns}
	{assign var="columns" value=$products|@sizeof}
{/if}
{split data=$products size=$columns|default:"4" assign="splitted_products"}
{else}
{split data=$products size=$columns|default:"4" assign="splitted_products" skip_complete=true}
{/if}

{math equation="100 / x" x=$columns|default:"4" assign="cell_width"}
{if $item_number == "Y"}
	{assign var="cur_number" value=1}
{/if}
<div class="grid_list">
<div class="feature_products">
<div class="prod_grid">
<div>
{foreach from=$splitted_products item="sproducts" name="sprod"}
<center>
{foreach from=$sproducts item="product" name="sproducts"}
<div class="mysaunaspan span3 " > 	
	{include file="common/product_data.tpl" product=$product min_qty=true show_discount_label=true show_list_discount=true }
	{assign var="obj_id" value=$product.product_id}
	{assign var="obj_id_prefix" value="`$obj_prefix``$product.product_id`"}
	
	{include file="common/product_data.tpl" product=$product}	

	{if $product}

		{hook name="products:product_multicolumns_list"}
        <p class="header" style="">
			{if $item_number == "Y"}{$cur_number}.&nbsp;{math equation="num + 1" num=$cur_number assign="cur_number"}{/if}{assign var="name" value="name_$obj_id"}{$smarty.capture.$name|unescape|truncate:300 nofilter}		
		</p>
        <div class="bg_image" >

			{*assign var="icon_image_path" value=$product.main_pair.detailed.image_path|unescape|fn_generate_thumbnail:500:600:true|escape*}
	<div {if $product}onclick="location.href='{"products.view?product_id=`$product.product_id`"|fn_url}'"{/if}>	{include file="common/image.tpl" obj_id=$obj_id_prefix images=$product.main_pair object_type="product" show_thumbnail="Y" image_width=190 image_height=$settings.Thumbnails.product_lists_thumbnail_height  data_zoom_image=$product.main_pair.detailed.image_path}</div>
           </div>
		
		
		
			<div class="grid_price">	            	
			
				{assign var="old_price" value="old_price_`$obj_id`"}
					{assign var="msrp" value="msrp_`$obj_id`"}
				{assign var="discount_label" value="discount_label_`$obj_id`"}
				{assign var="price"  value="price_`$obj_id`"}
						{assign var="old_price" value="old_price_`$obj_id`"}
				{assign var="list_price" value="list_price_`$obj_id`"}
				{assign var="clean_price" value="clean_price_`$obj_id`"}
				{assign var="list_discount" value="list_discount_`$obj_id`"}						
				<center>
				<div class="MySaunaSpanPrices ty-grid-list__item">
				<div style="">
					<span style=""> </span>
					{assign var=product_id value=$product.product_id}
					{assign var=first_price value="SELECT price FROM ?:product_prices WHERE product_id = `$product_id`"|db_get_field}
					
					  <div class="ty-grid-list__price {if $product.price == 0}ty-grid-list__no-price{/if}">
                                            {assign var="old_price" value="old_price_`$obj_id`"}
                                            {if $smarty.capture.$old_price|trim}{$smarty.capture.$old_price nofilter}{/if}

                                            {assign var="price" value="price_`$obj_id`"}
                                            {$smarty.capture.$price nofilter}

                                            {assign var="clean_price" value="clean_price_`$obj_id`"}
                                            {$smarty.capture.$clean_price nofilter}

                                            {assign var="list_discount" value="list_discount_`$obj_id`"}
                                            {$smarty.capture.$list_discount nofilter}
                                        </div>					
				</div>	
				
				{if $smarty.capture.$old_price|trim || $smarty.capture.$clean_price|trim || $smarty.capture.$list_discount|trim}
			
				<div>
</center>				
			{else if}
					<input type="hidden" value="{$product.product_id}" name="prod_id" />
					<div style="{if $columns eq 4}margin: 8px 0px 0px -4px;{else} margin: 8px 0px 0px -13px;{/if}" class="more-info-box">
						<center>
							<span class="show_det_prod">Click here for more Info
							</span> 
						</center>
					</div>
				{/if}
			</div>
			
		{/hook}		
	{/if}
		
		
	</div>
	
{/foreach}
</center>

{/foreach}
</div>
</div>
</div>
</div>
</div>


{/if}
{capture name="mainbox_title"}{$title}{/capture}
<div class="backgroundPopup"></div>
{literal}
<script type="text/javascript">
	var popupStatus = 0;
	function loadPopup(){  
	  if(popupStatus==0){  
		$(".backgroundPopup").css({  
		  "opacity": "0.7"  
		});  
		$(".backgroundPopup").fadeIn("slow");  
		$(".check_form_price").fadeIn("slow");  
		popupStatus = 1;  
	  }  
	}
	function disablePopup(){  	 
	  if(popupStatus==1){  
		$(".backgroundPopup").fadeOut("slow");  
		$(".check_form_price").fadeOut("slow");  
		popupStatus = 0;  
	  }  
	}	
	function centerPopup(){  		
		var windowWidth = document.documentElement.clientWidth;  
		var windowHeight = document.documentElement.clientHeight;  
		var popupHeight = $(".check_form_price").height();  
		var popupWidth = $(".check_form_price").width();  
		$(".check_form_price").css({  
			"position": "fixed",  
			"top": windowHeight/2-popupHeight/2,  
			"left": windowWidth/2-popupWidth/2  
		});  
		$(".backgroundPopup").css({  
			"height": windowHeight  
		});  
	}

		$(".check_price").click(function(){		
			var prev = $(this).prev().val();
			if(prev > 0){
				$('.prod_id_send').val(prev);
			};
			centerPopup();
			loadPopup();
		});
		$(".popupContactClose").click(function(){
			disablePopup();
		});
		$(".backgroundPopup").click(function(){
			disablePopup();
		});
	
</script>
{/literal}
{literal}
<script src='/js/lib/elevatezoom-master/jquery.elevatezoom.js'></script>
<script type="text/javascript">
$(document).ready(function(){
	$('img[data-zoom-image]').elevateZoom({zoomWindowHeight: 300, zoomWindowWidth:300});
})
</script>
{/literal}
</div>
