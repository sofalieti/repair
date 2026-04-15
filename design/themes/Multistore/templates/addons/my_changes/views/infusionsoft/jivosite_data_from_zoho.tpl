<div class="contact_us_for_a_price">          
	<form action="{""|fn_url}" method="post">
		<div class="control-group">
			<p style="font-size: 14px;">Product</p>
			<label class="cm-required hidden" for="contact_us_for_a_price_product_id">Product</label>
			<select name="contact_us_for_a_price[product_id]" id="contact_us_for_a_price_product_id">
				<option value="">-</option>
				{foreach from=$products item=product}
				<option value="{$product.product_id}">{$product.product}</option>
				{/foreach}
			</select>
		</div>   
		
		<div class="control-group">
			<label class="cm-required cm-name hidden" for="contact_us_for_a_price_name">Name</label>
			<input type="text" name="contact_us_for_a_price[name]" id="contact_us_for_a_price_name" value="{$smarty.get.name}" placeholder="Name" class="input-text input-text-menu"  />
		</div>

		<div class="control-group">
			<label class="cm-required cm-email hidden" for="contact_us_for_a_price_email">E-mail</label>
			<input type="text" name="contact_us_for_a_price[email]" id="contact_us_for_a_price_email" value="{$smarty.get.email}" placeholder="E-mail" class="input-text input-text-menu"  />
		</div>

		<div class="control-group">
			<label class="cm-required hidden" for="contact_us_for_a_price_phone">Phone</label>
			<input type="text" name="contact_us_for_a_price[phone]" id="contact_us_for_a_price_phone" value="{$smarty.get.phone}" placeholder="Phone" class="input-text input-text-menu"  />
		</div>	

		<div class="control-group">
			<label class="cm-required hidden" for="contact_us_for_a_price_price_type">Price-Type</label>
			<select name="contact_us_for_a_price[price_type]" id="contact_us_for_a_price_price_type">
				<option value="For use in USA">For use in USA</option>
				<option value="For use in Canada">For use in Canada</option>
				<option value="For International use">For International use</option>
			</select>
		</div>
		
		<div class="control-group">
			<p style="font-size: 14px;">What Health Benefit is MOST important to you?</p>
			<label class="cm-required hidden cm-required" for="contact_us_for_a_price_whb">What Health Benefit is MOST important to you?</label>
			<select id="contact_us_for_a_price_whb" name="contact_us_for_a_price[WHB]">
				<option value="">-</option>
				<option value="detoxification">Detoxification</option>
				<option value="cardiovascular health">Cardiovascular Health</option>
				<option value="pain relief">Pain Relief</option>
				<option value="stress relief">Stress Relief</option>
				<option value="weight loss">Weight Loss</option>
				<option value="skin health">Skin Health</option>
				<option value="cell health">Cell Health</option>
				<option value="wound healing">Wound Healing</option>
				<option value="hyperthermia">Hyperthermia</option>
				<option value="lowering blood pressure">Lowering Blood Pressure</option>
				<option value="fibromyalgia">Fibromyalgia</option>
				<option value="lyme disease">Lyme Disease</option>
				<option value="chronic fatigue">Chronic Fatigue</option>
				<option value="arthritis">Arthritis</option>
				<option value="cancer">Cancer</option>
			</select>
		</div>		
		<input type="hidden" name="contact_us_for_a_price[options]"  value="{$smarty.get.options|default:''}" />
		{include file="buttons/button.tpl" but_role="submit" but_text='Send' but_name="dispatch[infusionsoft.jivosite_data_from_zoho_save]"}
	</form>      
</div>
