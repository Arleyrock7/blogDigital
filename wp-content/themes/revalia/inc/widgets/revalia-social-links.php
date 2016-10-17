<?php

add_action( 'widgets_init', 'widget_social_widget' );
function widget_social_widget() {
	register_widget( 'Widget_social_links' );
}
class Widget_social_links extends WP_Widget {
	public function __construct() {
			$widget_ops = array(
				'classname'   => 'widget_social_widget',
				'description' => esc_html_x( 'A short description about you.', 'Tag Cloud widget description', 'revalia' )
			);
			$control_ops = array( 'id_base' => 'widget_social_widget' );
			parent::__construct( 'widget_social_widget', sprintf( esc_html_x( '%s - Social Links', 'Social Links widget name', 'revalia' ), REVALIA_THEME_NAME ), $widget_ops, $control_ops );
	 }

	public function widget( $args, $instance ) {
		extract( $args );
		$title          = apply_filters('widget_title', $instance['title'] );
		$facebooklink         = esc_attr($instance['facebooklink']);
		$twitterlink          = esc_attr($instance['twitterlink']);
		$instagramlink        = esc_attr($instance['instagramlink']);
		$pinterestlink        = esc_attr($instance['pinterestlink']);
		$googlepluslink       = esc_attr($instance['googlepluslink']);

		echo wp_kses_post( $args['before_widget'] );
			if ( $title )
			echo $before_title.esc_attr($title).$after_title;
		?>
		<!-- Start widget Follow -->
		<div class="widget_content">
			<div class="widget-follow">
				<ul>
					<?php if ( $facebooklink != '' ) : ?>
					<li><a href="<?php echo esc_url ($facebooklink) ?>"><i class="fa fa-facebook"></i></a></li>
					<?php endif; ?>
					<?php if ( $twitterlink != '' ) : ?>
					<li><a href="<?php echo esc_url ($twitterlink) ?>"><i class="fa fa-twitter"></i></a></li>
					<?php endif; ?>
					<?php if ( $instagramlink != '' ) : ?>
					<li><a href="<?php echo esc_url ($instagramlink) ?>"><i class="fa fa-instagram"></i></a></li>
					<?php endif; ?>
					<?php if ( $googlepluslink != '' ) : ?>
					<li><a href="<?php echo esc_url ($googlepluslink) ?>"><i class="fa fa-google-plus"></i></a></li>
					<?php endif; ?>
					<?php if ( $pinterestlink != '' ) : ?>
					<li><a href="<?php echo esc_url ($pinterestlink) ?>"><i class="fa fa-pinterest"></i></a></li>
					<?php endif; ?>					
				</ul>
			</div>
		</div>
		<!-- End widget Follow -->

	<?php

		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ) {
		$instance                 = $old_instance;
		$instance['title']        = strip_tags( $new_instance['title'] );
		$instance['facebooklink']  = $new_instance['facebooklink'];
		$instance['twitterlink']     = $new_instance['twitterlink'];
		$instance['instagramlink']     = $new_instance['instagramlink'];
		$instance['pinterestlink']      = $new_instance['pinterestlink'];
		$instance['googlepluslink'] = $new_instance['googlepluslink'];
		return $instance;
	}

	public function form( $instance ) {
		$defaults = array( 'title' => 'SUBSCRIBE & FOLLOW' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'revalia' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo (isset($instance['title'])?esc_attr($instance['title']):""); ?>" class="widefat" type="text">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'facebooklink' ); ?>"><?php esc_html_e( 'Facebook Link:', 'revalia' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'facebooklink' ); ?>" name="<?php echo $this->get_field_name( 'facebooklink' ); ?>" value="<?php echo (isset($instance['facebooklink'])?esc_attr($instance['facebooklink']):""); ?>" class="widefat" type="text">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'twitterlink' ); ?>"><?php esc_html_e( 'Twitter Link:', 'revalia' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'twitterlink' ); ?>" name="<?php echo $this->get_field_name( 'twitterlink' ); ?>" value="<?php echo (isset($instance['twitterlink'])?esc_attr($instance['twitterlink']):""); ?>" class="widefat" type="text">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'instagramlink' ); ?>"><?php esc_html_e( 'Instagram Link:', 'revalia' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'instagramlink' ); ?>" name="<?php echo $this->get_field_name( 'instagramlink' ); ?>" value="<?php echo (isset($instance['instagramlink'])?esc_attr($instance['instagramlink']):""); ?>" class="widefat" type="text">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'pinterestlink' ); ?>"><?php esc_html_e( 'Pinterest Link:', 'revalia' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'pinterestlink' ); ?>" name="<?php echo $this->get_field_name( 'pinterestlink' ); ?>" value="<?php echo (isset($instance['pinterestlink'])?esc_attr($instance['pinterestlink']):""); ?>" class="widefat" type="text">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'googlepluslink' ); ?>"><?php esc_html_e( 'Google Plus Link:', 'revalia' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'googlepluslink' ); ?>" name="<?php echo $this->get_field_name( 'googlepluslink' ); ?>" value="<?php echo (isset($instance['googlepluslink'])?esc_attr($instance['googlepluslink']):""); ?>" class="widefat" type="text">
		</p>

	<?php
	}
}
