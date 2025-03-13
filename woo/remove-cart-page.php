<?php
    // This script removes the WooCommerce cart page.
    // Users will be redirected to the homepage or a custom page when they try to access the cart.
    class WOWWP_Remove_Cart_Page {
        public function __construct() {
            add_action('template_redirect', [$this, 'remove_cart_page']);
        }

        public function remove_cart_page() {
            if (is_cart()) {
                wp_redirect(home_url()); // Redirect to homepage (or customize the URL)
                exit;
            }
        }
    }

    new WOWWP_Remove_Cart_Page();
    