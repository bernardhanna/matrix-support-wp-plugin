<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2022-10-20 10:52:26
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2023-01-03 15:10:27
 */
if ( ! function_exists( 'crb_initilize_carbon_fields' ) ) {
  function mh_footer_improvements() {
  /**
   * Modify admin footer text
   */
  $admin_footer = carbon_get_theme_option( 'crb_change_admin_footer_text' );
  if ( $admin_footer == true ) {
    function mh_modify_footer() {
      echo 'Created by <a href="https://www.matrixinternet.ie/">Matrix Internet</a>.';
      }
    add_filter( 'admin_footer_text', 'mh_modify_footer' );
    }
  }
  add_action( 'carbon_fields_register_fields', 'mh_footer_improvements' );
}