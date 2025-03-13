<?php
// This script changes the number of products displayed per shop page.
// Customize the return value to set the desired product count.
class WOWWP_Set_Products_Per_Page {
    public function __construct() {
        add_filter('loop_shop_per_page', [$this, 'change_products_per_page'], 20);
    }
    public function change_products_per_page($cols) {
        return 12; // Change this number to set the product display count
    }
}
new WOWWP_Set_Products_Per_Page();
