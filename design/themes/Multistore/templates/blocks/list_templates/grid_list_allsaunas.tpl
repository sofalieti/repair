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
                                {if $product}
                                    {if strpos($product.product,'Slope') !== false }
                
              
        
                  <div class="no_slope_block mysaunaspan span3 category-{$product.main_category}-pricelist-item" >     
                    {else}
                 <div class="mysaunaspan span3 category-{$product.main_category}-pricelist-item" >     
                    {/if}
	

{include file="common/product_data.tpl" product=$product min_qty=true show_discount_label=true show_list_discount=true }
	{assign var="obj_id" value=$product.product_id}
	{assign var="obj_id_prefix" value="`$obj_prefix``$product.product_id`"}
	
	{include file="common/product_data.tpl" product=$product}	

	

		{hook name="products:product_multicolumns_list"}
    
		
		 <b> Enlighten</b><br>
                                            {assign var="name" value="name_$obj_id"}
                                            {if $sauna_type == "indoor"}
                                                {$smarty.capture.$name|replace:"Peak":"Indoor" nofilter}<br>
                                            {else}
                                            {$smarty.capture.$name nofilter}<br>
                                            {/if}
											 Full Spectrum Sauna 
		
        <div class="bg_image" >

			{*assign var="icon_image_path" value=$product.main_pair.detailed.image_path|unescape|fn_generate_thumbnail:500:600:true|escape*}
	<div {if $product}onclick="location.href='{"products.view?product_id=`$product.product_id`"|fn_url}'"{/if}>	
	{if $product.main_pair|@count}
	{include file="common/image.tpl" obj_id=$obj_id_prefix images=$product.main_pair object_type="product" show_thumbnail="Y" image_width=190 image_height=$settings.Thumbnails.product_lists_thumbnail_height  data_zoom_image=$product.main_pair.detailed.image_path}
	{else}
	{assign var=o_pair value=$product.image_pairs|current}
	{include file="common/image.tpl" obj_id=$obj_id_prefix images=$product.image_pairs|current object_type="product" show_thumbnail="Y" image_width=190 image_height=$settings.Thumbnails.product_lists_thumbnail_height  data_zoom_image=$o_pair.detailed.image_path}
	{/if}
	</div>
           </div>
		
		
		
			<div class="grid_price">	            	
			
				{assign var="old_price" value="old_price_`$obj_id`"}
					{assign var="msrp" value="msrp_`$obj_id`"}
				{assign var="discount_label" value="discount_label_`$obj_id`"}
				{assign var="price"  value="price_allsaunas_`$obj_id`"}
						{assign var="old_price" value="old_price_`$obj_id`"}
				{assign var="list_price" value="list_price_`$obj_id`"}
				{assign var="clean_price" value="clean_price_`$obj_id`"}
				{assign var="list_discount" value="list_discount_`$obj_id`"}						
				
					<center><a class="hideonmain" href="{"products.view?product_id=`$product.product_id`"|fn_url}"><b>Click For Details</b>	</a></center>		<br>
				<center>
				
				
				<div class="MySaunaSpanPrices">
				<div style="">
					<span style=""> </span>
					{assign var=product_id value=$product.product_id}
					{if $sauna_type == 'indoor'}
					{assign var=first_price value="SELECT indoor_price FROM ?:products WHERE product_id = `$product_id`"|db_get_field}
					{else}
					{assign var=first_price value="SELECT price FROM ?:product_prices WHERE product_id = `$product_id`"|db_get_field}
					{/if}
					
					{if $product.MSRP}
						<!-- <span style="">MSRP: <del><b>${$product.MSRP} </b></del></span><br/> -->
								<!--===============================-->
						<table><tr><td style="width:40%;">
						{if fn_discount_category_enable($product.main_category, $sauna_type) || $product.show_discount}
                        <span style="">MSRP: <del><b>${$first_price|string_format:"%.0f"}		 </b></del></span><br/>
						
						{assign var="delta" value=500}
						<span style="">Rebate: <b>${{$product.discounts.A}}</b></span><br>
				
						<span style="">Price: <b>${$first_price-$product.discounts.A} </b></span><br/>
						{else}
						<span style="">Price: <b>${$first_price|string_format:"%.0f"}</b></span><br/>
						{/if}
						
					
					
				
						{assign var="installment" value=($first_price-$product.discounts.A)/12}
						{** <span style="">12 month - only <b>${$installment|number_format:2}</b>/month **} {*<br/>With OutdoorInfraredSaunas<br/>No Interest Financing </span><br/>*}
						<!--===============================-->
						{if $product.price ne $product.WebPrice}<span style="">Web Price: <del><b>${$product.WebPrice}</b></del></span>{/if}
						
					{/if}
                    </td>
					<td class="saunafin">
					With<br/>
					<b>Enlighten Sauna</b><br/>
					No Interest Financing 
					</td></tr></table>
					<a class="cm-dialog-opener cm-dialog-auto-size" data-ca-view-id="financing_{$product.product_id}" data-ca-target-id="financing_{$product.product_id}" href="{"products.financing?product_id=`$product.product_id`&product=$product.product"|fn_url}" data-ca-dialog-title="Financing" rel="nofollow">
						<span class="ty-no-price">Financing</span>
					</a>
					
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

		
		
	</div>
		{/if}
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
{*literal}
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
{/literal*}
