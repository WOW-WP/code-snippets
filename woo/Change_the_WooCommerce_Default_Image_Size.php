<?php
/**
 * Changes the default WooCommerce product image size.
 * Modify width and height in the set_image_size function.
 */
class WOWWP_Custom_Woo_Image_Size {
    public function __construct() {
        add_filter('woocommerce_get_image_size_thumbnail', [$this, 'set_image_size']);
    }

    public function set_image_size($size) {
        return [
            'width'  => 400, // Change width here
            'height' => 400, // Change height here
            'crop'   => 1,
        ];
    }
}
new WOWWP_Custom_Woo_Image_Size();
