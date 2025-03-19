<?php
/**
 * Creates a simple image gallery. Call WOWWP_Gallery::display($post_id).
 */
class WOWWP_Gallery {
    public static function display($post_id) {
        $images = get_attached_media('image', $post_id);
        if ($images) {
            echo '<div class="custom-gallery">';
            foreach ($images as $image) {
                echo '<img src="' . esc_url($image->guid) . '" alt="">';
            }
            echo '</div>';
        }
    }
}
