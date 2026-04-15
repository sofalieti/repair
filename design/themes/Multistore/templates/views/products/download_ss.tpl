{assign var=form_data value=""|fn_save_forms_find_by_ip}
<div class="contact_us_for_a_price">         
	<form action="{""|fn_url}" method="post">
		<input type="hidden" name="redirect_url" value="{$config.current_url}" />                
		<input type="hidden" name="download_ss[product_id]" value="{$smarty.get.product_id}" />  
		
		<div class="control-group">
			<label class="cm-required cm-name hidden" for="name">Name</label>
			<input type="text" name="download_ss[name]" id="name" value="{$form_data['name']|default:""}" placeholder="Name" class="input-text input-text-menu"  />
		</div>

		<div class="control-group">
			<label class="cm-required cm-email hidden" for="email">E-mail</label>
			<input type="text" name="download_ss[email]" id="email" value="{$form_data['email']|default:""}" placeholder="E-mail" class="input-text input-text-menu"  />
		</div>

		<div class="control-group">
			<label class="cm-required hidden" for="phone">Phone</label>
			<input type="text" name="download_ss[phone]" id="phone" value="{$form_data['phone']|default:""}" placeholder="Phone" class="input-text input-text-menu"  />
		</div>	
		<input type="hidden" name="download_ss[timezone]"  value="" id="contact_us_for_a_price_timezone" />
		{*include file="common/image_verification.tpl" option="use_for_form_builder"*}	
		{include file="buttons/button.tpl" but_role="submit" but_text='Send' but_name="dispatch[products.download_ss]"}
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