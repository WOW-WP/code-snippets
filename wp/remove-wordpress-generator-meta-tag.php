<?php
/**
 * Removes the WordPress version meta tag for security.
 */
class WOWWP_Remove_Generator_Tag {
    public function __construct() {
        remove_action('wp_head', 'wp_generator');
    }
}
new WOWWP_Remove_Generator_Tag();