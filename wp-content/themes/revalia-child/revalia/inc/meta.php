<?php
add_filter( 'rwmb_meta_boxes', 'meta_box_show_hide_demo_register' );
/**
 * Register meta boxes
 *
 * @param array $meta_boxes
 *
 * @return array
 */
function meta_box_show_hide_demo_register( $meta_boxes ) {

    $meta_boxes[] = array(
        'title'     => esc_html__( 'Contact Page', 'revalia' ),
        'tab_style' => 'default',
		    'pages'    => array( 'page' ),
        'fields'    => array(
            array(
                'name'    => esc_html__( 'Selected the Google Maps ', 'revalia' ),
                'id'      => 'contant_map',
                'type'    => 'map',
        				'zoom'        => 10,
        				'std'           => '44.624149,-78.5463',
            ),
            array(
                'name' => esc_html__( 'Mark Map Title Text Tap', 'revalia' ),
                'id'   => 'markmap_text',
                'type' => 'text',
                'tab'  => 'markmap_text',
            ),
            array(
                'name' => esc_html__( 'Mark Map Description Tap', 'revalia' ),
                'id'   => 'markmap_textarea',
                'type' => 'textarea',
                'tab'  => 'markmap_textarea',
            ),
        ),
    );

    $meta_boxes[] = array(
    'title'     => esc_html__( 'Header Single Post Images', 'revalia' ),
		'pages'    => array( 'post'),
        'fields'    => array(
            array(
                'name'    => esc_html__( 'You can switch a Header Single Post Images hare.', 'revalia' ),
                'id'      => 'header_single',
                'type'    => 'select_advanced',
                'options' => array(
                    'header_single_style1'   => esc_html__( 'Header Single Style1', 'revalia' ),
                    'header_single_style2'    => esc_html__( 'Header Single Style2', 'revalia' ),
                ),
               'std' => 'header_single_style1',
            ),
        ),
    );

    $meta_boxes[] = array(
        'title'     => esc_html__( 'Video Format Post Tap', 'revalia' ),
        'fields'    => array(
            array(
                'name' => esc_html__( 'Embed your Video Url', 'revalia' ),
                'id'   => 'embed_video',
                'type' => 'text',
            ),
        ),
    );

    $meta_boxes[] = array(
        'title'     => esc_html__( 'Audio Format Post Tap', 'revalia' ),
        'fields'    => array(
            array(
                'name' => esc_html__( 'Embed Your Audio iframe Code', 'revalia' ),
                'id'   => 'embed_audio',
                'type' => 'text',
            ),
        ),
    );

    $meta_boxes[] = array(
        'title'     => esc_html__( 'Quote Format Post Tap', 'revalia' ),
        'fields'    => array(
            array(
                'name' => esc_html__( 'Quote Text', 'revalia' ),
                'id'   => 'quote_text',
                'type' => 'textarea',
                'tab'  => 'quote_text',
            ),
            array(
                'name' => esc_html__( 'Quote Name', 'revalia' ),
                'id'   => 'quote_name',
                'type' => 'text',
                'tab'  => 'quote_name',
            ),
        ),
    );

    $meta_boxes[] = array(
        'title'     => esc_html__( 'Link Format Post Tap', 'revalia' ),
        'fields'    => array(
            array(
                'name' => esc_html__( 'Title Link in post', 'revalia' ),
                'id'   => 'title_link',
                'type' => 'text',
                'tab'  => 'bio',
            ),
            array(
                'name' => esc_html__( 'Url Link in post', 'revalia' ),
                'id'   => 'url_link',
                'type' => 'text',
                'tab'  => 'interest',
            ),
        ),
    );

    $meta_boxes[] = array(
        'title'     => esc_html__( 'Gallery Images Post Tap', 'revalia' ),
        'fields'    => array(
            array(
                'name' => esc_html__( 'Gallery images', 'revalia' ),
                'id'   => 'gallery_images',
                'type' => 'plupload_image',
				'width'       => 750,
				'height'      => 350,
            ),
        ),
    );

    return $meta_boxes;
}
