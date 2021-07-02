<?php

    function nvolodina_theme_support() {
        add_theme_support('title-tag');
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size(300, 340, true);
        add_image_size('small-thumbnail', 600, 400, true);
        add_theme_support('custom-logo');
    }
    add_action('after_setup_theme', 'nvolodina_theme_support');

    function nvolodina_menus() {
        $menus = array(
            'primary_logged-in' => "Primary Logged-in Navigation",
            'primary_logged-out' => "Primary Logged-out Navigation",
            'footer_earlybird' => "Earlybird Footer Menu",
            'footer_support' => "Support Footer Menu"
        );

        register_nav_menus($menus);
    }
    add_action('init', 'nvolodina_menus');

    function nvolodina_register_styles() {
        $version = wp_get_theme()->get('Version');
        wp_enqueue_style('nvolodina-stylesheet', get_template_directory_uri() . "/style.css", array(), $version);
        wp_enqueue_style('nvolodina_fonts', 'https://use.typekit.net/pkr2svi.css');
        wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css');
        wp_enqueue_style('fontawesome_brands', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css');
        wp_enqueue_style('fontawesome_solids', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css');
        wp_enqueue_style('slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css');
        wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
        wp_enqueue_style( 'nvolodina_main_css', get_template_directory_uri() . '/css/build/main.min.css' );
    }
    add_action('wp_enqueue_scripts', 'nvolodina_register_styles');

    function nvolodina_register_scripts() {    
        wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
        wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), null, true);
        if(is_front_page()) { 
            wp_enqueue_script( 'nvolodina_home_js', get_template_directory_uri() . '/js/home.js' , array('jquery', 'slick-js') , null, true );
        }
        if(is_singular('activities'))  {
            wp_enqueue_script( 'nvolodina_activity_js', get_template_directory_uri() . '/js/activity.js' , array('jquery', 'slick-js') , null, true );
        }
        if(is_post_type_archive('activities'))  {
            wp_enqueue_script( 'nvolodina_activies_js', get_template_directory_uri() . '/js/allActivities.js' , array('jquery') , null, true );
        }
        if(is_page(12))  {
            wp_enqueue_script( 'nvolodina_faq_js', get_template_directory_uri() . '/js/faq.js' , array('jquery') , null, true );
        }
        wp_enqueue_script( 'nvolodina_header_js', get_template_directory_uri() . '/js/header.js' , array('jquery') , null, true );
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

    function wpb_widgets_init() {
 
        register_sidebar( array(
            'name'          => 'Activities Filter',
            'id'            => 'activities-filter-widget',
        ) );

        register_sidebar( array(
            'name'          => 'Search Form',
            'id'            => 'search',
        ) );
     
    }
    add_action( 'widgets_init', 'wpb_widgets_init' );

    function activities( $query ) {
        if (is_post_type_archive( 'activities' ) ) {
            $query->set( 'posts_per_page', -1 );
            return;
        }
    }
    add_action( 'pre_get_posts', 'activities');

    function nvolodina_excerpt_length( $length ) {
        return 30;
    }
    add_filter( 'excerpt_length', 'nvolodina_excerpt_length', 999 );

    function wpforo_search_form( $html ) {

        $html = str_replace( 'placeholder="Search ', 'placeholder="Press ENTER to search ', $html );

        return $html;
}
add_filter( 'get_search_form', 'wpforo_search_form' );

add_theme_support( 'woocommerce', array(
    'thumbnail_image_width' => 200,
    'gallery_thumbnail_image_width' => 100,
    'single_image_width' => 620,
) );

?>