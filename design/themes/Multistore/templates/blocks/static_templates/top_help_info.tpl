{assign var=form_data value=""|fn_save_forms_find_by_ip}
{if $form_data != false}
<noindex>
<div class="user-pricelist-top-link">
	Hello, <span class="name">{$form_data['name']}</span><br/>
	Click <a href="{"products.get_price_list"|fn_url}" rel="nofollow">here</a> for Pricing.
</div>
</noindex>
{else}
&nbsp;
{/if}