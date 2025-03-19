<?php
/**
 * Stops WordPress from generating extra image sizes.
 */
class WOWWP_Disable_Extra_Image_Sizes {
    public function __construct() {
        add_filter('intermediate_image_sizes_advanced', [$this, 'disable_sizes']);
    }

    public function disable_sizes($sizes) {
        unset($sizes['medium'], $sizes['large'], $sizes['medium_large']);
        return $sizes;
    }
}
new WOWWP_Disable_Extra_Image_Sizes();
