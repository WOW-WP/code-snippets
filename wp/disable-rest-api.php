<?php
    // This script disables the WordPress REST API for non-logged-in users.
    // Customize the response message or add logic to allow specific users if necessary.
    class WOWWP_Disable_REST_API {
        public function __construct() {
            add_filter('rest_authentication_errors', [$this, 'disable_rest_for_guests']);
        }

        public function disable_rest_for_guests($access) {
            if (!is_user_logged_in()) {
                return new WP_Error('rest_forbidden', 'REST API access is restricted to logged-in users.', array('status' => 401));
            }
            return $access;
        }
    }

    new WOWWP_Disable_REST_API();
    