<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux_Framework_sample_config' ) ) {

        class Redux_Framework_sample_config {

            public $args = array();
            public $sections = array();
            public $theme;
            public $ReduxFramework;

            public function __construct() {

                if ( ! class_exists( 'ReduxFramework' ) ) {
                    return;
                }

                // This is needed. Bah WordPress bugs.  ;)
                if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                    $this->initSettings();
                } else {
                    add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
                }

            }

            public function initSettings() {

                // Just for demo purposes. Not needed per say.
                $this->theme = wp_get_theme();

                // Set the default arguments
                $this->setArguments();

                // Set a few help tabs so you can see how it's done
                $this->setHelpTabs();

                // Create the sections and fields
                $this->setSections();

                if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                    return;
                }

                // If Redux is running as a plugin, this will remove the demo notice and links
                //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

                // Function to test the compiler hook and demo CSS output.
                // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
                //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);

                // Change the arguments after they've been declared, but before the panel is created
                //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );

                // Change the default value of a field after it's been set, but before it's been useds
                //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );

                // Dynamically add a section. Can be also used to modify sections/fields
                //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

                $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
            }

            /**
             * This is a test function that will let you see when the compiler hook occurs.
             * It only runs if a field    set with compiler=>true is changed.
             * */
            function compiler_action( $options, $css, $changed_values ) {
                echo '<h1>The compiler hook has run!</h1>';
                echo "<pre>";
                print_r( $changed_values ); // Values that have changed since the last save
                echo "</pre>";
                //print_r($options); //Option values
                //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
            }

            /**
             * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
             * Simply include this function in the child themes functions.php file.
             * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
             * so you must use get_template_directory_uri() if you want to use any of the built in icons
             * */
            function dynamic_section( $sections ) {
                //$sections = array();
                $sections[] = array(
                    'title'  => esc_html__( 'Section via hook', 'revalia' ),
                    'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'revalia' ),
                    'icon'   => 'el-icon-paper-clip',
                    // Leave this as a blank section, no options just some intro text set above.
                    'fields' => array()
                );

                return $sections;
            }

            /**
             * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
             * */
            function change_arguments( $args ) {
                //$args['dev_mode'] = true;

                return $args;
            }

            /**
             * Filter hook for filtering the default value of any given field. Very useful in development mode.
             * */
            function change_defaults( $defaults ) {
                $defaults['str_replace'] = 'Testing filter hook!';

                return $defaults;
            }

            // Remove the demo link and the notice of integrated demo from the redux-framework plugin
            function remove_demo() {

                // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
                if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                    remove_filter( 'plugin_row_meta', array(
                        ReduxFrameworkPlugin::instance(),
                        'plugin_metalinks'
                    ), null, 2 );

                    // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                    remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
                }
            }


            public function setSections() {

                /**
                 * Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
                 * */
                // Background Patterns Reader
                $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
                $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
                $sample_patterns      = array();

                if ( is_dir( $sample_patterns_path ) ) :

                    if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
                        $sample_patterns = array();

                        while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                            if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                                $name              = explode( '.', $sample_patterns_file );
                                $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                                $sample_patterns[] = array(
                                    'alt' => $name,
                                    'img' => $sample_patterns_url . $sample_patterns_file
                                );
                            }
                        }
                    endif;
                endif;

                ob_start();

                $ct          = wp_get_theme();
                $this->theme = $ct;
                $item_name   = $this->theme->get( 'Name' );
                $tags        = $this->theme->Tags;
                $screenshot  = $this->theme->get_screenshot();
                $class       = $screenshot ? 'has-screenshot' : '';

                $customize_title = sprintf( esc_html__( 'Customize &#8220;%s&#8221;', 'revalia' ), $this->theme->display( 'Name' ) );

                ?>
                <div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
                    <?php if ( $screenshot ) : ?>
                        <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
                            <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize"
                               title="<?php echo esc_attr( $customize_title ); ?>">
                                <img src="<?php echo esc_url( $screenshot ); ?>"
                                     alt="<?php esc_attr_e( 'Current theme preview', 'revalia' ); ?>"/>
                            </a>
                        <?php endif; ?>
                        <img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>"
                             alt="<?php esc_attr_e( 'Current theme preview', 'revalia' ); ?>"/>
                    <?php endif; ?>

                    <h4><?php echo $this->theme->display( 'Name' ); ?></h4>

                    <div>
                        <ul class="theme-info">
                            <li><?php printf( esc_html__( 'By %s', 'revalia' ), $this->theme->display( 'Author' ) ); ?></li>
                            <li><?php printf( esc_html__( 'Version %s', 'revalia' ), $this->theme->display( 'Version' ) ); ?></li>
                            <li><?php echo '<strong>' . esc_html__( 'Tags', 'revalia' ) . ':</strong> '; ?><?php printf( $this->theme->display( 'Tags' ) ); ?></li>
                        </ul>
                        <p class="theme-description"><?php echo $this->theme->display( 'Description' ); ?></p>
                        <?php
                            if ( $this->theme->parent() ) {
                                printf( ' <p class="howto">' . esc_html__( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'revalia' ) . '</p>',esc_html__( 'http://codex.WordPress.org/Child_Themes', 'revalia' ), $this->theme->parent()->display( 'Name' ) );
                            }
                        ?>

                    </div>
                </div>

                <?php
                $item_info = ob_get_contents();

                ob_end_clean();

                $sampleHTML = '';
                if ( file_exists( get_template_directory() . '/info-html.html' ) ) {
                    Redux_Functions::initWpFilesystem();

                    global $wp_filesystem;

                    $sampleHTML = $wp_filesystem->get_contents( get_template_directory() . '/info-html.html' );
                }

                // ACTUAL DECLARATION OF SECTIONS

				$this->sections[] = array(
                    'icon'   => 'icon icon-WorldGlobe',
                    'title'  => esc_html__( 'General Settings', 'revalia' ),
					'fields' => array(

					), // #fields
				);

				$this->sections[] = array(
					'title' => esc_html__('General Option', 'revalia'),
					'desc' => esc_html__('General Option Blog.', 'revalia'),
					'subsection' => true,
					'fields' => array(
						array(
						'id'          => 'general_introduction',
						'type'        => 'info',
						'style'       => 'success',
						'title'       => esc_html__('Welcome to Revalia Theme Option Panel', 'revalia'),
						'icon'        => 'el-icon-info-sign',
						'desc'        => esc_html__( 'From here you can config Revalia theme in the way you need.', 'revalia'),
						),
						array(
						'id'          => 'page_loading',
						'type'        => 'switch',
						'title'       => esc_html__('Loading animations', 'revalia'),
						'subtitle'    => esc_html__('Enabled or Disabled loading animations in site.', 'revalia'),
						'on'          => 'Enabled',
						'off'         => 'Disabled',
						'default'     => '0',
						),

						array(
						'id'          => 'page_scroll_up',
						'type'        => 'switch',
						'title'       => esc_html__('Scroll to top button', 'revalia'),
						'subtitle'    => esc_html__('Enabled or Disabled Scroll To top.', 'revalia'),
						'default'     => '1',
						'on'          => 'Enabled',
						'off'         => 'Disabled',
						),
						array(
						'id'          => 'layout_homepage',
						'type'        => 'button_set',
						'title'       => esc_html__('Layout Homepage', 'revalia'),
						'subtitle'    => esc_html__('Boxed or wide layout homepage .', 'revalia'),
						'options'     => array(
						'wide_layout'       =>  'Wide',
						'boxed_layout'      =>  'Boxed',
						),
						'default'     => 'wide_layout',
						),
						array(
						'id'       => 'bg_color_body',
						'type'     => 'color',
						'title'    => __('Body Background Color', 'revalia'),
						'subtitle' => __('Pick a background color for the theme (default: #9e9e9e).', 'revalia'),
						'default'  => '#FFF',
						'validate' => 'color',
						),


						array(
						'id'       => 'bg_img_body',
						'type'     => 'background',
						'title'       => esc_html__( 'Intro background Body Images', 'revalia' ),
						'subtitle'    => esc_html__( 'Upload or Select the background for body. ', 'revalia' ),
						'background-color'  => false,
						),

            array(
              'id'       => 'custom_css',
							'type'     => 'textarea',
              'title'       => esc_html__( 'Custom Css Code', 'revalia' ),
							'subtitle'    => esc_html__( 'Add The Custom Css Code ', 'revalia' ),
						),
            
					), // #fields
				);

				$this->sections[] = array(
					'title' => esc_html__('Layout Blog Option', 'revalia'),
					'desc' => esc_html__('Layout Option Blog.', 'revalia'),
					'subsection' => true,
					'fields' => array(
						array(
						'id'          => 'layout_post',
						'type'        => 'button_set',
						'title'       => esc_html__('Layout Home Post', 'revalia'),
						'subtitle'    => esc_html__('Select home layout post from ( Standerd or Grid or List or Masonry ).', 'revalia'),
						'options'     => array(
						'stander'   =>  'Stander Blog Style',
						'grid'      =>  'Grid Blog Style',
						'list'      =>  'List Blog Style',
						'masonry'   =>  'Masonry Blog Style',
						),
						'default'     => 'stander',
						),

						array(
						'id'          => 'layout_sidebar',
						'type'        => 'button_set',
						'title'       => esc_html__('Layout Sidebar', 'revalia'),
						'subtitle'    => esc_html__('Select sidebar layout from ( Left or Right or Fullwidth ).', 'revalia'),
						'options'     => array(
						'fullwidth'     => 'Fullwidth Sidebar',
						'left_sidebar'  => 'Left Sidebar',
						'right_sidebar' => 'Right Sidebar',
						),
						'default'   => 'fullwidth',
						),
            array(
            'id'          => 'post_format',
            'type'        => 'switch',
            'title'       => esc_html__('Scroll to top button', 'revalia'),
            'subtitle'    => esc_html__('Enabled or Disabled Scroll To top.', 'revalia'),
            'default'     => '1',
            'on'          => 'Enabled',
            'off'         => 'Disabled',
            'default'     => '0',
            ),
					), // #fields
				);

				$this->sections[] = array(
					'icon'   => 'icon icon-Notebook',
					'title'  => esc_html__( 'Header Settings', 'revalia' ),
					'fields' => array(

					), // #fields
				);

				$this->sections[] = array(
					'title' => esc_html__('Logo Header', 'revalia'),
					'desc' => esc_html__('Logo Header Option.', 'revalia'),
					'subsection' => true,
					'fields' => array(
						array(
						'id'          => 'header_logo',
						'type'        => 'media',
						'url'         => true,
						'compiler'    => 'true',
						'title'       => esc_html__( 'Intro Header Logo', 'revalia' ),
						'subtitle'    => esc_html__( 'Upload or Select the logo light. ', 'revalia' ),
						'default'     => array('url' => get_template_directory_uri().'/assets/images/logo/logo-header.png'),
						),
						array(
						'id'          => 'header_logo_2',
						'type'        => 'media',
						'url'         => true,
						'compiler'    => 'true',
						'title'       => esc_html__( 'Intro Header Logo Style 2', 'revalia' ),
						'subtitle'    => esc_html__( 'Upload or Select the logo dark. ', 'revalia' ),
						'default' => array('url' => get_template_directory_uri().'/assets/images/logo/logo-header-2.png'),
						),
						array(
						'id'          => 'fav_icon',
						'type'        => 'media',
						'url'         => true,
						'compiler' 	  => 'true',
						'title'   	  => esc_html__( 'Custom favicon', 'revalia' ),
						'subtitle'    => esc_html__( 'Upload or Select the icon (16px X 16px). ', 'revalia' ),
						'default'     => array('url' => get_template_directory_uri().'/assets/images/favicon.ico'),
						),

					), // #fields
				);

				$this->sections[] = array(
					'title' => esc_html__('Layout Header', 'revalia'),
					'desc' => esc_html__('Layout Header Option.', 'revalia'),
					'subsection' => true,
					'fields' => array(
						array(
						'id'          => 'layout_header',
						'type'        => 'button_set',
						'compiler'    => false,
						'title'       => esc_html__('Layout Header', 'revalia'),
						'subtitle'    => esc_html__('Select Header layout from 3 header style.', 'revalia'),
						'options'     => array(
							'header_style_1'   => 'Header Style 1',
							'header_style_2'   => 'Header Style 2',
							'header_style_3'   => 'Header Style 3',
							),
						'default'  => 'header_style_1'
						),

						array(
						'id'       => 'bg_nav_logo',
						'type'     => 'background',
						'title'       => esc_html__( 'Intro background Images Header', 'revalia' ),
						'subtitle'    => esc_html__( 'Upload or Select the background for header style 2. ', 'revalia' ),
						'background-color'  => false,
						),
					), // #fields
				);


				$this->sections[] = array(
					'icon'   => 'icon icon-Movie',
					'title'  => esc_html__( 'Slider Settings', 'revalia' ),
					'fields' => array(
						array(
						'id'          => 'header_slider',
						'type'        => 'switch',
						'title'       => esc_html__('Header Slider', 'revalia'),
						'subtitle'    => esc_html__('Enabled or Disabled Slider In Header.', 'revalia'),
						'on'          => 'Enabled',
						'off'         => 'Disabled',
						'default'     => '0',
						),
						array(
						'id'          => 'layout_slider',
						'type'        => 'button_set',
						'compiler'    => true,
						'title'       => esc_html__('Layout Home slider', 'revalia'),
						'subtitle'    => esc_html__('Select home slider layout from ( Fullwidth or Slider 2col or Slider 3col ).', 'revalia'),
						'options'     => array(
							'slider_fullwidth'  => 'Slider Fullwidth',
							'slider_2colm'      => 'Slider 2 Colm',
							'slider_3colm'      => 'Slider 3 Colm',
						),
						'default'     => 'slider_fullwidth',
						),
						array(
						'id'          => 'post_header_slider',
						'type'        => 'text',
						'title'       => esc_html__('Number Post In Header Slider', 'revalia'),
						'subtitle'    => esc_html__('Add namber post to show in slider ( Max Number 8 - Min Number 4 ).', 'revalia'),
						'default'     => '4',
						),
            array(
						'id'          => 'featured_footer_slider',
						'type'        => 'switch',
						'title'       => esc_html__('Featured Footer Slider', 'revalia'),
						'subtitle'    => esc_html__('Enabled or Disabled Footer Slider.', 'revalia'),
						'default'     => '0',
						'on'          => 'Enabled',
						'off'         => 'Disabled',
						),
            array(
						'id'          => 'title_footer_slider',
						'type'        => 'text',
						'title'       => esc_html__('Number Post In Footer Slider', 'revalia'),
						'subtitle'    => esc_html__('Add namber post to show in slider ( Max Number 8 - Min Number 4 ).', 'revalia'),
						'default'     => 'Most Poplure',
						),
            array(
						'id'           => 'order_slider_post',
						'type'         => 'button_set',
						'title'        => esc_html__('Layout Home Post', 'revalia'),
						'subtitle'     => esc_html__('Select home layout post from ( Standerd or Grid or List or Masonry ).', 'revalia'),
						'options'      => array(
						'id'           =>  'ID',
						'date'         =>  'Date',
		        'rand'         =>  'Random',
						'comment_count'      =>  'Comment Count',
						),
						'default'     => 'id',
						),
						array(
						'id'          => 'post_footer_slider',
						'type'        => 'text',
						'title'       => esc_html__('Number Post In Footer Slider', 'revalia'),
						'subtitle'    => esc_html__('Add namber post to show in slider ( Max Number 8 - Min Number 4 ).', 'revalia'),
						'default'     => '8',
						),

					)
				);

				$this->sections[] = array(
					  'icon'   => 'icon icon-Medal',
					  'title'  => esc_html__( 'Advertising Blog', 'revalia' ),
					  'fields' => array(
						array(
							'id'          => 'advertising_blog',
							'type'        => 'switch',
							'title'       => esc_html__('Advertising in Global Blog.', 'revalia'),
							'subtitle'    => esc_html__('Enabled or Disabled Advertising in Global Blog.', 'revalia'),
							'on'          => 'Enabled',
							'off'         => 'Disabled',
							'default'     => '0',
						),
						array(
							'id'       => 'header_ad',
							'type'     => 'textarea',
							'title'       => esc_html__( 'Advertising Header', 'revalia' ),
							'subtitle'    => esc_html__( 'Header for banner (728X90) ', 'revalia' ),
						),
						array(
							'id'       => 'blog_ad',
							'type'     => 'textarea',
							'title'       => esc_html__( 'Advertising Posts and Index', 'revalia' ),
							'subtitle'    => esc_html__( 'Posts for banner (728X90) ', 'revalia' ),
						),
						array(
							'id'       => 'page_ad',
							'type'     => 'textarea',
							'title'       => esc_html__( 'Advertising Pages and Index', 'revalia' ),
							'subtitle'    => esc_html__( 'Pages for banner (728X90) ', 'revalia' ),
						),
						array(
							'id'       => 'single_ad',
							'type'     => 'textarea',
							'title'       => esc_html__( 'Advertising Single Posts', 'revalia' ),
							'subtitle'    => esc_html__( 'Single for banner (728X90) ', 'revalia' ),
						),
						array(
							'id'       => 'side_ad',
							'type'     => 'textarea',
							'title'       => esc_html__( 'Advertising Sidebar And Mobile Menu', 'revalia' ),
							'subtitle'    => esc_html__( 'Sidebar for banner (2808X280) ', 'revalia' ),
						),
					)
				);

				$this->sections[] = array(
					'icon'   => 'icon icon-Blog',
					'title'  => esc_html__( 'Featured Boxes', 'revalia' ),
					'fields' => array(
						array(
							'id'          => 'featured_box',
							'type'        => 'switch',
							'title'       => esc_html__('Featured Boxes In Home Page.', 'revalia'),
							'subtitle'    => esc_html__('Enabled or Disabled Featured Boxes In Home Page.', 'revalia'),
							'on'          => 'Enabled',
							'off'         => 'Disabled',
							'default'     => '0',
						),
						array(
							'id'          => 'featured_box_pages',
							'type'        => 'switch',
							'title'       => esc_html__('Featured Boxes In Pages.', 'revalia'),
							'subtitle'    => esc_html__('Enabled or Disabled Featured Boxes In Pages.', 'revalia'),
							'on'          => 'Enabled',
							'off'         => 'Disabled',
							'default'     => '0',
						),
						array(
							'id'          => 'featured-box-1',
							'type'        => 'slides',
							'title'       => esc_html__( 'Featured Boxes One', 'revalia' ),
							'subtitle'    => esc_html__( 'Add all data for featured boxes one.', 'revalia' ),
							'desc'        => esc_html__( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'revalia' ),
							'placeholder' => array(
								'title'       => esc_html__( 'This is a title', 'revalia' ),
								'description' => esc_html__( 'Description Here', 'revalia' ),
								'url'         => esc_html__( 'Give us a link!', 'revalia' ),
							),
						),
						array(
							'id'          => 'featured-box-2',
							'type'        => 'slides',
							'title'       => esc_html__( 'Featured Boxes Tow', 'revalia' ),
							'subtitle'    => esc_html__( 'Add all data for featured boxes tow.', 'revalia' ),
							'desc'        => esc_html__( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'revalia' ),
							'placeholder' => array(
								'title'       => esc_html__( 'This is a title', 'revalia' ),
								'description' => esc_html__( 'Description Here', 'revalia' ),
								'url'         => esc_html__( 'Give us a link!', 'revalia' ),
							),
						),
						array(
							'id'          => 'featured-box-3',
							'type'        => 'slides',
							'title'       => esc_html__( 'Featured Boxes Three', 'revalia' ),
							'subtitle'    => esc_html__( 'Add all data for featured boxes three.', 'revalia' ),
							'desc'        => esc_html__( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'revalia' ),
							'placeholder' => array(
								'title'       => esc_html__( 'This is a title', 'revalia' ),
								'description' => esc_html__( 'Description Here', 'revalia' ),
								'url'         => esc_html__( 'Give us a link!', 'revalia' ),
							),
						),
					)
				);

				$this->sections[] = array(
					'icon'   => 'icon icon-Corkscrew',
					'title'  => esc_html__( 'Pages', 'revalia' ),
					'fields' => array(
						array(
							'id'          => 'page_banner_title',
							'type'        => 'switch',
							'title'       => esc_html__('Page title in all pages.', 'revalia'),
							'subtitle'    => esc_html__('Enabled or Disabled Page title in all pages and category pages.', 'revalia'),
							'on'          => 'Enabled',
							'off'         => 'Disabled',
							'default'     => '1',
						),

						array(
							'id'       => 'bg_page_title',
							'type'     => 'background',
							'title'    => esc_html__('Page Title Background Image', 'revalia'),
							'subtitle' => esc_html__('Uplode page title background with image and change background position and size and repeat', 'revalia'),
							'background-color'  => false,
						),
						array(
							'id'          => 'overlay_page_color',
							'type'        => 'color_rgba',
							'title'       => esc_html__('Inner page title background color for overlay', 'revalia'),
							'subtitle'    => esc_html__('Pick Inner page title background color ( default: #ffffff )', 'revalia'),
							'default'     => array(
								'color'     => '#ffffff',
								'alpha'     => 0.65
							),
							'options'     => array(
								'show_input'                => true,
								'show_initial'              => true,
								'show_alpha'                => true,
								'show_palette'              => true,
								'show_palette_only'         => false,
								'show_selection_palette'    => true,
								'max_palette_size'          => 10,
								'allow_empty'               => true,
								'clickout_fires_change'     => false,
								'choose_text'               => 'Choose',
								'cancel_text'               => 'Cancel',
								'show_buttons'              => true,
								'use_extended_classes'      => true,
								'palette'                   => null,  // show default
								'input_text'                => 'Select Color'
							),
						),
						array(
							'id'          => 'title_text_color',
							'type'        => 'color',
							'title'       => esc_html__('Text title Color For Pages', 'revalia'),
							'subtitle'    => esc_html__('Pick your Text title Color For Pages ( default: #1B191D )', 'revalia'),
							'default'     => array(
								'color'     => '#1B191D',
							),
						),

					)
				);

				$this->sections[] = array(
					'icon'   => 'icon icon-ShoppingCart',
					'title'  => esc_html__( 'Shop', 'revalia' ),
					'fields' => array(
						array(
							'id'          => 'header_cart_on_off',
							'type'        => 'switch',
							'title'       => esc_html__('Header Shop Cart.', 'revalia'),
							'subtitle'    => esc_html__('Enabled or Disabled Header Shop Cart.', 'revalia'),
							'on'          => 'Enabled',
							'off'         => 'Disabled',
							'default'     => '0',
						),
						array(
							'id'          => 'featured_box_shop',
							'type'        => 'switch',
							'title'       => esc_html__('Featured Boxes In Shop Pages.', 'revalia'),
							'subtitle'    => esc_html__('Enabled or Disabled Featured Boxes In Shop Pages.', 'revalia'),
							'on'          => 'Enabled',
							'off'         => 'Disabled',
							'default'     => '0',
						),
						array(
							'id'          => 'featured-box-shop-1',
							'type'        => 'slides',
							'title'       => esc_html__( 'Featured Boxes One', 'revalia' ),
							'subtitle'    => esc_html__( 'Add all data for featured boxes one.', 'revalia' ),
							'desc'        => esc_html__( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'revalia' ),
							'placeholder' => array(
								'title'       => esc_html__( 'This is a title', 'revalia' ),
								'description' => esc_html__( 'Description Here', 'revalia' ),
								'url'         => esc_html__( 'Give us a link!', 'revalia' ),
							),
						),
						array(
							'id'          => 'featured-box-shop-2',
							'type'        => 'slides',
							'title'       => esc_html__( 'Featured Boxes Tow', 'revalia' ),
							'subtitle'    => esc_html__( 'Add all data for featured boxes tow.', 'revalia' ),
							'desc'        => esc_html__( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'revalia' ),
							'placeholder' => array(
								'title'       => esc_html__( 'This is a title', 'revalia' ),
								'description' => esc_html__( 'Description Here', 'revalia' ),
								'url'         => esc_html__( 'Give us a link!', 'revalia' ),
							),
						),
						array(
							'id'          => 'featured-box-shop-3',
							'type'        => 'slides',
							'title'       => esc_html__( 'Featured Boxes Three', 'revalia' ),
							'subtitle'    => esc_html__( 'Add all data for featured boxes three.', 'revalia' ),
							'desc'        => esc_html__( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'revalia' ),
							'placeholder' => array(
								'title'       => esc_html__( 'This is a title', 'revalia' ),
								'description' => esc_html__( 'Description Here', 'revalia' ),
								'url'         => esc_html__( 'Give us a link!', 'revalia' ),
							),
						),

					)
				);

				$this->sections[] = array(
					'icon'   => 'icon icon-Heart',
					'title'  => esc_html__( 'Blog Single', 'revalia' ),
					'fields' => array(
						array(
							'id'          => 'featured_box_single_blog',
							'type'        => 'switch',
							'title'       => esc_html__('Featured Box in Single Post Page.', 'revalia'),
							'subtitle'    => esc_html__('Enabled or Disabled Featured Box in Single Post Page.', 'revalia'),
							'on'          => 'Enabled',
							'off'         => 'Disabled',
							'default'     => '0',
						),
						array(
							'id'          => 'related_box_single_blog',
							'type'        => 'switch',
							'title'       => esc_html__('Related Box in Single Post Page.', 'revalia'),
							'subtitle'    => esc_html__('Enabled or Disabled Related Box in Single Post Page.', 'revalia'),
							'on'          => 'Enabled',
							'off'         => 'Disabled',
							'default'     => '1',
						),
					)
				);


				$this->sections[] = array(
					'icon'   => 'icon icon-Share',
					'title'  => esc_html__( 'Social Media', 'revalia' ),
					'fields' => array(
						array(
							'id'         => 'social_media_facebook',
							'type'       => 'text',
										'url'        => true,
							'title'      => esc_html__('Facebook', 'revalia'),
							'desc'       => esc_html__('Facebook URL', 'revalia'),
							'default'    => ''
						),
						array(
							'id'         => 'social_media_twitter',
							'type'       => 'text',
							'title'      => esc_html__('Twitter', 'revalia'),
							'desc'       => esc_html__('Twitter url', 'revalia'),
							'default'    => ''
									),
						array(
							'id'         => 'social_media_google_plus',
							'type'       => 'text',
							'title'      => esc_html__('Google Plus', 'revalia'),
							'desc'       => esc_html__('Google Plus URL', 'revalia'),
							'default'    => ''
									),
						array(
							'id'         => 'social_media_linkedin',
							'type'       => 'text',
							'title'      => esc_html__('Linked In', 'revalia'),
							'desc'       => esc_html__('Linked In URL', 'revalia'),
							'default'    => ''
									),
						array(
							'id'         => 'social_media_pinterest',
							'type'       => 'text',
							'title'      => esc_html__('Pintrest', 'revalia'),
							'desc'       => esc_html__('Pintrest URL', 'revalia'),
							'default'    => ''
									),
						array(
							'id'         => 'social_media_instagram',
							'type'       => 'text',
							'title'      => esc_html__('Instagram', 'revalia'),
							'desc'       => esc_html__('Instagram URL', 'revalia'),
							'default'    => ''
									),
						array(
							'id'         => 'social_media_rss',
							'type'       => 'text',
							'title'      => esc_html__('Rss', 'revalia'),
							'desc'       => esc_html__('Rss URL', 'revalia'),
							'default'    => ''
						),
					)
				);


				$this->sections[] = array(
					'icon'   => 'icon icon-StorageBox',
					'title'  => esc_html__( 'Footer Settings', 'revalia' ),
					'fields' => array(
						array(
							'id'          => 'widget_footer',
							'type'        => 'switch',
							'title'       => esc_html__('Widget Footer Aria.', 'revalia'),
							'subtitle'    => esc_html__('Enabled or Disabled Widget Footer Aria.', 'revalia'),
							'on'          => 'Enabled',
							'off'         => 'Disabled',
							'default'     => 'off',
						),

						array(
							'id'          => 'widget_footer_position',
							'type'        => 'button_set',
							'title'       => esc_html__('Widget Footer Aria Position.', 'revalia'),
							'subtitle'    => esc_html__('You can switch a Widget Footer Aria hare.', 'revalia'),
							'options'     => array(
								'top_footer'         =>  'Top Footer Instgram',
								'bottom_footer'      =>  'Bottom Footer Instgram',
							),
							'default'     => 'top_footer',
						),
						array(
							'id'         => 'credit_txt_introduction',
							'type'       => 'info',
							'style'      => 'success',
							'title'      => esc_html__('Credit Text Footer', 'revalia'),
							'icon'       => 'el-icon-info-sign',
							'desc'       => esc_html__( 'You can add a Credit Text Footer hare.', 'revalia'),
						),

						array(
							'id'         => 'credit_txt',
							'type'       => 'editor',
							'title'      => esc_html__( 'Credit Text', 'revalia' ),
							'default'    => 'Thanks for the visit | <a href="http://themeforest.net/user/codepages">code pages</a> WordPress Theme © 2016',
						),

					)
				);


				$theme_info = '<div class="redux-framework-section-desc">';
				$theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . esc_html__( '<strong>Theme URL:</strong> ', 'revalia' ) . '<a href="' . $this->theme->get( 'ThemeURI' ) . '" target="_blank">' . $this->theme->get( 'ThemeURI' ) . '</a></p>';
				$theme_info .= '<p class="redux-framework-theme-data description theme-author">' . esc_html__( '<strong>Author:</strong> ', 'revalia' ) . $this->theme->get( 'Author' ) . '</p>';
				$theme_info .= '<p class="redux-framework-theme-data description theme-version">' . esc_html__( '<strong>Version:</strong> ', 'revalia' ) . $this->theme->get( 'Version' ) . '</p>';
				$theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get( 'Description' ) . '</p>';
				$tabs = $this->theme->get( 'Tags' );
				if ( ! empty( $tabs ) ) {
					$theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . esc_html__( '<strong>Tags:</strong> ', 'revalia' ) . implode( ', ', $tabs ) . '</p>';
				}
				$theme_info .= '</div>';


				$this->sections[] = array(
					'title'  => esc_html__( 'Import / Export', 'revalia' ),
					'desc'   => esc_html__( 'Import and Export your Redux Framework settings from file, text or URL.', 'revalia' ),
					'icon'   => 'icon icon-PaperClip',
					'fields' => array(
						array(
							'id'         => 'opt-import-export',
							'type'       => 'import_export',
							'title'      => 'Import Export',
							'subtitle'   => 'Save and restore your Redux options',
							'full_width' => false,
						),
					),
				);

				$this->sections[] = array(
					'type' => 'divide',
				);

				$this->sections[] = array(
					'icon'   => 'el-icon-info-sign',
					'title'  => esc_html__( 'Theme Information', 'revalia' ),
					'desc'   => esc_html__( 'This is the Description. Again HTML is allowed', 'revalia' ),
					'fields' => array(
						array(
							'id'      => 'opt-raw-info',
							'type'    => 'raw',
							'content' => $item_info,
						)
					),
				);

            }

            public function setHelpTabs() {

                // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-1',
                    'title'   => esc_html__( 'Theme Information 1', 'revalia' ),
                    'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'revalia' )
                );

                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-2',
                    'title'   => esc_html__( 'Theme Information 2', 'revalia' ),
                    'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'revalia' )
                );

                // Set the help sidebar
                $this->args['help_sidebar'] = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'revalia' );
            }

            /**
             * All the possible arguments for Redux.
             * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
             * */
            public function setArguments() {

                $theme = wp_get_theme(); // For use with some settings. Not necessary.

                $this->args = array(
                    // TYPICAL -> Change these values as you need/desire
                    'opt_name'             => 'revalia_codepage',
                    // This is where your data is stored in the database and also becomes your global variable name.
                    'display_name'         => $theme->get( 'Name' ),
                    // Name that appears at the top of your panel
                    'display_version'      => $theme->get( 'Version' ),
                    // Version that appears at the top of your panel
                    'menu_type'            => 'menu',
                    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                    'allow_sub_menu'       => true,
                    // Show the sections below the admin menu item or not
                    'menu_title'           => esc_html__( 'Revalia Option', 'revalia' ),
                    'page_title'           => esc_html__( 'Revalia Option', 'revalia' ),
                    // You will need to generate a Google API key to use this feature.
                    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                    'google_api_key'       => '',
                    // Set it you want google fonts to update weekly. A google_api_key value is required.
                    'google_update_weekly' => false,
                    // Must be defined to add google fonts to the typography module
                    'async_typography'     => true,
                    // Use a asynchronous font on the front end or font string
                    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                    'admin_bar'            => true,
                    // Show the panel pages on the admin bar
                    'admin_bar_icon'     => 'dashicons-admin-generic',
                    // Choose an icon for the admin bar menu
                    'admin_bar_priority' => 50,
                    // Choose an priority for the admin bar menu
                    'global_variable'      => '',
                    // Set a different name for your global variable other than the opt_name
                    'dev_mode'             => false,
                    // Show the time the page took to load, etc
                    'update_notice'        => true,
                    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                    'customizer'           => true,
                    // Enable basic customizer support
                    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                    // OPTIONAL -> Give you extra features
                    'page_priority'        => null,
                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                    'page_parent'          => 'themes.php',
                    // For a full list of options, visit: http://codex.WordPress.org/Function_Reference/add_submenu_page#Parameters
                    'page_permissions'     => 'manage_options',
                    // Permissions needed to access the options panel.
                    'menu_icon'            => 'dashicons-admin-generic',
                    // Specify a custom URL to an icon
                    'last_tab'             => '',
                    // Force your panel to always open to a specific tab (by id)
                    'page_icon'            => 'icon-themes',
                    // Icon displayed in the admin panel next to your menu_title
                    'page_slug'            => 'codepage_options',
                    // Page slug used to denote the panel
                    'save_defaults'        => true,
                    // On load save the defaults to DB before user clicks save or not
                    'default_show'         => false,
                    // If true, shows the default value next to each field that is not the default value.
                    'default_mark'         => '',
                    // What to print by the field's title if the value shown is default. Suggested: *
                    'show_import_export'   => true,
                    // Shows the Import/Export panel when not used as a field.

                    // CAREFUL -> These options are for advanced use only
                    'transient_time'       => 60 * MINUTE_IN_SECONDS,
                    'output'               => true,
                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                    'output_tag'           => true,
                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                    'database'             => '',
                    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                    'system_info'          => false,
                    // REMOVE

                    // HINTS
                    'hints'                => array(
                        'icon'          => 'icon-question-sign',
                        'icon_position' => 'right',
                        'icon_color'    => 'lightgray',
                        'icon_size'     => 'normal',
                        'tip_style'     => array(
                            'color'   => 'light',
                            'shadow'  => true,
                            'rounded' => false,
                            'style'   => '',
                        ),
                        'tip_position'  => array(
                            'my' => 'top left',
                            'at' => 'bottom right',
                        ),
                        'tip_effect'    => array(
                            'show' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'mouseover',
                            ),
                            'hide' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'click mouseleave',
                            ),
                        ),
                    )
                );

                // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
                $this->args['admin_bar_links'][] = array(
                    'id'    => 'redux-docs',
                    'href'   => 'http://docs.reduxframework.com/',
                    'title' => esc_html__( 'Documentation', 'revalia' ),
                );

                $this->args['admin_bar_links'][] = array(
                    //'id'    => 'redux-supp ort',
                    'href'   => 'https://www.designova.net/support.html',
                    'title' => esc_html__( 'Support', 'revalia' ),
                );



                // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.

                $this->args['share_icons'][] = array(
                    'url'   => 'https://www.facebook.com/CodeThePage',
                    'title' => 'Like us on Facebook',
                    'icon'  => 'el-icon-facebook'
                );
                $this->args['share_icons'][] = array(
                    'url'   => 'https://twitter.com/Kareemuide',
                    'title' => 'Follow us on Twitter',
                    'icon'  => 'el-icon-twitter'
                );

                // Panel Intro text -> before the form
                if ( ! isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
                    if ( ! empty( $this->args['global_variable'] ) ) {
                        $v = $this->args['global_variable'];
                    } else {
                        $v = str_replace( '-', '_', $this->args['opt_name'] );
                    }
                    $this->args['intro_text'] = sprintf( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>',$v);
                } else {
                    $this->args['intro_text'] =esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'revalia' );
                }
            }

            public function validate_callback_function( $field, $value, $existing_value ) {
                $error = true;
                $value = 'just testing';

                /*
              do your validation

              if(something) {
                $value = $value;
              } elseif(something else) {
                $error = true;
                $value = $existing_value;

              }
             */

                $return['value'] = $value;
                $field['msg']    = 'your custom error message';
                if ( $error == true ) {
                    $return['error'] = $field;
                }

                return $return;
            }

            public function class_field_callback( $field, $value ) {
                print_r( $field );
                echo '<br/>CLASS CALLBACK';
                print_r( $value );
            }

        }

        global $reduxConfig;
        $reduxConfig = new Redux_Framework_sample_config();
    } else {
        echo "The class named Redux_Framework_sample_config has already been called. <strong>Developers, you need to prefix this class with your company name or you'll run into problems!</strong>";
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ):
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    endif;

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ):
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error = true;
            $value = 'just testing';

            /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;

          }
         */

            $return['value'] = $value;
            $field['msg']    = 'your custom error message';
            if ( $error == true ) {
                $return['error'] = $field;
            }

            return $return;
        }
    endif;
