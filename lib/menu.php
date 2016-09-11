<?php
Class Menu {

    public static function get_all_menus_list(){
        return array_unique(get_terms( 'nav_menu', array( 'hide_empty' => true ) ),SORT_REGULAR);
    }

    public static function check_children_menu($menu_items,$item_id){
       foreach($menu_items as $item){
           if($item_id == $item->menu_item_parent){
               return true;
           }
       }
       return false;
   }

   /**
     * Get submenu template when a menu item have children items
     * @param $menu_items
     * @param $item_id
     */
    public static function get_submenu($menu_items,$item_id){
        include(locate_template('templates/submenu.php'));
    }

}
