<?php
/**
 * Redirects users to a custom login page instead of the default WooCommerce login page.
 */
class WOWWP_Custom_Woo_Login_URL {
    public function __construct() {
        add_filter('woocommerce_login_redirect', [$this, 'redirect_login_page']);
    }

    public function redirect_login_page($redirect) {
        return home_url('/custom-login'); // Change URL to your custom login page
    }
}
new WOWWP_Custom_Woo_Login_URL();
