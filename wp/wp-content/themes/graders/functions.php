<?php 

// ADD CSS STYLES
    function custom_styles() {
        wp_register_style( 'core-css', get_template_directory_uri() . '/css/style.css' );
        wp_register_style( 'triangular-css', get_template_directory_uri() . '/css/triangular.css' );
        wp_enqueue_style( 'core-css' );
        wp_enqueue_style( 'triangular-css' );
    }
    add_action( 'wp_enqueue_scripts', 'custom_styles' );


// Sometimes it is mandatory to have a special version of jQuery. This should be avoided. And allowed only outside admin panel.
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', ( get_template_directory_uri() . "/js/jquery-3.1.1.min.js"), false, '3.1.1');
        wp_enqueue_script('jquery');
    }


// NOW LETS GET ALL THE JAVASCRIPT
    function custom_scripts() {
        wp_register_script( 'triangular', get_template_directory_uri() . '/js/triangular.js', ['jquery'], 1.0, true );
        wp_register_script( 'slider', get_template_directory_uri() . '/js/slider.js', ['jquery'], 1.0, true );
        wp_register_script( 'delegate', get_template_directory_uri() . '/js/delegate.js', ['jquery'], 1.0, true );
        wp_enqueue_script( 'triangular' );
        wp_enqueue_script( 'delegate' );
        
        if (is_front_page()) {
            wp_enqueue_script( 'slider' );
        }
    }
    add_action( 'wp_enqueue_scripts', 'custom_scripts' );


// This function is used to register navigation positions within the theme.
// Usage: https://codex.wordpress.org/Function_Reference/register_nav_menus
    function register_my_menus() {
      register_nav_menus( array(
        'header-menu' => 'Header Menu'
        ) );
    }
    add_action( 'init', 'register_my_menus' );


// $name, $min-width, $min-height, $crop
    add_image_size( 'hero', 1920, 1080, true );
    add_image_size( 'portfoliox2', 1300, 720, true ); 
    add_image_size( 'portfolio', 650, 360, true ); 


// Disable some not needed meta tags
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');


// Set up ACF Theme Options page.
// USAGE EXAMPLE:> the_field('footer_disclaimer', 'option');
    if( function_exists('acf_add_options_page') ) {
      acf_add_options_page(array(
        'page_title'  =>  'Template Options',
        'menu_title'  =>  'Template Options',
        'menu_slug'   =>  'template-options',
        'capability'  =>  'edit_posts',
        'parent_slug' =>  'themes.php',
        'position'    =>  false,
        'icon_url'    =>  false
        ));
    }


// We all need a debug method. The second parameter is optional and decides if php is set to die after printing the var.
    function debug($input, $die = false) {
        echo '<pre>';
        print_r($input);
        echo '</pre>';
        if ($die) die();
    }


// A propper way to implement WP Titles.
    add_filter('wp_title', 'change_the_title');
    function change_the_title($title) {
        return $title . ' ~ ' . get_bloginfo('name');
    }


// Create complete metadata tags for Google, Facebook OG and Twitter Cards
    // add_action('wp_head', 'create_meta');
    function create_meta() {
        global $post;
        $output = "";
        $image = get_field('meta_image')['sizes'];
        $title = get_the_title() . ' ~ ' . get_bloginfo('name');
        $description = get_field('meta_excerpt');
        if (!$description) { $description = get_field('global_meta_description', 'option'); }
        $description = strip_tags($description);
        $description = str_replace("\"", "'", $description);
        // Google metadata
        $output .= '
        <meta name="Description" CONTENT="' . $description . '">';
        // Facebook OpenGraph metadata
        $output .= '
        <meta property="og:title" content="' . $title . '" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="' . $image['Hero size'] . '" />
        <meta property="og:image:width" content="' . $image['Hero size-width'] . '" />
        <meta property="og:image:height" content="' . $image['Hero size-height'] . '" />
        <meta property="og:url" content="' . get_the_permalink() . '" />
        <meta property="og:description" content="' . $description . '" />
        <meta property="og:site_name" content="' . get_bloginfo('name') . '" />';
        // Twitter Cards metadata
        $output .= '
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@DigitalMindLLC">
        <meta name="twitter:creator" content="@DigitalMindLLC">
        <meta name="twitter:title" content="' . $title . '">
        <meta name="twitter:description" content="' . $description . '">';
        $image = (isset($image)) ? $image : get_field('gizmo_bg', 'option')['sizes'];
        $output .= '<meta name="twitter:image" content="' . $image['medium_large'] . '">';
        echo $output;
    }


// Create a favicon for your website.
    add_action('wp_head', 'create_favicon');
    function create_favicon() {
        $output = '';
        $icon = get_field('favicon', 'option');

        if ($icon['width'] == 32) {
            $output .= '<link rel="icon" type="image/png" sizes="32x32" href="'. $icon['url'] .'">';   
        } else {
            $output .= '<link rel="icon" type="image/png" sizes="16x16" href="'. $icon['url'] .'">';   
        }
        echo $output;
    }


// Disable galleries support
    add_action( 'admin_head_media_upload_gallery_form', 'mfields_remove_gallery_setting_div' );
    if( !function_exists( 'mfields_remove_gallery_setting_div' ) ) {
       function mfields_remove_gallery_setting_div() {
            print '
            <style type="text/css">
         #gallery-settings *{
               display:none;
           }
        </style>';
        }
    }


// WP_Fill website advises us to disable <p> tags on images.
    add_filter('the_content', 'filter_ptags_on_images');
    function filter_ptags_on_images($content){
        return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    }




