<div class="container inner-img">
	<div class="row">
		<div class="Page-title-content">
			<div class="col-sm-12 text-center">
				<div class="title-text">
					<?php
						the_archive_title( '<h2 class="page-title">', '</h2>' );
						the_archive_description( '<span class="breadcrumbs">', '</span>' );
					?>
					<?php codepages_breadcrumb(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
