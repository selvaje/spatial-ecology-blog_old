<?php
/**
 * The template for displaying Search Result(s) page(s)
 *
 * @package Alexis
 * @since 1.0
 */
get_header(); ?>
		<div class="row" role="main">
			<div class="col-8">
				<h2><?php _e('Search Results for', 'alexis'); ?> "<?php echo get_search_query(); ?>"</h2>
				<hr />
				<?php /* start loop */ ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="entry-meta"><?php echo get_the_date(); ?><?php _e(' / by ','alexis'); ?><?php the_author_posts_link(); ?><?php _e(' / in ','alexis'); ?><?php the_category(', '); ?></p>
							<?php /* display thumbnail when applicable */ if ( has_post_thumbnail() ): ?>
								<figure>
									<a href="<?php the_permalink(); ?>"><?php /* This post is not sticky show thumbnail */ the_post_thumbnail('thumbnail', array( 'class' => 'alignleft', 'alt' => the_title_attribute( 'echo=0' ), 'title' => the_title_attribute( 'echo=0' ) )); ?></a>
								</figure>
							<?php endif; ?>
		
							<div class="entry-excerpt">
								<?php the_excerpt(); ?>
							</div>						
						</article>
						<hr />
				<?php endwhile; ?>
				<div class="pagination">
					<div class="left"><?php next_posts_link(__('&larr; Older posts', 'alexis') ); ?></div>
					<div class="right"><?php previous_posts_link(__('Newer posts &rarr;', 'alexis') ); ?></div>
				</div>				
				<?php else : ?>
						<article>
							<h3><?php _e( 'No Search Result Found', 'alexis' ); ?></h3>
							<hr />
							<p><?php _e('Sorry, but nothing matched your search criteria. But don&#8217t worry; simply pick an option from the list below,', 'alexis'); ?>
							<ol>
								<li><?php _e('Try again with some different terms.', 'alexis'); ?></li>
								<li><?php _e('Hit the &#8220back&#8221 button on your browser. It&#8217s perfect for situations like this!', 'alexis'); ?></li>

								<li><?php _e('Head on over to the', 'alexis'); ?> <a href="<?php echo esc_url( home_url( '/' ) ) ?>"><?php _e('home page.', 'alexis'); ?></a></li>
							</ol>
							</p>
						</article>	
    			<?php endif; ?>
			</div>		
			<?php get_sidebar(); ?>
		</div>		
<?php get_footer(); ?>