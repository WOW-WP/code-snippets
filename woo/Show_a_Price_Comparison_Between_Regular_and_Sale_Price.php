<?php
/**
 * Displays a price comparison between the regular and sale price.
 */
class WOWWP_Compare_Prices {
    public function __construct() {
        add_filter('woocommerce_get_price_html', [$this, 'compare_prices'], 10, 2);
    }

    public function compare_prices($price, $product) {
        if ($product->is_on_sale()) {
            return '<span class="regular-price">' . wc_price($product->get_regular_price()) . '</span> <br> Now: ' . $price;
        }
        return $price;
    }
}
new WOWWP_Compare_Prices();
