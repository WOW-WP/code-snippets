<?php
/**
 * Adds a "Size Guide" tab to WooCommerce product pages.
 * Customize the tab content inside get_size_guide_content function.
 */
class WOWWP_Size_Guide_Tab {
    public function __construct() {
        add_filter('woocommerce_product_tabs', [$this, 'add_size_guide_tab']);
    }

    public function add_size_guide_tab($tabs) {
        $tabs['size_guide'] = [
            'title'    => __('Size Guide', 'woocommerce'),
            'priority' => 20,
            'callback' => [$this, 'get_size_guide_content'],
        ];
        return $tabs;
    }

    public function get_size_guide_content() {
        echo '<p>Refer to our size guide to find the perfect fit for you.</p>';
    }
}
new WOWWP_Size_Guide_Tab();
