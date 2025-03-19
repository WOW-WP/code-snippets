<?php
/**
 * Removes the WordPress admin email verification prompt.
 */
class WOWWP_Remove_Email_Verification {
    public function __construct() {
        add_filter('admin_email_check_interval', '__return_false');
    }
}
new WOWWP_Remove_Email_Verification();
