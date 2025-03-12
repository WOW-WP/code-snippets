<?php
/**
 * Show A Popup on WooCommerce Cart Page When Products From Specific Categories Are Added
 * Simply activate this snippet using our WOW Snippets plugin and edit the required variables. 
 */


/**
** Set your custom message. Do not include html 
** as it will be stripped off. 
**/ 
define('YMCODE_CUSTOM_MESSAGE', 'You have a special discount');

/**
** Set one or more categories IDs in the array. 
**/ 
define('YMCODE_CAT_IDS', [1,2, ]);



#### DO NOT EDIT BELOW THIS LINE ####
/**
** Add the popup code in JavaScript
**/ 
function ymcode_woocommerce_popup_alert()
{
?>
<script type="text/javascript">
    (function($) {
    alert('<?php echo esc_html(YMCODE_CUSTOM_MESSAGE); ?>');
     })( jQuery );
</script>
<?php
}

/**
** Check if cart has products from the categories mentioned above
**/
function ymcode_woocommerce_check_if_product_exists()
{
    global $woocommerce;
    $items = $woocommerce->cart->get_cart();

    $show_popup_alert = false; 

    foreach($items as $item => $values) { 
        $terms = get_the_terms( $values['data']->get_id(), 'product_cat' );
        foreach ($terms as $term) {
            if (in_array($term->term_id, YMCODE_CAT_IDS))
            {
                $show_popup_alert = true;
                break 2;
            }
        }
    }

    if ( $show_popup_alert === true )
    {
        //product exists, hook the javascript alert message to footer
    add_action( 'wp_footer', 'ymcode_woocommerce_popup_alert' );
    } 

}

add_action('woocommerce_before_cart','ymcode_woocommerce_check_if_product_exists');

