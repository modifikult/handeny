<?php
    
    // Get SVG file content
    function get_inline_svg($name)
    {
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        
        if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_ADDR'] == '127.0.0.1') {
            $path = get_template_directory_uri() . '/assets/images/icons/' . $name;
        } else {
            $path = get_stylesheet_directory() . '/assets/images/icons/' . $name;
        }
        
        if ($name) :
            return file_get_contents(esc_url($path), false, stream_context_create($arrContextOptions));
        endif;
        return '';
    }
    
    function add_custom_classes_to_menu_item($classes, $item, $args, $depth) {
        $this_is_title = get_field('this_is_title', $item->ID);
        $menu_tag = get_field('menu_tag', $item->ID);
        
        if ($this_is_title) {
            $classes[] = 'menu--title';
        }
        if ($menu_tag) {
            $classes[] = $menu_tag;
        }
        
        return $classes;
    }
    add_filter('nav_menu_css_class', 'add_custom_classes_to_menu_item', 10, 4);