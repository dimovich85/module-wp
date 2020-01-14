<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv='X-UA-Compatible' content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,800,900&display=swap&subset=cyrillic" rel="preload stylesheet">
    <?php wp_head(); ?>
  </head>
  <?php 
    // $classes = get_body_class();
    // if( !is_front_page() ){
    //   array_push($classes, 'inner');
    // }
    //$class_str = join(' ', $classes);
    $class_str = '';
    if( !is_front_page() ){
      $class_str = 'inner';
    }
  ?>
  <body class="<?php echo $class_str; ?>">
    <header class="main-header">
      <div class="wrapper main-header__wrap">
        <!-- <a href="/" class="main-header__logolink" aria-label="Логотип-ссылка на Главную">
          <img src="img/logo.png" alt="">
        </a> -->
        <?php the_custom_logo(); ?>
        <nav class="main-navigation">
          <ul class="main-navigation__list">
            <li>
              <a href="services.html">Услуги</a>
            </li>
            <li class="active">
              <a href="trainers.html">Тренеры</a>
            </li>
            <li>
              <a href="schedule.html">Расписание</a>
            </li>
            <li>
              <a href="prices.html">Цены</a>
            </li>
            <li>
              <a href="contacts.html">Контакты </a>
            </li>
          </ul>
        </nav>
        <address class="main-header__widget widget-contacts">
          <a href="tel:88007003030" class="widget-contacts__phone"> 8 800 700 30 30 </a>
          <p class="widget-contacts__address"> ул. Приречная 11 </p>
        </address>
      </div>
    </header>