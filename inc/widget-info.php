<?php 

class SI_Widget_Info extends WP_Widget {

	public function __construct(){
		$args = array(
			'name' => 'SportIsland - Информация',
			'description' => 'Выводит информацию с иконками. Номер телефона, адрес почты и прочее'
		);
		parent::__construct('si_widget_info', '', $args);
    }

	public function form($instance){
        $vars = [
            'position' => 'Адрес',
            'time' => 'Рабочее время',
            'phone' => 'Телефон',
            'email' => 'Почта'
        ];      
?>
<!-- Верстка формы -->
	<p>
        <label 
            for="<?php echo $this->get_field_id('id-desc'); ?>"
        >
            Текст виджета:
        </label>
        <input 
            name="<?php echo $this->get_field_name('desc'); ?>" 
            id="<?php echo $this->get_field_id('id-desc'); ?>" 
            value="<?php echo $instance['desc']; ?>" 
            class="widefat"
        >
    </p>
    <p>
        <label 
            for="<?php echo $this->get_field_id('id-var'); ?>"
        >
            Вариант отображения:
        </label>
        <select 
            name="<?php echo $this->get_field_name('var'); ?>" 
            id="<?php echo $this->get_field_id('id-var'); ?>"  
            class="widefat"
        >
        <?php
            foreach( $vars as $slug => $desc):
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
        switch( $state['var'] ){
            case 'position':
?>
            <span class="widget-address">
                <?php echo $state['desc']; ?>
            </span>
<?php
            break;
            
            case 'time':
?>
            <span class="widget-working-time">
                <?php echo $state['desc']; ?>
            </span>
<?php
            break;

            case 'phone':
                $tel_text = $state['desc'];
                $pattern = '/[^+0-9]/';
                $tel = preg_replace($pattern, '', $tel_text);
?>
            <a href="tel:<?php echo $tel; ?>" class="widget-phone">
                <?php echo $tel_text; ?>
            </a>
<?php
            break;

            case 'email':
?>
            <a href="mailto:<?php echo $state['desc']; ?>" class="widget-email">
                <?php echo $state['desc']; ?>
            </a>
<?php
            break;

            default: 
                echo '';
            break;
        }
	}

	/*public function update(){

	}*/




}


?>