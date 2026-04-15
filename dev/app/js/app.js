document.addEventListener('DOMContentLoaded', function() {
	var elems = document.querySelectorAll('select');
	var instances = M.FormSelect.init(elems, {});
});
$(document).ready(function () {
	var stepper = document.querySelector('.stepper');
	$('select').formSelect();
	$("select[required]").css({display: "block", height: 0, padding: 0, width: 0, position: 'absolute'});
	$("select[required]").css({display: "inline", height: 0, padding: 0, width: 0});
	var stepperInstace = new MStepper(stepper, {
	   firstActive: 0,
	   linearStepsNavigation: true,
	   autoFocusInput: false,
	   showFeedbackPreloader: true,
	   autoFormCreation: true,
	   validationFunction: function(stepperForm, activeStepContent) {		   
			var inputs = $(activeStepContent).find('.validate');
			var errors = [];
			$.each(inputs, function(key, obj){
				if(!data_validate(obj)){
					errors.push(obj);
				}
			});
			if($(activeStepContent).find('.image-block img').length == 0){
				$(activeStepContent).find('.file-error-msg').html('Please select file');
				return false;
			}else{
				$(activeStepContent).find('.file-error-msg').html('');
			}
			return !errors.length;
		},
	   stepTitleNavigation: true,
	   feedbackPreloader: '<div class="spinner-layer spinner-blue-only">...</div>'
	})
	
	$('select').change(function(){
		data_validate(this);
	});
	
	$('.file').change(function () {
		if (this.files.length > 0) {			
			var file_obj = this;
			var file = this.files[0];
			var reader = new FileReader();
			var step_name = $(file_obj).closest('.step').attr('data-step-id');
			var count = $(this).parent('.input-field').find('.image-block img').length;
			reader.onload = function (e) {
				var img = new Image();
				img.src = e.target.result;
				img.onload = function () {				
					var canvas = document.createElement("canvas");					
					var MAX_WIDTH = 1000;
					var MAX_HEIGHT = 1000;
					var width = img.width;
					var height = img.height;

					if (width > height) {
						if (width > MAX_WIDTH) {
							height *= MAX_WIDTH / width;
							width = MAX_WIDTH;
						}
					} else {
						if (height > MAX_HEIGHT) {
							width *= MAX_HEIGHT / height;
							height = MAX_HEIGHT;
						}
					}					
					img.width = width
					img.height = height

					var ctx = canvas.getContext("2d");
					ctx.clearRect(0, 0, canvas.width, canvas.height);
					canvas.width = img.width;
					canvas.height = img.height;
					ctx.drawImage(img, 0, 0, img.width, img.height);
					
					$(file_obj).parent('div').find('.image-block').append("<img class='uploaded_image' data-id='" + step_name + "_" + count + "' heigth='50' src='" + canvas.toDataURL("image/png") + "'>").promise().done(function(){
						$(file_obj).parent('div').append('<input data-id="' + step_name + '_' + count + '" type="hidden" name="files[' + step_name + '][' + count + ']" value="' + $("img[data-id=" + step_name + "_" + count + "]").attr('src') + '" class="file_source"/>');	
						$(file_obj).parent('div').find('.file-error-msg').html('');
					});
				}
			};
			reader.readAsDataURL(file);
		}
	});
	
	$('#form').submit(function(){
		
		$('button[type=submit]').attr('disabled', true).text('Sending...');
		var steps = stepperInstace.getSteps();
		var all_errors = [];
		var error_indexes = [];
		
		$.each($('.stepper .step'), function(key, activeStepContent){
			var inputs = $(activeStepContent).find('.validate');
			var errors = [];
			$.each(inputs, function(key, obj){
				if(!data_validate(obj)){
					errors.push(obj);
					all_errors.push(obj);
				}
			});
			if($(activeStepContent).find('.image-block').length > 0){
				if($(activeStepContent).find('.image-block img').length == 0){
					$(activeStepContent).find('.file-error-msg').html('Please select file');
					errors.push('Please select file');
					all_errors.push('Please select file');
				}else{
					$(activeStepContent).find('.file-error-msg').html('');
				}
			}
			
			if(errors.length){
				stepperInstace.activateStep(steps, key);
				stepperInstace.openStep(key, true);
				error_indexes.push(key);
			}
		});
		
		if(all_errors.length > 0){
			$([document.documentElement, document.body]).animate({
				scrollTop: $("li.step").eq(error_indexes[0]).offset().top
			}, 1000);
			$('button[type=submit]').attr('disabled', false).text('Submit');
			return false;
		}
		
		$(this).ajaxSubmit({
			type: 'POST',
			dataType: 'json',
			url: 'https://enlightensauna.com/dev/app/app/app.php',
			success: function(data){
				if(data.result != undefined && data.result == 1){
					location.href = 'finish.php';
				}else{
					$('button[type=submit]').attr('disabled', false).text('Submit');
					alert(data.msg);
				}
			}
		});
		return false;
	});
	
	
});


$(document).on('click', '.uploaded_image', function(){
	if(confirm('Delete?')){
		var data_id = $(this).attr('data-id');
		$('[data-id=' + data_id + ']').remove();
	}
});


function data_validate(obj){
	if($(obj).val() == ''){
		if($(obj).get(0).tagName == 'INPUT'){
			$(obj).addClass('invalid').removeClass('valid');
		}else if($(obj).get(0).tagName == 'SELECT'){
			$(obj).parent('.select-wrapper').find('.select-dropdown').addClass('invalid').removeClass('valid');
		}
		return false;
	}else{
		if($(obj).get(0).tagName == 'INPUT'){
			$(obj).removeClass('invalid').addClass('valid');;
		}else if($(obj).get(0).tagName == 'SELECT'){
			$(obj).parent('.select-wrapper').find('.select-dropdown')
				.removeClass('invalid')
				.addClass('valid');
		}
		return true;
	}
}