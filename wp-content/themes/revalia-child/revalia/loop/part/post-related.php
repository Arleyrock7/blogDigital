<div class="post-box">
	<h3 class="post-box-title"><?php esc_html_e('You Might Also Like', 'revalia'); ?></h3>
</div>
<div class="Slider-Related-Post text-center">
	<div id="related-projects">
		<div id="revalia-related-slider" class="owl-carousel owl-theme">
			<?php revalia_related_posts();?>
		</div>
		<div class="customNavigation">
		  <a class="btn prev"><i class="fa fa-angle-double-left"></i></a>
		  <a class="btn next"><i class="fa fa-angle-double-right"></i></a>
		</div>
	</div>
</div>
<script>
jQuery(document).ready(function($) {
		$('#revalia-related-slider').owlCarousel({
		items:2,
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
				items:2,
			}
		}
	});
});
</script>
