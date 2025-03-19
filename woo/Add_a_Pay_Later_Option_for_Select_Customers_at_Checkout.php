<?php
/**
 * Adds a "Pay Later" option for select customers at checkout.
 */
class WOWWP_Pay_Later_Option {
    public function __construct() {
        add_filter('woocommerce_available_payment_gateways', [$this, 'add_pay_later_gateway']);
    }

    public function add_pay_later_gateway($gateways) {
        if (current_user_can('pay_later')) { // Replace with desired user role or condition
            $gateways['pay_later'] = [
                'id'          => 'pay_later',
                'title'       => __('Pay Later', 'woocommerce'),
                'description' => __('Choose this option to pay at a later date.'),
            ];
        }
        return $gateways;
    }
}
new WOWWP_Pay_Later_Option();
