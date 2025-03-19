<?php
    // This script replaces the "Add to Cart" button with "Buy Now" on WooCommerce products.
    // Clicking "Buy Now" will take users directly to the checkout page for a one-click purchase.
    class WOWWP_Replace_Add_To_Cart_With_Buy_Now {
        public function __construct() {
            add_filter('woocommerce_product_single_add_to_cart_text', [$this, 'change_button_text']);
            add_filter('woocommerce_product_add_to_cart_text', [$this, 'change_button_text']);
            add_filter('woocommerce_add_to_cart_redirect', [$this, 'redirect_to_checkout']);
        }

        public function change_button_text() {
            return __('Buy Now', 'woocommerce');
        }

        public function redirect_to_checkout($url) {
            return wc_get_checkout_url();
        }
    }
    new WOWWP_Replace_Add_To_Cart_With_Buy_Now();
    