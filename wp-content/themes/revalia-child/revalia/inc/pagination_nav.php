<?php

if ( ! function_exists( 'codepages_content_nav' ) ) :

function codepages_content_nav( $nav_id ) {
	global $wp_query, $post;


	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation clearfix' : 'paging-navigation clearfix';

	?>
	<div class="clearfix"></div>
	<nav id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo esc_attr($nav_class); ?>">

		<?php if ( is_single() ) : ?>
			<ul class="post-nav">
				<?php previous_post_link( '<li class="nav-previous previous">%link</li>', '<p class="meta-nav">' . _x( '<i class="fa fa-angle-left"></i>', 'Previous post link', 'revalia' ) . '</p><span>Previous post</span> %title' ); ?>
				<?php next_post_link( '<li class="nav-next next">%link</li>', '<p class="meta-nav">' . _x( '<i class="fa fa-angle-right"></i>', 'Next post link', 'revalia' ) . '</p><span>Next post</span> %title' ); ?>
			</ul>
		<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : ?>
			<ul id="pagination" class="pagination">
				<li class="nav-previous">
					<?php if ( get_next_posts_link() ) : ?>
					<?php next_posts_link( esc_html__( 'Older posts', 'revalia' ) ); ?>
					<?php endif; ?>
				</li>
				<li class="nav-next">
					<?php if ( get_previous_posts_link() ) : ?>
					<?php previous_posts_link( esc_html__( 'Newer posts', 'revalia' ) ); ?>
					<?php endif; ?>
				</li>
			</ul>
		<?php endif; ?>

	</nav>
	<?php
}
endif;
