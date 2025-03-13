<?php
    // This script enables lazy loading for images in WordPress without a plugin.
    // No customization required.
    class WOWWP_Lazy_Load_Images {
        public function __construct() {
            add_filter('the_content', [$this, 'add_lazy_load_to_images']);
        }
        public function add_lazy_load_to_images($content) {
            return preg_replace('/<img(.*?)src=/i', '<img$1loading="lazy" src=', $content);
        }
    }
    new WOWWP_Lazy_Load_Images();
    