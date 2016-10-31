<?php get_header();
/* Template Name:  Contact Template */
 ?>

<!-- Start Page Banner Title -->
<?php if ($revalia_codepage['page_banner_title'] == 1){?>
	<?php if (!is_home()) { ?>
		<section id="Page-title" class="Page-title" style="background-image:url(<?php echo esc_url($revalia_codepage['bg_page_title']['background-image']);?>); background-size:<?php echo ($revalia_codepage['bg_page_title']['background-size']);?> ;background-position: <?php echo ($revalia_codepage['bg_page_title']['background-position']);?>;background-repeat: <?php echo ($revalia_codepage['bg_page_title']['background-repeat']);?>;">
			<div class="color-overlay" style="background-color: <?php echo ($revalia_codepage['overlay_page_color']['rgba']); ?> "></div>
			<?php get_template_part( 'loop/part/page-banner-title' ); ?>
		</section>
	<?php } ?>
 <?php } else {} ?>
<!-- End Page Banner Title -->

<!-- Start Featured Boxes -->
<?php if ($revalia_codepage['featured_box_pages'] == 1){ ?>
	<section class="header-slider">
		<div class="container inner-Pages">
			<div class="row">
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="home-links">
						<img src="<?php echo esc_html ( $revalia_codepage['featured-box-1'][0]['image']); ?>" alt="<?php echo esc_attr ($revalia_codepage['featured-box-1'][0]['description']); ?>">
						<h2><a href="<?php echo esc_url ($revalia_codepage['featured-box-1'][0]['url']) ; ?>"><?php echo esc_html ($revalia_codepage['featured-box-1'][0]['title']) ; ?></a></h2>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="home-links">
						<img src="<?php echo esc_html ($revalia_codepage['featured-box-2'][0]['image'] ); ?>" alt="<?php echo esc_attr ($revalia_codepage['featured-box-2'][0]['description']) ; ?>">
						<h2><a href="<?php echo esc_url ($revalia_codepage['featured-box-2'][0]['url']) ; ?>"><?php echo esc_html ($revalia_codepage['featured-box-2'][0]['title']) ; ?></a></h2>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="home-links">
						<img src="<?php echo esc_html ( $revalia_codepage['featured-box-3'][0]['image']); ?>" alt="<?php echo esc_html ( $revalia_codepage['featured-box-3'][0]['description'] ); ?>">
						<h2><a href="<?php echo esc_url ($revalia_codepage['featured-box-3'][0]['url']) ; ?>"><?php echo esc_html ($revalia_codepage['featured-box-3'][0]['title']) ; ?></a></h2>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } else {} ?>
<?php if ($revalia_codepage['featured_box_pages'] == 0){ $inner = 'inner'; } elseif ($revalia_codepage['featured_box_pages'] == 1){ $inner = 'inner-Pages';} ?>
<!-- End Featured Boxes -->

<!-- Start category Content -->
<section id="Category-Posts">
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
			?>

			<?php
				if ($revalia_layoutsidbar == 'fullwidth' ){ $class = 'col-md-12'; }
				if ($revalia_layoutsidbar == 'left_sidebar' || $revalia_layoutsidbar == 'right_sidebar') { $class = 'col-md-8';}
			?>

			<!-- Start Layout Post -->
			<div class="main-content <?php  echo esc_attr($class); ?> <?php $offset = 'col-md-offset-2'; if ( $revalia_codepage['layout_post'] == 'stander' && $revalia_codepage['layout_sidebar'] == 'fullwidth' || $revalia_codepage['layout_post'] == 'list' && $revalia_codepage['layout_sidebar'] == 'fullwidth'){ echo esc_attr($offset);}?>">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div id="Map-Style">
						<div id="map_canvas"></div>
            <?php $protocol = is_ssl() ? 'https' : 'http';?>

						<script type="text/javascript" async defer src="<?php echo esc_attr ($protocol) ?>://maps.googleapis.com/maps/api/js?key=AIzaSyAw7KAgYMKLMJiAkVBEqdPo47YMEHuEY88&callback=initMap"></script>
						<script>
						// This example displays a marker at the center of Australia.
						// When the user clicks the marker, an info window opens.
            jQuery(document).ready(function($) {
						function initialize() {
						  var myLatlng = new google.maps.LatLng(<?php echo get_post_meta( get_the_ID(), 'contant_map', true ); ?>);
						  var mapOptions = {
  							zoom: 10,
  							center: myLatlng,
							  zoomControl: false,
							  scaleControl: false,
							  scrollwheel: false,
							  disableDoubleClickZoom: true,
						  };
						  var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
						  var contentString = '<div id="Map-Marker">'+
							  '<h3><?php echo get_post_meta( get_the_ID(), 'markmap_text', true ); ?></h3><p><?php echo get_post_meta( get_the_ID(), 'markmap_textarea', true ); ?></p>'+
							  '</div>';
						  var infowindow = new google.maps.InfoWindow({
							  content: contentString
						  });
						  var marker = new google.maps.Marker({
							  position: myLatlng,
							  map: map,
							  title: 'Uluru (Ayers Rock)'
						  });
						  google.maps.event.addListener(marker, 'click', function() {
							infowindow.open(map,marker);
						  });
						}
						google.maps.event.addDomListener(window, 'load', initialize);
            });
						</script>
					</div>

          <div class="entry-content">
            <?php the_content(); ?>
            <?php
              wp_link_pages( array(
                'before'   => '<div class="pagination"><span class="page-numbers title">' . esc_html__( 'Pages:', 'revalia' ) . '</span>',
                'after'    => '</div>',
                'pagelink' => '%'
              ) );
            ?>
          </div>

          <?php get_template_part("loop/part/post-author"); ?>

					<?php comments_template(); ?>

				<?php endwhile; endif; ?>
			</div>
			<!-- End Layout Post -->

			<?php if ($revalia_layoutsidbar == 'right_sidebar'){ get_sidebar(); } ?>
		</div>
	</div>
</section>
<!-- End category Content -->

<?php get_footer(); ?>
