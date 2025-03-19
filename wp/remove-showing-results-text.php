<?php
/**
 * Remove the "Showing Results" text from the shop page.
 */
class WOWWP_Remove_Showing_Results {
    public function __construct() {
        add_filter('woocommerce_result_count', '__return_empty_string');
    }
}

new WOWWP_Remove_Showing_Results();