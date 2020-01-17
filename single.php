<?php get_header(); ?>

  <main class="main-content">
    <div class="wrapper">
    <?php 
      get_template_part('tmp/breadcrumbs'); 
    ?>
    </div>
    <?php
      if( have_posts() ):
        while( have_posts() ): the_post();
    ?>
    <article class="main-article wrapper">
      <header class="main-article__header">
        <?php the_post_thumbnail( 'full', ['class' => 'main-article__thumb'] ); ?>
        <h1 class="main-article__h">
          <?php the_title(); ?>
        </h1>
      </header>
      <?php the_content(); ?>
      <footer class="main-article__footer">
        <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
          <?php echo get_the_date('d F Y'); ?>
        </time>
        <a href="#" class="main-article__like like">
          <span class="like__text">Нравится </span>
          <span class="like__count">46</span>
        </a>
      </footer>
    </article>
    <?php
        endwhile;
      else: get_template_part( 'tmp/no_posts');
    endif;
    ?>
  </main>

<?php get_footer(); ?>