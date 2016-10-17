<?php get_header(); ?>
<?php global $revalia_codepage; ?>

<!-- Start Page Banner Title -->
<?php if ($revalia_codepage['page_banner_title'] == 1){?>
	<?php if (!is_home()) { ?>
		<?php if ( isset($revalia_codepage['bg_page_title']['background-image'] ) && $revalia_codepage['bg_page_title']['background-image'] ){?>
		<section id="Page-title" class="Page-title" style="background-image:url(<?php echo ($revalia_codepage['bg_page_title']['background-image']);?>); background-size:<?php echo ($revalia_codepage['bg_page_title']['background-size']);?> ;background-position: <?php echo ($revalia_codepage['bg_page_title']['background-position']);?>;background-repeat: <?php echo ($revalia_codepage['bg_page_title']['background-repeat']);?>;">
		<?php } else { ?>
		<section id="Page-title" class="Page-title">
		<?php } ?>
			<?php if ( isset($revalia_codepage['overlay_page_color']['rgba']) && $revalia_codepage['overlay_page_color']['rgba'] ){?>
				<div class="color-overlay" style="background-color: <?php echo ($revalia_codepage['overlay_page_color']['rgba']); ?> "></div>
			<?php } else { ?>
				<div class="color-overlay"></div>
			<?php } ?>
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
						<img src="<?php echo esc_url( $revalia_codepage['featured-box-1'][0]['image']); ?>" alt="<?php echo esc_html($revalia_codepage['featured-box-1'][0]['description']); ?>">
						<h2><a href="<?php echo esc_url($revalia_codepage['featured-box-1'][0]['url']) ; ?>"><?php echo esc_html ($revalia_codepage['featured-box-1'][0]['title']); ?></a></h2>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="home-links">
						<img src="<?php echo esc_url($revalia_codepage['featured-box-2'][0]['image'] ); ?>" alt="<?php echo esc_html($revalia_codepage['featured-box-2'][0]['description']); ?>">
						<h2><a href="<?php echo esc_url($revalia_codepage['featured-box-2'][0]['url']) ; ?>"><?php echo esc_html($revalia_codepage['featured-box-2'][0]['title']); ?></a></h2>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="home-links">
						<img src="<?php echo esc_url($revalia_codepage['featured-box-3'][0]['image']); ?>" alt="<?php echo esc_html($revalia_codepage['featured-box-3'][0]['description']); ?>">
						<h2><a href="<?php echo esc_url($revalia_codepage['featured-box-3'][0]['url']) ; ?>"><?php echo esc_html($revalia_codepage['featured-box-3'][0]['title']); ?></a></h2>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } else {} ?>
<?php if ($revalia_codepage['featured_box_pages'] == 0){ $inner = 'inner'; } elseif ($revalia_codepage['featured_box_pages'] == 1){ $inner = 'inner-Pages';} ?>
<!-- End Featured Boxes -->

<!-- Start pages Content -->
<div id="Pages-content">
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
			<div class="main-content <?php  echo esc_attr($class); ?>">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
					</div>

					<?php comments_template(); ?>

				<?php endwhile; endif; ?>
			</div>
			<!-- End Layout Post -->

			<?php if ($revalia_layoutsidbar == 'right_sidebar'){ get_sidebar(); } ?>
		</div>
	</div>
</div>
<!-- End pages Content -->

<?php get_footer(); ?>
