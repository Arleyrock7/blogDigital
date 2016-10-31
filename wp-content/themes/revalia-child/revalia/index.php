<?php get_header(); ?>

<!-- Start Home Slider -->
<?php if ($revalia_codepage['header_slider'] == 1){
	if ( isset($revalia_codepage['layout_slider']) && $revalia_codepage['layout_slider'] ){
		if ( isset( $_REQUEST['layout-slider'] ) ) {
			$revalia_sliderLayout = esc_attr($_REQUEST['layout-slider']);
		}else {
			$revalia_sliderLayout = esc_attr($revalia_codepage['layout_slider']);
		}
	}
	if ($revalia_sliderLayout == 'slider_fullwidth'){ get_template_part("loop/slider/home-slider-1col"); }
	elseif ($revalia_sliderLayout == 'slider_2colm') {get_template_part("loop/slider/home-slider-2col");}
	elseif ($revalia_sliderLayout == 'slider_3colm') { get_template_part("loop/slider/home-slider-3col");}
} else {} ?>
<!-- Start Home Slider -->

<?php if($revalia_codepage['advertising_blog']=='1'):?>
<!-- Start Navbar Ads -->
<div class="sidebar-banner-ads text-center">
<?php $headerad = $revalia_codepage['blog_ad'];
	echo do_shortcode($headerad);
?>
</div>
<!-- End Navbar Ads -->
<?php else:
endif;?>

<!-- Start Featured Boxes -->
<?php if ($revalia_codepage['featured_box'] == 1){ ?>
	<section class="header-slider">
		<div class="container inner-Pages">
			<div class="row">
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="home-links">
						<img src="<?php echo esc_url ( $revalia_codepage['featured-box-1'][0]['image']); ?>" alt="<?php echo esc_html ($revalia_codepage['featured-box-1'][0]['description']); ?>">
						<h2><a href="<?php echo esc_url ($revalia_codepage['featured-box-1'][0]['url']) ; ?>"><?php echo esc_html ($revalia_codepage['featured-box-1'][0]['title']) ; ?></a></h2>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="home-links">
						<img src="<?php echo esc_url ($revalia_codepage['featured-box-2'][0]['image'] ); ?>" alt="<?php echo esc_html ($revalia_codepage['featured-box-2'][0]['description']) ; ?>">
						<h2><a href="<?php echo esc_url ($revalia_codepage['featured-box-2'][0]['url']) ; ?>"><?php echo esc_html ($revalia_codepage['featured-box-2'][0]['title']) ; ?></a></h2>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="home-links">
						<img src="<?php echo esc_url ( $revalia_codepage['featured-box-3'][0]['image']); ?>" alt="<?php echo esc_html ( $revalia_codepage['featured-box-3'][0]['description'] ); ?>">
						<h2><a href="<?php echo esc_url ($revalia_codepage['featured-box-3'][0]['url']) ; ?>"><?php echo esc_html ($revalia_codepage['featured-box-3'][0]['title']) ; ?></a></h2>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } else {} ?>
<?php if ($revalia_codepage['featured_box'] == 0){ $inner = 'inner'; } elseif ($revalia_codepage['featured_box'] == 1){ $inner = 'inner-Pages';} ?>
<!-- End Featured Boxes -->

<!-- Start Home Content -->
<div id="Home-Posts">
	<div class="container <?php  echo esc_attr($inner); ?>">
		<div class="row">
			<?php
				$revalia_layoutsidbar = '';
				if ( isset($revalia_codepage['layout_sidebar']) && $revalia_codepage['layout_sidebar'] ){
					if ( isset( $_REQUEST['layout-sidebar'] ) ) {
						$revalia_layoutsidbar = esc_attr($_REQUEST['layout-sidebar']);
					}else {
						$revalia_layoutsidbar = esc_attr($revalia_codepage['layout_sidebar']);
					}
				}
				if ($revalia_layoutsidbar == 'left_sidebar'){ get_sidebar(); }

				if ( isset($revalia_codepage['layout_post']) && $revalia_codepage['layout_post'] ){
					if ( isset( $_REQUEST['layout-post'] ) ) {
						$revalia_layoutPost = esc_attr($_REQUEST['layout-post']);
					}else {
						$revalia_layoutPost = esc_attr($revalia_codepage['layout_post']);
					}
				}
			?>

			<?php
				if ($revalia_layoutsidbar == 'fullwidth'){ $class = 'col-md-12'; }
				if ($revalia_layoutsidbar == 'fullwidth' && ( $revalia_layoutPost == 'stander' || $revalia_layoutPost == 'list' ) ){ $class = 'col-md-8'; }
				if ($revalia_layoutsidbar == 'left_sidebar' || $revalia_layoutsidbar == 'right_sidebar') { $class = 'col-md-8';}
			?>

			<!-- Start Layout Post -->
			<?php if ($revalia_layoutPost == 'masonry') { $revalia_masonry = 'masonry-layout';} ?>
			<div class="main-content <?php  echo esc_attr($class); ?> <?php $offset = 'col-md-offset-2'; if ( $revalia_layoutPost == 'stander' && $revalia_layoutsidbar == 'fullwidth' || $revalia_layoutPost == 'list' && $revalia_layoutsidbar == 'fullwidth'){ echo esc_attr($offset);}?>">
				<div class="row <?php global $revalia_masonry; echo esc_attr($revalia_masonry); ?>">
				<?php if (have_posts()) :  ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php
						if ($revalia_layoutPost 		== 'stander'){ get_template_part("loop/post-style/style1"); }
						elseif ($revalia_layoutPost == 'grid') { get_template_part("loop/post-style/style2");}
						elseif ($revalia_layoutPost == 'list') { get_template_part("loop/post-style/style3");}
						elseif ($revalia_layoutPost == 'masonry') { get_template_part("loop/post-style/style4");}
					?>
					<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'loop/post-style/content-none'); ?>
				<?php endif;?>
				</div>
				<?php codepages_content_nav( 'nav-pages' ); ?>
			</div>
			<!-- End Layout Post -->

			<?php if ($revalia_layoutsidbar == 'right_sidebar'){ get_sidebar(); } ?>

		</div>
	</div>
</div>
<!-- End Home Content -->

<!-- Start Featured Slider -->
<?php if ($revalia_codepage['featured_footer_slider'] == 1){ get_template_part("loop/slider/home-slider-footer"); } else {} ?>
<!-- End Featured Slider -->


<?php get_footer(); ?>
