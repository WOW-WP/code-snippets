<?php
    // This script hides the author name in WordPress posts.
    // No customization needed unless additional conditions are required.
    class WOWWP_Hide_Author_Name {
        public function __construct() {
            add_filter('the_author', '__return_empty_string');
            add_filter('get_the_author_display_name', '__return_empty_string');
        }
    }
    new WOWWP_Hide_Author_Name();
    