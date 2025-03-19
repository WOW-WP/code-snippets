<?php
/**
 * Restricts WooCommerce orders based on user roles.
 */
class WOWWP_Restrict_WooCommerce_Orders {
    public function __construct() {
        add_action('woocommerce_checkout_process', [$this, 'restrict_orders']);
    }

    public function restrict_orders() {
        if (!current_user_can('customer')) {
            wc_add_notice('Only customers can place orders.', 'error');
        }
    }
}
new WOWWP_Restrict_WooCommerce_Orders();
