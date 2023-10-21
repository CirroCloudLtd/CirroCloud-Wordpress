<?php
/*
Plugin Name: Tronix Core
Author: ThemePul
Author URI: http://themepul.com
Version: 1.0.5
Description: This plugin is Required for Tronix WordPress theme
Text Domain: tronixcore
 */

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
define( 'TRONIX_CORE_VERSION', '1.0.5' );
define( 'TRONIX_CORE', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'TRONIX_CORE_ASSETS', trailingslashit( TRONIX_CORE . 'assets' ) );
// Translate direction
load_plugin_textdomain( ' tronixcore', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

// Template Library
require_once 'inc/tronix-elementor-template-library/tronix-template-library.php';

/*
 *  Add CSF
 */
require_once 'inc/library/codestar-framework/codestar-framework.php';

/*
 *  Add Elementor Addons
 */
include_once 'elementor-widgets/custom-elements-for-elementor.php';

/*
 *  HEADER AND FOOTER BUILDER
 */
include_once 'elementor-widgets/hf-builder/header-footer-builder.php';


/*
 *  Add Tronix Core Function
 */
include_once 'inc/tronixcore-functions.php';

/*
 *  Add Demo Function
 */
include_once 'inc/demo.php';

/*
 *  Add Elementor Addons Icon
 */
include_once 'addon-icon.php';

/*
 *  Add Custom WordPress Widgets
 */
if ( class_exists( 'CSF' ) ) {
    include_once 'inc/widgets/custom-widgets.php';
    include_once 'inc/icons.php';
}

/*
 *  Add Custom Post Type
 */
$theme = wp_get_theme();
if ( 'Tronix' == $theme->name || 'Tronix' == $theme->parent_theme ) {
    include_once 'inc/wp-custom-posts.php';
}

// Registering toolkit files
function tronixcore_files() {
    wp_enqueue_style( 'iconfont', TRONIX_CORE_ASSETS . 'css/iconfont.css', array(), TRONIX_CORE_VERSION, 'all' );
    wp_enqueue_style( 'flaticon', TRONIX_CORE_ASSETS . 'css/flaticon.css', array(), TRONIX_CORE_VERSION, 'all' );
    wp_enqueue_style( 'icofont', TRONIX_CORE_ASSETS . 'css/icofont.min.css', array(), TRONIX_CORE_VERSION, 'all' );
    wp_enqueue_style( 'owl-css', TRONIX_CORE_ASSETS . 'css/owl.css', array(), TRONIX_CORE_VERSION, 'all' );
    wp_enqueue_style( 'backend-css', TRONIX_CORE_ASSETS . 'css/backend.css', array(), TRONIX_CORE_VERSION, 'all' );
    wp_enqueue_style( 'animate-min', TRONIX_CORE_ASSETS . 'css/animate-min.css', array(), TRONIX_CORE_VERSION, 'all' );
    wp_enqueue_style( 'tronixcore-custom-widgets', TRONIX_CORE_ASSETS . 'css/custom-widgets.css', array(), TRONIX_CORE_VERSION, 'all' );
	wp_enqueue_script( 'counterup', TRONIX_CORE_ASSETS . 'js/counterup.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'tronixcore-count-js', TRONIX_CORE_ASSETS . 'js/count-to.js', array( 'jquery' ), TRONIX_CORE_VERSION, true );
	wp_enqueue_script( 'appear', TRONIX_CORE_ASSETS . 'js/appear.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'isotop-min-js', TRONIX_CORE_ASSETS . 'js/isotop-min.js', array( 'jquery' ), TRONIX_CORE_VERSION, true );
    wp_enqueue_script( 'owl-js', TRONIX_CORE_ASSETS . 'js/owl.js', array( 'jquery' ), TRONIX_CORE_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'tronixcore_files' );
/**
 * Enqueue Backend Styles And Scripts.
 **/
function tronixcore_backend_css_js( $screen ) {
    wp_enqueue_style( 'bootstrap-icons', get_theme_file_uri( 'assets/bootstrap/bootstrap-icons.css' ), array(), TRONIX_CORE_VERSION, 'all' );
    wp_enqueue_style( 'iconfont', TRONIX_CORE_ASSETS . 'css/iconfont.css', array(), TRONIX_CORE_VERSION, 'all' );
    wp_enqueue_style( 'flaticon', TRONIX_CORE_ASSETS . 'css/flaticon.css', array(), TRONIX_CORE_VERSION, 'all' );
    wp_enqueue_style( 'icofont', TRONIX_CORE_ASSETS . 'css/icofont.min.css', array(), TRONIX_CORE_VERSION, 'all' );
}
add_action( 'admin_enqueue_scripts', 'tronixcore_backend_css_js' );