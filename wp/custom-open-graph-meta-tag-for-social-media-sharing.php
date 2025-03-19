<?php
/**
 * Adds Open Graph meta tags for better social media sharing.
 */
class WOWWP_Open_Graph {
    public function __construct() {
        add_action('wp_head', [$this, 'add_open_graph_tags']);
    }

    public function add_open_graph_tags() {
        if (is_singular()) {
            echo '<meta property="og:title" content="' . esc_attr(get_the_title()) . '">';
            echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '">';
            echo '<meta property="og:image" content="' . esc_url(get_the_post_thumbnail_url()) . '">';
            echo '<meta property="og:description" content="' . esc_attr(get_the_excerpt()) . '">';
        }
    }
}
new WOWWP_Open_Graph();
