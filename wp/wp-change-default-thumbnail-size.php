<?php
/**
 * Changes the default WordPress thumbnail size.
 * Modify width and height in set_thumbnail_size().
 */
class WOWWP_Thumbnail_Size {
    public function __construct() {
        add_action('after_setup_theme', [$this, 'set_thumbnail_size']);
    }

    public function set_thumbnail_size() {
        set_post_thumbnail_size(300, 200, true);
    }
}
new WOWWP_Thumbnail_Size();
