<?php
/**
* Template Name: Teachers
*/
?>


<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Profile Picture
    </div>
    <div class="image content">
        <div class="ui medium image">
            <img src="/images/avatar/large/chris.jpg">
        </div>
        <div class="description">
            <div class="ui header">We've auto-chosen a profile image for you.</div>
            <p>We've grabbed the following image from the <a href="https://www.gravatar.com" target="_blank">gravatar</a> image associated with your registered e-mail address.</p>
            <p>Is it okay to use this photo?</p>
        </div>
    </div>
    <div class="actions">
        <div class="ui black deny button">
            Nope
        </div>
        <div class="ui positive right labeled icon button">
            Yep, that's me
            <i class="checkmark icon"></i>
        </div>
    </div>
</div>


<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>


<?php $profs = get_users( 'role=teacher' ); ?>
<?php //piklist::pre($profs); ?>
<h2><?php _e('Teachers','sage'); ?></h2>
<div class="ui special four stackable cards">
    <?php foreach ( $profs as $user ) :?>
        <div class="card">
            <div class="blurring dimmable image">
                <div class="ui dimmer">
                    <div class="content">
                        <div class="center">
                            <div class="ui inverted button"><?php _e('View','sage'); ?></div>
                        </div>
                    </div>
                </div>
                <img src="<?php echo get_avatar_url( $user->user_email, array('size'  => 512) ); ?>" alt="" />
            </div>
            <div class="content">
                <a class="header">
                    <h3><?= esc_html( $user->first_name ); ?> <?= esc_html( $user->last_name ); ?></h3>
                </a>
                <div class="meta">
                    <?= get_user_meta($user->ID,'title', true); ?>
                </div>
            </div>
            <?php if (get_user_meta($user->ID,'skills')): ?>
                <div class="content">
                    <h5><?php _e('Skills'); ?></h5>
                    <span>
                        <?php $skills = get_user_meta($user->ID,'skills'); ?>
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
                <a class="ui button circular icon" href="mailto:<?= esc_html($user->user_email); ?>"><i class="mail icon"></i></a>
                <a class="ui button circular icon" href="#"><i class="facebook icon"></i></a>
                <a class="ui button circular icon" href="#"><i class="phone icon"></i></a>
            </div>
        </div>
        <?php //esc_html( $user->display_name ); ?>
        <?php //get_user_meta($user->ID,'phone',true); ?>
    <?php endforeach ?>
</div>
<br>
<?php $assistants = get_users( 'role=administrator' ); ?>
<?php $indice = 0; ?>
<h2><?php _e('The team','sage'); ?></h2>
<div class="ui special four stackable cards">
    <?php foreach ( $assistants as $user ) :?>
        <!-- Modal -->
        <div class="modal fade" id="myModal-<?=$indice ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?= esc_html( $user->first_name ); ?> <?= esc_html( $user->last_name ); ?></h4>
                    </div>
                    <div class="modal-body">
                        <?= esc_html( $user->description ); ?>
                        <br>
                        <?php _e('Palmares','sage'); ?>
                        <?php $year = get_user_meta($user->ID,'year'); ?>
                        <?php $achieved = get_user_meta($user->ID,'achived'); ?>
                        <table class="ui table">
                            <?php for ($i = 0; $i < count($year) ; $i++) : ?>
                                <tr>
                                    <td><?= $year[$i]; ?></td>
                                    <td><?= $achieved[$i]; ?></td>
                                </tr>
                            <?php endfor; ?>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card -->
        <div class="card">
            <div class="blurring dimmable image">
                <div class="ui dimmer">
                    <div class="content">
                        <div class="center">
                            <a class="ui inverted button person" type="button" data-toggle="modal" data-target="#myModal-<?= $indice; ?>"><?php _e('View','sage'); ?></a>
                        </div>
                    </div>
                </div>
                <img src="<?php echo get_avatar_url( $user->user_email, array('size'  => 512) ); ?>" alt="" />
            </div>
            <div class="content">
                <a class="header">
                    <h3><?= esc_html( $user->first_name ); ?> <?= esc_html( $user->last_name ); ?></h3>
                </a>
                <div class="meta">
                    <?= get_user_meta($user->ID,'title', true); ?>
                </div>
            </div>
            <?php if (get_user_meta($user->ID,'skills')): ?>
                <div class="content">
                    <h5><?php _e('Skills'); ?></h5>
                    <span>
                        <?php $skills = get_user_meta($user->ID,'skills'); ?>
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
                <a class="ui button circular icon" href="mailto:<?= esc_html($user->user_email); ?>"><i class="mail icon"></i></a>
                <a class="ui button circular icon" href="<?= get_user_meta($user->ID,'facebook',true); ?>"><i class="facebook icon"></i></a>
                <a class="ui button circular icon" href="tel:<?= get_user_meta($user->ID,'phone',true); ?>"><i class="phone icon"></i></a>
            </div>
        </div>
        <?php //esc_html( $user->display_name ); ?>
        <?php $indice++ ?>

    <?php endforeach ?>
</div>
