<?php 
    get_header(); 
    /* Template Name: Шаблон для контактов */
?>

    <main class="main-content">
      <div class="wrapper">
      <?php 
        get_template_part('tmp/breadcrumbs'); 
      ?>
      </div>
      <section class="contacts">
        <div class="wrapper">
          <h1 class="contacts__h main-heading">Контакты</h1>
          <div class="map">
            <a href="#" class="map__fallback">
              <img src="<?php _img_url('/img/map.jpg'); ?>" alt="Карта клуба SportIsland">
              <span class="sr-only"> Карта </span>
            </a>
            <?php
              if( is_active_sidebar( 'contacts_map' ) ){
                dynamic_sidebar( 'contacts_map' );
              }
            ?>
          </div>
          <p class="contacts__info">
            <?php
              if( is_active_sidebar( 'contacts_widgets' ) ){
                dynamic_sidebar( 'contacts_widgets' );
              }
            ?>
          </p>
          <h2 class="page-heading contacts__h_form"> форма </h2>
          <?php echo do_shortcode('[contact-form-7 id="5" html_class="contacts__form contacts-form"]'); ?>
        </div>
      </section>
    </main>

<?php get_footer(); ?>