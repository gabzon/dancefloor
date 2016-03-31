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
                <div class="six wide column">
                    <table class="ui table very basic">
                        <tr>
                            <td width="20%"><strong><?php _e('Level','sage'); ?>: </strong></td>
                            <td width="80%">
                                <?= get_post_meta($post->ID,'course_level', true); ?>
                                <?php if (get_post_meta($post->ID,'course_level_number', true)): ?>
                                    (<?= get_post_meta($post->ID,'course_level_number', true); ?>)
                                <?php endif; ?>                                
                            </td>
                        </tr>
                        <tr>
                            <td><strong><?php _e('Day','sage') ?>: </strong></td>
                            <td><?= get_post_meta($post->ID,'course_day', true); ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php _e('Time','sage') ?>: </strong></td>
                            <td><?= get_post_meta($post->ID,'course_start_time', true) . ' - ' . get_post_meta($post->ID,'course_end_time', true); ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php _e('Period','sage') ?>: </strong></td>
                            <td><?= get_post_meta($post->ID,'course_start_date', true) . ' - ' . get_post_meta($post->ID,'course_end_date', true); ?></td>
                        </tr>
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

                    </table>
                </div>
                <div class="ten wide column">
                    <?php the_excerpt(); ?>
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
                <div class="ui three column grid stackable">
                    <div class="column">
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
                    <div class="column">
                        <?= get_post_meta($salle->ID,'classroom_google_map',true); ?>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
        <footer>
            <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </footer>
        <?php comments_template('/templates/comments.php'); ?>
    </article>




<?php endwhile; ?>