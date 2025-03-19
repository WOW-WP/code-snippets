<?php
// Changes the default WooCommerce currency symbol. Customize the currency symbol.
class WOWWP_Change_Currency_Symbol {
    public function __construct() {
        add_filter('woocommerce_currency_symbol', [$this, 'change_currency_symbol'], 10, 2);
    }
    public function change_currency_symbol($currency_symbol, $currency) {
        if ($currency == 'USD') {
            $currency_symbol = 'US$'; // Example new currency symbol
        }
        return $currency_symbol;
    }
}
new WOWWP_Change_Currency_Symbol();