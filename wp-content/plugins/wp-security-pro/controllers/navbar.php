<?php
	
	global $mo_MoWpnsUtility,$mo_dirName;


	$profile_url	= add_query_arg( array('page' => 'mo_wpns_account'		), $_SERVER['REQUEST_URI'] );
	$login_security	= add_query_arg( array('page' => 'default'			), $_SERVER['REQUEST_URI'] );
	$waf			= add_query_arg( array('page' => 'mo_wpns_waf'				), $_SERVER['REQUEST_URI'] );
	$login_and_spam = add_query_arg( array('page' => 'mo_wpns_login_and_spam'   ), $_SERVER['REQUEST_URI'] );
	$register_url	= add_query_arg( array('page' => 'registration'		), $_SERVER['REQUEST_URI'] );
	$blocked_ips	= add_query_arg( array('page' => 'blockedips'		), $_SERVER['REQUEST_URI'] );
	$advance_block	= add_query_arg( array('page' => 'mo_wpns_advancedblocking'	), $_SERVER['REQUEST_URI'] );
	$notif_url		= add_query_arg( array('page' => 'mo_wpns_notifications'	), $_SERVER['REQUEST_URI'] );
	$reports_url	= add_query_arg( array('page' => 'mo_wpns_reports'			), $_SERVER['REQUEST_URI'] );
	$license_url	= add_query_arg( array('page' => 'mo_wpns_upgrade'  		), $_SERVER['REQUEST_URI'] );
	$help_url		= add_query_arg( array('page' => 'mo_wpns_troubleshooting'	), $_SERVER['REQUEST_URI'] );
	$content_protect= add_query_arg( array('page' => 'content_protect'	), $_SERVER['REQUEST_URI'] );
	$backup			= add_query_arg( array('page' => 'mo_wpns_backup'			), $_SERVER['REQUEST_URI'] );
	$scan_url       = add_query_arg( array('page' => 'mo_wpns_malwarescan'      ), $_SERVER['REQUEST_URI'] );
	//Added for new design
    $dashboard_url	= add_query_arg(array('page' => 'mo_wpns_dashboard'			), $_SERVER['REQUEST_URI']);
    $upgrade_url	= add_query_arg(array('page' => 'mo_wpns_upgrade'				), $_SERVER['REQUEST_URI']);
   //dynamic
    $logo_url = plugin_dir_url(dirname(__FILE__)) . 'includes/images/miniorange_logo.png';
   // $logo_url		= plugin_dir_url($mo_dirName) . 'wp-security-pro/includes/images/miniorange_logo.png';
    $shw_feedback	= get_option('donot_show_feedback_message') ? false: true;
    $moPluginHandler= new mo_MoWpnsHandler();
    $safe			= $moPluginHandler->is_whitelisted($mo_MoWpnsUtility->get_client_ip());

    $active_tab 	= $_GET['page'];

	include $mo_dirName . 'views'.DIRECTORY_SEPARATOR.'navbar.php';