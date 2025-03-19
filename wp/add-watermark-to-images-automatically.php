<?php
/**
 * Adds a watermark to uploaded images.
 * Customize watermark.png path.
 */
class WOWWP_Add_Watermark {
    public function __construct() {
        add_filter('wp_generate_attachment_metadata', [$this, 'apply_watermark'], 10, 2);
    }

    public function apply_watermark($metadata, $attachment_id) {
        $path = get_attached_file($attachment_id);
        $watermark = get_template_directory() . '/watermark.png';

        if (file_exists($watermark) && function_exists('imagecreatefrompng')) {
            $image = imagecreatefromjpeg($path);
            $wm = imagecreatefrompng($watermark);

            imagecopy($image, $wm, 10, 10, 0, 0, imagesx($wm), imagesy($wm));
            imagejpeg($image, $path);
        }

        return $metadata;
    }
}
new WOWWP_Add_Watermark();
