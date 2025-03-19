<?php
/**
 * Redirects WordPress users to a custom page after logout.
 * Change the URL inside the get_redirect_url function.
 */
class WOWWP_Logout_Redirect {
    public function __construct() {
        add_action('wp_logout', [$this, 'redirect_after_logout']);
    }

    public function redirect_after_logout() {
        wp_redirect($this->get_redirect_url());
        exit;
    }

    private function get_redirect_url() {
        return home_url('/goodbye');
    }
}
new WOWWP_Logout_Redirect();
