<?php
/**
 * Enforces a minimum order value of $20.
 */
class WOWWP_Min_Order_Value {
    public function __construct() {
        add_action('woocommerce_checkout_process', [$this, 'check_min_order']);
    }

    public function check_min_order() {
        if (WC()->cart->total < 20) {
            wc_add_notice('Minimum order value is $20.', 'error');
        }
    }
}
new WOWWP_Min_Order_Value();
