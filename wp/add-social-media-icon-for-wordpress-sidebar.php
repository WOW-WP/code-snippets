<?php
// filepath: e:\DEV\wp-content\plugins\wow-snippets\code-snippets\woo\add-social-media-icons-to-the-wordpress-sidebar.php
<?php
// Adds social media icons to the WordPress sidebar. Customize the social media links.
class WOWWP_Social_Media_Icons {
    public function __construct() {
        add_action('widgets_init', [$this, 'register_social_media_widget']);
    }
    public function register_social_media_widget() {
        register_sidebar([
            'name' => 'Social Media Sidebar',
            'id' => 'social-media-sidebar',
            'before_widget' => '<div class="social-media-widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ]);
    }
}
new WOWWP_Social_Media_Icons();