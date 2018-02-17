<?php 
/**
 * The main template file
 *
 * @package Alexis
 * @since 1.0
 */
get_header(); ?>
		<div class="row" role="main">
			<div class="col-8">
				<?php /* if there are no posts to display */ ?>
				<?php if (!have_posts()) : ?>
					<article>
						<h3><?php _e( 'Sorry, nothing to display.', 'alexis' ); ?></h3>
					</article>
				<?php endif; ?>  								
				<?php /* start loop */ ?>
				<?php while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
						<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php if( is_sticky() ): ?><span class="label right">FEATURED</span> <?php endif; ?>
						<p class="entry-meta"><?php echo get_the_date(); ?><?php _e(' / by ','alexis'); ?><?php the_author_posts_link(); ?><?php _e(' / in ','alexis'); ?><?php the_category(', '); ?></p>						
						<?php if( has_post_thumbnail() ): ?>
  							<figure> 
  								<?php if( is_sticky() ): ?> 
  									<?php /* This post is sticky show [featured] image */ the_post_thumbnail('featured', array( 'class' => 'alignleft', 'alt' => the_title_attribute( 'echo=0' ), 'title' => the_title_attribute( 'echo=0' ) )); ?>
  								<?php else: ?>   								
   									<a href="<?php the_permalink(); ?>"><?php /* This post is not sticky show thumbnail */ the_post_thumbnail('thumbnail', array( 'class' => 'alignleft', 'alt' => the_title_attribute( 'echo=0' ), 'title' => the_title_attribute( 'echo=0' ) )); ?></a>
  								<?php endif; ?>
  							</figure>
						<?php endif; ?>						
						<div class="entry-excerpt">
							<?php the_excerpt(); ?>
						</div>						
						<hr />
					</article>
				<?php endwhile; // end the loop ?>
				<div class="pagination">
					<div class="left"><?php next_posts_link(__('&larr; Older posts', 'alexis') ); ?></div>
					<div class="right"><?php previous_posts_link(__('Newer posts &rarr;', 'alexis') ); ?></div>
				</div>				
			</div>		
			<?php get_sidebar(); ?>
		</div> <!-- row -->
<?php get_footer(); ?>


