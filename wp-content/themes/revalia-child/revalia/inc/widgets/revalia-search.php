<?php
  add_action( 'widgets_init', 'revalia_search_widget' );
  function revalia_search_widget() {
      register_widget( 'revalia_search_widget' );
  }
  class revalia_search_widget extends WP_Widget {
    public function __construct() {
  			$widget_ops = array(
  				'classname'   => 'revalia-search-widget',
  				'description' => esc_html_x( 'A short description about you.', 'Search widget description', 'revalia' )
  			);
  			$control_ops = array( 'id_base' => 'revalia-search-widget' );
  			parent::__construct( 'revalia-search-widget', sprintf( esc_html_x( '%s - Search', 'Search widget name', 'revalia' ), REVALIA_THEME_NAME ), $widget_ops, $control_ops );
  	 }

    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters('widget_title', $instance['title'] );

        echo wp_kses_post( $args['before_widget'] );

        if($title) {
            echo $before_title.$title.$after_title;
        }
        ?>
        <div class="widget-search">
            <form method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                <input class="search-text" type="text" id="s" name="s" placeholder="Search"  />
                <button value="Search" name="Submit" type="submit" class="button"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <?php
        echo wp_kses_post( $args['after_widget'] );
    }
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        return $instance;
    }
    public function form( $instance ) {
        $defaults = array( 'title' =>esc_html__( 'Search' , 'revalia'));
        $instance = wp_parse_args( (array) $instance, $defaults );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title','revalia')?> : </label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
        </p>
    <?php
    }

  }
