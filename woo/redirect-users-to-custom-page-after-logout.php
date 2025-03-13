<?php
// Redirects users to a custom page after logout. Customize the redirect URL.
class WOWWP_Logout_Redirect {
    public function __construct() {
        add_action('wp_logout', [$this, 'redirect_after_logout']);
    }
    public function redirect_after_logout() {
        wp_safe_redirect(home_url('/custom-logout-page'));
        exit();
    }
}
new WOWWP_Logout_Redirect();