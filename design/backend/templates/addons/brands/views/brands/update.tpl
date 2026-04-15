{if $brand}
    {assign var="id" value=$brand.brand_id}
{else}
    {assign var="id" value=0}
{/if}

{capture name="mainbox"}

    <form action="{""|fn_url}" method="post" class="form-horizontal form-edit" name="brand_form" enctype="multipart/form-data">
        <input type="hidden" class="cm-no-hide-input" name="fake" value="1" />
        <input type="hidden" class="cm-no-hide-input" name="brand_id" value="{$id}" />

        {capture name="tabsbox"}

            <div id="content_general">
                <div class="control-group">
                    <label for="elm_brand_name" class="control-label cm-required">Brand</label>
                    <div class="controls">
                        <input type="text" name="brand_data[name]" id="elm_brand_name" value="{$brand.name}" size="10" class="input-large" />
                    </div>
                </div>
                <div class="control-group">
                    <div id="brand_image" class="in collapse">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label">{__("image")}:</label>
                                <div class="controls">
                                    {include file="common/attach_images.tpl" image_name="brand_image" image_object_type="brand" image_pair=$brand.main_pair no_detailed=true hide_titles=true}
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>

        {/capture}
        {include file="common/tabsbox.tpl" content=$smarty.capture.tabsbox active_tab=$smarty.request.selected_section track=true}

        {capture name="buttons"}
            {if !$id}
                {include file="buttons/save_cancel.tpl" but_role="submit-link" but_target_form="brand_form" but_name="dispatch[brands.update]"}
            {else}
                {include file="buttons/save_cancel.tpl" but_name="dispatch[brands.update]" but_role="submit-link" but_target_form="brand_form" hide_first_button=$hide_first_button hide_second_button=$hide_second_button save=$id}
            {/if}
        {/capture}

    </form>

{/capture}

{if !$id}
    {$title = "Add brand"}
{else}
    {$title = "Edit brand"}
{/if}

{include file="common/mainbox.tpl"
    title=$title
    content=$smarty.capture.mainbox
    buttons=$smarty.capture.buttons
    select_languages=false}
