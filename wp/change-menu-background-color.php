<?php
    class WOWWP_Change_Menu_Background {
        public function __construct() {
            add_action('wp_head', [$this, 'add_menu_background_css']);
        }
        public function add_menu_background_css() {
            echo '<style> .site-navigation { background-color: #333 !important; } </style>';
        }
    }
    new WOWWP_Change_Menu_Background();
    