<?php
	if (is_category()) {
		$cat = get_queried_object();
		$cat_id = $cat->term_id;
		//Category Text Color
		$category_text_color = get_term_meta( $cat_id, 'revalia_category_text_color', true );
		//Category Bg Color
		$category_bg_color = get_term_meta( $cat_id, 'revalia_category_bg_color', true );
	}
?>
<div class="page-main-title dark" style="background-color:<?php echo esc_url($category_bg_color); ?>;">
	<div class="container">
		<div class="category-content text-center">
			<p><?php echo esc_html__('Category', 'revalia'); ?></p>
			<?php echo '<h2 style="color:'.esc_attr($category_text_color).';">'.single_cat_title('', false).'</h2>'; ?>
		</div>
	</div><!-- container -->
</div>