<?php
    // This script adds an author box below WordPress posts.
    // Customize the display style inside the function.
    class WOWWP_Add_Author_Box {
        public function __construct() {
            add_filter('the_content', [$this, 'add_author_box']);
        }
        public function add_author_box($content) {
            if (is_single()) {
                $author_info = '<div class="author-box"><h3>About the Author</h3>';
                $author_info .= '<p>' . get_the_author_meta('display_name') . '</p>';
                $author_info .= '<p>' . get_the_author_meta('description') . '</p></div>';
                return $content . $author_info;
            }
            return $content;
        }
    }
    new WOWWP_Add_Author_Box();
    