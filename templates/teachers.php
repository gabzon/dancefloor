<?php
/**
* Template Name: Teachers
*/
?>

<?php
function display_person($indice, $id, $email, $photo, $first_name, $last_name, $title, $description){
    ?>
    <!-- Modal -->
    <div class="modal fade" id="myModal-<?= $indice ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?= esc_html( $first_name ); ?> <?= esc_html( $last_name ); ?></h4>
                </div>
                <div class="modal-body">
                    <?= $description; ?>
                    <br>
                    <?php echo get_user_meta($id,'accomplishments',true); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- card -->
    <div class="card">
        <div class="blurring dimmable image">
            <div class="ui dimmer">
                <div class="content">
                    <div class="center">
                        <a class="ui inverted button person" type="button" data-toggle="modal" data-target="#myModal-<?= $indice; ?>"><?php _e('View','sage'); ?></a>
                    </div>
                </div>
            </div>

            <?php if ($photo): ?>
                <img src="<?= wp_get_attachment_url($photo); ?>" alt="" />
            <?php else: ?>
                <img src="<?php echo get_avatar_url( $email, array('size'  => 512) ); ?>" alt="" />
            <?php endif; ?>

        </div>
        <div class="content">
            <div class="header">
                <h3><?= esc_html( $first_name ); ?> <?= esc_html( $last_name ); ?></h3>
            </div>
            <div class="meta">
                <?= esc_html($title); ?>
            </div>
        </div>
        <?php if (get_user_meta($id,'skills')): ?>
            <div class="content">
                <h5><?php _e('Skills'); ?></h5>
                <span>
                    <?php $skills = get_user_meta($id,'skills'); ?>
                    <?php for ($i = 0; $i < count($skills); $i++) : ?>
                        <?php if ($i != 0): ?>
                            |
                        <?php endif; ?>
                        <?= $skills[$i]; ?>
                    <?php endfor; ?>
                </span>
            </div>
        <?php endif; ?>
        <div class="extra content">
            <a class="ui button circular icon" href="mailto:<?= esc_html($email); ?>"><i class="mail icon"></i></a>
            <?php if (get_user_meta($id,'facebook',true)): ?>
                <a class="ui button circular icon" href="<?= get_user_meta($id,'facebook',true); ?>"><i class="facebook icon"></i></a>
            <?php endif; ?>
            <?php if (get_user_meta($id,'phone',true)): ?>
                <a class="ui button circular icon" href="tel:<?= get_user_meta($id,'phone',true); ?>"><i class="phone icon"></i></a>
            <?php endif; ?>
        </div>
    </div>
    <?php
}
?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<?php $profs = get_users( 'role=teacher' ); ?>
<?php $indice = 100; ?>
<h2><?php _e('Company Dansers','sage'); ?></h2>
<div class="ui special four stackable cards">
    <?php foreach ( $profs as $user ) :?>
        <!-- Card -->
        <?php $photos = get_user_meta($user->ID,'photo');?>
        <?php $photo = ($photos ? $photos[0] : ''); ?>
        <?php $title = get_user_meta($user->ID,'title', true); ?>
        <?php display_person($indice, $user->ID, $user->user_email, $photo, $user->first_name, $user->last_name, $title, $user->description); ?>
        <?php $indice++ ?>
    <?php endforeach ?>
</div>
<br>
<?php $assistants = get_users( 'role=assistant' ); ?>
<?php $indice = 0; ?>
<h2><?php _e('Teachers','sage'); ?></h2>
<div class="ui special four stackable cards">
    <?php foreach ( $assistants as $user ) :?>
        <!-- Card -->
        <?php $photos = get_user_meta($user->ID,'photo');?>
        <?php $photo = ($photos ? $photos[0] : ''); ?>
        <?php $title = get_user_meta($user->ID,'title', true); ?>
        <?php display_person($indice, $user->ID, $user->user_email, $photo, $user->first_name, $user->last_name, $title, $user->description); ?>
        <?php $indice++ ?>
    <?php endforeach ?>
</div>
