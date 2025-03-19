<?php
/**
 * Adds a "Continue as Guest" option in WooCommerce checkout.
 */
class WOWWP_Continue_As_Guest {
    public function __construct() {
        add_action('woocommerce_before_checkout_form', [$this, 'add_guest_checkout_option']);
    }

    public function add_guest_checkout_option() {
        if (!is_user_logged_in()) {
            echo '<p class="guest-checkout"><a href="' . esc_url(wc_get_checkout_url()) . '">Continue as Guest</a></p>';
        }
    }
}
new WOWWP_Continue_As_Guest();
