<?php 

class SI_Widget_Contacts extends WP_Widget {

	public function __construct(){
		$args = array(
			'name' => 'SportIsland - Контакты',
			'description' => 'Выводит номер телефона и адрес'
		);
		parent::__construct('si_widget_contacts', '', $args);
	}

	public function form($instance){
		
		?>
<!-- Верстка формы -->
	<p>
		<label for="<?php echo $this->get_field_id('id-phone'); ?>">Номер телефона:</label>
		<input 
            name="<?php echo $this->get_field_name('phone'); ?>" 
            id="<?php echo $this->get_field_id('id-phone'); ?>" 
            value="<?php echo $instance['phone']; ?>" 
            class="widefat"
        >
	</p>
    <p>
		<label for="<?php echo $this->get_field_id('id-address'); ?>">Введите адрес:</label>
		<input 
            name="<?php echo $this->get_field_name('address'); ?>" 
            id="<?php echo $this->get_field_id('id-address'); ?>" 
            value="<?php echo $instance['address']; ?>" 
            class="widefat"
        >
	</p>
<!-- Конец верстки формы -->
<?php

	} //Конец метода form

    public function widget($args, $instance){ 
        $tel_text = $instance['phone'];
        $pattern = '/[^+0-9]/';
        $tel = preg_replace($pattern, '', $tel_text);
        $address = $instance['address'];
?>
        <address class="widget-contacts">
          <a href="tel:<?php echo $tel; ?>" class="widget-contacts__phone">
            <?php echo $tel_text; ?>
          </a>
          <p class="widget-contacts__address">
              <?php echo $address; ?>
          </p>
        </address>
<?php }

	/*public function update(){

	}*/




}


?>