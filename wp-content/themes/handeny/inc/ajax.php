<?php
    
    add_action('wp_ajax_add_to_cart', 'add_to_cart_callback');
    add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart_callback');
    
    function add_to_cart_callback() {
        $product_id = $_POST['product_id'];
        
        WC()->cart->add_to_cart($product_id);
        
        ob_start();
        woocommerce_mini_cart();
        $mini_cart = ob_get_clean();
        
        echo $mini_cart;
        
        wp_die();
    }
    
    add_action('wp_ajax_remove_from_cart', 'remove_from_cart_callback');
    add_action('wp_ajax_nopriv_remove_from_cart', 'remove_from_cart_callback');
    
    function remove_from_cart_callback() {
        $product_id = $_POST['product_id'];
        
        WC()->cart->remove_cart_item($product_id);
        
        ob_start();
        woocommerce_mini_cart();
        $mini_cart = ob_get_clean();
        
        echo $mini_cart;
        
        wp_die();
    }