<?php
    // This script adds an estimated reading time to WordPress posts.
    // Customize the words-per-minute calculation inside the function.
    class WOWWP_Add_Estimated_Reading_Time {
        public function __construct() {
            add_filter('the_content', [$this, 'add_reading_time']);
        }
        public function add_reading_time($content) {
            $word_count = str_word_count(strip_tags($content));
            $reading_time = ceil($word_count / 200); // Adjust WPM if needed
            return '<p>Estimated reading time: ' . $reading_time . ' min</p>' . $content;
        }
    }
    new WOWWP_Add_Estimated_Reading_Time();
    