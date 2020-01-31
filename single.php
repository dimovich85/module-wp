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
        $likes = get_post_meta($id, 'si_likes', true);
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
        <a href="#" data-id="<?php echo $id; ?>" data-href="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" class="main-article__like like">
          <span class="like__text">Нравится </span>
          <span class="like__count"><?php echo $likes ? $likes : 0; ?></span>
        </a>
      </footer>
    </article>
    <?php
        endwhile;
      else: get_template_part( 'tmp/no_posts');
    endif;
    ?>
    <script>
      window.addEventListener('load', function(){
        const likeBtn = document.querySelector('.like');
        let isLiked = Boolean(+localStorage.getItem('liked'));
        if( isLiked === true ){
          likeBtn.classList.add('like_liked');
        }
        likeBtn.addEventListener('click', function(e){
          e.preventDefault();
          let isLiked = Boolean(+localStorage.getItem('liked'));
          const target = this;
          const data = new FormData();
          data.append('action', 'metrics');
          let whatToDo = isLiked ? 'minus' : 'plus';
          data.append('do', whatToDo);
          data.append('id', target.getAttribute('data-id'));
          const xhr = new XMLHttpRequest();
          xhr.open('POST', target.getAttribute('data-href'));
          xhr.send(data);
          xhr.addEventListener('readystatechange', function(e){
            if( xhr.readyState !== 4 ) return;
            if( xhr.status === 200 ){
              target.querySelector('.like__count').innerText = xhr.responseText;
              localStorage.setItem('liked', isLiked ? 0 : 1);
              likeBtn.classList.toggle('like_liked');
            } else{
              console.log( xhr.statusText );
            }
          });
        });
      });
    </script>
    <style>
    /*TODO -> to css!!*/
      .like_liked{
        color: #fff;
        font-weight: bold;
      }
    </style>
  </main>

<?php get_footer(); ?>