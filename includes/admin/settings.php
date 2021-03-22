<?php if ( ! defined( 'ABSPATH' ) ) { exit; } 

$this->get_cash_options = get_option( 'get_cash_option_name' ); 

settings_errors();

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

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
					<h5 class="card-title">Shortcode with defaullt amount <a style="text-decoration:none" href="https://theafricanboss.com/get-cash/" target="_blank"><sup style="color:red">available in PRO</sup></a></h5>
					<h6 class="card-subtitle mb-2 text-muted">[cashapp amount="20"]</h6>
				</div>
			</div>
			
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Choose between QR code or app logo <a style="text-decoration:none" href="https://theafricanboss.com/get-cash/" target="_blank"><sup style="color:red">available in PRO</sup></a></h5>
					<h6 class="card-subtitle mb-2 text-muted">[cashapp qr="no"]</h6>
				</div>
			</div>
			
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Choose between QR code or app logo with default amount <a style="text-decoration:none" href="https://theafricanboss.com/get-cash/" target="_blank"><sup style="color:red">available in PRO</sup></a></h5>
					<h6 class="card-subtitle mb-2 text-muted">[cashapp amount="30" qr="no"]</h6>
				</div>
			</div>
			
		</div>

	</div>
</div>