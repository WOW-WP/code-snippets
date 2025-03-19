<?php
/**
 * Redirects all 404 errors to the homepage.
 */
class WOWWP_Redirect_404 {
    public function __construct() {
        add_action('template_redirect', [$this, 'redirect_to_home']);
    }

    public function redirect_to_home() {
        if (is_404()) {
            wp_redirect(home_url());
            exit;
        }
    }
}
new WOWWP_Redirect_404();
