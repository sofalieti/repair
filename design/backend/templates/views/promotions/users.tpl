{capture name="mainbox"}

<form action="{""|fn_url}" method="post" name="promotion_form" class="promotion_users {if ""|fn_check_form_permissions} cm-hide-inputs{/if}" id="users">

{include file="common/pagination.tpl" save_current_page=true save_current_url=true div_id='users'}

{assign var="c_url" value=$config.current_url|fn_query_remove:"sort_by":"sort_order"}
{assign var="c_icon" value="<i class=\"exicon-`$search.sort_order_rev`\"></i>"}
{assign var="c_dummy" value="<i class=\"exicon-dummy\"></i>"}

{if $users_info}
<table class="table table-middle">
<thead>
<tr>
	<th width="1%" class="center">
		<input type="checkbox" name="check_all" value="Y" title="{$lang.check_uncheck_all}" class="checkbox cm-check-items" />
	</th>
	<th width="30%">
		<span>Name</span>
	</th>
	<th width="40%">&nbsp;</th>
	<th width="10%">
		<span>Email</span>
	</th>
	<th width="10%">
		<span>Number phone</span>		
	</th>
	<th width="12%">
		<span>Date</span>
	</th>
	<th>&nbsp;</th>
</tr>
</thead>

{foreach from=$users_info key=k item=user}

<tr class="cm-row-status-{$promotion.status|lower} {$additional_class}">
	<td class="center">
		<input name="promotion_ids[]" type="checkbox" value="{$promotion.promotion_id}" class="checkbox cm-item" />
	</td>
	<td>				
		<span class="pr_user_name">{$user.name}</span>
	</td>
	<td class="coupon">
		{if $user.percent && $user.status == 'A'}
			<div class="percent_user"> Created bonus: <span>{$user.percent}%</span>&nbsp;Coupone code: <span>{$user.user_coupon}</span><br/>
			From {$user.from_date|date_format:"%m.%d.%Y"} to {$user.to_date|date_format:"%m.%d.%Y"}</div>
		{elseif $user.status == 'D'}
			<div class="percent_user"><span>Coupon used</span></div>
		{else}
		<div class="box_discount">					
			<div class="discount_user"><a href="{"promotions.user_discount?user_id=`$user.id`&discount=5"|fn_url}">5%</a></div>
			<div class="discount_user"><a href="{"promotions.user_discount?user_id=`$user.id`&discount=10"|fn_url}">10%</a></div>
			<div class="discount_user"><a href="{"promotions.user_discount?user_id=`$user.id`&discount=15"|fn_url}">15%</a></div>
			<div class="discount_user"><a href="{"promotions.user_discount?user_id=`$user.id`&discount=20"|fn_url}">20%</a></div>
		</div>
		{/if}
		{if $user.percent && $user.status == 'A' || $user.percent && $user.status == 'D'}
		&nbsp;<a href="#" onclick="{literal}if($(this).next('.edit_box').css('display') == 'none'){$(this).next('.edit_box').css('display','block')}else{$(this).next('.edit_box').css('display','none')};return false;{/literal}">Edit</a>
		<div class="edit_box" style="display: none">
			<form action="{""|fn_url}" method="post" class="cm-form-highlight">
				<input type="hidden" name="promotion_bonus[user_id]" value="{$user.id}">
				<div class="form-field">
					<label for="discussion_type">Bonus:</label>
					<select name="promotion_bonus[bonus]" id="discussion_type">
						<option value="5" {if $user.percent eq 5}selected{/if}>5</option>
						<option value="10" {if $user.percent eq 10}selected{/if}>10</option>
						<option value="15" {if $user.percent eq 15}selected{/if}>15</option>
						<option value="20" {if $user.percent eq 20}selected{/if}>20</option>
					</select>
				</div>
				<div class="form-field">
					<label for="discussion_type">Days:</label>
					<select name="promotion_bonus[days]" id="discussion_type">
						<option value="0">-</option>
						<option value="30">30</option>
						<option value="60">60</option>
						<option value="90">90</option>
					</select>
				</div>
				<div class="form-field">
					<span class="submit-button cm-button-main "><input type="submit" name="dispatch[promotions.update_user_bonus]" value="Save"></span>
				</div>
			</form>
		</div>
		{/if}

	</td>
	<td>
		{$user.email}
	</td>
	<td>
		{$user.phone}
	</td>
	<td>
		{$user.created_at|date_format:"%m.%d.%Y"}
	</td>

	<td class="nowrap">
	<ul class="pr_user_delete">
		<!--<li>
			<a class="cm-dialog-opener text-button-edit cm-ajax-update" href="{"promotions.edit_user_promotion?user_id=`$user.id`"|fn_url}" id="opener_group" rev="content_group">Edit</a>
			<div class="hidden" id="content_group" title="Edit user promotion"></div>
		</li>-->
		<li><a class="cm-confirm" href="{"promotions.resend_bonus?user_id=`$user.id`"|fn_url}">Resend</a></li>
		<li><a class="cm-confirm" href="{"promotions.user_delete?user_id=`$user.id`"|fn_url}">Delete</a></li>
	</ul>
	</td>
</tr>
{/foreach}
</table>
{else}
    <p class="no-items">{__("no_data")}</p>
{/if}

{include file="common/pagination.tpl"}

{capture name="adv_buttons"}
    {capture name="tools_list"}
        <li>{btn type="list" text=__("add_catalog_promotion") href="promotions.add?zone=catalog"}</li>
        {if !"ULTIMATE:FREE"|fn_allowed_for}
            <li>{btn type="list" text=__("add_cart_promotion") href="promotions.add?zone=cart"}</li>
        {else}
            <li>{btn type="list" text=__("add_cart_promotion") class="cm-promo-popup"}</li>
        {/if}
    {/capture}
    {dropdown content=$smarty.capture.tools_list icon="icon-plus" no_caret=true placement="right"}
    {** Hook for the actions menu on the products manage page *}
{/capture}

</form>
{/capture}
{include file="common/mainbox.tpl" title=__("promotions") content=$smarty.capture.mainbox tools=$smarty.capture.tools select_languages=true buttons=$smarty.capture.buttons adv_buttons=$smarty.capture.adv_buttons}
