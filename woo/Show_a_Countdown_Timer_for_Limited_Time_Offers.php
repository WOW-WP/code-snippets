<?php
/**
 * Displays a countdown timer for limited-time offers.
 */
class WOWWP_Countdown_Timer {
    public function __construct() {
        add_action('woocommerce_before_single_product', [$this, 'display_timer']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
    }

    public function display_timer() {
        echo '<div id="countdown-timer">Offer ends in: <span id="timer"></span></div>';
    }

    public function enqueue_scripts() {
        wp_add_inline_script('jquery', "jQuery(document).ready(function($) {
            var timeLeft = 3600; // Set countdown in seconds
            function updateTimer() {
                var minutes = Math.floor(timeLeft / 60);
                var seconds = timeLeft % 60;
                $('#timer').text(minutes + 'm ' + seconds + 's');
                if (timeLeft > 0) {
                    timeLeft--;
                    setTimeout(updateTimer, 1000);
                }
            }
            updateTimer();
        });");
    }
}
new WOWWP_Countdown_Timer();
