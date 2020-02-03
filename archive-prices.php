<?php get_header(); ?>

    <main class="main-content">
      <h1 class="sr-only">Цены на наши услуги и клубные карты</h1>
      <div class="wrapper">
      <?php 
        get_template_part('tmp/breadcrumbs'); 
      ?>
        <section class="prices">
          <h2 class="main-heading prices__h">Цены</h2>
          <?php
            $prices = get_posts([
              'post_type'   => 'prices',
              'numberposts' => -1,
              'meta_key' => 'prices_show',
              'meta_value' => '1'
            ]);
            foreach( $prices as $price ):
              $price_trs = explode("\n", get_fields($price->ID)['prices_table']);
              $price_head = $price_trs[0]; 
          ?>
          <table>
          <thead>
              <tr>
              <?php
                $head_tds = explode("|", $price_head);
                foreach( $head_tds as $td):
              ?>
                <td><?php echo $td; ?></td>
              <?php endforeach; ?>
              </tr>
            </thead>
            <tbody>
            <?php
              $index = 0;
              foreach( $price_trs as $tr ):
                if( $index === 0 ){
                  $index++;
                  continue;
                }
            ?>
              <tr>
              <?php
                $body_tds = explode("|", $tr);
                foreach( $body_tds as $td ):
              ?>
                <td> <?php echo $td; ?> </td>
              <?php endforeach; ?>
              </tr>
            <?php $index++; endforeach; ?>
            </tbody>
          </table>
          <?php endforeach; ?>
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
                <a data-post-id="<?php echo $id; ?>" href="#modal-form" class="card__buy btn btn_modal">купить</a>
              </li>
            <?php
              endforeach;
              wp_reset_postdata();
            ?>
            </ul>
          </div>
        </section>
        <?php endif; ?>
      </div>
    </main>

<?php get_footer(); ?>