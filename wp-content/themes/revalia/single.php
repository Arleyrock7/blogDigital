<?php get_header();
global $revalia_codepage;
revalia_set_post_views($post->ID);
$views = revalia_get_post_views(get_the_ID());
$header_post_codepage = get_post_meta( get_the_ID(), 'header_single', true );
?>

<!-- Start Featured Boxes -->
<?php if ($revalia_codepage['featured_box_single_blog'] == 1){?>
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
<!-- End Featured Boxes -->

<?php if ($revalia_codepage['featured_box_single_blog'] == 0){ $inner = 'inner-Pages'; } elseif ($revalia_codepage['featured_box_single_blog'] == 1){ $inner = 'inner-Pages';} ?>

<?php if ( $header_post_codepage == 'header_single_style2' ){ ?>
<div id="single-post-style">
	<a class="post-img-single" href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail( 'revalia-slider-1col' ); ?></a>
	<div class="post-header-style2 text-center">
		<div class="container inner-single">
			<?php while ( have_posts()): the_post(); revalia_post_view( get_the_ID() ); ?>
				<div class="post-header">
					<div class="post-details">
						<div class="post-cat">
							<?php revalia_category_name_color(); ?>
						</div><!-- post-cat -->
						<div class="post-share">
							<?php revalia_social_share(); ?>
						</div><!-- post-shear -->
					</div><!-- post-inwrap -->
					<div class="post-title">
						<?php the_title('<h2 class="entry-title" itemprop="name headline">', '</h2>'); ?>
					</div><!-- post-title -->
					<div class="post-meta-box">
						<ul class="post-meta no-sep">
							<li class="post-date"><?php revalia_post_comments_count(); ?></li>
							<li class="post-date"><i class="icon icon-Time"></i><?php the_time( get_option('date_format') ); ?></li>
							<li class="post-date"><i class="icon icon-Eye"></i><?php echo ($views); ?> <?php echo esc_html__('Views', 'revalia'); ?></li>
							<li class="post-date"><i class="icon icon-User"></i>By : <?php the_author_posts_link(); ?></li>
						</ul>
					</div><!-- post-meta -->
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
 <?php } else { } ?>

<div class="single-page">
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
				if ($revalia_layoutsidbar == 'fullwidth'){ $class = 'col-md-offset-2'; }
			?>

			<!-- Start Layout Post -->
			<div class="main-content page-post single-post col-md-8 <?php  echo esc_attr($class); ?>">
				<?php while ( have_posts()): the_post(); revalia_post_view( get_the_ID() ); ?>
				<div class="blog-post-single">
					<div id="post-<?php the_ID(); ?>" <?php post_class('content-block'); ?>>
						<?php if ( $header_post_codepage == 'header_single_style1'){ ?>
						<div class="post-header">
							<div class="post-details">
								<div class="post-cat">
									<?php revalia_category_name_color(); ?>
								</div><!-- post-cat -->
								<div class="post-share">
									<?php revalia_social_share(); ?>
								</div><!-- post-shear -->
							</div><!-- post-inwrap -->
							<div class="post-title">
								<?php the_title('<h2 class="entry-title" itemprop="name headline">', '</h2>'); ?>
							</div><!-- post-title -->
							<div class="post-meta-box">
								<ul class="post-meta no-sep">
									<li class="post-date"><?php revalia_post_comments_count(); ?></li>
									<li class="post-date"><i class="icon icon-Time"></i><?php the_time( get_option('date_format') ); ?></li>
									<li class="post-date"><i class="icon icon-Eye"></i><?php echo ($views); ?> <?php echo esc_html__('Views', 'revalia'); ?></li>
									<li class="post-date"><i class="icon icon-User"></i>By : <?php the_author_posts_link(); ?></li>
								</ul>
							</div><!-- post-meta -->
						</div>
						<div class="post-footer">
							<?php the_post_thumbnail('revalia-featured-content-thumbnail', array('itemprop'=>'image')); ?>
							<?php get_template_part( 'loop/post-format/content', get_post_format() ); ?>
						</div>
						<?php } else { ?>
						<div class="post-footer">
							<?php the_post_thumbnail('revalia-featured-content-thumbnail', array('itemprop'=>'image')); ?>
							<?php get_template_part( 'loop/post-format/content', get_post_format() ); ?>
						</div>
						<?php } ?>
						<div class="content-single">
							<?php the_content();
								wp_link_pages( array(
									'before'   => '<div class="pagination"><span class="page-numbers title">' . esc_html__( 'Pages:', 'revalia' ) . '</span>',
									'after'    => '</div>',
									'pagelink' => '%'
								) );
							?>
						</div>
						<div class="post-tags">
							<div class="tagcloud">
								<?php the_tags( '<i class="icon icon-Tag"></i>', ', ', '<br />' ); ?>
							</div>
						</div>
						<?php codepages_content_nav( 'nav-posts' ); ?>
					</div>

					<?php get_template_part("loop/part/post-author"); ?>

					<?php if ($revalia_codepage['related_box_single_blog'] == 1){?>
						<?php get_template_part("loop/part/post-related"); ?>
					<?php } else {} ?>
				</div>
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif; ?>
				<?php endwhile;?>
			</div>
			<!-- End Layout Post -->

			<?php if ($revalia_layoutsidbar == 'right_sidebar'){ get_sidebar(); } ?>

		</div>
	</div>
</div>
<?php get_footer();?>
