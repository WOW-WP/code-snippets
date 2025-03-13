<?php
    // This script adds a basic two-factor authentication (2FA) feature.
    // Customize the security question inside the function.
    class WOWWP_Two_Factor_Auth {
        public function __construct() {
            add_action('login_form', [$this, 'add_2fa_field']);
            add_filter('authenticate', [$this, 'validate_2fa'], 30, 3);
        }

        public function add_2fa_field() {
            echo '<p><label for="security_answer">Security Question: What is 2 + 2?</label>';
            echo '<input type="text" name="security_answer"></p>';
        }

        public function validate_2fa($user, $username, $password) {
            if (!isset($_POST['security_answer']) || $_POST['security_answer'] !== '4') {
                return new WP_Error('invalid_2fa', 'Security answer is incorrect.');
            }
            return $user;
        }
    }
    new WOWWP_Two_Factor_Auth();
    