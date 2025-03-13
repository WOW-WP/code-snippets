<?php
    // This script allows users to change the default WordPress excerpt length.
    // Modify the $excerpt_length variable to set the desired length.
    class WOWWP_Change_Excerpt_Length {
        public function __construct() {
            add_filter('excerpt_length', [$this, 'set_excerpt_length'], 999);
        }

        public function set_excerpt_length($length) {
            return 20; // Set custom length (change 20 to your desired length)
        }
    }

    new WOWWP_Change_Excerpt_Length();
    