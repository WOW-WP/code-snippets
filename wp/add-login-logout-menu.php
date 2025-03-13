<?php
    class WOWWP_Add_Login_Logout_To_Menu {
        public function __construct() {
            add_filter('wp_nav_menu_items', [$this, 'add_login_logout_link'], 10, 2);
        }
        public function add_login_logout_link($items, $args) {
            if ($args->theme_location == 'primary') {
                $items .= is_user_logged_in() 
                    ? '<li class="menu-item"><a href="'. wp_logout_url(home_url()) .'">Logout</a></li>'
                    : '<li class="menu-item"><a href="'. wp_login_url() .'">Login</a></li>';
            }
            return $items;
        }
    }
    new WOWWP_Add_Login_Logout_To_Menu();
    