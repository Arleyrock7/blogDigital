<?php
add_action( 'widgets_init', 'revalia_widget_about_me' );
function revalia_widget_about_me() {
	register_widget( 'Widget_About_me' );
}
class Widget_About_me extends WP_Widget {
	public function __construct() {
      $widget_ops = array(
        'classname'   => 'about_me_widget',
        'description' => esc_html_x( 'A short description about you.', 'About me widget description', 'revalia' )
      );
      $control_ops = array( 'id_base' => 'about_me_widget' );
      parent::__construct( 'about_me_widget', sprintf( esc_html_x( '%s - About me', 'About me widget name', 'revalia' ), REVALIA_THEME_NAME ), $widget_ops, $control_ops );
   }

	public function widget( $args, $instance ) {
		extract( $args );
		$title          = apply_filters('widget_title', $instance['title'] );
		$my_name        = esc_attr($instance['my_name']);
		$image_id       = esc_attr($instance['image_id']);
		$description    = esc_attr($instance['description']);
		$me_signature   = esc_attr($instance['me_signature']);
		$img_avatar  		= esc_attr($instance['img_avatar']);

		echo wp_kses_post( $args['before_widget'] );
			if ( $title )
			echo $before_title.esc_attr($title).$after_title;
		?>
		<!-- Start widget About -->
		<div class="widget_content">
			<div class="widget_about">
				<?php if ( $img_avatar != '' ) : ?>
				<?php echo "<img alt='".$my_name."' src='".esc_attr($instance['img_avatar'])."'>";?>
				<?php endif; ?>
				<h2><?php echo $my_name?></h2>
				<p><?php echo $description;?></p>
			  <?php if ( $me_signature != '' ) : ?>
				<?php echo "<img class='right-blog' alt='".$my_name."' src='".esc_attr($instance['me_signature'])."'>";?>
				<?php endif; ?>
			</div>
		</div>
		<!-- End widget About -->
	<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ) {
		$instance                	 		= $old_instance;
		$instance['title']       	 		= strip_tags( $new_instance['title'] );
		$instance['my_name']     	 		= $new_instance['my_name'];
		$instance['description'] 			= $new_instance['description'];
		$instance['image_id']     		= $new_instance['image_id'];
		$instance['me_signature'] 		= $new_instance['me_signature'];
		$instance['img_avatar'] 		= $new_instance['img_avatar'];
		return $instance;
	}

	public function form( $instance ) {
		$defaults = array( 'title' => 'About me' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo (isset($instance['title'])?esc_attr($instance['title']):""); ?>" class="widefat" type="text">
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'img_avatar' ); ?>"><?php esc_html_e( 'Avatar :', 'revalia' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'img_avatar' ); ?>" name="<?php echo $this->get_field_name( 'img_avatar' ); ?>" value="<?php echo (isset($instance['img_avatar'])?$instance['img_avatar']:"");?>" class="widefat custom_media_url" type="text" />
			<br></br>
			<input type="button" value="<?php esc_html_e( 'Upload Image', 'revalia' ); ?>" class="button custom_media_upload" id="custom_image_uploader"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'my_name' ); ?>"><?php esc_html_e( 'Your name:', 'revalia' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'my_name' ); ?>" name="<?php echo $this->get_field_name( 'my_name' ); ?>" value="<?php echo (isset($instance['my_name'])?esc_attr($instance['my_name']):""); ?>" class="widefat" type="text">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php esc_html_e( 'Description:', 'revalia' ); ?></label>
			<textarea id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" class="widefat"><?php echo (isset($instance['description'])?esc_attr($instance['description']):""); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'me_signature' ); ?>"><?php esc_html_e( 'Your signature :', 'revalia' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'me_signature' ); ?>" name="<?php echo $this->get_field_name( 'me_signature' ); ?>" value="<?php echo (isset($instance['me_signature'])?$instance['me_signature']:"");?>" class="widefat custom_media_url_sign" type="text" />
			<br></br>
			<input type="button" value="<?php esc_html_e( 'Upload Image', 'revalia' ); ?>" class="button custom_media_upload_sign" id="custom_image_uploader_signature"/>
		</p>

	<?php
	}
}
