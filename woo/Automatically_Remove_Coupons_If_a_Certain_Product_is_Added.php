<?php
/**
 * Removes all coupons when a specific product is added to the cart.
 */
class WOWWP_Remove_Coupons {
    public function __construct() {
        add_action('woocommerce_before_calculate_totals', [$this, 'remove_coupons']);
    }

    public function remove_coupons($cart) {
        $product_id = 123; // Change to the product ID
        foreach ($cart->get_cart() as $cart_item) {
            if ($cart_item['product_id'] == $product_id) {
                WC()->cart->remove_coupons();
            }
        }
    }
}
new WOWWP_Remove_Coupons();
