<?php get_header(); ?>
			<!-- Start Page Banner Title -->
			<?php if ($revalia_codepage['page_banner_title'] == 1){?>
					<div id="Page-title" class="Page-title" style="background-image:url(<?php echo ($revalia_codepage['bg_page_title']['background-image']);?>); background-size:<?php echo ($revalia_codepage['bg_page_title']['background-size']);?> ;background-position: <?php echo ($revalia_codepage['bg_page_title']['background-position']);?>;background-repeat: <?php echo ($revalia_codepage['bg_page_title']['background-repeat']);?>;">
						<div class="color-overlay" style="background-color: <?php echo ($revalia_codepage['overlay_page_color']['rgba']); ?> "></div>
						<div class="container">
							<div class="category-content text-center">
								<?php
									echo '<p>'.esc_html__( 'Search Results', 'revalia' ).'</p>';
									echo ( '<h2>' . get_search_query() . '</h2>' );
								?>
							</div>
						</div><!-- container -->
					</div>
			 <?php } else {} ?>
			<!-- End Page Banner Title -->

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
			<!-- Start Home Content -->
			<div id="Search-Posts">
				<div class="container inner">
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
							<?php if ( have_posts() ) : ?>
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

<?php get_footer(); ?>
