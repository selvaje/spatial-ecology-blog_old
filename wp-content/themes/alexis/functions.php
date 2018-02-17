<?php
/*-----------------------------------[ WordPress theme customizer ] */

include_once( get_template_directory() . '/customizer.php' );

/*-----------------------------------------------------------------------[ theme setup function ] */

// if ! alexis_setup
if ( ! function_exists( 'alexis_setup' ) ) :

	// alexis_setup
	function alexis_setup() {

		/*-----------------------------------[ HTML title tag filter ] */

		// display a meaningful title depending on the page being rendered
		function alexis_title_filter( $title, $sep ) {
			global $paged, $page;
	
			if ( is_feed() )
				return $title;

			$title .= get_bloginfo( 'name' );
			$bloginfo_description = get_bloginfo( 'description' );
	
			if ( $bloginfo_description && ( is_home() || is_front_page() ) )
				$title = "$title $sep $bloginfo_description";

			// add a page number if necessary.
			if ( $paged >= 2 || $page >= 2 )
				$title = "$title $sep " . sprintf( __( 'Page %s', 'alexis' ), max( $paged, $page ) );

			return $title;
		}

		add_filter( 'wp_title', 'alexis_title_filter', 10, 2 );


		/*-----------------------------------[ register the custom nav menu(s) ] */

		register_nav_menus( array(
			'primary'   => __('Primary Navigation', 'alexis'),
		));


		/*-----------------------------------[ navigation menu ] */

		// display a navigation menu created in the Appearance → Menus panel
		function alexis_nav() {
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'menu',
				'echo'           => true,
				'before'         => '',
				'after'          => '',
				'link_before'    => '',
				'link_after'     => '',
				'depth'          => '3',
				'fallback_cb'    => 'false',
				'items_wrap'     => '<ul class="menu-list">%3$s</ul>',
				'walker'         => ''
			));

		}

		
		// remove class and ID from wp_nav_menu() for cleaner output
		function wp_nav_menu_attributes_filter($var) {
			return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
		}
		// add_filter('nav_menu_css_class', 'wp_nav_menu_attributes_filter', 100, 1);
		add_filter('nav_menu_item_id', 'wp_nav_menu_attributes_filter', 100, 1);
		

		/*-----------------------------------[ switch default core markup ] */
		
		// @link http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
		//
		// output valid HTML5 for search form, comment form, and comments/
		//
		add_theme_support( 'html5', array( 
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption'
		));

		/*-----------------------------------[ title tag support ] */

	 	// Let WordPress manage the document title
	 		
		add_theme_support( 'title-tag' );
	
		/*-----------------------------------[ post thumbnails ] */

		// enables post-thumbnail support
		add_theme_support( 'post-thumbnails');
	

		/*-----------------------------------[ content width ] */

		// set the content width based on the theme's design and stylesheet
		global $content_width;
		if ( ! isset( $content_width ) ) :
			$content_width = 730; /* pixels */
		endif;
		
		/*-----------------------------------[ rss feed ] */

		// enables post and comment RSS feed links to head
		add_theme_support( 'automatic-feed-links' );


		/*-----------------------------------[ custom background ] */

		$args = array(
			'default-color' => 'ffffff',
		);
		add_theme_support( 'custom-background', $args );
		
		/*-----------------------------------[ i18n / theme localization ] */
		
		// make theme translation ready
        load_theme_textdomain( 'alexis', get_template_directory().'/languages' );

		/*-----------------------------------[ external javascript and stylesheet assets ] */

		// @link http://codex.wordpress.org/Function_Reference/wp_enqueue_script
		// 
		// to hook stylesheet and script enqueue callbacks into `wp_enqueue_scripts` 
		function alexis_assets_loader() {

			// loads the main stylesheet
			wp_enqueue_style( 'alexis-style', get_stylesheet_uri(), array(), '2014-08-08');
			wp_enqueue_style( 'fontawesome', get_template_directory()."/css/font-awesome.css", array(),'4.2.0');
						
			// loads Google fonts via a function
			$query_args = array(
				'family' => 'Lato:300,400,700'
			);
			wp_enqueue_style( 'google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

			// required WordPress core feature
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );
		
			// loads JavaScript files	
  			wp_enqueue_script('main', get_template_directory()."/js/global.js", array('jquery'),'2014-08-08',true);
  			
		}
		add_action( 'wp_enqueue_scripts', 'alexis_assets_loader' );


		/*-----------------------------------[ widgets ] */

		// widget setup
		function alexis_widget() {
			// call register_sidebar wp method as array
			register_sidebar( array(
				'ID'            => 'alexis-sidebar',
				'name'          => __( 'Primary', 'alexis' ),
				'description'   => __( 'Widgets will be shown on the right-hand side.', 'alexis' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			));
		};

		add_action( 'widgets_init' , 'alexis_widget' );

		

}// end alexis_setup
endif;// end ! function_exists( 'alexis_setup' )


/*-----------------------------------------------------------------------[ after setup theme init ] */

//themename custom function setup
add_action( 'after_setup_theme', 'alexis_setup' );