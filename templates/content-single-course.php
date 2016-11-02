<?php
  $dancefloor_options = get_option('dancefloor_settings');
  $bank_details = $dancefloor_options['bank_details'];
?>
<br>
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <br>
        <header>
            <h1 class="entry-title"><?= get_post_meta($post->ID,'course_title',true); ?></h1>
        </header>
        <br>
        <div class="entry-content">
            <?php if (get_post_meta($post->ID,'course_attention_message', true)): ?>
                <div class="ui green message">
                    <?= get_post_meta($post->ID,'course_attention_message', true); ?>
                </div>
            <?php endif; ?>
            <div class="ui grid stackable">
                <div class="five wide column">
                    <table class="ui table very basic">
                        <tr>
                            <td width="30%"><strong><?php _e('Level','sage'); ?>: </strong></td>
                            <td width="70%">
                                <?= get_post_meta($post->ID,'course_level', true); ?>
                                <?php if (get_post_meta($post->ID,'course_level_number', true)): ?>
                                    (<?= get_post_meta($post->ID,'course_level_number', true); ?>)
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong><?php _e('Day','sage') ?>: </strong></td>
                            <td><?php _e(get_post_meta($post->ID,'course_day', true),'sage') ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php _e('Time','sage') ?>: </strong></td>
                            <td><?= get_post_meta($post->ID,'course_start_time', true) . ' - ' . get_post_meta($post->ID,'course_end_time', true); ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php _e('Period','sage') ?>: </strong></td>
                            <td><?= get_post_meta($post->ID,'course_start_date', true) . ' - ' . get_post_meta($post->ID,'course_end_date', true); ?></td>
                        </tr>
                        <?php if (get_post_meta($post->ID,'course_required_level',true)): ?>
                            <tr>
                                <td><strong><?php _e('Level required','sage') ?></strong>: </td>
                                <td><?= get_post_meta($post->ID,'course_required_level',true); ?></td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td><strong>Prof: </strong></td>
                            <td>
                                <?php if (get_post_meta($post->ID,'course_teacher', true)): ?>
                                    <?= get_post_meta($post->ID,'course_teacher', true); ?>
                                <?php else: ?>
                                    <?php _e('Not available','sage'); ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="#inscription" class="ui red fluid button"><i class="edit icon"></i> <?php _e('Registration','sage') ?></a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="one wide column"></div>
                <div class="ten wide column">
                    <?php the_content(); ?>
                    <br>
                    <?php //piklist::pre(get_post_meta($post->ID,'course_holidays')) ?>
                    <?php if (!get_post_meta($post->ID,'course_holidays')[0] == '' ): ?>
                        <div class="ui big label">
                            <i class="calendar icon"></i><?php _e('Holidays (there won\'t be courses during this dates)') ?>
                        </div>
                        <br>
                        <br>
                        <ul>
                            <?php foreach (get_post_meta($post->ID,'course_holidays') as $key): ?>
                                <li><?php echo $key; ?></li>
                            <?php endforeach; ?>
                        </ul>

                    <?php endif; ?>
                </div>
            </div>
            <br>
            <div class="ui divider"></div>
            <h3><?php _e('Classroom', 'sage'); ?></h3>
            <?php
            $classroom = get_posts(array(
                'post_type' => 'classroom'
                ,'posts_per_page' => -1
                ,'post_belongs' => $post->ID
                ,'post_status' => 'publish'
                ,'suppress_filters' => false // This must be set to false
            ));
            ?>
            <?php foreach ($classroom as $salle): ?>
                <div class="ui grid stackable course-place">
                    <div class="five wide column">
                        <table class="ui very basic table">
                            <tr>
                                <td width="5%"><i class="home icon"></i></td>
                                <td width="95%">
                                    <strong><?php echo $salle->post_title; ?></strong> (<?= get_post_meta($salle->ID,'classroom_quartier',true); ?>)<br>
                                    <?= get_post_meta($salle->ID,'classroom_address',true); ?><br>
                                    <?= get_post_meta($salle->ID,'classroom_postal_code',true) . ', ' . get_post_meta($salle->ID,'classroom_ville',true);; ?><br>
                                    <a href="<?= get_post_meta($salle->ID,'classroom_google_map_link',true); ?>" target="_blank">
                                        <?php _e('Open on Google maps','sage'); ?>
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <div class="ui big red label">
                            <i class="circle warning icon"></i><?php _e('Attention: street shoes not allowed','sage'); ?>
                        </div>
                    </div>
                    <div class="eleven wide column map">
                        <?= get_post_meta($salle->ID,'classroom_google_map',true); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <br>
        <br>


        <?php if (is_user_logged_in()): ?>
            <section class="cours-videos">
                <div class="ui divider"></div>
                <h3><?php _e('Videos', 'sage'); ?></h3>
                <? $videos = get_post_meta($post->ID,'course_videos'); ?>
                <div class="ui three column grid stackable">
                    <?php foreach ($videos as $v): ?>
                        <div class="column">
                            <?php $youtube_link = 'http://www.youtube.com/embed/' . $v . '?rel=0&modestbranding=1'; ?>
                            <iframe width="100%" height="210" src="<?= $youtube_link; ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>


        <br>
        <br>
        <br>
        <?php if (is_user_logged_in()): ?>
            <section class="enrolled-members">
                <div class="ui divider"></div>
                <h3><?php _e('Enrolled members', 'sage'); ?></h3>
                <? $enrolls = get_post_meta($post->ID,'enroll_group'); ?>
                <table class="ui table">
                    <?php for ($i = 0; $i < count($enrolls[0]) ; $i++) : ?>
                        <tr>
                            <td>
                                <?php $user_info = get_userdata($enrolls[0][$i]['members']); ?>
                                <?= $user_info->first_name . ' ' . $user_info->last_name;?><br>
                            </td>
                            <td>
                                <?php if ($enrolls[0][$i]['member_cours_payment'] == 'paid'): ?>
                                    <div class="ui green big label">
                                        <?= $enrolls[0][$i]['member_cours_payment']; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="ui red big label">
                                        <?php _e('Not paid', 'sage'); ?>
                                    </div>
                                <?php endif; ?>

                            </td>
                        </tr>

                    <?php endfor; ?>
                </table>
            </section>
        <?php endif; ?>
        <br>
        <br>
        <br>
        <?php $theme_options = get_option('dancefloor_settings'); ?>
        <?php //$form = $theme_options['registration_form']; ?>
        <section id="inscription">
            <div class="ui divider"></div>
            <h3><?php _e('Registration', 'sage'); ?></h3>
            <div class="ui form">
                <?php
                $page = get_page_by_title( 'Formulaire' );
                $content = apply_filters('the_content', $page->post_content);
                echo $content;
                ?>
                <?php //gravity_form_enqueue_scripts( 23, false ); ?>
                <?php //gravity_form( 23, false, true, false, null, false, 1, true ); ?>
            </div>
            <br>
            <?php if ($bank_details) :?>
                <a href="<?php esc_url($bank_details); ?>" class="ui red huge button"><i class="credit card alternative icon"></i> <?php _e('Bank details','sage') ?></a>
            <?php endif ?>
        </section>

        <footer>
            <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </footer>
        <?php comments_template('/templates/comments.php'); ?>
    </article>

<?php endwhile; ?>
