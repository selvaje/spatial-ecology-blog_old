<?php
	
	global $mo_MoWpnsUtility,$mo_dirName;

	$username = $user->data->user_login;
	$message  = isset($newpassword) && ($newpassword != $confirmpassword) ? "Both Passwords do not match." : "Please enter a stronger password.";
	$css_file = plugins_url('wp-security-pro/includes/css/style_settings.css',$mo_dirName);
	$js_file  = plugins_url('wp-security-pro/includes/js/settings_page.js',$mo_dirName);
	$js_url	  = 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js';	

	include $mo_dirName . 'views'.DIRECTORY_SEPARATOR.'change-password.php';
	exit;

