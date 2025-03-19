<?php
/**
 * Change the default number of columns in product archives.
 * Users can customize the number of columns.
 */
class WOWWP_Change_Product_Columns {
    public function __construct() {
        add_filter('loop_shop_columns', [$this, 'set_product_columns']);
    }

    public function set_product_columns() {
        return 4; // Customize the number of columns
    }
}

new WOWWP_Change_Product_Columns();