<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2022-10-18 15:46:22
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2023-01-03 14:57:10
 */
if ( ! function_exists( 'crb_initilize_carbon_fields' ) ) {
  function mh_performance_improvements() {
    /**
     * Add Instant Page Script to help boost performance by preloading content
     * @since  1.0.0
     */
    $add_instantpage = carbon_get_theme_option( 'crb_add_instantpage' );
    if ( $add_instantpage == true ) {
      function mhp_add_instant_page() {
          wp_deregister_script( 'instantpage' );
          wp_enqueue_script( 'instantpage', 'https://cdnjs.cloudflare.com/ajax/libs/instant.page/5.1.1/instantpage.min.js', false, null, true);
      }
      add_action( 'wp_footer', 'mhp_add_instant_page' );
    }
    /**
     * Disable Emoji mess
     * @since  1.0.0
     */
    $no_emojis = carbon_get_theme_option( 'crb_disable_emoji' );
    if ( $no_emojis == true ) {
    function mhp_disable_wp_emojicons() {
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
        add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
        add_filter( 'emoji_svg_url', '__return_false' );
    }
    add_action( 'init', 'mhp_disable_wp_emojicons' );
    }
  /**
   * Disable Embeds
   * @since  1.0.0
   */
  $no_embeds = carbon_get_theme_option( 'crb_disable_embeds' );
  if ( $no_embeds == true ) {
    function mh_deregister_embeds() {
          wp_dequeue_script( 'wp-embed' );
        }
    add_action( 'wp_footer', 'mh_deregister_embeds' );
  }
  /**
   * Disable jQuery Migrate
   * @since  1.0.0
   */
  if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
    $no_jquery_migrate = carbon_get_theme_option( 'crb_disable_jquery_migrate' );
    if ( $no_jquery_migrate == true ) {
    function mh_remove_jquery_migrate( $scripts ) {
          $script = $scripts->registered['jquery'];
          
          if ( $script->deps ) { 
            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
          }
        }
    }
    add_action( 'wp_default_scripts', 'mh_remove_jquery_migrate' );
  }
  /**
   * Remove password strength check.
     * @since  1.0.0
   */
  $no_wp_meter = carbon_get_theme_option( 'crb_disable_password_strength_meter' );
    if ( $no_wp_meter == true ) {
    function mh_remove_password_strength() {
        wp_dequeue_script('password-strength-meter');
      }
      add_action( 'wp_print_scripts', 'mh_remove_password_strength', 10 );
    }
  }
  add_action( 'carbon_fields_register_fields', 'mh_performance_improvements' );
} 