<?php
    // This script forces users to use strong passwords.
    // No customization needed unless adjusting password strength criteria.
    class WOWWP_Force_Strong_Passwords {
        public function __construct() {
            add_filter('wp_check_password', [$this, 'enforce_password_strength'], 10, 4);
        }
        public function enforce_password_strength($check, $password, $hash, $user) {
            if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
                return false;
            }
            return $check;
        }
    }
    new WOWWP_Force_Strong_Passwords();
    