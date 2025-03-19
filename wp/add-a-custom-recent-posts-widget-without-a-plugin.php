<?php
// Adds a custom recent posts widget without a plugin.
class WOWWP_Custom_Recent_Posts_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct('wowwp_recent_posts', 'WOWWP Recent Posts', ['description' => 'A custom recent posts widget']);
        add_action('widgets_init', function() {
            register_widget('WOWWP_Custom_Recent_Posts_Widget');
        });
    }
    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        $recent_posts = wp_get_recent_posts(['numberposts' => 5, 'post_status' => 'publish']);
        echo '<ul>';
        foreach ($recent_posts as $post) {
            echo '<li><a href="' . get_permalink($post['ID']) . '">' . $post['post_title'] . '</a></li>';
        }
        echo '</ul>';
        echo $args['after_widget'];
    }
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : 'Recent Posts';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }
    public function update($new_instance, $old_instance) {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}
new WOWWP_Custom_Recent_Posts_Widget();