<?php
/**
 * Sets a custom default avatar in WordPress.
 * Change the URL inside get_custom_avatar function.
 */
class WOWWP_Custom_Avatar {
    public function __construct() {
        add_filter('avatar_defaults', [$this, 'set_custom_avatar']);
    }

    public function set_custom_avatar($avatars) {
        $url = 'https://example.com/custom-avatar.png';
        $avatars[$url] = 'Custom Avatar';
        return $avatars;
    }
}
new WOWWP_Custom_Avatar();
