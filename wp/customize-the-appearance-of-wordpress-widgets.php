<?php
// Customizes the appearance of WordPress widgets. Add custom CSS styles.
class WOWWP_Customize_Widgets {
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_custom_styles']);
    }
    public function enqueue_custom_styles() {
        wp_enqueue_style('custom-widget-styles', get_stylesheet_directory_uri() . '/custom-widget-styles.css');
    }
}
new WOWWP_Customize_Widgets();