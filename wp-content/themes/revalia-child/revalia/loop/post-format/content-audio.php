<?php global $revalia_codepage;
$revalia_layoutPost = $revalia_codepage['layout_post'];
?>

<?php if ($revalia_layoutPost == 'stander'){ ?>

	<!-- Start post audio -->
	<div class="post-format">
		<div class="iframe-post audio">
			<div class="embed-responsive embed-responsive-1by1">
				<?php echo get_post_meta( get_the_ID(), 'embed_audio', true ); ?>
			</div>
		</div>
	</div>
	<!-- End post audio -->

<?php } elseif ($revalia_layoutPost == 'grid') { ?>

	<!-- Start post audio -->
	<div class="post-format">
		<div class="iframe-post audio">
			<div class="embed-responsive embed-responsive-4by3">
				<?php echo get_post_meta( get_the_ID(), 'embed_audio', true ); ?>
			</div>
		</div>
	</div>
	<!-- End post audio -->

<?php } elseif ($revalia_layoutPost == 'list') { ?>

	<!-- Start post audio -->
	<div class="post-format">
		<div class="iframe-post audio">
			<div class="embed-responsive embed-responsive-4by3">
				<?php echo get_post_meta( get_the_ID(), 'embed_audio', true ); ?>
			</div>
		</div>
	</div>
	<!-- End post audio -->

<?php } elseif ($revalia_layoutPost == 'masonry') { ?>

	<!-- Start post audio -->
	<div class="post-format">
		<div class="iframe-post audio">
			<div class="embed-responsive embed-responsive-4by3">
				<?php echo get_post_meta( get_the_ID(), 'embed_audio', true ); ?>
			</div>
		</div>
	</div>
	<!-- End post audio -->

<?php } ?>
