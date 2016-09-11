<div class="menu">
    <?php foreach($menu_items as $item): ?>
        <?php if($item_id == $item->menu_item_parent): ?>
            <?php if(Menu::check_children_menu($menu_items,$item->ID)): ?>
                <div class="item" style="text-transform:uppercase">
                    <i class="dropdown icon"></i>
                    <span class=\"text\" style="text-transform:uppercase"><?= $item->title;?></span>
                    <?php Menu::get_submenu($menu_items,$item->ID);?>
                </div>
            <?php else: ?>
                <a class="item" href="<?=$item->url;?>" style="text-transform:uppercase !important"><?=$item->title;?></a>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
