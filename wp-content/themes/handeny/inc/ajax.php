<?php
    
    add_action('wp_ajax_add_to_cart', 'add_to_cart_callback');
    add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart_callback');
    
    function add_to_cart_callback()
    {
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
    
    function remove_from_cart_callback()
    {
        $product_id = $_POST['product_id'];
        
        WC()->cart->remove_cart_item($product_id);
        
        ob_start();
        woocommerce_mini_cart();
        $mini_cart = ob_get_clean();
        
        echo $mini_cart;
        
        wp_die();
    }
    
    add_action('wp_ajax_get_cart_count_and_total', 'get_cart_count_and_total_callback');
    add_action('wp_ajax_nopriv_get_cart_count_and_total', 'get_cart_count_and_total_callback');
    
    function get_cart_count_and_total_callback()
    {
        $cart_count = WC()->cart->get_cart_contents_count();
        $cart_total = WC()->cart->get_cart_total();
        
        $data = [
            'count' => $cart_count,
            'total' => $cart_total,
        ];
        
        echo json_encode($data);
        
        wp_die();
    }
    
    add_action('wp_ajax_update_quantity', 'update_quantity_callback');
    add_action('wp_ajax_nopriv_update_quantity', 'update_quantity_callback');
    
    function update_quantity_callback()
    {
        $product_id = $_POST['id'];
        $quantity = $_POST['qty'];

        if ($product_id > 0 && $quantity > 0) {
            WC()->cart->set_quantity($product_id, $quantity, true);
        }
        
        wp_die();
    }