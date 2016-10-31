<?php global $revalia_codepage;
$revalia_layoutPost = $revalia_codepage['layout_post'];
?>

<?php if ($revalia_layoutPost == 'stander'){ ?>

	<!-- Start post slider -->
	<div class="post-format">
		<div class="Slider-Post text-center">
			<div id="slider-post-img" class="owl-carousel owl-theme">
				<?php $postslider = get_post_meta($post->ID, 'gallery_images', false); ?>
				<?php foreach($postslider as $slider) { ?>
					<?php echo wp_get_attachment_image ( $slider, 'revalia-post-thumbnail' ); ?>
				<?php 	} ?>
			</div>
		</div>
	</div>
	<!-- End post slider -->

<?php } elseif ($revalia_layoutPost == 'grid') { ?>

	<!-- Start post slider -->
	<div class="post-format">
		<div class="Slider-Post text-center">
			<div id="slider-post-img" class="owl-carousel owl-theme">
				<?php $postslider = get_post_meta($post->ID, 'gallery_images', false); ?>
				<?php foreach($postslider as $slider) { ?>
					<?php echo wp_get_attachment_image ( $slider, 'revalia-post-thumbnail' ); ?>
				<?php 	} ?>
			</div>
		</div>
	</div>
	<!-- End post slider -->

<?php } elseif ($revalia_layoutPost == 'list') { ?>

	<!-- Start post slider -->
	<div class="post-format">
		<div class="Slider-Post text-center">
			<div id="slider-post-img" class="owl-carousel owl-theme">
				<?php $postslider = get_post_meta($post->ID, 'gallery_images', false); ?>
				<?php foreach($postslider as $slider) { ?>
					<?php echo wp_get_attachment_image ( $slider, 'revalia-post-thumbnail' ); ?>
				<?php 	} ?>
			</div>
		</div>
	</div>
	<!-- End post slider -->

<?php } elseif ($revalia_layoutPost == 'masonry') { ?>

	<!-- Start post slider -->
	<div class="post-format">
		<div class="Slider-Post text-center">
			<div id="slider-post-img" class="owl-carousel owl-theme">
				<?php $postslider = get_post_meta($post->ID, 'gallery_images', false); ?>
				<?php foreach($postslider as $slider) { ?>
					<?php echo wp_get_attachment_image ( $slider, 'revalia-post-thumbnail' ); ?>
				<?php 	} ?>
			</div>
		</div>
	</div>
	<!-- End post slider -->

<?php } ?>
