<?php
/**
 * Adds a custom fee for specific payment gateways in WooCommerce.
 */
class WOWWP_Payment_Gateway_Fee {
    public function __construct() {
        add_action('woocommerce_cart_calculate_fees', [$this, 'add_payment_gateway_fee']);
    }

    public function add_payment_gateway_fee() {
        if (is_admin() && !defined('DOING_AJAX')) return;

        $chosen_gateway = WC()->session->get('chosen_payment_method');
        if ($chosen_gateway === 'cod') { // Change 'cod' to your payment gateway ID
            WC()->cart->add_fee(__('Payment Processing Fee', 'woocommerce'), 5); // Change fee amount
        }
    }
}
new WOWWP_Payment_Gateway_Fee();
