<?php
/**
 * Implements a "Buy X Get Y Free" discount rule in WooCommerce.
 */
class WOWWP_Buy_X_Get_Y {
    public function __construct() {
        add_action('woocommerce_cart_calculate_fees', [$this, 'apply_discount']);
    }

    public function apply_discount() {
        $product_id = 123; // Change to the product ID for the offer
        $free_product_id = 456; // Change to the free product ID

        $cart = WC()->cart->get_cart();
        $quantity = 0;

        foreach ($cart as $cart_item) {
            if ($cart_item['product_id'] == $product_id) {
                $quantity += $cart_item['quantity'];
            }
        }

        if ($quantity >= 2) { // Buy X threshold
            WC()->cart->add_to_cart($free_product_id, 1); // Add Y free
        }
    }
}
new WOWWP_Buy_X_Get_Y();
