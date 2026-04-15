{capture name="mainbox"}

{if $domains}
<div class="table-responsive-wrapper">
    <table class="table table-middle table-responsive">
    <thead>
    <tr>
        <th>Domain</th>
		<th>Default</th>
        <th width="6%">&nbsp;</th>
    </tr>
    </thead>
    {foreach from=$domains item=domain}
    <tr>
        <td class="">
            <a class="row-status" href="{"domains.update?domain_id=`$domain.domain_id`"|fn_url}">{$domain.name}</a>
        </td>
		<td>{if $domain.default}Yes{else}No{/if}</td>
        <td>
            {capture name="tools_list"}
                <li>{btn type="list" text=__("edit") href="domains.update?domain_id=`$domain.domain_id`"}</li>
                <li>{btn type="list" class="cm-confirm" text=__("delete") href="domains.delete?domain_id=`$domain.domain_id`" method="POST"}</li>
            {/capture}
            <div class="hidden-tools">
                {dropdown content=$smarty.capture.tools_list}
            </div>
        </td>
    </tr>
    {/foreach}
    </table>
</div>
{else}
    <p class="no-items">{__("no_data")}</p>
{/if}
{capture name="adv_buttons"}
    {include file="common/tools.tpl" tool_href="domains.add" prefix="top" hide_tools="true" title='Add domain' icon="icon-plus"}
{/capture}

{/capture}

{include file="common/mainbox.tpl" title=__("domains") content=$smarty.capture.mainbox buttons=$smarty.capture.buttons adv_buttons=$smarty.capture.adv_buttons}