<?php get_header(); ?>

<!-- Start Home Content -->
<section id="Home-404page">
	<div class="container inner">
		<div class="row">
			<!-- Start 404 Page -->
			<div class="main-content">
				<div class="error-page text-center">
					<h1><?php esc_html_e( 'Oops!', 'revalia' ); ?></h1>
					<h2><?php esc_html_e( 'Something went wrong here', 'revalia' ); ?></h2>
					<p><?php esc_html_e( 'The page you are looking for has not been found.', 'revalia' ); ?></p>
					<a class="btn" href="<?php echo esc_url(home_url( '/' )); ?>"><?php esc_html_e( 'Homepage', 'revalia' ); ?></a>
				</div>
			</div>
			<!-- End 404 Page -->
		</div>
	</div>
</section>
<!-- End Home Content -->

<?php get_footer(); ?>
