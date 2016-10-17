<?php global $revalia_codepage;
$showposts= $revalia_codepage['post_header_slider'];
?>
<script>
jQuery(document).ready(function($) {
		$('#slider-home').owlCarousel({
		items:1,
		stagePadding: 0,
		margin:0,
		loop:true,
		merge:true,
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		autoplay:true,
		smartSpeed:600,
		nav:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		responsiveClass:true,
		responsive:{
			200:{
				mergeFit:true,
				items:1,
				stagePadding: 0,
				margin:0,
			},
			678:{
				mergeFit:true,
				items:1,
				stagePadding: 0,
				margin:0,
			},
			1000:{
				mergeFit:false,
				items:1,
			}
		}
	});
});
</script>

<section class="header-slider">
	<div id="slider-home" class="owl-carousel owl-theme">
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $showposts,
        'orderby' => 'ID',
    );
    $query = new WP_Query($args); ?>
    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="item">
			<div class="home-slider">
				<?php echo the_post_thumbnail( 'revalia-slider-1col', array('itemprop'=>'image') ); ?>
				<div class="post-slider-content text-center">
					<div class="slider-content">
						<div class="title-slider-content">
							<?php revalia_category_name_color(); ?>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php echo revalia_string_limit_words(get_the_excerpt(), 20); ?></p>
						</div>
						<div class="meta-slider-content">
							<ul>
								<li><i class="icon icon-User"></i><span><?php the_author_posts_link(); ?></span></li>
								<li><i class="icon icon-Time"></i><span><?php the_time('F jS, Y'); ?></span></li>
								<li><i class="icon icon-MessageRight"></i><span><?php comments_number('0', '1', '%'); ?></span></li>
							</ul>
						</div>
						<div class="post-more">
							<a href="<?php the_permalink(); ?>"><?php esc_html_e('Continue Reading', 'revalia'); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile;
    wp_reset_postdata();
    else : ?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'revalia' ); ?></p>
		<?php endif; ?>
	</div>
</section>
