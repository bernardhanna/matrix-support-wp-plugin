<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2022-12-15 16:58:23
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2023-01-03 14:38:49
 */
/**
 * Specify which users can see admin menu items based on their email address
 */
 function mh_clean_up_wp_admin() {
  $user_data = get_userdata( get_current_user_id() );
  $user_email = isset( $user_data->user_email ) ? $user_data->user_email : '';

  if ( ! strpos( $user_email, '@matrixinternet.ie' ) ) {
    /**
     * Disable Wordpress logo from admin toolbar
     *
     * @since  1.0.0
    */
    $no_wp_logo = carbon_get_theme_option( 'crb_disable_wordpress_logo' );
    if ( $no_wp_logo == true ) {  
      function mh_admin_bar_remove_logo() {
          global $wp_admin_bar;
          $wp_admin_bar->remove_menu( 'wp-logo' );
        }
      add_action( 'wp_before_admin_bar_render', 'mh_admin_bar_remove_logo' );
    }
    /**
    *  Try to Remove some notices from dashboard.
    *
    *  @since  1.0.0
    */
    $no_admin_notices = carbon_get_theme_option( 'crb_disable_notices' );
    if ( $no_admin_notices == true ) {
    function matrix_helper_clean_admin_notices() {
        remove_all_actions( 'admin_notices' );
      }
    add_action( 'admin_init', 'matrix_helper_clean_admin_notices', 999 );
    }
        /**
     * Remove the additional CSS section from the Customizer.
     *
     * @param object $wp_customize WP_Customize_Manager.
     * @since  1.0.0
     */
    $no_customiser_css = carbon_get_theme_option( 'crb_disable_custom_css' );
    if ( $no_customiser_css == true ) {
    function mhp_customizer_remove_css_section( $wp_customize ) {
        $wp_customize->remove_section( 'custom_css' );
      }
    add_action( 'customize_register', 'mhp_customizer_remove_css_section', 15 );
    } 
        /**
     * Hide WP updates nag.`
     *
     * @since  1.0.0
    */
    $no_update_notices = carbon_get_theme_option( 'crb_disable_updates_notices' );
    if ( $no_update_notices == true ) {
      function matrix_helper_wphidenag() {
        remove_action( 'admin_notices', 'update_nag' );
      }
      add_action( 'admin_menu', 'matrix_helper_wphidenag' );
    } 
    /**
     * Hide all WP update nags with styles.
     *
     * @since  1.0.0
     */
    $no_update_notices = carbon_get_theme_option( 'crb_disable_updates_notices' );
    if ( $no_update_notices == true ) { 
      function matrix_helper_hide_nag_styles() { ?>
        <style>
          .update-nag,
          .update-nag.notice.notice-warning.inline,
          #wp-admin-bar-updates,
          #menu-plugins .update-plugins,
          #update-nag,
          .theme-info .notice,
          .wp-heading-inline .theme-count,
          table.plugins .update-message,
          .theme-browser .update-message,
          body.plugins-php ul.subsubsub li.upgrade {
            display: none;
            visibility: hidden;
          }

          .plugin-update-tr {
            height: 1px;
          }
        </style>
      <?php
      }
      add_action( 'admin_head', 'matrix_helper_hide_nag_styles' );
    }
    /**
     * Removing dashboard widgets.
     * @since  1.0.0
     * @link https://developer.wordpress.org/reference/functions/remove_meta_box/
    */
    add_action( 'wp_dashboard_setup', function () {
      $no_welcome = carbon_get_theme_option( 'crb_disable_welcome_panel' );
        if ( $no_welcome == true ) {  
          // Remove the 'Welcome' panel
          remove_action( 'welcome_panel', 'wp_welcome_panel' );
        }
        $no_site_health = carbon_get_theme_option( 'crb_disable_site_health' );
        if ( $no_site_health == true ) {  
          // Remove 'Site health' metabox
          remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
        }
        $no_at_a_glance = carbon_get_theme_option( 'crb_disable_at_a_glance' );
        if ( $no_at_a_glance == true ) { 
          // Remove the 'At a Glance' metabox
          remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        }
        $no_activity_box = carbon_get_theme_option( 'crb_disable_activity_box' );
        if ( $no_at_a_glance == true ) { 
        // Remove the 'Activity' metabox
          remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
        }
        $no_wp_news = carbon_get_theme_option( 'crb_disable_wp_news' );
        if ( $no_wp_news == true ) { 
          // Remove the 'WordPress News' metabox
          remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        }
        $no_quick_press = carbon_get_theme_option( 'crb_disable_quick_press' );
        if ( $no_quick_press == true ) { 
          // Remove the 'Quick Draft' metabox
          remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        }
        $no_update_subpage = carbon_get_theme_option( 'crb_disable_update_subpage' );
        if ( $no_update_subpage == true ) { 
         // Hide Updates under Dashboard menu
         remove_submenu_page( 'index.php', 'update-core.php' );
        }
        $no_plugin_dashboard_menu = carbon_get_theme_option( 'crb_disable_plugins' );
        if ( $no_plugin_dashboard_menu == true ) { 
         // Hide Plugins
         remove_menu_page( 'plugins.php' );
        }
        $no_themes_dashboard_menu = carbon_get_theme_option( 'crb_disable_themes' );
        if ( $no_themes_dashboard_menu == true ) { 
         // Hide Themes, Customizer and Widgets under Appearance menu
         remove_submenu_page( 'themes.php', 'themes.php' );
         remove_submenu_page( 'themes.php', 'customize.php?return=' . urlencode( $_SERVER['REQUEST_URI'] ) );
         remove_submenu_page( 'themes.php', 'widgets.php' );
         remove_submenu_page( 'themes.php', 'site-editor.php' );
        }
        $no_tools_dashboard_menu = carbon_get_theme_option( 'crb_disable_tools' );
        if ( $no_tools_dashboard_menu == true ) { 
         // Hide Tools
         remove_menu_page( 'tools.php' );
        }
        $no_general_dashboard_menu = carbon_get_theme_option( 'crb_disable_general' );
        if ( $no_general_dashboard_menu == true ) { 
         // Hide General Settings
          remove_menu_page( 'options-general.php' );
          remove_menu_page( 'options-writing.php' );
          remove_menu_page( 'options-reading.php' );
          remove_menu_page( 'options-discussion.php' );
          remove_menu_page( 'options-media.php' );
          remove_menu_page( 'options-permalink.php' );
          remove_menu_page( 'options-privacy.php' );
          remove_menu_page( 'options-general.php?page=login-as-user' );
        }
    });
  }
}
add_action( 'admin_menu', 'mh_clean_up_wp_admin' );