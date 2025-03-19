<?php
/**
 * Displays featured posts in the sidebar.
 */
class WOWWP_Featured_Posts {
    public static function display() {
        $query = new WP_Query([
            'meta_key' => 'featured_post',
            'meta_value' => '1',
            'posts_per_page' => 5,
        ]);

        if ($query->have_posts()) {
            echo '<ul class="featured-posts">';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
            wp_reset_postdata();
        }
    }
}
