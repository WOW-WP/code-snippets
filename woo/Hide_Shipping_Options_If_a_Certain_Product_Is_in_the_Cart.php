<?php
/**
 * Hides all shipping options if a specific product is in the cart.
 */
class WOWWP_Hide_Shipping_For_Product {
    public function __construct() {
        add_filter('woocommerce_package_rates', [$this, 'hide_shipping'], 10, 2);
    }

    public function hide_shipping($rates, $package) {
        foreach (WC()->cart->get_cart() as $cart_item) {
            if ($cart_item['product_id'] == 123) { // Change to your product ID
                return [];
            }
        }
        return $rates;
    }
}
new WOWWP_Hide_Shipping_For_Product();
