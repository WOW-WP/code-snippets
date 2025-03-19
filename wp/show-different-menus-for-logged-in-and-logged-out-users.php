<?php
/**
 * Displays different menus for logged-in and logged-out users.
 * Customize the menu locations inside the filter function.
 */
class WOWWP_Dynamic_Menus {
    public function __construct() {
        add_filter('wp_nav_menu_args', [$this, 'set_dynamic_menus']);
    }

    public function set_dynamic_menus($args) {
        if (is_user_logged_in()) {
            $args['theme_location'] = 'logged-in-menu';
        } else {
            $args['theme_location'] = 'logged-out-menu';
        }
        return $args;
    }
}
new WOWWP_Dynamic_Menus();
