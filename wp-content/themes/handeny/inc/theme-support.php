<?php
    /*
        =====================
            Theme support
        =====================
    */
    
    add_filter('upload_mimes', 'svg_upload_allow');
    
    // Adds SVG to the list of allowed files for uploading.
    function svg_upload_allow($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        
        return $mimes;
    }
    
    add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);
    
    // Fix MIME type for SVG files.
    function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
    {
        
        // WP 5.1 +
        if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
            $dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
        } else {
            $dosvg = ('.svg' === strtolower(substr($filename, -4)));
        }
        
        // mime type has been reset, let's fix it
        // and also check the user's permission
        if ($dosvg) {
            // resolve
            if (current_user_can('manage_options')) {
                $data['ext'] = 'svg';
                $data['type'] = 'image/svg+xml';
            } // ban
            else {
                $data['ext'] = false;
                $data['type'] = false;
            }
        }
        
        return $data;
    }
    
    // Adds Custom logo
    function handeny_custom_logo_setup()
    {
        $args = array(
            'height' => 40,
            'width' => 112,
            'flex-height' => true,
            'flex-width' => true,
            'header-text' => array('header--logo'),
            'unlink-homepage-logo' => true,
        );
        
        add_theme_support('custom-logo', $args);
    }
    
    add_action('after_setup_theme', 'handeny_custom_logo_setup');