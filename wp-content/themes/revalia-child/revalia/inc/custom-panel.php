<?php function revalia_custom_panel() { ?>
<style id='revalia-custom-css' type='text/css'>
<?php global $revalia_codepage; ?>
/* Options set in the admin page */


<?php
$header_bg 			 = $revalia_codepage['bg_nav_logo']['background-image'];
$header_bg_size 	 = $revalia_codepage['bg_nav_logo']['background-size'];
$header_bg_position  = $revalia_codepage['bg_nav_logo']['background-position'];
$header_bg_attachment	 = $revalia_codepage['bg_nav_logo']['background-attachment'];
$header_bg_repeat	 = $revalia_codepage['bg_nav_logo']['background-repeat'];
?>
.header-bg {
	background-image: url(<?php echo esc_attr($header_bg); ?>);
  background-size: <?php echo esc_attr($header_bg_size); ?>;
  background-position: <?php echo esc_attr($header_bg_position); ?>;
  background-repeat: <?php echo esc_attr($header_bg_repeat); ?>;
	background-attachment: <?php echo esc_attr($header_bg_attachment); ?>;
}

<?php
$body_bg 				= $revalia_codepage['bg_img_body']['background-image'];
$body_bg_color	 		= $revalia_codepage['bg_color_body'];
$body_bg_size 	 		= $revalia_codepage['bg_img_body']['background-size'];
$body_bg_position 		= $revalia_codepage['bg_img_body']['background-position'];
$body_bg_attachment 	= $revalia_codepage['bg_img_body']['background-attachment'];
$body_bg_repeat	 		= $revalia_codepage['bg_img_body']['background-repeat']
?>
.body-bg {
	background-image: url(<?php echo esc_attr($body_bg); ?>);
	background-color: <?php echo esc_attr($body_bg_color); ?>;
	background-size: <?php echo esc_attr($body_bg_size); ?>;
	background-position: <?php echo esc_attr($body_bg_position); ?>;
	background-repeat: <?php echo esc_attr($body_bg_repeat); ?>;
	background-attachment: <?php echo esc_attr($body_bg_attachment); ?>;
}

<?php
$title_page_color 		= $revalia_codepage['title_text_color'];
?>
.title-text h2 {
	color: <?php echo esc_attr($title_page_color); ?>;
}
.breadcrumb li a, .breadcrumbs a {
    color: <?php echo esc_attr($title_page_color); ?>;
}

<?php
$custom_css 		= $revalia_codepage['custom_css'];
echo esc_attr($custom_css);
?>

<?php
$categories = get_categories();
foreach ( $categories as $category ) {
	$cat_id = $category->term_id;
	$cat_data = get_option("category_$cat_id");
	if( !empty( $cat_data ) ) :
		$cat_color = $cat_data['catBG'];
		$cat_text = $cat_data['catText'];
	else:
		$cat_color = "";
		$cat_text = "";
	endif;
	echo '.cat-color-' . $category->term_id . '{ background-color:' . $cat_color . ' !important; color : '.$cat_text.' !important; } ';
}


/* echo ot_get_option('custom_css_codes'); */
?>
</style>
<?php
	$out = ob_get_contents();
	if (ob_get_contents()) ob_end_clean();
	// Remove comments
	$out = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $out);
	// Remove space after colons
	$out = str_replace(': ', ':', $out);
	// Remove whitespace
	$out = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $out);

	echo $out;
}
add_action('wp_head', 'revalia_custom_panel'); ?>
