<div class="referral-block">
	<h1 class="ty-mainbox-title">
		<span>Referral system</span>
	</h1>	
	<div class="title">Info</div>
	<div class="description">Your referral link <strong>http{if $smarty.server.HTTPS eq 'on'}s{/if}://{$smarty.server.HTTP_HOST}/?referral=rl{$auth.user_id}</strong></div>
	
	<div class="title">Tickets</div>
	<div class="zoho-tickets"></div>
</div>
<script type="text/javascript" src="/app/addons/zoho_referrals/js/app.js"></script>