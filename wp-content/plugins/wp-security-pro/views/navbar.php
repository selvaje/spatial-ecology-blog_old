<?php

	if($shw_feedback)
		do_action('wpns_show_message',MoWpnsMessages::showMessage('FEEDBACK'),'CUSTOM_MESSAGE');
	if(!$safe)
		do_action('wpns_show_message',MoWpnsMessages::showMessage('WHITELIST_SELF'),'CUSTOM_MESSAGE');

	echo'<div class="wrap">
				<div><img  style="float:left;margin-top:5px;" src="'.$logo_url.'"></div>
				<h1>
					WP Security Pro &nbsp;
					<a class="add-new-h2" href="'.$profile_url.'">Account</a>
					<a class="add-new-h2" href="'.$help_url.'">Troubleshooting</a>
					<a class="license-button add-new-h2" href="'.$license_url.'">Upgrade</a>
				</h1>			
		</div>';
		//check_is_curl_installed();

	echo'<div id="tab">
			<h2 class="nav-tab-wrapper mo_wpns_nav-tab-wrapper">';

			
		echo '	<a class="nav-tab '.($active_tab == 'mo_wpns_dashboard' 	  ? 'nav-tab-active' : '').'" href="'.$dashboard_url	.'">Dashboard</a>
		 		<a class="nav-tab '.($active_tab == 'mo_wpns_waf' 			  ? 'nav-tab-active' : '').'" href="'.$waf				.'">Firewall</a>
		 		<a class="nav-tab '.($active_tab == 'mo_wpns_login_and_spam'  ? 'nav-tab-active' : '').'" href="'.$login_and_spam	.'">Login and Spam</a>
				<a class="nav-tab '.($active_tab == 'mo_wpns_backup' 	  	  ? 'nav-tab-active' : '').'" href="'.$backup			.'">Encrypted Backup</a>
				<a class="nav-tab '.($active_tab == 'mo_wpns_malwarescan'	  ?	'nav-tab-active' : '').'" href="'.$scan_url 		.'">Malware Scan</a>
				<a class="nav-tab '.($active_tab == 'mo_wpns_advancedblocking'? 'nav-tab-active' : '').'" href="'.$advance_block	.'">Advanced Blocking</a>
				<a class="nav-tab '.($active_tab == 'mo_wpns_notifications'	  ? 'nav-tab-active' : '').'" href="'.$notif_url		.'">Notifications</a>
				<a class="nav-tab '.($active_tab == 'mo_wpns_reports'	  	  ?	'nav-tab-active' : '').'" href="'.$reports_url		.'">Reports</a> 
				<a class="nav-tab '.($active_tab == 'mo_wpns_upgrade'	  	  ?	'nav-tab-active' : '').'" href="'.$upgrade_url		.'">Upgrade</a>
			</h2>
		</div>';