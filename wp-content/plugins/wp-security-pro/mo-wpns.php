<?php
    /*
	 	Plugin Name: WP Security Pro
	    Plugin URI: http://miniorange.com
	    Description: Security against Login, Registrations, brute force attacks by tracking IP and Blacklisting IP's.
	    Author: miniorange
	    Version: 4.0.8
	    Author URI: http://miniorange.com
    */
	
	class WPSecurityPro{

		function __construct()
		{
			register_deactivation_hook(__FILE__		 , array( $this, 'mo_wpns_deactivate'		       )		);
			register_activation_hook  (__FILE__		 , array( $this, 'mo_wpns_activate'			       )		);
			add_action( 'admin_menu'				 , array( $this, 'mo_wpns_widget_menu'		  	   )		);
			add_action( 'admin_enqueue_scripts'		 , array( $this, 'mo_wpns_settings_style'	       )		);
			add_action( 'admin_enqueue_scripts'		 , array( $this, 'mo_wpns_settings_script'	       )	    );
			add_action( 'wpns_show_message'		 	 , array( $this, 'mo_show_message' 				   ), 1 , 2 );
			add_action( 'wp_footer'					 , array( $this, 'footer_link'					   ),100	);
            add_action( 'admin_footer', array( $this, 'feedback_request' ) );
			if(get_option('disable_file_editing')) 	 define('DISALLOW_FILE_EDIT', true);
			$this->includes();
		}
        // As on plugins.php page not in the plugin
        function feedback_request() {
            if ( 'plugins.php' != basename( $_SERVER['PHP_SELF'] ) ) {
                return;
            }
            global $dirName;

             $email = get_option("mo_wpns_admin_email");
            if(empty($email)){
                $user = wp_get_current_user();
                $email = $user->user_email;
            }
            $imagepath=plugins_url( '/includes/images/', __FILE__ );

            wp_enqueue_style( 'wp-pointer' );
            wp_enqueue_script( 'wp-pointer' );
            wp_enqueue_script( 'utils' );
            wp_enqueue_style( 'mo_wpns_admin_plugins_page_style', plugins_url( '/includes/css/style_settings.css?ver=4.8.60', __FILE__ ) );

            include $dirName . 'views'.DIRECTORY_SEPARATOR.'feedback_form.php';;

        }



		function mo_wpns_widget_menu()
		{
			$menu_slug = 'mo_wpns_dashboard';
			add_menu_page (	'WP Security Pro' , 'WP Security Pro' , 'activate_plugins', $menu_slug , array( $this, 'mo_wpns'), plugin_dir_url(__FILE__) . 'includes/images/miniorange_icon.png' );

			add_submenu_page( $menu_slug	,'WP Security Pro'	,'Dashboard'		    ,'administrator',$menu_slug					, array( $this, 'mo_wpns'));
			add_submenu_page( $menu_slug	,'WP Security Pro'	,'Firewall'		   		,'administrator','mo_wpns_waf'				, array( $this, 'mo_wpns'));
			add_submenu_page( $menu_slug	,'WP Security Pro'	,'Login and Spam'		,'administrator','mo_wpns_login_and_spam'	, array( $this, 'mo_wpns'));
            add_submenu_page( $menu_slug	,'WP Security Pro'	,'Backup'				,'administrator','mo_wpns_backup'			, array( $this, 'mo_wpns'));
            add_submenu_page( $menu_slug	,'WP Security Pro'	,'Malware Scan'			,'administrator','mo_wpns_malwarescan'  	, array( $this, 'mo_wpns'));
            add_submenu_page( $menu_slug	,'WP Security Pro'	,'Advanced Blocking'	,'administrator','mo_wpns_advancedblocking'	, array( $this, 'mo_wpns'));
            add_submenu_page( $menu_slug	,'WP Security Pro'	,'Notifications'		,'administrator','mo_wpns_notifications'	, array( $this, 'mo_wpns'));
            add_submenu_page( $menu_slug	,'WP Security Pro'	,'Reports'				,'administrator','mo_wpns_reports'			, array( $this, 'mo_wpns'));
            add_submenu_page( $menu_slug	,'WP Security Pro'	,'Troubleshooting'		,'administrator','mo_wpns_troubleshooting'	, array( $this, 'mo_wpns'));
            add_submenu_page( $menu_slug	,'WP Security Pro'	,'Account'				,'administrator','mo_wpns_account'			, array( $this, 'mo_wpns'));
            add_submenu_page( $menu_slug	,'WP Security Pro'	,'Upgrade'				,'administrator','mo_wpns_upgrade'			, array( $this, 'mo_wpns'));
        }

		function mo_wpns()
		{
			global $wpnsDbQueries;
			$wpnsDbQueries->mo_plugin_activate();
			
			add_option( 'mo_wpns_enable_brute_force' , true);
			add_option( 'mo_wpns_show_remaining_attempts' , true);
			add_option( 'mo_wpns_enable_ip_blocked_email_to_admin', true);
			add_option('SQLInjection', 1);
			add_option('WAFEnabled' ,0);
			add_option('XSSAttack' ,1);
			add_option('RFIAttack' ,0);
			add_option('LFIAttack' ,0);
			add_option('RCEAttack' ,0);
			add_option('actionRateL',0);
			add_option('Rate_limiting',0);
			add_option('Rate_request',240);
			add_option('limitAttack',10);
			add_option( 'mo_wpns_check_vulnerable_code', 1);
			add_option( 'mo_wpns_check_sql_injection', 1);
			add_option( 'mo_wpns_scan_plugins', true);
			add_option( 'mo_wpns_scan_themes', true);
			include 'controllers/main_controller.php';
		}

		function mo_wpns_activate() 
		{
			global $wpnsDbQueries;
			$wpnsDbQueries->mo_plugin_activate();
		}

		function mo_wpns_deactivate() 
		{
			global $moWpnsUtility;
			if( !$moWpnsUtility->check_empty_or_null( get_option('mo_wpns_registration_status') ) ) {
				delete_option('mo_wpns_admin_email');
			}

			delete_option('mo_wpns_admin_customer_key');
			delete_option('mo_wpns_admin_api_key');
			delete_option('mo_wpns_customer_token');
			delete_option('mo_wpns_transactionId');
			delete_option('mo_wpns_registration_status');
		}

		function mo_wpns_settings_style($hook)
		{
			if(strpos($hook, 'page_mo_wpns')){
				wp_enqueue_style( 'mo_wpns_admin_settings_style'			, plugins_url('includes/css/style_settings.css', __FILE__));
				wp_enqueue_style( 'mo_wpns_admin_settings_phone_style'		, plugins_url('includes/css/phone.css', __FILE__));
				wp_enqueue_style( 'mo_wpns_admin_settings_datatable_style'	, plugins_url('includes/css/jquery.dataTables.min.css', __FILE__));
				wp_enqueue_style( 'mo_wpns_button_settings_style'			, plugins_url('includes/css/button_styles.css',__FILE__));
			}

		}

		function mo_wpns_settings_script($hook)
		{
			if(strpos($hook, 'page_mo_wpns')){
				wp_enqueue_script( 'mo_wpns_admin_settings_phone_script'	, plugins_url('includes/js/phone.js', __FILE__ ));
				wp_enqueue_script( 'mo_wpns_admin_settings_script'			, plugins_url('includes/js/settings_page.js', __FILE__ ), array('jquery'));
				wp_enqueue_script( 'mo_wpns_admin_datatable_script'			, plugins_url('includes/js/jquery.dataTables.min.js', __FILE__ ), array('jquery'));
			}
		}
		function mo_show_message($content,$type) 
		{
			if($type=="CUSTOM_MESSAGE")
				echo $content;
			if($type=="NOTICE")
				echo '	<div class="is-dismissible notice notice-warning"> <p>'.$content.'</p> </div>';
			if($type=="ERROR")
				echo '	<div class="notice notice-error is-dismissible"> <p>'.$content.'</p> </div>';
			if($type=="SUCCESS")
				echo '	<div class="notice notice-success is-dismissible"> <p>'.$content.'</p> </div>';
		}

		function footer_link()
		{
			echo MoWpnsConstants::FOOTER_LINK;
		}

		function includes()
		{
			require('helper/pluginUtility.php');
			require('database/database_functions.php');
			require('helper/utility.php');
			require('handler/ajax.php');
			require('handler/backup.php');
			require('handler/feedback_form.php');
			require('handler/recaptcha.php');
			require('handler/login.php');
			require('handler/registration.php');
			require('handler/logger.php');
			require('handler/spam.php');
			require('helper/curl.php');
			require('helper/plugins.php');
			require('helper/constants.php');
			require('helper/messages.php');
			require('views/common-elements.php');
			 
			require('controllers/wpns-loginsecurity-ajax.php');
			require('controllers/malware_scan_ajax.php');
			require('controllers/backup_ajax.php');
		}

	}

	new WPSecurityPro;
?>