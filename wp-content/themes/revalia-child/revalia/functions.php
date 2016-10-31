<?php
/**
 * Codepages functions and definitions
 * @package Revalia
 * @author Codepages
 * @link http://themeforest.net/user/codepages/portfolio
 */


//Define
define( 'REVALIA_DIR', get_template_directory() );
define( 'REVALIA_URL', get_template_directory_uri() );
define( 'REVALIA_THEME_NAME', esc_html_x( 'Revalia', 'Theme Name', 'revalia' ) );
define( 'REVALIA_THEME_VERSION', '1.0' );

//THEME OPTION INIT
require_once REVALIA_DIR . '/admin/redux/framework.php';
require_once REVALIA_DIR . '/admin/theme-options.php';

//THEME META OPTION CODE PAGES
require_once REVALIA_DIR . '/inc/meta.php';

//THEME GOOGLE FONTS CODE PAGES
require_once REVALIA_DIR . '/inc/google-fonts.php';


//THEME SETUP PLUGINS CODE PAGES
require_once REVALIA_DIR . '/inc/plugins/setup-plugins.php';


//THEME SETUP PLUGINS CODE PAGES
require_once REVALIA_DIR . '/inc/custom-panel.php';


//THEME CUSTOM CSS OPTION PANEL
require_once REVALIA_DIR . '/inc/breadcrumb.php';


//THEME SETUP CATEGORY CUSTOM PAGES
require_once REVALIA_DIR . '/inc/category-meta.php';


//THEME SETUP PAGINATION CODE PAGES
require_once REVALIA_DIR . '/inc/pagination_nav.php';

//THEME CONTENT WIDTH
if ( ! isset( $content_width ) ) {
	$content_width = 750;
}

//THEME POST FORMATS
$formats = array('image','gallery','video','audio','link','quote');
add_theme_support( 'post-formats', $formats );
add_post_type_support( 'post', 'post-formats' );
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

function revalia_theme_support() {

//This theme allows title tag
add_theme_support( 'title-tag' );

//Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

//This theme allows users to set a custom background
add_theme_support( 'custom-background' );

//This theme allows custom header
add_theme_support( 'custom-header' );

//This theme allows Woocommerce
add_theme_support('woocommerce');

}
add_action( 'after_setup_theme', 'revalia_theme_support' );

// This theme languages loade file
add_action('after_setup_theme', 'revalia_lang_setup');
function revalia_lang_setup(){
    load_theme_textdomain('revalia', get_template_directory() . '/languages');
}

// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'primary' 	=> __('Header Menu', 'revalia'),
	'secondary' => __('Mobile Menu', 'revalia'),
));



/*
 * Enqueue Child Scripts & Styles
 */
function revalia_enqueue_scripts_child() {

	if ( ! is_admin() ) {
		wp_register_style( 'revalia-main-child', get_stylesheet_directory_uri().'/style.min.css', array(), 'all' );
		wp_enqueue_style( 'revalia-main-child' );

	}




//THEME EXCERPT
function revalia_clean($excerpt, $substr) {
    $string = strip_tags(do_shortcode($excerpt));
    if ($substr>0) {
      $string = substr($string, 0, $substr);
    }
    return $string.'.';
}

function revalia_string_limit_words($string, $word_limit){
  $words = explode(' ', $string, ($word_limit + 1));

  if(count($words) > $word_limit) {
    array_pop($words);
  }

  return implode(' ', $words);
}

// CATEGORY LABEL BG COLOR
function revalia_category_name_color(){
	$categories = get_the_category( get_the_ID() );
	$catname = $categories[0]->name;
	$class = strtolower($catname);
	$class = str_replace(' ', '-', $class);
	$class = sanitize_title($class);

	$categories_category = "";
	$categories_category = get_the_category( get_the_ID() );
	$categories_firstCategory = $categories_category[0]->cat_ID;
?>
<div class="post-category category-bg-color">
	<span><a  class="cat-color-<?php echo $categories_firstCategory ?>" href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?> "><?php echo esc_html( $categories[0]->name ) ?></a><span>
</div>
<?php }



// NUMBER WORD IN THE EXCERPT
function revalia_new_excerpt_length($length) {
	return 250;
}
add_filter( 'excerpt_length', 'revalia_new_excerpt_length', 999 );


function revalia_new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'revalia_new_excerpt_more');


