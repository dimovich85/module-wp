<?php

$includes = [
    'widget-text',
    'widget-contacts',
    'widget-iframe',
    'widget-articles',
    'widget-social-links',
    'widget-info'
];

foreach( $includes as $inc ){
    include_once(__DIR__.'/inc/'.$inc.'.php');
}


add_action('wp_enqueue_scripts', 'sport_scripts');
add_action('after_setup_theme', 'sport_setup');
add_action('widgets_init', 'sport_widgets');
add_action('init', 'sport_registration');
add_action( 'admin_init', 'sport_settings_fields' );
add_action('add_meta_boxes', 'sport_add_boxes');
add_action('wp_ajax_metrics', 'si_post_metrics');
add_action('wp_ajax_nopriv_metrics', 'si_post_metrics');
add_action( 'admin_post_nopriv_si-modal-form', 'si_modal_form_controller' );
add_action( 'admin_post_si-modal-form', 'si_modal_form_controller' );
add_action('manage_posts_custom_column', 'si_column_views',5,2);
add_action( 'save_post', 'si_modal_form_save_post' );

add_shortcode( 'si_paste_link', 'sport_paste_link' );

add_filter('show_admin_bar', '__return_false');
add_filter('widget_text', 'do_shortcode');
add_filter('manage_posts_columns', 'si_add_column_views');

function sport_scripts(){
    wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/styles.css', [], '1.3.0', 'all');

    wp_enqueue_script('js', get_template_directory_uri() . '/assets/js/js.js', [], '1.3', true);
}

