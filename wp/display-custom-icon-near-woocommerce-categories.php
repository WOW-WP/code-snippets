<?php
/**
 * Display a custom icon next to WooCommerce categories.
 * Users can customize the icon HTML.
 */
class WOWWP_Custom_Category_Icon {
    public function __construct() {
        add_filter('woocommerce_before_subcategory_title', [$this, 'add_custom_icon']);
    }

    public function add_custom_icon($category) {
        echo '<span class="custom-category-icon">&#9733;</span>'; // Customize the icon HTML
    }
}

new WOWWP_Custom_Category_Icon();