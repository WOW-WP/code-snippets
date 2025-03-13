<?php
// This script displays a custom message for out-of-stock products.
// Customize the message inside the return statement.
class WOWWP_Custom_Out_Of_Stock_Message {
    public function __construct() {
        add_filter('woocommerce_get_availability_text', [$this, 'custom_out_of_stock_text'], 10, 2);
    }
    public function custom_out_of_stock_text($text, $product) {
        if (!$product->is_in_stock()) {
            return __('This product is currently out of stock. Please check back later.', 'woocommerce');
        }
        return $text;
    }
}
new WOWWP_Custom_Out_Of_Stock_Message();
