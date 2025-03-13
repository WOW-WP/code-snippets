<?php
// This script removes the "Proceed to Checkout" button from the cart page.
// No customization needed unless additional conditions should be applied.
class WOWWP_Remove_Proceed_To_Checkout {
    public function __construct() {
        add_action('woocommerce_proceed_to_checkout', [$this, 'remove_checkout_button'], 1);
    }
    public function remove_checkout_button() {
        remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20);
    }
}
new WOWWP_Remove_Proceed_To_Checkout();
