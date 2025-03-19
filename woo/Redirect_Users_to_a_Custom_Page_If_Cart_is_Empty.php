<?php
/**
 * Redirects users to a custom page if they try to access an empty cart.
 */
class WOWWP_Empty_Cart_Redirect {
    public function __construct() {
        add_action('template_redirect', [$this, 'redirect_if_cart_empty']);
    }

    public function redirect_if_cart_empty() {
        if (is_cart() && WC()->cart->is_empty()) {
            wp_redirect(home_url('/shop')); // Change to your preferred page
            exit;
        }
    }
}
new WOWWP_Empty_Cart_Redirect();
