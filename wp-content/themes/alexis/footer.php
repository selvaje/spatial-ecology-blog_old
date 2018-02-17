<?php
/**
 * The template for displaying the footer
 *
 * @package Alexis
 * @since 1.0
 */
?>
	</div>
	<!--end: CONTAINER -->	
	<!--start:FOOTER -->
	<footer id="footer" class="row" role="contentinfo">
		<div class="col-6">		
			<?php printf( __( 'Powered by %1$s %2$s', 'alexis' ), '<a href="http://wordpress.org/">WordPress</a>', '/' ); ?>
			<?php printf( __( 'Theme by <a href="%s">WPQA</a>', 'alexis'), 'https://wpqa.net' ); ?> 			
		</div>
  		<div class="col-6 text-right">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a> 
			<?php _e('&copy;', 'alexis'); ?> 
			<?php echo date('Y'); ?>
  		</div>
	</footer>
	<!--end: FOOTER -->
	<?php wp_footer(); ?>
</body>
</html>


