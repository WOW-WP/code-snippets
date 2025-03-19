<?php
/**
 * Allows partial payments or deposits in WooCommerce.
 */
class WOWWP_Partial_Payments {
    public function __construct() {
        add_action('woocommerce_cart_calculate_fees', [$this, 'apply_partial_payment']);
    }

    public function apply_partial_payment() {
        $partial_amount = WC()->cart->total * 0.5; // 50% deposit
        WC()->cart->add_fee(__('Deposit Payment', 'woocommerce'), -$partial_amount);
    }
}
new WOWWP_Partial_Payments();
