<?php
/**
 * Redirects 404 errors to a custom page.
 * Change the page ID or slug as needed.
 */
class WOWWP_Custom_404 {
    public function __construct() {
        add_action('template_redirect', [$this, 'redirect_404']);
    }

    public function redirect_404() {
        if (is_404()) {
            wp_redirect(home_url('/custom-404-page'));
            exit;
        }
    }
}
new WOWWP_Custom_404();