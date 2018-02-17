<?php
/**
 * The header template
 *
 * @package alexis
 * @since 1.0
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<link rel="pingback" href="<?php echo esc_attr( get_bloginfo( 'pingback_url' ) ); ?>">
  	<!--[if lt IE 9]>
  	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!--start:NAVIGATION -->
	<header class="header">
		<div class="logo">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a></h1>
		</div>
		<a class="hamburger" href="#menu"><i class="fa fa-bars"></i></a>
		<nav class="menu" role="navigation">
			<?php alexis_nav(); ?>
		</nav>
	</header>
	<!--end: NAVIGATION -->		
	<!--start:CONTAINER -->
	<div class="container">