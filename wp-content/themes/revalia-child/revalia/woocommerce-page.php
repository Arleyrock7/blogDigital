<?php get_header();
global $revalia_codepage; ?>
<!-- Start Featured Boxes -->
<?php if ($revalia_codepage['featured_box_shop'] == 1){ ?>
	<section class="header-slider">
		<div class="container inner-Pages">
			<div class="row">
				<div class="col-md-4 col-xs-12 col-sm-12">
					<?php if (! $revalia_codepage['featured-box-shop-1'][0]['image']): else : ?>
					<div class="home-links">
						<img src="<?php echo esc_url ( $revalia_codepage['featured-box-shop-1'][0]['image']); ?>" alt="<?php echo esc_html ($revalia_codepage['featured-box-shop-1'][0]['description']); ?>">
						<?php if (! $revalia_codepage['featured-box-shop-1'][0]['title']): else : ?>
						<h2><a href="<?php echo esc_url ($revalia_codepage['featured-box-shop-1'][0]['url']) ; ?>"><?php echo esc_html ($revalia_codepage['featured-box-shop-1'][0]['title']) ; ?></a></h2>
						<?php endif ?>
					</div>
					<?php endif ?>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-12">
					<?php if (! $revalia_codepage['featured-box-shop-2'][0]['image']): else : ?>
					<div class="home-links">
						<img src="<?php echo esc_url ( $revalia_codepage['featured-box-shop-2'][0]['image']); ?>" alt="<?php echo esc_html ($revalia_codepage['featured-box-shop-2'][0]['description']); ?>">
						<?php if (! $revalia_codepage['featured-box-shop-2'][0]['title']): else : ?>
						<h2><a href="<?php echo esc_url ($revalia_codepage['featured-box-shop-2'][0]['url']) ; ?>"><?php echo esc_html ($revalia_codepage['featured-box-shop-2'][0]['title']) ; ?></a></h2>
						<?php endif ?>
					</div>
					<?php endif ?>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-12">
					<?php if (! $revalia_codepage['featured-box-shop-3'][0]['image']): else : ?>
					<div class="home-links">
						<img src="<?php echo esc_url ( $revalia_codepage['featured-box-shop-3'][0]['image']); ?>" alt="<?php echo esc_html ($revalia_codepage['featured-box-shop-3'][0]['description']); ?>">
						<?php if (! $revalia_codepage['featured-box-shop-3'][0]['title']): else : ?>
						<h2><a href="<?php echo esc_url ($revalia_codepage['featured-box-shop-3'][0]['url']) ; ?>"><?php echo esc_html ($revalia_codepage['featured-box-shop-3'][0]['title']) ; ?></a></h2>
						<?php endif ?>
					</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</section>
<?php } else {} ?>
<?php if ($revalia_codepage['featured_box_shop'] == 0){ $inner = 'inner'; } elseif ($revalia_codepage['featured_box_shop'] == 1){ $inner = 'inner-Pages';} ?>
<!-- End Featured Boxes -->

 <?php if (have_posts()) : ?>
			<div class="container <?php  echo esc_attr($inner); ?>">
				<div class="main-content col-md-8 col-md-12 col-xs-12">
					<div class="row">
						<?php woocommerce_content(); ?>
					</div>
				</div>
				<!--Sidebar Start-->
				<div class="Sidebar col-md-4 col-sm-12 col-xs-12">
					<div id="widget-area" class="Sidebar-blog">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("shop-sidebar") ) : ?>
						<?php endif; ?>
					</div>
				</div>
				<!--Sidebar End-->
			</div>
<?php endif; ?>
<?php get_footer(); ?>
