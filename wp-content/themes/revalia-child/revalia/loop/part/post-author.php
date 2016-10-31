<?php $protocol = is_ssl() ? 'https' : 'http';?>
<?php $authordesc = get_the_author_meta( 'description' );
if ( ! empty ( $authordesc ) ){?>
<div class="about-author">
	<div class="about-author-avatar">
		<?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
	</div><!-- .about-author-avatar -->
	<div class="about-author-main">
		<h4 class="about-author-name"><?php the_author_posts_link(); ?></h4>
		<div class="about-author-bio">
			<p><?php the_author_meta('description'); ?></p>
		</div><!-- .about-author-bio -->
		<div class="about-author-social">
			<?php if(get_the_author_meta('twitter')) : ?><a target="_blank" class="author-social" href="<?php echo esc_attr ($protocol) ?>://<?php echo the_author_meta('twitter'); ?>"><i class="fa fa-twitter"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('facebook')) : ?><a target="_blank" class="author-social" href="<?php echo esc_attr ($protocol) ?>://<?php echo the_author_meta('facebook'); ?>"><i class="fa fa-facebook"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('instagram')) : ?><a target="_blank" class="author-social" href="<?php echo esc_attr ($protocol) ?>://<?php echo the_author_meta('instagram'); ?>"><i class="fa fa-instagram"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('linkedin')) : ?><a target="_blank" class="author-social" href="<?php echo esc_attr ($protocol) ?>://<?php echo the_author_meta('instagram'); ?>"><i class="fa fa-linkedin"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('googleplus')) : ?><a target="_blank" class="author-social" href="<?php echo esc_attr ($protocol) ?>://<?php echo the_author_meta('googleplus'); ?>"><i class="fa fa-google-plus"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('pinterest')) : ?><a target="_blank" class="author-social" href="<?php echo esc_attr ($protocol) ?>://<?php echo the_author_meta('pinterest'); ?>"><i class="fa fa-pinterest"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('tumblr')) : ?><a target="_blank" class="author-social" href="<?php echo esc_attr ($protocol) ?>://<?php echo the_author_meta('tumblr'); ?>"><i class="fa fa-tumblr"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('youtube')) : ?><a target="_blank" class="author-social" href="<?php echo esc_attr ($protocol) ?>://<?php echo the_author_meta('youtube'); ?>"><i class="fa fa-youtube"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('vimeo')) : ?><a target="_blank" class="author-social" href="<?php echo esc_attr ($protocol) ?>://<?php echo the_author_meta('vimeo'); ?>"><i class="fa fa-vimeo"></i></a><?php endif; ?>
		</div><!-- .about-author-social -->
	</div><!-- .about-author-main -->
</div>
<?php }?>
