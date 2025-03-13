<?php
    class WOWWP_Remove_Search_Functionality {
        public function __construct() {
            add_action('template_redirect', [$this, 'disable_search']);
        }
        public function disable_search() {
            if (is_search()) {
                wp_redirect(home_url());
                exit;
            }
        }
    }
    new WOWWP_Remove_Search_Functionality();
    