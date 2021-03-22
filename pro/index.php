<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'plugin_action_links_' . GET_CASH_PLUGIN_BASENAME , 'get_cash_settings_link' );

if ( !is_plugin_active( 'get-cash-pro/get-cash.php' ) ) {
	add_action( 'admin_notices', 'get_cash_pro_available_notice' );
} else {
	deactivate_plugins( GET_CASH_PLUGIN_BASENAME );
	echo '<div class="notice notice-success is-dismissible"><p>Get Cash has been deactivated because the PRO version is activated. Enjoy the upgrade</p></div>';
}

// Settings Button
function get_cash_settings_link( $links_array ){
	array_unshift( $links_array, '<a href="' .  esc_url( admin_url( 'admin.php?page=get-cash', __FILE__ ) ) . '">Settings</a>' );
	
	if( !is_plugin_active( 'get-cash-pro/get-cash.php' ) ) {
		$links_array['get_cash_pro'] = sprintf('<a href="https://theafricanboss.com/get-cash/" target="_blank" style="color: #39b54a; font-weight: bold;">' . esc_html__('Go Pro for $9','get-cash') . '</a>');
	}
	
	return $links_array;
}

function get_cash_pro_available_notice() {
	echo '<div class="notice notice-warning is-dismissible"><p>You are currently not using our Get Cash PRO plugin. <strong>Please upgrade for a better experience</strong></p></div>';
}

?>