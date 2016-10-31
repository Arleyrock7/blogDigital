<?php
class widget_revalia_instagram extends WP_Widget {
  public function __construct() {
      global $revaliadomain;
      $this->revaliadomain = $revaliadomain;
      $widget_ops = array(
        'classname'   => 'instagram_widget',
        'description' => esc_html_x( 'A short description about you.', 'Instagram widget description', 'revalia' )
      );
      $control_ops = array( 'id_base' => 'instagram_widget' );
      parent::__construct( 'instagram_widget', sprintf( esc_html_x( '%s - Instagram', 'Instagram widget name', 'revalia' ), REVALIA_THEME_NAME ), $widget_ops, $control_ops );
   }

  public function widget($args, $instance) {

    extract($args, EXTR_SKIP);

    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
    $username = empty($instance['username']) ? '' : $instance['username'];
    $limit = empty($instance['number']) ? 9 : $instance['number'];
    $size = empty($instance['size']) ? 'thumbnail' : $instance['size'];
    $target = empty($instance['target']) ? '_self' : $instance['target'];
    $link = empty($instance['link']) ? '' : $instance['link'];

    echo wp_kses_post( $args['before_widget'] );


    do_action( 'revalia_before_widget', $instance );

    if ($username != '')
    {

        $media_array = $this->scrape_instagram($username, $limit);

        if ( is_wp_error($media_array) ) {
           echo $media_array->get_error_message();
        } else {

            // filter for images only?
            if ( $images_only = apply_filters( 'revalia_images_only', FALSE ) )
                $media_array = array_filter( $media_array, array( $this, 'images_only' ) );
			if($size == 'thumbnail'):
            ?>
		<!-- Start widget Instagram -->
			<div class="widget_title">
				<h2><?php echo esc_attr($title,'revalia'); ?></h2>
			</div>
			<div class="widget_content">
				<div class="widget-instagram">
					<div id="instafeed">
						<ul>
							<?php foreach ($media_array as $item) : ?>

							<li>
								<a href="<?php echo esc_url($item['link']); ?>" target="<?php echo esc_attr($target); ?>" class="clearfix"><img src="<?php echo esc_url($item['thumbnail']); ?>" alt="" width="70" height="70"/></a>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		<!-- End widget Instagram -->

    <?php else: ?>
      <!-- Start widget Instagram -->
			<div class="block-instagram-footer">
				<div class="widget-instagram_footer text-center">
					<h4><a href="//instagram.com/<?php echo trim($username); ?>"><?php echo esc_attr($title,'revalia'); ?></a></h4>
					<ul id="instafeedfooter">
						<?php foreach ($media_array as $item) : ?>
							<li>
								<a href="<?php echo esc_url($item['link']); ?>" target="<?php echo esc_attr($target); ?>"><img src="<?php echo esc_url($item['thumbnail']); ?>" alt="<?php echo esc_attr($item['description']); ?>"/></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="item-instagram-footer">
					<a href="//instagram.com/<?php echo trim($username); ?>" class="link">
						<span class="icon"></span>
						<span class="text"></span>
					</a>
				</div>
			</div>
      <!-- End widget Instagram -->
			<?php
		endif;
        }
    }

    do_action( 'revalia_after_widget', $instance );
    echo wp_kses_post( $args['after_widget'] );
  }

