<?php
    // This script registers a custom post type in WordPress.
    // Customize labels, slugs, and settings inside the function.
    class WOWWP_Add_Custom_Post_Type {
        public function __construct() {
            add_action('init', [$this, 'register_custom_post_type']);
        }
        public function register_custom_post_type() {
            register_post_type('custom_type', [
                'labels'      => ['name' => __('Custom Posts'), 'singular_name' => __('Custom Post')],
                'public'      => true,
                'has_archive' => true,
                'supports'    => ['title', 'editor', 'thumbnail'],
                'menu_icon'   => 'dashicons-admin-post'
            ]);
        }
    }
    new WOWWP_Add_Custom_Post_Type();
    