<?php global $revalia_codepage;
$revalia_layoutPost = $revalia_codepage['layout_post'];
?>

<?php if ($revalia_layoutPost == 'stander'){ ?>

	<!-- Start post link -->
		<div class="post-format">
			<div class="Link-Post text-center">
				<a href="<?php the_permalink(); ?>"><i class="icon icon-Linked"></i><p><?php echo get_post_meta( get_the_ID(), 'title_link', true ); ?></p><span><?php echo get_post_meta( get_the_ID(), 'url_link', true ); ?></span></a>
			</div>
		</div>
	<!-- End post link -->

<?php } elseif ($revalia_layoutPost == 'grid') { ?>

	<!-- Start post link -->
		<div class="post-format">
			<div class="Link-Post text-center">
				<a href="<?php the_permalink(); ?>"><i class="icon icon-Linked"></i><p><?php echo get_post_meta( get_the_ID(), 'title_link', true ); ?></p><span><?php echo get_post_meta( get_the_ID(), 'url_link', true ); ?></span></a>
			</div>
		</div>
	<!-- End post link -->

<?php } elseif ($revalia_layoutPost == 'list') { ?>

	<!-- Start post link -->
		<div class="post-format">
			<div class="Link-Post text-center">
				<a href="<?php the_permalink(); ?>"><i class="icon icon-Linked"></i><p><?php echo get_post_meta( get_the_ID(), 'title_link', true ); ?></p><span><?php echo get_post_meta( get_the_ID(), 'url_link', true ); ?></span></a>
			</div>
		</div>
	<!-- End post link -->


<?php } elseif ($revalia_layoutPost == 'masonry') { ?>

	<!-- Start post link -->
		<div class="post-format">
			<div class="Link-Post text-center">
				<a href="<?php the_permalink(); ?>"><i class="icon icon-Linked"></i><p><?php echo get_post_meta( get_the_ID(), 'title_link', true ); ?></p><span><?php echo get_post_meta( get_the_ID(), 'url_link', true ); ?></span></a>
			</div>
		</div>
	<!-- End post link -->

<?php } ?>
