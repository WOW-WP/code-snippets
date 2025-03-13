<?php
    // This script redirects users to a custom URL after adding a product to the cart.
    // Customize the $redirect_url variable to set your desired redirect destination.
    class WOWWP_Redirect_After_Adding_Product {
        public function __construct() {
            add_filter('woocommerce_add_to_cart_redirect', [$this, 'redirect_after_adding_product']);
        }

        public function redirect_after_adding_product($url) {
            return 'YOUR_CUSTOM_REDIRECT_URL'; // Replace with your desired redirect URL
        }
    }

    new WOWWP_Redirect_After_Adding_Product();
    