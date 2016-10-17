<?php if ( post_password_required() ) { return;} ?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<div class="Title-Comment">
			<h3>
				<?php comments_number( esc_html__( 'No Comments', 'revalia' ), esc_html__( 'One Comment', 'revalia' ), esc_html( _n( '% Comment', '% Comments', number_format_i18n( get_comments_number() ), 'revalia' ) ) ); ?>
			</h3>
		</div>

		<?php revalia_comment_nav(); ?>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => false,
					'reply_text'        => 'Reply',
					'avatar_size' => 100,
				));
			?>
		</ul>

		<?php revalia_comment_nav(); ?>

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'revalia' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div>
