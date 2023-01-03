<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2022-10-20 10:51:52
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2023-01-03 15:00:43
 */
if ( ! function_exists( 'crb_initilize_carbon_fields' ) ) {
  function mh_security_improvements() {
    /**
     * Disable Wordpress Generator Version
     */
    $no_version = carbon_get_theme_option( 'crb_disable_version' );
    if ( $no_version == true ) {
      function mhp_disable_version() {
          remove_action('wp_head', 'wp_generator');
      }
      add_action( 'init', 'mhp_disable_version' );
    }
    /**
     * Disable xmlrpc.php
     */
    $no_xmlrpc = carbon_get_theme_option( 'crb_disable_xmlrpc' );
    if ( $no_xmlrpc == true ) {
      function mhp_disable_xmlrpc() {
          add_filter( 'xmlrpc_enabled', '__return_false' );
          remove_action( 'wp_head', 'rsd_link' );
          remove_action( 'wp_head', 'wlwmanifest_link' );
      }
      add_action( 'init', 'mhp_disable_xmlrpc' );
    }
  }
  add_action( 'carbon_fields_register_fields', 'mh_security_improvements' );
} 