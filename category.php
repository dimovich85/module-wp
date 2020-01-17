<?php 
  get_header();
  $cat = get_the_category();
  $title = $cat->cat_name;
?>

    <main class="main-content">
      <h1 class="sr-only"> Страница категории <?php echo $title; ?> в блоге сайта спортклуба SportIsland </h1>
      <div class="wrapper">
      <?php 
        get_template_part('tmp/breadcrumbs'); 
      ?>
      </div>
      <?php
        if( have_posts() ):
      ?>
      <section class="category-posts">
        <div class="wrapper">
          <h2 class="main-heading category-posts__h">
            <?php echo $title; ?>
          </h2>
          <ul class="posts-list">
          <?php while( have_posts() ): the_post(); ?>
            <li class="last-post">
              <a href="<?php the_permalink(); ?>" class="last-post__link" aria-label="Читать текст статьи: <?php the_title(); ?>">
                <figure class="last-post__thumb">
                  <?php the_post_thumbnail( 'full', [ 'class' => 'last-post__img' ] ) ?>
                </figure>
                <div class="last-post__wrap">
                  <h3 class="last-post__h">
                    <?php the_title(); ?>
                  </h3>
                  <p class="last-post__text">
                  <?php 
                    echo mb_substr(strip_tags(get_the_content()), 0, 200) . '...'; 
                  ?>
                  </p>
                  <span class="last-post__more link-more">Подробнее</span>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
            <!-- <li class="last-post">
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
            </li> -->
          </ul>
          <?php the_posts_pagination(); ?>
          <!-- <nav class="pagination">
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
          </nav> -->
        </div>
      </section>
      <?php 
        else: get_template_part('tmp/no_posts');
        endif;
      ?>
    </main>

<?php get_footer(); ?>