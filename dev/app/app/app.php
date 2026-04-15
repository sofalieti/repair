<?php

	$output = array('result' => 0, 'msg' => ''); 
	
	if(isset($_POST) && count($_POST) && isset($_POST['files'])){
		$folder = time();
		$file_links = array();
		
		foreach($_POST['files'] as $step_name => $files){
			foreach($files as $number => $file){
				upload_file($folder, $step_name.'_'.$number.'.jpg', $file);
				$file_links[$step_name][$number] = 'https://enlightensauna.com/dev/app/app/images/'.$folder.'/'.$step_name.'_'.$number.'.jpg';
			}
		}
		
		$msg = "
			<strong>Step 1</strong><br/>
			Width: {$_POST['width']}<br/>
			Depth: {$_POST['depth']}<br/>
			Height: {$_POST['height']}<br/>
			Unit: {$_POST['unit']}<br/>
			".array_to_images_html($file_links, 'step1')."<br/><br/>
			
			<strong>Step 2</strong><br/>
			How much control panels your have?: {$_POST['count_control_panels']}<br/>
			".array_to_images_html($file_links, 'step2')."<br/><br/>
			
			<strong>Step 3</strong><br/>
			How much heaters your have?: {$_POST['count_heaters']}<br/>
			Whath type of heaters your have?: {$_POST['heaters_type']}<br/>
			".array_to_images_html($file_links, 'step3')."<br/><br/>
			
			<strong>Step 4</strong><br/>
			Do you have inside Lights?: {$_POST['inside_lights']}<br/>
			Do you have outside Lights?: {$_POST['outside_lights']}<br/>
			".array_to_images_html($file_links, 'step4')."<br/><br/>
			
			<strong>Step 5</strong><br/>
			Do you have a stereo system?: {$_POST['stereo_system']}<br/>
			".array_to_images_html($file_links, 'step5')."<br/><br/>
			
			<strong>Step 6</strong><br/>
			Do you have chromotherapy lights?: {$_POST['chromotherapy_lights']}<br/>
			".array_to_images_html($file_links, 'step6')."<br/><br/>
			
			<strong>Step 7</strong><br/>
			Do you have Ionizer?: {$_POST['ionizer']}<br/>
			".array_to_images_html($file_links, 'step7')."<br/><br/>
			
			<strong>Step 8</strong><br/>
			Where is you powerbox located?: {$_POST['powerbox']}<br/>
			".array_to_images_html($file_links, 'step8')."<br/><br/>
			
			<strong>Finish</strong><br/>
			Name: {$_POST['name']}<br/>
			Phone: {$_POST['phone']}<br/>
			E-mail: {$_POST['email']}<br/>
		";
		
		$request_url = 'https://support.infraredsaunaparts.com/support/WebToCase';
		$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
		$zoho_data = array(
			'Description' => $msg,
			'Subject' => 'Calculator',
			'Site' => $_SERVER['HTTP_HOST'],
			'xnQsjsdp' => 'zk8hI9vIUANthYo*kRl79w$$',
			'xmIwtLD' => '-pUXjU4*qUKUoJGCHzjBfHHp987L9qYB',
			'actionType' => 'Q2FzZXM=',
			'returnURL' => $protocol.$_SERVER['HTTP_HOST']
		);	
		$zoho_data['First Name'] = '';
		$zoho_data['Contact Name'] = $_POST['name'];
		$zoho_data['Email'] = $_POST['email']; 
		$zoho_data['Phone'] = $_POST['phone'];
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($zoho_data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
		curl_setopt($ch, CURLOPT_URL, $request_url);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		$response_info = curl_getinfo($ch);
		curl_close($ch);
		
		$output['result'] = 1;
		
	}else{
		$output['msg'] = 'Request error';
	}
	
	die(json_encode($output));
	
	
	
	
	function upload_file($folder, $name, $file){
		if(!file_exists('images/'.$folder)){
			mkdir('images/'.$folder);
		}
		
		file_put_contents('images/'.$folder.'/'.$name, file_get_contents($file));
	}
	
	function array_to_images_html($array, $step){
		$html = '';
		foreach($array[$step] as $link){
			$html .= "<a href='{$link}' target='_blank'><img src='{$link}' width='100'/></a>";
		}
		return $html;
	}
?>