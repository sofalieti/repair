{literal}
<script type="text/javascript">
$(document).ready(function(){
	var el_width = $('.ty-form-builder').width();
	$(window).scroll(function() {
		var el_start = $('.ty-form-builder__description').offset().top-60;
		var el_end = $('.ty-form-builder__description').height() + el_start - $('.ty-form-builder').height();
		if ($(this).scrollTop() > el_start && $(this).scrollTop() < el_end) {		
			$('.ty-form-builder').addClass('static-top');
			$('.ty-form-builder').css('width', el_width + 'px');
			$('.ty-form-builder').removeClass('absulute-bottom');
			$('.ty-form-builder').css('top', '80px');
		}else if($(this).scrollTop() <= el_start){	
			$('.ty-form-builder').removeClass('static-top');
			$('.ty-form-builder').removeClass('absulute-bottom');
			$('.ty-form-builder').attr('style', '');
		}else{
			$('.ty-form-builder').addClass('absulute-bottom');
			$('.ty-form-builder').removeClass('static-top');
			$('.ty-form-builder').attr('style', '');
			$('.ty-form-builder').css('width', el_width + 'px');
		}
		
		
	});	
});
</script>
{/literal}