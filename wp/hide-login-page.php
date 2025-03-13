<?php
    // This script hides the WordPress login page from bots.
    // Customize the secret login URL inside the function.
    class WOWWP_Hide_Login_Page {
        private $secret_slug = 'mysecretlogin'; // Change this to your preferred slug

        public function __construct() {
            add_action('init', [$this, 'block_wp_login_access']);
        }

        public function block_wp_login_access() {
            if (strpos($_SERVER['REQUEST_URI'], 'wp-login.php') !== false) {
                wp_redirect(home_url($this->secret_slug));
                exit;
            }
        }
    }
    new WOWWP_Hide_Login_Page();
    