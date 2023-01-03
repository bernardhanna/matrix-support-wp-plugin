<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2022-10-20 10:52:11
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2023-01-03 15:58:48
 */
if ( ! function_exists( 'crb_initilize_carbon_fields' ) ) {
  function mh_admin_improvements() {
    /**
     * Remove WordPress admin bar
     *  
     *  @since  1.0.0
    */
    $no_adminbar = carbon_get_theme_option( 'crb_disable_adminbar' );
    if ( $no_adminbar == true ) {
    function mh_remove_admin_bar() {
        remove_action( 'wp_head', '_admin_bar_bump_cb' );
        add_filter( 'show_admin_bar', '__return_false' );
      }
    }
    add_action( 'get_header', 'mh_remove_admin_bar' );
	}
	add_action( 'carbon_fields_register_fields', 'mh_admin_improvements' );
} 