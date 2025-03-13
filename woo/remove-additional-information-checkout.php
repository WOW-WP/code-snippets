<?php
    // This script removes the "Additional Information" section from the WooCommerce checkout page.
    // No customization required, but you can hook this function to modify other sections if necessary.
    class WOWWP_Remove_Additional_Information_Checkout {
        public function __construct() {
            add_filter('woocommerce_enable_order_notes_field', '__return_false');
        }
    }

    new WOWWP_Remove_Additional_Information_Checkout();
    