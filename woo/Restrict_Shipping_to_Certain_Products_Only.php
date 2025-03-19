<?php
/**
 * Restricts shipping to only certain products in WooCommerce.
 */
class WOWWP_Restrict_Shipping_Products {
    public function __construct() {
        add_filter('woocommerce_package_rates', [$this, 'restrict_shipping'], 10, 2);
    }

    public function restrict_shipping($rates, $package) {
        foreach (WC()->cart->get_cart() as $cart_item) {
            if (!in_array($cart_item['product_id'], [123, 456])) { // Change to allowed product IDs
                return [];
            }
        }
        return $rates;
    }
}
new WOWWP_Restrict_Shipping_Products();
