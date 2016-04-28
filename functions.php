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
