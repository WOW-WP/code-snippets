<?php
// Shows the discount percentage on sale products.
class WOWWP_Show_Discount_Percentage {
    public function __construct() {
        add_filter('woocommerce_sale_flash', [$this, 'show_discount_percentage'], 10, 3);
    }
    public function show_discount_percentage($html, $post, $product) {
        if ($product->is_on_sale()) {
            $regular_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();
            $discount_percentage = round((($regular_price - $sale_price) / $regular_price) * 100);
            $html = '<span class="onsale">' . esc_html($discount_percentage) . '% Off</span>';
        }
        return $html;
    }
}
new WOWWP_Show_Discount_Percentage();