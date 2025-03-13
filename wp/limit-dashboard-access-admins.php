<?php
    // This script limits WordPress dashboard access to administrators only.
    // No customization needed unless additional roles should be allowed.
    class WOWWP_Limit_Dashboard_Access {
        public function __construct() {
            add_action('admin_init', [$this, 'restrict_dashboard_access']);
        }
        public function restrict_dashboard_access() {
            if (!current_user_can('administrator') && !wp_doing_ajax()) {
                wp_redirect(home_url());
                exit;
            }
        }
    }
    new WOWWP_Limit_Dashboard_Access();
    