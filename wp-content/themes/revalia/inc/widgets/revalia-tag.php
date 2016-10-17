<?php

class revalia_tags extends WP_Widget {
	public function __construct() {
			$widget_ops = array(
				'classname'   => 'revalia_tags',
				'description' => esc_html_x( 'A short description about you.', 'Tag Cloud widget description', 'revalia' )
			);
			$control_ops = array( 'id_base' => 'revalia_tags' );
			parent::__construct( 'revalia_tags', sprintf( esc_html_x( '%s - Tag Cloud', 'Tag Cloud widget name', 'revalia' ), REVALIA_THEME_NAME ), $widget_ops, $control_ops );
	 }

	public function widget( $args, $instance ) {
		extract( $args );

		echo wp_kses_post( $args['before_widget'] );

		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		};
		$tags = get_tags();
		?>
			<div class="Sidebar-tags">
				<div class="widget_title">
					<h2><?php echo esc_attr( $instance['title'] ); ?></h2>
				</div>
				<div class="widget_content">
					<div class="widget-tags">
						<div class="tags">
							<ul>
								<?php
									foreach ( $tags as $tag ):
										$tag_link = get_tag_link( $tag->term_id );
								?>
								<li><a href="<?php echo $tag_link ; ?>"><?php echo $tag->name; ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div><!-- .item-tags -->
					</div>
				</div>
			</div><!-- .blog-tags -->
		<?php

		echo wp_kses_post( $args['after_widget'] );

	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	public function form($instance) {
		$instance = wp_parse_args( (array) $instance, array('title'=>'Tags') );
		$title = strip_tags($instance['title']);
    ?>
    	<p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Widget title', 'revalia'); ?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
    <?php
	}
}

function revalia_tags_widget() {
	register_widget( 'revalia_tags' );
}
add_action( 'widgets_init', 'revalia_tags_widget' );
