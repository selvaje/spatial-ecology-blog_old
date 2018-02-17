<?php
/**
 * The template for displaying post archives
 *
 * @package Alexis
 * @since 1.0
 */
get_header(); ?>
		<div class="row" role="main">
			<div class="col-8">	
				<h2>
					<?php if (is_day()) : ?>
						<?php printf(__('%s', 'alexis'), get_the_date()); ?>
					<?php elseif (is_month()) : ?>
						<?php printf(__('%s', 'alexis'), get_the_date('F Y')); ?>
					<?php elseif (is_year()) : ?>
						<?php printf(__('%s', 'alexis'), get_the_date('Y')); ?>
					<?php else : ?>
						<?php single_cat_title(); ?>
					<?php endif; ?>
				</h2>
				<hr />
				<?php /* start loop */ ?>
				<?php while (have_posts()) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="entry-meta"><?php echo get_the_date(); ?><?php _e(' / by ','alexis'); ?><?php the_author_posts_link(); ?></p>
														
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
				<?php endwhile; // end the loop ?>				
				<div class="pagination">
					<div class="left"><?php next_posts_link(__('&larr; Older posts', 'alexis') ); ?></div>
					<div class="right"><?php previous_posts_link(__('Newer posts &rarr;', 'alexis') ); ?></div>
				</div>
			</div>		
			<?php get_sidebar(); ?>
		</div>		
<?php get_footer(); ?>