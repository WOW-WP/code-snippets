<?php
/**
 * Displays related posts based on categories.
 * Call WOWWP_Related_Posts::display() inside the theme templates.
 */
class WOWWP_Related_Posts {
    public static function display() {
        $categories = wp_get_post_categories(get_the_ID());
        if (!$categories) return;

        $query = new WP_Query([
            'category__in' => $categories,
            'post__not_in' => [get_the_ID()],
            'posts_per_page' => 3,
        ]);

        if ($query->have_posts()) {
            echo '<ul class="related-posts">';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
            wp_reset_postdata();
        }
    }
}
