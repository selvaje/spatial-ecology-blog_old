<?php 
/**
 * The template for displaying single posts
 *
 * @package Alexis
 * @since 2.0
 */
get_header(); ?>
		<div class="row" role="main">
			<div class="col-8">
				<?php /* start loop */ ?>			
				<?php while (have_posts()) : the_post(); ?>
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<h1 class="single-entry-title"><?php the_title(); ?></h1>
					<p class="entry-meta"><?php _e('Posted ','alexis'); ?><?php echo get_the_date(); ?><?php _e(' by ','alexis'); ?><?php the_author_posts_link(); ?><?php _e(' in ','alexis'); ?><?php the_category(', '); ?></p>
					<hr />

					<?php if ( has_post_thumbnail() ): ?>
					<?php $caption = get_post(get_post_thumbnail_id())->post_excerpt;?>
					<?php if($caption): ?>
						<div class="wp-caption">
							<?php the_post_thumbnail();?>
								<div class="wp-caption-text">
									<?php echo $caption ?>										
								</div>
						</div>
					<?php else: ?>
						<?php the_post_thumbnail();?>
					<?php endif; ?>
					<?php endif; ?>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>

					<div class="pagelink"><?php wp_link_pages(); ?></div>
					<p class="entry-tags"><?php the_tags('Tags:', '' ,'' ); ?></p>
					<hr />
					<div class="pagelink">
                    <?php previous_post_link( '<span class="nav-left">%link</span>', '<i class="fa fa-chevron-left"></i> %title' ); ?>
                    <?php next_post_link( '<span class="nav-right">%link</span>', '%title <i class="fa fa-chevron-right"></i>' ); ?>
                    </div>
				</article>
				<div class="author-bio">
					<?php echo get_avatar( get_the_author_meta('user_email'), 95 ); ?>
					<h4><?php the_author_posts_link(); ?></h4>
					<p><?php the_author_meta('description'); ?></p>
				</div>
				<?php comments_template(); ?>
				<?php endwhile; /* end the loop */ ?>
			</div>	
			<?php get_sidebar(); ?>
		</div> <!-- row -->				
<?php get_footer(); ?>