<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Alexis
 * @since 1.0
 */
get_header(); ?>
<div class="row" role="main">
	<div class="col-8">	
		<article>
			<h2><?php _e('Page Not Found', 'alexis'); ?></h2>
			<hr />
			<p><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'alexis'); ?></p>
			<p><?php _e('Please try any of following:', 'alexis'); ?></p>
			<ol> 
				<li><?php _e('Check your spelling', 'alexis'); ?></li>
				<li><?php printf(__('Return to the <a href="%s">home page</a>', 'alexis'), home_url()); ?></li>
				<li><?php _e('Click the <a href="javascript:history.back()">Back</a> button', 'alexis'); ?></li>
			</ol>
			<div class="hide-on-mobile">
				<h5><?php _e('Search Again?', 'alexis'); ?></h5>
				<?php get_search_form(); ?>
			</div>
		</article>
	</div>		
	<?php get_sidebar(); ?>	
</div> <!-- row -->	
<?php get_footer(); ?>