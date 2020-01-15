<?php

add_action('wp_enqueue_scripts', 'sport_scripts');
add_action('after_setup_theme', 'sport_setup');
add_action('widgets_init', 'sport_widgets');
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

function sport_widgets(){
    register_sidebar([
        'name' => 'Шапка',
        'id' => 'header',
        'description' => 'Сайдбар в шапке для контактов',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Главная страница - Блок Кто мы',
        'id' => 'main_about_us',
        'description' => 'Блок "Кто мы" на главной странице',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Подвал - Контакты',
        'id' => 'footer',
        'description' => 'Зона в подвале, для виджетов с контактами, которая дублрует шапку',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Футер - Колонка 1',
        'id' => 'footer_column1',
        'description' => 'Первая колонка в футере. Где выводится копирайт',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Футер - колонка 2',
        'id' => 'footer_column2',
        'description' => 'Вторая колонка в футере. Где выводится текст для обратной связи',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Футер - Колонка 3',
        'id' => 'footer_column3',
        'description' => 'Третья колонка в футере. Где выводятся ссылки на социальные сети',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Модальное окно - Записаться',
        'id' => 'modal_subscribe',
        'description' => 'Зона в модальном окне для формы ОС. Выводится в первую очередь на странице с Услугами',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Контакты - Карта',
        'id' => 'contacts_map',
        'description' => 'Зона на странице с контактами, куда выводится карта',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Контакты - Карта',
        'id' => 'contacts_map',
        'description' => 'Зона на странице с контактами, куда выводится карта',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Контакты - виджеты под картой',
        'id' => 'contacts_widgets',
        'description' => 'Зона на странице с контактами, куда выводится мелкие виджеты с информацией',
        'before_widget' => null,
        'after_widget' => null
    ]);
}

function _img_url($path){
    $base = get_template_directory_uri() . '/assets/';
    echo $base . $path;
}

