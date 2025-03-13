<?php
    // This script restricts access to the WordPress admin area based on user roles.
    // Customize the allowed roles inside the function.
    class WOWWP_Restrict_Admin_Access {
        public function __construct() {
            add_action('admin_init', [$this, 'restrict_access']);
        }
        public function restrict_access() {
            if (!current_user_can('administrator') && !wp_doing_ajax()) {
                wp_redirect(home_url());
                exit;
            }
        }
    }
    new WOWWP_Restrict_Admin_Access();
    