//POST THUMBNAIL SIZE
add_image_size( 'revalia-post-thumbnail', 1200, 535, true );
add_image_size( 'revalia-post-grid-thumbnail', 720, 580, true );
add_image_size( 'revalia-slider-1col', 1500, 400, true );
add_image_size( 'revalia-slider-1co2', 550, 750, true );
add_image_size( 'revalia-slider-1co3', 640, 450, true );
add_image_size( 'revalia-featured-content-thumbnail', 960, 436, true );
add_image_size( 'revalia-single-thumbnail', 1200, 768, true );
add_image_size( 'revalia-last-category', 127, 70, true );


//POST RELATED SLIDER
function revalia_post_view( $postid )
{
    $count_key = 'revalia_post_views_count';
    $count = get_post_meta( $postid, $count_key, true );
	$count++;
	update_post_meta( $postid, $count_key, $count );
}

function revalia_related_posts()
{
  global $post_id;
	$args = array(
			'post_type' => 'post',
			'posts_per_page' => 6,
			'orderby' => 'rand',
	);
  $query = new WP_Query($args);
 while ( $query->have_posts() ) : $query->the_post();
			if( has_post_thumbnail() ):
			echo '
			<div class="Post-Slider slider-2col related-posts">
				<div class="PostItem">
					'. get_the_post_thumbnail( $post_id, 'revalia-post-thumbnail-square' ) .'
				</div>
				<div class="overlayBox col-slider">
					<div class="post-slider-content text-center">
						<div class="slider-content">
							<div class="title-slider-content">
								<span>'.get_the_time('F jS, Y').'</span>
								<h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			';
		endif;
	endwhile;
	wp_reset_postdata();
}

//revalia LAST POSTS CATEGORY
require_once REVALIA_DIR . '/inc/last-posts-cats.php';

//REGISTER WIDGETS THEME AREA
function revalia_theme_widgets_init() {
register_sidebar( array(
	'name'          => esc_html__( 'Main Sidebar', 'revalia' ),
	'id'            => 'main-sidebar',
	'description'   => esc_html__( 'Main sidebar home and pages', 'revalia' ),
	'before_widget' => '<div class="Sidebar-block"><aside id="%1$s" class="widget widget-Sidebar %2$s">',
	'after_widget'  => '</aside></div>',
	'before_title'  => '<div class="widget_title"><h2>',
	'after_title'   => '</h2></div>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Category Sidebar', 'revalia' ),
	'id'            => 'category-sidebar',
	'description'   => esc_html__( 'Category pages sidebar', 'revalia' ),
	'before_widget' => '<div class="Sidebar-block"><aside id="%1$s" class="widget widget-Sidebar %2$s">',
	'after_widget'  => '</aside></div>',
	'before_title'  => '<div class="widget_title"><h2>',
	'after_title'   => '</h2></div>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Shop Sidebar', 'revalia' ),
	'id'            => 'shop-sidebar',
	'description'   => esc_html__( 'Shop pages sidebar', 'revalia' ),
	'before_widget' => '<div class="Sidebar-block"><aside id="%1$s" class="widget widget-Sidebar %2$s">',
	'after_widget'  => '</aside></div>',
	'before_title'  => '<div class="widget_title"><h2>',
	'after_title'   => '</h2></div>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Footer Instagram', 'revalia' ),
	'id'            => 'footer-instagram',
	'description'   => esc_html__( 'Footer Instagram feed image', 'revalia' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<div class="widget_title"><h2>',
	'after_title'   => '</h2></div>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Footer Widget 1col', 'revalia' ),
	'id'            => 'footer-1col',
	'description'   => esc_html__( 'Sidebar Footer Widget 1col', 'revalia' ),
	'before_widget' => '<aside id="%1$s" class="widget-sidebar-footer %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<div class="widget_title"><h2>',
	'after_title'   => '</h2></div>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Footer Widget 2col', 'revalia' ),
	'id'            => 'footer-2col',
	'description'   => esc_html__( 'Sidebar Footer Widget 2col', 'revalia' ),
	'before_widget' => '<aside id="%1$s" class="widget-sidebar-footer %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<div class="widget_title"><h2>',
	'after_title'   => '</h2></div>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Footer Widget 3col', 'revalia' ),
	'id'            => 'footer-3col',
	'description'   => esc_html__( 'Sidebar Footer Widget 3col', 'revalia' ),
	'before_widget' => '<aside id="%1$s" class="widget-sidebar-footer %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<div class="widget_title"><h2>',
	'after_title'   => '</h2></div>',
) );
}

