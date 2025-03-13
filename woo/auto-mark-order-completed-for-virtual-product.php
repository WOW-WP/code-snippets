<?php
// This script automatically marks WooCommerce orders as "completed" for virtual/downloadable products.
// Modify to apply to all products if necessary.
class WOWWP_Auto_Complete_Orders {
    public function __construct() {
        add_action('woocommerce_payment_complete', [$this, 'auto_complete_order']);
    }
    public function auto_complete_order($order_id) {
        if (!$order_id) return;
        $order = wc_get_order($order_id);
        if ($order->get_status() !== 'completed') {
            $order->update_status('completed');
        }
    }
}
new WOWWP_Auto_Complete_Orders();
