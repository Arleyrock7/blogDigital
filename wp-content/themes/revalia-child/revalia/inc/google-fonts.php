<?php
function revalia_fonts_url() {
    $fonts_url = '';

    $Montserrat   = _x( 'on', 'Montserrat font: on or off', 'revalia' );
    $Lato         = _x( 'on', 'Lato font: on or off', 'revalia' );
    $OpenSans     = _x( 'on', 'Open Sans font: on or off', 'revalia' );

    if ( 'off' !== $Montserrat || 'off' !== $OpenSans ) {
        $font_families = array();

        if ( 'off' !== $Montserrat ) {
          $font_families[] = 'Montserrat:400,600,700';
        }
        if ( 'off' !== $OpenSans ) {
          $font_families[] = 'Open+Sans:400italic,400,700,600,300,800';
        }
        if ( 'off' !== $Lato ) {
          $font_families[] = 'Lato:400,700';
        }


        $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );

}

function revalia_font_styles() {
    wp_enqueue_style( 'revalia-fonts', revalia_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'revalia_font_styles' );
