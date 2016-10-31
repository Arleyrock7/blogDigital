<?php $protocol = is_ssl() ? 'https' : 'http';?>
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
