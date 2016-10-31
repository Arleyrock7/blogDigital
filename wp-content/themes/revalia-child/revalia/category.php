<?php get_header(); ?>
<!--Category Title Start -->
<?php
	//Header Style
	$cat = get_queried_object();
	$cat_id = $cat->term_id;

	//Header Style
	$header_style = get_term_meta( $cat_id, 'revalia_category_header', true );
	$category_header_style = $header_style ? $header_style : get_option('revalia_category_header', 'style1');

	//Category Ads
	$category_ads_banner = get_term_meta( $cat_id, 'revalia_category_custom_banner', true );
	$category_ads_banner_link = get_term_meta( $cat_id, 'revalia_category_custom_banner_link', true );

	//Sidebar
	$sidebar_onoff = get_term_meta( $cat_id, 'revalia_category_sidebar_onoff', true );
	$category_sidebar_on_off = $sidebar_onoff ? $sidebar_onoff : get_option('revalia_category_sidebar_onoff', 'style1');

	//Post Style
	$post_style = get_term_meta( $cat_id, 'revalia_category_style', true );
	$category_post_style = $post_style ? $post_style : get_option('revalia_category_style', 'style1');

	//Header Style Category
	if ($category_header_style == 'style1') {
		get_template_part( 'loop/header/category-header-'.$category_header_style );
	}
	elseif ($category_header_style == 'style2') {
		get_template_part( 'loop/header/category-header-'.$category_header_style );
	}
?>
<!--Category Title End -->

<!-- Category Ads Start -->
<?php if (!$category_ads_banner == '' || !$category_ads_banner_link == ''): ?>
	<div class="category-ads text-center">
		<a href="<?php echo esc_url($category_ads_banner_link); ?>" target="_blank">
			<img src="<?php echo esc_url($category_ads_banner); ?>" alt="">
		</a>
	</div>
<?php endif ?>
<!-- Category Ads End -->
<div id="Category-Posts">
	<div class="container inner">
		<div class="row">
			<?php if ($category_post_style == 'style4') { $revalia_masonry = 'masonry-layout';} ?>
			<?php if ($category_sidebar_on_off == 'style1'): ?>
				<div class="main-content wpb_column col-sm-8 col-xs-12 margin-top">
			<?php else : ?>
				<div class="main-content wpb_column col-sm-12 col-xs-12 margin-top">
			<?php endif ?>

				<div class="blog-posts">
					<div class="row <?php echo esc_attr($revalia_masonry); ?>">
						<?php
						//Post Loop
						$i = 0; if (have_posts()) :  ?>
							<?php while (have_posts()) : the_post(); ?>
								<?php get_template_part( '/loop/post-style/'.$category_post_style.'' ); ?>
							<?php endwhile; ?>

						<?php else : ?>
							<?php get_template_part( '/loop/post-style/content-none'); ?>
					  	<?php $i++; endif;?>

					</div>
				</div>
			</div>

			<!--Sidebar Start-->
			<?php if ($category_sidebar_on_off == 'style1'): ?>
				<div class="Sidebar col-sm-4 col-xs-12">
					<div class="sidebar-content">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("category-sidebar") ) : ?>
						<?php endif; ?>
					</div>
				</div>
			<?php else : ?>
			<?php endif ?>
			<!--Sidebar End-->


<?php codepages_content_nav( 'nav-pages' ); ?>
		</div>
	</div>
</div>
<!-- End category Content -->

<?php get_footer(); ?>
