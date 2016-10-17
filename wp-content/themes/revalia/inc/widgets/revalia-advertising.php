<?php
add_action( 'widgets_init', 'widget_adv_widget' );
function widget_adv_widget() {
	register_widget( 'Widget_Adv' );
}
class Widget_Adv extends WP_Widget {
	public function __construct() {
      $widget_ops = array(
        'classname'   => 'widget_adv_widget',
        'description' => esc_html_x( 'A short description about you.', 'Advertising widget description', 'revalia' )
      );
      $control_ops = array( 'id_base' => 'widget_adv_widget' );
      parent::__construct( 'widget_adv_widget', sprintf( esc_html_x( '%s - Advertising', 'Advertising widget name', 'revalia' ), REVALIA_THEME_NAME ), $widget_ops, $control_ops );
   }

	public function widget( $args, $instance ) {
		extract( $args );
		$title    = apply_filters('widget_title', $instance['title'] );
		$adv_href = esc_url($instance['adv_href']);
		$adv_img  = esc_attr($instance['adv_img']);
		$image_id = esc_attr($instance['image_id']);
		$adv_code = $instance['adv_code'];

		echo wp_kses_post( $args['before_widget'] );
			if ( $adv_code ):
				echo $adv_code;
			else:
			?>
			<div class="advertising">
				<?php if ($adv_code == "") {
					if ($adv_href != "") {?><a href="<?php echo $adv_href?>"><?php }?>
						<img alt="" src="<?php echo $adv_img?>">
					<?php if ($adv_href != "") {?></a><?php }?>
				<?php }else {
					echo $adv_code;
				}?>
			</div><!-- End advertising -->
			<?php
			endif;
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ) {
		$instance             = $old_instance;
		$instance['title']    = strip_tags( $new_instance['title'] );
		$instance['adv_code'] = $new_instance['adv_code'];
		$instance['adv_img']  = $new_instance['adv_img'];
		$instance['image_id'] = $new_instance['image_id'];
		$instance['adv_href'] = $new_instance['adv_href'];
		return $instance;
	}

	public function form( $instance ) {
		$defaults = array( 'title' => 'Advertising' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title :', 'revalia' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo (isset($instance['title'])?esc_attr($instance['title']):""); ?>" class="widefat" type="text">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'adv_img' ); ?>"><?php esc_html_e( 'Image URL :', 'revalia' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'adv_img' ); ?>" name="<?php echo $this->get_field_name( 'adv_img' ); ?>" value="<?php echo (isset($instance['adv_img'])?$instance['adv_img']:"");?>" class="widefat custom_media_url_ads" type="text">
			<br><br>
			<input type="button" value="<?php esc_html_e( 'Upload Image', 'revalia' ); ?>" class="button custom_media_upload_ads" id="custom_image_uploader_ads"/>
			<br><br>
			<input id="<?php echo $this->get_field_id( 'image_id' ); ?>" name="<?php echo $this->get_field_name( 'image_id' ); ?>" value="<?php echo (isset($instance['image_id'])?$instance['image_id']:"");?>" class="widefat image_id" type="hidden">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'adv_href' ); ?>"><?php esc_html_e( 'Advertising url :', 'revalia' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'adv_href' ); ?>" name="<?php echo $this->get_field_name( 'adv_href' ); ?>" value="<?php echo (isset($instance['adv_href'])?esc_attr($instance['adv_href']):""); ?>" class="widefat" type="text">
		</p>
		<em style="display:block; border-bottom:1px solid #CCC; margin-bottom:15px;">OR</em>
		<p>
			<label for="<?php echo $this->get_field_id( 'adv_code' ); ?>"><?php esc_html_e( 'Advertising Code html ( Ex: Google ads) :', 'revalia' ); ?></label>
			<textarea id="<?php echo $this->get_field_id( 'adv_code' ); ?>" name="<?php echo $this->get_field_name( 'adv_code' ); ?>" class="widefat"><?php echo (isset($instance['adv_code'])?esc_attr($instance['adv_code']):""); ?></textarea>
		</p>
	<?php
	}
}
