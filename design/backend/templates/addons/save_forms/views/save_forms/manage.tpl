{capture name="mainbox"}
{literal}
<style type="text/css">
    .form_data .hidden{
        display: none;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $(".show_more").click(function(){
            //alert("#t"+$(this).attr("rel")+" .hidden");
            if($("#t"+$(this).attr("rel")+" .hidden").css("display") == "none"){
                $("#t"+$(this).attr("rel")+" .hidden").show();
            }
            else{
                $("#t"+$(this).attr("rel")+" .hidden").hide();
            }
            return false
        })
            
            
        $("#select_page").change(function(){
            var id = $(this).val()
            if(id == "all"){
                document.location.href = "/admin.php?dispatch=save_forms.manage"
            }
            else{
                document.location.href = "/admin.php?dispatch=save_forms.manage&page_id="+id
            }
        })
    })
</script>
{/literal}
<form action="{""|fn_url}" method="post" name="promotion_form" class="promotion_users {if ""|fn_check_form_permissions} cm-hide-inputs{/if}" id="saved_forms">

{include file="common/pagination.tpl" save_current_page=true save_current_url=true div_id='saved_forms'}

{assign var="c_url" value=$config.current_url|fn_query_remove:"sort_by":"sort_order"}
{assign var="c_icon" value="<i class=\"exicon-`$search.sort_order_rev`\"></i>"}
{assign var="c_dummy" value="<i class=\"exicon-dummy\"></i>"}

{if $data}
<select id="select_page">
    <option value="all">All</option>
    {foreach from=$pages item=page}
    <option value="{$page.page_id}" {if $page_id eq $page.page_id}selected{/if}>{$page.page_name}</option>
    {/foreach}
</select>
<table class="table table-middle">
<thead>
<tr>
	<th><span>Form data</span></th>
    	<th>&nbsp;</th>
</tr>
</thead>

{foreach from=$data item=a name=t}

<tr class="cm-row-status-{$promotion.status|lower} {$additional_class}">
	<td colspan="2">
		<table style="width: 100%">
			<tr>
				<td width="33%">{$a.page_name}</td>
				<td width="33%">{$a.created_at|date_format:"%m/%d/%Y %H:%M"}</td>
				<td width="33%">
					<a href="" class="show_more" rel="{$smarty.foreach.t.index}" >More</a> | 
					<a class="tool-link float-right" href="/admin.php?dispatch=save_forms.delete&id={$a.id}" onclick="return confirm('Are you sure?')">Delete</a>
				</td>
			</tr>
		</table>       
            {if $a.data}
            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="value table no_hover " id="t{$smarty.foreach.t.index}">
                <tr class="row hidden">
                        <th><span>Field name</span></th>
                        <th><span>Field value</span></th>
                </tr>
                {foreach from=$a.data item=value name=value}
                <tr class="row hidden">
                    <td>{$value.field_name}</td>
                    <td>{$value.field_value|htmlspecialchars_decode nofilter}</td>
                </tr>
                {/foreach}
                {if $a.images}
                <tr class="hidden">
                    <td colspan="2">
                        {foreach from=$a.images item=image}
                        <a target="_blank" href="{$image.path}{$image.name}" style="display: block; width: 100px; height: 100px; margin: 5px 5px 0 0;float: left;">
                            <img src="{$image.thumb_path}{$image.name}" alt=""/>
                        </a>
                        {/foreach}
                    </td>
                </tr>
                {/if}
                {*<tr class="ddd">
                    <td colspan="2" align="right">
                        <a href="" class="show_more" rel="{$smarty.foreach.t.index}">More...</a>
                    </td>
                </tr>*}
            </table>
            {/if}
        </td>
</tr>
{/foreach}
</table>
{else}
    <p class="no-items">{__("no_data")}</p>
{/if}

{include file="common/pagination.tpl"}

</form>
{/capture}
{include file="common/mainbox.tpl" title='Forms data' content=$smarty.capture.mainbox tools=$smarty.capture.tools select_languages=false buttons=$smarty.capture.buttons adv_buttons=$smarty.capture.adv_buttons}
