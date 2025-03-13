<?php
// This script removes product tabs from WooCommerce product pages.
// Customize by unsetting specific tabs as needed.
class WOWWP_Remove_Product_Tabs {
    public function __construct() {
        add_filter('woocommerce_product_tabs', [$this, 'remove_tabs'], 98);
    }
    public function remove_tabs($tabs) {
        unset($tabs['description']); // Remove Description tab
        unset($tabs['reviews']);     // Remove Reviews tab
        // Unset other tabs if necessary
        return $tabs;
    }
}
new WOWWP_Remove_Product_Tabs();
