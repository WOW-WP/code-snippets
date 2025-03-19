<?php
/**
 * Adds infinite scroll to WordPress blog posts.
 */
class WOWWP_Infinite_Scroll {
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_action('wp_ajax_load_more_posts', [$this, 'load_more_posts']);
        add_action('wp_ajax_nopriv_load_more_posts', [$this, 'load_more_posts']);
    }

    public function enqueue_scripts() {
        wp_enqueue_script('wowwp-infinite-scroll', get_template_directory_uri() . '/js/infinite-scroll.js', ['jquery'], null, true);
        wp_localize_script('wowwp-infinite-scroll', 'wowwp_ajax', ['url' => admin_url('admin-ajax.php')]);
    }

    public function load_more_posts() {
        $query = new WP_Query([
            'post_type' => 'post',
            'paged' => $_POST['page'],
        ]);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                get_template_part('template-parts/content', get_post_format());
            }
        }
        wp_die();
    }
}
new WOWWP_Infinite_Scroll();
