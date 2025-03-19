<?php
/**
 * Disables the zoom effect on WooCommerce product images.
 */
class WOWWP_Disable_Zoom {
    public function __construct() {
        add_action('wp', [$this, 'remove_zoom_effect']);
    }

    public function remove_zoom_effect() {
        remove_theme_support('wc-product-gallery-zoom');
    }
}
new WOWWP_Disable_Zoom();
