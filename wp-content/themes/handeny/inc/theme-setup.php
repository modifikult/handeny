<?php
    /*
    =====================
        Theme Setup Function
    =====================
    */
    
    function theme_setup()
    {
        register_nav_menus(
            array(
                'main-menu' => __('Main Menu', 'handeny'),
                'footer-menu-1' => __('Footer Menu 1', 'handeny'),
                'footer-menu-2' => __('Footer Menu 2', 'handeny'),
            )
        );
    }
    
    add_action('after_setup_theme', 'theme_setup');
    
    function theme_widgets_init()
    {
        register_sidebar(array(
            'name' => __('Footer Column 1', 'handeny'),
            'id' => 'footer-column-1',
            'description' => __('Widget for first column', 'handeny'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
        ));
        
        register_sidebar(array(
            'name' => __('Footer Column 2', 'handeny'),
            'id' => 'footer-column-2',
            'description' => __('Widget for second column', 'handeny'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
        ));
        
        register_sidebar(array(
            'name' => __('Footer Column 3', 'handeny'),
            'id' => 'footer-column-3',
            'description' => __('Widget for third column', 'handeny'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
        ));
        
        register_sidebar(array(
            'name' => __('Footer Column 4', 'handeny'),
            'id' => 'footer-column-4',
            'description' => __('Widget for fourth column', 'handeny'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
        ));
    }
    
    add_action('widgets_init', 'theme_widgets_init');