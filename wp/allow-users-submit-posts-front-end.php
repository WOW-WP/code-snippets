<?php
    // This script allows users to submit posts from the front end.
    // Customize post type, status, and allowed user roles.
    class WOWWP_Allow_Frontend_Post_Submission {
        public function __construct() {
            add_shortcode('frontend_post_form', [$this, 'render_post_submission_form']);
            add_action('admin_post_nopriv_submit_frontend_post', [$this, 'handle_post_submission']);
            add_action('admin_post_submit_frontend_post', [$this, 'handle_post_submission']);
        }
        public function render_post_submission_form() {
            if (!is_user_logged_in()) return '<p>Please log in to submit a post.</p>';
            return '<form method="POST" action="' . esc_url(admin_url('admin-post.php')) . '">
                        <input type="text" name="post_title" placeholder="Post Title" required>
                        <textarea name="post_content" placeholder="Post Content" required></textarea>
                        <input type="hidden" name="action" value="submit_frontend_post">
                        <input type="submit" value="Submit">
                    </form>';
        }
        public function handle_post_submission() {
            if (!is_user_logged_in()) wp_die('Unauthorized action');
            $post_id = wp_insert_post([
                'post_title' => sanitize_text_field($_POST['post_title']),
                'post_content' => sanitize_textarea_field($_POST['post_content']),
                'post_status' => 'pending',
                'post_author' => get_current_user_id(),
                'post_type' => 'post'
            ]);
            wp_redirect(home_url());
            exit;
        }
    }
    new WOWWP_Allow_Frontend_Post_Submission();
    