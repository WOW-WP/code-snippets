<?php
// This script hides out-of-stock products from the WooCommerce shop page.
// Customize WooCommerce settings to override this if needed.
class WOWWP_Hide_Out_Of_Stock_Products {
    public function __construct() {
        add_filter('woocommerce_product_query_meta_query', [$this, 'hide_out_of_stock']);
    }
    public function hide_out_of_stock($meta_query) {
        $meta_query[] = ['key' => '_stock_status', 'value' => 'outofstock', 'compare' => '!='];
        return $meta_query;
    }
}
new WOWWP_Hide_Out_Of_Stock_Products();
