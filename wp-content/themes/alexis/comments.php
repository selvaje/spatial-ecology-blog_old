<?php
// Do not delete these lines
  if ( post_password_required() ) { ?>
    <div class="help">
        <p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'alexis' ); ?></p>
    </div>
  <?php
    return;
  }
?>
<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
<div id="comments">
    <h3><?php printf( _nx( 'One response on &ldquo;%2$s&rdquo;', '%1$s responses on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'alexis' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></h3>    

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through? ?>
    	<nav id="comment-nav">
        	<ul class="clearfix">
            	<li><?php previous_comments_link() ?></li>
            	<li><?php next_comments_link() ?></li>
        	</ul>
    	</nav>
	<?php endif; ?>
		
    <ol class="commentlist">
    	<?php wp_list_comments( 
    		array(
    			'avatar_size' => '64',
    			'max_depth'   => '2', 
			) 			
		); ?>
    </ol>
    <nav id="comment-nav">
        <ul class="clearfix">
            <li><?php previous_comments_link() ?></li>
            <li><?php next_comments_link() ?></li>
        </ul>
    </nav>
</div>
<?php else : // this is displayed if there are no comments so far ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
	<?php comment_form(); ?>
<?php elseif (is_single() ) : // comments are closed ?>
    <h4><?php _e( 'Sorry, comments are closed!', 'alexis' ); ?></h4>    
<?php endif; // if you delete this the sky will fall on your head ?>