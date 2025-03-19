<?php
/**
 * Enables WebP image support in WordPress.
 */
class WOWWP_Enable_WebP {
    public function __construct() {
        add_filter('upload_mimes', [$this, 'allow_webp_uploads']);
    }

    public function allow_webp_uploads($mimes) {
        $mimes['webp'] = 'image/webp';
        return $mimes;
    }
}
new WOWWP_Enable_WebP();
