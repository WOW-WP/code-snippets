<?php
    // This script removes the "category" base from WordPress permalinks.
    // No customization needed.
    class WOWWP_Remove_Category_From_Permalinks {
        public function __construct() {
            add_filter('category_rewrite_rules', '__return_empty_array');
            add_filter('request', [$this, 'filter_category_link']);
        }
        public function filter_category_link($query_vars) {
            if (isset($query_vars['category_name'])) {
                $term = get_category_by_slug($query_vars['category_name']);
                if ($term) {
                    $query_vars['category_name'] = $term->slug;
                }
            }
            return $query_vars;
        }
    }
    new WOWWP_Remove_Category_From_Permalinks();
    