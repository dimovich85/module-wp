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
          </ul>
          <?php the_posts_pagination(); ?>
        </div>
      </section>
      <?php 
        else: get_template_part('tmp/no_posts');
        endif;
      ?>
    </main>

<?php get_footer(); ?>