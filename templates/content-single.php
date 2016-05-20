<br>
<?php while (have_posts()) : the_post(); ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
    <?php if (get_image_type($image) == 'portrait'): ?>
        <div class="ui grid stackable">
            <div class="four wide column">
                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="" class="ui image" />
            </div>
            <div class="twelve wide column">
                <article <?php post_class(); ?>>
                    <header class="article-title" style="margin-top:15px;">
                        <h1 style="margin-bottom:0"><?php the_title(); ?></h1>
                        <hr>
                        <small style="color:grey"><?php get_template_part('templates/entry-meta'); ?></small>
                    </header>
                    <hr style="margin-top:0; margin-bottom:0;">
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            </div>
        </div>
    <?php else: ?>
        <article <?php post_class(); ?>>
            <header class="article-title" style="margin-top:15px;">
                <h1 style="margin-bottom:0"><?php the_title(); ?></h1>
                <hr style="margin-top:0; margin-bottom:0;">
                <small><?php get_template_part('templates/entry-meta'); ?></small>
            </header>
            <br>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
        <br>
        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="" class="ui image" />
    <?php endif; ?>
<?php endwhile; ?>
<br>
<br>
<footer>
    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
</footer>
<?php comments_template('/templates/comments.php'); ?>
