<?php
  get_header();
  if( is_home() ):
?>
  <main class="main-content">
      <h1 class="sr-only">Страница категорий блога на сайте спорт-клуба SportIsland</h1>
      <div class="wrapper">
      <?php 
        get_template_part('tmp/breadcrumbs'); 
      ?>
      </div>
      <section class="last-posts">
        <div class="wrapper">
          <h2 class="main-heading last-posts__h"> последние записи </h2>
          <ul class="posts-list">
            <li class="last-post">
              <a href="single.html" class="last-post__link" aria-label="Читать текст статьи: Растяжка от болей в мышцах">
                <figure class="last-post__thumb">
                  <img src="<?php _img_url('img/blog__article_thmb1.jpg'); ?>" alt="" class="last-post__img">
                </figure>
                <div class="last-post__wrap">
                  <h3 class="last-post__h"> Растяжка от болей в мышцах </h3>
                  <p class="last-post__text"> Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. </p>
                  <span class="last-post__more link-more">Подробнее</span>
                </div>
              </a>
            </li>
            <li class="last-post">
              <a href="single.html" class="last-post__link" aria-label="Читать текст статьи: Бег помогает похудеть">
                <figure class="last-post__thumb">
                  <img src="<?php _img_url('img/blog__article_thmb2.jpg'); ?>" alt="" class="last-post__img">
                </figure>
                <div class="last-post__wrap">
                  <h3 class="last-post__h"> Бег помогает похудеть </h3>
                  <p class="last-post__text"> Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. </p>
                  <span class="last-post__more link-more">Подробнее</span>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </section>
      <section class="categories">
        <div class="wrapper">
          <h2 class="categories__h main-heading"> категории </h2>
          <ul class="categories-list">
            <li class="category">
              <a href="category.html" class="category__link">
                <img src="<?php _img_url('img/blog__category_thmb1.jpg'); ?>" alt="" class="category__thumb">
                <span class="category__name">Груповые занятия</span>
              </a>
            </li>
            <li class="category">
              <a href="category.html" class="category__link">
                <img src="<?php _img_url('img/blog__category_thmb2.jpg'); ?>" alt="" class="category__thumb">
                <span class="category__name">Кардио</span>
              </a>
            </li>
            <li class="category">
              <a href="category.html" class="category__link">
                <img src="<?php _img_url('img/blog__category_thmb3.jpg'); ?>" alt="" class="category__thumb">
                <span class="category__name">Йога</span>
              </a>
            </li>
          </ul>
        </div>
      </section>
  </main>
<?php
  else:
?>
  <main class="main-content">
    <div class="wrapper">
    <?php 
      get_template_part('tmp/breadcrumbs'); 
    ?>
    </div>
    <article class="main-article wrapper">
      <header class="main-article__header">
        <img src="<?php _img_url('img/blog__article_full.jpg'); ?>" alt="" class="main-article__thumb">
        <h1 class="main-article__h">Рельефный пресс</h1>
      </header>
      <p> Таким образом новая модель организационной деятельности позволяет оценить значение системы обучения кадров, соответствует насущным потребностям. Идейные соображения высшего порядка, а также постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании модели развития. </p>
      <p> Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в значительной степени обуславливает создание модели развития. Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности способствует подготовки и реализации систем массового участия. Идейные соображения высшего порядка, а также дальнейшее развитие различных форм деятельности в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям. </p>
      <footer class="main-article__footer">
        <time datetime="01-01-2020">1 января</time>
        <a href="#" class="main-article__like like">
          <span class="like__text">Нравится </span>
          <span class="like__count">46</span>
        </a>
      </footer>
    </article>
  </main>
<?php 
  endif;
  get_footer(); 
?>