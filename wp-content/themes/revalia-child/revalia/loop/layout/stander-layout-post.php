<?php $protocol = is_ssl() ? 'https' : 'http';?>
<!-- Start post layout stander -->
<div class="post-layout-stander">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('content-block'); ?>>
		<div class="post-header">
			<div class="post-header-categories">
				<?php the_time('F jS, Y'); ?> / <?php the_category(' ',' ') ?>
			</div>
			<div class="post-title">
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
			</div>
			<div class="post-social">
				<div class="social-shear">
					<a href="<?php echo esc_attr ($protocol) ?>://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
					onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
					<i class="fa fa-facebook"></i>
					</a>
					<a href="<?php echo esc_attr ($protocol) ?>://twitter.com/home?status=Check%20out%20this%20article:%20<?php echo rawurlencode(the_title('', '', false)); ?>%20-%20<?php the_permalink(); ?>"
					onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
					<i class="fa fa-twitter"></i>
					</a>
					<?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
					<a data-pin-do="skipLink" href="<?php echo esc_attr ($protocol) ?>://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo esc_url($pin_image); ?>&amp;description=<?php echo rawurlencode(the_title('', '', false)); ?>"
					onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
					<i class="fa fa-pinterest"></i>
					</a>
					<a href="<?php echo esc_attr ($protocol) ?>://plus.google.com/share?url=<?php the_permalink(); ?>"
					onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
					<i class="fa fa-google-plus"></i>
					</a>
				</div>
				<div class="details-post">
					<a href="#"><i class="fa fa-heart-o"></i> 0 Likes</a>
					<a href="#"><i class="fa fa-comment-o"></i><?php comments_number('0', '1', '%'); ?></a>
					<a href="#"><i class="fa fa-user"></i></a><?php the_author_posts_link(); ?>

				</div>
			</div>
			<?php get_template_part( 'inc/post-format/content', get_post_format() ); ?>
			<div class="content">
				<p><?php echo revalia_string_limit_words(get_the_excerpt(), 95); ?>...</p>
			</div>
		</div>
		<div class="Read-More text-center">
			<a href="<?php the_permalink(); ?>" class="button post-more"><?php esc_html_e('Continue Reading', 'revalia'); ?></a>
		</div>
	</article>
	<?php
	endwhile;
	// If no content, include the "No posts found" template.
	else : get_template_part( 'content', 'none' );
	endif;
?>
</div>
<!-- End post layout stander -->
<?php codepages_content_nav( 'nav-pages' ); ?>
