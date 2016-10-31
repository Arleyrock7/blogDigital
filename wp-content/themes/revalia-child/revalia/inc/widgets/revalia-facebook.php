<?php
add_action( 'widgets_init', 'widget_facebook_widget' );
function widget_facebook_widget() {
	register_widget( 'Widget_Facebook' );
}
class Widget_Facebook extends WP_Widget {
	public function __construct() {
			$widget_ops = array(
				'classname'   => 'facebook-widget',
				'description' => esc_html_x( 'A short description about you.', 'Facebook widget description', 'revalia' )
			);
			$control_ops = array( 'id_base' => 'facebook-widget' );
			parent::__construct( 'facebook-widget', sprintf( esc_html_x( '%s - Facebook', 'Facebook widget name', 'revalia' ), REVALIA_THEME_NAME ), $widget_ops, $control_ops );
	 }

	public function widget( $args, $instance ) {
		extract( $args );
		$title		   = apply_filters('widget_title', $instance['title'] );
		$facebook_link = esc_url($instance['facebook_link']);
		$width         = esc_attr($instance['width']);
		$height        = esc_attr($instance['height']);

		echo wp_kses_post( $args['before_widget'] );
			if ( $title )
				echo $before_title.esc_attr($title).$after_title;?>
			<div class="facebook_widget">
			    <iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $facebook_link ; ?>&amp;width=<?php echo $width ; ?>&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=<?php echo $height ; ?>" style="border:none; overflow:hidden; width:<?php echo $width; ?>px; height:215px;"></iframe>
			</div>
		<?php echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ) {
		$instance				   = $old_instance;
		$instance['title']		   = strip_tags( $new_instance['title'] );
		$instance['facebook_link'] = $new_instance['facebook_link'];
		$instance['width']         = $new_instance['width'];
		$instance['height']        = $new_instance['height'];
		return $instance;
	}

	public function form( $instance ) {
		$defaults = array( 'title' => 'Facebook','facebook_link' => 'www.facebook.com/CodeThePage/','width' => '300','height' => '250' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title :' , 'revalia'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo (isset($instance['title'])?esc_attr($instance['title']):""); ?>" class="widefat" type="text">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook_link' ); ?>"><?php esc_html_e('Facebook link :' , 'revalia'); ?></label>
			<input id="<?php echo $this->get_field_id( 'facebook_link' ); ?>" name="<?php echo $this->get_field_name( 'facebook_link' ); ?>" value="<?php echo (isset($instance['facebook_link'])?esc_attr($instance['facebook_link']):""); ?>" class="widefat" type="text">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php esc_html_e('Width :' , 'revalia'); ?></label>
			<input id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo (isset($instance['width'])?(int)$instance['width']:""); ?>" size="3" type="text">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php esc_html_e('Height :' , 'revalia'); ?></label>
			<input id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo (isset($instance['height'])?(int)$instance['height']:""); ?>" size="3" type="text">
		</p>
	<?php
	}
}
