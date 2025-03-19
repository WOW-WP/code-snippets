<?php
/**
 * Disables default WordPress image compression.
 */
class WOWWP_Disable_Image_Compression {
    public function __construct() {
        add_filter('jpeg_quality', fn() => 100);
    }
}
new WOWWP_Disable_Image_Compression();
