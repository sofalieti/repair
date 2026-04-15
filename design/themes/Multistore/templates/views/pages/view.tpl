{if $page.show_child_pages eq "N"}
<div class="ty-wysiwyg-content {if $page.is_container}container{/if}">
    {hook name="pages:page_content"}
    <div {live_edit name="page:description:{$page.page_id}"}>{$page.description nofilter}</div>
    {/hook}
</div>
{capture name="mainbox_title"}<span {live_edit name="page:page:{$page.page_id}"}>{$page.page}</span>{/capture}
{hook name="pages:page_extra"}{/hook}
{else}
<div class="container page-card-list">
	{assign var=l1_pages value=['parent_id' => $page.page_id, 'subpages' => 'N', 'status' => 'A']|fn_get_pages|current}
	{foreach from=$l1_pages item=l1_page}
	{assign var=l2_pages value=['parent_id' => $l1_page.page_id, 'subpages' => 'N', 'status' => 'A']|fn_get_pages|current}
	{if $l2_pages|@count}
	<h2>{$l1_page.page}</h2>
	{foreach from=$l2_pages item=l2_page}
	<a href="{"pages.view?page_id=`$l2_page.page_id`"|fn_url}" class="card">
		<div class="row align-items-center">
			<div class="col-16 col-md-2 d-none d-md-block">{include file="common/image.tpl" image_width="120" obj_id=$l2_page.page_id images=$l2_page.main_pair class="mx-auto d-block small-img"}</div>
			<div class="col-16 col-md-14 px-3">
				<div class="card-block px-3">
					<h4 class="card-title">{$l2_page.page}</h4>
					<div class="card-text ">{$l2_page.short_description nofilter}</div>
                                        <div class="card-text d-block d-md-none"><b>Read more...</b></div>
				</div>
			</div>
		</div>
	</a>
	{/foreach}
	{else}
	<a href="{"pages.view?page_id=`$l1_page.page_id`"|fn_url}" class="card">
		<div class="row align-items-center">
			<div class="col-md-2 col-sm-4 col-4">{include file="common/image.tpl" image_width="120" obj_id=$l1_page.page_id images=$l1_page.main_pair class="small-img"}</div>
			<div class="col-md-14 col-sm-12 col-12 px-3">
				<div class="card-block px-3">
					<h4 class="card-title">{$l1_page.page}</h4>
					<div class="card-text">{$l1_page.short_description nofilter}</div>
				</div>
			</div>
		</div>
	</a>
	{/if}
	{/foreach}
       
	{capture name="mainbox_title"}<span {live_edit name="page:page:{$page.page_id}"}>{$page.page}</span>{/capture}
</div>
{/if}