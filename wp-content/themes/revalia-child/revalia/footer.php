<?php global $revalia_codepage; ?>

</div><!-- #page -->

<!-- Start Footer -->
<?php
	if ( isset($revalia_codepage['widget_footer_position']) && $revalia_codepage['widget_footer_position'] ){
		if ( isset( $_REQUEST['widget-footer-position'] ) ) {
			$revalia_layoutFooter = esc_attr($_REQUEST['widget-footer-position']);
		}else {
			$revalia_layoutFooter = esc_attr($revalia_codepage['widget_footer_position']);
		}
	}

	if ( isset($revalia_codepage['widget_footer']) && $revalia_codepage['widget_footer'] ){
		global $widgetFooter;
		if ( isset( $_REQUEST['widget-footer'] ) ) {
			$widgetFooter = esc_attr($_REQUEST['widget-footer']);
		}else {
			$widgetFooter = esc_attr($revalia_codepage['widget_footer']);
		}
	}
	global $widgetFooter;
	if ($revalia_layoutFooter == 'top_footer' && $widgetFooter == 1 ){ ?>
	<footer id="top_footer" class="footer">
		<div class="container">
			<div class="inner-Pages">
				<div class="row">
					<div class="col-md-4 col-sm-12 footer-widget">
						<?php dynamic_sidebar('Footer Widget 1col'); ?>
					</div> <!-- /.footer 1 -->
					<div class="col-md-4 col-sm-12 footer-widget">
						<?php dynamic_sidebar('Footer Widget 2col'); ?>
					</div> <!-- /.footer 2 -->
					<div class="col-md-4 col-sm-12 footer-widget">
						<?php dynamic_sidebar('Footer Widget 3col'); ?>
					</div> <!-- /.footer 3 -->
				</div><!-- row end -->
			</div><!-- Container end -->
		</div><!-- Container end -->
	</footer>
<?php } ?>

<div class="widget-instagram_footer text-center">
	<?php dynamic_sidebar('Footer Instagram'); ?>
</div>

<?php if ($revalia_layoutFooter == 'bottom_footer' && $widgetFooter == 1){ ?>
	<footer id="bottom_footer" class="footer">
		<div class="container">
			<div class="inner-Pages">
				<div class="row">
					<div class="col-md-4 col-sm-12 footer-widget">
						<?php dynamic_sidebar('Footer Widget 1col'); ?>
					</div> <!-- /.footer 1 -->
					<div class="col-md-4 col-sm-12 footer-widget">
						<?php dynamic_sidebar('Footer Widget 2col'); ?>
					</div> <!-- /.footer 2 -->
					<div class="col-md-4 col-sm-12 footer-widget">
						<?php dynamic_sidebar('Footer Widget 3col'); ?>
					</div> <!-- /.footer 3 -->
				</div><!-- row end -->
			</div><!-- Container end -->
		</div><!-- Container end -->
	</footer>
<?php } ?>

<div id="footer">
	<div class="container inner-f">
  	<div class="row">
			<div class="col-md-12 text-center">
				<div class="copyright">
					<div class="text-center"><?php echo ( $revalia_codepage['credit_txt'] );?></div>
				</div>
				<div class="socialfollow">
					<?php if (! $revalia_codepage['social_media_facebook']): ?>
					<?php else : ?>
						<a href="<?php echo esc_url($revalia_codepage['social_media_facebook']); ?>"><i class="fa fa-facebook"></i></a>
					<?php endif ?>
					<?php if (! $revalia_codepage['social_media_twitter']): ?>
					<?php else : ?>
						<a href="<?php echo esc_url($revalia_codepage['social_media_twitter']); ?>"><i class="fa fa-twitter"></i></a>
					<?php endif ?>
					<?php if (! $revalia_codepage['social_media_google_plus']): ?>
					<?php else : ?>
						<a href="<?php echo esc_url($revalia_codepage['social_media_google_plus']);?>"><i class="fa fa-google-plus"></i></a>
					<?php endif ?>
					<?php if (! $revalia_codepage['social_media_linkedin']): ?>
					<?php else : ?>
						<a href="<?php echo esc_url($revalia_codepage['social_media_linkedin']); ?>"><i class="fa fa-linkedin"></i></a>
					<?php endif ?>
					<?php if (! $revalia_codepage['social_media_instagram']): ?>
					<?php else : ?>
						<a href="<?php echo esc_url($revalia_codepage['social_media_pinterest']); ?>"><i class="fa fa-instagram"></i></a>
					<?php endif ?>
					<?php if (! $revalia_codepage['social_media_pinterest']): ?>
					<?php else : ?>
						<a href="<?php echo esc_url($revalia_codepage['social_media_instagram']); ?>"><i class="fa fa-pinterest"></i></a>
					<?php endif ?>
					<?php if (! $revalia_codepage['social_media_rss']): ?>
					<?php else : ?>
						<a href="<?php echo esc_url($revalia_codepage['social_media_rss']); ?>"><i class="fa fa-rss"></i></a>
					<?php endif ?>
				</div>
			</div>
		</div>
  </div>
</div>

<!-- End Footer -->

<!-- Back to top Link -->
<?php if ($revalia_codepage['page_scroll_up'] == 1){?>
	<div id="to-top" class="main-bg"><span class="fa fa-chevron-up"></span></div>
<?php } ?>

<!-- Placed at the end of the document so the pages load faster -->

<?php wp_footer(); ?>

</body>
</html>
