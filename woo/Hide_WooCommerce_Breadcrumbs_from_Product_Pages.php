<?php
/**
 * Hides the WooCommerce breadcrumbs from product pages.
 */
class WOWWP_Hide_Woo_Breadcrumbs {
    public function __construct() {
        add_action('init', [$this, 'remove_woocommerce_breadcrumbs']);
    }

    public function remove_woocommerce_breadcrumbs() {
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    }
}
new WOWWP_Hide_Woo_Breadcrumbs();
