<?php global $revalia_codepage; ?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
  		<link rel="shortcut icon" href="<?php echo esc_url($revalia_codepage['fav_icon']['url']); ?>" />
		<?php } ?>
		<?php  wp_head(); ?>
	</head>
  <?php
  if ( isset($revalia_codepage['layout_homepage']) && $revalia_codepage['layout_homepage'] ){
    if ( isset( $_REQUEST['layout-homepage-body'] ) ) {
      $revalia_layouthomepage = esc_attr($_REQUEST['layout-homepage-body']);
    }else {
      $revalia_layouthomepage = esc_attr($revalia_codepage['layout_homepage']);
    }
  }
  ?>
<?php if ($revalia_layouthomepage == 'boxed_layout'){ $layout_homepage_body = 'boxed-layout'; } elseif ($revalia_layouthomepage == 'wide_layout'){ $layout_homepage_body = 'wide-layout';} ?>
<body id="<?php  echo esc_attr($layout_homepage_body); ?>" <?php body_class('body-bg'); ?>>
<?php if ( isset($revalia_codepage['page_loading']) && $revalia_codepage['page_loading'] ){ ?>
	<!-- Start Loading -->
	<div id="loading">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="object" id="object_one"></div>
				<div class="object" id="object_two"></div>
				<div class="object" id="object_three"></div>
				<div class="object" id="object_four"></div>
			</div>
		</div>
	</div>
	<!-- End Loading  -->

<?php } ?>


	<div id="home" class="body-wrapper">
	<?php get_template_part( 'loop/header/sidebar-menu' ); ?>
	<?php
		if ( isset($revalia_codepage['layout_header']) && $revalia_codepage['layout_header'] ){
			if ( isset( $_REQUEST['layout-header'] ) ) {
				$layoutHeader = esc_attr($_REQUEST['layout-header']);
			}else {
				$layoutHeader = esc_attr($revalia_codepage['layout_header']);
			}
		}
		if ($layoutHeader == 'header_style_1'){ get_template_part("loop/header/header-style1"); }
		elseif ($layoutHeader == 'header_style_2') { get_template_part("loop/header/header-style2"); }
		elseif ($layoutHeader == 'header_style_3') { get_template_part("loop/header/header-style3");}
	?>