  public function form($instance) {

      $instance = wp_parse_args( (array) $instance, array( 'title' => esc_html__('Instagram', 'revalia'), 'username' => '', 'link' => esc_html__('Follow Us', 'revalia'), 'number' => 9, 'size' => 'thumbnail', 'target' => '_self') );
      $title = esc_attr($instance['title']);
      $username = esc_attr($instance['username']);
      $number = absint($instance['number']);
      $size = esc_attr($instance['size']);
      $target = esc_attr($instance['target']);
      $link = esc_attr($instance['link']);
      ?>
      <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'revalia'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
      <p><label for="<?php echo $this->get_field_id('username'); ?>"><?php esc_html_e('Username', 'revalia'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>" /></label></p>
      <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e('Number of photos', 'revalia'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" /><span>Max number photos in sidebar 9 photo and Max number photos in footer feed in row 6 photo</span></label></p>
      <p><label for="<?php echo $this->get_field_id('size'); ?>"><?php esc_html_e('widget Layeout', 'revalia'); ?>:</label>
         <select id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" class="widefat">
            <option value="thumbnail" <?php selected('thumbnail', $size) ?>><?php esc_html_e('Sidebar', 'revalia'); ?></option>
            <option value="large" <?php selected('large', $size) ?>><?php esc_html_e('Footer', 'revalia'); ?></option>
         </select>
      </p>
      <p><label for="<?php echo $this->get_field_id('target'); ?>"><?php esc_html_e('Open links in', 'revalia'); ?>:</label>
         <select id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" class="widefat">
            <option value="_self" <?php selected('_self', $target) ?>><?php esc_html_e('Current window (_self)', 'revalia'); ?></option>
            <option value="_blank" <?php selected('_blank', $target) ?>><?php esc_html_e('New window (_blank)', 'revalia'); ?></option>
         </select>
      </p>
      <?php
  }

  public function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['username'] = trim(strip_tags($new_instance['username']));
      $instance['number'] = !absint($new_instance['number']) ? 9 : $new_instance['number'];
      $instance['size'] = (($new_instance['size'] == 'thumbnail' || $new_instance['size'] == 'large') ? $new_instance['size'] : 'thumbnail');
      $instance['target'] = (($new_instance['target'] == '_self' || $new_instance['target'] == '_blank') ? $new_instance['target'] : '_self');
      $instance['link'] = strip_tags($new_instance['link']);
      return $instance;
  }

  // based on https://gist.github.com/cosmocatalano/4544576
  public function scrape_instagram($username, $slice = 9) {$username = strtolower( $username );
	if ( false === ( $instagram = get_transient( 'instagram-media-new-'.sanitize_title_with_dashes( $username ) ) ) ) {
		$remote = wp_remote_get( 'http://instagram.com/'.trim( $username ) );
		if ( is_wp_error( $remote ) )
			return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'revalia' ) );
		if ( 200 != wp_remote_retrieve_response_code( $remote ) )
			return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'revalia' ) );
		$shards = explode( 'window._sharedData = ', $remote['body'] );
		$insta_json = explode( ';</script>', $shards[1] );
		$insta_array = json_decode( $insta_json[0], TRUE );
		if ( !$insta_array )
			return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'revalia' ) );
		// old style
		if ( isset( $insta_array['entry_data']['UserProfile'][0]['userMedia'] ) ) {
			$images = $insta_array['entry_data']['UserProfile'][0]['userMedia'];
			$type = 'old';
		// new style
		} else if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
			$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
			$type = 'new';
		} else {
			return new WP_Error( 'bad_josn_2', esc_html__( 'Instagram has returned invalid data.', 'revalia' ) );
		}
		if ( !is_array( $images ) )
			return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'revalia' ) );
		$instagram = array();
		switch ( $type ) {
			case 'old':
				foreach ( $images as $image ) {
					if ( $image['user']['username'] == $username ) {
						$image['link']						  = preg_replace( "/^http:/i", "", $image['link'] );
						$image['images']['thumbnail']		   = preg_replace( "/^http:/i", "", $image['images']['thumbnail'] );
						$image['images']['standard_resolution'] = preg_replace( "/^http:/i", "", $image['images']['standard_resolution'] );
						$image['images']['low_resolution']	  = preg_replace( "/^http:/i", "", $image['images']['low_resolution'] );
						$instagram[] = array(
							'description'   => $image['caption']['text'],
							'link'		  	=> $image['link'],
							'time'		  	=> $image['created_time'],
							'comments'	  	=> $image['comments']['count'],
							'likes'		 	=> $image['likes']['count'],
							'thumbnail'	 	=> $image['images']['thumbnail'],
							'large'		 	=> $image['images']['standard_resolution'],
							'small'		 	=> $image['images']['low_resolution'],
							'type'		  	=> $image['type']
						);
					}
				}
			break;
			default:
				foreach ( $images as $image ) {
					$image['display_src'] = preg_replace( "/^http:/i", "", $image['display_src'] );
					if ( $image['is_video']  == true ) {
						$type = 'video';
					} else {
						$type = 'image';
					}
					$instagram[] = array(
						'description'   => esc_html__( 'Instagram Image', 'revalia' ),
						'link'		  	=> '//instagram.com/p/' . $image['code'],
						'time'		  	=> $image['date'],
						'comments'	  	=> $image['comments']['count'],
						'likes'		 	=> $image['likes']['count'],
						'thumbnail'	 	=> $image['display_src'],
						'type'		  	=> $type
					);
				}
			break;
		}
		// do not set an empty transient - should help catch private or empty accounts
		if ( ! empty( $instagram ) ) {

			set_transient( 'instagram-media-new-'.sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS*2 ) );
		}
	}
	if ( ! empty( $instagram ) ) {
		return array_slice( $instagram, 0, $slice );
	} else {
		return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'revalia' ) );
	}
  }

  public function images_only($media_item) {

      if ($media_item['type'] == 'image')
          return true;

      return false;
  }

	public function get_instagram_avatar($username) {
		$fallback = 'http://www.gravatar.com/avatar/00000000000000000000000000000000';

		$username = strtolower( $username );

		  $response = wp_remote_get( 'http://instagram.com/' . trim( $username ), array( 'sslverify' => false, 'timeout' => 60 ) );
			if ( is_wp_error( $response ) ) {

				//return $response->get_error_message();
				return $fallback;
			}
            if ( $response['response']['code'] == 200 ) {

            }
			$json = str_replace( 'window._sharedData = ', '', strstr( $response['body'], 'window._sharedData = ' ) );

			// Compatibility for version of php where strstr() doesnt accept third parameter
			if ( version_compare( PHP_VERSION, '5.3.0', '>=' ) ) {
				$json = strstr( $json, '</script>', true );
			} else {
				$json = substr( $json, 0, strpos( $json, '</script>' ) );
			}

			$json = rtrim( $json, ';' );

			// Function json_last_error() is not available before PHP * 5.3.0 version
			if ( function_exists( 'json_last_error' ) ) {

				( $results = json_decode( $json, true ) ) && json_last_error() == JSON_ERROR_NONE;

			} else {

				$results = json_decode( $json, true );
			}

			if ( $results && is_array( $results ) && isset($results['entry_data']['ProfilePage'][0]['user']['profile_pic_url'])) {

				return $results['entry_data']['ProfilePage'][0]['user']['profile_pic_url'];
			}

			return $fallback;

    }
}
add_action('widgets_init', 'revalia_Instagram_Widget');
function revalia_Instagram_Widget() {
    register_widget('widget_revalia_instagram');
}
