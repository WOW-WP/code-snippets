<?php
    // This script sets a custom default featured image for posts.
    // Customize the default image URL inside the function.
    class WOWWP_Set_Custom_Default_Featured_Image {
        public function __construct() {
            add_filter('get_post_metadata', [$this, 'set_default_thumbnail'], 10, 4);
        }
        public function set_default_thumbnail($value, $post_id, $meta_key, $single) {
            if ($meta_key === '_thumbnail_id' && empty($value)) {
                return attachment_url_to_postid('YOUR_DEFAULT_IMAGE_URL'); // Change to your image URL
            }
            return $value;
        }
    }
    new WOWWP_Set_Custom_Default_Featured_Image();
    