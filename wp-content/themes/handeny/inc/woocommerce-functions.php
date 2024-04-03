<?php
    function display_free_shipping_notice()
    {
        $free_shipping_threshold = 1500;
        $cart_total = WC()->cart->get_cart_contents_total();
        $percentage = ($cart_total / $free_shipping_threshold) * 100;
        
        if ($cart_total < $free_shipping_threshold) {
            $remaining_amount = $free_shipping_threshold - $cart_total;
            echo '<div class="woocommerce-mini-cart__free-shipping"><div class="text">Add <span class="price">' . '$' . number_format($remaining_amount, 2) . '</span> to cart and get <b>free shipping!</b></div><div class="progress-bar"><div class="progress" style="width: ' . $percentage . '%"></div></div></div>';
        }
    }
    
    add_action('woocommerce_widget_shopping_cart_total', 'display_free_shipping_notice');