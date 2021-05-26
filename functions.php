<?php

    function nvolodina_theme_support() {
        add_theme_support('title-tag');
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size(120, 90, true);
        add_image_size('square', 150, 150, true);
        add_theme_support('custom-logo');
    }
    add_action('after_setup_theme', 'nvolodina_theme_support');

    function nvolodina_menus() {
        $menus = array(
            'primary' => "Primary Navigation",
            'secondary' => "Secondary Navigation",
            'footer' => "Footer Menu"
        );

        register_nav_menus($menus);
    }
    add_action('init', 'nvolodina_menus');

    function nvolodina_register_styles() {
        $version = wp_get_theme()->get('Version');
        wp_enqueue_style('nvolodina-stylesheet', get_template_directory_uri() . "/style.css", array(), $version);
        wp_enqueue_style( 'nvolodina_main_css', get_template_directory_uri() . '/css/build/main.min.css' );
        wp_enqueue_style('nvolodina_fonts', 'https://use.typekit.net/pkr2svi.css');
        wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css');
        wp_enqueue_style('fontawesome_brands', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css');
    }
    add_action('wp_enqueue_scripts', 'nvolodina_register_styles');

    function nvolodina_register_scripts() {    
        wp_enqueue_script('nvolodina-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
        wp_enqueue_script( 'nvolodina_main_js', get_template_directory_uri() . '/js/build/app.js' , null , null , true );
    }
    add_action('wp_enqueue_scripts', 'nvolodina_register_scripts');

    function nvolodina_header_cleanup() {
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_generator');
        remove_action( 'wp_head', 'feed_links_extra', 3 );
        remove_action( 'wp_head', 'feed_links', 3 );
    }
    add_action('init', 'nvolodina_header_cleanup');

    if( function_exists('acf_add_options_page') ) {
	
        acf_add_options_page(array(
            'page_title' 	=> 'Earlybird Options',
            'menu_title'	=> 'Earlybird Options',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));
    }

    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
    

?>