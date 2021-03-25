<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class get_cash {
	private $get_cash_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'get_cash_menu' ) );
		add_action( 'admin_init', array( $this, 'get_cash_page_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'get_cash_admin_css' ) );
	}

	/**
	 * Register and enqueue a custom stylesheet in the WordPress admin.
	 */
	public function get_cash_admin_css() { 
		$currentScreen = get_current_screen();
		if ($currentScreen->id == 'toplevel_page_get-cash' || $currentScreen->id == 'get-cash_page_get_cash_recommended_menu_page' || $currentScreen->id == 'get-cash_page_get_cash_help_menu_page' ) {
			wp_register_style( 'bootstrap', GET_CASH_PLUGIN_DIR_URL . 'includes/css/bootstrap.min.css');
			wp_enqueue_style( 'bootstrap' );
		} else {
			return;
		}
	}


	public function get_cash_menu() {
		
		$parent_slug = 'get-cash';
		$capability = 'manage_options';
		
		add_menu_page( null, 'Get Cash', $capability , $parent_slug, array( $this, 'get_cash_settings_page' ), 'dashicons-money-alt', 20 );
		// add_submenu_page( $parent_slug , 'Upgrade Get Cash' , '<span style="color:#99FFAA">Go Pro >> </span>' , $capability , 'https://theafricanboss.com/donate' , null, null );
		add_submenu_page( $parent_slug , 'Review Get Cash' , 'Review' , $capability , 'https://wordpress.org/support/plugin/get-cash/reviews/?filter=5' , null, null );
		add_submenu_page( $parent_slug , 'Recommended' , 'Recommended' , $capability , 'get_cash_recommended_menu_page', array( $this, 'get_cash_recommended_menu_page' ) , null );
		add_submenu_page( $parent_slug , 'Help' , 'Help' , $capability , 'get_cash_help_menu_page' ,  array( $this, 'get_cash_help_menu_page' ) , null );
		// add_submenu_page( $parent_slug , 'Tutorials' , 'Tutorials' , $capability , 'get_cash_tutorials_menu_page' , array( $this, 'get_cash_tutorials_menu_page' ) , null );
		// add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, callable $function = '', int $position = null )
		
	}
	
	public function get_cash_settings_page() {
		require_once GET_CASH_PLUGIN_DIR . 'includes/admin/settings.php';
	}
	
	public function get_cash_recommended_menu_page() {
		require_once GET_CASH_PLUGIN_DIR . 'includes/admin/recommended.php';
	}
	
	public function get_cash_help_menu_page() {
		require_once GET_CASH_PLUGIN_DIR . 'includes/admin/help.php';
	}
	
	public function get_cash_tutorials_menu_page() {
		require_once GET_CASH_PLUGIN_DIR . 'includes/admin/tutorials.php';
	}
	
	public function get_cash_page_init() {
		register_setting(
			'get_cash_option_group', // option_group
			'get_cash_option_name', // option_name
			array( $this, 'get_cash_sanitize' ) // sanitize_callback
		);
		
		/*
		* Section Payments info
		*/
		add_settings_section(
			'get_cash_required_info_section', // id
			'Input Receiver info', // title
			array( $this, 'get_cash_section_info' ), // callback
			'get-cash-admin' // page
		);
		
		add_settings_field(
			'receiver_cash_app', // id
			'Input Cash App', // title
			array( $this, 'receiver_cash_app_callback' ), // callback
			'get-cash-admin', // page
			'get_cash_required_info_section' // section
		);
		add_settings_field(
			'receiver_venmo', // id
			'Input Venmo ID (usually 15-25 digits long)', // title
			array( $this, 'receiver_venmo_callback' ), // callback
			'get-cash-admin', // page
			'get_cash_required_info_section' // section
		);
		add_settings_field(
			'receiver_paypal', // id
			'Input PayPal.me username', // title
			array( $this, 'receiver_paypal_callback' ), // callback
			'get-cash-admin', // page
			'get_cash_required_info_section' // section
		);
		
		/*
		* Section Additional info
		*/
		add_settings_section(
			'get_cash_additional_info_section', // id
			'Input Additional info', // title
			array( $this, 'get_cash_section_additional_info' ), // callback
			'get-cash-admin' // page
		);
		
		add_settings_field(
			'receiver_no', // id
			'Input Phone Number', // title
			array( $this, 'receiver_no_callback' ), // callback
			'get-cash-admin', // page
			'get_cash_additional_info_section' // section
		);
		add_settings_field(
			'receiver_email', // id
			'Input Email', // title
			array( $this, 'receiver_email_callback' ), // callback
			'get-cash-admin', // page
			'get_cash_additional_info_section' // section
		);
		add_settings_field(
			'receiver_owner', // id
			'Input Name associated with payments', // title
			array( $this, 'receiver_owner_callback' ), // callback
			'get-cash-admin', // page
			'get_cash_additional_info_section' // section
		);
		
		/*
		* Section PRO
		*/
		add_settings_section(
			'get_cash_premium_features_section', // id
			'Premium Features <a style="text-decoration:none" href="https://theafricanboss.com/get-cash/" target="_blank"><sup style="color:red">available in PRO</sup></a>' . '<p>Cash App/Venmo/PayPal logos and specifying amount in shortcode <a style="text-decoration:none" href="https://theafricanboss.com/get-cash/" target="_blank"><sup style="color:red">also available in PRO</sup></a></p>', // title
			array( $this, 'get_cash_section_premium_features' ), // callback
			'get-cash-admin' // page
		);
		
		add_settings_field(
			'donate_button_text', // id
			'Change Donate Button Text <a style="text-decoration:none" href="https://theafricanboss.com/get-cash/" target="_blank"><sup style="color:red">APPLY CHANGES WITH PRO</sup></a>', // title
			array( $this, 'donate_button_text_callback' ), // callback
			'get-cash-admin', // page
			'get_cash_premium_features_section' // section
		);
		add_settings_field(
			'donate_button_display', // id
			'Full width Centered On/Off <a style="text-decoration:none" href="https://theafricanboss.com/get-cash/" target="_blank"><sup style="color:red">APPLY CHANGES WITH PRO</sup></a>', // title
			array( $this, 'donate_button_display_callback' ), // callback
			'get-cash-admin', // page
			'get_cash_premium_features_section' // section
		);
		add_settings_field(
			'donate_button_shadow', // id
			'Shadow On/Off <a style="text-decoration:none" href="https://theafricanboss.com/get-cash/" target="_blank"><sup style="color:red">APPLY CHANGES WITH PRO</sup></a>', // title
			array( $this, 'donate_button_shadow_callback' ), // callback
			'get-cash-admin', // page
			'get_cash_premium_features_section' // section
		);
		
	}
	
	/*
	* Fields sanitize function
	*/
	public function get_cash_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['receiver_cash_app'] ) ) {
			$sanitary_values['receiver_cash_app'] = sanitize_text_field( $input['receiver_cash_app'] );
		}
		if ( isset( $input['receiver_venmo'] ) ) {
			$sanitary_values['receiver_venmo'] = sanitize_text_field( $input['receiver_venmo'] );
		}
		if ( isset( $input['receiver_paypal'] ) ) {
			$sanitary_values['receiver_paypal'] = sanitize_text_field( $input['receiver_paypal'] );
		}
		if ( isset( $input['receiver_no'] ) ) {
			$sanitary_values['receiver_no'] = sanitize_text_field( $input['receiver_no'] );
		}
		if ( isset( $input['receiver_owner'] ) ) {
			$sanitary_values['receiver_owner'] = sanitize_text_field( $input['receiver_owner'] );
		}
		if ( isset( $input['receiver_email'] ) ) {
			$sanitary_values['receiver_email'] = sanitize_text_field( $input['receiver_email'] );
		}
		
		if ( isset( $input['donate_button_text'] ) ) {
			$sanitary_values['donate_button_text'] = sanitize_text_field( $input['donate_button_text'] );
		}
		if ( isset( $input['donate_button_shadow'] ) ) {
			$sanitary_values['donate_button_shadow'] = $input['donate_button_shadow'];
		}
		if ( isset( $input['donate_button_display'] ) ) {
			$sanitary_values['donate_button_display'] = $input['donate_button_display'];
		}
		
		return $sanitary_values;
	}

	/*
	* Sections callback functions
	*/
	public function get_cash_section_info() {echo __( '', 'get-cash' );}
	public function get_cash_section_additional_info() {echo __( '', 'get-cash' );}
	public function get_cash_section_premium_features() {echo __( '', 'get-cash' );}
	
	/*
	* Fields callback functions
	*/
	public function receiver_cash_app_callback() {
		$get_cash_options = get_option( 'get_cash_option_name' ); // Array of All Options
		if ( isset( $get_cash_options['receiver_cash_app']) ) { $test = '<a class="link-primary" href="https://cash.me/' . $get_cash_options['receiver_cash_app'] . '" target="_blank">Test</a>'; } else { $test = null; }
		printf(
			'<input class="gc-text" type="text" name="get_cash_option_name[receiver_cash_app]" id="receiver_cash_app" value="%s"> ' . $test ,
			isset( $this->get_cash_options['receiver_cash_app'] ) ? esc_attr( $this->get_cash_options['receiver_cash_app']) : ''
		);
	}
	public function receiver_venmo_callback() {
		$get_cash_options = get_option( 'get_cash_option_name' ); // Array of All Options
		if ( isset( $get_cash_options['receiver_venmo']) ) { $test = '<a class="link-primary" href="' . esc_attr(admin_url('admin.php?page=get_cash_help_menu_page')) . '" data-bs-toggle="tooltip" title="Venmo links only work on a phone with Venmo installed" target="_blank"> Test <img alt="Venmo QR Code" src="https://chart.googleapis.com/chart?cht=qr&chld=L|0&chs=75x75&chl=https://venmo.com/code?user_id='. esc_attr( wp_kses_post( $get_cash_options['receiver_venmo'] ) ). '"></a>'; } else { $test = null; }
		printf(
			'<input class="gc-text" type="text" name="get_cash_option_name[receiver_venmo]" id="receiver_venmo" value="%s">' . $test ,
			isset( $this->get_cash_options['receiver_venmo'] ) ? esc_attr( $this->get_cash_options['receiver_venmo']) : ''
		);
	}
	public function receiver_paypal_callback() {
		$get_cash_options = get_option( 'get_cash_option_name' ); // Array of All Options
		if ( isset( $get_cash_options['receiver_paypal']) ) { $test = '<a class="link-primary" href="https://paypal.me/' . $get_cash_options['receiver_paypal'] . '" target="_blank">Test</a>'; } else { $test = null; }
		printf(
			'<input class="gc-text" type="text" name="get_cash_option_name[receiver_paypal]" id="receiver_paypal" value="%s">' . $test ,
			isset( $this->get_cash_options['receiver_paypal'] ) ? esc_attr( $this->get_cash_options['receiver_paypal']) : ''
		);
	}
	public function receiver_no_callback() {
		printf(
			'<input class="gc-text" type="text" name="get_cash_option_name[receiver_no]" id="receiver_no" value="%s">',
			isset( $this->get_cash_options['receiver_no'] ) ? esc_attr( $this->get_cash_options['receiver_no']) : ''
		);
	}
	public function receiver_owner_callback() {
		printf(
			'<input class="gc-text" type="text" name="get_cash_option_name[receiver_owner]" id="receiver_owner" value="%s">',
			isset( $this->get_cash_options['receiver_owner'] ) ? esc_attr( $this->get_cash_options['receiver_owner']) : ''
		);
	}
	public function receiver_email_callback() {
		printf(
			'<input class="gc-text" type="text" name="get_cash_option_name[receiver_email]" id="receiver_email" value="%s">',
			isset( $this->get_cash_options['receiver_email'] ) ? esc_attr( $this->get_cash_options['receiver_email']) : ''
		);
	}
	// PRO Features
	public function donate_button_text_callback() {
		printf(
			'<input disabled class="gc-text" type="text" name="get_cash_option_name[donate_button_text]" id="donate_button_text" value="%s">',
			isset( $this->get_cash_options['donate_button_text'] ) ? esc_attr( $this->get_cash_options['donate_button_text']) : ''
		);
	}
	public function donate_button_display_callback() {
		printf(
			'<input disabled class="gc-checkbox" type="checkbox" name="get_cash_option_name[donate_button_display]" id="donate_button_display" value="donate_button_display" %s>' .
			'<label for="donate_button_display"> Enable / Disable</label>',
			( isset( $this->get_cash_options['donate_button_display'] ) && $this->get_cash_options['donate_button_display'] === 'donate_button_display' ) ? 'checked' : ''
		);
	}
	public function donate_button_shadow_callback() {
		printf(
			'<input disabled checked class="gc-checkbox" type="checkbox" name="get_cash_option_name[donate_button_shadow]" id="donate_button_shadow" value="donate_button_shadow" %s>' .
			'<label for="donate_button_shadow"> Enable / Disable</label>',
			( isset( $this->get_cash_options['donate_button_shadow'] ) && $this->get_cash_options['donate_button_shadow'] === 'donate_button_shadow' ) ? 'checked' : ''
		);
	}
	
}
if ( is_admin() )
$get_cash = new get_cash();
/* 
 * Retrieve values with:
 * $get_cash_options = get_option( 'get_cash_option_name' ); // Array of All Options
 * $receiver_cash_app = $get_cash_options['receiver_cash_app']; // Receiver Cash App
 */

require_once GET_CASH_PLUGIN_DIR . 'includes/shortcodes.php';

?>