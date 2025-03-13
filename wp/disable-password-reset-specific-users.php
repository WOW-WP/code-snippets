<?php
    // This script disables password reset for specific users.
    // Customize the user IDs in the array.
    class WOWWP_Disable_Password_Reset {
        public function __construct() {
            add_filter('allow_password_reset', [$this, 'restrict_password_reset'], 10, 2);
        }
        public function restrict_password_reset($allow, $user_id) {
            $restricted_users = [1, 2, 3]; // Replace with actual user IDs
            return in_array($user_id, $restricted_users) ? false : $allow;
        }
    }
    new WOWWP_Disable_Password_Reset();
    