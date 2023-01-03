<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2022-10-18 15:33:31
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2023-01-03 16:53:20
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    $theme_options  = Container::make( 'theme_options', __( 'Matrix Helper' ) )
    // Define its slug used in the URL of the page.
    ->set_page_file( 'matrix-helper' )
    // Define its name in the admin menu.
    ->set_page_menu_title( __( 'Matrix helper', 'matrix-helper' ) )
    // Define its position in the admin menu
    ->set_page_menu_position( 100 )
    //  Change its icon in the admin menu.
    ->set_icon( 'dashicons-sos' )
      ->add_tab( __( 'General' ), array(
        Field::make( 'checkbox', 'crb_disable_mh_clients', 'Hide this plugin for everybody except Matrix staff (Any user with @matrixinternet.ie domain in user email can still View it' )
        ->set_option_value( 'yes' ),
        Field::make( 'checkbox', 'crb_disable_comments', 'Disable comments: Completly disable comments sitewide - Most websites we build do not require comments to be enabled.' )
        ->set_option_value( 'yes' ),
        Field::make( 'text', 'crb_modify_excerpt', __( 'Limit Excerpt to the following number of words:' ) )
        ->set_attribute( 'placeholder', 'numbers only' ),
        ) )
      ->add_tab( __( 'Performance' ), array(
        Field::make( 'checkbox', 'crb_add_instantpage', 'Add Instant.page - uses just-in-time preloading to improve latency — it preloads a page right before a user clicks on it.' )
        ->set_option_value( 'yes' ),
        Field::make( 'checkbox', 'crb_disable_emoji', 'Disable Emojis: Clients usually do not require this feature. So we can disable it altogether, which can give a slight performance boost.' )
        ->set_option_value( 'yes' ),
        Field::make( 'checkbox', 'crb_disable_embeds', ' Disable Embeds: Only if you do not need to ever insert videos into the posts or pages. Can improve performance.' )
        ->set_option_value( 'yes' ),
        Field::make( 'checkbox', 'crb_disable_jquery_migrate', ' Disable jQuery Migrate: Usually its unnecessary to load this script as WordPress already maintains jQuery itself.' )
        ->set_option_value( 'yes' ),
        Field::make( 'checkbox', 'crb_disable_password_strength_meter', ' Disable the Password Strength meter script which may or may not give a small performance boost.' )
        ->set_option_value( 'yes' )
      ) )
    ->add_tab( __( 'Security' ), array(
      Field::make( 'checkbox', 'crb_disable_xmlrpc', 'Disable xmlrpc: Its recommended to disable this because it adds security vulnerabilities, however be careful as some plugins such as Jetpack require it.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_version', 'Disable WP Generator Meta Tag: It is considered a security risk to make the Wordpress version visible and public.' )
      ->set_option_value( 'yes' )
      ) )
    ->add_tab( __( 'Yoast' ), array(
      Field::make( 'checkbox', 'crb_hide_yoast', 'Hide Yoast from the Dashboard menu. Non Matrix Staff only' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_move_yoast', 'Move Yoast Box to the bottom: Sets Yoast SEO plugin metabox priority to low.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_yoast_admin_bar', 'Remove Yoast SEO setting options from Admin toolbar.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_yoast_comments', 'Remove Yoast SEO comment HTML from the head.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_yoast_dashboard', 'Remove Yoast Dashboard widget from welcome screen.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_yoast_user_role', 'Remove SEO manager and SEO editor user roles  added by Yoast from user set up.' )
      ->set_option_value( 'yes' )
      ) )
    ->add_tab( __( 'Admin Cleanup' ), array(
      Field::make( 'html', 'admin_cleanup_title' )
      ->set_html( '<h4>Cleanup the admin for clients</h2><p>There are certain things the client does not need to see. Whatever is enabled here will only work for non matrixinternet staff. You can test how it looks for our client with <a target="_blank" href="https://wordpress.org/plugins/login-as-user/">this plugin</a> (Remember to delete it on production enviornment)</p>' ),
      Field::make( 'checkbox', 'crb_disable_adminbar', 'Disable admin bar: This will remove the admin toolbar for all users. Its useful when testing.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_notices', 'Disable admin notifications: Try to disable annoying notifications in the admin area.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_custom_css', 'Disable the additional CSS section from the Customizer: We generally dont want admin users or developers adding CSS here.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_updates_notices', 'Disable Update Nag: Disable update notices on the backend. Updates can still be checked by clicking Dashboard->Updates' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_wordpress_logo', 'Disable Wordpress logo from admin toolbar.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_welcome_panel', 'Remove the welcome panel from Dashboard' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_site_health', 'Remove the Site health metabox from Dashboard' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_at_a_glance', 'Remove the At a Glance metabox from Dashboard' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_activity', 'Remove the Activity metabox from Dashboard' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_wp_news', 'Remove the Wordpress news metabox from Dashboard' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_quick_press', 'Remove the Quick Draft metabox from Dashboard' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_update_subpage', 'Hide Updates under Dashboard menu' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_plugins', 'Hide Plugins under Dashboard menu' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_themes', 'Hide Themes, Customizer and Widgets under Dashboard menu' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_tools', 'Hide Tools under Dashboard menu' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_general', 'Hide General under Dashboard menu' )
      ->set_option_value( 'yes' )      
      ) )
    ->add_tab( __( 'Header' ), array(
      Field::make( 'checkbox', 'crb_disable_dash_icons', 'Disable Dash Icons on Frontend: If the theme does not use dashicons on the frontend, they can be disabled.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_feeds', 'Disable RSS Feed: We can safely disable RSS if the website has no blog feature, otherwise its just header junk.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_gb_styles', 'Remove Gutenburg Styles: Only if you have disabled Gutenburg Blocks and are using the Classic Editor.' )
      ->set_option_value( 'yes' )
      ) )
    ->add_tab( __( 'Footer' ), array(
      Field::make( 'checkbox', 'crb_change_admin_footer_text', 'Modify admin footer text: This will add a link back to matrix website in the admin instead of Wordpress.' )
      ->set_option_value( 'yes' )
      ) )
    ->add_tab( __( 'WooCommerce' ), array(
      Field::make( 'checkbox', 'crb_disable_woocommerce_admin', 'Hide WooCommerce Analytics. If have no need for the new WooCommerce Analytics and WooCommerce Admin, you can always start using the original reports which are available under WooCommerce -> Reports. Enabling this option just hides it from menu, it does not disable completly.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_woocommerce_hub', 'Hide WooCommerce Marketing hub.Theres a good chance you do not need this, coupons can be adding from WooCommerce settings.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_woocommerce_setup', 'Remove WooCommerce Setup Metabox Dashboard widget.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_woocommerce_status', 'Remove WooCommerce Status Metabox Dashboard widget.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_woocommerce_review_meta', 'Remove WooCommerce Recent Reviews Metabox Dashboard widget.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_woocommerce_widgets', 'Disable all Woocommerce widgets if are not using any.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_woocommerce_cart_fragments_hp', 'Disable WooCommerce Ajax Cart Fragments On Static Homepage. Optimize the homepage and leave the “wc-cart-fragments” on the other website pages. Do not enable if products are shown on homepage.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_woocommerce_cart_fragments', 'Disable WooCommerce Ajax Cart Fragments everywhere. This Will cause pages to reload when adding to cart.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_woocommerce_scripts', 'Disable WooCommerce styles and scripts on non WooCommerce pages. Only load them on shop, product, cart, account etc etc pages.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_woocommerce_addons', 'Disable WooCommerce Extensions submenu - Its almost never needed.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_woocommerce_blocks_frontend', 'Disable WooCommerce Block Styles on the Frontend.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_woocommerce_blocks_backend', 'Disable WooCommerce Block Styles on the Backend.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_woocommerce_strength', 'Disable WooCommerce Password Strength Meter which is often not required and can give a performance boost.' )
      ->set_option_value( 'yes' )
      ) )
    ->add_tab( __( 'Misc Plugins' ), array( 
      Field::make( 'html', 'misc_cleanup_title' )
      ->set_html( '<h4>Hide Plugin Settings from WP Admin Menu</h2><p>There are certain things the client does not need to see. Whatever is enabled here will only work for <strong>non matrixinternet</strong> staff. You can test how it looks for our client with <a target="_blank" href="https://wordpress.org/plugins/login-as-user/">this plugin</a> (Remember to delete it on production enviornment)</p>' ),
      Field::make( 'checkbox', 'crb_disable_acf_menu', 'Hide ACF Menu item.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_aiowps_menu', 'Hide All in One Wordpress Security Menu Items.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_elementor_menu', 'Hide Elementor from Dashboard menu - note settings can still be accessed from Plugins menu item.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_elementor_dashboard_pa_widgets', 'Disable Elementor Post Attributes Dashboard Widgets.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_elementor_overview', 'Disable Elementor Elementor Overview Dashboard Widgets.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_wp_mail_smtp_dashboard_widgets', 'Disable WP Mail SMTP Dashboard Widgets.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_wp_mail_smtp_menu', 'Hide WP Mail SMTP from Dashboard menu - note settings can still be accessed from Plugins menu item.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_hubspot_menu', 'Hide Hubspot menu item.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_wordfence_dashboard_widgets', 'Disable Wordfence dashboard widget.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_wordfence_menu', 'Hide Wordfence menu items. These should be renabled when checking scans, running scans, running reports etc, otherwise there is no way to check scan results.' )
      ->set_option_value( 'yes' ),
      Field::make( 'checkbox', 'crb_disable_ithemes_security_menu', 'Hide iThemes Security menu items.' )
      ->set_option_value( 'yes' )
      ) );
}

require_once plugin_dir_path( __FILE__ ) . '../functions/common.php';
require_once plugin_dir_path( __FILE__ ) . '../functions/general.php';
require_once plugin_dir_path( __FILE__ ) . '../functions/performance.php';
require_once plugin_dir_path( __FILE__ ) . '../functions/security.php';
require_once plugin_dir_path( __FILE__ ) . '../functions/seo.php';
require_once plugin_dir_path( __FILE__ ) . '../functions/admin.php';
require_once plugin_dir_path( __FILE__ ) . '../functions/admin-cleanup.php';
require_once plugin_dir_path( __FILE__ ) . '../functions/header.php';
require_once plugin_dir_path( __FILE__ ) . '../functions/footer.php';
require_once plugin_dir_path( __FILE__ ) . '../functions/woocommerce.php';
require_once plugin_dir_path( __FILE__ ) . '../functions/misc.php';