<?php get_header(); ?>

    <main class="main-content">
      <h1 class="sr-only"> Страница категории Кардио в блоге сайта спортклуба SportIsland </h1>
      <div class="wrapper">
      <?php 
        get_template_part('tmp/breadcrumbs'); 
      ?>
      </div>
      <section class="category-posts">
        <div class="wrapper">
          <h2 class="main-heading category-posts__h"> кардио </h2>
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
            <li class="last-post">
              <a href="single.html" class="last-post__link" aria-label="Читать текст статьи: Рельефный пресс">
                <figure class="last-post__thumb">
                  <img src="<?php _img_url('img/blog__article_thmb3.jpg'); ?>" alt="" class="last-post__img">
                </figure>
                <div class="last-post__wrap">
                  <h3 class="last-post__h"> Рельефный пресс </h3>
                  <p class="last-post__text"> Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. </p>
                  <span class="last-post__more link-more">Подробнее</span>
                </div>
              </a>
            </li>
          </ul>
          <nav class="pagination">
            <h3 class="sr-only">Навигация</h3>
            <ul class="pagination__links">
              <li class="pagination__block pagination__block_current">
                <a href="#" class="pagination__link"> 1 </a>
              </li>
              <li class="pagination__block">
                <a href="#" class="pagination__link"> 2 </a>
              </li>
              <li class="pagination__block">
                <a href="#" class="pagination__link"> 3 </a>
              </li>
              <li class="pagination__block">
                <a href="#" class="pagination__link"> 4 </a>
              </li>
              <li class="pagination__block">
                <a href="#" class="pagination__link"> 5 </a>
              </li>
            </ul>
          </nav>
        </div>
      </section>
    </main>

<?php get_footer(); ?>