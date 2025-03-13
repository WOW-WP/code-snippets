<?php
    // This script changes the default "Read More" text in WordPress excerpts.
    // Customize the return string to modify the text.
    class WOWWP_Change_Read_More_Text {
        public function __construct() {
            add_filter('excerpt_more', [$this, 'change_read_more']);
        }
        public function change_read_more($more) {
            return '... <a href="' . get_permalink() . '">Continue Reading</a>'; // Modify text here
        }
    }
    new WOWWP_Change_Read_More_Text();
    