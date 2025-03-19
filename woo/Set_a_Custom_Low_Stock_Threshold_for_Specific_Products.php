<?php
/**
 * Sets a custom low stock threshold for specific WooCommerce products.
 * Modify the threshold inside get_low_stock_threshold function.
 */
class WOWWP_Custom_Low_Stock {
    public function __construct() {
        add_filter('woocommerce_get_low_stock_amount', [$this, 'set_low_stock_threshold'], 10, 2);
    }

    public function set_low_stock_threshold($threshold, $product) {
        if ($product->get_id() == 123) { // Change 123 to your product ID
            return 5; // Change this to the desired low stock threshold
        }
        return $threshold;
    }
}
new WOWWP_Custom_Low_Stock();
