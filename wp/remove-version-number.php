<?php
    // This script removes the WordPress version number for enhanced security.
    // No customization required unless you want to add additional version-removal logic.
    class WOWWP_Remove_Version_Number {
        public function __construct() {
            add_filter('the_generator', [$this, 'remove_version_number']);
        }

        public function remove_version_number() {
            return ''; // Remove WordPress version from the HTML generator tag
        }
    }

    new WOWWP_Remove_Version_Number();
    