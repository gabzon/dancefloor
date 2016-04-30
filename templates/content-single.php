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
                    <header class="article-title">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <div class="ui divider"></div>
                        <small style="color:grey"><?php get_template_part('templates/entry-meta'); ?></small>
                    </header>
                    <br>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            </div>
        </div>
    <?php else: ?>
        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="" class="ui image" />
        <article <?php post_class(); ?>>
            <header class="article-title">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="ui divider"></div>
                <small><?php get_template_part('templates/entry-meta'); ?></small>
            </header>
            <br>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endif; ?>
<?php endwhile; ?>
<br>
<br>
<footer>
    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
</footer>
<?php comments_template('/templates/comments.php'); ?>
