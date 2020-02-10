<div class="modal">
  <div class="wrapper">
    <section class="modal-content modal-form" id="modal-form">
      <button class="modal__closer">
        <span class="sr-only">Закрыть</span>
      </button>
      <form method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="modal-form__form">
        <h2 class="modal-content__h"> Отправить заявку </h2>
        <p> Оставьте свои контакты и менеджер с Вами свяжется </p>
        <p>
          <label>
            <span class="sr-only">Имя: </span>
            <input type="text" name="si-user-name" placeholder="Имя">
          </label>
        </p>
        <p>
          <label>
            <span class="sr-only">Телефон:</span>
            <input 
              type="text" 
              name="si-user-phone" 
              placeholder="Телефон"
              pattern="^\+{0,1}[0-9]{4,}$"
            >
          </label>
        </p>
        <button class="btn" type="submit">Отправить</button>
        <input type="hidden" name="action" value="si-modal-form">
      </form>
    </section>
  </div>
</div>
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
            <?php
              if( is_active_sidebar( 'footer_column3' ) ){
                dynamic_sidebar( 'footer_column3' );
              }
            ?>
            </a>
          </div>
        </div>
      </footer>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>