<?php
// Removes "Archives" and "Meta" widgets from the WordPress sidebar.
class WOWWP_Remove_Default_Widgets {
    public function __construct() {
        add_action('widgets_init', [$this, 'unregister_default_widgets']);
    }
    public function unregister_default_widgets() {
        unregister_widget('WP_Widget_Archives');
        unregister_widget('WP_Widget_Meta');
    }
}
new WOWWP_Remove_Default_Widgets();