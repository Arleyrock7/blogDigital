<?php if ( has_post_format( 'image' )) : ?>
	<!-- Start post image -->
	<div class="post-format">
		<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ): the_post_thumbnail( 'revalia-post-thumbnail' ); endif; ?></a>
	</div>
	<!-- End post image -->
	<?php elseif( has_post_format( 'video' )) :?>
	<!-- Start post vedio -->
	<div class="post-format">
		<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ): the_post_thumbnail( 'revalia-post-thumbnail' ); endif; ?></a>
		<div class="iframe-post vedio">
			<div class="embed-responsive embed-responsive-1by1">
				<?php echo get_post_meta( get_the_ID(), 'embed_video', true ); ?>
			</div>
		</div>
	</div>
	<!-- End post vedio -->
	<?php elseif( has_post_format( 'audio' )) :?>
	<!-- Start post audio -->
	<div class="post-format">
		<?php if ( has_post_thumbnail() ): the_post_thumbnail( 'revalia-post-thumbnail' ); endif; ?>
		<div class="iframe-post audio">
			<div class="embed-responsive embed-responsive-1by1">
				<?php echo get_post_meta( get_the_ID(), 'embed_audio', true ); ?>
			</div>
		</div>
	</div>
	<!-- End post audio -->
	<?php elseif( has_post_format( 'link' )) :?>
	<!-- Start post link -->
	<div class="post-header">
		<div class="post-format">
			<?php if ( has_post_thumbnail() ): the_post_thumbnail( 'revalia-post-thumbnail' ); endif; ?>
			<div class="Link-Post text-center">
				<a href="<?php the_permalink(); ?>"><i class="icon icon-Linked"></i><p><?php echo get_post_meta( get_the_ID(), 'title_link', true ); ?></p><span><?php echo get_post_meta( get_the_ID(), 'url_link', true ); ?></span></a>
			</div>
		</div>
	</div>
	<!-- End post link -->
	<?php elseif( has_post_format( 'quote' )) :?>
	<!-- Start post quote -->
	<div class="post-header">
		<div class="post-format">
			<?php if ( has_post_thumbnail() ): the_post_thumbnail( 'revalia-post-thumbnail' ); endif; ?>
			<div class="quote-Post">
				<blockquote class="blockquote">
					<span class="quote-icon"><i class="fa fa-quote-right"></i></span>
					<p><?php echo get_post_meta( get_the_ID(), 'quote_text', true ); ?></p>
					<span class="quote-name"><?php echo get_post_meta( get_the_ID(), 'quote_name', true ); ?></span>
				</blockquote>
			</div>
		</div>
	</div>
	<!-- End post quote -->
	<?php elseif( has_post_format( 'gallery' )) :?>
	<!-- Start post slider -->
	<div class="post-format">
		<div class="Slider-Post text-center">
			<div id="Slider-post-img" class="owl-carousel owl-theme">
				<?php $postslider = get_post_meta($post->ID, 'gallery_images', false); ?>
				<?php foreach($postslider as $slider) { ?>
					<?php echo wp_get_attachment_link ( $slider, 'revalia-post-thumbnail' ); ?>
				<?php 	} ?>
			</div>
			<div class="customNavigation">
			  <a class="btn prev"><i class="fa fa-angle-double-left"></i></a>
			  <a class="btn next"><i class="fa fa-angle-double-right"></i></a>
			</div>
		</div>
	</div>
	<!-- End post slider -->
<?php endif ?>
