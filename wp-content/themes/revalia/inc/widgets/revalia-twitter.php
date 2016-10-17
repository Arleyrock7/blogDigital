<?php
if (!class_exists('codepages_Twitter_Widget')) {
  add_action('widgets_init', 'load_codepages_twitter_widget');
  function load_codepages_twitter_widget()
  {
    register_widget('codepages_Twitter_Widget');
  }
  /** Twitter Widget by codepages **/
  class codepages_Twitter_Widget extends WP_Widget {
    /** Register widget with WordPress. **/
    public function __construct() {
        $widget_ops = array(
          'classname'   => 'revalia_twitter_widget',
          'description' => esc_html_x( 'A short description about you.', 'Twitter widget description', 'revalia' )
        );
        $control_ops = array( 'id_base' => 'revalia_twitter_widget' );
        parent::__construct( 'revalia_twitter_widget', sprintf( esc_html_x( '%s - Twitter', 'Twitter widget name', 'revalia' ), REVALIA_THEME_NAME ), $widget_ops, $control_ops );
     }

    public function widget($args, $instance)
    {
      extract( $args );
      $title            = isset($instance['title']) ? $instance['title'] : '';
      $username         = isset($instance['username']) ? $instance['username'] : '';
      $consumer_key     = isset($instance['consumer_key']) ? $instance['consumer_key'] : '';
      $consumer_secret  = isset($instance['consumer_secret']) ? $instance['consumer_secret'] : '';
      $access_token     = isset($instance['access_token']) ? $instance['access_token'] : '';
      $access_secret    = isset($instance['access_secret']) ? $instance['access_secret'] : '';
      $open_new_page    = isset($instance['open_new_page']) ? $instance['open_new_page'] : '';
      $tweets_count     = isset($instance['tweets_count']) ? $instance['tweets_count'] : '2';

      echo wp_kses_post( $args['before_widget'] );

      $output = '<div class="widget_title"><h2>'. $title . '</h2></div>';
      $output .= '<div class="codepages-twitter"><div class="icon-twitter text-center"><i class="fa fa-twitter"></i></div>';
      if (!empty($username) &&
        !empty($consumer_key) && !empty($consumer_secret) &&
        !empty($access_token) && !empty($access_secret)) {
        $data = $this->get_data($instance);
        if( $data != false ) {
          $output .= '<div class="tweet-community"><ul>';
          foreach( $data as $index => $tweet ) {
            if( $index >= $tweets_count ) {
              break;
            }

            if( 'on' == $open_new_page) {
              $tweet->text = preg_replace('/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;\'">\:\s\<\>\)\]\!])/', '<a target="_blank" href="\\1">\\1</a>', $tweet->text);
              $tweet->text = preg_replace('/\B@([_a-z0-9]+)/i', '<a target="_blank" href="http://twitter.com/\\1">@\\1</a>', $tweet->text);
            }
            else {
              $tweet->text = preg_replace('/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;\'">\:\s\<\>\)\]\!])/', '<a href="\\1">\\1</a>', $tweet->text);
              $tweet->text = preg_replace('/\B@([_a-z0-9]+)/i', '<a href="http://twitter.com/\\1">@\\1</a>', $tweet->text);
            }
            $output .= $this->get_li( $tweet, $instance );

          }
          $output .= '</ul></div>';
        }
      }
      $output .= '</div>';
      echo $output;
      echo wp_kses_post( $args['after_widget'] );
    }

    public function form($instance) {
      $title            = isset($instance['title']) ? $instance['title'] : '';
      $username         = isset($instance['username']) ? $instance['username'] : '';
      $consumer_key     = isset($instance['consumer_key']) ? $instance['consumer_key'] : '';
      $consumer_secret  = isset($instance['consumer_secret']) ? $instance['consumer_secret'] : '';
      $access_token     = isset($instance['access_token']) ? $instance['access_token'] : '';
      $access_secret    = isset($instance['access_secret']) ? $instance['access_secret'] : '';
      $open_new_page    = isset($instance['open_new_page']) ? $instance['open_new_page'] : '';
      $tweets_count     = isset($instance['tweets_count']) ? $instance['tweets_count'] : '2';
      ?>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'revalia') ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
          name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>"/>
      </p>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('username')); ?>"><?php esc_html_e('User Name', 'revalia') ?></label>
        <input type="text" id="<?php echo esc_attr($this->get_field_id('username')); ?>"
               name="<?php echo esc_attr($this->get_field_name('username')); ?>" value="<?php echo esc_attr($username); ?>"/>
      </p>

      <?php _e('
      <p class="help">
        You need to authenticate yourself to Twitter with creating an app for get access information to retrieve your tweets and display them on your page
      </p>
      <ol>
        <li>Go to <a href="http://goo.gl/tyCR5W" target="_blank">https://apps.twitter.com/app/new</a> and log in, if necessary</li>
        <li>Enter your Application Name, Description and your website address. You can leave the callback URL empty.</li>
        <li>Submit the form by clicking the Create your Twitter Application</li>
        <li>Go to the "Keys and Access Token" tab and copy the consumer key (API key) and consumer secret</li>
        <li>Paste them in the following input boxes</li>
        <li>Click on the "Create my access token" in bottom of page for creating access token and copy them</li>
        <li>Paste them in the following input boxes</li>
      </ol>
      ', 'revalia'); ?>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('consumer_key')); ?>"><?php esc_html_e('Consumer Key (API Key)', 'revalia') ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('consumer_key')); ?>"
               name="<?php echo esc_attr($this->get_field_name('consumer_key')); ?>" value="<?php echo esc_attr($consumer_key); ?>"/>
      </p>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('consumer_secret')); ?>"><?php esc_html_e('Consumer Secret (API Secret)', 'revalia') ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('consumer_secret')); ?>"
               name="<?php echo esc_attr($this->get_field_name('consumer_secret')); ?>" value="<?php echo esc_attr($consumer_secret); ?>"/>
      </p>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('access_token')); ?>"><?php esc_html_e('Access Token', 'revalia') ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('access_token')); ?>"
               name="<?php echo esc_attr($this->get_field_name('access_token')); ?>" value="<?php echo esc_attr($access_token); ?>"/>
      </p>
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id('access_secret')); ?>"><?php esc_html_e('Access Token Secret', 'revalia') ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('access_secret')); ?>"
               name="<?php echo esc_attr($this->get_field_name('access_secret')); ?>" value="<?php echo esc_attr($access_secret); ?>"/>
      </p>
      <p class="help"><?php echo esc_html_e('Show Reply, Retweet and Favorite buttons', 'revalia'); ?></p>
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('tweets_count')); ?>"><?php esc_html_e('Number of Tweets', 'revalia') ?></label>
        <input type="text" id="<?php echo esc_attr($this->get_field_id('tweets_count')); ?>"
               name="<?php echo esc_attr( $this->get_field_name('tweets_count') ); ?>" value="<?php echo esc_attr(esc_attr($tweets_count)); ?>" size="3"/>
      </p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('open_new_page')); ?>" name="<?php echo esc_attr($this->get_field_name('open_new_page') ); ?>" <?php checked($open_new_page, 'on'); ?> />
        <label for="<?php echo esc_attr($this->get_field_id('open_new_page')); ?>"><?php esc_html_e('Open Tweet Links in New Page', 'revalia') ?></label>
      </p>
    <?php
    }

    /** Retrieve twitter fresh data **/

    public function get_twitter_data($atts)
    {
      if (!class_exists('OAuthToken')) {
        require_once get_template_directory() . '/inc/oauth/oauth.php';
      }
      require_once get_template_directory() . '/inc/oauth/twitter-oauth.php';
      $twitterConnection = new TwitterOAuth (
        $atts['consumer_key'],
        $atts['consumer_secret'],
        $atts['access_token'],
        $atts['access_secret']
      );
      $data = $twitterConnection->get('statuses/user_timeline', array(
        'screen_name' => $atts['username'],
        'count' => $atts['tweets_count'],
        'exclude_replies' => false
      ));
      if ($twitterConnection->http_code === 200) {
        return $data;
      }
      return false;
    }

    /** Wrapper ro getting twitter data with cache mechanism **/
    public function get_data($atts)
    {
      $data_store = 'codepages-twitter-' . $atts['username'];
      $back_store = 'codepages-twitter-da-' . $atts['username'];
      $cache_time = 60 * 10;
      if (($data = get_transient($data_store)) === false) {
        $data = $this->get_twitter_data($atts);
        if ($data) {
          // save a transient to expire in $cache_time and a permanent backup option ( fallback )
          set_transient($data_store, $data, $cache_time);
          update_option($back_store, $data);
        } // fall to permanent backup store
        else {
          $data = get_option($back_store);
        }
      }
      return $data;
    }

    /** Generates HTML code for each Tweet **/

    public function get_li($tweet, $atts)
    {
	$html = '<li>';
	$html .= '<a class="username" ' . (isset($atts['open_new_page'])  && 'on' == $atts['open_new_page'] ? 'target="_blank"' : '') . ' href="http://twitter.com/' . $tweet->user->screen_name . '">';
	$html .= '<span class="username">@' . $tweet->user->name . '</span></a>';
	$html .=  $tweet->text;
	$html .= '<div class="date">' . date('M d Y', strtotime($tweet->created_at)) . '</div>';
	$html .= '</li>';
	return $html;
    }
  } // end class
} // end if
