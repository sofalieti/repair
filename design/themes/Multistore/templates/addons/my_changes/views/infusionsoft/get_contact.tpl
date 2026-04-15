<h2 class="ty-mainbox-simple-title" style="text-align: center; margin: 20px 0;">Get Infusionsoft Contact</h2>
	{if $email}
	<form action="/index.php" method="POST">
		<input type="hidden" name="dispatch" value="infusionsoft.delete_contact"/>
		<input type="hidden" name="secret123" value=""/>
		<input type="hidden" name="email" value="{$email}"/>
		<table class="infusionsoft-contact-table">
			<tr>
				<th colspan="4">{$email}</th>
				<th colspan="4" style="text-align: right"><input type="submit" value="Delete selected"/></th>
			</tr>
			{if $user_data|@count}
			<tr>
				<th width="10"><input type="checkbox" id="check_all"/></th>
				<th>Id</th>
				<th>Phone</th>
				<th>Name</th>
				<th>Tags</th>
				<th>Companies</th>
				<th>Email status</th>
				<th></th>
			</tr>
			{foreach from=$user_data item=u}
			<tr>
				<td><input type="checkbox" name="id[]" class="d-users" value="{$u['id']}"/></td>
				<td>{$u['id']}</td>
				<td>{$u['phone_numbers'][0]['number']}</td>
				<td>{$u['given_name']}</td>
				<td>
					<ul>
						{foreach from=$u['tags']['tags'] item=t}
						<li>{$t['tag']['name']}</li>
						{/foreach}
					</ul>
				</td>
				<td>-</td>
				<td>{$u['email_status']}</td>
				<td>
					<a href="/index.php?dispatch=infusionsoft.delete_contact&secret123=&id={$u['id']}&email={$email}" onclick="return confirm('Delete?');">Delete</a>
				</td>
			</tr>
			{/foreach}
			{else}
			<tr><td colspan="8">Not found</td></tr>
			{/if}
		</table>
	</form>
{else}
<form action="index.php" method="GET">
	<input type="hidden" name="dispatch" value="infusionsoft.get_contact"/>
	<input type="hidden" name="secret123" value=""/>
	<div class="ty-control-group leftt" style="text-align: center;">
		<label for="email" class="hidden ty-control-group__title cm-required ">E-mail</label>
		<input id="email" class="ty-input-text " size="50" type="text" name="email" value="" placeholder="E-mail"/>
		<button class="ty-btn" type="submit">Search</button>
	</div>
</form>
{/if}
{literal}
<style>
.infusionsoft-contact-table{
	text-align: left;
	width: 100%;
}
.infusionsoft-contact-table td, .infusionsoft-contact-table th{
	padding: 10px;
}
.infusionsoft-contact-table tr:nth-child(odd) td{
	background: #efefef;
}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$('#check_all').change(function(){
			if($(this).prop('checked')){
				$('.d-users').attr('checked', true);
			}else{
				$('.d-users').attr('checked', false);
			}
		});
	});
</script>
{/literal}