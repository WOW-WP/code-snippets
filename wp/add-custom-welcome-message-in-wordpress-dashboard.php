<?php
/**
 * Adds a custom welcome message to the WordPress dashboard.
 * Change the welcome text inside get_welcome_message function.
 */
class WOWWP_Dashboard_Welcome {
    public function __construct() {
        add_action('wp_dashboard_setup', [$this, 'add_dashboard_widget']);
    }

    public function add_dashboard_widget() {
        wp_add_dashboard_widget('wowwp_welcome_widget', 'Welcome!', [$this, 'display_welcome_message']);
    }

    public function display_welcome_message() {
        echo '<p>' . esc_html($this->get_welcome_message()) . '</p>';
    }

    private function get_welcome_message() {
        return 'Welcome to your WordPress dashboard! Have a great day!';
    }
}
new WOWWP_Dashboard_Welcome();
