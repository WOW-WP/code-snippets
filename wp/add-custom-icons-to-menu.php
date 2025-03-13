<?php
    class WOWWP_Add_Custom_Icons_To_Menu {
        public function __construct() {
            add_filter('nav_menu_item_title', [$this, 'add_menu_icons'], 10, 4);
        }
        public function add_menu_icons($title, $item, $args, $depth) {
            $icons = [
                'Home' => '<span class="dashicons dashicons-admin-home"></span> ',
                'Blog' => '<span class="dashicons dashicons-edit"></span> '
            ];
            return isset($icons[$item->title]) ? $icons[$item->title] . $title : $title;
        }
    }
    new WOWWP_Add_Custom_Icons_To_Menu();
    