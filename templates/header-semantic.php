<?php
use Roots\Sage\Nav;
use Roots\Sage\Nav\NavWalker;
$menu_name = 'primary_navigation';
?>

<div class="ui grid">
    <div class="computer tablet only row">
        <div class="ui inverted fixed menu navbar large borderless">
            <div class="ui container">
                <a class="navbar-brand brand item" href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo-dancefloor.png" alt="Dancefloor logo" class="ui small image" /></a>
                <div class="right menu">
                    <?php get_template_part('templates/menu') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile only row">
        <div class="ui fixed inverted navbar menu">
            <a class="navbar-brand brand item" href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo-dancefloor.png" alt="Dancefloor logo" class="ui small image" /></a>
            <div class="right menu open">
                <a href="" class="menu item">
                    <i class="content icon"></i>
                </a>
            </div>
        </div>
        <div class="ui vertical navbar menu">
            <?php $menu_list = Menu::get_all_menus_list(); ?>
            <?php if ( !empty($menu_list) ): ?>
                <?php foreach($menu_list as $menu): ?>
                    <?php $menu_items = wp_get_nav_menu_items($menu->term_id); ?>
                    <?php foreach($menu_items as $item): ?>
                        <a href="<?= $item->url; ?>" class="item"><?= $item->title; ?></a>
                    <?php endforeach ?>
                <?php endforeach ?>
            <?php endif; ?>
        </div>
    </div>
</div>
