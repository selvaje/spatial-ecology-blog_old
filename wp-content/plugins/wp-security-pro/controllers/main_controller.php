<?php

	global $moWpnsUtility,$dirName;

	$controller = $dirName . 'controllers/';

	include $controller 	 . 'navbar.php';

	if( isset( $_GET[ 'page' ])) 
	{
		switch($_GET['page'])
		{
			case 'mo_wpns_dashboard':
                include $controller . 'dashboard.php';			    break;
            case 'mo_wpns_login_and_spam':
				include $controller . 'login-spam.php';				break;
			case 'default':
				include $controller . 'login-security.php';			break;
			case 'mo_wpns_account':
				include $controller . 'account.php';				break;		
			case 'mo_wpns_backup':
				include $controller . 'backup.php'; 				break;
			case 'mo_wpns_upgrade':
				include $controller . 'upgrade.php';                break;
			case 'mo_wpns_waf':
				include $controller . 'waf.php';		    		break;
			case 'blockedips':
				include $controller . 'ip-blocking.php';			break;
			case 'mo_wpns_advancedblocking':
				include $controller . 'advanced-blocking.php';		break;
			case 'mo_wpns_notifications':
				include $controller . 'notification-settings.php';	break;
			case 'mo_wpns_reports':
				include $controller . 'reports.php';				break;
			case 'licencing':
				include $controller . 'licensing.php';				break;
			case 'mo_wpns_troubleshooting':
				include $controller . 'troubleshooting.php';		break;
			case 'mo_wpns_malwarescan':
				include $controller . 'scan_malware.php';			break;
		}
	}

	include $controller . 'support.php';