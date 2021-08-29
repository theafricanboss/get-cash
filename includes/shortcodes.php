<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

add_shortcode('cashapp' , 'get_cash_display_cashapp_shortcode');
function get_cash_display_cashapp_shortcode($attr) {
    /*
     * Retrieve values with:
     * $get_cash_options = get_option( 'get_cash_option_name' ); // Array of All Options
     * $receiver_cash_app = $get_cash_options['receiver_cash_app']; // Receiver Cash App
     */
    $get_cash_options = get_option( 'get_cash_option_name' ); // Array of All Options

    if ( !isset( $get_cash_options['receiver_cash_app']) ) {$receiver_cash_app = '$';} else {$receiver_cash_app = $get_cash_options['receiver_cash_app'];}

    $display = 'display: inline-block;';
    $shadow = 'box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);';
    $button_text = 'Cashapp Me<br>';

    return '<p style="padding: 10px; max-width: 150px; text-align: center; border-radius: 10px;' .
        $display . $shadow . '">' . $button_text .
        '<a href="https://cash.app/'. esc_attr( wp_kses_post( $receiver_cash_app ) ). '" target="_blank">' .
        '<img style="float: none!important; max-height:150px!important; max-width:100px!important;" alt="Square Cash app link" src="https://chart.googleapis.com/chart?cht=qr&chld=L|0&chs=150x150&chl=https://cash.app/'. esc_attr( wp_kses_post( $receiver_cash_app ) ). '">' .
        '</a></p>';
}

add_shortcode('venmo' , 'get_cash_display_venmo_shortcode');
function get_cash_display_venmo_shortcode($attr) {
    $get_cash_options = get_option( 'get_cash_option_name' ); // Array of All Options

    if ( !isset( $get_cash_options['receiver_venmo'])) {$receiver_venmo = '';} else {$receiver_venmo = $get_cash_options['receiver_venmo'];}

    $display = 'display: inline-block;';
    $shadow = 'box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);';
    $button_text = 'Venmo Me<br>';

    return '<p style="padding: 10px; max-width: 150px; text-align: center; border-radius: 10px;' .
        $display . $shadow . '">' . $button_text .
        '<a href="https://venmo.com/'. esc_attr( wp_kses_post( $receiver_venmo ) ). '?txn=pay&note=Thank you" target="_blank">' .
        '<img style="float: none!important; max-height:150px!important; max-width:100px!important;" alt="Square Cash app link" src="https://chart.googleapis.com/chart?cht=qr&chld=L|0&chs=150x150&chl=https://venmo.com/'. esc_attr( wp_kses_post( $receiver_venmo ) ). '?txn=pay&note=Thank you">' .
        '</a></p>';

}

add_shortcode('paypal' , 'get_cash_display_paypal_shortcode');
function get_cash_display_paypal_shortcode($attr) {
    $get_cash_options = get_option( 'get_cash_option_name' ); // Array of All Options

    if ( !isset( $get_cash_options['receiver_paypal'])) {$receiver_paypal = '';} else {$receiver_paypal = $get_cash_options['receiver_paypal'];}

    $display = 'display: inline-block;';
    $shadow = 'box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);';
    $button_text = 'Paypal Me<br>';

    return '<p style="padding: 10px; max-width: 150px; text-align: center; border-radius: 10px;' .
        $display . $shadow . '">' . $button_text .
        '<a href="https://paypal.me/'. esc_attr( wp_kses_post( $receiver_paypal ) ). '" target="_blank">' .
        '<img style="float: none!important; max-height:150px!important; max-width:100px!important;" alt="Square Cash app link" src="https://chart.googleapis.com/chart?cht=qr&chld=L|0&chs=150x150&chl=https://paypal.me/'. esc_attr( wp_kses_post( $receiver_paypal ) ). '">' .
        '</a></p>';
}

?>