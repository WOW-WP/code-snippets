<?php
    // This script redirects non-admins to the homepage after login.
    // Customize the redirect URL if needed.
    class WOWWP_Redirect_Non_Admins_After_Login {
        public function __construct() {
            add_filter('login_redirect', [$this, 'redirect_after_login'], 10, 3);
        }
        public function redirect_after_login($redirect_to, $request, $user) {
            return (isset($user->roles) && in_array('administrator', $user->roles)) ? admin_url() : home_url();
        }
    }
    new WOWWP_Redirect_Non_Admins_After_Login();
    