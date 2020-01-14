<?php

add_action('wp_enqueue_scripts', 'sport_scripts');
add_action('after_setup_theme', 'sport_setup');
//add_action('widgets_init', 'sport_widgets');
//add_action('init', 'sport_registration');

add_filter('show_admin_bar', '__return_false');

function sport_scripts(){
    wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/styles.css', [], '1.0.0', 'all');

    wp_enqueue_script('js', get_template_directory_uri() . '/assets/js/js.js', [], '1.0', true);
}

function sport_setup(){
    register_nav_menu('menu-header', 'Меню в шапке');
    register_nav_menu('menu-footer', 'Меню в подвале');

    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

function _img_url($path){
    $base = get_template_directory_uri() . '/assets/';
    echo $base . $path;
}

