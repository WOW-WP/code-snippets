<?php
/**
 * Hides WooCommerce product prices unless the user is logged in.
 */
class WOWWP_Hide_Woo_Prices {
    public function __construct() {
        add_filter('woocommerce_get_price_html', [$this, 'hide_prices']);
    }

    public function hide_prices($price) {
        return is_user_logged_in() ? $price : '<span class="login-required">Login to see prices</span>';
    }
}
new WOWWP_Hide_Woo_Prices();
