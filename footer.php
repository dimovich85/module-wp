<div class="footer">
      <header class="main-header">
        <div class="wrapper main-header__wrap">
            <?php the_custom_logo(); ?>
          <!-- <a href="/" class="main-header__logolink" aria-label="Логотип-ссылка на Главную">
            <img src="img/logo.png" alt="">
            <span class="slogan">Твой фитнес клуб всегда рядом!</span>
          </a> -->
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
      <footer class="main-footer wrapper">
        <div class="row main-footer__row">
          <div class="main-footer__widget main-footer__widget_copyright">
            <span class="widget-text"> © 2019 Все права защищены. SportIsland </span>
          </div>
          <div class="main-footer__widget">
            <p class="widget-contact-mail"> Если у вас возникли вопросы, пожалуйста свяжитесь с нами по почте <a href="mailto:sportisland@gmail.ru">sportisland@gmail.ru</a>
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