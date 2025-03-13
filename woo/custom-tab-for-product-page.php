<?php
// This script adds a custom tab to WooCommerce product pages.
// Customize the tab title and content as needed.
class WOWWP_Add_Custom_Tab_To_Product_Page {
    public function __construct() {
        add_filter('woocommerce_product_tabs', [$this, 'add_custom_product_tab']);
    }
    public function add_custom_product_tab($tabs) {
        $tabs['custom_tab'] = [
            'title'    => __('Custom Tab', 'woocommerce'),
            'priority' => 50,
            'callback' => [$this, 'custom_tab_content']
        ];
        return $tabs;
    }
    public function custom_tab_content() {
        echo '<h2>' . __('Custom Tab Content', 'woocommerce') . '</h2>';
        echo '<p>' . __('Here is your custom product tab content.', 'woocommerce') . '</p>';
    }
}
new WOWWP_Add_Custom_Tab_To_Product_Page();
