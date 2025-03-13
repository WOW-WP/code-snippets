<?php
// This script displays a custom notice on the WooCommerce checkout page.
// Customize the notice text to fit your store's needs.
class WOWWP_Custom_Checkout_Notice {
    public function __construct() {
        add_action('woocommerce_before_checkout_form', [$this, 'display_checkout_notice']);
    }
    public function display_checkout_notice() {
        wc_print_notice('Please double-check your shipping details before placing your order.', 'notice'); // Modify text
    }
}
new WOWWP_Custom_Checkout_Notice();
