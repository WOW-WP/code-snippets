<?php
/**
 * Provides a discount coupon for customers who leave a product review.
 */
class WOWWP_Review_Discount {
    public function __construct() {
        add_action('comment_post', [$this, 'reward_reviewers'], 10, 2);
    }

    public function reward_reviewers($comment_ID, $comment_approved) {
        if ($comment_approved && get_post_type(get_comment($comment_ID)->comment_post_ID) == 'product') {
            $coupon_code = 'THANKYOU10'; // Change coupon code
            wp_mail(get_comment_author_email($comment_ID), 'Thanks for your review!', 'Here is a 10% off coupon: ' . $coupon_code);
        }
    }
}
new WOWWP_Review_Discount();
