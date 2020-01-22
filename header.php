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
        <?php the_custom_logo(); ?>
        <?php 
          wp_nav_menu( [
            'theme_location'  => 'menu-header',
            'container'       => 'nav', 
            'container_class' => 'main-navigation', 
            'menu_class'      => 'main-navigation__list',
            'echo'            => true,
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 0
          ] ); 
        ?>
        <div class="main-header__widget">
          <?php
            if( is_active_sidebar( 'header' ) ){
              dynamic_sidebar( 'header' );
            }
          ?>
        </div>
      </div>
    </header>