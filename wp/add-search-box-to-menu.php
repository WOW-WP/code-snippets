<?php
    class WOWWP_Add_Search_Box_To_Menu {
        public function __construct() {
            add_filter('wp_nav_menu_items', [$this, 'add_search_form'], 10, 2);
        }
        public function add_search_form($items, $args) {
            if ($args->theme_location == 'primary') {
                $items .= '<li class="menu-item search-form">' . get_search_form(false) . '</li>';
            }
            return $items;
        }
    }
    new WOWWP_Add_Search_Box_To_Menu();
    