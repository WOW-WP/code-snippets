<?php
/**
 * Displays a custom message if a payment method is restricted.
 */
class WOWWP_Restricted_Payment_Message {
    public function __construct() {
        add_filter('woocommerce_available_payment_gateways', [$this, 'show_restricted_message']);
    }

    public function show_restricted_message($gateways) {
        if (isset($gateways['cod'])) {
            wc_add_notice(__('Cash on Delivery is not available for this order.', 'woocommerce'), 'error');
        }
        return $gateways;
    }
}
new WOWWP_Restricted_Payment_Message();
