<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

$this->get_cash_options = get_option( 'get_cash_option_name' );

settings_errors();

?>

<div class="container">

	<div class="">
		<h1>Get Cash Shortcodes</h1>
		<br>
		<p>Receive funds, tips, donations on WordPress via Cash App, Venmo, PayPal with a button or QR Code anywhere on your website</p>
		<br>
	</div>

	<div class="row">

		<div class="col-12 col-md-7">
			<form method="post" action="options.php">
				<?php
					settings_fields( 'get_cash_option_group' );
					do_settings_sections( 'get-cash-admin' );
					submit_button();
				?>
			</form>
		</div>

		<div class="col-12 col-md-5">
			<h2>Example shortcodes</h2>
			<h5>Place shortcodes in any of these formats anywhere on your site</h5>
			<p>Options you can add in your shortcode are:</p>
			<ul class="list-inline">
				<li><code>[<strong>cashapp</strong>]</code> | <code>[<strong>venmo</strong>]</code> | <code>[<strong>paypal</strong>]</code></li>
				<li><code>[cashapp <strong>qr="yes"</strong>]</code> | <code>[venmo <strong>qr="no"</strong>]</code></li>
				<li><code>[paypal <strong>amount="123"</strong>]</code></li>
				<li><code>[venmo qr="no" amount="15" <strong>note="Custom note goes here"</strong>]</code> <br><em> <a style="text-decoration:none" href="https://theafricanboss.com/get-cash/" target="_blank"><sup style="color:blue"><strong>note</strong> only for Venmo in the PRO version</sup></a></li>
			</ul>

			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Simple Cash App Shortcode</h5>
					<h6 class="card-subtitle mb-2 text-muted">[cashapp]</h6>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Simple Venmo Shortcode</h5>
					<h6 class="card-subtitle mb-2 text-muted">[venmo]</h6>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Simple PayPal Shortcode</h5>
					<h6 class="card-subtitle mb-2 text-muted">[paypal]</h6>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Shortcode with defaullt amount</h5>
					<h6 class="card-subtitle mb-2 text-muted">[cashapp amount="20"]</h6>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Choose between QR code or Cash App logo</h5>
					<h6 class="card-subtitle mb-2 text-muted">[cashapp qr="yes"]</h6>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Choose between QR code or Cash App logo with default amount</h5>
					<h6 class="card-subtitle mb-2 text-muted">[cashapp amount="30" qr="yes"]</h6>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Venmo logo with transaction note prepopulated</h5>
					<h6 class="card-subtitle mb-2 text-muted">[venmo amount="11" qr="no" note="Thank you for your work"]</h6>
				</div>
			</div>

		</div>

	</div>
</div>