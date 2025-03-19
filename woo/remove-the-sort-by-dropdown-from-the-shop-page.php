<?php
// Removes the "Sort By" dropdown from the shop page.
class WOWWP_Remove_Sort_By_Dropdown {
    public function __construct() {
        remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
    }
}
new WOWWP_Remove_Sort_By_Dropdown();