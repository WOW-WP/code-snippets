<?php
/**
 * Changes the default WordPress admin email.
 * Modify the email inside get_admin_email function.
 */
class WOWWP_Change_Admin_Email {
    public function __construct() {
        add_filter('admin_email', [$this, 'change_admin_email']);
    }

    public function change_admin_email($email) {
        return $this->get_admin_email();
    }

    private function get_admin_email() {
        return 'admin@example.com';
    }
}
new WOWWP_Change_Admin_Email();
