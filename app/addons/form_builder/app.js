$(document).ready(function(){
	//Contact form
	$('.form_group_371').click(function(){
		if($(this).hasClass('opened')){
			$(this).removeClass('opened');
			$(this).text($(this).text().replace('-', '+'));
			$('#form_group_133, #form_group_134, #form_group_136, #form_group_135, #form_group_137').hide(0);
		}else{
			$(this).addClass('opened');
			$(this).text($(this).text().replace('+', '-'));
			$('#form_group_133, #form_group_134, #form_group_136, #form_group_135, #form_group_137').show(0);
		}
	})
	

	$('.form_group_372').click(function(){
		if($(this).hasClass('opened')){
			$(this).removeClass('opened');
			$(this).text($(this).text().replace('-', '+'));
			$('#form_group_133, #form_group_62, #form_group_63, #form_group_64, #form_group_65,#form_group_66').hide(0);
		}else{
			$(this).addClass('opened');
			$(this).text($(this).text().replace('+', '-'));
			$('#form_group_133, #form_group_62, #form_group_63, #form_group_64, #form_group_65,#form_group_66').show(0);
		}
	})
	
		
	$('.form_group_373').click(function(){
		if($(this).hasClass('opened')){
			$(this).removeClass('opened');
			$(this).text($(this).text().replace('-', '+'));
			$('#form_group_164, #form_group_165, #form_group_166, #form_group_167,#form_group_168,#form_group_169').hide(0);
		}else{
			$(this).addClass('opened');
			$(this).text($(this).text().replace('+', '-'));
			$('#form_group_164, #form_group_165, #form_group_166, #form_group_167,#form_group_168,#form_group_169').show(0);
		}
	})


	$('.form_group_374').click(function(){
		if($(this).hasClass('opened')){
			$(this).removeClass('opened');
			$(this).text($(this).text().replace('-', '+'));
			$('#form_group_353, #form_group_177, #form_group_178, #form_group_179,#form_group_180,#form_group_181').hide(0);
		}else{
			$(this).addClass('opened');
			$(this).text($(this).text().replace('+', '-'));
			$('#form_group_353, #form_group_177, #form_group_178, #form_group_179,#form_group_180,#form_group_181').show(0);
		}
	})
		
	$('.form_group_375').click(function(){
		if($(this).hasClass('opened')){
			$(this).removeClass('opened');
			$(this).text($(this).text().replace('-', '+'));
			$('#form_group_192, #form_group_193, #form_group_194, #form_group_195,#form_group_196,#form_group_197').hide(0);
		}else{
			$(this).addClass('opened');
			$(this).text($(this).text().replace('+', '-'));
			$('#form_group_192, #form_group_193, #form_group_194, #form_group_195,#form_group_196,#form_group_197').show(0);
		}
	})
				
	
});