<!doctype html>
<html lang="en">
<head>
	<title>Infrared Sauna Parts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#CCC"/>
	<!-- icon in the highest resolution we need it for -->
	<link rel="icon" sizes="192x192" href="images/192.png">
	
	<meta name="Description" content="Put your description here.">

	<!-- reuse same icon for Safari -->
	<link rel="apple-touch-icon" href="images/192.png">
	<link href="https://fonts.googleapis.com/css?family=Material+Icons|Roboto:300,400,500" rel="stylesheet">
	

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" media="screen,projection" />
	<link rel="stylesheet" href="css/mstepper.min.css">
	<link rel="stylesheet" href="css/app.css?1">

	<!-- multiple icons for IE -->
	<meta name="msapplication-square310x310logo" content="images/300.png">
</head>
<body>
<center>
<img src="https://infraredsaunaparts.com/images/logos/18/logo.png" width="100">
</center>

<form id="form" enctype="multipart/form-data" id="form" method='post'>
	<div class="section" id="">
		<ul class="stepper">
			<li class="step" data-step-id="step1">
				<div data-step-label="What you sauna Sizes?" class="step-title waves-effect waves-dark">Step 1</div>
				<div class="step-content">
					<div class="row">
						<div class="input-field col-6 s12">
							<input id="width" name="width" type="number" class="validate" data-required="number">
							<label for="width">Width</label>
						</div>
						<div class="input-field col-6 s12">
							<input id="depth" name="depth" type="number" class="validate"  data-required="number">
							<label for="depth">Depth</label>
						</div>
						<div class="input-field col-6 s12">
							<input id="height" name="height" type="number" class="validate"  data-required="number">
							<label for="height">Height</label>
						</div>
						<div class="input-field col-6 s12">
							<select id="unit" name="unit" class="validate"  data-required="not_empty">
								<option value="">Select</option>
								<option value="inch.">inch.</option>
								<option value="inch.">ft.</option>
							</select>
							<label for="unit">Unit</label>
						</div>
						<div class="input-field col-12 s12">
							<div class="file-error-msg"></div>
							<div class="image-block"></div>
							<input id="file_step_1" type="file" class="file inputfile" accept="image/*" capture="camera"  data-required="not_empty"/>
							<label for="file_step_1">Make A Photo +</label>
						</div>
					</div>
					<div class="step-actions">
						<button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
					</div>
				</div>
			</li>
		  <li class="step" data-step-id="step2">
			 <div data-step-label="How much control panels your have?" class="step-title waves-effect waves-dark">Step 2</div>
			 <div class="step-content">
				<div class="row">
					<div class="input-field col-md-12 s12">
						<select id="count_control_panels" name="count_control_panels" class="validate"  data-required="not_empty">
							<option value="">Select</option>
							<? for($i = 1; $i <= 10; $i++):?>
							<option value="<?=$i?>"><?=$i?></option>
							<? endfor;?>
						</select>
						<label for="count_control_panels">How much control panels your have?</label>
					</div>
					<div class="input-field col-12 s12">
						<div class="file-error-msg"></div>
						<div class="image-block"></div>
						<input id="file_step_2" type="file" class="file inputfile" accept="image/*" capture="camera"  data-required="not_empty"/>
						<label for="file_step_2">Make A Photo +</label>
					</div>
				</div>
				<div class="step-actions">
				   <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
				   <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
				</div>
			 </div>
		  </li>
		  <li class="step" data-step-id="step3">
			 <div data-step-label="Heaters" class="step-title waves-effect waves-dark">Step 3</div>
			 <div class="step-content">
				<div class="row">
					<div class="input-field col-md-12 s12">
						<select id="count_heaters" name="count_heaters" class="validate"  data-required="not_empty">
							<option value="">Select</option>
							<? for($i = 1; $i <= 10; $i++):?>
							<option value="<?=$i?>"><?=$i?></option>
							<? endfor;?>
						</select>
						<label for="count_heaters">How much heaters your have?</label>
					</div>
					<div class="input-field col-md-12 s12">
						<select id="heaters_type" name="heaters_type" class="validate"  data-required="not_empty">
							<option value="">Select</option>
							<option value="Low Emf Carbon Fiber Infrared Heaters">Low Emf Carbon Fiber Infrared Heaters</option>
							<option value="Low Emf Ceramic Infrared Heaters">Low Emf Ceramic Infrared Heaters</option>
							<option value="Full Spectrum Infrared Heaters">Full Spectrum Infrared Heaters</option>
							<option value="Zero Emf Organic Ceramic & Carbon Infrared Heaters">Zero Emf Organic Ceramic & Carbon Infrared Heaters</option>
							<option value="Zero Emf Radiant Ceramic & Carbon Infrared Heaters">Zero Emf Radiant Ceramic & Carbon Infrared Heaters</option>
							<option value="Other">Other</option>
						</select>
						<label for="heaters_type">Whath type of heaters your have?</label>
					</div>
					<div class="input-field col-12 s12">
						<div class="file-error-msg"></div>
						<div class="image-block"></div>
						<input id="file_step_3" type="file" class="file inputfile" accept="image/*" capture="camera"  data-required="not_empty"/>
						<label for="file_step_3">Make A Photo +</label>
					</div>
				</div>
				<div class="step-actions">
				   <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
				   <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
				</div>
			 </div>
		  </li>
		  <li class="step" data-step-id="step4">
			 <div data-step-label="Lights and Lamps" class="step-title waves-effect waves-dark">Step 4</div>
			 <div class="step-content">
				<div class="row">
					<div class="input-field col-md-12 s12">
						<select id="inside_lights" name="inside_lights" class="validate"  data-required="not_empty">
							<option value="">Select</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
						<label for="inside_lights">Do you have inside Lights?</label>
					</div>
					<div class="input-field col-md-12 s12">
						<select id="outside_lights" name="outside_lights" class="validate"  data-required="not_empty">
							<option value="">Select</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
						<label for="outside_lights">Do you have outside Lights?</label>
					</div>
					<div class="input-field col-12 s12">
						<div class="file-error-msg"></div>
						<div class="image-block"></div>
						<input id="file_step_4" type="file" class="file inputfile" accept="image/*" capture="camera"  data-required="not_empty"/>
						<label for="file_step_4">Make A Photo +</label>
					</div>
				</div>
				<div class="step-actions">
				   <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
				   <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
				</div>
			 </div>
		  </li>
		  <li class="step" data-step-id="step5">
			 <div data-step-label="Do you have a stereo system?" class="step-title waves-effect waves-dark">Step 5</div>
			 <div class="step-content">
				<div class="row">
					<div class="input-field col-md-12 s12">
						<select id="stereo_system" name="stereo_system" class="validate"  data-required="not_empty">
							<option value="">Select</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
						<label for="stereo_system">Do you have a stereo system?</label>
					</div>
					<div class="input-field col-12 s12">
						<div class="file-error-msg"></div>
						<div class="image-block"></div>
						<input id="file_step_5" type="file" class="file inputfile" accept="image/*" capture="camera"  data-required="not_empty"/>
						<label for="file_step_5">Make A Photo +</label>
					</div>
				</div>
				<div class="step-actions">
				   <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
				   <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
				</div>
			 </div>
		  </li>
		  <li class="step" data-step-id="step6">
			 <div data-step-label="Do you have chromotherapy lights?" class="step-title waves-effect waves-dark">Step 6</div>
			 <div class="step-content">
				<div class="row">
					<div class="input-field col-md-12 s12">
						<select id="chromotherapy_lights" name="chromotherapy_lights" class="validate"  data-required="not_empty">
							<option value="">Select</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
						<label for="chromotherapy_lights">Do you have chromotherapy lights?</label>
					</div>
					<div class="input-field col-12 s12">
						<div class="file-error-msg"></div>
						<div class="image-block"></div>
						<input id="file_step_6" type="file" class="file inputfile" accept="image/*" capture="camera"  data-required="not_empty"/>
						<label for="file_step_6">Make A Photo +</label>
					</div>
				</div>
				<div class="step-actions">
				   <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
				   <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
				</div>
			 </div>
		  </li>
		  <li class="step" data-step-id="step7">
			 <div data-step-label="Do you have Ionizer?" class="step-title waves-effect waves-dark">Step 7</div>
			 <div class="step-content">
				<div class="row">
					<div class="input-field col-md-12 s12">
						<select id="ionizer" name="ionizer" class="validate"  data-required="not_empty">
							<option value="">Select</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
						<label for="ionizer">Do you have Ionizer?</label>
					</div>
					<div class="input-field col-12 s12">
						<div class="file-error-msg"></div>
						<div class="image-block"></div>
						<input id="file_step_7" type="file" class="file inputfile" accept="image/*" capture="camera"  data-required="not_empty"/>
						<label for="file_step_7">Make A Photo +</label>
					</div>
				</div>
				<div class="step-actions">
				   <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
				   <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
				</div>
			 </div>
		  </li>
		  <li class="step" data-step-id="step8">
			 <div data-step-label="Where is you powerbox located?" class="step-title waves-effect waves-dark">Step 8</div>
			 <div class="step-content">
				<div class="row">
					<div class="input-field col-md-12 s12">
						<textarea id="powerbox" name="powerbox" class="materialize-textarea validate" data-required="number"></textarea>
						<label for="powerbox">Where is you powerbox located?</label>
					</div>
					<div class="input-field col-12 s12">
						<div class="file-error-msg"></div>
						<div class="image-block"></div>
						<input id="file_step_8" type="file" class="file inputfile" accept="image/*" capture="camera"  data-required="not_empty"/>
						<label for="file_step_8">Make A Photo +</label>
					</div>
				</div>
				<div class="step-actions">
				   <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
				   <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
				</div>
			 </div>
		  </li>
		  <li class="step" data-step-id="step9">
			 <div class="step-title waves-effect waves-dark">Finish</div>
			 <div class="step-content">
				<div class="row">
					<div class="input-field col-12 s12">
						<input id="name" name="name" type="text" class="validate" data-required="number">
						<label for="name">Name</label>
					</div>
					<div class="input-field col-12 s12">
						<input id="phone" name="phone" type="text" class="validate" data-required="number">
						<label for="phone">Phone</label>
					</div>
					<div class="input-field col-12 s12">
						<input id="email" name="email" type="email" class="validate" data-required="number">
						<label for="email">E-mail</label>
					</div>
				</div>
				<div class="step-actions">
				   <button class="waves-effect waves-dark btn blue" type="submit">Submit</button>
				</div>
			 </div>
		  </li>
	   </ul>
	</div>
</form>
	
	
	
	
	<script src="js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/jquery.form.js"></script> 
	<script src="js/mstepper.min.js"></script> 
	<script src="js/app.js?3"></script>
</body>
</html>

