<?php
/**
 * Adds a "Back to Top" button using JavaScript.
 */
class WOWWP_Back_To_Top {
    public function __construct() {
        add_action('wp_footer', [$this, 'add_back_to_top_button']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
    }

    public function add_back_to_top_button() {
        echo '<button id="back-to-top" style="display:none;position:fixed;bottom:20px;right:20px;padding:10px;background:#333;color:#fff;border:none;cursor:pointer;">Top</button>';
    }

    public function enqueue_scripts() {
        wp_enqueue_script('back-to-top', get_template_directory_uri() . '/js/back-to-top.js', ['jquery'], null, true);
        wp_add_inline_script('back-to-top', "jQuery(document).ready(function($){ $(window).scroll(function(){ if ($(this).scrollTop() > 100) { $('#back-to-top').fadeIn(); } else { $('#back-to-top').fadeOut(); } }); $('#back-to-top').click(function(){ $('html, body').animate({scrollTop : 0},800); return false; }); });");
    }
}
new WOWWP_Back_To_Top();
