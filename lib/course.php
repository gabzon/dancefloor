<?php

class Course{

    private static $rooms;

    public static function display_classrooms(){
        // WP_Query arguments
        $args = array(
            'post_type' => array( 'classroom' ),
            'posts_per_page' => -1,
        );

        // The Query
        $classrooms = new WP_Query( $args );

        // The Loop
        if ( $classrooms->have_posts() ) {
            while ( $classrooms->have_posts() ) {
                $classrooms->the_post();
                ?>
                <button class="ui circular button icon"  style="background:<?= get_post_meta(get_the_ID(),'classroom_color',true); ?> !important; color:white !important;"></button>
                <a href="<?php the_permalink(); ?>" style="padding-top:100px !important"><?= get_the_title(); ?></a>
                <?php
            }
        } else {
            _e('We are not able to find any classroom currently','sage');
        }
        // Restore original Post Data
        wp_reset_postdata();
    }

    public static function get_courses_by_day($day){
        // WP_Query arguments
        $args = array(
            'post_type'         => array( 'course' ),
            'posts_per_page'    => -1,
            'order'             => 'ASC'
        );

        // The Query
        $courses = new WP_Query( $args );

        $tab = [];
        $mon = [];
        $tue = [];
        $wed = [];
        $thu = [];
        $fri = [];
        $sat = [];
        $sun = [];

        // The Loop
        if ( $courses->have_posts() ) {
            while ( $courses->have_posts() ) {
                $courses->the_post();
                switch (get_post_meta(get_the_ID(),'course_day',true)) {
                    case 'Monday':
                    $mon[] = get_the_ID();
                    break;
                    case 'Tuesday':
                    $tue[] = get_the_ID();
                    break;
                    case 'Wednesday':
                    $wed[] = get_the_ID();
                    break;
                    case 'Thursday':
                    $thu[] = get_the_ID();
                    break;
                    case 'Friday':
                    $fri[] = get_the_ID();
                    break;
                    case 'Saturday':
                    $sat[] = get_the_ID();
                    break;
                    case 'Sunday':
                    $sun[] = get_the_ID();
                    break;
                    default:
                    # code...
                    break;
                }
            }
        } else {
            _e('There are no courses currently','sage');
        }
        wp_reset_postdata();

        $tab['mon'] = $mon;
        $tab['tue'] = $tue;
        $tab['wed'] = $wed;
        $tab['thu'] = $thu;
        $tab['fri'] = $fri;
        $tab['sat'] = $sat;
        $tab['sun'] = $sun;

        switch ($day) {
            case 'mon': return $tab['mon'];
            break;
            case 'tue': return $tab['tue'];
            break;
            case 'wed': return $tab['wed'];
            break;
            case 'thu': return $tab['thu'];
            break;
            case 'fri': return $tab['fri'];
            break;
            case 'sat': return $tab['sat'];
            break;
            case 'sun': return $tab['sun'];
            break;
        }
    }
}
