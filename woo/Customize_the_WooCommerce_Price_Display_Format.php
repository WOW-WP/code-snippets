<?php
/**
 * Customizes the WooCommerce price display format.
 * Modify the format inside modify_price_format function.
 */
class WOWWP_Custom_Price_Format {
    public function __construct() {
        add_filter('woocommerce_get_price_html', [$this, 'modify_price_format']);
    }

    public function modify_price_format($price) {
        return '<span class="custom-price">Only ' . $price . '!</span>'; // Example format
    }
}
new WOWWP_Custom_Price_Format();
