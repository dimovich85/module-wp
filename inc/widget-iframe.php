<?php 

class SI_Widget_Iframe extends WP_Widget {

	public function __construct(){
		$args = array(
			'name' => 'SportIsland - Iframe',
			'description' => 'Виджет для встраивания сторонних виджетов. Например, видео с YouTube или карт'
		);
		parent::__construct('si_widget_iframe', '', $args);
	}

	public function form($instance){
		
		?>
<!-- Верстка формы -->
	<p>
		<label for="<?php echo $this->get_field_id('id-iframe'); ?>">Код для вставки:</label>
        <textarea 
            name="<?php echo $this->get_field_name('iframe'); ?>" 
            id="<?php echo $this->get_field_id('id-iframe'); ?>" 
            value="<?php echo esc_html($instance['iframe']); ?>" 
            class="widefat"
        >
            <?php echo esc_html($instance['iframe']); ?>
        </textarea>
	</p>
<!-- Конец верстки формы -->
<?php

	} //Конец метода form

	public function widget($args, $instance){
		echo wp_specialchars_decode($instance['iframe']);
	}

	/*public function update(){

	}*/




}


?>