<?php
// Adds custom fees at checkout based on cart conditions.
class WOWWP_Add_Custom_Fees {
    public function __construct() {
        add_action('woocommerce_cart_calculate_fees', [$this, 'add_custom_fees']);
    }
    public function add_custom_fees() {
        if (is_admin() && !defined('DOING_AJAX')) return;
        $cart_total = WC()->cart->get_cart_contents_total();
        $fee = 5; // Example fee
        if ($cart_total > 50) {
            WC()->cart->add_fee('Custom Fee', $fee);
        }
    }
}
new WOWWP_Add_Custom_Fees();