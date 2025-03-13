<?php
// This script removes the SKU from WooCommerce product pages.
// No customization needed unless additional product details should be removed.
class WOWWP_Remove_SKU {
    public function __construct() {
        add_filter('wc_product_sku_enabled', '__return_false');
    }
}
new WOWWP_Remove_SKU();
