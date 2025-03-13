<?php
// This script changes the default order status after checkout.
// Customize the return value to set the desired default order status.
class WOWWP_Change_Default_Order_Status {
    public function __construct() {
        add_filter('woocommerce_payment_complete_order_status', [$this, 'set_default_order_status'], 10, 2);
    }
    public function set_default_order_status($status, $order_id) {
        return 'processing'; // Change to 'completed' or any valid WooCommerce status
    }
}
new WOWWP_Change_Default_Order_Status();
