<?php

class mo_Logger
{
	function __construct()
	{
		add_action( 'log_403' , array( $this, 'log_403' ) );
		add_action( 'template_redirect', array( $this, 'log_404' ) );
	}	


	function log_403()
	{
		global $mo_MoWpnsUtility;
			$mo_wpns_config = new mo_MoWpnsHandler();
			$userIp 		= $mo_MoWpnsUtility->get_client_ip();
			$url			= $mo_MoWpnsUtility->get_current_url();
			$user  			= wp_get_current_user();
			$username		= is_user_logged_in() ? $user->user_login : 'GUEST';
			$mo_wpns_config->add_transactions($userIp,$username,mo_MoWpnsConstants::ERR_403, mo_MoWpnsConstants::ACCESS_DENIED,$url);
	}

	function log_404()
	{
		global $mo_MoWpnsUtility;

		if(!is_404())
			return;
			$mo_wpns_config = new mo_MoWpnsHandler();
			$userIp 		= $mo_MoWpnsUtility->get_client_ip();
			$url			= $mo_MoWpnsUtility->get_current_url();
			$user  			= wp_get_current_user();
			$username		= is_user_logged_in() ? $user->user_login : 'GUEST';
			$mo_wpns_config->add_transactions($userIp,$username,mo_MoWpnsConstants::ERR_404, mo_MoWpnsConstants::ACCESS_DENIED,$url);
	}
}
new mo_Logger;