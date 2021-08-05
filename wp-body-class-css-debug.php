<?php
/*
Plugin Name:  WP Body Class CSS Debug
Plugin URI:   #
Description:  #
Version:      0.1
Author:       Maxime Pertici
Author URI:   https://maxpertici.fr
Contributors:
License:      GPLv2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wp-body-class-css-debug
Domain Path:  /languages
*/

defined( 'ABSPATH' ) or	die();

// Plugin version
if( ! function_exists('get_plugin_data') ){ require_once( ABSPATH . 'wp-admin/includes/plugin.php' ); }
$wp_body_class_css_debug_plugin_data = get_plugin_data( plugin_dir_path( __FILE__ ) . 'wp-body-class-css-debug.php', false, false ) ;
define( 'WP_BCCSSD_VERSION' , $wp_body_class_css_debug_plugin_data['Version'] );

/**
 * Tell WP what to do when plugin is activated.
 *
 * @since 0.1
 */
function wp_body_class_css_debug_activation() {

}

register_activation_hook( __FILE__, 'wp_body_class_css_debug_activation' );



/**
 * Tell WP what to do when plugin is deactivated.
 *
 * @since 0.1
 */
function wp_body_class_css_debug_deactivation(){

}

register_deactivation_hook( __FILE__, 'wp_body_class_css_debug_deactivation' );


/**
 * First load with licence validation + hooks
 *
 * @since 0.1
 */

function wp_body_class_css_debug_load(){

	// Translations
	$locale = get_locale();
	$locale = apply_filters( 'plugin_locale', $locale, 'wp-body-class-css-debug' );
	load_textdomain( 'who-css-debug', WP_LANG_DIR . '/plugins/wp-body-class-css-debug-' . $locale . '.mo' );
	load_plugin_textdomain( 'wp-body-class-css-debug', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    

    /**
     * Fires when plugin is loaded
     *
     * @since 0.1
    */
    do_action( 'wp_body_class_css_debug_loaded' );

}

add_action( 'plugins_loaded', 'wp_body_class_css_debug_load' );

/**
 * Init
 *
 * @since 0.1
 */
function wp_body_class_css_debug_setup() {


    /**
     * Fires when plugin is loaded
     *
     * @since 0.1
    */
    do_action( 'wp_body_class_css_debug_ready' );
	
}

add_action( 'after_setup_theme', 'wp_body_class_css_debug_setup' );


function wp_body_class_css_debug_enqueues(){

    if( ! is_admin() ){
	    
        wp_enqueue_style(
        	'wp-body-class-css-debug',
        	plugins_url( '/wp-body-class-css-debug.css', __FILE__ ),
        	array(),
        	WP_BCCSSD_VERSION,
        	'all'
        );
    }

}

add_action( 'wp_enqueue_scripts', 'wp_body_class_css_debug_enqueues' );





function wp_body_class_css_debug_body_classes( $classes ) {
 
    if( ! is_admin() ){ $classes[] = 'wp-body-class-css-debug'; }
    return $classes;
     
}

add_filter( 'body_class','wp_body_class_css_debug_body_classes' );