<?php
/**
 * Theme functions file
 *
 * DO NOT MODIFY THIS FILE. Make a child theme instead: http://codex.wordpress.org/Child_Themes
 *
 * @package homepress
 * @author  Pablo Rotem
 * @since   HomePress 1.0
 */

// Constants
define( 'HMP_VERSION', '1.0.0' );
define( 'HMP_DB_VERSION', '2794' );

// Should reflect the WordPress version in the .testenv file.
define( 'HMP_WP_COMPATIBLE_VERSION', '4.7.4' );

define( 'APP_POST_TYPE', 'realty_listing' );
define( 'APP_TAX_CAT', 'realty_cat' );
define( 'APP_TAX_TAG', 'realty_tag' );

define( 'HMP_ITEM_LISTING', 'ad-listing' );
define( 'HMP_ITEM_MEMBERSHIP', 'membership-pack' );

define( 'HMP_PACKAGE_LISTING_PTYPE', 'package-listing' );
define( 'HMP_PACKAGE_MEMBERSHIP_PTYPE', 'package-membership' );

define( 'APP_TD', 'homepress' );

if ( version_compare( $wp_version, HMP_WP_COMPATIBLE_VERSION, '<' ) ) {
	add_action( 'admin_notices', 'HMP_display_version_warning' );
}

global $HMP_options;

// Legacy variables - some plugins rely on them
$app_theme = 'homepress';
$app_abbr = 'cp';
$app_version = HMP_VERSION;
$app_db_version = 2683;
$app_edition = 'Ultimate Edition';


// Framework
require_once( dirname( __FILE__ ) . '/framework/load.php' );
require_once( dirname( __FILE__ ) . '/theme-framework/load.php' );
require_once( APP_FRAMEWORK_DIR . '/admin/class-meta-box.php' );
require_once( APP_FRAMEWORK_DIR . '/includes/tables.php' );

APP_Mail_From::init();

// define the transients we use
$app_transients = array( 'HMP_cat_menu' );

// define the db tables we use
$app_db_tables = array( 'HMP_ad_fields', 'HMP_ad_forms', 'HMP_ad_geocodes', 'HMP_ad_meta', 'HMP_ad_pop_daily', 'HMP_ad_pop_total' );

// Only register deprecated tables on older CP versions.
if ( get_option( 'HMP_db_version' ) < 2221 ) {
	array_merge( $app_db_tables, array( 'HMP_ad_packs', 'HMP_coupons', 'HMP_order_info' ) );
}

// register the db tables
foreach ( $app_db_tables as $app_db_table ) {
	scb_register_table( $app_db_table );
}
scb_register_table( 'app_pop_daily', 'HMP_ad_pop_daily' );
scb_register_table( 'app_pop_total', 'HMP_ad_pop_total' );


$load_files = array(
	'checkout/load.php',
	'payments/load.php',
	'reports/load.php',
	'widgets/load.php',
	'stats/load.php',
	'recaptcha/load.php',
	'open-graph/load.php',
	'search-index/load.php',
	'admin/addons-mp/load.php',
	'plupload/app-plupload.php',
	'options.php',
	'hmp-theme-functions.php',
	'actions.php',
	'categories.php',
	'comments.php',
	'core.php',
	'cron.php',
	'custom-forms.php',
	'deprecated.php',
	'enqueue.php',
	'emails.php',
	'functions.php',
	'hooks.php',
	'images.php',
	'packages.php',
	'payments.php',
	'profile.php',
	'search.php',
	'security.php',
	'stats.php',
	'views.php',
	'views-checkout.php',
	'widgets.php',
	'theme-support.php',
	'customizer.php',
	'utils.php',
	// Form Progress
	'checkout/form-progress/load.php',
);
hmp-theme_load_files( dirname( __FILE__ ) . '/includes/', $load_files );

