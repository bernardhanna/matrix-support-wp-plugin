<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2022-10-20 10:52:19
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2023-01-03 16:00:57
 */
if ( ! function_exists( 'crb_initilize_carbon_fields' ) ) {
  function mh_head_improvements() {
  /**
   * Disable Dash Icons
   * @since  1.0.0
   */
  $no_dash_icons = carbon_get_theme_option( 'crb_disable_dash_icons' );
  if ( $no_dash_icons == true ) { 
  function mh_remove_dashicons() { 
      if (!is_admin_bar_showing()) { wp_deregister_style( 'dashicons' ); }
    }
    add_action( 'wp_print_styles', 'mh_remove_dashicons' );
  }
  /**
   * Disable RSS Feeds
   * @since  1.0.0
   */
  $no_feeds = carbon_get_theme_option( 'crb_disable_feeds' );
  if ( $no_feeds == true ) { 
  function mh_disable_feed() {
      add_filter( 'feed_links_show_comments_feed', '__return_false' );
      add_action( 'feed_links_show_posts_feed','__return_false' );
    }
    add_action( 'init', 'mh_disable_feed' );
  }
  /**
   * Remove Gutenberg Block Library CSS from loading on the frontend
   * @since  1.0.0
   */
  $no_gb_styles = carbon_get_theme_option( 'crb_disable_gb_styles' );
  if ( $no_gb_styles == true ) { 
  function mh_remove_wp_block_library_css() {
      wp_dequeue_style( 'wp-block-library' );
      wp_dequeue_style( 'wp-block-library-theme' );
      wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
    }
    add_action( 'wp_enqueue_scripts', 'mh_remove_wp_block_library_css', 100 );
  } 
}
add_action( 'carbon_fields_register_fields', 'mh_head_improvements' );
} 