{capture name="mainbox"}

<form action="{""|fn_url}" method="post" name="states_form" class="{if $runtime.company_id} cm-hide-inputs{/if}">

{if $state}
<table width="100%" class="table table-middle">
<thead>
<tr>
    <th width="1%">{include file="common/check_items.tpl"}</th>
    <th width="10%">{__("code")}</th>
    <th width="60%">{__("state")}</th>
    <th width="5%">&nbsp;</th>
    <th class="right" width="20%" colspan="2"></th>
</tr>
</thead>
{foreach from=$states item=state}
<tr class="cm-row-status-{$state.status|lower}">
    <td>
        <input type="checkbox" name="state_ids[]" value="{$state.state_id}" class="checkbox cm-item" /></td>
    <td class="left nowrap row-status">
        <span>{$state.code}</span>
        {*<input type="text" name="states[{$state.state_id}][code]" size="8" value="{$state.code}" class="input-text" />*}</td>
    <td>
        <input type="text" name="states[{$state.state_id}][state]" size="55" value="{$state.state}" class="input-hidden span8"/></td>
    <td class="nowrap">
        {capture name="tools_list"}
            <li>{btn type="list" class="cm-confirm cm-post" text=__("delete") href="states.delete?state_id=`$state.state_id`&country_code=`$search.country`"}</li>
        {/capture}
        <div class="hidden-tools">
            {dropdown content=$smarty.capture.tools_list}
        </div>
    </td>
	<td class="right">
		<a href="{"states.edit?state_id=`$state.state_id`"|fn_url}">Edit</a>
    </td>
	<td class="right">
        {$has_permission = fn_check_permissions("tools", "update_status", "admin", "GET", ["table" => "states"])}
        {include file="common/select_popup.tpl" id=$state.state_id status=$state.status hidden="" object_id_name="state_id" table="states" non_editable=!$has_permission}
    </td>
</tr>
{/foreach}
</table>
{else}
    <p class="no-items">{__("no_data")}</p>
{/if}

</form>

{/capture}
{include file="common/mainbox.tpl" title='Edit state' content=$smarty.capture.mainbox adv_buttons=$smarty.capture.adv_buttons buttons=$smarty.capture.buttons sidebar=$smarty.capture.sidebar select_languages=true}