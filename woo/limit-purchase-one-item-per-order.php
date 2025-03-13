<?php
// This script limits WooCommerce purchases to only one item per order.
// No customization needed unless additional conditions should be added.
class WOWWP_Limit_One_Item_Per_Order {
    public function __construct() {
        add_filter('woocommerce_add_to_cart_validation', [$this, 'restrict_cart_to_one_item'], 10, 2);
    }
    public function restrict_cart_to_one_item($passed, $product_id) {
        if (WC()->cart->get_cart_contents_count() > 0) {
            wc_add_notice(__('You can only purchase one item per order.', 'woocommerce'), 'error');
            return false;
        }
        return $passed;
    }
}
new WOWWP_Limit_One_Item_Per_Order();
