<?php
    // This script sets a minimum order amount for checkout.
    // Customize the $minimum_order_amount variable to set your desired minimum order value.
    class WOWWP_Minimum_Order_Amount {
        public function __construct() {
            add_action('woocommerce_checkout_process', [$this, 'check_minimum_order_amount']);
        }

        public function check_minimum_order_amount() {
            $minimum_order_amount = 50; // Set the minimum order amount (change as needed)
            if (WC()->cart->total < $minimum_order_amount) {
                wc_add_notice('Your order must be at least ' . wc_price($minimum_order_amount), 'error');
            }
        }
    }

    new WOWWP_Minimum_Order_Amount();
    