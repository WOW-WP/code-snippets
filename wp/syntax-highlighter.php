<?php

/**
 * syntax highlighting with Prisma without installing plugins.
 */
class WOWWP_PrismSyntaxHighlighter {
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    /**
     * Check if the current post contains syntax highlighting blocks.
     */
    private function has_syntax_highlighting() {
        global $post;
        if (is_singular() && isset($post->post_content)) {
            return strpos($post->post_content, '<pre><code') !== false;
        }
        return false;
    }

    /**
     * Enqueue Prism.js and CSS only when needed.
     */
    public function enqueue_assets() {
        if (!is_admin() && $this->has_syntax_highlighting()) {
            // Enqueue Prism.js with async attribute
            wp_enqueue_script('prism-js', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js', array(), null, true);
            add_filter('script_loader_tag', [$this, 'add_async_defer'], 10, 2);

            // Enqueue Prism CSS
            wp_enqueue_style('prism-css', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css', array(), null);
        }
    }

    /**
     * Add async and defer attributes to Prism.js script tag.
     */
    public function add_async_defer($tag, $handle) {
        if ('prism-js' === $handle) {
            return str_replace(' src', ' async defer src', $tag);
        }
        return $tag;
    }
}

// Initialize the class
new WOWWP_PrismSyntaxHighlighter();
