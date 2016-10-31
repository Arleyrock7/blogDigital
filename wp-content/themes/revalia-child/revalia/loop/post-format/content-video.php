<?php global $revalia_codepage;
$revalia_layoutPost = $revalia_codepage['layout_post'];
?>

<?php if ($revalia_layoutPost == 'stander'){ ?>

	<!-- Start post vedio -->
	<div class="post-format">
		<div class="iframe-post vedio">
			<div class="embed-responsive embed-responsive-1by1">
				<?php echo get_post_meta( get_the_ID(), 'embed_video', true ); ?>
			</div>
		</div>
	</div>
	<!-- End post vedio -->

<?php } elseif ($revalia_layoutPost == 'grid') { ?>

	<!-- Start post vedio -->
	<div class="post-format">
		<div class="iframe-post vedio">
			<div class="embed-responsive embed-responsive-4by3">
				<?php echo get_post_meta( get_the_ID(), 'embed_video', true ); ?>
			</div>
		</div>
	</div>
	<!-- End post vedio -->

<?php } elseif ($revalia_layoutPost == 'list') { ?>

	<!-- Start post vedio -->
	<div class="post-format">
		<div class="iframe-post vedio">
			<div class="embed-responsive embed-responsive-4by3">
				<?php echo get_post_meta( get_the_ID(), 'embed_video', true ); ?>
			</div>
		</div>
	</div>
	<!-- End post vedio -->

<?php } elseif ($revalia_layoutPost == 'masonry') { ?>

	<!-- Start post vedio -->
	<div class="post-format">
		<div class="iframe-post vedio">
			<div class="embed-responsive embed-responsive-4by3">
				<?php echo get_post_meta( get_the_ID(), 'embed_video', true ); ?>
			</div>
		</div>
	</div>
	<!-- End post vedio -->

<?php } ?>
