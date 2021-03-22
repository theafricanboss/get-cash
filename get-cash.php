<?php
/*
 * Plugin Name: Get Cash
 * Plugin URI: https://theafricanboss.com/get-cash
 * Description: Receive Cash, Tips, Donations, Funds, Support on WordPress via Cash App, Venmo, PayPal with a button or QR Code anywhere on your website
 * Author: The African Boss
 * Author URI: https://theafricanboss.com
 * Version: 1.0
 * Version Date: Mar 1, 2021
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
	include_once GET_CASH_PLUGIN_DIR . 'pro/index.php';
}

require_once GET_CASH_PLUGIN_DIR . 'includes/class-get_cash.php';

?>