<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2022-11-03 11:19:48
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2023-01-03 16:25:08
 */
/**
 * Specify which users can see admin menu items based on their email address
 */
function mh_clean_up_wp_plugins() {
  $user_data = get_userdata( get_current_user_id() );
  $user_email = isset( $user_data->user_email ) ? $user_data->user_email : '';
  if ( ! strpos( $user_email, '@matrixinternet.ie' ) ) {
  /**
   * Hide ACF menu item from the admin menu.
     * @since  1.0.0
   */
  $no_acf_menu = carbon_get_theme_option( 'crb_disable_acf_menu' );
  if ( $no_acf_menu == true ) {  
  function mh_hide_advanced_custom_fields_menus() { 
    //Hide "Custom Fields".
    remove_menu_page('edit.php?post_type=acf-field-group');
    //Hide "Custom Fields → Field Groups".
    remove_submenu_page('edit.php?post_type=acf-field-group', 'edit.php?post_type=acf-field-group');
    //Hide "Custom Fields → Add New".
    remove_submenu_page('edit.php?post_type=acf-field-group', 'post-new.php?post_type=acf-field-group');
    //Hide "Custom Fields → Tools".
    remove_submenu_page('edit.php?post_type=acf-field-group', 'acf-tools');
    }
    add_action('admin_menu', 'mh_hide_advanced_custom_fields_menus', 21);
  }
  /**
   * Hide AIOWPS menu item from the admin menu.
     * @since  1.0.0
   */
  $no_aiowps_menu = carbon_get_theme_option( 'crb_disable_aiowps_menu' );
  if ( $no_aiowps_menu == true ) {
  function mh_hide_aiowps_custom_fields_menus() {   
    //Hide "WP Security".
    remove_menu_page('aiowpsec');
    //Hide "WP Security → Dashboard".
    remove_submenu_page('aiowpsec', 'aiowpsec');
    //Hide "WP Security → Settings".
    remove_submenu_page('aiowpsec', 'aiowpsec_settings');
    //Hide "WP Security → User Accounts".
    remove_submenu_page('aiowpsec', 'aiowpsec_useracc');
    //Hide "WP Security → User Login".
    remove_submenu_page('aiowpsec', 'aiowpsec_userlogin');
    //Hide "WP Security → User Registration".
    remove_submenu_page('aiowpsec', 'aiowpsec_user_registration');
    //Hide "WP Security → Database Security".
    remove_submenu_page('aiowpsec', 'aiowpsec_database');
    //Hide "WP Security → Filesystem Security".
    remove_submenu_page('aiowpsec', 'aiowpsec_filesystem');
    //Hide "WP Security → Blacklist Manager".
    remove_submenu_page('aiowpsec', 'aiowpsec_blacklist');
    //Hide "WP Security → Firewall".
    remove_submenu_page('aiowpsec', 'aiowpsec_firewall');
    //Hide "WP Security → Brute Force".
    remove_submenu_page('aiowpsec', 'aiowpsec_brute_force');
    //Hide "WP Security → Spam Prevention".
    remove_submenu_page('aiowpsec', 'aiowpsec_spam');
    //Hide "WP Security → Scanner".
    remove_submenu_page('aiowpsec', 'aiowpsec_filescan');
    //Hide "WP Security → Maintenance".
    remove_submenu_page('aiowpsec', 'aiowpsec_maintenance');
    //Hide "WP Security → Miscellaneous".
    remove_submenu_page('aiowpsec', 'aiowpsec_misc');
    //Hide "WP Security → Tools".
    remove_submenu_page('aiowpsec', 'aiowpsec_tools');
    //Hide "WP Security → Two Factor Auth".
    remove_submenu_page('aiowpsec', 'aiowpsec_two_factor_auth_user');
    //Hide "WP Security → Premium Upgrade".
    remove_submenu_page('aiowpsec', 'admin.php?page=aiowpsec&tab=premium-upgrade');
    }
    add_action('admin_menu', 'mh_hide_aiowps_custom_fields_menus', 41);
  }
  /**
   * Hide Elementor menu items from the admin menu.
     * @since  1.0.0
   */
  $no_elementor_menu = carbon_get_theme_option( 'crb_disable_elementor_menu' );
  if ( $no_elementor_menu == true ) {  
    function mh_hide_elementor_menus() { 
      //Hide "Elementor".
      remove_menu_page('elementor');
      //Hide "Elementor → Settings".
      remove_submenu_page('elementor', 'elementor');
      //Hide "Elementor → Role Manager".
      remove_submenu_page('elementor', 'elementor-role-manager');
      //Hide "Elementor → Tools".
      remove_submenu_page('elementor', 'elementor-tools');
      //Hide "Elementor → System Info".
      remove_submenu_page('elementor', 'elementor-system-info');
      //Hide "Elementor → Getting Started".
      remove_submenu_page('elementor', 'elementor-getting-started');
      //Hide "Elementor → Get Help".
      remove_submenu_page('elementor', 'go_knowledge_base_site');
      //Hide "Elementor → Submissions".
      remove_submenu_page('elementor', 'e-form-submissions');
      //Hide "Elementor → Custom Fonts".
      remove_submenu_page('elementor', 'elementor_custom_fonts');
      //Hide "Elementor → Custom Icons".
      remove_submenu_page('elementor', 'elementor_custom_icons');
      //Hide "Elementor → Custom Code".
      remove_submenu_page('elementor', 'elementor_custom_custom_code');
      //Hide "Elementor → Upgrade".
      remove_submenu_page('elementor', 'go_elementor_pro');
      //Hide "Templates".
      remove_menu_page('edit.php?post_type=elementor_library');
      //Hide "Templates → Saved Templates".
      remove_submenu_page('edit.php?post_type=elementor_library', 'edit.php?post_type=elementor_library&tabs_group=library');
      //Hide "Templates → Theme Builder".
      remove_submenu_page('edit.php?post_type=elementor_library', 'http://127.0.0.1/wp-admin/admin.php?page=elementor-app&ver=3.8.0#site-editor/promotion');
      //Hide "Templates → Landing Pages".
      remove_submenu_page('edit.php?post_type=elementor_library', 'e-landing-page');
      //Hide "Templates → Kit Library".
      remove_submenu_page('edit.php?post_type=elementor_library', 'http://127.0.0.1/wp-admin/admin.php?page=elementor-app&ver=3.8.0#/kit-library');
      //Hide "Templates → Popups".
      remove_submenu_page('edit.php?post_type=elementor_library', 'popup_templates');
      //Hide "Templates → Add New".
      remove_submenu_page('edit.php?post_type=elementor_library', 'http://127.0.0.1/wp-admin/edit.php?post_type=elementor_library#add_new');
      //Hide "Templates → Categories".
      remove_submenu_page('edit.php?post_type=elementor_library', 'edit-tags.php?taxonomy=elementor_library_category&post_type=elementor_library');
      }
      add_action('admin_menu', 'mh_hide_elementor_menus', 201);
  }
  /**
   * Disable  Elementor Post Attributes Dashboard Widgets.
     * @since  1.0.0
   */
  $no_elementor_dashboard_pa_widgets = carbon_get_theme_option( 'crb_disable_elementor_pa_dashboard_widgets' );
    if ( $no_elementor_dashboard_pa_widgets == true ) {
    function mh_remove_elementor_dashboard_pa_widgets() {
        remove_meta_box('pageparentdiv', $screen->id, 'side');
      }
    add_action('add_meta_boxes', 'mh_remove_elementor_pa_dashboard_widgets', 20);
  }
  /**
   * Disable  Elementor Post Attributes Dashboard Widgets.
     * @since  1.0.0
   */
  $no_elementor_overview = carbon_get_theme_option( 'crb_disable_elementor_overview' );
  if ( $no_elementor_overview == true ) {
  function mh_remove_elementor_overview() {
      remove_meta_box('e-dashboard-overview', 'dashboard', 'normal');
    }
    add_action('wp_dashboard_setup', 'mh_remove_elementor_overview', 40);
  }
  /**
   * Disable dashboard widget for WP Mail SMTP plugin
     * @since  1.0.0
   */
  $no_wp_mail_smtp_dashboard_widgets = carbon_get_theme_option( 'crb_disable_wp_mail_smtp_dashboard_widgets' );
    if ( $no_wp_mail_smtp_dashboard_widgets == true ) {  
      function mh_hide_wp_mail_smtp_dashboard_widgets() {
          remove_meta_box( 'wp_mail_smtp_dashboard_widget', 'dashboard', 'normal' );
          remove_meta_box( 'wp_mail_smtp_reports_widget_lite', 'dashboard', 'normal' );
        }
    add_action('wp_dashboard_setup', 'mh_hide_wp_mail_smtp_dashboard_widgets');
  }
  /**
   * Disable WP Mail dashboard menu item
     * @since  1.0.0
   */
  $no_wp_mail_smtp_menu = carbon_get_theme_option( 'crb_disable_wp_mail_smtp_menu' );
  if ( $no_wp_mail_smtp_menu == true ) {
  function mh_hide_wp_mail_smtp_menus() {
      //Hide "WP Mail SMTP".
      remove_menu_page('wp-mail-smtp');
      //Hide "WP Mail SMTP → Settings".
      remove_submenu_page('wp-mail-smtp', 'wp-mail-smtp');
      //Hide "WP Mail SMTP → Email Log".
      remove_submenu_page('wp-mail-smtp', 'wp-mail-smtp-logs');
      //Hide "WP Mail SMTP → Email Reports".
      remove_submenu_page('wp-mail-smtp', 'wp-mail-smtp-reports');
      //Hide "WP Mail SMTP → Tools".
      remove_submenu_page('wp-mail-smtp', 'wp-mail-smtp-tools');
      //Hide "WP Mail SMTP → About Us".
      remove_submenu_page('wp-mail-smtp', 'wp-mail-smtp-about');
      //Hide "WP Mail SMTP → Upgrade to Pro".
      remove_submenu_page('wp-mail-smtp', 'https://wpmailsmtp.com/lite-upgrade/?utm_source=WordPress&utm_medium=admin-menu&utm_campaign=liteplugin&utm_content=Upgrade%20to%20Pro');
    }
    add_action('admin_menu', 'mh_hide_wp_mail_smtp_menus', 2147483647);
  }
  /**
   * Disable Hubspot Admin Menu Item
     * @since  1.0.0
   */
  $no_hubspot_menu = carbon_get_theme_option( 'crb_disable_hubspot_menu' );
    if ( $no_hubspot_menu == true ) {  
    function mh_hide_hubspot_menu() {
          //Hide the "HubSpot" menu.
          remove_menu_page('leadin');
      }
    add_action('admin_menu', 'mh_hide_hubspot_menu', 11);
  }
  /**
   * Disable Wordfence dashboard widgets
     * @since  1.0.0
   */
  $no_wordfence_dashboard_widgets = carbon_get_theme_option( 'crb_disable_wordfence_dashboard_widgets' );
  if ( $no_wordfence_dashboard_widgets == true ) {  
    function mh_hide_wordfence_dashboard_widgets() {
        remove_meta_box( 'wordfence_activity_report_widget', 'dashboard', 'normal' );
        remove_meta_box( 'wordfence_activity_report_widget', 'dashboard', 'side' );
      }
    add_action('wp_dashboard_setup', 'mh_hide_wordfence_dashboard_widgets', 20);
  }
/**
 * Hide Wordfence from dashboard menu
 * @since  1.0.0
 */
  $no_wordfence_menu = carbon_get_theme_option( 'crb_disable_wordfence_menu' ); 
  if ( $no_wordfence_menu == true ) {
  function mh_hide_wordfence_menu() {
      //Hide "Wordfence 0".
      remove_menu_page('Wordfence');
      //Hide "Wordfence 0 → Dashboard 0".
      remove_submenu_page('Wordfence', 'Wordfence');
      //Hide "Wordfence 0 → Firewall".
      remove_submenu_page('Wordfence', 'WordfenceWAF');
      //Hide "Wordfence 0 → Scan".
      remove_submenu_page('Wordfence', 'WordfenceScan');
      //Hide "Wordfence 0 → Tools".
      remove_submenu_page('Wordfence', 'WordfenceTools');
      //Hide "Wordfence 0 → Login Security".
      remove_submenu_page('Wordfence', 'WFLS');
      //Hide "Wordfence 0 → All Options".
      remove_submenu_page('Wordfence', 'WordfenceOptions');
      //Hide "Wordfence 0 → Help".
      remove_submenu_page('Wordfence', 'WordfenceSupport');
      //Hide "Wordfence 0 → Upgrade to Premium".
      remove_submenu_page('Wordfence', 'WordfenceUpgradeToPremium');
    }
    add_action('admin_menu', 'mh_hide_wordfence_menu', 91);
  }
  /**
   * Hide iThemes Security Admin Menus
     * @since  1.0.0
   */
  $no_ithemes_security_menu = carbon_get_theme_option( 'crb_disable_ithemes_security_menu' ); 
    if ( $no_ithemes_security_menu == true ) {
      function mh_hide_ithemes_security_menu() {
          //Hide "iThemes Security".
          remove_menu_page('itsec');
          //Hide "iThemes Security → Dashboard".
          remove_submenu_page('itsec', 'itsec');
          //Hide "iThemes Security → Settings".
          remove_submenu_page('itsec', 'itsec-settings');
          //Hide "iThemes Security → Tools".
          remove_submenu_page('itsec', 'itsec-tools');
          //Hide "iThemes Security → Logs".
          remove_submenu_page('itsec', 'itsec-logs');
          //Hide "iThemes Security → Pro".
          remove_submenu_page('itsec', 'itsec-pro');
        }
    add_action('admin_menu', 'mh_hide_ithemes_security_menu', 11);
  }
  }
}
add_action( 'admin_menu', 'mh_clean_up_wp_plugins' );