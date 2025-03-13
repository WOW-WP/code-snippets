<?php
// Automatically removes a product from the cart if another specific product is added.
class WOWWP_Auto_Remove_Product {
    public function __construct() {
        add_action('woocommerce_before_cart_contents', [$this, 'auto_remove_product']);
    }
    public function auto_remove_product() {
        $product_to_remove = 1; // Example product ID to remove
        $trigger_product = 2; // Example product ID that triggers removal
        $cart = WC()->cart->get_cart();
        $has_trigger_product = false;
        foreach ($cart as $cart_item_key => $cart_item) {
            if ($cart_item['product_id'] == $trigger_product) {
                $has_trigger_product = true;
                break;
            }
        }
        if ($has_trigger_product) {
            foreach ($cart as $cart_item_key => $cart_item) {
                if ($cart_item['product_id'] == $product_to_remove) {
                    WC()->cart->remove_cart_item($cart_item_key);
                }
            }
        }
    }
}
new WOWWP_Auto_Remove_Product();