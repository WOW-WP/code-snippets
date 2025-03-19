<?php
/**
 * Allows users to register without an email.
 */
class WOWWP_Register_Without_Email {
    public function __construct() {
        add_filter('wp_pre_insert_user_data', [$this, 'remove_email_requirement']);
    }

    public function remove_email_requirement($user_data) {
        if (empty($user_data['user_email'])) {
            $user_data['user_email'] = 'user_' . time() . '@example.com';
        }
        return $user_data;
    }
}
new WOWWP_Register_Without_Email();
