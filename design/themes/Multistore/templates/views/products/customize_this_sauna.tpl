<div class="contact_us_for_a_price">         
	<form action="{""|fn_url}" method="post">
		<input type="hidden" name="redirect_url" value="{$config.current_url}" />   
                
		<input type="hidden" name="customize_this_sauna[product_id]" value="{$smarty.get.product_id}" />   
		<input type="hidden" name="customize_this_sauna[product]" value="{$smarty.get.product}" />      
		
		<div class="form-group">
			<label class="cm-required cm-name hidden" for="customize_this_sauna_name">Name</label>
			<input type="text" name="customize_this_sauna[name]" id="customize_this_sauna_name" value="" placeholder="Name" class="form-control"  />
		</div>

		<div class="form-group">
			<label class="cm-required cm-email hidden" for="customize_this_sauna_email">E-mail</label>
			<input type="text" name="customize_this_sauna[email]" id="customize_this_sauna_email" value="" placeholder="E-mail" class="form-control"  />
		</div>

		<div class="form-group">
			<label class="cm-required hidden" for="customize_this_sauna_phone">Phone</label>
			<input type="text" name="customize_this_sauna[phone]" id="customize_this_sauna_phone" value="" placeholder="Phone" class="form-control"  />
		</div>	

		<div class="form-group">
			<label class="cm-required hidden" for="customize_this_sauna_price_type">Price-Type</label>
			<select name="customize_this_sauna[price_type]" id="customize_this_sauna_price_type" class="form-control">
				<option value="For use in USA">For use in USA</option>
				<option value="For use in Canada">For use in Canada</option>
				<option value="For International use">For International use</option>
			</select>
		</div>
		<div class="form-group">
			<label class="cm-required hidden" for="customize_this_sauna_additional_options">Additional options</label>
			<textarea class="form-control" name="customize_this_sauna[additional_options]" id="customize_this_sauna_additional_options" placeholder="Additional options (Please write any custom option here)"></textarea>			
		</div>
		<input type="hidden" name="customize_this_sauna[options]"  value="{$smarty.get.options|default:''}" />
		<input type="hidden" name="customize_this_sauna[timezone]"  value="" id="contact_us_for_a_price_timezone" />
		{*include file="common/image_verification.tpl" option="use_for_form_builder"*}	
		<div class="form-group text-right">
			{include file="buttons/button.tpl" but_meta="btn-primary" but_role="submit" but_text='Send' but_name="dispatch[products.customize_this_sauna]"}
		</div>
	</form>      
</div>		
{literal}
<script type="text/javascript">
$(document).ready(function(){
	var split = new Date().toString().split(" ");
	var timeZoneFormatted = split[split.length - 2];
	$("#contact_us_for_a_price_timezone").val(timeZoneFormatted);
});
</script>
{/literal}		