function sport_setup(){
    register_nav_menu('menu-header', 'Меню в шапке');
    register_nav_menu('menu-footer', 'Меню в подвале');

    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

function sport_widgets(){
    register_sidebar([
        'name' => 'Шапка и подвал. Контакты',
        'id' => 'header',
        'description' => 'Сайдбар в шапке и футере для контактов',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Главная страница - Блок Кто мы',
        'id' => 'main_about_us',
        'description' => 'Блок "Кто мы" на главной странице',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Футер - Колонка 1',
        'id' => 'footer_column1',
        'description' => 'Первая колонка в футере. Где выводится копирайт',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Футер - колонка 2',
        'id' => 'footer_column2',
        'description' => 'Вторая колонка в футере. Где выводится текст для обратной связи',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Футер - Колонка 3',
        'id' => 'footer_column3',
        'description' => 'Третья колонка в футере. Где выводятся ссылки на социальные сети',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Модальное окно - Записаться',
        'id' => 'modal_subscribe',
        'description' => 'Зона в модальном окне для формы ОС. Выводится в первую очередь на странице с Услугами',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Контакты - Карта',
        'id' => 'contacts_map',
        'description' => 'Зона на странице с контактами, куда выводится карта',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_sidebar([
        'name' => 'Контакты - виджеты под картой',
        'id' => 'contacts_widgets',
        'description' => 'Зона на странице с контактами, куда выводится мелкие виджеты с информацией',
        'before_widget' => null,
        'after_widget' => null
    ]);

    register_widget( 'si_simple_text' );
    register_widget( 'si_widget_contacts' );
    register_widget( 'si_widget_iframe' );
    register_widget( 'si_widget_article' );
    register_widget( 'si_social_links' );
    register_widget( 'si_widget_info' );
}

function sport_registration(){
    register_post_type('cards', [
        'labels' => [
            'name'               => 'Клубные карты', // основное название для типа записи
            'singular_name'      => 'Клубная карта', // название для одной записи этого типа
            'add_new'            => 'Добавить новую карту', // для добавления новой записи
            'add_new_item'       => 'Добавить новую карту', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать карту', // для редактирования типа записи
            'new_item'           => 'Новая карта', // текст новой записи
            'view_item'          => 'Смотреть карту', // для просмотра записи этого типа.
            'search_items'       => 'Искать', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Клубные карты', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-id', 
        'hierarchical'        => false,
        'supports'            => array('title'),
        'has_archive' => false
    ]);

    register_post_type('sales', [
        'labels' => [
            'name'               => 'Акции', // основное название для типа записи
            'singular_name'      => 'Акция', // название для одной записи этого типа
            'add_new'            => 'Добавить новую акцию', // для добавления новой записи
            'add_new_item'       => 'Добавить новую акцию', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать акцию', // для редактирования типа записи
            'new_item'           => 'Новая карта', // текст новой записи
            'view_item'          => 'Смотреть акцию', // для просмотра записи этого типа.
            'search_items'       => 'Искать', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Акции и скидки', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-buddicons-groups', 
        'hierarchical'        => false,
        'supports'            => array('title'),
        'has_archive' => false
    ]);

    register_post_type('services', [
        'labels' => [
            'name'               => 'Услуги', // основное название для типа записи
            'singular_name'      => 'Услуга', // название для одной записи этого типа
            'add_new'            => 'Добавить новую услугу', // для добавления новой записи
            'add_new_item'       => 'Добавить новую услугу', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать услугу', // для редактирования типа записи
            'new_item'           => 'Новая услуга', // текст новой записи
            'view_item'          => 'Смотреть услугу', // для просмотра записи этого типа.
            'search_items'       => 'Искать', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Услуги', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-smiley', 
        'hierarchical'        => false,
        'supports'            => array('title'),
        'has_archive' => true
    ]);

    register_post_type('trainers', [
        'labels' => [
            'name'               => 'Тренеры', // основное название для типа записи
            'singular_name'      => 'Тренер', // название для одной записи этого типа
            'add_new'            => 'Добавить нового тренера', // для добавления новой записи
            'add_new_item'       => 'Добавить нового тренера', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать тренера', // для редактирования типа записи
            'new_item'           => 'Новый тренера', // текст новой записи
            'view_item'          => 'Смотреть тренера', // для просмотра записи этого типа.
            'search_items'       => 'Искать', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Тренеры', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-groups', 
        'hierarchical'        => false,
        'supports'            => array('title'),
        'has_archive' => true
    ]);

    register_post_type('schedule', [
        'labels' => [
            'name'               => 'Расписание', // основное название для типа записи
            'singular_name'      => 'Занятие', // название для одной записи этого типа
            'add_new'            => 'Добавить новое занятие', // для добавления новой записи
            'add_new_item'       => 'Добавить новое занятие', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать занятие', // для редактирования типа записи
            'new_item'           => 'Новое занятие', // текст новой записи
            'view_item'          => 'Смотреть занятие', // для просмотра записи этого типа.
            'search_items'       => 'Искать', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Занятия и расписание', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-calendar-alt', 
        'hierarchical'        => false,
        'supports'            => array('title'),
        'has_archive' => true
    ]);

    register_taxonomy('days', ['schedule'], [
        'labels'                => [
            'name'              => 'Дни недели',
            'singular_name'     => 'День недели',
            'search_items'      => 'Найти день недели',
            'all_items'         => 'Все дни недели',
            'view_item '        => 'Посмотреть день недели',
            'edit_item'         => 'Редактировать день недели',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить день недели',
            'new_item_name'     => 'Добавить день недели',
            'menu_name'         => 'Все дни недели',
        ],
        'description'           => '',
        'public'                => true,
        'hierarchical'          => true
    ]);

    // should be schedule_days
    register_taxonomy('days', ['schedule'], [
        'labels'                => [
            'name'              => 'Дни недели',
            'singular_name'     => 'День недели',
            'search_items'      => 'Найти день недели',
            'all_items'         => 'Все дни недели',
            'view_item '        => 'Посмотреть день недели',
            'edit_item'         => 'Редактировать день недели',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить день недели',
            'new_item_name'     => 'Добавить день недели',
            'menu_name'         => 'Все дни недели',
        ],
        'description'           => '',
        'public'                => true,
        'hierarchical'          => true
    ]);

    register_taxonomy('places', ['schedule'], [
        'labels'                => [
            'name'              => 'Залы',
            'singular_name'     => 'Зал',
            'search_items'      => 'Найти зал',
            'all_items'         => 'Все залы',
            'view_item '        => 'Посмотреть зал',
            'edit_item'         => 'Редактировать зал',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить зал',
            'new_item_name'     => 'Добавить зал',
            'menu_name'         => 'Все залы',
        ],
        'description'           => '',
        'public'                => true,
        'hierarchical'          => true
    ]);

    register_post_type('prices', [
        'labels' => [
            'name'               => 'Прайсы', // основное название для типа записи
            'singular_name'      => 'Прайс', // название для одной записи этого типа
            'add_new'            => 'Добавить новый прайс', // для добавления новой записи
            'add_new_item'       => 'Добавить новый прайс', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать прайс', // для редактирования типа записи
            'new_item'           => 'Новый прайс', // текст новой записи
            'view_item'          => 'Смотреть прайс', // для просмотра записи этого типа.
            'search_items'       => 'Искать', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Прайсы', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-list-view', 
        'hierarchical'        => false,
        'supports'            => array('title'),
        'has_archive' => true
    ]);

    register_post_type('orders', [
        'labels' => [
            'name'               => 'Заявки', // основное название для типа записи
            'singular_name'      => 'Заявка', // название для одной записи этого типа
            'add_new'            => 'Добавить новую заявку', // для добавления новой записи
            'add_new_item'       => 'Добавить новую заявку', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактироваую заявку', // для редактирования типа записи
            'new_item'           => 'Новую заявку', // текст новой записи
            'view_item'          => 'Смотреть заявку', // для просмотра записи этого типа.
            'search_items'       => 'Искать', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Заявки', // название меню
        ],
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-format-aside', 
        'hierarchical'        => false,
        'supports'            => array('title'),
        'has_archive' => false
    ]);

    register_post_meta('post', 'si_likes', [
        'sanitize_callback' => 'wp_unslash',
        'type' => 'integer',
        'single' => true
    ]);
}

function _img_url($path){
    $base = get_template_directory_uri() . '/assets/';
    echo $base . $path;
}

function breadcrumbs($home = 'Главная') {

	$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
	$base_url = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
	$breadcrumbs = [
        [
            'link' => $base_url,
            'text' => $home
        ]
    ];

	$last = end( array_keys($path) );

	foreach( $path as $x => $crumb ){
		$title = ucwords(str_replace(array('.php', '_'), Array('', ' '), $crumb));
		if( $x != $last ){
			$breadcrumbs[] = [
                'link' => $base_url.$crumb,
                'text' => $title
            ];
		}
		else {
			$breadcrumbs[] = [
                'link' => '',
                'text' => $title
            ];
		}
	}

	return  $breadcrumbs;
}

function sport_paste_link( $attrs ){
    $params = shortcode_atts( [
        "link" => '',
        'text' => ''
    ], $attrs);
    $link = $params['link'];
    $text = isset($params['text']) ? $params['text'] : $link;
    if( $link ) return "<a href=\"${link}\">${text}</a>";
    else return '';
}

function sport_settings_fields(){
    add_settings_field( 
        'si_settings_field_slogan', 
        'Напишите слоган для SportIsland', 
        'si_settings_field_slogan_cb', 
        'general', 
        'default', 
        ['label_for' => 'si_settings_field_slogan'] 
    );
    register_setting( 'general', 'si_settings_field_slogan', 'strval' );
}

function si_settings_field_slogan_cb(){
?>
    <input 
        id="si_settings_field_slogan" 
        name="si_settings_field_slogan" 
        type="text" class="regular-text code" 
        value="<?php echo get_option( 'si_settings_field_slogan' ); ?>"
    >
<?php }

function sport_add_boxes(){
    $screens = ['post'];
	add_meta_box( 
        'si_likes', 
        'Likes: ', 
        'si_likes_box_cb', 
        $screens 
    );
    add_meta_box(
        'si_modal_form_data_date',
        'Заявка получена: ',
        'si_modal_form_data_cb_date',
        ['orders']
    );
    add_meta_box(
        'si_modal_form_data_name',
        'Имя: ',
        'si_modal_form_data_cb_name',
        ['orders']
    );
    add_meta_box(
        'si_modal_form_data_phone',
        'Телефон: ',
        'si_modal_form_data_cb_phone',
        ['orders']
    );
    add_meta_box(
        'si_modal_form_data_choose',
        'Пользовательский выбор: ',
        'si_modal_form_data_cb_choose',
        ['orders']
    );
    add_meta_box(
        'si_modal_form_data_status',
        'Заявка обработана: ',
        'si_modal_form_data_cb_status',
        ['orders']
    );
}

function si_modal_form_data_cb_date($post_obj){
    $date = $post_obj->post_date;
    echo '<p>' . $date .'</p>';
}

function si_modal_form_data_cb_name($post_obj){
    $name = get_post_meta( $post_obj->ID, 'si-modal-form-name', true);
    $name = $name ? $name : 'Нет данных';
    echo '<p>' . $name .'</p>';
}

function si_modal_form_data_cb_phone($post_obj){
    $phone = get_post_meta( $post_obj->ID, 'si-modal-form-phone', true);
    $phone = $phone ? $phone : 'Нет данных';
    echo '<p>' . $phone .'</p>';
}

function si_modal_form_data_cb_choose($post_obj){
    $choose = get_post_meta( $post_obj->ID, 'si-modal-form-choose', true);
    $output = '';
    if( $choose ){
        $post = get_post($choose);
        $title = $post->post_title;
        $type = $post->post_type;
        $output = 'Пользователь выбрал - <strong>' . $title . '.</strong> Это из раздела: <strong>' . $type . '</strong>';
    } else{
        $output = 'Добавлена админом';
    }
    echo '<p>' . $output .'</p>';
}

function si_modal_form_data_cb_status($post_obj){
    $status = get_post_meta( $post_obj->ID, 'si-modal-form-status', true);
    $checked = $status === 'order-done' ? 'checked' : '';
    echo '<p><label>Заявка обработана: <input type="checkbox" name="si-modal-form-status"'.$checked.'></label></p><input type="hidden" name="si-modal-form-status-flag" value="si-sent">';
}

function si_likes_box_cb($post_obj){
    $meta = get_post_meta($post_obj->ID, 'si_likes', true);
    $likes = $meta ? $meta : 0;
    $str = '<p>Эта статья понравилась: ' . $likes;
    echo $str . '</p>';
}

function si_post_metrics(){
    $id = $_POST['id'];
    $type = $_POST['do'];
    $current_metrics = get_post_meta($id, 'si_likes', true);
    if( $type === 'minus' ){
        $current_metrics--;
    } else {
        $current_metrics++;
    }
    $res = update_post_meta($id, 'si_likes', $current_metrics);
    if( $res ) echo $current_metrics;
    else status_header(500, 'Данные не были обновлены. Попробуйте еще раз.');
    wp_die();
}

function si_add_column_views($defaults){
    $defaults['posts_likes'] = 'Likes';
    return $defaults;
}

function si_column_views($col_name, $id){
    $metric = get_post_meta( $id, 'si_likes', true);
    if($col_name === 'posts_likes'){
        echo $metric ? $metric : 0;
    }
}

function si_modal_form_controller(){
    $name = wp_strip_all_tags($_POST['si-user-name']);
    $phone = wp_strip_all_tags($_POST['si-user-phone']);
    $choose = wp_strip_all_tags($_POST['form-post-id']);
    $id = wp_insert_post( wp_slash([
        'post_title' => 'Новая заявка',
        'post_type' => 'orders',
        'post_status' => 'publish',
        'meta_input' => [
            'si-modal-form-name' => $name,
            'si-modal-form-phone' => $phone,
            'si-modal-form-choose' => $choose,
            'si-modal-form-status' => 'new-order'
        ]
    ]));
    if( $id !== 0 ){
        wp_update_post([
            'ID' => $id,
            'post_title' => 'Новая заявка #' . $id
        ]);
    }
    header('Location: ' . home_url());
}

function si_modal_form_save_post( $post_id ){
    if( !isset($_POST['si-modal-form-status-flag']) ) return;
    if( isset($_POST['si-modal-form-status']) ){
        update_post_meta($post_id, 'si-modal-form-status', 'order-done');
    } else{
        update_post_meta($post_id, 'si-modal-form-status', 'new-order');
    }
}