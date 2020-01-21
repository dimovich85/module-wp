<?php get_header(); ?>

    <main class="main-content">
      <h1 class="sr-only">Цены на наши услуги и клубные карты</h1>
      <div class="wrapper">
      <?php 
        get_template_part('tmp/breadcrumbs'); 
      ?>
        <section class="prices">
          <h2 class="main-heading prices__h">Цены</h2>
          <table>
            <thead>
              <tr>
                <td>Услуга</td>
                <td>Разовая покупка</td>
                <td>1 месяц</td>
                <td>6 месяцев</td>
                <td>12 месяцев</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> Фитнес </td>
                <td> 200 <span> р.- </span>
                </td>
                <td> 900 <span> р.- </span>
                </td>
                <td> 4800 <span> р.- </span>
                </td>
                <td> 9000 <span> р.- </span>
                </td>
              </tr>
              <tr>
                <td> Тренажерный зал </td>
                <td> 200 <span> р.- </span>
                </td>
                <td> 900 <span> р.- </span>
                </td>
                <td> 4800 <span> р.- </span>
                </td>
                <td> 9000 <span> р.- </span>
                </td>
              </tr>
              <tr>
                <td> Женский фитнес </td>
                <td> 200 <span> р.- </span>
                </td>
                <td> 1100 <span> р.- </span>
                </td>
                <td> 6000 <span> р.- </span>
                </td>
                <td> 11000 <span> р.- </span>
                </td>
              </tr>
              <tr>
                <td> Бокс </td>
                <td> 200 <span> р.- </span>
                </td>
                <td> 900 <span> р.- </span>
                </td>
                <td> 4800 <span> р.- </span>
                </td>
                <td> 9000 <span> р.- </span>
                </td>
              </tr>
            </tbody>
          </table>
        </section>
        <?php
          $cards = get_posts([
            'post_type'   => 'cards',
            'numberposts' => -1,
            'meta_key' => 'cards_position',
            'order_by' => 'meta_value',
            'order' => 'ASC'
          ]);
          if( $cards ):
        ?>      
        <section class="cards">
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
        <!-- <section class="cards">
          <h2 class="page-heading cards__h"> клубные карты </h2>
          <ul class="cards__list row">
            <li class="card">
              <h3 class="card__name"> полный день </h3>
              <p class="card__time"> 7:00 &ndash; 22:00 </p>
              <p class="card__price price"> 3200 <span class="price__unit">р.-/мес.</span>
              </p>
              <ul class="card__features">
                <li class="card__feature">Безлимит посещений клуба</li>
                <li class="card__feature">Вводный инструктаж</li>
                <li class="card__feature">Групповые занятия</li>
                <li class="card__feature">Сауна</li>
              </ul>
              <a href="#" class="card__buy btn">купить</a>
            </li>
            <li class="card card_profitable">
              <h3 class="card__name"> полный день </h3>
              <p class="card__time"> 7:00 &ndash; 22:00 </p>
              <p class="card__price price"> 3200 <span class="price__unit">р.-/мес.</span>
              </p>
              <ul class="card__features">
                <li class="card__feature">Безлимит посещений клуба</li>
                <li class="card__feature">Вводный инструктаж</li>
                <li class="card__feature">Групповые занятия</li>
                <li class="card__feature">Сауна</li>
              </ul>
              <a href="#" class="card__buy btn">купить</a>
            </li>
            <li class="card">
              <h3 class="card__name"> полный день </h3>
              <p class="card__time"> 7:00 &ndash; 22:00 </p>
              <p class="card__price price"> 3200 <span class=" price__unit">р.-/мес.</span>
              </p>
              <ul class="card__features">
                <li class="card__feature">Безлимит посещений клуба</li>
                <li class="card__feature">Вводный инструктаж</li>
                <li class="card__feature">Групповые занятия</li>
                <li class="card__feature">Сауна</li>
              </ul>
              <a href="#" class="card__buy btn">купить</a>
            </li>
          </ul>
        </section> -->
      </div>
    </main>

<?php get_footer(); ?>