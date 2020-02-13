<?php get_header(); ?>

    <main class="main-content">
      <div class="wrapper">
      <?php 
        get_template_part('tmp/breadcrumbs'); 
      ?>
        <h1 class="main-heading schedule-page__h">расписание</h1>
        <div class="tabs">
          <ul class="tabs-btns">
          <?php
            $days = get_terms([
              'taxonomy' => 'days',
              'orderby' => 'slug',
              'order' => 'ASC'
            ]);
            $index = 0;
            foreach($days as $day):
              if( $index === 0 ):
          ?>
            <li class="tabs-btns__item active-tab">
              <?php else: ?>
            <li class="tabs-btns__item">
              <?php endif; ?>
              <a 
                href="#<?php echo $day->slug; ?>" 
                class="tabs-btns__btn"
                aria-label="<?php echo $day->description; ?>"
              > 
                <?php echo $day->name; ?>              
              </a>
            </li>
          <?php $index++; endforeach; ?>
          </ul>
          <ul class="tabs-content">
          <?php
            $index = 0;
            foreach( $days as $day ):
              $day_desc = $day->description;
              $content = new WP_Query([
                'posts_per_page' => -1,
                'post_type' => 'schedule',
                'days' => $day->slug,
                'meta_key' => 'schedule_time_start',
                'orderby' => 'meta_value',
                'order' => 'ASC'
              ]);
              if( $index === 0 ):
          ?>
            <li class="tabs-content__item active-tab" id="<?php echo $day->slug; ?>">
              <?php else: ?>
            <li class="tabs-content__item" id="<?php echo $day->slug; ?>">
              <?php endif; ?>
              <h2 class="sr-only"><?php echo $day->description; ?></h2>
              <ul class="schedule tabs-content__list">
              <?php
                foreach( $content->posts as $activity ):
                  $data = get_fields( $activity->ID );
                  $trainer = esc_html(get_the_title($data['schedule_trainer'][0]));
                  $time = '';
                  $start = $data['schedule_time_start'];
                  $end = $data['schedule_time_end'];
                  $time = $start . ' - ' . $end;
                  $title = $activity->post_title;
                  $place = get_the_terms($activity, 'places')[0];
                  $place_name = $place->name;
                  $place_color = get_field('places_color', 'places_'.$place->term_id);
              ?>
                <li class="schedule__item">
                  <p class="schedule__time"> <?php echo $time; ?> </p>
                  <h3 class="schedule__h"> <?php echo $title; ?> </h3>
                  <p class="schedule__trainer"><?php echo $trainer; ?></p>
                  <p 
                    class="schedule__place" 
                    style="color: <?php echo $place_color; ?>;"
                  > 
                    <?php echo $place_name; ?> 
                  </p>
                </li>
              <?php endforeach; ?>
              </ul>
            </li>
          <?php $index++; endforeach; ?>
          </ul>
        </div>
      </div>
    </main>

<?php get_footer(); ?>