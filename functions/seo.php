<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2022-10-20 11:35:40
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2023-01-03 15:25:12
 */
if ( ! function_exists( 'crb_initilize_carbon_fields' ) ) {
  function mh_seo_improvements() {
  /**
   *  Set Yoast SEO plugin metabox priority to low.
   *  @since  1.0.0
   */
    $hide_yoast = carbon_get_theme_option( 'crb_hide_yoast' );
    if ( $hide_yoast == true ) {
      function mh_hide_wordpress_seo_menus() {
        $user_data = get_userdata( get_current_user_id() );
        $user_email = isset( $user_data->user_email ) ? $user_data->user_email : '';
          if ( ! strpos( $user_email, '@matrixinternet.ie' ) ) {
                remove_menu_page('wpseo_dashboard');
                //Hide "Yoast SEO → General".
                remove_submenu_page('wpseo_dashboard', 'wpseo_dashboard');
                //Hide "Yoast SEO → Integrations".
                remove_submenu_page('wpseo_dashboard', 'wpseo_integrations');
                //Hide "Yoast SEO → Search Appearance".
                remove_submenu_page('wpseo_dashboard', 'wpseo_titles');
                //Hide "Yoast SEO → Social".
                remove_submenu_page('wpseo_dashboard', 'wpseo_social');
                //Hide "Yoast SEO → Tools".
                remove_submenu_page('wpseo_dashboard', 'wpseo_tools');
                //Hide "Yoast SEO → Premium".
                remove_submenu_page('wpseo_dashboard', 'wpseo_licenses');
                //Hide "Yoast SEO → Workouts".
                remove_submenu_page('wpseo_dashboard', 'wpseo_workouts');
                //Hide "Yoast SEO → Redirects".
                remove_submenu_page('wpseo_dashboard', 'wpseo_redirects');
          }
        }
        add_action('admin_menu', 'mh_hide_wordpress_seo_menus', 12);
    }
  /**
   *  Set Yoast SEO plugin metabox priority to low.
   *  @since  1.0.0
   */
  $move_yoastbox = carbon_get_theme_option( 'crb_move_yoast' );
    if ( $move_yoastbox == true ) {
      function mh_lowpriority_yoastseo() {
        return 'low';
      }
    add_filter( 'wpseo_metabox_prio', 'mh_lowpriority_yoastseo' );
  } 
  /**
   * Removes Yoast SEO comment in head
   * @since  1.0.0
   */
  $no_yoast_comment = carbon_get_theme_option( 'crb_disable_yoast_comments' );
  if ( $no_yoast_comment == true ) {
  function mh_remove_yoast_comments () {
        return false;
      }
    add_filter ( 'wpseo_debug_markers', 'mh_remove_yoast_comments' );
  }
  /**
   * Remove Yoast roles
   *  @since  1.0.0
   */
  $no_yoast_user_role = carbon_get_theme_option( 'crb_disable_yoast_user_role' );
  if ( $no_yoast_user_role == true ) {
  function mh_remove_yoast_user_roles () {
        if ( get_role( 'wpseo_manager' ) ) {
          remove_role( 'wpseo_manager' );
        }
        if ( get_role( 'wpseo_editor' ) ) {
          remove_role( 'wpseo_editor' );
        }
      }
    add_action( 'admin_init', 'mh_remove_yoast_user_roles' );
  }
  /**
   * Remove Yoast settings from admin bar
    * @since  1.0.0
  */
  $no_yoast_admin_bar = carbon_get_theme_option( 'crb_disable_yoast_admin_bar' );
  if ( $no_yoast_admin_bar == true ) {
  function mh_remove_yoast_admin_bar() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu( 'wpseo-menu' );
      }
    add_action( 'wp_before_admin_bar_render', 'mh_remove_yoast_admin_bar' ,999 );
  }
  /**
   * Remove Yoast metabox on dashboard
     * @since  1.0.0
   */
  $no_yoast_dashboard = carbon_get_theme_option( 'crb_disable_yoast_dashboard' );
    if ( $no_yoast_dashboard == true ) {
    function mh_remove_yoast_dashboard() {
        remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
        }
      add_action( 'wp_dashboard_setup', 'mh_remove_yoast_dashboard' );
    }
  }
  add_action( 'carbon_fields_register_fields', 'mh_seo_improvements' );
} 