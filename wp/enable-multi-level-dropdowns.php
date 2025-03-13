<?php
    class WOWWP_Enable_Multi_Level_Dropdowns {
        public function __construct() {
            add_action('wp_enqueue_scripts', [$this, 'enqueue_dropdown_scripts']);
        }
        public function enqueue_dropdown_scripts() {
            wp_enqueue_script('dropdown-menu', get_template_directory_uri() . '/dropdown.js', ['jquery'], null, true);
        }
    }
    new WOWWP_Enable_Multi_Level_Dropdowns();
    