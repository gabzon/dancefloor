<?php
/*
Title: User extra info
Capability: manage_options
*/

// Let's create a text box field
piklist('field', array(
    'type'      => 'text',
    'field'     => 'phone',
    'label'     => __('Phone number','sage'),
    'columns'   => 4
));

piklist('field', array(
    'type'      => 'text',
    'field'     => 'faceboox',
    'label'     => __('facebook','sage'),
    'columns'   => 8
));

piklist('field', array(
    'type'      => 'text',
    'field'     => 'title',
    'label'     => __('Title','sage'),
    'columns'   => 8
));

piklist('field', array(
    'type'      => 'text',
    'field'     => 'skills',
    'label'     => __('Styles & Talents','sage'),
    'add_more'  => true,
    'columns'   => 12
));

$year = [
    'type'      => 'text',
    'field'     => 'year',
    'label'     => __('Year','sage'),
    'columns'   => 2
];

$done = [
    'type'      => 'textarea',
    'field'     => 'achived',
    'label'     => __('Description','sage'),
    'columns'   => 10
];

piklist('field', array(
    'type'      => 'group',
    'label'     => __('Accomplishments','sage'),
    'add_more'  => true,
    'columns'   => 12,
    'fields' => [ $year, $done ]
));
