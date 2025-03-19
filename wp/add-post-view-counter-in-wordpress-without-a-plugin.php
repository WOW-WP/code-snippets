<?php
/**
 * Adds a post view counter to track views.
 */
class WOWWP_Post_View_Counter {
    public function __construct() {
        add_action('wp_head', [$this, 'track_views']);
        add_filter('the_content', [$this, 'display_view_count']);
    }

    public function track_views() {
        if (is_single()) {
            $post_id = get_the_ID();
            $views = get_post_meta($post_id, 'wowwp_views', true) ?: 0;
            update_post_meta($post_id, 'wowwp_views', $views + 1);
        }
    }

    public function display_view_count($content) {
        if (is_single()) {
            $views = get_post_meta(get_the_ID(), 'wowwp_views', true) ?: 0;
            $content .= '<p>Views: ' . esc_html($views) . '</p>';
        }
        return $content;
    }
}
new WOWWP_Post_View_Counter();
