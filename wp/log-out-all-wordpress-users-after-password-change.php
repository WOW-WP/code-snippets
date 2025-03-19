<?php
/**
 * Logs out all users when the admin changes the password.
 */
class WOWWP_Logout_All_Users {
    public function __construct() {
        add_action('password_reset', [$this, 'logout_all_users'], 10, 2);
    }

    public function logout_all_users($user, $new_pass) {
        wp_destroy_all_sessions();
    }
}
new WOWWP_Logout_All_Users();
