$(document).ready(function(){
	zoho_load_tickets(1);
});
$(document).on('click','.tickets-pages a', function(){
	var page = parseInt($(this).attr('data-page'));
	zoho_load_tickets(page);
	return false;
});

function zoho_load_tickets(start_page){
	$.ajax({
		url: '/app/addons/zoho_referrals/zoho-app.php',
		type: 'get',
		dataType: 'json',
		data: {
			get_tikects: 1,
			start_page: start_page
		},
		beforeSend: function(){
			$('.zoho-tickets').append('<img src="/design/themes/Multistore/media/images/spinner.gif"/> Load...');
		},
		success: function(data){
			if(data.result == 1){
				$('.zoho-tickets').html(data.data);				
			}else{
				$('.zoho-tickets').html(data.error);
			}
		}
	});
}