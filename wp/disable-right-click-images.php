<?php
    // This script disables right-click on WordPress images.
    // No customization needed unless modifying script behavior.
    class WOWWP_Disable_Right_Click_Images {
        public function __construct() {
            add_action('wp_footer', [$this, 'disable_right_click_script']);
        }
        public function disable_right_click_script() {
            echo '<script>document.addEventListener("contextmenu", function(e) {if(e.target.tagName === "IMG") {e.preventDefault();}}, false);</script>';
        }
    }
    new WOWWP_Disable_Right_Click_Images();
    