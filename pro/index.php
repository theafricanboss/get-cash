<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'plugin_action_links_' . GET_CASH_PLUGIN_BASENAME , 'get_cash_settings_link' );
// Settings Button
function get_cash_settings_link( $links_array ){
	array_unshift( $links_array, '<a href="' .  esc_url( admin_url( 'admin.php?page=get-cash', __FILE__ ) ) . '">Settings</a>' );

	if( !is_plugin_active( 'get-cash-pro/get-cash.php' ) ) {
		$links_array['get_cash_pro'] = sprintf('<a href="https://theafricanboss.com/get-cash/" target="_blank" style="color: #39b54a; font-weight: bold;">' . esc_html__('Go Pro for $19','get-cash') . '</a>');
	}

	return $links_array;
}

?>