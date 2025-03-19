<?php
/**
 * Enables SVG uploads in WordPress.
 */
class WOWWP_Allow_SVG {
    public function __construct() {
        add_filter('upload_mimes', [$this, 'allow_svg']);
    }

    public function allow_svg($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
}
new WOWWP_Allow_SVG();
