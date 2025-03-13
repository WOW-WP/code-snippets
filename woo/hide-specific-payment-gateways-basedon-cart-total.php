<?php
// This script hides payment gateways based on the cart total.
// Customize the $threshold amount and $restricted_gateways list.
class WOWWP_Hide_Payment_Gateways_By_Cart_Total {
    public function __construct() {
        add_filter('woocommerce_available_payment_gateways', [$this, 'filter_payment_gateways']);
    }
    public function filter_payment_gateways($gateways) {
        $threshold = 50; // Set the cart total limit
        $restricted_gateways = ['cod']; // Disable COD if cart total is above threshold
        if (WC()->cart->total > $threshold) {
            foreach ($restricted_gateways as $gateway) {
                unset($gateways[$gateway]);
            }
        }
        return $gateways;
    }
}
new WOWWP_Hide_Payment_Gateways_By_Cart_Total();
