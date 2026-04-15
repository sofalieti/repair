{capture name="mainbox"}

    {if $brands}
        <div class="table-responsive-wrapper">
            <table class="table table-middle table-responsive">
                <thead>
                    <tr>
                        <th>Brand</th>
                        <th width="6%">&nbsp;</th>
                    </tr>
                </thead>
                {foreach from=$brands item=brand}
                    <tr>
                        <td class="">
                            <a class="row-status" href="{"brands.update?brand_id=`$brand.brand_id`"|fn_url}">{$brand.name}</a>
                        </td>
                        <td>
                            {capture name="tools_list"}
                        <li>{btn type="list" text=__("edit") href="brands.update?brand_id=`$brand.brand_id`"}</li>
                        <li>{btn type="list" class="cm-confirm" text=__("delete") href="brands.delete?brand_id=`$brand.brand_id`" method="POST"}</li>
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
        {include file="common/tools.tpl" tool_href="brands.add" prefix="top" hide_tools="true" title='Add brand' icon="icon-plus"}
    {/capture}

{/capture}

{include file="common/mainbox.tpl" title=__("brands") content=$smarty.capture.mainbox buttons=$smarty.capture.buttons adv_buttons=$smarty.capture.adv_buttons}