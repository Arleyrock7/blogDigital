<?php global $revalia_codepage;
$showposts= $revalia_codepage['post_header_slider'];
?>
<script>
jQuery(document).ready(function($) {
	$('#slider-home-2col').owlCarousel({
		items:2,
		stagePadding: 100,
		margin:0,
		loop:true,
		merge:true,
		autoplay:true,
		smartSpeed:600,
		nav:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		responsiveClass:true,
		responsive:{
			320:{
				mergeFit:true,
				items:1,
				stagePadding: 0,
			},
			678:{
				mergeFit:true,
				items:1,
			},
			1000:{
				mergeFit:false,
				items:2,
			},
			1200:{
				mergeFit:false,
				items:2,
			},
			1500:{
				mergeFit:false,
				stagePadding: 0,
				items:3,
			}
		}
	});
});
</script>
<section class="header-slider slider-2col">
	<div id="slider-home-2col" class="owl-carousel owl-theme">
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $showposts,
        'orderby' => 'ID',
    );
    $query = new WP_Query($args); ?>
    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="item">
			<article class="Post-Slider">
				<div class="PostItem">
					<?php echo the_post_thumbnail( 'revalia-slider-1co2', array('itemprop'=>'image') ); ?>
				</div>
				<div class="overlayBox col-slider">
					<div class="post-slider-content text-center">
						<div class="slider-content">
							<div class="title-slider-content">
								<?php revalia_category_name_color(); ?>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p><?php echo revalia_string_limit_words(get_the_excerpt(), 25); ?></p>
							</div>
							<div class="post-more">
								<a href="<?php the_permalink(); ?>"><?php esc_html_e('Continue Reading', 'revalia'); ?></a>
							</div>
						</div>
					</div>
				</div><!-- End Post-Hover -->
			</article>
		</div><!-- End Itme -->

    <?php endwhile;
    wp_reset_postdata();
    else : ?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'revalia' ); ?></p>
		<?php endif; ?>
	</div>
</section>
