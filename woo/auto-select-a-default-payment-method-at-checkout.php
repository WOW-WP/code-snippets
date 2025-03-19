<?php
// Auto-selects a default payment method at checkout. Customize the default payment method ID.
class WOWWP_Default_Payment_Method {
    public function __construct() {
        add_filter('woocommerce_available_payment_gateways', [$this, 'set_default_payment_method']);
    }
    public function set_default_payment_method($gateways) {
        if (is_checkout() && !is_wc_endpoint_url('order-pay')) {
            $default = 'bacs'; // Example default payment method ID
            if (isset($gateways[$default])) {
                $gateways = [$default => $gateways[$default]] + $gateways;
            }
        }
        return $gateways;
    }
}
new WOWWP_Default_Payment_Method();