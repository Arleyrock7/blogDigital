<!-- Start Layout Sidebar -->
<div class="col-md-4 Sidebar">
	<?php if ( is_active_sidebar( 'main-sidebar' ) ) { ?>
	<div id="widget-area" class="Sidebar-blog">
		<?php dynamic_sidebar( 'main-sidebar' ); ?>
	</div><!-- Sidebar blog -->
	<?php } ?>
</div>
<!-- End Layout Sidebar -->
