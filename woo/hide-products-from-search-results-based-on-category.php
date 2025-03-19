<?php
// Hides products from search results based on category. Customize the category slug.
class WOWWP_Hide_Products_From_Search {
    public function __construct() {
        add_action('woocommerce_product_query', [$this, 'exclude_category_from_search']);
    }
    public function exclude_category_from_search($query) {
        if (!is_admin() && $query->is_search()) {
            $query->set('tax_query', [
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => 'exclude-category', // Example category slug
                    'operator' => 'NOT IN'
                ]
            ]);
        }
    }
}
new WOWWP_Hide_Products_From_Search();