<?php 
    /* Template Name: Шаблон для главной */
    get_header(); 
?>
  <main class="main-content">
      <h1 class="sr-only"> Домашняя страница спортклуба SportIsland. </h1>
      <div class="banner">
        <span class="sr-only">Будь в форме!</span>
        <a href="<?php echo get_post_type_archive_link( 'trainers' ); ?>" class="banner__link btn">записаться</a>
      </div>
      <?php
        if( is_active_sidebar( 'main_about_us' ) ){
          dynamic_sidebar( 'main_about_us' );
        }      
      ?>
      <!-- <article class="about">
        <div class="wrapper about__flex">
          <div class="about__wrap">
            <h2 class="main-heading about__h"> кто мы такие </h2>
            <p class="about__text"> Спортивный клуб SPORTISLAND существует уже более 5 лет. За это время большое количество посетителей получили положительный результат от своих тренировок. Мы предлагаем посещать просторный и укомплектованный тренажерный зал с персональными тренерами, массаж, групповые занятия (фитнес), занятия единоборствами в группах и индивидуально, и большое количество тренировок для детей. В каждый абонемент входит посещение финской сауны </p>
            <a href="blog.html" class="about__link btn">подробнее</a>
          </div>
          <figure class="about__thumb">
            <img src="<?php _img_url('img/index__about_img.jpg'); ?>" alt="Power lifter">
          </figure>
        </div>
      </article> -->
      <?php
        $sales = get_posts([
          'post_type'   => 'sales',
          'numberposts' => -1
        ]);
        if( $sales ):
      ?>
      <section class="sales">
        <div class="wrapper">
          <header class="sales__header">
            <h2 class="main-heading sales__h"> акции и скидки </h2>
            <p class="sales__btns">
              <button class="sales__btn sales__btn_prev">
                <span class="sr-only"> Предыдущие акции </span>
              </button>
              <button class="sales__btn sales__btn_next">
                <span class="sr-only"> Следующие акции </span>
              </button>
            </p>
          </header>
          <div class="sales__slider slider">
          <?php
            global $post;
            foreach($sales as $post):
              setup_postdata( $sale );
          ?>
            <section class="slider__slide stock">
              <a 
                href="<?php the_field('sales_article_link'); ?>" 
                class="stock__link" 
                aria-label="Подробнее об акции <?php the_field('sales_name'); ?>"
              >
                <img 
                  src="<?php echo get_field('sales_thumb')['url']; ?>" 
                  alt="<?php echo get_field('sales_thumb')['alt']; ?>" 
                  class="stock__thumb"
                >
                <h3 class="stock__h">
                  <?php the_field('sales_name'); ?>
                </h3>
                <p class="stock__text">
                  <?php the_field('sales_description'); ?>
                </p>
                <span class="stock__more link-more_inverse link-more">Подробнее</span>
              </a>
            </section>
          <?php 
            endforeach;
            wp_reset_postdata();
          ?>
          </div>
        </div>
      </section>
      <?php 
        endif;
        $cards = get_posts([
          'post_type'   => 'cards',
          'numberposts' => -1,
          'meta_key' => 'cards_position',
          'order_by' => 'meta_value',
          'order' => 'DESC'
        ]);
        if( $cards ):
      ?>      
      <section class="cards cards_index">
        <div class="wrapper">
          <h2 class="main-heading cards__h"> клубные карты </h2>
          <ul class="cards__list row">
          <?php
            global $post;
            foreach( $cards as $post ):
              setup_postdata( $post );
              $bg = get_field('cards_bg') ? get_field('cards_bg') : '';
              $profit = get_field('cards_profitable') ? ' card_profitable' : '';
          ?>
            <li 
              class="card<?php echo $profit; ?>"
              style="<?php echo $bg; ?>"
            >
              <h3 class="card__name">
                <?php the_field('cards_name'); ?>
              </h3>
              <p class="card__time">
                <?php the_field('cards_time_start'); ?>
                 &ndash;
                 <?php the_field('cards_time_end'); ?> 
              </p>
              <p class="card__price price">
                <?php the_field('cards_price'); ?>
                <span class="price__unit">р.-/мес.</span>
              </p>
              <ul class="card__features">
              <?php
                $benefits = explode("\n", get_field('cards_benefits'));
                foreach( $benefits as $item ):
              ?>
                <li class="card__feature">
                  <?php echo $item; ?>
                </li>
                <?php endforeach; ?>
              </ul>
              <a href="#" class="card__buy btn">купить</a>
            </li>
          <?php
            endforeach;
            wp_reset_postdata();
          ?>
          </ul>
        </div>
      </section>
      <?php endif; ?>
    </main>

<?php get_footer(); ?>