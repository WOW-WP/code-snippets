<?php
    // This script removes usernames from author archive URLs.
    // No customization needed.
    class WOWWP_Remove_Username_Author_URL {
        public function __construct() {
            add_filter('author_link', [$this, 'remove_author_username'], 10, 3);
        }
        public function remove_author_username($link, $author_id, $author_nicename) {
            return home_url('/author/anonymous/');
        }
    }
    new WOWWP_Remove_Username_Author_URL();
    