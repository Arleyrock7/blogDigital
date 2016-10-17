<div class="post-layout-list">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('content-block posts-list'); ?>>
		<div class="post-format">
			<a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail( 'revalia-post-grid-thumbnail' ); ?></a>
		</div>
		<div class="post-header">
			<div class="post-header-categories">
				<?php the_time('F jS, Y'); ?> / <?php the_category(' ',' ') ?>
			</div>
			<div class="post-title">
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
			</div>
			<div class="content">
				<p><?php echo revalia_string_limit_words(get_the_excerpt(), 45); ?>...</p>
			</div>
			<div class="Read-More text-center">
				<a href="<?php the_permalink(); ?>" class="button post-more"><?php esc_html_e('Continue Reading', 'revalia'); ?></a>
			</div>
		</div>
	</article>
	<?php
	endwhile;
	// If no content, include the "No posts found" template.
	else : get_template_part( 'content', 'none' );
	endif;
?>
</div>
<?php codepages_content_nav( 'nav-pages' ); ?>
