<?php
/**
* Plugin Name: Revalia User Profile Social Icons
* Plugin URI: http://code-pages.com/
* Description: A part of revalia theme.
* Version: 1.0
* Author: Codepage Team
* Author URI: http://www.code-pages.com
* License: "revalia"
*/

//AUTHOR SOCIAL LINKS
function revalia_social_user_profile($user_fields) {
  $user_fields['facebook'] 			= esc_html__( 'Facebook URL', 'revalia' );
  $user_fields['twitter'] 			= esc_html__( 'Twitter URL', 'revalia' );
  $user_fields['googleplus'] 		= esc_html__( 'Google Plus URL', 'revalia' );
  $user_fields['linkedin'] 			= esc_html__( 'Linkedin URL', 'revalia' );
  $user_fields['tumblr'] 				= esc_html__( 'Tumblr URL', 'revalia' );
  $user_fields['pinterest'] 		= esc_html__( 'Pinterest URL', 'revalia' );
  $user_fields['instagram'] 		= esc_html__( 'Instagram URL', 'revalia' );
  $user_fields['youtube'] 			= esc_html__( 'Youtube URL', 'revalia' );
  $user_fields['vimeo'] 				= esc_html__( 'Vimeo URL', 'revalia' );
  return $user_fields;
}
add_action( 'user_contactmethods', 'revalia_social_user_profile' );
