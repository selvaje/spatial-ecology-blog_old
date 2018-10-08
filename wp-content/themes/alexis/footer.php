<?php
/**
 * The template for displaying the footer
 *
 * @package Alexis
 * @since 2.0
 */
?>
	</div>
	<!--end: CONTAINER -->
	<!--start:FOOTER -->
	<footer id="footer" role="contentinfo">
		<div class="wrapper">
			<div class="footer-left">		
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a> 
				<?php _e('&copy;', 'alexis'); ?> 
				<?php echo date('Y'); ?>
				<?php printf( __( 'Theme by <a href="%s">Yan Susanto</a>', 'alexis'), 'https://www.yansusanto.com' ); ?> 	
			</div>
			<div class="footer-right">
				<a href="#" class="top"><i class="fa fa-chevron-up fa-2x"></i></a>
			</div>
		</div>
	</footer>
	<!--end: FOOTER -->
	<?php wp_footer(); ?>
</body>
</html>


