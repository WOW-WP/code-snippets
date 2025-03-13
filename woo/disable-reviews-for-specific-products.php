<?php
    // This script disables reviews for specific WooCommerce products.
    // Customize the $product_ids array to specify which product IDs should have reviews disabled.
    class WOWWP_Disable_Reviews_For_Specific_Products {
        public function __construct() {
            add_filter('woocommerce_product_tabs', [$this, 'remove_reviews_tab']);
        }

        public function remove_reviews_tab($tabs) {
            $product_ids = [123, 456]; // Add the product IDs for which reviews should be disabled
            if (is_product() && in_array(get_the_ID(), $product_ids)) {
                unset($tabs['reviews']); // Remove the reviews tab for these products
            }
            return $tabs;
        }
    }

    new WOWWP_Disable_Reviews_For_Specific_Products();
    