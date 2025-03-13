<?php
    // This script restricts login attempts in WordPress.
    // Customize the maximum login attempts and lockout time.
    class WOWWP_Restrict_Login_Attempts {
        private $max_attempts = 3;
        private $lockout_time = 300; // 5 minutes

        public function __construct() {
            add_action('wp_login_failed', [$this, 'track_failed_attempts']);
            add_filter('authenticate', [$this, 'check_login_attempts'], 30, 3);
        }

        public function track_failed_attempts($username) {
            $ip = $_SERVER['REMOTE_ADDR'];
            $attempts = get_transient('failed_login_' . $ip) ?: 0;
            $attempts++;
            set_transient('failed_login_' . $ip, $attempts, $this->lockout_time);
        }

        public function check_login_attempts($user, $username, $password) {
            $ip = $_SERVER['REMOTE_ADDR'];
            if (get_transient('failed_login_' . $ip) >= $this->max_attempts) {
                return new WP_Error('too_many_attempts', 'Too many failed login attempts. Try again later.');
            }
            return $user;
        }
    }
    new WOWWP_Restrict_Login_Attempts();
    