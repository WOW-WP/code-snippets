<?php
    // This script changes the WooCommerce checkout button text.
    // Customize the $button_text variable to set your desired checkout button label.
    class WOWWP_Change_Checkout_Button_Text {
        public function __construct() {
            add_filter('woocommerce_order_button_text', [$this, 'change_checkout_button_text']);
        }

        public function change_checkout_button_text($button_text) {
            return 'Proceed to Payment'; // Change to your desired checkout button text
        }
    }

    new WOWWP_Change_Checkout_Button_Text();
    