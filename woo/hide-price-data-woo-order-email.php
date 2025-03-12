<?php

/**
 * This snippets hides pricing data from WooCommerce emails.
 * Simply enable the code in our WOW Snippets plugin.
 */
function ymcode_hide_shipping_row_with_css()
{
    ?>
    <style>
        table table table table th:last-child,
        table table table table .order_item td:last-child,
        table table table table tfoot {
            display: none;
        }       
    </style>
    <?php
}

add_action('woocommerce_email_header', 'ymcode_hide_shipping_row_with_css', 10, 0);