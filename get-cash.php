<?php
/*
 * Plugin Name: Get Cash
 * Plugin URI: https://theafricanboss.com/get-cash
 * Description: Receive Cash, Tips, Donations, Funds, Support on WordPress via Cash App, Venmo, PayPal with a button or QR Code anywhere on your website
 * Author: The African Boss
 * Author URI: https://theafricanboss.com
 * Version: 2.1
 * Version Date: Feb 18, 2021
 * Created: 2021
 * Copyright 2021 theafricanboss.com All rights reserved
 */

// Reach out to The African Boss for website and mobile app development services at theafricanboss@gmail.com
// or at www.TheAfricanBoss.com or download our app at www.TheAfricanBoss.com/app

// If you are using this version, please send us some feedback
// via email at theafricanboss@gmail.com on your thoughts and what you would like improved

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
include_once( ABSPATH . 'wp-includes/pluggable.php');
include_once( ABSPATH . 'wp-includes/option.php');
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

define('GET_CASH_PLUGIN_DIR', plugin_dir_path(__FILE__) );
define('GET_CASH_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define('GET_CASH_PLUGIN_DIR_URL', plugins_url( '/' , __FILE__ ));
define('GET_CASH_PRO_PLUGIN_DIR', plugin_dir_path( 'get-cash-pro' ) );

if ( current_user_can( 'manage_options' ) ) {
	add_action( 'activated_plugin', function ( $plugin ) {
		if( $plugin == GET_CASH_PLUGIN_BASENAME ) {
			exit( wp_redirect( admin_url( 'admin.php?page=get-cash', __FILE__ ) ) );
		}
	});

	add_action( 'admin_notices', function () {
		echo '<div class="notice notice-warning is-dismissible"><p>You are currently not using our Get Cash PRO plugin. <strong>Please <a href="http://theafricanboss.com/get-cash" target="_blank">upgrade</a> for a better experience</strong></p></div>';
	} );

	if ( is_plugin_active( 'get-cash-pro/get-cash.php' ) ) {
		deactivate_plugins( GET_CASH_PLUGIN_BASENAME );
		activate_plugin( 'get-cash-pro/get-cash.php');
		wp_die( '<div><p>Get Cash has been deactivated because the PRO version is activated.
		<strong>Enjoy the upgrade</strong></p></div>
		<div><a href="' .  esc_url( admin_url( 'admin.php?page=get-cash-pro', __FILE__ ) ) . '">Set up the plugin</a> | <a href="' . admin_url('plugins.php') . '">Return</a></div>' );
	}

	include_once GET_CASH_PLUGIN_DIR . 'pro/index.php';
}

require_once GET_CASH_PLUGIN_DIR . 'includes/class-get_cash.php';

?>