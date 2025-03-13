<?php
    // This script defers JavaScript loading for faster page speed.
    // No customization needed unless excluding specific scripts.
    class WOWWP_Defer_Javascript_Loading {
        public function __construct() {
            add_filter('script_loader_tag', [$this, 'defer_scripts'], 10, 2);
        }
        public function defer_scripts($tag, $handle) {
            if (is_admin()) return $tag;
            return str_replace(' src', ' defer="defer" src', $tag);
        }
    }
    new WOWWP_Defer_Javascript_Loading();
    