<?php
    // This script changes the default "Add to Cart" button text.
    // Customize the $button_text variable to set your desired button label.
    class WOWWP_Change_Add_To_Cart_Button_Text {
        public function __construct() {
            add_filter('woocommerce_product_single_add_to_cart_text', [$this, 'change_add_to_cart_text']);
            add_filter('woocommerce_product_add_to_cart_text', [$this, 'change_add_to_cart_text']);
        }

        public function change_add_to_cart_text($text) {
            return 'Your Custom Text'; // Change to your desired button text
        }
    }

    new WOWWP_Change_Add_To_Cart_Button_Text();
    