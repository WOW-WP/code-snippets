<?php
    // This script hides product prices for logged-out users.
    // Customize the behavior if needed, such as adding custom messages or redirects.
    class WOWWP_Hide_Prices_For_Logged_Out_Users {
        public function __construct() {
            add_filter('woocommerce_get_price_html', [$this, 'hide_prices_for_logged_out_users'], 10, 2);
        }

        public function hide_prices_for_logged_out_users($price_html, $product) {
            if (!is_user_logged_in()) {
                return 'Please log in to see the price'; // Customize the message
            }
            return $price_html;
        }
    }

    new WOWWP_Hide_Prices_For_Logged_Out_Users();
    