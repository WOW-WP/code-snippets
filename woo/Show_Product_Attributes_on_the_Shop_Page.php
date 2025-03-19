<?php
/**
 * Displays product attributes on the WooCommerce shop page.
 */
class WOWWP_Show_Product_Attributes {
    public function __construct() {
        add_action('woocommerce_after_shop_loop_item_title', [$this, 'display_product_attributes'], 15);
    }

    public function display_product_attributes() {
        global $product;
        $attributes = $product->get_attributes();
        if (!empty($attributes)) {
            echo '<p class="product-attributes">';
            foreach ($attributes as $attribute) {
                echo esc_html(wc_attribute_label($attribute->get_name())) . ': ' . esc_html(implode(', ', wc_get_product_terms($product->get_id(), $attribute->get_name(), ['fields' => 'names']))) . '<br>';
            }
            echo '</p>';
        }
    }
}
new WOWWP_Show_Product_Attributes();
