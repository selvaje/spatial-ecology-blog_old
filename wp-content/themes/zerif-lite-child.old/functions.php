<?php
function theme_enqueue_child_theme_styles() {
wp_enqueue_style( 'parent-theme-css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_child_theme_styles', 11 );


function ov3rfly_parent_enqueue_scripts() {
	// remove dependencies and parent
	wp_dequeue_style( 'zerif_style_mobile' );
	wp_dequeue_style( 'zerif_responsive_style' );
	wp_dequeue_style( 'zerif_style' );

	// enqueue parent with new id (and from parent folder)
	wp_enqueue_style( 'zerif_parent', get_template_directory_uri() . '/style.css', array('zerif_pixeden_style'), 'v1' );
	// enqueue parents dependencies with new ids
	wp_enqueue_style('zerif_parent_responsive_style', get_template_directory_uri() . '/css/responsive.css', array('zerif_parent'), 'v1');
	if ( wp_is_mobile() ){
		wp_enqueue_style( 'zerif_parent_style_mobile', get_template_directory_uri() . '/css/style-mobile.css', array('zerif_bootstrap_style', 'zerif_parent'), 'v1' );
	}
	// enqueue child
	wp_enqueue_style( 'zerif_child', get_stylesheet_directory_uri() . '/style.css', array( 'zerif_parent', 'zerif_parent_responsive_style' ), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'ov3rfly_parent_enqueue_scripts', 11 );


/*
-----------------------
Latest news section main page - How much text after image: change the return number. So if you didn't want to show any of the post at all, you can just put 0 to show the picture and the title.
----------------------*/
add_action( 'wp_enqueue_scripts', 'one_pirate_custom_script_fix' );

function custom_excerpt_length( $length ) {
return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



/*
-----------------------
Latest news section main page - addjust FEATURED IMAGE TO BE square: https://wordpress.org/support/topic/latest-posts-featured-image.
----------------------*/
add_image_size('post-thumbnail', 500, 500, true);