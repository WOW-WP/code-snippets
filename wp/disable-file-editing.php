<?php
    // This script disables file editing in the WordPress admin area.
    // No customization needed.
    class WOWWP_Disable_File_Editing {
        public function __construct() {
            add_action('init', [$this, 'disable_file_editor']);
        }
        public function disable_file_editor() {
            if (!defined('DISALLOW_FILE_EDIT')) {
                define('DISALLOW_FILE_EDIT', true);
            }
        }
    }
    new WOWWP_Disable_File_Editing();
    