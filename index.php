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
    <?php if( have_posts() ): ?>
    <section class="last-posts">
      <div class="wrapper">
        <h2 class="main-heading last-posts__h"> последние записи </h2>
        <ul class="posts-list">
        <?php 
          while( have_posts() ): the_post(); 
        ?>
          <li class="last-post">
            <a href="<?php the_permalink(); ?>" class="last-post__link" aria-label="Читать текст статьи: <?php the_title(); ?>">
              <figure class="last-post__thumb">
                <?php the_post_thumbnail( 'full', ['class' => 'last-post__img'] ); ?>
              </figure>
              <div class="last-post__wrap">
                <h3 class="last-post__h"> <?php the_title(); ?> </h3>
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
      </div>
    </section>
    <?php
      else:
        get_template_part( 'tmp/no_posts.php' );
      endif;
    ?>
    <section class="categories">
      <div class="wrapper">
        <h2 class="categories__h main-heading"> категории </h2>
        <?php
          $cats = get_categories();
          if( $cats ):
        ?>
        <ul class="categories-list">
        <?php
          foreach( $cats as $cat ):
            $image = get_field( 'category_thumb', 'category_' . $cat->cat_ID );
            $alt = $image['alt'];
            $url = $image['url'];
            $cat_link = get_category_link( $cat->cat_ID );
        ?>
          <li class="category">
            <a href="<?php echo $cat_link; ?>" class="category__link">
              <img 
                src="<?php echo $url; ?>" 
                alt="Категория <?php echo $cat->name; echo ' '.$alt; ?>" 
                class="category__thumb"
              >
              <span class="category__name"><?php echo $cat->name; ?></span>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php
          else: 
            get_template_part('tmp/no_posts');
          endif;
        ?>
      </div>
    </section>
  </main>
<?php
  else:
?>
  <main class="main-content">
    <h1 class="sr-only">Страница на сайте спорт-клуба SportIsland</h1>
    <div class="wrapper">
    <?php 
      get_template_part('tmp/breadcrumbs');
    ?>
    </div>
    <?php if( have_posts() ): ?>
    <section class="last-posts">
      <div class="wrapper">
        <h2 class="main-heading last-posts__h"> Записи </h2>
        <ul class="posts-list">
        <?php 
          while( have_posts() ): the_post(); 
        ?>
          <li class="last-post">
            <a href="<?php the_permalink(); ?>" class="last-post__link" aria-label="Читать текст статьи: <?php the_title(); ?>">
              <figure class="last-post__thumb">
                <?php the_post_thumbnail( 'full', ['class' => 'last-post__img'] ); ?>
              </figure>
              <div class="last-post__wrap">
                <h3 class="last-post__h"> <?php the_title(); ?> </h3>
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
      </div>
    </section>
    <?php
      else:
        get_template_part( 'tmp/no_posts.php' );
      endif;
    ?>
  </main>
<?php 
  endif;
  get_footer(); 
?>