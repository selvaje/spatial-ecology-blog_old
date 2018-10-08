<?php
/**
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Alexis
 * @since Alexis 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Alexis 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 730;
}


if ( ! function_exists( 'alexis_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Alexis 1.0
 */

function alexis_setup() {

	/**
	 * Register the primary wp_nav_menu().
	 *
	 * @since Alexis 1.0
	 */
	register_nav_menus( array(
		'primary'   => __('Primary Navigation', 'alexis'),
	));

	/**
	 * Display a navigation menu created in the Appearance → Menus panel.
	 *
	 * @since Alexis 1.0
	 */
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

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 *
	 * @since Alexis 1.0
	 */
	add_theme_support( 'html5', array(
		'search-form', 
		'comment-form', 
		'comment-list', 
		'gallery', 
		'caption'
	) );

	/**
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 *
	 * @since Alexis 2.0
	 */	
	add_editor_style();

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 *
	 * @since Alexis 1.0
	 */	 		
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @since Alexis 1.0
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails');

	/**
	 * Enable post and comment RSS feed links to head.
	 *
	 * @since Alexis 1.0
	 */			
	add_theme_support( 'automatic-feed-links' );
	
	/**
	 * Make theme translation ready.
	 *
	 * @since Alexis 1.0
	 */
    load_theme_textdomain( 'alexis', get_template_directory_uri().'/languages' );


}
endif; // end ! function_exists( 'alexis_setup' )
add_action( 'after_setup_theme', 'alexis_setup' );


/**
 * Register widget area.
 *
 * @since Alexis 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function alexis_widget() {
	// call register_sidebar wp method as array
	register_sidebar( array(
		'id'            => 'alexis-sidebar',
		'name'          => __( 'Primary', 'alexis' ),
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'alexis' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
};
add_action( 'widgets_init' , 'alexis_widget' );

/**
 * Enqueue scripts and styles.
 *
 * @since Alexis 1.0
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 */
function alexis_scripts() {

	// loads the main stylesheet
	wp_enqueue_style( 'alexis-style', get_stylesheet_uri(), array(), '20180621');
	wp_enqueue_style( 'fontawesome', get_template_directory_uri()."/css/font-awesome.min.css", array(),'4.7.0');
				
	// loads Google fonts via a function
	$query_args = array(
		'family' => 'Lato:300,400,700'
	);
	wp_enqueue_style( 'google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

	// required WordPress core feature
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// loads JavaScript files	
	wp_enqueue_script('main', get_template_directory_uri()."/js/global.js", array('jquery'),'20180621',true);
  			
}
add_action( 'wp_enqueue_scripts', 'alexis_scripts' );

/**
 * Remove class and ID from wp_nav_menu() for cleaner output.
 *
 * @since Alexis 1.0
 */ 
function wp_nav_menu_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}
add_filter('nav_menu_item_id', 'wp_nav_menu_attributes_filter', 100, 1);

/**
 * Customizer additions.
 *
 * @since Alexis 1.0
 */
include_once( get_template_directory() . '/customizer.php' );