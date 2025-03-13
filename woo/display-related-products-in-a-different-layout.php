<?php
// Displays related products in a different layout. Customize the layout as needed.
class WOWWP_Related_Products_Layout {
    public function __construct() {
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
        add_action('woocommerce_after_single_product_summary', [$this, 'custom_related_products'], 20);
    }
    public function custom_related_products() {
        $args = [
            'posts_per_page' => 4,
            'columns' => 4,
            'orderby' => 'rand'
        ];
        woocommerce_related_products(apply_filters('woocommerce_output_related_products_args', $args));
    }
}
new WOWWP_Related_Products_Layout();