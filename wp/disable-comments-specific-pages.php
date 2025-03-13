<?php
    // This script disables comments on specific WordPress pages.
    // Customize the $disabled_pages array with page IDs.
    class WOWWP_Disable_Comments_On_Pages {
        public function __construct() {
            add_filter('comments_open', [$this, 'disable_comments'], 10, 2);
        }
        public function disable_comments($open, $post_id) {
            $disabled_pages = [10, 20]; // Replace with page IDs
            return in_array($post_id, $disabled_pages) ? false : $open;
        }
    }
    new WOWWP_Disable_Comments_On_Pages();
    