add_action( 'widgets_init', 'revalia_theme_widgets_init' );


//Enqueue scripts for file uploader
function revalia_media_upload(){
  wp_enqueue_media();
  wp_enqueue_script('adsScript', REVALIA_URL . '/assets/js/media-uploader.js');
}
add_action('admin_enqueue_scripts', 'revalia_media_upload');

// WIDGETS THEME

require_once REVALIA_DIR . "/inc/widgets/revalia-search.php";
require_once REVALIA_DIR . "/inc/widgets/revalia-facebook.php";
require_once REVALIA_DIR . "/inc/widgets/revalia-category-posts.php";
require_once REVALIA_DIR . "/inc/widgets/revalia-social-links.php";
require_once REVALIA_DIR . "/inc/widgets/revalia-video.php";
require_once REVALIA_DIR . "/inc/widgets/revalia-about-me.php";
require_once REVALIA_DIR . "/inc/widgets/revalia-advertising.php";
require_once REVALIA_DIR . "/inc/widgets/revalia-instagram.php";
require_once REVALIA_DIR . "/inc/widgets/revalia-twitter.php";
require_once REVALIA_DIR . "/inc/widgets/revalia-tag.php";


//THEME STYLE AND SCRIPTS FILE

function revalia_ie_conditional_scripts( $tag, $handle ) {
	if ( $handle == 'html5shiv' ) {
		$tag = "<!--[if lt IE 9]>\n" . $tag . "<![endif]-->\n";
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'revalia_ie_conditional_scripts', 10, 2 );

function revalia_stylesheet() {
wp_enqueue_style("bootstrap-css", REVALIA_URL . "/assets/css/bootstrap.min.css", array());
wp_enqueue_style("flexnav-css", REVALIA_URL . "/assets/css/flexnav.css", array());
wp_enqueue_style("animate-css", REVALIA_URL . "/assets/css/animate.css", array());
wp_enqueue_style("font-awesome", REVALIA_URL . "/assets/css/font-awesome.css", array());
wp_enqueue_style("stroke-gap-icons", REVALIA_URL . "/assets/css/Stroke-Gap-Icons.css", array());
wp_enqueue_style("reset-css", REVALIA_URL . "/assets/css/reset.css", array());
wp_enqueue_style("responsive-css", REVALIA_URL . "/assets/css/responsive.css", array());
wp_enqueue_style("owl-carousel-css", REVALIA_URL . "/assets/css/owl.carousel.css", array());
wp_enqueue_style("owl-theme-css", REVALIA_URL . "/assets/css/owl.theme.css", array());
wp_enqueue_style("style-min", REVALIA_URL . "/assets/css/main.css", array());
wp_enqueue_style("style-woocommerce", REVALIA_URL . "/assets/css/woocommerce.css", array());

wp_enqueue_script("bootstrap-min", REVALIA_URL . "/assets/js/bootstrap.min.js", array(), '3.3.4', false);
wp_enqueue_script("html5shiv", REVALIA_URL . "/assets/js/html5shiv.js", array(), REVALIA_THEME_VERSION, false);
wp_enqueue_script("flexnav-min", REVALIA_URL . "/assets/js/jquery.flexnav.js", array(), REVALIA_THEME_VERSION, false);
wp_enqueue_script("sticky-min", REVALIA_URL . "/assets/js/theia-sticky-sidebar.js", array(), REVALIA_THEME_VERSION, false);
wp_enqueue_script("isotope-min", REVALIA_URL . "/assets/js/isotope.pkgd.min.js", array(), REVALIA_THEME_VERSION, false);
wp_enqueue_script("owl-carousel", REVALIA_URL . "/assets/js/owl.carousel.min.js", array(), REVALIA_THEME_VERSION, true);
wp_enqueue_script("modernizr-min", REVALIA_URL . "/assets/js/modernizr.custom.js", array(), REVALIA_THEME_VERSION, true);
wp_enqueue_script("nicescroll-min", REVALIA_URL . "/assets/js/jquery.nicescroll.min.js", array(), REVALIA_THEME_VERSION, true);
wp_enqueue_script("wow-min", REVALIA_URL . "/assets/js/wow.min.js", array(), REVALIA_THEME_VERSION, true);
wp_enqueue_script('custom-script', REVALIA_URL . '/assets/js/custom.js', array(), REVALIA_THEME_VERSION, true);
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action( 'wp_enqueue_scripts', 'revalia_stylesheet' );

	function load_custom_wp_admin_style() {
		wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/admin/revalia-admin.css', false, '1.0.0' );
		wp_enqueue_script( 'colorpicker-js', get_stylesheet_directory_uri() . '/admin/colorpicker.js', array( 'wp-color-picker' ) );
		wp_register_script( 'custom_wp_admin_js', get_template_directory_uri() . '/admin/revalia-admin.js', false, '1.0.0' );

		wp_enqueue_style( 'custom_wp_admin_css' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'custom_wp_admin_js' );
	}
	add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

//THEME COMMENT PAGES COUNT
if ( ! function_exists( 'revalia_comment_nav' ) ) :
function revalia_comment_nav() {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'revalia' ); ?></h3>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'revalia' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'revalia' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div>
	</nav>
	<?php endif; }
endif;

//REVALIA SOCIAL SHARE
if ( ! function_exists( 'revalia_social_share' ) ) :
	function revalia_social_share() {
		$socials = array(
			'facebook',
			'twitter',
			'google',
			'linkedin',
			'pinterest',
		);

		$socials = apply_filters( 'revalia_social_share', $socials ); ?>
		  <div class="social-share">
				<ul>
				<?php if ( in_array( 'facebook', $socials ) ) : ?>
					<li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook"></i><?php echo esc_html('Share', 'revalia'); ?></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'twitter', $socials ) ) : ?>
					<li><a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo the_permalink(); ?>&text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" target="_blank"><i class="fa fa-twitter"></i><?php echo esc_html__( 'Tweet', 'revalia' ) ?></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'google', $socials ) ) : ?>
					<li><a class="google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i><?php echo esc_html('Share', 'revalia'); ?></a></li>
				<?php endif; ?>

				<?php if ( in_array( 'pinterest', $socials ) ) : ?>
					<li><a class="pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo the_permalink(); ?>&description=<?php the_title(); ?>" target="_blank"><i class="fa fa-pinterest"></i><?php echo esc_html__( 'Pin it', 'revalia' ) ?></a></li>
				<?php endif; ?>

				</ul>
			</div>
<?php } endif;

//REVALIA POST COMMENT COUNT
if ( ! function_exists( 'revalia_post_comments_count' ) ) :
	function revalia_post_comments_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			comments_popup_link( __( '<i class="icon icon-MessageRight"></i> 0 COMMENT', 'revalia' ), __( '<i class="icon icon-MessageRight"></i> 1 COMMENT ', 'revalia' ), __( '<i class="icon icon-MessageRight"></i> % COMMENT', 'revalia' ) );
		}
	}
endif;

//REVALIA POST CONTENT VIEWS
function revalia_get_post_views($postID){
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
				delete_post_meta($postID, $count_key);
				add_post_meta($postID, $count_key, '0');
				return 0;
		}
		return $count;
	}

	function revalia_set_post_views($postID) {
	 if (is_single()) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
		 $count = 0;
		 delete_post_meta($postID, $count_key);
		 add_post_meta($postID, $count_key, '0');
		}else{
		 $count++;
		 update_post_meta($postID, $count_key, $count);
		}
	 }
}

//WOOCOMMERCE PAGES

add_filter('loop_shop_columns', 'broden_loop_columns');

if (!function_exists('broden_loop_columns')) {

	function broden_loop_columns() {
		return 3; // 3 products per row
	}
}
