<?php
/**
 * Removes the "Categories" widget from the WordPress sidebar.
 */
class WOWWP_Remove_Categories_Widget {
    public function __construct() {
        add_action('widgets_init', [$this, 'remove_categories_widget']);
    }

    public function remove_categories_widget() {
        unregister_widget('WP_Widget_Categories');
    }
}
new WOWWP_Remove_Categories_Widget();
