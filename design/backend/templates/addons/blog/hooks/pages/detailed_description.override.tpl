        {if $page_type != $smarty.const.PAGE_TYPE_LINK}
        <div class="control-group">
            {if $page_type == $smarty.const.PAGE_TYPE_BLOG}
            <label class="control-label" for="elm_page_descr">{__("post_description")}:</label>
            {else}
            <label class="control-label" for="elm_page_descr">{__("description")}:</label>
            {/if}
            <div class="controls">
                <textarea id="elm_page_descr" name="page_data[description]" cols="55" rows="8" class="cm-wysiwyg input-large">{$page_data.description}</textarea>
            </div>
        </div>
        {/if}
		
		{if $page_type == $smarty.const.PAGE_TYPE_BLOG}
		{*<div class="control-group">
            <label class="control-label" for="elm_blog_preview_text">Preview:</label>
            <div class="controls">
                <textarea id="elm_blog_preview_text" name="page_data[blog_preview_text]" cols="55" rows="8" class="cm-wysiwyg input-large">{$page_data.blog_preview_text}</textarea>
            </div>
        </div>*}
		<div class="control-group">
            <label class="control-label" for="elm_blog_product_text">Product text:</label>
            <div class="controls">
                <textarea id="elm_blog_product_text" name="page_data[blog_product_text]" cols="55" rows="8" class="cm-wysiwyg input-large">{$page_data.blog_product_text}</textarea>
            </div>
        </div>
		<div class="control-group">
            <label class="control-label" for="elm_blog_product_id">Product:</label>
            <div class="controls">
                <select name="page_data[blog_product_id]" id="elm_blog_product_id">
					<option value="0">-</option>
					{foreach from="SELECT * FROM ?:product_descriptions ORDER BY product ASC"|db_get_array item=product}
					<option value="{$product.product_id}" {if $product.product_id == $page_data.blog_product_id}selected{/if}>{$product.product} #{$product.product_id}</option>
					{/foreach}
				</select>
            </div>
        </div>
		<div class="control-group">
            <label class="control-label" for="elm_blog_sauna_type">Sauna type:</label>
            <div class="controls">
                <select name="page_data[blog_sauna_type]" id="elm_blog_sauna_type">
					<option value="outdoor" {if $page_data.blog_sauna_type == 'outdoor'}selected{/if}>Outdoor</option>
					<option value="indoor" {if $page_data.blog_sauna_type == 'indoor'}selected{/if}>Indoor</option>
				</select>
            </div>
        </div>
		{/if}

        {if $page_type == $smarty.const.PAGE_TYPE_LINK}
            {include file="views/pages/components/pages_link.tpl"}
        {/if}
