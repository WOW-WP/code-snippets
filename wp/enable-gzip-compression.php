<?php
    // This script enables Gzip compression in WordPress.
    // No customization is needed unless additional compression settings are required.
    class WOWWP_Enable_Gzip_Compression {
        public function __construct() {
            add_action('init', [$this, 'enable_gzip']);
        }
        public function enable_gzip() {
            if (!ob_start("ob_gzhandler")) ob_start();
        }
    }
    new WOWWP_Enable_Gzip_Compression();
    