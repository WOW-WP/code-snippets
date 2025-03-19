<?php
/**
 * Redirects users to different pages based on their role after login.
 */
class WOWWP_Role_Based_Login_Redirect {
    public function __construct() {
        add_filter('woocommerce_login_redirect', [$this, 'redirect_by_role'], 10, 2);
    }

    public function redirect_by_role($redirect, $user) {
        if (in_array('customer', $user->roles)) {
            return home_url('/shop');
        } elseif (in_array('administrator', $user->roles)) {
            return admin_url();
        }
        return $redirect;
    }
}
new WOWWP_Role_Based_Login_Redirect();
