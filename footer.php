<div class="footer">
      <header class="main-header">
        <div class="wrapper main-header__wrap">
          <p class="main-header__logolink">
            <?php the_custom_logo(); ?>
            <span class="slogan">
              <?php echo get_option('si_settings_field_slogan'); ?>
            </span>
          </p>
          <?php 
            wp_nav_menu( [
              'theme_location'  => 'menu-footer',
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
      <footer class="main-footer wrapper">
        <div class="row main-footer__row">
          <div class="main-footer__widget main-footer__widget_copyright">
            <span class="widget-text"> 
              © <?php 
                  echo date("Y");
                  if( is_active_sidebar('footer_column1') ){
                    dynamic_sidebar('footer_column1');
                  }
                ?> 
            </span>
          </div>
          <div class="main-footer__widget">
            <p class="widget-contact-mail">
              <?php
                if( is_active_sidebar( 'footer_column2' ) ){
                  dynamic_sidebar( 'footer_column2' );
                }
              ?>
            </p>
          </div>
          <div class="main-footer__widget main-footer__widget_social">
            <a href="#" class="widget-social-links fb">
              <span class="sr-only"> Мы в Facebook! </span>
            </a>
            <a href="#" class="widget-social-links vk">
              <span class="sr-only"> Мы в VK! </span>
            </a>
            <a href="#" class="widget-social-links youtube">
              <span class="sr-only"> Мы в YouTube! </span>
            </a>
            <a href="#" class="widget-social-links insta">
              <span class="sr-only"> Мы в Instagram! </span>
            </a>
          </div>
        </div>
      </footer>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>