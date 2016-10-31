<?php global $revalia_codepage;
$showposts  = $revalia_codepage['post_footer_slider'];
$order_post = $revalia_codepage['order_slider_post'];
$title_post = $revalia_codepage['title_footer_slider'];
?>
<script>
jQuery(document).ready(function($) {
		$('#footer_articles_slider').owlCarousel({
		items:4,
		stagePadding: 0,
		margin:10,
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
				items:2,
				stagePadding: 0,
				margin:0,
			},
			1000:{
				mergeFit:false,
				items:4,
			}
		}
	});
});
</script>

<div class="footer-slider-articles">
	<div class="container">
		<div class="row theme-category-post theme-footer-articles">
      <h2 class="title-footer-slider text-center"><?php echo "$title_post"; ?></h2>
			<div id="footer_articles_slider" class="Home-sliders owl-carousel">
        <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => $showposts,
            'orderby'        => $order_post,
        );
        $query = new WP_Query($args); ?>
        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="item">
					<div class="home-footer-post">
						<?php echo the_post_thumbnail( 'revalia-slider-1co2', array('itemprop'=>'image') ); ?>
						<div class="post-slider-content text-center">
							<div class="slider-content">
								<div class="title-slider-content">
									<?php revalia_category_name_color(); ?>
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								</div>
							</div>
						</div>
					</div>
				</div><!-- End Itme -->
        <?php endwhile;
        wp_reset_postdata();
        else : ?>
          <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'revalia' ); ?></p>
        <?php endif; ?>
			</div>

		</div>
	</div>
</div>
