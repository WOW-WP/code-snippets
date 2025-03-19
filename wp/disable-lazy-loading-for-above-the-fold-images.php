<?php
/**
 * Disables lazy loading for the first image in a post.
 */
class WOWWP_Disable_Lazy_Load {
    public function __construct() {
        add_filter('wp_get_attachment_image_attributes', [$this, 'disable_lazy_on_first_image'], 10, 2);
    }

    public function disable_lazy_on_first_image($attr, $attachment) {
        static $count = 0;
        if ($count === 0) {
            unset($attr['loading']);
        }
        $count++;
        return $attr;
    }
}
new WOWWP_Disable_Lazy_Load();
