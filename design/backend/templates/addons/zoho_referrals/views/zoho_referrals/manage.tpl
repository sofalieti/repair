{capture name="mainbox"}

{if $zoho_auth|count}

<table class="table table-tree table-middle">
	<thead>
		<tr>
			<th colspan="2">Authentication data</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Access token</td>
			<td>{$zoho_auth.access_token}</td>
		</tr>
		<tr>
			<td>Refresh token</td>
			<td>{$zoho_auth.refresh_token}</td>
		</tr>
		<tr>
			<td>Created at</td>
			<td>{$zoho_auth.created_at}</td>
		</tr>
		<tr>
			<td>Type</td>
			<td>{$zoho_auth.type}</td>
		</tr>
		<tr>
			<td colspan="2">
				<a href="{"zoho_referrals.refresh_token"|fn_url}" class="btn  btn-primary">Get new access token</a>
			</td>
		</tr>
	</tbody>
</table>

{else}
<a href="/app/addons/zoho_referrals/zoho-app.php" class="btn  btn-primary">Get access token</a>
{/if}

{/capture}
{include file="common/mainbox.tpl" title=__("zoho_referrals") content=$smarty.capture.mainbox buttons=$smarty.capture.buttons adv_buttons=$smarty.capture.adv_buttons}
