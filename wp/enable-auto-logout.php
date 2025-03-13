<?php
    // This script enables automatic logout for inactive users.
    // Customize the inactivity duration in seconds.
    class WOWWP_Enable_Auto_Logout {
        private $timeout = 900; // 15 minutes

        public function __construct() {
            add_action('wp_enqueue_scripts', [$this, 'enqueue_logout_script']);
        }

        public function enqueue_logout_script() {
            if (is_user_logged_in()) {
                echo '<script>
                    var timeout = setTimeout(function() { window.location = "' . wp_logout_url() . '"; }, ' . $this->timeout * 1000 . ');
                    document.addEventListener("mousemove", function() { clearTimeout(timeout); timeout = setTimeout(function() { window.location = "' . wp_logout_url() . '"; }, ' . $this->timeout * 1000 . '); });
                </script>';
            }
        }
    }
    new WOWWP_Enable_Auto_Logout();
    