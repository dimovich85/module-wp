<ul class="breadcrumbs">
<?php
    $breadcrumbs = breadcrumbs();
    $class_text = '';
    foreach( $breadcrumbs as $ind => $item ):
    if( $ind !== 0 ){
        $class_text = ' breadcrumbs__item_home';
    }
?>
    <li class="breadcrumbs__item<?php echo $classtext; ?>">
        <a href="<?php echo $item['link']; ?>" class="breadcrumbs__link">
            <?php echo $item['text']; ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>