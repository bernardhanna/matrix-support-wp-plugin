<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2022-10-20 10:51:19
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2023-01-03 15:18:51
 */
if ( ! function_exists( 'crb_initilize_carbon_fields' ) ) {
  function mh_general_improvements() {
    /**
     * Specify which users can see admin menu items based on their email address
     */
    function mh_disable_mh_matrix_staff() {
      $user_data = get_userdata( get_current_user_id() );
      $user_email = isset( $user_data->user_email ) ? $user_data->user_email : '';
      if ( ! strpos( $user_email, '@matrixinternet.ie' ) ) {
            $disable_mh_clients = carbon_get_theme_option( 'crb_disable_mh_clients' );
            if ( $disable_mh_clients == true ) { 
              add_action( 'admin_head', 'mh_remove_mh_menus' );
              function  mh_remove_mh_menus() { ?>
                <style>
                  #toplevel_page_matrix-helper {
                    display: none!important;
                    visibility: hidden;
                  }
                </style>
              <?php
              }
            }
        }
      }
      add_action( 'admin_menu', 'mh_disable_mh_matrix_staff' );
    /**
     * Completley disable comments sitewide
     * @since  1.0.0
    */
    $no_comments = carbon_get_theme_option( 'crb_disable_comments' );
    if ( $no_comments == true ) {
    function mh_disable_comments_post_types_support() {
          // Removes from admin menu
        add_action( 'admin_menu', 'mh_remove_admin_menus' );
        function mh_remove_admin_menus() {
            remove_menu_page( 'edit-comments.php' );
        }
        // Removes from post and pages
        add_action('init', 'mh_remove_comment_support', 100);
        function mh_remove_comment_support() {
            remove_post_type_support( 'post', 'comments' );
            remove_post_type_support( 'page', 'comments' );
        }
        // Removes from admin bar
        add_action( 'wp_before_admin_bar_render', 'mh_remove_comments_admin_bar' );
        function mh_remove_comments_admin_bar() {
            global $wp_admin_bar;
            $wp_admin_bar->remove_menu('comments');
          }
        }
        add_action('init', 'mh_disable_comments_post_types_support');
      }
    }
  add_action( 'carbon_fields_register_fields', 'mh_general_improvements' );
} 