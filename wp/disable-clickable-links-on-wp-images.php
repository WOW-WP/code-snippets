<?php
/**
 * Prevents images from being wrapped in links.
 */
class WOWWP_Disable_Image_Links {
    public function __construct() {
        add_filter('the_content', [$this, 'remove_image_links']);
    }

    public function remove_image_links($content) {
        return preg_replace('/<a[^>]+>(<img[^>]+>)<\/a>/', '$1', $content);
    }
}
new WOWWP_Disable_Image_Links();