$load_classes = array(
	'HMP_Blog_Archive',
	'HMP_Posts_Tag_Archive',
	'HMP_Post_Single',
	'HMP_Author_Archive',
	'HMP_Ads_Tag_Archive',
	'HMP_Ads_Archive',
	'HMP_Ads_Home',
	'HMP_Ads_Categories',
	'HMP_Add_New',
	'HMP_Renew_Listing',
	'HMP_Ad_Single',
	'HMP_Edit_Item',
	'HMP_Membership',
	'HMP_User_Dashboard',
	'HMP_User_Dashboard_Orders',
	'HMP_User_Profile',
	// Checkout
	'HMP_Order',
	'HMP_Membership_Form_Select',
	'HMP_Membership_Form_Preview',
	'HMP_Listing_Form_Select_Category',
	'HMP_Listing_Form_Edit',
	'HMP_Listing_Form_Details',
	'HMP_Listing_Form_Preview',
	'HMP_Listing_Form_Submit_Free',
	'HMP_Gateway_Select',
	'HMP_Gateway_Process',
	'HMP_Order_Summary',
	// Widgets
	'HMP_Widget_125_Ads',
	'HMP_Widget_realty_categories',
	'HMP_Widget_Ad_Sub_Categories',
	'HMP_Widget_Ads_Tag_Cloud',
	'HMP_Widget_Blog_Posts',
	'HMP_Widget_Facebook',
	'HMP_Widget_Featured_Ads',
	'HMP_Widget_Search',
	'HMP_Widget_Sold_Ads',
	'HMP_Widget_Top_Ads_Today',
	'HMP_Widget_Top_Ads_Overall',
);
hmp-theme_add_instance( $load_classes );


// Admin only
if ( is_admin() ) {
	require_once( APP_FRAMEWORK_DIR . '/admin/importer.php' );

	$load_files = array(
		'admin.php',
		'dashboard.php',
		'enqueue.php',
		'install.php',
		'importer.php',
		'listing-single.php',
		'listing-list.php',
		'options.php',
		'package-single.php',
		'package-list.php',
		'settings.php',
		'system-info.php',
		'updates.php',
	);
	hmp-theme_load_files( dirname( __FILE__ ) . '/includes/admin/', $load_files );

	$load_classes = array(
		'HMP_Theme_Dashboard',
		'HMP_Theme_Settings_General' => $HMP_options,
		'HMP_Theme_Settings_Emails' => $HMP_options,
		'HMP_Theme_Settings_Pricing' => $HMP_options,
		'HMP_Theme_System_Info',
		'HMP_Listing_Package_General_Metabox',
		'HMP_Membership_Package_General_Metabox',
		'HMP_Listing_Attachments_Metabox',
		'HMP_Listing_Media' => array( '_app_media', __( 'Attachments', APP_TD ), APP_POST_TYPE, 'normal', 'low' ),
		'HMP_Listing_Author_Metabox',
		'HMP_Listing_Info_Metabox',
		'HMP_Listing_Custom_Forms_Metabox',
		'HMP_Listing_Pricing_Metabox',
	);
	hmp-theme_add_instance( $load_classes );

	// integrate custom permalinks in WP permalinks page
	$settings = hmp-theme_get_instance('HMP_Theme_Settings_General');
	add_action( 'admin_init', array( $settings, 'init_integrated_options' ), 10 );
}


// Frontend only
if ( ! is_admin() ) {
	HMP_load_all_page_templates();
}


// Constants
define( 'HMP_DASHBOARD_URL', get_permalink( HMP_User_Dashboard::get_id() ) );
define( 'HMP_DASHBOARD_ORDERS_URL', get_permalink( HMP_User_Dashboard_Orders::get_id() ) );
define( 'HMP_PROFILE_URL', get_permalink( HMP_User_Profile::get_id() ) );
define( 'HMP_EDIT_URL', get_permalink( HMP_Edit_Item::get_id() ) );
define( 'HMP_ADD_NEW_URL', get_permalink( HMP_Add_New::get_id() ) );
define( 'HMP_MEMBERSHIP_PURCHASE_URL', get_permalink( HMP_Membership::get_id() ) );


// Set the content width based on the theme's design and stylesheet.
// Used to set the width of images and content. Should be equal to the width the theme
// is designed for, generally via the style.css stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 500;
}

function HMP_display_version_warning(){
	global $wp_version;

	$message = sprintf( __( 'homepress version %1$s is not compatible with WordPress version %2$s. Correct work is not guaranteed. Please upgrade the WordPress at least to version %3$s or downgrade the homepress theme.', APP_TD ), HMP_VERSION, $wp_version, HMP_WP_COMPATIBLE_VERSION );
	echo '<div class="error fade"><p>' . $message .'</p></div>';
}

hmp-theme_init();
