<?php
// Changes the default product sorting in WooCommerce. Customize the sorting order.
class WOWWP_Default_Product_Sorting {
    public function __construct() {
        add_filter('woocommerce_default_catalog_orderby', [$this, 'change_default_sorting']);
    }
    public function change_default_sorting($sort_by) {
        return 'date'; // Example sorting order
    }
}
new WOWWP_Default_Product_Sorting();