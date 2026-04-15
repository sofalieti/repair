{if $domain}
    {assign var="id" value=$domain.domain_id}
{else}
    {assign var="id" value=0}
{/if}

{capture name="mainbox"}

<form action="{""|fn_url}" method="post" class="form-horizontal form-edit" name="domain_form" enctype="multipart/form-data">
<input type="hidden" class="cm-no-hide-input" name="fake" value="1" />
<input type="hidden" class="cm-no-hide-input" name="domain_id" value="{$id}" />

{capture name="tabsbox"}

    <div id="content_general">
        
        <div class="control-group">
            <label for="elm_domain_name" class="control-label cm-required">Domain</label>
            <div class="controls">
                <input type="text" name="domain_data[name]" id="elm_domain_name" value="{$domain.name}" size="10" class="input-large" />
            </div>
        </div>
		
		<div class="control-group">
            <label for="elm_domain_country_code" class="control-label cm-required">Country Code</label>
            <div class="controls">
                <input type="text" name="domain_data[country_code]" id="elm_domain_country_code" value="{$domain.country_code}" size="10" class="input-small" />
            </div>
        </div>
		
		<div class="control-group">
            <label class="control-label" for="elm_domain_default">Default</label>
            <div class="controls">
                <input type="hidden" name="domain_data[default]" value="0" />
                <input type="checkbox" name="domain_data[default]" id="elm_domain_default" value="1" {if $domain['default'] == 1}checked="checked"{/if} />
            </div>
        </div>
		
		<div class="control-group">
            <label for="elm_domain_ionizer_price" class="control-label">Outdoor Ionizer price</label>
            <div class="controls">
                <input type="text" name="domain_data[ionizer_price]" id="elm_domain_ionizer_price" value="{$domain.ionizer_price}" size="10" class="input-large" />
            </div>
        </div>
		
		<div class="control-group">
            <label for="elm_domain_chromotherapy_price" class="control-label">Outdoor Chromotherapy price</label>
            <div class="controls">
                <input type="text" name="domain_data[chromotherapy_price]" id="elm_domain_chromotherapy_price" value="{$domain.chromotherapy_price}" size="10" class="input-large" />
            </div>
        </div>
		
		<div class="control-group">
            <label for="elm_domain_indoor_ionizer_price" class="control-label">Indoor Ionizer price</label>
            <div class="controls">
                <input type="text" name="domain_data[indoor_ionizer_price]" id="elm_domain_indoor_ionizer_price" value="{$domain.indoor_ionizer_price}" size="10" class="input-large" />
            </div>
        </div>
		
		<div class="control-group">
            <label for="elm_domain_indoor_chromotherapy_price" class="control-label">Indoor Chromotherapy price</label>
            <div class="controls">
                <input type="text" name="domain_data[indoor_chromotherapy_price]" id="elm_domain_indoor_chromotherapy_price" value="{$domain.indoor_chromotherapy_price}" size="10" class="input-large" />
            </div>
        </div>
		
		<div class="control-group">
            <label for="elm_domain_shipping_price_modificator" class="control-label">Shipping price modificator</label>
            <div class="controls">
                <input type="text" name="domain_data[shipping_price_modificator]" id="elm_domain_shipping_price_modificator" value="{$domain.shipping_price_modificator}" size="10" class="input-large" />
            </div>
        </div>
    </div>

{/capture}
{include file="common/tabsbox.tpl" content=$smarty.capture.tabsbox active_tab=$smarty.request.selected_section track=true}

{capture name="buttons"}
    {if !$id}
        {include file="buttons/save_cancel.tpl" but_role="submit-link" but_target_form="domain_form" but_name="dispatch[domains.update]"}
    {else}
        {include file="buttons/save_cancel.tpl" but_name="dispatch[domains.update]" but_role="submit-link" but_target_form="domain_form" hide_first_button=$hide_first_button hide_second_button=$hide_second_button save=$id}
    {/if}
{/capture}

</form>

{/capture}

{if !$id}
    {$title = "Add domain"}
{else}
    {$title = "Edit domain"}
{/if}

{include file="common/mainbox.tpl"
    title=$title
    content=$smarty.capture.mainbox
    buttons=$smarty.capture.buttons
    select_languages=false}
