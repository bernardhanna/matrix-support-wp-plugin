<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2022-10-20 16:06:39
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2022-10-30 15:24:42
 */
if ( in_array( 'matrix-helper/matrix-helper.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
/**
 * Modify excerpt length
 */
 
function mh_excerpt_length( $length ) {
    return carbon_get_theme_option( 'crb_modify_excerpt' );
}
add_filter( 'excerpt_length', 'mh_excerpt_length', 999 );

/**
 * Add lead class to first paragraph
 */

function mh_lead_paragraph( $content ) {
  $lead_p = carbon_get_theme_option( 'crb_add_lead_p' );
  if ( $lead_p == 2 ) {
   return preg_replace( '/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1 );
  } else {
    return $content;
  }
}
add_filter( 'the_content', 'mh_lead_paragraph' );

} //END OF IF STATEMENT