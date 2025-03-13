<?php
    // This script removes unused CSS and JavaScript in WordPress.
    // Customize the list of handles to remove unused assets.
    class WOWWP_Remove_Unused_CSS_JS {
        public function __construct() {
            add_action('wp_enqueue_scripts', [$this, 'remove_unused_assets'], 100);
        }
        public function remove_unused_assets() {
            wp_dequeue_style('wp-block-library');
            wp_dequeue_script('jquery-migrate');
        }
    }
    new WOWWP_Remove_Unused_CSS_JS();
    