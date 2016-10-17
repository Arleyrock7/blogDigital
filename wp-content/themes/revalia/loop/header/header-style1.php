<?php global $revalia_codepage; ?>

<!-- Start Section Header style1 -->
<header class="header-blog header-style1">
	<!-- Start Mobile Navbar -->
	<div class="mobile-topbar visible-sm visible-xs">
		<div class="mobile-icons">
			<div class="sidebar-button">
				<a href="#"><i class="fa fa-navicon"></i></a>
			</div>
			<div class="search-button search-for-mobile">
				<div class="Search-Icon-header">
					<a class="Search-Icon-click" href="#"><i class="fa fa-search"></i></a>
				</div><!-- mobile-search -->
			</div><!-- search-button -->
		</div>
		<div class="logo-aria">
			<div class="col-md-12 text-center">
				<a href="<?php echo esc_url(home_url( '/' )); ?>"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="main-logo" src="<?php echo esc_url($revalia_codepage['header_logo']['url']); ?>"/></a>
			</div>
			<div class="Social-header">
				<ul>
					<?php if (! $revalia_codepage['social_media_facebook']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($revalia_codepage['social_media_facebook']); ?>"><i class="fa fa-facebook"></i></a></li>
					<?php endif ?>
					<?php if (! $revalia_codepage['social_media_twitter']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($revalia_codepage['social_media_twitter']); ?>"><i class="fa fa-twitter"></i></a></li>
					<?php endif ?>
					<?php if (! $revalia_codepage['social_media_google_plus']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($revalia_codepage['social_media_google_plus']);?>"><i class="fa fa-google-plus"></i></a></li>
					<?php endif ?>
					<?php if (! $revalia_codepage['social_media_linkedin']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($revalia_codepage['social_media_linkedin']); ?>"><i class="fa fa-linkedin"></i></a></li>
					<?php endif ?>
					<?php if (! $revalia_codepage['social_media_instagram']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($revalia_codepage['social_media_pinterest']); ?>"><i class="fa fa-instagram"></i></a></li>
					<?php endif ?>
					<?php if (! $revalia_codepage['social_media_pinterest']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($revalia_codepage['social_media_instagram']); ?>"><i class="fa fa-pinterest"></i></a></li>
					<?php endif ?>
					<?php if (! $revalia_codepage['social_media_rss']): ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url($revalia_codepage['social_media_rss']); ?>"><i class="fa fa-rss"></i></a></li>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- End Mobile Navbar -->
	<div class="Navbar-Header visible-lg visible-md">
		<div class="container">
			<div class="row">
				<div class="header-top-nav">
					<div class="col-md-6 Header-Social">
						<div class="Social-header">
							<ul>
								<?php if (! $revalia_codepage['social_media_facebook']): ?>
								<?php else : ?>
									<li><a href="<?php echo esc_url($revalia_codepage['social_media_facebook']); ?>"><i class="fa fa-facebook"></i></a></li>
								<?php endif ?>
								<?php if (! $revalia_codepage['social_media_twitter']): ?>
								<?php else : ?>
									<li><a href="<?php echo esc_url($revalia_codepage['social_media_twitter']); ?>"><i class="fa fa-twitter"></i></a></li>
								<?php endif ?>
								<?php if (! $revalia_codepage['social_media_google_plus']): ?>
								<?php else : ?>
									<li><a href="<?php echo esc_url($revalia_codepage['social_media_google_plus']);?>"><i class="fa fa-google-plus"></i></a></li>
								<?php endif ?>
								<?php if (! $revalia_codepage['social_media_linkedin']): ?>
								<?php else : ?>
									<li><a href="<?php echo esc_url($revalia_codepage['social_media_linkedin']); ?>"><i class="fa fa-linkedin"></i></a></li>
								<?php endif ?>
								<?php if (! $revalia_codepage['social_media_instagram']): ?>
								<?php else : ?>
									<li><a href="<?php echo esc_url($revalia_codepage['social_media_pinterest']); ?>"><i class="fa fa-instagram"></i></a></li>
								<?php endif ?>
								<?php if (! $revalia_codepage['social_media_pinterest']): ?>
								<?php else : ?>
									<li><a href="<?php echo esc_url($revalia_codepage['social_media_instagram']); ?>"><i class="fa fa-pinterest"></i></a></li>
								<?php endif ?>
								<?php if (! $revalia_codepage['social_media_rss']): ?>
								<?php else : ?>
									<li><a href="<?php echo esc_url($revalia_codepage['social_media_rss']); ?>"><i class="fa fa-rss"></i></a></li>
								<?php endif ?>
							</ul>
						</div>
					</div><!-- Header-Social -->
					<div class="col-md-6 Header-Icon">
						<!-- Start Search Area Icon -->
						<div class="search-block">
							<div class="Search-Icon-header">
								<a class="Search-Icon-click" href="#"><i class="fa fa-search"></i></a>
							</div>
						</div>
						<!-- End Search Area Icon -->
						<div class="sidebar-button">
							<a href="#"><i class="fa fa-navicon"></i></a>
						</div><!-- sidebar-button -->
						<?php if($revalia_codepage['header_cart_on_off']=='1'):?>
						<div class="woocommerce-cart-icon">
							<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php echo esc_html__( 'View your shopping cart', 'revalia' ); ?>">
								<div class="total-product"><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></div> <i class="fa fa-shopping-cart"></i>
							</a>
						</div><!-- woocommerce-cart-icon -->
						<?php else:
						endif;?>
				</div>
				</div>
			</div>
			<div class="row">
				<div class="Logo-Header text-center">
					<a href="<?php echo esc_url(home_url( '/' )); ?>"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="main-logo" src="<?php echo esc_url($revalia_codepage['header_logo']['url']); ?>"/></a>
				</div>
			</div>
			<?php if($revalia_codepage['advertising_blog']=='1'):?>
			<!-- Start Navbar Ads -->
			<div class="sidebar-banner-ads text-center">
			<?php $headerad = $revalia_codepage['header_ad'];
				echo do_shortcode($headerad);
			?>
			</div>
			<!-- End Navbar Ads -->
			<?php else:
			endif;?>
			<div class="row">
			<!-- Start Navbar -->
				<div class="top-nav">
					<div id="cssmenu" class="Menu-Header top-menu">
						<div class="menu-button"></div>
						<?php
							wp_nav_menu( array(
								'theme_location'  => 'primary',
								'container'       => false,
								'menu_id'      => 'mianmenu',
								'menu_class'      => 'flexnav one-page',
								'items_wrap' 			=> '<ul data-breakpoint="992" id="%1$s" class="flexnav one-page %2$s">%3$s</ul>',
							) );
						?>
					</div>
				</div>
				<!-- End Navbar -->
			</div>
		</div>
	</div>
	<!-- Start Search Area Form -->
	<div class="Block-Search-header Search-header1">
		<button type="button" class="close-search"></button>
		<div class="form-container">
	    <div class="container">
	      <div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-xl-6 col-xl-offset-3 text-center logo-search">
				<a href="<?php echo esc_url(home_url( '/' )); ?>"><img alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="main-logo" src="<?php echo esc_url($revalia_codepage['header_logo']['url']); ?>"/></a>
			</div>
	        <div class="col-lg-8 col-lg-offset-2 col-xl-6 col-xl-offset-3">
	          <?php get_search_form(); ?>
	          <p>Input your search keywords and press Enter.</p>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- End Search Area Icon-->
</header>
<!-- End Section Header style1 -->
