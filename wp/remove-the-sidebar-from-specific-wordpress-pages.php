<?php
// Removes the sidebar from specific WordPress pages. Customize the page IDs.
class WOWWP_Remove_Sidebar {
    public function __construct() {
        add_action('template_redirect', [$this, 'remove_sidebar']);
    }
    public function remove_sidebar() {
        if (is_page([1, 2, 3])) { // Example page IDs
            remove_action('get_sidebar', 'twentytwenty_get_sidebar');
        }
    }
}
new WOWWP_Remove_Sidebar();