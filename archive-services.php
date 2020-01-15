<?php get_header(); ?>

    <main class="main-content">
      <h1 class="sr-only">Услуги</h1>
      <div class="wrapper">
      <?php 
        get_template_part('tmp/breadcrumbs'); 
      ?>
        <ul class="services-list">
          <li class="services-list__item service">
            <h2 class="service__name main-heading"> ТРЕНАЖЕРНЫЙ ЗАЛ </h2>
            <p class="service__text"> Спорт клуб в Москве «SportIsland» является современным фитнес клубом по проведению тренировок различной направленности и стиля. В тренажерном зале можно развивать силы своего организма и укреплять здоровье. </p>
            <p class="service__action">
              <a href="#" class="service__subscribe btn">записаться</a>
              <strong class="service__price price"> 1200 <span class="price__unit">р./мес.</span>
              </strong>
            </p>
            <figure class="service__thumb">
              <img src="<?php _img_url('img/services__service_pic1.jpg'); ?>" alt="" class="service__img">
            </figure>
          </li>
          <li class="services-list__item service">
            <h2 class="service__name main-heading"> ЖЕНСКИЙ ФИТНЕС </h2>
            <p class="service__text"> В клубе «SportIsland» вам предложат фитнес программы различных направлений и уровней подготовленности: как для новичков, так и для опытных атлетов. Поставьте себе цель и опытные тренеры приведут вас к телу вашей мечты! </p>
            <p class="service__action">
              <a href="#" class="service__subscribe btn">записаться</a>
              <strong class="service__price price"> 2200 <span class="price__unit">р./мес.</span>
              </strong>
            </p>
            <figure class="service__thumb">
              <img src="<?php _img_url('img/services__service_pic3.jpg'); ?>" alt="" class="service__img">
            </figure>
          </li>
          <li class="services-list__item service">
            <h2 class="service__name main-heading"> ЕДИНОБОРСТВА </h2>
            <p class="service__text"> Сегодня физическая и духовная подготовка, способность защитить себя и близких очень актуальны. Предлагаем следующие классы по самообороне и боевых искусств: Спортивная борьба - это единоборство двух соперников, использующих в поединке свои физические и морально-волевые качества для достижения победы. Бокс - контактный вид спорта, в котором соперники наносят друг другу удары кулаками. Разрешены удары только выше пояса. </p>
            <p class="service__action">
              <a href="#" class="service__subscribe btn">записаться</a>
              <strong class="service__price price"> 1800 <span class="price__unit">р./мес.</span>
              </strong>
            </p>
            <figure class="service__thumb">
              <img src="<?php _img_url('img/services__service_pic2.jpg'); ?>" alt="" class="service__img">
            </figure>
          </li>
        </ul>
      </div>
    </main>

<?php get_footer(); ?>