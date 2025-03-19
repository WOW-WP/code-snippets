<?php
/**
 * Removes the /category/ base from WordPress category URLs.
 */
class WOWWP_Remove_Category_Base {
    public function __construct() {
        add_filter('category_link', [$this, 'remove_category_base'], 10, 2);
    }

    public function remove_category_base($link, $term_id) {
        return str_replace('/category/', '/', $link);
    }
}
new WOWWP_Remove_Category_Base();
