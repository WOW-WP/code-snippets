<?php
    // This script automatically sets the first image of a post as the featured image.
    // No customization needed unless modifying how images are detected.
    class WOWWP_Set_First_Image_As_Featured {
        public function __construct() {
            add_action('save_post', [$this, 'set_featured_image']);
        }
        public function set_featured_image($post_id) {
            if (has_post_thumbnail($post_id)) return;
            $content = get_post_field('post_content', $post_id);
            preg_match('/<img .*?src=["'](.*?)["']/i', $content, $matches);
            if (!empty($matches[1])) {
                $attachment_id = attachment_url_to_postid($matches[1]);
                if ($attachment_id) set_post_thumbnail($post_id, $attachment_id);
            }
        }
    }
    new WOWWP_Set_First_Image_As_Featured();
    