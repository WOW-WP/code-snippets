<?php
/**
 * Add a custom product sorting option to WooCommerce.
 * Users can customize the sorting option.
 */
class WOWWP_Custom_Sorting_Option {
    public function __construct() {
        add_filter('woocommerce_get_catalog_ordering_args', [$this, 'custom_sorting_option']);
        add_filter('woocommerce_default_catalog_orderby_options', [$this, 'add_custom_sorting_option']);
        add_filter('woocommerce_catalog_orderby', [$this, 'add_custom_sorting_option']);
    }

    public function custom_sorting_option($args) {
        if (isset($_GET['orderby']) && 'custom_sort' === $_GET['orderby']) {
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'ASC';
            $args['meta_key'] = '_custom_sorting_key'; // Customize the meta key
        }
        return $args;
    }

    public function add_custom_sorting_option($options) {
        $options['custom_sort'] = __('Custom Sorting', 'woocommerce');
        return $options;
    }
}

new WOWWP_Custom_Sorting_Option();