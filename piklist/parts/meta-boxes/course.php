<?php
/*
Title: Course information
Post Type: course
*/

piklist('field',array(
    'type'      => 'text',
    'label'     => __('Title','sage'),
    'field'     => 'course_title',
    'columns'   => 12,
));

$level = array(
    'type'      => 'select',
    'label'     => __('Level','sage'),
    'field'     => 'course_level',
    'columns'   => 5,
    'choices'   => array(
        ''              => '',
        'Beginner'      => __('Beginner','sage'),
        'Intermediate'  => __('Intermediate','sage'),
        'Advanced'      => __('Advanced','sage'),
        'All'           => __('All levels','sage')
    )
);

$level_number = array(
    'type'      => 'select',
    'label'     => __('Level Number','sage'),
    'field'     => 'course_level_number',
    'columns'   => 3,
    'choices'   => array(
        ''  => '',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        '13' => '13',
        '14' => '14',
        '15' => '15',
        '16' => '16',
        '17' => '17',
        '18' => '18',
        '19' => '19',
        '20' => '20',
    )
);

piklist('field',array(
    'type'      => 'group',
    'label'     => __('Level','sage'),
    'fields'    => array(
        $level,
        $level_number,
    )
));

piklist('field',[
        'type' => 'text',
        'label' => __('Level text','sage'),
        'field' => 'course_level_text',
        'columns' => 12,
        'attributes' => ['placeholder' => __('ex: All levels','sage')]
]);

piklist('field',[
        'type' => 'text',
        'label' => __('required Level','sage'),
        'field' => 'course_required_level',
        'columns' => 12,
        'attributes' => ['placeholder' => __('ex: 4 months','sage')]
]);

$start_date = array(
    'type'      => 'datepicker',
    'label'     => __('Start date','sage'),
    'field'     => 'course_start_date',
    'options'   => array('dateFormat' => 'd/m/yy'),
    'columns'   => 6
);

$end_date = array(
    'type'      => 'datepicker',
    'label'     => __('End date','sage'),
    'field'     => 'course_end_date',
    'options'   => array('dateFormat' => 'd/m/yy'),
    'columns'   => 6
);

piklist('field',array(
    'type'      => 'group',
    'label'     => __('Session period','sage'),
    'fields'    => array(
        $start_date,
        $end_date,
    )
));

$day = array(
    'type'      => 'select',
    'label'     => __('Day','sage'),
    'field'     => 'course_day',
    'columns'   => 5,
    'choices'   => array(
        'Monday'    => 'Monday',
        'Tuesday'   => 'Tuesday',
        'Wednesday' => 'Wednesday',
        'Thursday'  => 'Thursday',
        'Friday'    => 'Friday',
        'Saturday'  => 'Saturday',
        'Sunday'    => 'Sunday',
    )
);

$start_time = array(
    'type'      => 'time',
    'label'     => __('Start Time','sage'),
    'field'     => 'course_start_time',
    'columns'   => 3
);

$end_time = array(
    'type'      => 'time',
    'label'     => __('End Time','sage'),
    'field'     => 'course_end_time',
    'columns'   => 3
);

piklist('field',array(
    'type'      => 'group',
    'label'     => __('Day and time','sage'),
    'help'      => 'Time Format (HH:MM)',
    'fields'    => array(
        $day,
        $start_time,
        $end_time,
    )
));

piklist('field',array(
    'type'      => 'text',
    'label'     => __('Teacher','sage'),
    'field'     => 'course_teacher',
    'columns'   => 12,
    'attributes' => array(
       'placeholder' => 'Kouamé'
     )
));


piklist('field',array(
    'type'      => 'datepicker',
    'label'     => __('Holidays','sage'),
    'field'     => 'course_holidays',
    'options'   => array('dateFormat' => 'd/m/yy'),
    'columns'   => 12,
    'add_more'  => true,
));

piklist('field',array(
    'type'      => 'text',
    'label'     => __('Attention Message','sage'),
    'field'     => 'course_attention_message',
    'columns'   => 12
));

piklist('field', array(
    'type'      => 'post-relate',
    'scope'     => 'classroom',
    'template'  => 'field',
));
