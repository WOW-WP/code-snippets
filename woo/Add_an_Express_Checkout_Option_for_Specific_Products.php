<?php
/**
 * Adds an "Express Checkout" button for specific WooCommerce products.
 * Modify the product ID inside is_express_product function.
 */
class WOWWP_Express_Checkout {
    public function __construct() {
        add_action('woocommerce_single_product_summary', [$this, 'add_express_checkout_button'], 20);
    }

    public function add_express_checkout_button() {
        global $product;
        if ($this->is_express_product($product->get_id())) {
            echo '<a href="' . esc_url(wc_get_checkout_url()) . '" class="button express-checkout">Express Checkout</a>';
        }
    }

    private function is_express_product($product_id) {
        return in_array($product_id, [123, 456]); // Change to your product IDs
    }
}
new WOWWP_Express_Checkout();
