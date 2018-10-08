<?php
/**
 * The header template
 *
 * @package alexis
 * @since 2.0
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
	<link rel="pingback" href="<?php echo esc_attr( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!--start:NAVIGATION -->
	<header class="header">
		<div class="logo">
			<i class="fa fa-buysellads fa-2x"></i>			
			<h1><a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a></h1>
		</div>
		<a class="hamburger" href="#menu"><i class="fa fa-bars"></i></a>
		<nav class="menu" role="navigation">
			<?php alexis_nav(); ?>
		</nav>
	</header>
	<!--end: NAVIGATION -->		
	<?php if( is_home()) : ?>
		<section class="hero">
			<h2 class="fadeInDown"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></h2>
		</section>
	<?php endif; ?>
	<!--start:CONTAINER -->
	<div class="container">