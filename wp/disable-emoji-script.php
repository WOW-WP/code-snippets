<?php
    // This script disables the WordPress emoji script to improve site speed.
    // No customization needed unless keeping emoji support in certain areas.
    class WOWWP_Disable_Emoji_Script {
        public function __construct() {
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            remove_action('wp_print_styles', 'print_emoji_styles');
        }
    }
    new WOWWP_Disable_Emoji_Script();
    