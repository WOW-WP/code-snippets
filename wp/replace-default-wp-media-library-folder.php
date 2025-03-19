<?php
/**
 * Changes the default upload folder.
 */
class WOWWP_Custom_Media_Folder {
    public function __construct() {
        add_filter('upload_dir', [$this, 'change_upload_dir']);
    }

    public function change_upload_dir($dirs) {
        $dirs['path'] = WP_CONTENT_DIR . '/custom-uploads';
        $dirs['url'] = WP_CONTENT_URL . '/custom-uploads';
        return $dirs;
    }
}
new WOWWP_Custom_Media_Folder();
