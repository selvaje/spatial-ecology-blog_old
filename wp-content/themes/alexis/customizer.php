<?php
/**
 * Customizing the theme customizer screen.
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 *
 * @package Alexis
 * @since 1.0
 */
class alexis_theme_customizer {
   /**
    * This hooks into 'customize_register' (available as of WP 3.4) and allows
    * you to add new sections and controls to the Theme Customize screen.
    * 
    */
   public static function register ( $wp_customize ) {
   	
   	  		// change label name from Colors ==> Theme Option
	  		$wp_customize->get_section('colors')->title = __( 'Theme Option', 'alexis' );
	  		$wp_customize->get_section('colors')->description = __( 'All changes will only be visible after you save & publish it.', 'alexis' );	
	  		  
			// add new section to the Theme Customizer
			$wp_customize->add_setting(
				'theme_color',
					array(
						'default'    => '#5fccb2',
						'sanitize_callback' => 'sanitize_hex_color',
						'transport'  => 'postMessage',
					)
			);

			// activate the color picker that is part of WordPress 3.4 and upwards	
			$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
				'theme_color',
					array(
			    		'label'      => __( 'Theme Color', 'alexis' ),
			    		'section'    => 'colors',
			    		'settings'   => 'theme_color',
					)
				)
			);     
            
			// add another new section
			$wp_customize->add_setting(
				'menu_text_color',
					array(
						'default'    => '#fff',
						'sanitize_callback' => 'sanitize_hex_color',
						'transport'  => 'postMessage',
					)
			);
	
			$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
				'menu_text_color',
					array(
			    		'label'      => __( 'Menu Text Color', 'alexis' ),
			    		'section'    => 'colors',
			    		'settings'   => 'menu_text_color',
					)
				)
			);

   }

   /**
    * This will output the custom WordPress settings to the live theme's WP head.
    * 
    */
   public static function header_output() {
      ?>
	<!--custom CSS--> 
	<style type="text/css">	    	    	  
		.header, 
		.menu .menu-item  a,
		.menu .menu-item a:hover,
		.sub-item .menu-item a,  
		.sub-item .menu-item a:hover, 
		.menu-click:hover, 
		.label.right,
		input[type="submit"] { 
			background-color: <?php echo get_theme_mod( 'theme_color', '#5fccb2' ); ?>; 
		}

		.header a { 
			color: <?php echo get_theme_mod( 'menu_text_color', '#fff' ); ?>; 
		}
		
		a,
		a:hover,
		.widget_categories li, 
		.widget_archive li { 
			color: <?php echo get_theme_mod( 'theme_color', '#5fccb2' ); ?>; 
		}

		.pagination a, 
		.entry-tags a, 
		input[type="submit"]:hover { 
			color: <?php echo get_theme_mod( 'theme_color', '#5fccb2' ); ?>!important; 
		}

		.pagination a, 
		.pagination a:hover,  
		.entry-tags a, 
		.comment-reply-link,  
		a:hover[class^='tag-link-'],
		input[type="submit"], 
		input[type="submit"]:hover { 
			border:1px solid <?php echo get_theme_mod( 'theme_color', '#5fccb2' ); ?>; 
		}

		.pagination a:hover, 
		.entry-tags a:hover, 
		.comment-reply-link:hover { 
			background-color: <?php echo get_theme_mod( 'theme_color', '#5fccb2' ); ?>!important; 
			color: #fff!important;   
		}

		blockquote { 
			border-left: 2px solid <?php echo get_theme_mod( 'theme_color', '#5fccb2' ); ?>; 
		}

		input[type="submit"]:hover { 
			background: transparent!important; 
		}

		.menu-click:hover { 
			border-top:1px solid rgba(255,255,255,0.2); 
		}	
		
		::selection {
    		background-color:<?php echo get_theme_mod( 'theme_color', '#5fccb2' ); ?>;

		}
		::-moz-selection {
    		background-color:<?php echo get_theme_mod( 'theme_color', '#5fccb2' ); ?>;
		}
	</style>
	<!--/custom CSS-->
      <?php
   }
   
   /**
    * This outputs the javascript needed to automate the live preview.
    */
   public static function live_preview() {
			wp_enqueue_script(
			'alexis-theme-customizer',
				get_template_directory_uri() . '/js/theme-customizer.js',
				array( 'jquery', 'customize-preview' ),
				'',
				true
			);
   }

}

// setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'alexis_theme_customizer' , 'register' ) );

// output custom CSS to live site
add_action( 'wp_head' , array( 'alexis_theme_customizer' , 'header_output' ) );

// enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'alexis_theme_customizer' , 'live_preview' ) );