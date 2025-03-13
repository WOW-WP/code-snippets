<?php
    // This script prevents direct access to WordPress PHP files.
    // No customization needed.
    class WOWWP_Prevent_Direct_Access_PHP {
        public function __construct() {
            add_action('init', [$this, 'block_direct_access']);
        }
        public function block_direct_access() {
            if (basename($_SERVER['PHP_SELF']) !== 'index.php' && strpos($_SERVER['PHP_SELF'], 'wp-admin') === false) {
                exit('Direct access is not allowed.');
            }
        }
    }
    new WOWWP_Prevent_Direct_Access_PHP();
    