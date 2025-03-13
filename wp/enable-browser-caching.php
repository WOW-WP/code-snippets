<?php
    // This script enables browser caching for WordPress.
    // No customization needed unless modifying cache duration.
    class WOWWP_Enable_Browser_Caching {
        public function __construct() {
            add_action('send_headers', [$this, 'add_cache_control_headers']);
        }
        public function add_cache_control_headers() {
            header("Cache-Control: max-age=31536000, public");
        }
    }
    new WOWWP_Enable_Browser_Caching();
    