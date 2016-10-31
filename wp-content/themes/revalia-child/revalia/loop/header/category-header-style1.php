<?php
if (is_category()) {
	$cat = get_queried_object();
	$cat_id = $cat->term_id;
	//Category Background
	$category_bg_image = get_term_meta( $cat_id, 'revalia_category_header_image', true );
	//Category Text Color
	$category_text_color = get_term_meta( $cat_id, 'revalia_category_text_color', true );
}
?>
<!-- Start Archive title -->
<?php if (!$category_bg_image == ''): ?>
	<div class="page-main-title dark category-page-title image" style="background-image: url('<?php echo esc_attr($category_bg_image); ?>');">
<?php else : ?>
	<div class="page-main-title dark category-page-title image" style="background-image: url('<?php echo esc_url(REVALIA_DIR .'/assets/images/blog/Page-title-bg.png'); ?>');">
<?php endif ?>

	<div class="container">
		<div class="category-content text-center">
			<p><?php echo esc_html__('Category', 'revalia'); ?></p>
			<?php echo '<h2 style="color:'.esc_attr($category_text_color).';">'.single_cat_title('', false).'</h2>'; ?>
		</div>
	</div><!-- container -->
	</div>