<?php
/**
 * Replaces "Add to Cart" with "Read More" for specific products.
 */
class WOWWP_Read_More_Button {
    public function __construct() {
        add_filter('woocommerce_product_add_to_cart_text', [$this, 'change_button_text'], 10, 2);
    }

    public function change_button_text($text, $product) {
        if (in_array($product->get_id(), [123, 456])) { // Change to your product IDs
            return __('Read More', 'woocommerce');
        }
        return $text;
    }
}
new WOWWP_Read_More_Button();
