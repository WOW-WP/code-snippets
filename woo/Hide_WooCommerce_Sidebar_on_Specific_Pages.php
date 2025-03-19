<?php
/**
 * Hides the WooCommerce sidebar on specific pages.
 */
class WOWWP_Hide_Sidebar {
    public function __construct() {
        add_action('wp', [$this, 'remove_sidebar']);
    }

    public function remove_sidebar() {
        if (is_cart() || is_checkout()) { // Modify conditions as needed
            remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
        }
    }
}
new WOWWP_Hide_Sidebar();
