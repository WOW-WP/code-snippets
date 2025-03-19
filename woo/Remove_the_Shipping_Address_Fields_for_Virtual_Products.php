<?php
/**
 * Removes shipping address fields if only virtual products are in the cart.
 */
class WOWWP_Remove_Shipping_For_Virtual {
    public function __construct() {
        add_filter('woocommerce_cart_needs_shipping_address', [$this, 'disable_shipping_address']);
    }

    public function disable_shipping_address($needs_address) {
        foreach (WC()->cart->get_cart() as $cart_item) {
            if (!wc_get_product($cart_item['product_id'])->is_virtual()) {
                return true;
            }
        }
        return false;
    }
}
new WOWWP_Remove_Shipping_For_Virtual();
