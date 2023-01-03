<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2022-10-20 10:52:11
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2023-01-03 15:52:37
 */
if ( ! function_exists( 'crb_initilize_carbon_fields' ) ) {
  function mh_woo_improvements() {
	/**
	 * Disable WooCommerce Analytics - Hides them from dashboard only
		* @since  1.0.0
	*/
	$no_woo_admin = carbon_get_theme_option( 'crb_disable_woocommerce_admin' );
	if ( $no_woo_admin == true ) {
	function mh_disable_woocommerce_admin() {
			//Hide "Analytics".
			remove_menu_page('wc-admin&path=/analytics/overview');
			//Hide "Analytics → Overview".
			remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/overview');
			//Hide "Analytics → Products".
			remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/products');
			//Hide "Analytics → Revenue".
			remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/revenue');
			//Hide "Analytics → Orders".
			remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/orders');
			//Hide "Analytics → Variations".
			remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/variations');
			//Hide "Analytics → Categories".
			remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/categories');
			//Hide "Analytics → Coupons".
			remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/coupons');
			//Hide "Analytics → Taxes".
			remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/taxes');
			//Hide "Analytics → Downloads".
			remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/downloads');
			//Hide "Analytics → Stock".
			remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/stock');
			//Hide "Analytics → Settings".
			remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/settings');
		}
		add_action('admin_menu', 'mh_disable_woocommerce_admin', 71 );
	}
	/**
	 * Disable WooCommerce Marketing Hub - Hides it only
		* @since  1.0.0
	*/
	$no_woo_hub = carbon_get_theme_option( 'crb_disable_woocommerce_hub' );
	if ( $no_woo_hub == true ) {
	function mh_disable_woocommerce_hub() {
			//Hide "Marketing".
			remove_menu_page('woocommerce-marketing');
			//Hide "Marketing → Overview".
			remove_submenu_page('woocommerce-marketing', 'admin.php?page=wc-admin&path=/marketing');
			//Hide "Marketing → Coupons".
			remove_submenu_page('woocommerce-marketing', 'edit.php?post_type=shop_coupon');
		}	
		add_action('admin_menu', 'mh_disable_woocommerce_hub', 71 );
	}
	/**
	 * Remove WooCommerce Status Metabox from Welcome Dashboard
	* @since  1.0.0
	*/
	$no_woo_setup = carbon_get_theme_option( 'crb_disable_woocommerce_setup' );
	if ( $no_woo_setup == true ) {
	function mh_hide_woocommerce_dashboard_widgets() {
			remove_meta_box('wc_admin_dashboard_setup', 'dashboard', 'normal');
		}
		add_action('wp_dashboard_setup', 'mh_hide_woocommerce_dashboard_widgets', 20);
	}
	/**
	 * Remove WooCommerce Status Metabox from Welcome Dashboard
	* @since  1.0.0
	*/
	$no_woo_status = carbon_get_theme_option( 'crb_disable_woocommerce_status' );
	if ( $no_woo_status == true ) {
	function mh_disable_woocommerce_status() {
			remove_meta_box('woocommerce_dashboard_status', 'dashboard', 'normal');
			remove_meta_box('woocommerce_dashboard_recent_reviews', 'dashboard', 'normal');
		}
		add_action('wp_dashboard_setup', 'mh_disable_woocommerce_status');
	} 
	/**
	 * Remove WooCommerce Recent Reviews Metabox
	* @since  1.0.0
	*/
	$no_woo_review_meta = carbon_get_theme_option( 'crb_disable_woocommerce_review_meta' );
	if ( $no_woo_review_meta == true ) {
	function mh_disable_woocommerce_review_meta() {
			remove_meta_box('woocommerce_dashboard_recent_reviews', 'dashboard', 'normal');
		}
		add_action('wp_dashboard_setup', 'mh_disable_woocommerce_review_meta');
		} 
	/**
	 * Disable WooCommerce Widgets - Maybe add individual options later
	* @since  1.0.0
	*/
		$no_woo_widgets = carbon_get_theme_option( 'crb_disable_woocommerce_widgets' );
		if ( $no_woo_widgets == true ) {
		function mh_disable_woocommerce_widgets() {
				unregister_widget('WC_Widget_Products');
				unregister_widget('WC_Widget_Product_Categories');
				unregister_widget('WC_Widget_Product_Tag_Cloud');
				unregister_widget('WC_Widget_Cart');
				unregister_widget('WC_Widget_Layered_Nav');
				unregister_widget('WC_Widget_Layered_Nav_Filters');
				unregister_widget('WC_Widget_Price_Filter');
				unregister_widget('WC_Widget_Product_Search');
				unregister_widget('WC_Widget_Recently_Viewed');
				unregister_widget('WC_Widget_Recent_Reviews');
				unregister_widget('WC_Widget_Top_Rated_Products');
				unregister_widget('WC_Widget_Rating_Filter');
				}
			add_action('widgets_init', 'mh_disable_woocommerce_widgets', 99);
		}
	/**
	 * Disable WooCommerce Cart Fragments on homepage only.
	* @since  1.0.0
	*/
	$no_woo_cf_hp = carbon_get_theme_option( 'crb_disable_woocommerce_cart_fragments_hp' );
	if ( $no_woo_cf_hp == true ) {
	function mh_disable_woocommerce_cart_fragments_hp() { 
			if ( is_front_page() ) wp_dequeue_script( 'wc-cart-fragments' ); 
		}
		add_action( 'wp_enqueue_scripts', 'mh_disable_woocommerce_cart_fragments_hp', 11 );
	}
	/**
	 * Disable WooCommerce Cart Fragments on homepage only.
	* @since  1.0.0
	*/
	$no_woo_cf = carbon_get_theme_option( 'crb_disable_woocommerce_cart_fragments' );
	if ( $no_woo_cf == true ) {
	function mh_disable_woocommerce_cart_fragments() { 
		wp_dequeue_script( 'wc-cart-fragments' ); 
		}
		add_action( 'wp_enqueue_scripts', 'mh_disable_woocommerce_cart_fragments', 11 ); 
	}
	/**
	 * Disable WooCommerce Styles and Javascript on non Woocommerce pages
	* @since  1.0.0
	*/
	$no_woo_scripts = carbon_get_theme_option( 'crb_disable_woocommerce_scripts' );
	if ( $no_woo_scripts == true ) {
	function mh_remove_woocommerce_styles_scripts() {
			if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
				return;
		}
			remove_action('wp_enqueue_scripts', [WC_Frontend_Scripts::class, 'load_scripts']);
			remove_action('wp_print_scripts', [WC_Frontend_Scripts::class, 'localize_printed_scripts'], 5);
			remove_action('wp_print_footer_scripts', [WC_Frontend_Scripts::class, 'localize_printed_scripts'], 5);
		}
		add_action( 'template_redirect', 'mh_remove_woocommerce_styles_scripts', 999 );
	}
	/**
	 * Disable Extensions submenu
	* @since  1.0.0
	*/
	$no_woo_addons = carbon_get_theme_option( 'crb_disable_woocommerce_addons' );
	if ( $no_woo_addons == true ) {
	function mh_remove_admin_addon_submenu() {
				remove_submenu_page( 'woocommerce', 'wc-addons');
				remove_submenu_page( 'woocommerce', 'wc-addons&section=helper');
		}
		add_action( 'admin_menu', 'mh_remove_admin_addon_submenu', 999 );
	}
	/**
	 * Disable WooCommerce block styles (front-end).
	 * @since  1.0.0
	 */
	$no_woo_styles_frontend = carbon_get_theme_option( 'crb_disable_woocommerce_blocks_frontend' );
	if ( $no_woo_styles_frontend == true ) {
	function mh_disable_woocommerce_block_styles() {
			wp_dequeue_style( 'wc-blocks-style' );
		}
		add_action( 'wp_enqueue_scripts', 'mh_disable_woocommerce_block_styles' );
	}
	/**
	 * Disable WooCommerce block styles (back-end).
		* @since  1.0.0
	*/
	$no_woo_styles_backend = carbon_get_theme_option( 'crb_disable_woocommerce_blocks_backend' );
	if ( $no_woo_styles_backend == true ) {
	function mh_disable_woocommerce_block_editor_styles() {
			wp_deregister_style( 'wc-block-editor' );
			wp_deregister_style( 'wc-blocks-style' );
		}
		add_action( 'enqueue_block_assets', 'mh_disable_woocommerce_block_editor_styles', 1, 1 );
	}
	/**
	 * Remove password strength check.
		 * @since  1.0.0
	 */
	$no_woo_meter = carbon_get_theme_option( 'crb_disable_woocommerce_strength_meter' );
	if ( $no_woo_meter == true ) {
	function mh_remove_password_strength_wc() {
			wp_dequeue_script( 'wc-password-strength-meter' );
		}
		add_action( 'wp_print_scripts', 'mh_remove_password_strength_wc', 10 );
	}
}
add_action( 'carbon_fields_register_fields', 'mh_woo_improvements' );
} 