<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<div class="container">

    <h1>Support for our plugin</h1>

    <p>Here we offer some help.</p>

    <div class="row">
        <div class="col-12 col-md-6">
    
            <!-- <div class="card"> -->
                <h3 class="card-title">Venmo ID vs Venmo Username</h3>
                <!-- <div class="card-body"> -->
                    <h5 class="card-title">Venmo ID is a set of numbers you will use in the plugin settings</h5>
                    <p class="card-text">Venmo links use your Venmo ID instead of your Venmo username.</p>
                    <p>So you will have to <strong>find the Venmo ID number from your Venmo app</strong> and use it on the settings page</p>
                    <p>You can find it by doing the following</p>
                    <p>
                        <ol>
                            <li>Open venmo app</li>
                            <li>Click on your user avatar in the top left corner: your name and QR code will show</li>
                            <li>Click on the QR code icon and go to 'Venmo Me' tab</li>
                            <li>In the bottom right, click on the share icon and copy the link</li>
                            <li>Open any text area and paste your link and it will look like this: <code>https://venmo.com/code?user_id=XXXXXXXXXXXXXXXXX</code></li>
                            <li>Copy the last part with the digits <code>XXXXXXXXXXXXXXXXX</code> into the <a class="link-primary" href="<?php echo ( esc_attr(admin_url('admin.php?page=get-cash')) ); ?>" target="_blank">plugin settings</a></li>
                        </ol>
                    </p>
                <!-- </div> -->
            <!-- </div> -->

        </div>
    </div>

</div>