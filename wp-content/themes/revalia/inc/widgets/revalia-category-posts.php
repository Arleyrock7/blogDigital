<?php
add_action( 'widgets_init', 'revalia_cate_posts' );
function revalia_cate_posts() {
    register_widget( 'revalia_cate_posts' );
}
class revalia_cate_posts extends WP_Widget {
  public function __construct() {
      $widget_ops = array(
        'classname'   => 'revalia-cate-posts',
        'description' => esc_html_x( 'A short description about you.', 'Category Posts widget description', 'revalia' )
      );
      $control_ops = array( 'id_base' => 'revalia-cate-posts' );
      parent::__construct( 'revalia-cate-posts', sprintf( esc_html_x( '%s - Category Posts', 'Category Posts widget name', 'revalia' ), REVALIA_THEME_NAME ), $widget_ops, $control_ops );
   }

  public function widget( $args, $instance ) {
      extract( $args );
      $title = apply_filters('widget_title', $instance['title'] );
      $number = $instance['number'];
      $cats_id = $instance['cats_id'];
      echo wp_kses_post( $args['before_widget'] );
      if($title) {
          echo $before_title.$title.$after_title;
      }
      revalia_last_posts_cats($number, $cats_id);
      echo wp_kses_post( $args['after_widget'] );
  }

  public function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance['title'] = strip_tags( $new_instance['title'] );
      $instance['number'] = strip_tags( $new_instance['number'] );
      $instance['cats_id'] = implode(',' , $new_instance['cats_id']  );
      return $instance;
  }

  public function form( $instance ) {
      $defaults = array( 'title' =>esc_html__( 'Category Posts' , 'revalia'), 'number' => '5' , 'cats_id' => '1');
      $instance = wp_parse_args( (array) $instance, $defaults );
      $categories_obj = get_categories();
      $categories = array();
      foreach ($categories_obj as $pn_cat) {
          $categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
      }
      ?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:' , 'revalia'); ?></label>
        <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width: 216px" />
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e('Number of posts to show:' , 'revalia'); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
      </p>
      <p>
        <?php $cats_id = explode ( ',' , $instance['cats_id'] ) ; ?>
        <label for="<?php echo $this->get_field_id( 'cats_id' ); ?>"><?php esc_html_e('Category :' , 'revalia'); ?></label>
        <select multiple="multiple" id="<?php echo $this->get_field_id( 'cats_id' ); ?>[]" name="<?php echo $this->get_field_name( 'cats_id' ); ?>[]">
            <?php foreach ($categories as $key => $option) { ?>
                <option value="<?php echo $key ?>" <?php if ( in_array( $key , $cats_id ) ) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
            <?php } ?>
        </select>
      </p>
  <?php
  }
}
