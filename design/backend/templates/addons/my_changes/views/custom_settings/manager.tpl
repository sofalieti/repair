{capture name="mainbox"}
{capture name="tabsbox"}
<form action="" method="post" class="form-horizontal form-edit cm-processed-form" id="custom_setting_form" enctype="multipart/form-data">
	<div id="content_main_banner">
		<fieldset>
			<div class="control-group">
				<label class="control-label">Text banner?</label>
				<div class="controls">
					<input type="hidden" name="custom_settings[banner_is_text]" value="N"/>
					<input type="checkbox" name="custom_settings[banner_is_text]" value="Y" {if "banner_is_text"|get_custom_setting eq 'Y'}checked{/if}/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Text 1:</label>
				<div class="controls">
					<textarea name="custom_settings[banner_text_1]" cols="55" rows="2" class="input-large">{"banner_text_1"|get_custom_setting}</textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Date Start:</label>
				<div class="controls">
					<input name="custom_settings[date_start]" type="text" class="input-small" value="{"date_start"|get_custom_setting}"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Date End:</label>
				<div class="controls">
					<input name="custom_settings[date_end]" type="text" class="input-small" value="{"date_end"|get_custom_setting}"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Date Extended:</label>
				<div class="controls">
					<input name="custom_settings[date_extended]" type="text" class="input-small" value="{"date_extended"|get_custom_setting}"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Mobile text:</label>
				<div class="controls">
					<textarea name="custom_settings[banner_mobile_text_1]" cols="55" rows="2" class="input-large">{"banner_mobile_text_1"|get_custom_setting}</textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Image 1:</label>
				<div class="controls">
					{assign var=banner_image_1 value="banner_image_1"|get_custom_setting}
					{if !empty($banner_image_1)}
					<img src="{$banner_image_1}" width="100"/>
					{/if}
					<input type="file" name="custom_settings[banner_image_1]"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Image 2:</label>
				<div class="controls">
					{assign var=banner_image_2 value="banner_image_2"|get_custom_setting}
					{if !empty($banner_image_2)}
					<img src="{$banner_image_2}" width="100"/>
					{/if}
					<input type="file" name="custom_settings[banner_image_2]"/>
				</div>
			</div>
		</fieldset>
	</div>
	<div id="content_promotions">
		<fieldset>
			{foreach from=$promotions item=p}
			{if $p.status eq 'A'}
			<div class="control-group">
				<label class="control-label">{$p.name}</label>
				<div class="controls">
					{assign var=bonuses value=$p.bonuses|unserialize}
					<input name="promotions[{$p.promotion_id}]" value="{$bonuses[1].discount_value}" type="text" class="input-small"/>
				</div>
			</div>
			{/if}
			{/foreach}
		</fieldset>
	</div>
	<div id="content_lang_vars">
		<fieldset>
			<div class="control-group">
				<label class="control-label">discount_price_text</label>
				<div class="controls">
					<textarea name="langs[discount_price_text]" cols="55" rows="2" class="input-large">{__("discount_price_text")}</textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">infusionsoft_promotion_name</label>
				<div class="controls">
					<textarea name="langs[infusionsoft_promotion_name]" cols="55" rows="2" class="input-large">{__("infusionsoft_promotion_name")}</textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">pricelistpromotion</label>
				<div class="controls">
					<textarea name="langs[pricelistpromotion]" cols="55" rows="2" class="input-large">{__("pricelistpromotion")}</textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">pricelist_header</label>
				<div class="controls">
					<textarea name="langs[pricelist_header]" cols="55" rows="2" class="input-large">{__("pricelist_header")}</textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">alaska_hawaii_shipping_text</label>
				<div class="controls">
					<textarea name="langs[alaska_hawaii_shipping_text]" cols="55" rows="2" class="input-large">{__("alaska_hawaii_shipping_text")}</textarea>
				</div>
			</div>
		</fieldset>
	</div>
	<div id="content_links">
		<table class="table">
			<tr>
				<td>Price List link with "ref=value"</td>
				<td><a href="/index.php?dispatch=links.pricelist_ref&secret12341d" target="_blank">Link</a></td>
			</tr>
			<tr>
				<td>Infusionsoft Delete Contacts</td>
				<td><a href="https://enlightensauna.com/index.php?dispatch=infusionsoft.get_contact&secret123" target="_blank">Link</a></td>
			</tr>
			<tr>
				<td>Google Domains Checker</td>
				<td><a href="https://enlightensauna.com/dev/google_docs_domains_checker/?secret123" target="_blank">Link</a></td>
			</tr>
			<tr>
				<td>Generate sitemap.xml</td>
				<td><a href="/admin.php?dispatch=custom_sitemap.generate" target="_blank">Link</a></td>
			</tr>
		</table>
	</div>
	<div id="content_product_discounts">
		<table class="table">
			<tr>
				<th>Category</th>
				<th>Sauna Type</th>
				<th>Enable</th>
			</tr>
			{foreach from=$product_discounts item=product_discount}
			<tr>
				<td>{$product_discount.category}</td>
				<td>{$product_discount.sauna_type}</td>
				<td>
					<input type="hidden" name="product_discounts[{$product_discount.discount_category_setting_id}]" value="0"/>
					<input {if $product_discount.enable}checked{/if} type="checkbox" name="product_discounts[{$product_discount.discount_category_setting_id}]" value="1"/>
				</td>
			</tr>
			{/foreach}
		</table>
	</div>
	<div id="content_seo">
		{foreach from=$seo item=s}
		{include file="common/subheader.tpl" title=$s.name target="#seo_`$s.type`"}
		<div id="seo_{$s.type}" class="in collapse">			
			<fieldset>
				<div class="control-group">
					<div class="controls" style="font-size: 13px; background: #efefef; padding: 5px; font-style: italic;display: inline-block;">{$s.help}</div>
				</div>
				<div class="control-group">
					<label class="control-label">Title:</label>
					<div class="controls">
						<input name="seo[{$s.setting_seo_id}][title]" type="text" class="input-large" value="{$s.title}"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Description:</label>
					<div class="controls">
						<textarea name="seo[{$s.setting_seo_id}][description]" cols="55" rows="2" class="input-large">{$s.description}</textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Keywords:</label>
					<div class="controls">
						<textarea name="seo[{$s.setting_seo_id}][keywords]" cols="55" rows="2" class="input-large">{$s.keywords}</textarea>
					</div>
				</div>
			</fieldset>
		</div>
		{/foreach} 
	</div>
	<div id="content_infusionsoft_zoho">
		<fieldset>
			<a href="{"zoho.zoho_check_infusionsoft_companies?period=day"|fn_url}" target="_blank" onclick="return confirm('Сontinue?')">Check for the day</a><br/>
			<a href="{"zoho.zoho_check_infusionsoft_companies?period=2day"|fn_url}" target="_blank" onclick="return confirm('Сontinue?')">Check for the 2 day</a><br/>
			<a href="{"zoho.zoho_check_infusionsoft_companies?period=week"|fn_url}" target="_blank" onclick="return confirm('Сontinue?')">Check for the week</a><br/>
			<a href="{"zoho.zoho_check_infusionsoft_companies?period=month"|fn_url}" target="_blank" onclick="return confirm('Сontinue?')">Check for the month</a><br/>
		</fieldset>
	</div>
	{capture name="buttons"}
	{include file="buttons/save.tpl" but_role="submit-link" but_name="dispatch[custom_settings.manager]"  but_target_form="custom_setting_form" save=true}
	{/capture}
</form>
{/capture}
{include file="common/tabsbox.tpl" content=$smarty.capture.tabsbox active_tab=$smarty.request.selected_section track=true}
{/capture}

{include file="common/mainbox.tpl" title="Custom settings" content=$smarty.capture.mainbox buttons=$smarty.capture.buttons adv_buttons=$smarty.capture.adv_buttons select_languages=true}