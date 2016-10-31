<?php global $revalia_codepage;
$revalia_layoutPost = $revalia_codepage['layout_post'];
?>

<?php if ($revalia_layoutPost == 'stander'){ ?>

	<!-- Start post quote -->
	<div class="post-format">
		<div class="quote-Post">
			<blockquote class="blockquote">
				<span class="quote-icon"><i class="icon icon-Ringer"></i></span>
				<a href="<?php the_permalink(); ?>"><p><?php echo get_post_meta( get_the_ID(), 'quote_text', true ); ?></p></a>
				<span class="quote-name"><?php echo get_post_meta( get_the_ID(), 'quote_name', true ); ?></span>
			</blockquote>
		</div>
	</div>
	<!-- End post quote -->

<?php } elseif ($revalia_layoutPost == 'grid') { ?>

	<!-- Start post quote -->
	<div class="post-format">
		<div class="quote-Post">
			<blockquote class="blockquote">
				<span class="quote-icon"><i class="icon icon-Ringer"></i></span>
				<a href="<?php the_permalink(); ?>"><p><?php echo get_post_meta( get_the_ID(), 'quote_text', true ); ?></p></a>
				<span class="quote-name"><?php echo get_post_meta( get_the_ID(), 'quote_name', true ); ?></span>
			</blockquote>
		</div>
	</div>
	<!-- End post quote -->

<?php } elseif ($revalia_layoutPost == 'list') { ?>


	<!-- Start post quote -->
	<div class="post-format">
		<div class="quote-Post">
			<blockquote class="blockquote">
				<span class="quote-icon"><i class="icon icon-Ringer"></i></span>
				<a href="<?php the_permalink(); ?>"><p><?php echo get_post_meta( get_the_ID(), 'quote_text', true ); ?></p></a>
				<span class="quote-name"><?php echo get_post_meta( get_the_ID(), 'quote_name', true ); ?></span>
			</blockquote>
		</div>
	</div>
	<!-- End post quote -->

<?php } elseif ($revalia_layoutPost == 'masonry') { ?>

	<!-- Start post quote -->
	<div class="post-format">
		<div class="quote-Post">
			<blockquote class="blockquote">
				<span class="quote-icon"><i class="icon icon-Ringer"></i></span>
				<a href="<?php the_permalink(); ?>"><p><?php echo get_post_meta( get_the_ID(), 'quote_text', true ); ?></p></a>
				<span class="quote-name"><?php echo get_post_meta( get_the_ID(), 'quote_name', true ); ?></span>
			</blockquote>
		</div>
	</div>
	<!-- End post quote -->

<?php } ?>
