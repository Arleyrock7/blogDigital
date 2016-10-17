

<?php global $revalia_codepage; ?>
<?php
	$revalia_layoutsidbarcat = '';
	if ( isset($revalia_codepage['layout_sidebar']) && $revalia_codepage['layout_sidebar'] ){
		if ( isset( $_REQUEST['layout-sidebar'] ) ) {
			$revalia_layoutsidbarcat = esc_attr($_REQUEST['layout-sidebar']);
		}else {
			$revalia_layoutsidbarcat = esc_attr($revalia_codepage['layout_sidebar']);
		}
	}
	global $class_grid_full;
	if ( $revalia_layoutsidbarcat == 'fullwidth'){ $class_grid_full = '-full'; }
?>


<div class="blog-posts-grid<?php echo esc_attr($class_grid_full); ?>">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('content-block'); ?>>
			<div class="post-header">
				<div class="post-header-categories">
					<?php the_time('F jS, Y'); ?> / <?php the_category(' ',' ') ?>
				</div>
				<div class="post-title">
					<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				</div>

				<?php get_template_part( 'inc/post-format/content', get_post_format() ); ?>

				<div class="content text-center">
					<p><?php echo revalia_string_limit_words(get_the_excerpt(), 25); ?>...</p>
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
<?php codepages_content_nav( 'nav-pages' ); ?>
