<?php
class WOWWP_Disable_Admin_Bar {

    // Array of user roles or IDs for whom the admin bar should be disabled
    private $excluded_users = array('subscriber', 'editor');  // Modify roles or add user IDs as needed

    public function __construct() {
        add_filter('show_admin_bar', [$this, 'disable_admin_bar_for_users']);
    }

    /**
     * Disable the admin bar for specific users
     *
     * @param bool $show_admin_bar
     * @return bool
     */
    public function disable_admin_bar_for_users($show_admin_bar) {
        // Check if the user is logged in
        if (is_user_logged_in()) {
            $user = wp_get_current_user();
            
            // Disable the admin bar if the user has a specific role or user ID
            if (array_intersect($this->excluded_users, $use
