<?php global $revalia_codepage; ?>
<div class="sidebar-navigation">
	<div class="sidebar-scroll scrollbar-macosx">

		<div class="close-sidebar-button">
			<a href="#" class="close-btn"><span>Close Sidebar</span><i class="fa fa-close"></i></a>
		</div><!-- close-sidebar-button -->
		<div class="sidebar-logo">
			<div class="brand-logo">
				<a href="<?php echo esc_url(home_url( '/' )); ?>">
					<img alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="main-logo" src="<?php echo esc_url($revalia_codepage['header_logo']['url']); ?>"/>
				</a>
			</div>
		</div>

		<nav class="navbar">
			<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'menu_class' => 'mobile-menu') ); ?>
		</nav><!-- navbar -->
		<?php if($revalia_codepage['advertising_blog']=='1'):?>
		<!-- Start Navbar Ads -->
		<div class="sidebar-banner-ads text-center">
		<?php $headerad = $revalia_codepage['side_ad'];
			echo do_shortcode($headerad);
		?>
		</div>
		<!-- End Navbar Ads -->
		<?php else:
		endif;?>
		<div class="sidebar-social">
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
		</div><!-- sidebar-social -->

		<div class="copyright">
			<?php if (! $revalia_codepage['credit_txt']): ?>
				<div class="text-center"><p>2015 ALL RIGHT RESERVED - <span>REVALIA</span> Wordpress Theme</p></div>
			<?php else : ?>
				<?php echo ( $revalia_codepage['credit_txt'] );?>
			<?php endif ?>
		</div><!-- copyright -->
	</div><!-- sidebar-scroll -->
</div><!-- sidebar-navigation -->

<div class="sidebar-overlay close-btn"></div>
