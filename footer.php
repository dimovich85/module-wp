<div class="modal">
  <div class="wrapper">
    <button class="modal__closer">
      <span class="sr-only">Закрыть</span>
    </button>
    <section class="modal-content" id="modal-form">
      <h2 class="modal-content__h"> Modal </h2>
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum labore aut, necessitatibus possimus eligendi. Molestiae dolore consectetur eveniet sit doloremque blanditiis cumque recusandae pariatur cum est tenetur nemo nostrum unde, architecto praesentium necessitatibus, repellendus eos voluptatibus quam. Iusto eaque eligendi inventore sunt voluptas deleniti enim quae, nobis tempora, cum atque ab aspernatur at eius ipsam beatae iure corporis veritatis ducimus, qui sed. Necessitatibus eaque quis, numquam. Aliquam animi ipsum autem repellat incidunt dolorem qui, dignissimos ullam nisi, numquam, nam excepturi quam voluptas. Molestias, nobis quos dicta unde quod. Quos harum atque fugit nihil totam, alias sapiente officia cumque obcaecati ipsam. </p>
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