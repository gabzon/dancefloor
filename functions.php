<?php
/**
* Sage includes
*
* The $sage_includes array determines the code library included in your theme.
* Add or remove files to the array as needed. Supports child theme overrides.
*
* Please note that missing files will produce a fatal error.
*
* @link https://github.com/roots/sage/pull/1042
*/
$sage_includes = [
    'lib/utils.php',    // Scripts and stylesheets
    'lib/assets.php',    // Scripts and stylesheets
    'lib/extras.php',    // Custom functions
    'lib/setup.php',     // Theme setup
    'lib/titles.php',    // Page titles
    'lib/nav.php',
    'lib/menu.php',
    'lib/wrapper.php',   // Theme wrapper class
    'lib/customizer.php', // Theme customizer
    'lib/course.php', // Theme customizer
    'models/post-type/course.php',
    'models/post-type/classroom.php',
];

foreach ($sage_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);

function get_image_type($image){
    $w = $image[1];
    $h = $image[2];
    if ( $w > $h) {
        if ($w > ($h*2)) {
            return 'landscape-2';
        }else {
            return 'landscape';
        }
    } else if ( $w < $h ) {
        return 'portrait';
    } else {
        return 'squared';
    }
}

add_role( 'teacher',    __( 'Teacher','sage' ),     array( 'read' => true, 'edit_posts' => true, 'delete_posts' => true) );
add_role( 'assistant',  __( 'Assistant','sage' ),   array( 'read' => true, 'edit_posts' => true, 'delete_posts' => true) );

add_filter('piklist_admin_pages', 'piklist_theme_setting_pages');
function piklist_theme_setting_pages($pages)
{
    $pages[] = array(
        'page_title' => __('Custom Settings')
        ,'menu_title' => __('Settings', 'piklist')
        ,'sub_menu' => 'themes.php' //Under Appearance menu
        ,'capability' => 'manage_options'
        ,'menu_slug' => 'custom_settings'
        ,'setting' => 'dancefloor_settings'
        ,'menu_icon' => plugins_url('piklist/parts/img/piklist-icon.png')
        ,'page_icon' => plugins_url('piklist/parts/img/piklist-page-icon-32.png')
        ,'single_line' => true
        ,'default_tab' => 'Basic'
        ,'save_text' => __('Save','sage')
    );

    return $pages;
}

//disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php
remove_filter('pre_user_description', 'wp_filter_kses');
//add sanitization for WordPress posts
add_filter( 'pre_user_description', 'wp_filter_post_kses');


/*
Custom WPML Switcher for bootstrap
https://wpml.org/forums/topic/bootstrap-and-lang-switcher/
*/
function new_nav_menu_items($items,$args) {

    if (function_exists('icl_get_languages')) {

        $languages = icl_get_languages('skip_missing=0' && $args->theme_location == 'top_menu' );

        if(1 < count($languages)){

            // $ll_flag = $languages[ICL_LANGUAGE_CODE]['country_flag_url'];
            // $ll_url = $languages[ICL_LANGUAGE_CODE]['url'];
            // $ll_code = $languages[ICL_LANGUAGE_CODE]['language_code'];
            // $ll_nname = $languages[ICL_LANGUAGE_CODE]['native_name'];

            //$items = $items.'<li class="dropdown lang"><a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="'.$ll_url.'"><img src="'.$ll_flag.'" height="12" alt="'.$ll_code.'" width="18" /> '. $ll_nname .'</a><ul class=dropdown-menu>';

            foreach($languages as $l){
                if( ! $l['active'] ) {
                    $items = $items.'<li class="menu-item"><a href="'.$l['url'].'"><img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" /> '. $l['native_name'] .'</a></li>';
                }
            }
        }
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'new_nav_menu_items',10,2 );
