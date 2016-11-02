<?php /*
Title: Dancefloor Settings
Setting: dancefloor_settings
*/
piklist('field',[
    'type'      => 'text',
    'field'     => 'bank_details',
    'label'     => __('Bank Details','sage'),
    'help'      => 'Please copy the URL of the file',
    'columns'   => 12
]);
piklist('field',[
    'type'      => 'text',
    'field'     => 'schedule',
    'label'     => __('Schedule','sage'),
    'help'      => 'Please copy the URL of the file',
    'columns'   => 12
]);
// piklist('field', array(
//     'type'          => 'editor',
//     'field'         => 'registration_form',
//     'label'         => __('Registration form','sage'),
//     'description'   => __('Copy and paste gravity form shortcode','sage'),
//     'columns'       => 12
// ));

?>
