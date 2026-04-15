{include file="common/subheader.tpl" title=__("Zoho") target="#zoho"}
{if $page_data.page_type == 'F'}
<div id="zoho" class="collapsed in">
    <div class="control-group">
        <label class="control-label">
            Send to CRM
            <input type="hidden" name="page_data[send_to_crm]" value="0"/>
            <input type="checkbox" name="page_data[send_to_crm]" {if $page_data.send_to_crm}checked{/if} value="1"/>
        </label>
    </div>
    <div class="control-group">
        <label class="control-label">
            Send to Desk
            <input type="hidden" name="page_data[send_to_desk]" value="0"/>
            <input type="checkbox" name="page_data[send_to_desk]" {if $page_data.send_to_desk}checked{/if} value="1"/>
        </label>
    </div>
</div>
{/if}