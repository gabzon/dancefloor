<?php
/**
* Template Name: Schedule
*/
?>
<?php use Roots\Sage\Titles; ?>

<?php
  $dancefloor_options = get_option('dancefloor_settings');

  $bank_details = $dancefloor_options['bank_details'];
  $schedule = $dancefloor_options['schedule'];
?>

<?php while (have_posts()) : the_post(); ?>
    <div class="page-header">
        <div class="ui two column grid stackable">
            <div class="column">
                <h1><?= Titles\title(); ?></h1>
            </div>
            <div class="column right aligned">
                <?php if ($schedule): ?>
                    <a href="<?= esc_url( $schedule ); ?>" class="ui red huge button" target="_blank">
                        <i class="download icon"></i> <?php _e('Schedule','sage'); ?>
                    </a>
                <?php endif; ?>
                <?php if ($bank_details): ?>
                    <a href="<?= esc_url($bank_details) ?>" class="ui red huge button" target="_blank">
                        <i class="credit card alternative icon"></i> <?php _e('Bank details','sage'); ?>
                    </a>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<?php function display_course($key) { ?>
    <?php
    $classrooms = get_posts(array(
        'post_type' => 'classroom',
        'posts_per_page' => -1,
        'post_belongs' => $key,
        'post_status' => 'publish',
        'suppress_filters' => false // This must be set to false
    ));
    $room = [];
    foreach ($classrooms as $salle) {
        $room =  $salle->ID;
    }
    ?>

    <a href="<?= esc_url(get_permalink($key)); ?>" class="course">
        <div class="course-link" style="border-left: 5px solid <?= get_post_meta($room,'classroom_color',true); ?>;">
            <span class="course-time"><?= get_post_meta($key,'course_start_time',true); ?> - <?= get_post_meta($key,'course_end_time',true); ?></span><br>
            <span class="primary-color"><?= get_post_meta($key, 'course_title',true); ?></span><br>
            <?php if (get_post_meta($key,'course_level',true)): ?>
                <span class="secondary-color">
                    <?php _e(get_post_meta($key,'course_level',true),'sage') ?>
                    <?php if (get_post_meta($key,'course_level_number',true)): ?>
                        (<? _e('Level','sage'); echo ' ' . get_post_meta($key,'course_level_number',true); ?>)
                    <?php endif; ?>
                </span><br>
            <?php endif; ?>
            <span class="course-teacher"><?= __('Teacher','sage') . ': ' . get_post_meta($key,'course_teacher',true); ?></span>
            <br>
            <?php if ($room): ?>
                <span class="course-time"><?= __('Place','sage'); ?>: <?= get_the_title($room); ?></span>
            <?php endif; ?>
        </div>
    </a>
    <br>
    <?php
}
?>

<?php $mon = Course::get_courses_by_day('mon'); ?>
<?php $tue = Course::get_courses_by_day('tue'); ?>
<?php $wed = Course::get_courses_by_day('wed'); ?>
<?php $thu = Course::get_courses_by_day('thu'); ?>
<?php $fri = Course::get_courses_by_day('fri'); ?>
<?php $sat = Course::get_courses_by_day('sat'); ?>
<?php $sun = Course::get_courses_by_day('sun'); ?>

<br>
<div class="ui equal width grid stackable">
    <?php if (count($mon) > 0): ?>
        <div class="column">
            <h3><?php _e('Monday','sage'); ?></h3>
            <?php foreach ($mon as $key): ?>
                <?= get_post_meta($key,'classroom_color',true); ?>
                <?php display_course($key); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (count($tue) > 0 ): ?>
        <div class="column">
            <h3><?php _e('Tuesday','sage'); ?></h3>
            <?php foreach ($tue as $key): ?>
                <?php display_course($key); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (count($wed) > 0 ): ?>
        <div class="column">
            <h3><?php _e('Wednesday','sage'); ?></h3>
            <?php foreach ($wed as $key): ?>
                <?php display_course($key); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (count($thu) > 0 ): ?>
        <div class="column">
            <h3><?php _e('Thursday','sage'); ?></h3>
            <?php foreach ($thu as $key): ?>
                <?php display_course($key); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (count($fri) > 0 ): ?>
        <div class="column">
            <h3><?php _e('Friday','sage'); ?></h3>
            <?php foreach ($fri as $key): ?>
                <?php display_course($key); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (count($sat) > 0 ): ?>
        <div class="column">
            <h3><?php _e('Saturday','sage'); ?></h3>
            <?php foreach ($sat as $key): ?>
                <?php display_course($key); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (count($sun) > 0 ): ?>
        <div class="column">
            <h3><?php _e('Sunday','sage'); ?></h3>
            <?php foreach ($sun as $key): ?>
                <?php display_course($key); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<br>
<div class="formulaire-proposition">
    <?php $page = get_page_by_title( 'Proposition' , OBJECT, 'page'); ?>
    <?php echo $page->post_content; ?>
</div>
<?php while (have_posts()) : the_post(); ?>
    <?php //get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
<!-- <h3><?php //_e('Classrooms','sage'); ?></h3>
<hr> -->
<?php //Course::display_classrooms(); ?>
