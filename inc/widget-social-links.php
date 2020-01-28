<?php 

class SI_Social_Links extends WP_Widget {

	public function __construct(){
		$args = array(
			'name' => 'SportIsland - Соцыальные ссылки',
			'description' => 'Выводит ссылки на соц сети'
		);
		parent::__construct('si_social_links', '', $args);
    }
    
    private $socials = [
        'fb' => 'Facebook',
        'vk' => 'ВКонтакте',
        'youtube' => 'YouTube',
        'insta' => 'Instagram'
    ];

	public function form($instance){     
?>
<!-- Верстка формы -->
	<p>
        <label 
            for="<?php echo $this->get_field_id('id-link'); ?>"
        >
            Ссылка:
        </label>
        <input 
            name="<?php echo $this->get_field_name('link'); ?>" 
            id="<?php echo $this->get_field_id('id-link'); ?>" 
            value="<?php echo $instance['link']; ?>" 
            class="widefat"
        >
    </p>
    <p>
        <label 
            for="<?php echo $this->get_field_id('id-slug'); ?>"
        >
            Социальная сеть:
        </label>
        <select 
            name="<?php echo $this->get_field_name('slug'); ?>" 
            id="<?php echo $this->get_field_id('id-slug'); ?>"  
            class="widefat"
        >
        <?php
            foreach( $this->socials as $slug => $desc ):
        ?>
            <option
              value="<?php echo $slug; ?>"
              <?php selected($instance['slug'], $slug, true); ?>
            >
                <?php echo $desc; ?>
            </option>
        <?php endforeach; ?>
        </select>
	</p>
<!-- Конец верстки формы -->
<?php

	} //Конец метода form

	public function widget($args, $state){
?>
    <a 
      href="<?php echo $state['link']; ?>" 
      class="widget-social-links <?php echo $state['slug']; ?>">
        <span class="sr-only"> 
            Мы в <?php echo $this->socials[$state['slug']]; ?>! 
        </span>
    </a>
<?php
	}

	/*public function update(){

	}*/




}


?>