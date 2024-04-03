<?php

add_action( 'init', 'codelibry_acf_options_init' );

function codelibry_acf_options_init() {
    
    acf_add_options_page(
        [
            'page_title'    => 'Header',
            'menu_title'    => 'Header',
            'menu_slug'     => 'theme-header-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ]
    );
    acf_add_options_page(
        [
            'page_title'    => 'Footer',
            'menu_title'    => 'Footer',
            'menu_slug'     => 'theme-footer-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ]
    );
}
