<?php
    
    add_action('wp_enqueue_scripts', 'enqueue_scripts_styles');
    
    function enqueue_scripts_styles()
    {
        // enqueue styles
        wp_enqueue_style( 'slick-css',get_template_directory_uri() . '/js/libs/slick/slick.css');
        wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css', array(), '1.0.0', false);
    
        // enqueue scripts
        wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', false , false , true);
        wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/libs/slick/slick.js');
        wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
        //send PHP variables to JS
        wp_localize_script( 'main-js', 'customjs_ajax_object',
            array(
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'ajax_nonce' => wp_create_nonce( "secure_nonce_name" ),
                'site_url' => get_site_url(),
                'theme_url' => get_template_directory_uri()
            )
        );
    }
