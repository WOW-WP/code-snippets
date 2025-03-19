<?php
/**
 * Displays different product prices for logged-in and logged-out users.
 * Adjust the discount inside get_custom_price function.
 */
class WOWWP_Dynamic_Pricing {
    public function __construct() {
        add_filter('woocommerce_get_price_html', [$this, 'modify_product_price'], 10, 2);
    }

    public function modify_product_price($price, $product) {
        if (is_user_logged_in()) {
            return '<span class="discounted-price">' . wc_price($product->get_price() * 0.9) . '</span>'; // 10% discount
        }
        return $price;
    }
}
new WOWWP_Dynamic_Pricing();
