{capture name="mainbox"}
{if $data}
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
                $(this).children('img').attr("src", "/skins/basic/admin/images/icons/advanced_search_collapsed.png");
            }
            else{
                $("#t"+$(this).attr("rel")+" .hidden").hide();
                $(this).children('img').attr("src", "/skins/basic/admin/images/icons/advanced_search_expanded.png");
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
{include file="common_templates/pagination.tpl" save_current_page=true save_current_url=true div_id=$smarty.request.content_id}
<select id="select_page">
    <option value="all">All</option>
    {foreach from=$pages item=page}
    <option value="{$page.page_id}" {if $page_id eq $page.page_id}selected{/if}>{$page.page_name}</option>
    {/foreach}
</select>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table sortable hidden-inputs form_data">
    <tr>
            <th><span>Form data</span></th>
            <th>&nbsp;</th>
    </tr>
    {foreach from=$data item=a name=t}
    <tr class="no_hover">
        <td colspan="2">
            <h3 style="float: left;"><a href="/admin.php?dispatch=save_forms.manage&page_id={$a.page_id}">{$a.page_name}</a> <span style="font-size: 12px;font-weight: normal;color: #969696;  margin-left: 30px;">({$a.created_at|date_format:"%m.%d.%Y %H:%M"})</span></h3>
            <div style="float:right">
                <a class="tool-link float-right" href="/admin.php?dispatch=save_forms.delete&id={$a.id}" onclick="return confirm('Are you sure?')">Delete</a>
            </div>
            <div style="cursor: pointer;  float:right; margin-right: 16px;">
                <a href="" class="show_more" rel="{$smarty.foreach.t.index}" ><img  src="/skins/basic/admin/images/icons/advanced_search_expanded.png" alt="" border="0" height="24" width="23" /></a>
                {**}
            </div>            
            {if $a.data}
            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="value table no_hover " id="t{$smarty.foreach.t.index}">
                <tr class="row hidden">
                        <th><span>Field name</span></th>
                        <th><span>Field value</span></th>
                </tr>
                {foreach from=$a.data item=value name=value}
                <tr class="row hidden">
                    <td>{$value.field_name}</td>
                    <td>{$value.field_value}</td>
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
{/if}
{/capture}
{include file="common_templates/mainbox.tpl" title="Form data" content=$smarty.capture.mainbox}