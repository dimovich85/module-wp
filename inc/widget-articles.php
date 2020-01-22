<?php 

class SI_Widget_Article extends WP_Widget {

	public function __construct(){
		$args = array(
			'name' => 'SportIsland - Вывод записи',
			'description' => 'Выводит запись'
		);
		parent::__construct('si_widget_article', '', $args);
	}

	public function form($instance){
        $posts = get_posts([
            'numberposts' => -1,
            'post_type' => 'post'
        ]);
?>
<!-- Верстка формы -->
	<p>
		<label for="<?php echo $this->get_field_id('id-article'); ?>">Text:</label>
        <select 
            name="<?php echo $this->get_field_name('article'); ?>" 
            id="<?php echo $this->get_field_id('id-article'); ?>"  
            class="widefat"
        >
        <?php
            foreach($posts as $post):
        ?>
            <option 
                value="<?php echo $post->ID; ?>"
                <?php selected($instance['article'], $post->ID, true); ?>
            >
                <?php echo $post->post_title; ?>
            </option>
        <?php endforeach; ?> 
        </select>
	</p>
<!-- Конец верстки формы -->
<?php

	} //Конец метода form

	public function widget($args, $instance){
        $post = get_post( $instance['article'] );
?>
    <article class="about">
        <div class="wrapper about__flex">
            <div class="about__wrap">
            <h2 class="main-heading about__h">
                <?php echo $post->post_title; ?>
            </h2>
            <p class="about__text">
                <?php echo strip_tags($post->post_content); ?>
            </p>
            <a href="<?php echo home_url('/blog'); ?>" class="about__link btn">подробнее</a>
            </div>
            <figure class="about__thumb">
                <?php echo get_the_post_thumbnail( $post, 'full'); ?>
            </figure>
        </div>
    </article>
<?php	}

	/*public function update(){

	}*/




}


?>